<?php

    include 'dbconnect.php';

    if (isset($_POST['order'])) {

        $sku_items = array();

        try {
            \EasyPost\EasyPost::setApiKey("GApzToQ5BwOn9YlJ05H8iQ");
            \Stripe\Stripe::setApiKey("sk_test_o3lzBtuNJXFJOnmzNUfNjpXW");

            $order = \Stripe\Order::retrieve("or_1Bz1CvL06dWivKUTHhNXzn1G");
        //
            for ($item=0; $item < count($order['items']); $item++) {
                if ($order['items'][$item]['type'] === 'sku') {
                    $sku_id = $order['items'][$item]['parent'];

                    $sku = \Stripe\SKU::retrieve($sku_id);

                    array_push($sku_items, $sku);
                }
            }

            $to_address = array(
                "name"=> $order['shipping']['name'],
                "street1" => $order['shipping']['address']['line1'],
                "street2" => $order['shipping']['address']['line2'],
                "city"    => $order['shipping']['address']['city'],
                "state"   => "GB",
                "zip"     => $order['shipping']['address']['postal_code'],
                "country" => $order['shipping']['address']['country'],
                "phone"   => $order['shipping']['phone']
            );
        //
            $from_address = array(
                "street1" => "39 sandmere road",
                "street2" => "N/a",
                "city"    => "london",
                "state"   => "GB",
                "zip"     => "sw47ps",
                "country" => "UK",
                "company" => "IDYL",
                "phone"   => "415-123-4567"
            );
        //
            $error = false;

        } catch (\Stripe\Error\InvalidRequest $e) {
          // Invalid parameters were supplied to Stripe's API
          $body = $e->getJsonBody();
          $err  = $body['error'];
          $error = true;

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


        try {

            $shipment_parcels = array();
            //
            for ($parcel=0; $parcel < count($sku_items); $parcel++) {

                $parcel_array = array(
                    'weight'=>$sku_items[$parcel]['package_dimensions']['weight'],
                    'width'=>$sku_items[$parcel]['package_dimensions']['width'],
                    'length'=>$sku_items[$parcel]['package_dimensions']['length'],
                    'height'=>$sku_items[$parcel]['package_dimensions']['height']
                );

                array_push($shipment_parcels, array('parcel'=> $parcel_array, 'options'=>array('currency' => 'gbp')));
            }


            $shipment = \EasyPost\Order::create(array(
                "to_address"=> $to_address,
                "from_address"=>$from_address,
                "options"=>array(
                    'currency'=>"gbp"
                ),
                "shipments"=> $shipment_parcels
            ));

            $msg = array(
                'shipments'=> $shipment,
                'address'=>$to_address,
                'order'=> $order['shipping'],
                'success'=> true,
                'stripe_error'=> $error
            );

            $_SESSION['ep-ord'] = $shipment['id'];

            header('location: /scripts/createorder');

        } catch (\EasyPost\Error $e) {
             $easypost_error = $e->ecode;

             $msg = array(
                 'easy_post_error'=> $easypost_error,
                 'success'=> false,
                 'stripe_error'=> $error
             );

             exit(json_encode($msg));
        }


    }

 ?>
