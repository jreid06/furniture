<?php
    include '../scripts/dbconnect.php';
    include "../backend/templates/header.php";

    $url = $_SERVER['REQUEST_URI'];
    $url_split = explode('/',$url);
    $database_extension = "images_";

    $url_product_cat = $url_split[6];

    // get data from specific tables or all from IDYL database

    $database_name = $database_extension.$url_product_cat;
    $page_products = DatabaseFunctions::getData('*', $database_name, false, false, true);

    if ($page_products[0]) {
        $error_status = false;
    }else {
        $error_status = true;
    }

 ?>

 <body>
     <div id="wrapper" class="dash-vue">

     <?php include "../backend/templates/nav.php" ?>

     <?php
         $template = $twig->load('edit-product-images.html.twig');
         echo $template->render(array(
            'page_info'=> array(
                'product_cat'=>$url_product_cat,
                'product_data'=>$page_products[1]
            ),
            'error'=>array(
                'status'=> $error_status
            )
         ));
      ?>

    </div>


    <?php include '../backend/templates/footer.php' ?>
 </body>
