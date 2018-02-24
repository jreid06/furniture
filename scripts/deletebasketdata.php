<?php
    include 'dbconnect.php';

    if (isset($_POST['cusID'])) {

        $customer_id = $_POST['cusID'];

        if (DatabaseFunctions::deleteInfo('basket', $customer_id)) {
            $msg = array(
                'status'=> array(
                    'code'=>101,
                    'code_status'=> 'success'
                ),
                'data'=> array(
                    'msg'=>'data deleted successfully'
                )
            );

            exit(json_encode( $msg ));
        }else {
            $msg = array(
                'status'=> array(
                    'code'=>404,
                    'code_status'=> 'error'
                ),
                'data'=> array(
                    'msg'=> 'basket data not deleted successfully for user'
                )
            );

            exit(json_encode( $msg ));
        }


    }
 ?>
