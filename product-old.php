<?php
    include dirname(__DIR__).'/idyldev/scripts/dbconnect.php';
?>
<!-- && isset($_GET['cat']) && $_GET['prod_slug'] -->
<?php if (isset($_GET['id']) && isset($_GET['cat']) && $_GET['prodtype'] && $_GET['slug']): ?>
<?php
    $productID = $_GET['id'];
    $category = $_GET['cat'];

    $product = DatabaseFunctions::getProductData($category, 'product_type', 'id', $productID, true);

    // echo "<pre style='position: absolute; z-index: 20000000; background-color: gold; right: 0'>";
    // var_dump($product);
    // echo "</pre>";
    // \Stripe\Stripe::setApiKey("sk_test_o3lzBtuNJXFJOnmzNUfNjpXW");
    // $products_all = \Stripe\Product::retrieve($productID);



    // check if id matches a product
    if (!$product[1]) {
        header("location: /pagenotfound");
    }

    // product has been found
    if ($product[0]) {
        include ROOT_PATH.'templates/header.php';
        include ROOT_PATH.'templates/nav.php';
        // echo "<pre>";
        // var_dump($product);
        // echo "</pre>";
        $product[1][0]['product_image'] = json_decode($product[1][0]['product_image'], true);

        // $product[1][0]['product_image'] = object_to_array($product[1]['product_image']);
        $product[1][0]['price'] = (int)$product[1][0]['price'];


        // get product from stripe




        \Stripe\Stripe::setApiKey("sk_test_o3lzBtuNJXFJOnmzNUfNjpXW");

        $stripe_product = \Stripe\SKU::all(array(
            "limit" => 3
        ));


        // $customer_order = \Stripe\Order::retrieve("or_1Bin2LL06dWivKUTDdIbxbjZ");
        // $customer_pay = \Stripe\Order::retrieve("or_1Bin2LL06dWivKUTDdIbxbjZ");
        // $customer_pay->pay(array(
        //     "source"=>"tok_amex"
        // ));

        // temporary variable to check if user is logged in
        $logged_in = true;

        if ($logged_in) {
            $customer_details = array(
                'name'=>'jason',
                'email'=>'jasontest@gmail.com',
                'phone'=>'079823 345 675'
            );
        }else {
            $customer_details = false;
        }

        $template = $twig->load('product.html.twig');
        echo $template->render(array(
            'product'=> $product[1][0],
            'message'=> 'lower case word',
            'stripe_key'=> $stripe['publishable_key'],
            'stripe_product'=> $stripe_product,
            'customer_details'=>$customer_details
        ));
    }else {
        // header("location: /pagenotfound");
        var_dump($product);
    }


 ?>

<?php else: ?>
    <div class="container products-container all-products">
        <p>ALL PRODUCTS WILL DISPLAY</p>
    </div>
<?php endif; ?>

<?php
	include ROOT_PATH.'templates/footer.php';
 ?>
