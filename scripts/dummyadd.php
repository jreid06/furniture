<?php

    include 'dbconnect.php';

    if (isset($_POST['cookieinfo'])) {
        $dummy_data = $_POST['cookieinfo'];

        if (DatabaseFunctions::createRow('cookietable', '(cookieID, cus_id, cus_email)', $dummy_data['cookieid'], $dummy_data['customerid'], $dummy_data['email'])) {

            exit('row should be created in cookie table');
        }else {
            exit('row not created. error with function');
        }

    }
 ?>
