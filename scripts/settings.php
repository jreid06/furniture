<?php
    include 'dbconnect.php';

    if (isset($_POST['type']) && $_POST['type'] === 'user-details') {

        $user_updated_details = $_POST['details'];
        // must line up with each other
        $fields = array('title', 'fname', 'lname', 'dob');
        $values = array($user_updated_details['title'], ucfirst($user_updated_details['fname']), ucfirst($user_updated_details['lname']), $user_updated_details['dob']);

        $update_status = DatabaseFunctions::updateMultipleFields('customers', $fields, $values, 'cus_id', (int) $user_updated_details['id']);

        // update customer information on stripe also
        \Stripe\Stripe::setApiKey("sk_test_o3lzBtuNJXFJOnmzNUfNjpXW");

        $cu = \Stripe\Customer::retrieve($user_updated_details['stripe_cus_id']);
        $cu->metadata = array(
            'title'=>$user_updated_details['title'],
            'first_name'=> ucfirst($user_updated_details['fname']),
            'last_name'=>ucfirst($user_updated_details['lname']),
            'dob'=>$user_updated_details['dob']
        );
        $cu->save();

        if ($update_status[0]) {
            $msg = array(
                'status'=>array(
                    'code'=> 101,
                    'code_status'=>'success'
                ),
                'data'=>array(
                    'msg'=>'Details updated successfully',
                    'details'=>$user_updated_details
                )
            );

            exit(json_encode($msg));
        }else {
            $msg = array(
                'status'=>array(
                    'code'=> 404,
                    'code_status'=>'error'
                ),
                'data'=>array(
                    'msg'=>'Details update failed. Try again or contact help'
                )
            );

            exit(json_encode($msg));
        }

    }elseif (isset($_POST['type']) && $_POST['type'] === 'login-details') {

        $user_login_details = $_POST['details'];

        $email_real = filter_var($user_login_details['email'], FILTER_VALIDATE_EMAIL);

        if ($email_real) {
            $email_true =  true;

        }else {
            $msg = array(
                'status'=>array(
                    'code'=> 404,
                    'code_status'=>'error'
                ),
                'data'=>array(
                    'msg'=>'email is not valid. please enter a real email'
                )
            );

            exit(json_encode($msg));
        }

        if (!DatabaseFunctions::checkExists($user_login_details['email']) && $email_true) {

            // hash new password
            $user_login_details['password'] = password_hash($user_login_details['password'], PASSWORD_DEFAULT);

            $fields = array('email', 'password');
            $values = array($user_login_details['email'], $user_login_details['password']);

            $update_status = DatabaseFunctions::updateMultipleFields('customers', $fields, $values, 'cus_id', (int) $user_login_details['id']);

            // update customer information on stripe also
            \Stripe\Stripe::setApiKey("sk_test_o3lzBtuNJXFJOnmzNUfNjpXW");

            $cu = \Stripe\Customer::retrieve($user_login_details['stripe_cus_id']);
            $cu->email = $user_login_details['email'];
            $cu->description = "Customer email: ".$user_login_details['email'];
            $cu->save();

            if ($update_status[0]) {
                // update cookie or session email variables
                isset($_COOKIE['idyl_uem'])?$_COOKIE['idyl_uem'] = $user_login_details['email']: $_SESSION['idyl_uem'] = $user_login_details['email'];

                $msg = array(
                    'status'=>array(
                        'code'=> 101,
                        'code_status'=>'success'
                    ),
                    'data'=>array(
                        'msg'=>'Login Details updated successfully',
                        'email'=> $user_login_details['email']
                    )
                );

                exit(json_encode($msg));
            }else {
                $msg = array(
                    'status'=>array(
                        'code'=> 404,
                        'code_status'=>'error'
                    ),
                    'data'=>array(
                        'msg'=>'Login Details update failed. Try again or contact help'
                    )
                );

                exit(json_encode($msg));
            }

        }else {
            $msg = array(
                'status'=>array(
                    'code'=> 404,
                    'code_status'=>'error'
                ),
                'data'=>array(
                    'msg'=>'Email selected already exists. Try another one please!'
                )
            );

            exit(json_encode($msg));
        }

    }
    elseif (isset($_POST['type']) && $_POST['type'] === 'add-address') {

        $user_email = isset($_SESSION['idyl_uem'])?$_SESSION['idyl_uem']:$_COOKIE['idyl_uem'];
        $user_details = DatabaseFunctions::getLoggedInUser($user_email)->fetch_assoc();

        // stores the newly inputed address entered from user
        $address = $_POST['address'];

        // turn our stored address JSON into array
        $user_details['address'] = json_decode($user_details['address'], true);
        $address_array = $user_details['address'];

        // generate random id code
        $address_id = bin2hex(random_bytes(20));

        // process address and update accordingly e.g adding address to exsisting address array in database
        $new_address = new Address($address_id, $address['title'], ucfirst($address['fname']), ucfirst($address['lname']), $address['phone'], ucwords($address['address1']), $address['address2'], $address['address3'], ucfirst($address['city_town']), strtoupper($address['post_code']), $address['country'], $address['status']);

        // make the added address only active one if status is set to true
        // ALSO ADD UPDATE CUSTOMER STRIPE ADDRESS/SHIPPING INFO with active address
        if ($new_address->status === 'true' || $new_address->status) {
            for ($i=0; $i < count($address_array); $i++) {
                if ($address_array[$i]['status'] === 'true' || $address_array[$i]['status']) {
                    $address_array[$i]['status'] = false;
                }
            }

            \Stripe\Stripe::setApiKey("sk_test_o3lzBtuNJXFJOnmzNUfNjpXW");

            $cu = \Stripe\Customer::retrieve($user_details['stripe_cus_id']);
            $cu->shipping = array(
                'address'=>array(
                    'line1'=>$new_address->address1,
                    'city'=>$new_address->city_town,
                    'country'=>$new_address->country,
                    'postal_code'=>$new_address->post_code
                ),
                'name'=> $new_address->title. " " .$new_address->first_name. " ". $new_address->last_name,
                'phone'=> $new_address->phone_num
            );
            $cu->save();
        }

        // add our new address to the array
        array_push($address_array, $new_address);

        // prepare data to be stored in DB
        $fields = array('address');
        $values =  array(json_encode($address_array));

        // update DB with new address array
        $address_update = DatabaseFunctions::updateMultipleFields('customers', $fields, $values, 'cus_id', $user_details['cus_id']);

        if ($address_update[0]) {
            // used to display message on screen for users
            $_SESSION['idyl_address_added'] = 'New address added successfully';
            $msg = array(
                'status'=>array(
                    'code'=> 101,
                    'code_status'=>'success'
                ),
                'data'=>array(
                    'msg'=>'Address saved successfully',
                    'address'=> $address_array
                )
            );

            exit(json_encode($msg));
        }else {
            $msg = array(
                'status'=>array(
                    'code'=> 404,
                    'code_status'=>'error'
                ),
                'data'=>array(
                    'msg'=>'Address not saved. Please try again or contact help'
                )
            );

            exit(json_encode($msg));
        }
    }
    elseif (isset($_POST['type']) && $_POST['type'] === 'edit-address') {

        $user_email = isset($_SESSION['idyl_uem'])?$_SESSION['idyl_uem']:$_COOKIE['idyl_uem'];
        $user_details = DatabaseFunctions::getLoggedInUser($user_email)->fetch_assoc();

        // stores the newly inputed address details entered from user and gets its postion in array
        $address = $_POST['address'];
        $address_index = (int) $_POST['position'];

        // turn our stored address JSON into array
        $user_details['address'] = json_decode($user_details['address'], true);
        $address_array = $user_details['address'];

        $old_address_array = $address_array;

        // process address and update accordingly e.g adding address to exsisting address array in database
        $new_address = new Address($address_array[$address_index]['address_id'], $address['title'], ucfirst($address['fname']), ucfirst($address['lname']), $address['phone'], ucwords($address['address1']), $address['address2'], $address['address3'], ucfirst($address['city_town']), strtoupper($address['post_code']), $address['country'], $address['status']);

        // make the edited address only active address if status is set to true
        // ALSO UPDATE CUSTOMER STRIPE ADDRESS/SHIPPING INFO with active address
        if ($new_address->status === 'true' || $new_address->status) {
            for ($i=0; $i < count($address_array); $i++) {
                if ($address_array[$i]['status'] === 'true' || $address_array[$i]['status']) {
                    $address_array[$i]['status'] = false;
                }
            }

            \Stripe\Stripe::setApiKey("sk_test_o3lzBtuNJXFJOnmzNUfNjpXW");

            $cu = \Stripe\Customer::retrieve($user_details['stripe_cus_id']);
            $cu->shipping = array(
                'address'=>array(
                    'line1'=>$new_address->address1,
                    'city'=>$new_address->city_town,
                    'country'=>$new_address->country,
                    'postal_code'=>$new_address->post_code
                ),
                'name'=> $new_address->title. " " .$new_address->first_name. " ". $new_address->last_name,
                'phone'=> $new_address->phone_num
            );
            $cu->save();
        }

        //update edited address in array e.g overwrite it with new address
        $address_array[$address_index] = $new_address;

        // update database
        $fields = array('address');
        $values = array(json_encode($address_array));

        $result = DatabaseFunctions::updateMultipleFields('customers', $fields, $values, 'email', $user_email);

        if ($result[0]) {
            $_SESSION['idyl_address_edited'] = 'Address details updated successfully';
            $msg = array(
                'status'=>array(
                    'code'=> 101,
                    'code_status'=>'success'
                ),
                'data'=>array(
                    'msg'=>'Address saved successfully',
                    'user'=>$user_details,
                    'addressold'=> $old_address_array,
                    'addressnew'=>$address_array
                )
            );

            exit(json_encode($msg));
        }else {
            $msg = array(
                'status'=>array(
                    'code'=> 404,
                    'code_status'=>'error'
                ),
                'data'=>array(
                    'msg'=>'Address not saved. Please try again or contact help',
                    'query'=> $result[1]
                )
            );

            exit(json_encode($msg));
        }


    }
    elseif (isset($_POST['type']) && $_POST['type'] === 'delete-address') {

        $user_email = isset($_SESSION['idyl_uem'])?$_SESSION['idyl_uem']:$_COOKIE['idyl_uem'];
        $user_details = DatabaseFunctions::getLoggedInUser($user_email)->fetch_assoc();

        // get the address array
        $user_details['address'] = json_decode($user_details['address'], true);
        $address_array = $user_details['address'];

        $address_index = (int) $_POST['position'];

        // remove the selected address from the array
        array_splice($address_array, $address_index, 1);

        // update customer details with new address information
        $fields = array('address');
        $values = array(json_encode($address_array));

        $result = DatabaseFunctions::updateMultipleFields('customers', $fields, $values, 'email', $user_email);

        if ($result[0]) {
            $_SESSION['idyl_address_deleted'] = 'Address deleted successfully';
            $msg = array(
                'status'=>array(
                    'code'=> 101,
                    'code_status'=>'success'
                ),
                'data'=>array(
                    'msg'=>'Address deleted successfully',
                    'addressNew'=> $address_array
                )
            );

            exit(json_encode($msg));
        }else {
            $msg = array(
                'status'=>array(
                    'code'=> 404,
                    'code_status'=>'error'
                ),
                'data'=>array(
                    'msg'=>'Address not deleted. Please try again or contact help'
                )
            );

            exit(json_encode($msg));
        }
    }
    elseif (isset($_GET['type']) && $_GET['type'] === 'retrieve-wishlist') {

        // do a DB check to see if there is any wishlist data in table for customer with UID
        $wishlistExists = DatabaseFunctions::getData('*', 'wishlist', 'customer_id', $_GET['uid']);

        if ($wishlistExists[0]) {
            $msg = array(
                'status'=>array(
                    'code'=> 101,
                    'code_status'=>'success'
                ),
                'data'=>array(
                    'msg' => 'wishlist data retrieved',
                    'id' => $_GET['uid'],
                    'wishlistData' => json_encode($wishlistExists[1])
                )
            );

            exit(json_encode($msg));
        }else {
            $msg = array(
                'status'=>array(
                    'code'=> 404,
                    'code_status'=>'error'
                ),
                'data'=>array(
                    'msg'=>'Wishlist data doesnt exist in DB'
                )
            );

            exit(json_encode($msg));
        }


    }
    elseif (isset($_POST['type']) && $_POST['type'] === 'update-wishlist') {

        $user_id = $_POST['uid'];
        $user_wishlist = $_POST['wishlist'];
        /*
            1. check if customer wishlist data already exists
                1.1. if exists updatethefield products column with new JSON
                1.2  else create new entry with users data

        */
        $wishlist_data_exists = DatabaseFunctions::getData('*', 'wishlist', 'customer_id', $user_id);

        if ($wishlist_data_exists[0]) {

            $fields = array('products');
            $values = array($user_wishlist);

            $wishlist_update = DatabaseFunctions::updateMultipleFields('wishlist', $fields, $values, 'customer_id', $user_id);

            if ($wishlist_update[0]) {
                $msg = array(
                    'status'=>array(
                        'code'=> 101,
                        'code_status'=>'success'
                    ),
                    'data'=>array(
                        'msg'=>'Wishlist products updated successfully'
                    )
                );

                exit(json_encode($msg));
            }else {
                $msg = array(
                    'status'=>array(
                        'code'=> 404,
                        'code_status'=>'error'
                    ),
                    'data'=>array(
                        'msg'=>'Failed to update wishlist data for customer with ID: '.$user_id
                    )
                );

                exit(json_encode($msg));
            }

        }else {
            # 1.2  else create new entry with users data
            DatabaseFunctions::createRow('wishlist', '(customer_id, products)', $user_id, $user_wishlist);

            $msg = array(
                'status'=>array(
                    'code'=> 101,
                    'code_status'=>'success'
                ),
                'data'=>array(
                    'msg'=>'ROW CREATED: Wishlist saved Successfully',
                    'uid'=> $user_id
                )
            );

            exit(json_encode($msg));

        }

    }
    elseif (isset($_POST['type']) && $_POST['type'] === 'retrieve-basket') {
        $user_id = $_POST['uid'];

        // do a DB check to see if there is any wishlist data in table for customer with UID
        $basketExists = DatabaseFunctions::getData('products', 'basket', 'customer_id', $user_id);

        if ($basketExists[0]) {
            $msg = array(
                'status'=>array(
                    'code'=> 101,
                    'code_status'=>'success'
                ),
                'data'=>array(
                    'msg' => 'BASKET data retrieved SUCCESSFULLY',
                    'id' => $user_id,
                    'basketData' => json_encode($basketExists[1])
                )
            );

            exit(json_encode($msg));
        }else {
            $msg = array(
                'status'=>array(
                    'code'=> 404,
                    'code_status'=>'error'
                ),
                'data'=>array(
                    'msg'=>'User basket data DOESNT exist in DB'
                )
            );

            exit(json_encode($msg));
        }

    }
    elseif (isset($_POST['type']) && $_POST['type'] === 'update-basket') {
        $user_id = $_POST['uid'];
        $user_basket = $_POST['basket'];
        /*
            1. check if customer wishlist data already exists
                1.1. if exists updatethefield products column with new JSON
                1.2  else create new entry with users data

        */
        $basket_data_exists = DatabaseFunctions::getData('*', 'basket', 'customer_id', $user_id);

        if ($basket_data_exists[0]) {

            $fields = array('products');
            $values = array($user_basket);

            $basket_update = DatabaseFunctions::updateMultipleFields('basket', $fields, $values, 'customer_id', $user_id);

            if ($basket_update[0]) {
                $msg = array(
                    'status'=>array(
                        'code'=> 101,
                        'code_status'=>'success'
                    ),
                    'data'=>array(
                        'msg'=>'user basket products updated successfully'
                    )
                );

                exit(json_encode($msg));
            }else {
                $msg = array(
                    'status'=>array(
                        'code'=> 404,
                        'code_status'=>'error'
                    ),
                    'data'=>array(
                        'msg'=>'Failed to update basket data for customer with ID: '.$user_id
                    )
                );

                exit(json_encode($msg));
            }

        }else {
            # 1.2  else create new entry with users data
            DatabaseFunctions::createRow('basket', '(customer_id, products)', $user_id, $user_basket);

            $msg = array(
                'status'=>array(
                    'code'=> 101,
                    'code_status'=>'success'
                ),
                'data'=>array(
                    'msg'=>'ROW CREATED: Wishlist saved Successfully',
                    'uid'=> $user_id
                )
            );

            exit(json_encode($msg));

        }
    }
    else {
        header('location: /');
        exit();
    }

 ?>
