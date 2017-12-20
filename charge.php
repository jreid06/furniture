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
          'amount'   => 20000,
          'currency' => 'gbp'
      ));

      echo '<h1>Successfully charged £'. number_format($charge['amount'],2) . '!</h1>';
?>
