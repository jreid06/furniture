<?php
    include 'scripts/dbconnect.php';
    $id = bin2hex(random_bytes(20));
    $user_address = new Address($id, 'Mr.', 'jason', 'reid', '0207675464', '39 testing road', 'n/a', 'n/a', 'london', 'sw3 56g', 'United Kingdom');

    echo $user_address->title;
    echo "<br>";
    echo $user_address->fullname();

    $arr = array();

    array_push($arr, $user_address);

    echo "<br>";
    echo "<br>";
    var_dump($arr);

    $id = bin2hex(random_bytes(20));
    echo "<br>";
    echo "<br>";

    echo "Random id: " . bin2hex(random_bytes(8)) . "<br>";
    echo "Random id: " . bin2hex(random_bytes(8)) . "<br>";
    echo "Random id: " . bin2hex(random_bytes(8)) . "<br>";
    echo "Random id: " . bin2hex(random_bytes(8)) . "<br>";
    echo "Random id: " . bin2hex(random_bytes(8)) . "<br>";
    echo "Random id: " . bin2hex(random_bytes(8)) . "<br>";
    echo "Random id: " . bin2hex(random_bytes(8)) . "<br>";

    $msg = array(
        'S'=>false,
        'M'=>false,
        'L'=>false,
        'XL'=>false
    );

    echo json_encode($msg);

    echo "<br>";
    echo "<br>";

    // test add customer to stripe

    $details = array(
        'title'=>'Mr.',
        'fname'=>'Jason',
        'lname'=> 'Reid',
        'dob'=> '1994-06-29',
        'email'=> 'jasonbrandon9406@gmail.com'
    );

    // \Stripe\Stripe::setApiKey("sk_test_o3lzBtuNJXFJOnmzNUfNjpXW");
    //
    // $customer_stripe = \Stripe\Customer::create(array(
    //   "description" => "Customer for " .$details['email'],
    //   "metadata"=>array(
    //       'title'=>$details['title'],
    //       'first_name'=>$details['fname'],
    //       'last_name'=>$details['lname'],
    //       'email'=>$details['email'],
    //       'dob'=>$details['dob']
    //   ),
    //   'email'=>$details['email']
    // ));


    echo "<br>";
    echo "<br>";

    \Stripe\Stripe::setApiKey("sk_test_o3lzBtuNJXFJnmzNUfNjpXW");

    try {
        // $products_all = \Stripe\Product::retrieve("prod_CDME1dinY2YyTr");
        $products_all = \Stripe\Product::all(array(
            "limit" => 6,
        ));

        for ($i=0; $i < count($products_all['data']); $i++) {
            echo $products_all['data'][$i]['id']."<br>";
            echo $products_all['data'][$i]['name']."<br>";
            for ($j=0; $j < count($products_all['data'][$i]['skus']['data']); $j++) {
                echo $products_all['data'][$i]['skus']['data'][$j]['id']."<br>";
                // echo "<br>";
            }
            echo "<br>";
        }
        echo "<pre>";
        print_r($products_all['data']);
        echo "</pre>";

    } catch(Stripe_CardError $e) {
        $body = $e->getJsonBody();
        $err  = $body['error'];

        $error1 = $e->getMessage();
        echo "error1: ".$error1;
    } catch (Stripe_InvalidRequestError $e) {
        $body = $e->getJsonBody();
        $err  = $body['error'];
          // Invalid parameters were supplied to Stripe's API
          $error2 = $e->getMessage();
          echo "error2: ".$error2."--";

    } catch (Stripe_AuthenticationError $e) {
        $body = $e->getJsonBody();
        $err  = $body['error'];
      // Authentication with Stripe's API failed
      $error3 = $e->getMessage();
      echo "error3: ".$error3."--";

    } catch (Stripe_ApiConnectionError $e) {
        $body = $e->getJsonBody();
        $err  = $body['error'];
      // Network communication with Stripe failed
      $error4 = $e->getMessage();
      echo "error4: ".$error4."--";

    } catch (Stripe_Error $e) {
        $body = $e->getJsonBody();
        $err  = $body['error'];
      // Display a very generic error to the user, and maybe send
      // yourself an email
      $error5 = $e->getMessage();
      echo "error5: ".$error5."--";

    } catch (Exception $e) {
        $body = $e->getJsonBody();
        var_dump($body);
      // Something else happened, completely unrelated to Stripe
      $error6 = $body['error']['type'];
      echo "error6: ".$error6;


    }



    // echo $products_all['skus'];
    // echo "<br>";
    // echo "<br>";
    // $data = $products_all['skus']['data'];
    //
    // for ($i=0; $i < count($data); $i++) {
    //     echo $data[$i]['id']."<br>";
    // }
    //
    // echo "<pre>";
    // var_dump($data);
    // echo "</pre>";
    //
    // echo "<br>";
    // echo "<br>";

    // echo "<pre>";
    // var_dump($products_all);
    // echo "</pre>";



 ?>
