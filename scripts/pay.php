<?php

    if (isset($_POST['token'])) {

        exit('token set ' + $_POST['token']);
        // \Stripe\Stripe::setApiKey("sk_test_o3lzBtuNJXFJOnmzNUfNjpXW");
        //
        // $order = \Stripe\Order::retrieve("or_1BimEYL06dWivKUTVgImFSVZ");
        // $order->pay(array(
        //     "source" => $_POST['token'] // obtained with Stripe.js
        // ));
    }

 ?>
