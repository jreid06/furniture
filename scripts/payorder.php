<?php

    include 'dbconnect.php';

    \Stripe\Stripe::setApiKey("sk_test_o3lzBtuNJXFJOnmzNUfNjpXW");

    if (isset($_POST['token'])) {
        $token = $_POST['token'];
        $order_id = $_POST['order'];
        $customer_id_session = false;

        if (isset($_SESSION['idyl_qni'])) {
            $customer_id_session = $_SESSION['idyl_qni'];


        }elseif (isset($_COOKIE['idyl_qni'])) {
            $customer_id_session = $_COOKIE['idyl_qni'];

        }
        // $customer_id_cookie = isset($_COOKIE['idyl_qni'])?$_COOKIE['idyl_qni']:false;

        try {

            $order = \Stripe\Order::retrieve($order_id);
            $order->pay(array(
                "source" => $token,
                "email" => $order['email']
            ));

            // pay for order and update database with order details for customer if logged in
            if ($customer_id_session) {

                $order_json = json_encode($order);

                $result = DatabaseFunctions::addOrderData('orders', '(stripe_id, cus_id, order_json)', $order['id'], $customer_id_session, $order_json);

                if ($result) {
                    $update_status = 'successfully saved in database';
                }else {
                    $update_status = 'order not successfully saved in database';
                }
            }

            // update charge to send automatic email
            $charge_id = $order['charge'];
            $recipient = $order['email'];

            // $receipt_status = send_receipt($charge_id, $recipient);
            $customer_charge = \Stripe\Charge::retrieve($order['charge']);
            $customer_charge->receipt_email = $order['email'];
			$customer_charge->save();

            // create shipment information

        } catch(Stripe_CardError $e) {
            $body = $e->getJsonBody();
            $err  = $body['error'];

            $error1 = $body['error']['type'];


            $msg = array(
                'status'=> array(
                    'code'=>404,
                    'code_status'=>'error',
                    'type'=> $error1
                )
            );

            exit(json_encode($msg));
            // var_dump($msg);

        } catch (Stripe_InvalidRequestError $e) {
            $body = $e->getJsonBody();
            $err  = $body['error'];
              // Invalid parameters were supplied to Stripe's API
              $error2 = $body['error']['type'];

              $msg = array(
                  'status'=> array(
                      'code'=>404,
                      'code_status'=>'error',
                      'type'=> $error2
                  )
              );

              exit(json_encode($msg));
              // var_dump($msg);

        } catch (Stripe_AuthenticationError $e) {
            $body = $e->getJsonBody();
            $err  = $body['error'];
          // Authentication with Stripe's API failed
          $error3 = $body['error']['type'];

          $msg = array(
              'status'=> array(
                  'code'=>404,
                  'code_status'=>'error',
                  'type'=> $error3
              )
          );

          exit(json_encode($msg));
          // var_dump($msg);

        } catch (Stripe_ApiConnectionError $e) {
            $body = $e->getJsonBody();
            $err  = $body['error'];
          // Network communication with Stripe failed
          $error4 = $body['error']['type'];

          $msg = array(
              'status'=> array(
                  'code'=>404,
                  'code_status'=>'error',
                  'type'=> $error4
              )
          );

          exit(json_encode($msg));
          // var_dump($msg);

        } catch (Stripe_Error $e) {
            $body = $e->getJsonBody();
            $err  = $body['error'];
          // Display a very generic error to the user, and maybe send
          // yourself an email
          $error5 = $body['error']['type'];

          $msg = array(
              'status'=> array(
                  'code'=>404,
                  'code_status'=>'error',
                  'type'=> $error5
              )
          );

          exit(json_encode($msg));
          // var_dump($msg);

        } catch (Exception $e) {
            $body = $e->getJsonBody();
            // var_dump($body);
          // Something else happened, completely unrelated to Stripe
          $error6 = $body['error']['type'];
          $err_msg =  $body['error']['message'];

          $msg = array(
              'status'=> array(
                  'code'=>404,
                  'code_status'=>'error',
                  'type'=> $error6,
                  'msg'=> $err_msg
              )
          );

          exit(json_encode($msg));
          // var_dump($msg);
          // header('location: /products');

      }


      try {
          \EasyPost\EasyPost::setApiKey("GApzToQ5BwOn9YlJ05H8iQ");

          $shipment = \EasyPost\Shipment::retrieve($order['id']);
          // $shipment->buy(array(
          //   'rate'      => $order['selected_shipping_method']
          // ));

          // $order->shipping['carrier'] = $shipment['selected_rate']['carrier'];
          // $order->shipping['tracking_number'] = $shipment['tracking']['tracking_code'];
          // $order->save();

          // if ($receipt_status[0]) {
          $easypost_error =  false;

          $msg = array(
              'status'=>array(
                  'code'=>101,
                  'code_status'=> 'success'
              ),
              'data'=>array(
                  'msg'=>'order successfully paid. with shipping',
                  'databse_status'=> $update_status,
                  'loggedin_msg' => 'charge to new customer. email send automatically',
                  'final_order'=>$order,
                  'chargeDetails'=>$customer_charge,
                  'easy_post_error' => $easypost_error,
                  'shippment_details'=>$shipment,
                  'receipt_status'=> true
              )
          );

          exit(json_encode($msg));


     }catch (\EasyPost\Error $e) {
          $easypost_error = $e->ecode;
          $shipment = false;

          $msg = array(
              'status'=>array(
                  'code'=>101,
                  'code_status'=> 'warn'
              ),
              'data'=>array(
                  'msg'=>'order successfully paid. shipping details error',
                  'final_order'=>$order,
                  'chargeDetails'=>$customer_charge,
                  'easy_post_error' => $easypost_error,
                  'shippment_details'=>$shipment
              )
          );

          exit(json_encode($msg));
      }

    }
    else {

        $msg = array(
            'status'=>array(
                'code'=>404,
                'code_status'=> 'error'
            ),
            'data'=>array(
                'msg'=>'error with payment. Token not valid or doesnt exist. Contact help'
            )
        );

        exit(json_encode($msg));

    }

 ?>
