<?php

    include 'dbconnect.php';

    if (isset($_GET['filters'])) {

        $filters = $_GET['filters'];
        $category = $_GET['category'];

        \Stripe\Stripe::setApiKey("sk_test_o3lzBtuNJXFJOnmzNUfNjpXW");
        try {
            $stripe_products = \Stripe\Product::all(array(
                "limit" => 100
            ));

            $skus = getSkuData($stripe_products);
            $final_arr = array();

            if ($category === 'all') {

                for ($i=0; $i < count($skus); $i++) {
                    for ($j=0; $j < count($filters); $j++) {
                        if ($skus[$i]['attributes']['type'] === $filters[$j]) {
                            array_push($final_arr, $skus[$i]);
                        }
                    }
                }

                $msg = array(
                    'status'=>array(
                        'code'=> 101,
                        'code_status'=>'success'
                    ),
                    'data'=> array(
                        'msg'=> 'get filtered results. TYPE SPECIFIC ONLY. ALL CATEGORIES',
                        'data'=> $filters,
                        'res'=>$skus,
                        'filtered_skus'=>$final_arr
                    )
                );

                exit(json_encode($msg));
            }else {
                // return products only in specific category and with specific type
                for ($i=0; $i < count($skus); $i++) {
                    for ($j=0; $j < count($filters); $j++) {
                        if ($skus[$i]['attributes']['type'] === $filters[$j] && $skus[$i]['attributes']['category'] === $category) {
                            array_push($final_arr, $skus[$i]);
                        }
                    }
                }


                $msg = array(
                    'status'=>array(
                        'code'=> 101,
                        'code_status'=>'success'
                    ),
                    'data'=> array(
                        'msg'=> 'get filtered results. CATEGORY SPECIIFC & TYPE SPECIIFC',
                        'data'=> $filters,
                        'filtered_skus'=>$final_arr,
                        'type'=>gettype($stripe_products)
                    )
                );

                exit(json_encode($msg));
            }


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


    }
    else {

        // return all products if category equals all else sort through and return all products for specific category

        $category = $_GET['category'];

        \Stripe\Stripe::setApiKey("sk_test_o3lzBtuNJXFJOnmzNUfNjpXW");

        $stripe_products = \Stripe\Product::all(array(
            "limit" => 100
        ));

        $skus = getSkuData($stripe_products);

        // user is on products page so return all products
        if ($category === 'all') {
            $msg = array(
                'status'=>array(
                    'code'=> 101,
                    'code_status'=>'success'
                ),
                'data'=> array(
                    'msg'=> 'show all products. no filter selected',
                    'filtered_skus'=> $skus,
                    'type'=>gettype($stripe_products),
                    'object_vars'=> get_object_vars($stripe_products),
                    'object_toarray'=> object_to_array($stripe_products)
                )
            );

             exit(json_encode($msg));
        }
        else {
            // return all products that are of a specific category as no filter is selected
            $final_arr = array();

            for ($i=0; $i < count($skus); $i++) {
                if ($skus[$i]['attributes']['category'] === $category) {
                    array_push($final_arr, $skus[$i]);
                }
            }

            $msg = array(
                'status'=>array(
                    'code'=> 101,
                    'code_status'=>'success'
                ),
                'data'=> array(
                    'msg'=> 'get filtered results. CATEGORY SPECIIFC',
                    'filtered_skus'=>$final_arr,
                    'type'=>gettype($stripe_products)
                )
            );

            exit(json_encode($msg));
        }



    }


 ?>
