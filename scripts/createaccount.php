<?php

    include 'dbconnect.php';

    if (isset($_POST['type']) && $_POST['type'] === "create") {

        // exit(var_dump($_POST['user']));
        $user_details = $_POST['user'];
        $title = $user_details['title'];
        $fname = ucfirst($user_details['fname']);
        $lname = ucfirst($user_details['lname']);
        $dob = $user_details['dob'];
        $email = $user_details['email'];
        $password = $user_details['password'];

        // validate email
        $email_real = filter_var($email, FILTER_VALIDATE_EMAIL);

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

        /*
            process the users input and add to database
            - secure user password using password hash
        */

        if (!DatabaseFunctions::checkExists($email) && $email_real) {

            // create new user as a stripe customer
            \Stripe\Stripe::setApiKey("sk_test_o3lzBtuNJXFJOnmzNUfNjpXW");
            $customer_stripe = \Stripe\Customer::create(array(
              "description" => "Customer email:  " .$email,
              "metadata"=>array(
                  'title'=>$title,
                  'first_name'=>$fname,
                  'last_name'=>$lname,
                  'email'=>$email,
                  'dob'=>$dob
              ),
              'email'=>$email
            ));

            // add user to database
            $cus_stripe_id = $customer_stripe['id'];

            // set the address array to have brief details set using address class
            $address_id = bin2hex(random_bytes(10));

            $address_temp = new Address($address_id, $title, $fname, $lname, 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'n/a', 'United Kingdom', 'false');
            $addressArray = json_encode(array($address_temp));

            $result = DatabaseFunctions::createUser('customers', $cus_stripe_id, $title, $fname, $lname, $dob, $email, $password, 'N/A', $addressArray);

            if ($result) {
                $msg = array(
                    'status'=>array(
                        'code'=> 101,
                        'code_status'=>'success'
                    ),
                    'data'=>array(
                        'msg'=>'new user created successfully'
                    ),
                    'user'=>array(
                        'stripe_id'=>$cus_stripe_id,
                        'title'=>$title,
                        'firstName'=>$fname,
                        'lastName'=>$lname,
                        'email'=>$email,
                        'address'=>$addressArray
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
                        'msg'=>'error adding user to database. try again'
                    )
                );

                exit(json_encode($msg));
            }

        }else {

            // alert user that they may already have an account.
            $msg = array(
                'status'=>array(
                    'code'=>401,
                    'code_status'=>'warning',
                ),
                'data'=> array(
                    'msg'=>'user already exists'
                )
            );

            exit(json_encode($msg));

        }


    }elseif (isset($_POST['type']) && $_POST['type'] === 'check') {

        $email = $_POST['email'];
        $email_real = filter_var($email, FILTER_VALIDATE_EMAIL);

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

        /*
            process the users emai
            - check if already exists
        */

        if (!DatabaseFunctions::checkExists($email) && $email_real) {

            // return success account can be created
            $msg = array(
                'status'=>array(
                    'code'=> 101
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
                    'msg'=>'Email already in use. Forgotten password?'
                )
            );

            exit(json_encode($msg));
        }
    }
 ?>
