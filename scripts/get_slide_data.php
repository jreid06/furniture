<?php

    include 'dbconnect.php';

    $slide_data = DatabaseFunctions::getData('slides_json', 'homeslides', 'table_name', 'slides');

    if ($slide_data[0]) {

        $msg = array(
            'status'=>array(
                'code'=>101,
                'code_status'=>'success'
            ),
            'data'=>array(
                'msg'=>'data retrieved successfully',
                'slides'=> $slide_data[1]
            )
        );

        exit(json_encode( $msg ));
    }else {

        $msg = array(
            'status'=>array(
                'code'=>404,
                'code_status'=>'error'
            ),
            'data'=>array(
                'msg'=>'slide data not retrieved'
            )
        );

        exit(json_encode( $msg ));
    }
 ?>
