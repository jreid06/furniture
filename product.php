<?php
    include dirname(__DIR__).'/furniture/scripts/dbconnect.php';
	include ROOT_PATH.'templates/header.php';
    include ROOT_PATH.'templates/nav.php';
?>

<?php if (isset($_GET['id'])): ?>
<?php
    $productID = $_GET['id'];
    $product = DatabaseFunctions::getData('*', 'livingroom', 'id', $productID, false);
    $product['product_image'] = json_decode($product['product_image']);

    $product['product_image'] = object_to_array($product['product_image']);
    $product['price'] = (int)$product['price'];


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
        'product'=> $product,
        'message'=> 'lower case word',
        'stripe_key'=> $stripe['publishable_key'],
        'stripe_product'=> $stripe_product,
        'customer_details'=>$customer_details
    ));
 ?>

<?php else: ?>
    <div class="container products-container all-products">
        <p>ALL PRODUCTS WILL DISPLAY</p>
    </div>
<?php endif; ?>

<?php
	include ROOT_PATH.'templates/footer.php';
 ?>
