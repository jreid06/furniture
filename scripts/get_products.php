<?php

    include 'dbconnect.php';

    if (isset($_POST['all'])) {
        // $productID = $_POST['id'];
        $products = DatabaseFunctions::getProductData('livingroom', 'product_type', 'id', false, false);


        // get products from stripe api
        \Stripe\Stripe::setApiKey("sk_test_o3lzBtuNJXFJOnmzNUfNjpXW");
        // \Stripe\Stripe::setApiKey("sk_test_o3lzBtuNJXFJOnmzNUfNjpXW");
        try {
            // $products_all = \Stripe\Product::retrieve("prod_CDME1dinY2YyTr");
            $products_all = \Stripe\Product::all(array(
                "limit" => 6
            ));

            // for ($i=0; $i < count($products_all['data']); $i++) {
                //     echo $products_all['data'][$i]['id']."<br>";
                //     echo $products_all['data'][$i]['name']."<br>";
                //     echo $products_all['data'][$i]['skus']['data'][$i]['id']."<br>";
                //     echo "<br>";
                // }

            // // // / / / /// /// // // // // // // //

            $msg = array(
                'status'=> 'success',
                'product'=> $products_all['data']
            );

            exit(json_encode($msg));

        } catch(Stripe_CardError $e) {
            $body = $e->getJsonBody();
            $err  = $body['error'];

            $error1 = $body['error']['type'];


            $msg = array(
                'status'=> 'error',
                'product'=> $error1
            );

            exit(json_encode($msg));

        } catch (Stripe_InvalidRequestError $e) {
            $body = $e->getJsonBody();
            $err  = $body['error'];
              // Invalid parameters were supplied to Stripe's API
              $error2 = $body['error']['type'];

              $msg = array(
                  'status'=> 'error',
                  'product'=> $error2
              );

              exit(json_encode($msg));

        } catch (Stripe_AuthenticationError $e) {
            $body = $e->getJsonBody();
            $err  = $body['error'];
          // Authentication with Stripe's API failed
          $error3 = $body['error']['type'];

          $msg = array(
              'status'=> 'error',
              'product'=> $error3
          );

          exit(json_encode($msg));

        } catch (Stripe_ApiConnectionError $e) {
            $body = $e->getJsonBody();
            $err  = $body['error'];
          // Network communication with Stripe failed
          $error4 = $body['error']['type'];

          $msg = array(
              'status'=> 'error',
              'product'=> $error4
          );

          exit(json_encode($msg));

        } catch (Stripe_Error $e) {
            $body = $e->getJsonBody();
            $err  = $body['error'];
          // Display a very generic error to the user, and maybe send
          // yourself an email
          $error5 = $body['error']['type'];

          $msg = array(
              'status'=> 'error',
              'product'=> $error5
          );

          exit(json_encode($msg));


        } catch (Exception $e) {
            $body = $e->getJsonBody();
            // var_dump($body);
          // Something else happened, completely unrelated to Stripe
          $error6 = $body['error']['type'];
          $err_msg =  $body['error']['message'];

          $msg = array(
              'status'=> 'error',
              'error_type'=> $error6,
              'error_msg'=> $err_msg
          );

          exit(json_encode($msg));

      }

    }else {
        $msg = array(
            'status'=> 'error'
        );

        exit(json_encode($msg));
    }

 ?>
