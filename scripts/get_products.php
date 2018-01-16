<?php

    include 'dbconnect.php';

    if (isset($_POST['all'])) {
        // $productID = $_POST['id'];
        $product = DatabaseFunctions::getData('*', 'livingroom', false, false, true);

        $msg = array(
            'status'=> 'success',
            'product'=> $product
        );

        exit(json_encode($msg));
    }else {
        $msg = array(
            'status'=> 'error'
        );

        exit(json_encode($msg));
    }

 ?>
