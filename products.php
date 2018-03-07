<?php
    include dirname(__DIR__).'/idyldev/scripts/dbconnect.php';
    // define('ROOT_PATH', dirname(__DIR__).'/furniture/');
    include ROOT_PATH.'templates/header.php';

    // turn query paremeters into an assosiative array
    parse_str($_SERVER['QUERY_STRING'], $output);

    // check what paremeters have been added to determine what product data to get
    if (!isset($_GET['cat']) || $_GET['cat'] === 'gifts') {
        include ROOT_PATH.'templates/nav.php';
        $data = 'show all products';
        $category = 'all';

        \Stripe\Stripe::setApiKey("sk_test_o3lzBtuNJXFJOnmzNUfNjpXW");
        $stripe_products = \Stripe\Product::all(array(
            "limit" => 20
        ));

        if (isset($_GET['cat']) && $_GET['cat'] === 'gifts') {
            $details = array(
                'num_of_products' => 'gifts',
                'products' => $stripe_products,
                'category'=> $category
            );
        }else {
            $details = array(
                'num_of_products'=>'all',
                'products'=>$stripe_products,
                'category'=> $category
            );
        }

        $breadcrumbs = array();
    }
    elseif ($output['cat'] && isset($output['prodtype']) && !empty($output['prodtype'])) {
        $data = 'show specific type of product in a certain category e.g all cushions';
        $category = $output['cat'];
        $categories_arr = array('livingroom','bedroom', 'bath', 'kitchen');
        $real_cat = false;

        for ($i=0; $i < count($categories_arr); $i++) {
            if ($category === $categories_arr[$i]) {
                $real_cat = true;
            }
        }
        $prod_type = $output['prodtype'];

        if (!$real_cat) {
            header('location: /products');
        }else {
            include ROOT_PATH.'templates/nav.php';
        }

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

        $categories_arr = array('livingroom','bedroom', 'bath', 'kitchen');
        $real_cat = false;

        for ($i=0; $i < count($categories_arr); $i++) {
            if ($category === $categories_arr[$i]) {
                $real_cat = true;
            }
        }

        if (!$real_cat) {
            header('location: /products');
        }else {
            include ROOT_PATH.'templates/nav.php';
        }

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
        'queryDetails'=> isset($details)?$details:false,
        'pagelocation'=>$_SERVER['REQUEST_URI']
    ));



     include ROOT_PATH.'templates/footer.php';
?>
