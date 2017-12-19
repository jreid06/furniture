<?php

    include 'dbconnect.php';

    if (isset($_POST['id'])) {
        $productID = $_POST['id'];
        $product = DatabaseFunctions::getData('*', 'livingroom', 'id', $productID, false);

        $msg = array(
            'status'=> 'success',
            'product'=> $product
        );

        exit(json_encode($msg));
    }

 ?>
