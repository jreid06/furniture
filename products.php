<?php
    include dirname(__DIR__).'/furniture/scripts/dbconnect.php';
    // define('ROOT_PATH', dirname(__DIR__).'/furniture/');
	include ROOT_PATH.'templates/header.php';
    include ROOT_PATH.'templates/nav.php';

    // Connect::checkConnection();
    parse_str($_SERVER['QUERY_STRING'], $output);

    var_dump($output);
    if (!isset($_GET['cat']) || !$_GET['cat']) {
        $data = 'show all products';

        $details = array();
    }
    elseif ($output['cat'] && isset($output['prodtype']) && !empty($output['prodtype'])) {
        $data = 'show specific type of product in a certain category e.g all cushions';
        $category = $output['cat'];
        $prod_type = $output['prodtype'];

        $details = array(
            'category' => $category,
            'type' => $prod_type
        );


    }
    else if ($output['cat']) {
        $data = 'show all products in category';
        $category = $output['cat'];

        $details = array(
            'category' => $category
        );
    }

    $template = $twig->load('products.html.twig');
    echo $template->render(array(
        'status' => 'template works',
        'msg' => $data,
        'queryDetails'=> isset($details)?$details:false
    ));



     include ROOT_PATH.'templates/footer.php';
?>
