<?php
    include dirname(__DIR__).'/idyldev/scripts/dbconnect.php';

    if (isset($_GET['orderid'])) {

        $confirmed_order_ID = $_GET['orderid'];
        $error = false;

        try {
          // retrieve order data
          \Stripe\Stripe::setApiKey("sk_test_o3lzBtuNJXFJOnmzNUfNjpXW");

          $confirmed_order = \Stripe\Order::retrieve($confirmed_order_ID);
          $error = false;

        } catch (\Stripe\Error\InvalidRequest $e) {
          // Invalid parameters were supplied to Stripe's API
          $body = $e->getJsonBody();
          $err  = $body['error'];
          $error = true;

          header('location: /basket');

        } catch (\Stripe\Error\Authentication $e) {
          // Authentication with Stripe's API failed
          // (maybe you changed API keys recently)
          $body = $e->getJsonBody();
          $err  = $body['error'];
          $error = true;

        } catch (\Stripe\Error\ApiConnection $e) {
          // Network communication with Stripe failed
          $body = $e->getJsonBody();
          $err  = $body['error'];
          $error = true;

        } catch (\Stripe\Error\Base $e) {
          // Display a very generic error to the user, and maybe send
          // yourself an email
          $body = $e->getJsonBody();
          $err  = $body['error'];
          $error = true;

        } catch (Exception $e) {
          // Something else happened, completely unrelated to Stripe
          $body = $e->getJsonBody();
          $err  = $body['error'];
          $error = true;

        }

        include ROOT_PATH.'templates/header.php';
        include ROOT_PATH.'templates/nav.php';
    }
    else {
        header('location: /basket');
        die();
    }

 ?>

 <div class="container home checkout-home">
     <?php if (!$error): ?>

         <div class="row">
             <div class="col-12">
                 <br>
                 <h1 class="text-center">ORDER CONFIRMATION</h1>
                 <hr>
                 <br>
                 <div class="order-message">
                    <h3>Hey <?=$confirmed_order['shipping']['name']?>, your order has been confirmed. A confirmation email will be sent shortly</h3>
                    <br>
                    <h5>Thank you for shopping with IDYL. Your items will be shipped within 2 working days and once dispatched, will reach your place of residence within the chosen delievery period</h5>
                    <br>
                    <h5>View all order details below. Save a copy of the page for your records</h5>
                 </div>
                 <br>
                 <hr>
             </div>
             <div class="col-12">
                 <br>
                 <h4>IYDL ORDER ID: #<?= $confirmed_order['id']?> <span class="badge badge-success"><?= strtoupper($confirmed_order['status'])?></span></h4>
                 <br>
                 <?php
                    $metadata_keys = array();
                    for ($item=0; $item < count($confirmed_order['items']); $item++) {
                        if ($confirmed_order['items'][$item]['type'] === 'sku') {
                            array_push($metadata_keys, array( 'name'=>$confirmed_order['items'][$item]['description'], 'shipment_id' => 'shipment-id-'.($item+1), 'tracker_code' => 'tracking-'.($item+1), 'carrier'=>$confirmed_order['metadata']['chosen_carrier']));
                        }
                    }

                     $template = $twig->load('order-confirmation.html.twig');
                     echo $template->render(array(
                         'order'=>$confirmed_order,
                         'metadata_details'=>$metadata_keys,
                         'metadata_length'=>count($confirmed_order['metadata'])
                     ));
                  ?>
             </div>
         </div>

    <?php else: ?>
        <div class="row">
            <div class="col-12">
                <h1><?= $err['message'] ?></h1>
            </div>
        </div>
     <?php endif; ?>
 </div>

 <?php
    include ROOT_PATH.'templates/footer.php';
 ?>
