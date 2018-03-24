<?php
    include dirname(__DIR__).'/idyldev/scripts/dbconnect.php';
?>
<!-- && isset($_GET['cat']) && $_GET['prod_slug'] -->
<?php if (isset($_GET['id']) && isset($_GET['cat']) && $_GET['prodtype'] && $_GET['slug']): ?>
<?php
    $productID = $_GET['id'];
    $sku_id = $_GET['skuid'];
    $type = $_GET['prodtype'];
    $slug = $_GET['slug'];
    $category = $_GET['cat'];
    $categories_arr = array('livingroom','bedroom', 'bath', 'kitchen');
    $real_cat = false;

    // get list of categories dynamically
    Connect::checkConnection();
    $dynamic_categories_data = DatabaseFunctions::getDataLimit('*', 'navigation', 'nav_is_cat', 'yes', false, false);
    $dynamic_categories = array();

    if ($dynamic_categories_data[0]) {
        $dynamic_categories_data = $dynamic_categories_data[1];
    }

    for ($dy=0; $dy < count($dynamic_categories_data); $dy++) {
        // check if link is active
        if ($dynamic_categories_data[$dy]['nav_status'] === 'true') {
            array_push($dynamic_categories, $dynamic_categories_data[$dy]['nav_title']);
        }
    }

    for ($i=0; $i < count($dynamic_categories); $i++) {
        if ($category === $dynamic_categories[$i]) {
            $real_cat = true;
        }
    }

    if (!$real_cat) {
        header('location: /products');
    }

    $featured_products = get_products(6);

    \Stripe\Stripe::setApiKey("sk_test_o3lzBtuNJXFJOnmzNUfNjpXW");
    try {

        $products_all = \Stripe\Product::retrieve($productID);

        include ROOT_PATH.'templates/header.php';

        // products has been found
        $product = $products_all['skus']['data'];
        // loop through sku and get correct product using $sku_id
        $match = false;
        // checks to make sure product ID in url matches product in stripe database
        for ($i=0; $i < count($product); $i++) {
            if ($product[$i]['id'] === $sku_id) {
                $match = true;
                $selected_sku_product = $product[$i];
            }
        }

        // will redirect user to products page if product doesnt exist
        if (!$match) {
             header('location: /products');
        }

        include ROOT_PATH.'templates/nav.php';

        // add the needed data to selected product array
        $selected_sku_product['prod_name'] = $products_all['name'];
        $selected_sku_product['prod_desc'] = $products_all['description'];
        $selected_sku_product['prod_slug'] = $products_all['metadata']['slug'];

        // convert all details into an array to be looped on front end
        if (isset($selected_sku_product['attributes']['detail_bullets'])) {
            $selected_sku_product['attributes']['detail_bullets'] = array_map('trim', explode(',', $selected_sku_product['attributes']['detail_bullets']));
        }

        // get product imagedata from database
        $table_name = 'images_'.$category;
        $image_data = DatabaseFunctions::getData('images', $table_name, 'sku_id', $selected_sku_product['id']);


        // $image_data[1] = json_decode( $image_data[1], true );



        // echo "<pre style='position: absolute; z-index: 100000; background-color: #f2f2f2'>";
        //     // var_dump($selected_sku_product);
        //     var_dump($selected_sku_product);
        // echo "</pre>";

        $template = $twig->load('product.html.twig');
        echo $template->render(array(
            'product'=> $products_all,
            'featured_products'=> $featured_products,
            'skuprod'=> $selected_sku_product,
            'category'=> $category,
            'type'=> $type,
            'images'=>isset($image_data[1])? json_decode( $image_data[1]['images'], true ):false
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
      header('location: /products');

  }


 ?>
<?php endif; ?>

<?php
	include ROOT_PATH.'templates/footer.php';
 ?>
