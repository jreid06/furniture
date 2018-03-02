<?php

    include 'dbconnect.php';

    if (isset($_POST['type']) && isset($_POST['emailsub'])) {

        $email = $_POST['emailsub'];

        // validate email
        $email_real = filter_var($email, FILTER_VALIDATE_EMAIL);

        if ($email_real) {

            // check if email already exists on mailing list
            $email_exists = DatabaseFunctions::checkDataExists('mailinglist', 'email', $email);

            if ($email_exists) {
                // return to user that their email has already been subscribed

                $msg = array(
                    'status'=> array(
                        'code'=> 404,
                        'code_status'=> 'warn'
                    ),
                    'data'=> array(
                        'msg'=> 'You are already subscribed to our mailing list. Stay tuned for some exclusive offers'
                    )
                );

                exit(json_encode( $msg ));

            }else {
                // add email to subscription list
                $customer_mail_list_id = bin2hex(random_bytes(5));
                $activated = 'false';

                $result = DatabaseFunctions::addToMailingList('(customer_mail_id, email, activated)', $customer_mail_list_id, $email, $activated);

                if ($result[0]) {
                    $msg = array(
                        'status'=> array(
                            'code'=> 101,
                            'code_status'=> 'success'
                        ),
                        'data'=> array(
                            'msg'=> 'successfully added to our mailing list. Stay tuned for exclusive offers'
                        )
                    );

                    exit(json_encode( $msg ));
                }else {
                    $msg = array(
                        'status'=> array(
                            'code'=> 404,
                            'code_status'=> 'error'
                        ),
                        'data'=> array(
                            'msg'=> 'error adding email to our mailing list. Try again or contact help',
                            'query'=>$result[1],
                            'error'=>$result[2]
                        )
                    );

                    exit(json_encode( $msg ));
                }


            }


        }else {
            $msg = array(
                'status'=> array(
                    'code'=> 404,
                    'code_status'=> 'error'
                ),
                'data'=> array(
                    'msg'=> 'Email entered was not valid. Please enter a real email address'
                )
            );

            exit(json_encode( $msg ));
        }


    }else {

        $msg = array(
            'status'=> array(
                'code'=> 404,
                'code_status'=> 'error'
            ),
            'data'=> array(
                'msg'=> 'error subscribing to out mailing list. Please try another email or contact help',
                'data'=>$_POST
            )
        );

        exit(json_encode( $msg ));
    }

 ?>
