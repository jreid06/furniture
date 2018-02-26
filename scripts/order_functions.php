<?php

    include 'dbconnect.php';

    if (isset($_POST['order'])) {

        $order_id = $_POST['order'];
        $new_rate = $_POST['rate'];
        $carrier = $_POST['carrier'];
        $carrier_service = $_POST['service'];

        // retrieve stripe order

        \Stripe\Stripe::setApiKey("sk_test_o3lzBtuNJXFJOnmzNUfNjpXW");

        $order = \Stripe\Order::retrieve($order_id);
        $order->selected_shipping_method = $new_rate;

        $order->metadata['chosen_carrier'] = $carrier;
        $order->metadata['chosen_service'] = $carrier_service;

        $order->save();

        $msg = array(
            'status'=>array(
                'code'=>101,
                'code_status'=>'success'
            ),
            'data'=>array(
                'new_amount'=>$order['amount'],
                'service'=> $order['metadata']['chosen_service']
            )
        );

        exit(json_encode($msg));
    }

 ?>

  <!--
    NOTE: Current postion

        - add buy easypost shipment/order to payment script
            - update order info with tracking details
                - tracking CODE
                - tracking URL

    -->
