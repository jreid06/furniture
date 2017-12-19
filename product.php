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
    $template = $twig->load('product.html.twig');
    echo $template->render(array(
        'product'=> $product,
        'test'=>'JASON',
        'message'=> 'lower case word',
        'stripe_key'=> $stripe['publishable_key']
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
