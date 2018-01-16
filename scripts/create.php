<?php

    include 'dbconnect.php';

    \Stripe\Stripe::setApiKey("sk_test_o3lzBtuNJXFJOnmzNUfNjpXW");


    if (isset($_POST['basket'])) {
        $basket = json_decode($_POST['basket']);

        // create customer at this stage

        
        // $cus_order = \Stripe\Order::create(array(
        //     "items" => array(
        //         array(
        //           "type" => "sku",
        //           "parent" => "L01",
        //           "quantity"=>5
        //       ),
        //         array(
        //           "type" => "sku",
        //           "parent" => "L02"
        //       )
        //     ),
        //     "currency" => "gbp",
        //     "shipping" => array(
        //     "name" => "Mason Thomas",
        //         "address" => array(
        //           "line1" => "1234 Main Street",
        //           "city" => "San Francisco",
        //           "state" => "CA",
        //           "country" => "UK",
        //           "postal_code" => "SW456Y"
        //         )
        //     ),
        //     "email" => "mason.thomas@example.com"
        // ));
        //
        // $_COOKIE['order']=  $cus_order;

        if (isset($_POST['token'])) {

            \Stripe\Stripe::setApiKey("sk_test_o3lzBtuNJXFJOnmzNUfNjpXW");

            // $order = \Stripe\Order::retrieve($cus_order['id']);
            // $order->pay(array(
            //     "source" => $_POST['token'] // obtained with Stripe.js
            // ));
            //
            // $order_final = \Stripe\Order::retrieve($cus_order['id']);
            $msg = array(
                'one'=>'order created successfully',
                'two'=>$_POST['token'],
                'basket'=>isset($basket)?$basket:false
                // 'order'=>$cus_order
            );

            exit(json_encode($msg));
        }else {
            $msg = array(
                'order'=> $cus_order,
                'error'=>'order success error. No Token sent'
            );

            exit(json_encode($msg));
        }
    }







 ?>
