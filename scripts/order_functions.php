<?php

    include 'dbconnect.php';

    if (isset($_POST['order'])) {

        $order_id = $_POST['order'];
        $new_rate = $_POST['rate'];

        // retrieve stripe order

        \Stripe\Stripe::setApiKey("sk_test_o3lzBtuNJXFJOnmzNUfNjpXW");

        $order = \Stripe\Order::retrieve($order_id);
        $order->selected_shipping_method = $new_rate;
        $order->save();

        $msg = array(
            'status'=>array(
                'code'=>101,
                'code_status'=>'success'
            ),
            'data'=>array(
                'new_amount'=>$order['amount']
            )
        );

        exit(json_encode($msg));
    }

 ?>
