<?php
    include dirname(__DIR__).'/idyldev/scripts/dbconnect.php';
    // define('ROOT_PATH', dirname(__DIR__).'/furniture/');
    include ROOT_PATH.'templates/header.php';

    // turn query paremeters into an assosiative array
    parse_str($_SERVER['QUERY_STRING'], $output);

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

    // get brands data

    $brand_data = DatabaseFunctions::getData('*', 'brands', false, false, true);

    // var_dump($brand_data[1]);
    $brand_parsed_data = array();

    foreach ($brand_data[1][0] as $key => $value) {
        if(explode('_',$key)[0] === 'ALPH'){

            if (json_decode( $value, true )) {
                array_push($brand_parsed_data, json_decode( $value, true ));
            }

        }
    }



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
                'category'=> $category,
                'all_cats'=>$dynamic_categories,
                'all_brands'=> $brand_parsed_data
            );

        }

        $breadcrumbs = array();
    }
    elseif ($output['cat'] && isset($output['prodtype']) && !empty($output['prodtype'])) {
        $data = 'show specific type of product in a certain category e.g all cushions';
        $category = $output['cat'];
        $brands = false;
        $brand_formatted = false;

        if ($output['cat'] === 'brands') {
            $brands = true;

            // format brands data to have spaces
            $brand_formatted = explode('-', $output['prodtype']);
            $brand_formatted = implode(' ', $brand_formatted);

        }

        $real_cat = false;

        for ($i=0; $i < count($dynamic_categories); $i++) {
            if ($category === $dynamic_categories[$i]) {
                $real_cat = true;
            }
        }
        $prod_type = $output['prodtype'];

        if (!$real_cat && !$brands) {
            // var_dump($output['cat']);
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
            'products'=>$stripe_products,
            'all_cats'=>$dynamic_categories,
            'all_brands'=> $brand_parsed_data,
            'brands_page'=> $brands,
            'brand_clean'=>$brand_formatted,
            'brand_slug'=>$output['prodtype']
        );

        $breadcrumbs = array(
            'one'=>$category,
            'two'=>$prod_type
        );

    }
    else if ($output['cat']) {
        $data = 'show all products in category';
        $category = $output['cat'];


        $real_cat = false;
        for ($i=0; $i < count($dynamic_categories); $i++) {
            if ($category === $dynamic_categories[$i]) {
                $real_cat = true;
            }
        }

        if (!$real_cat) {
            header('location: /pagenotfound');
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
            'products'=> $stripe_products,
            'all_cats'=>$dynamic_categories,
            'all_brands'=> $brand_parsed_data
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
        'pagelocation'=>$_SERVER['REQUEST_URI'],
        'dynamic_cat'=>$dynamic_categories
    ));



     include ROOT_PATH.'templates/footer.php';
?>
