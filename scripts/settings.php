<?php
    include 'dbconnect.php';

    if (isset($_POST['type']) && $_POST['type'] === 'user-details') {

        $user_updated_details = $_POST['details'];
        // must line up with each other
        $fields = array('title', 'fname', 'lname', 'dob');
        $values = array($user_updated_details['title'], ucfirst($user_updated_details['fname']), ucfirst($user_updated_details['lname']), $user_updated_details['dob']);

        $update_status = DatabaseFunctions::updateMultipleFields('customers', $fields, $values, 'cus_id', (int) $user_updated_details['id']);

        if ($update_status[0]) {
            $msg = array(
                'status'=>array(
                    'code'=> 101,
                    'code_status'=>'success'
                ),
                'data'=>array(
                    'msg'=>'Details updated successfully'
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

        $user_login_details =  $_POST['details'];

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
        $user_details['address'] = json_decode($user_details['address']);
        $address_array = $user_details['address'];

        // generate random id code
        $address_id = bin2hex(random_bytes(20));

        // process address and update accordingly e.g adding address to exsisting address array in database
        $new_address = new Address($address_id, $address['title'], ucfirst($address['fname']), ucfirst($address['lname']), $address['phone'], $address['address1'], $address['address2'], $address['address3'], $address['city_town'], $address['post_code'], $address['country']);

        // add our new address to the array
        array_push($address_array, $new_address);

        // prepare data to be stored in DB
        $fields = array('address');
        $values =  array(json_encode($address_array));

        // update DB with new address array
        $address_update = DatabaseFunctions::updateMultipleFields('customers', $fields, $values, 'cus_id', $user_details['cus_id']);

        if ($address_update[0]) {
            $_SESSION['idyl_address_added'] = 'New address added successfully';
            $msg = array(
                'status'=>array(
                    'code'=> 101,
                    'code_status'=>'success'
                ),
                'data'=>array(
                    'msg'=>'Address saved successfully'
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
        $user_details =  DatabaseFunctions::getLoggedInUser($user_email)->fetch_assoc();

        // stores the newly inputed address entered from user and gets its postion in array
        $address = $_POST['address'];
        $address_index = (int) $_POST['position'];

        // turn our stored address JSON into array
        $user_details['address'] = json_decode($user_details['address'], true);
        $address_array = $user_details['address'];

        $old_address_array = $address_array;

        // process address and update accordingly e.g adding address to exsisting address array in database
        $new_address = new Address($address_array[$address_index]['address_id'], $address['title'], ucfirst($address['fname']), ucfirst($address['lname']), $address['phone'], $address['address1'], $address['address2'], $address['address3'], $address['city_town'], $address['post_code'], $address['country']);

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
                    'msg'=>'Address not saved. Please try again or contact help'
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
    else {
        header('location: /');
        exit();
    }

 ?>
