<?php

    include 'dbconnect.php';

    if (isset($_POST['all'])) {
        // $productID = $_POST['id'];
        $products = DatabaseFunctions::getProductData('livingroom', 'product_type', 'id', false, false);



        // // // / / / /// /// // // // // // // //

        if ($products[0]) {
            $msg = array(
                'status'=> 'success',
                'product'=> $products[1]
            );

            exit(json_encode($msg));
        }else {
            $msg = array(
                'status'=> 'error',
                'msg'=> 'error fetching featured products info'
            );

            exit(json_encode($msg));
        }

    }else {
        $msg = array(
            'status'=> 'error'
        );

        exit(json_encode($msg));
    }

 ?>
