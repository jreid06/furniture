<?php

    include '../../scripts/dbconnect.php';
    $output_dir = "../../assets/test/";

    if(isset($_FILES['img'])){

        $msg = array(
            'status'=>'success',
            'data'=>$_FILES['img']
        );

        exit(json_encode( $msg ));
    }else {
        $msg = array(
            'status'=>'false',
            'data'=>$_FILES
        );

        exit(json_encode( $msg ));
    }

 ?>
