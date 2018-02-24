<?php

    include 'dbconnect.php';

    if (isset($_POST['order'])) {

        try {
            \EasyPost\EasyPost::setApiKey("GApzToQ5BwOn9YlJ05H8iQ");
            $shipment = \EasyPost\Order::retrieve('or_1Bz1CvL06dWivKUTHhNXzn1G');

            $msg = array(
                'shipment'=> $shipment,
                'success'=> true
            );

        } catch (\EasyPost\Error $e) {
             $easypost_error = $e->ecode;

             $msg = array(
                 'shipment'=> $easypost_error,
                 'success'=> false
             );
        }

        exit(json_encode($msg));
    }

 ?>
