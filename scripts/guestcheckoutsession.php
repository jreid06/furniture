<?php

    include 'dbconnect.php';

    if (isset($_POST['type'])) {

        if ($_POST['type'] === 'personal') {
            if (isset($_POST['user_details'])) {

                $user = $_POST['user_details'];

                // store the customers details in a session
                $_SESSION['guest_details'] = $user;

                $msg = array(
                    'status'=>array(
                        'code'=>101,
                        'code_status'=> 'success'
                    ),
                    'data'=>array(
                        'session'=>$_SESSION
                    )
                );

                exit(json_encode( $msg ));
            }else {

                $msg = array(
                    'status'=>array(
                        'code'=>404,
                        'code_status'=> 'error'
                    ),
                    'data'=>array(
                        'msg'=> 'user details not saved successfully. Contact us for more help'
                    )
                );

                exit(json_encode( $msg ));
            }
        }

        if ($_POST['type'] === 'shipping') {
            if (isset($_POST['shipping_details'])) {

                $shipping = $_POST['shipping_details'];
                $basket = $_POST['basket_data'];

                // store the customers details in a session
                $_SESSION['guest_shipping'] = $shipping;
                $_SESSION['guest_basket'] = $basket;

                $msg = array(
                    'status'=>array(
                        'code'=>101,
                        'code_status'=> 'success'
                    ),
                    'data'=>array(
                        'session'=>$_SESSION
                    )
                );

                exit(json_encode( $msg ));
            }else {

                $msg = array(
                    'status'=>array(
                        'code'=>404,
                        'code_status'=> 'error'
                    ),
                    'data'=>array(
                        'msg'=> 'user shipping address details not saved successfully. Try again or contact us for more help'
                    )
                );

                exit(json_encode( $msg ));
            }
        }

    }
    else {
        header('location: /');
        die();
    }

 ?>
