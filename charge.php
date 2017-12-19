<?php

      include dirname(__DIR__).'/furniture/scripts/dbconnect.php';
      $token  = $_POST['stripeToken'];
      $email  = $_POST['stripeEmail'];

      $customer = \Stripe\Customer::create(array(
          'email' => $email,
          'source'  => $token
      ));

      $charge = \Stripe\Charge::create(array(
          'customer' => $customer->id,
          'amount'   => 5000,
          'currency' => 'gbp'
      ));

      echo '<h1>Successfully charged £50.00!</h1>';
?>
