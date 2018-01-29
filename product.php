<?php
    include dirname(__DIR__).'/furniture/scripts/dbconnect.php';
?>
<!-- && isset($_GET['cat']) && $_GET['prod_slug'] -->
<?php if (isset($_GET['id']) && isset($_GET['cat']) && $_GET['prodtype'] && $_GET['slug']): ?>
<?php
    $productID = $_GET['id'];
    $sku_id = $_GET['skuid'];
    $type = $_GET['prodtype'];
    $slug = $_GET['slug'];
    $category = $_GET['cat'];

    \Stripe\Stripe::setApiKey("sk_test_o3lzBtuNJXFJOnmzNUfNjpXW");
    try {
        include ROOT_PATH.'templates/header.php';
        include ROOT_PATH.'templates/nav.php';

        // product has been found
        $products_all = \Stripe\Product::retrieve($productID);
        $product = $products_all['skus']['data'];
        // loop through sku and get correct product using $sku_id

        for ($i=0; $i < count($product); $i++) {
            if ($product[$i]['id'] === $sku_id) {
                $selected_sku_product = $product[$i];
            }
        }

        // add the needed data to selected product array
        $selected_sku_product['prod_name'] = $products_all['name'];
        $selected_sku_product['prod_desc'] = $products_all['description'];
        $selected_sku_product['prod_slug'] = $products_all['metadata']['slug'];

        $template = $twig->load('product.html.twig');
        echo $template->render(array(
            'product'=> $products_all,
            'skuprod'=> $selected_sku_product,
            'category'=> $category,
            'type'=> $type
        ));


    } catch(Stripe_CardError $e) {
        $body = $e->getJsonBody();
        $err  = $body['error'];

        $error1 = $body['error']['type'];


        $msg = array(
            'status'=> 'error',
            'product'=> $error1
        );

        // exit(json_encode($msg));
        var_dump($msg);

    } catch (Stripe_InvalidRequestError $e) {
        $body = $e->getJsonBody();
        $err  = $body['error'];
          // Invalid parameters were supplied to Stripe's API
          $error2 = $body['error']['type'];

          $msg = array(
              'status'=> 'error',
              'product'=> $error2
          );

          // exit(json_encode($msg));
          var_dump($msg);

    } catch (Stripe_AuthenticationError $e) {
        $body = $e->getJsonBody();
        $err  = $body['error'];
      // Authentication with Stripe's API failed
      $error3 = $body['error']['type'];

      $msg = array(
          'status'=> 'error',
          'product'=> $error3
      );

      // exit(json_encode($msg));
      var_dump($msg);

    } catch (Stripe_ApiConnectionError $e) {
        $body = $e->getJsonBody();
        $err  = $body['error'];
      // Network communication with Stripe failed
      $error4 = $body['error']['type'];

      $msg = array(
          'status'=> 'error',
          'product'=> $error4
      );

      // exit(json_encode($msg));
      var_dump($msg);

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

      // exit(json_encode($msg));
      var_dump($msg);

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

      // exit(json_encode($msg));
      var_dump($msg);

  }


 ?>
<?php endif; ?>

<?php
	include ROOT_PATH.'templates/footer.php';
 ?>
