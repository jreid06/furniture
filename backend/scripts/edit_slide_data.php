<?php

    include '../../scripts/dbconnect.php';

    if (isset($_POST['slideData'])) {

        $slide_data = $_POST['slideData'];
        $fields = array('slides_json');
        $values = array($slide_data);

        $update_result = DatabaseFunctions::updateMultipleFields('homeslides', $fields, $values, 'table_name', 'slides');

        if ($update_result[0]) {

            $msg = array(
                'status'=> array(
                    'code'=>101,
                    'code_status'=>'success'
                ),
                'data'=> array(
                    'msg'=>'Slide details updated successfully'
                )
            );

            exit(json_encode( $msg ));
        }else {
            $msg = array(
                'status'=> array(
                    'code'=>404,
                    'code_status'=>'error'
                ),
                'data'=> array(
                    'msg'=>'Changes could not be saved. Please try again or contact your developer'
                )
            );

            exit(json_encode( $msg ));
        }
    }else {
        $msg = array(
            'status'=> array(
                'code'=>404,
                'code_status'=>'error'
            ),
            'data'=> array(
                'msg'=>'No data sent. Please click save again or contact your developer'
            )
        );

        exit(json_encode( $msg ));
    }

 ?>
