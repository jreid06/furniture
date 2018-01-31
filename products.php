<?php
    include dirname(__DIR__).'/furniture/scripts/dbconnect.php';
    // define('ROOT_PATH', dirname(__DIR__).'/furniture/');
	include ROOT_PATH.'templates/header.php';
    include ROOT_PATH.'templates/nav.php';

    // turn query paremeters into an assosiative array
    parse_str($_SERVER['QUERY_STRING'], $output);

    // check whart paremeters have been added to determine what product data to get
    if (!isset($_GET['cat']) || !$_GET['cat']) {
        $data = 'show all products';

        \Stripe\Stripe::setApiKey("sk_test_o3lzBtuNJXFJOnmzNUfNjpXW");
        $stripe_products = \Stripe\Product::all(array(
            "limit" => 20
        ));

        $details = array(
            'num_of_products'=>'all',
            'products'=>$stripe_products
        );

        $breadcrumbs = array();
    }
    elseif ($output['cat'] && isset($output['prodtype']) && !empty($output['prodtype'])) {
        $data = 'show specific type of product in a certain category e.g all cushions';
        $category = $output['cat'];
        $prod_type = $output['prodtype'];

        \Stripe\Stripe::setApiKey("sk_test_o3lzBtuNJXFJOnmzNUfNjpXW");
        $stripe_products = \Stripe\Product::all(array(
            "limit" => 20
        ));

        $details = array(
            'num_of_products'=>'specific',
            'category' => $category,
            'type' => $prod_type,
            'products'=>$stripe_products
        );

        $breadcrumbs = array(
            'one'=>$category,
            'two'=>$prod_type
        );

    }
    else if ($output['cat']) {
        $data = 'show all products in category';
        $category = $output['cat'];

        \Stripe\Stripe::setApiKey("sk_test_o3lzBtuNJXFJOnmzNUfNjpXW");
        $stripe_products = \Stripe\Product::all(array(
            "limit" => 20
        ));

        $details = array(
            'num_of_products'=>'all-cat',
            'category' => $category,
            'products'=> $stripe_products
        );

        $breadcrumbs = array(
            'one'=> $category
        );
    }

    $template = $twig->load('products.html.twig');
    echo $template->render(array(
        'msg' => $data,
        'breadcrumb'=>$breadcrumbs,
        'queryDetails'=> isset($details)?$details:false
    ));



     include ROOT_PATH.'templates/footer.php';
?>
