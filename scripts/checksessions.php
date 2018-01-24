<?php
    include 'dbconnect.php';

    if (isset($_SESSION['idyl_tkn'])) {
        $msg = array(
            'status'=>array(
                'code'=> 101,
                'code_status'=>'success'
            ),
            'data'=>array(
                'msg'=>'session token has been created',
                'session'=>json_encode($_SESSION)
            )
        );

        exit(json_encode($msg));
    }else {
        $msg = array(
            'status'=>array(
                'code'=> 404,
                'code_status'=>'error'
            ),
            'data'=>array(
                'msg'=>'session data doesnt exist'
            )
        );

        exit(json_encode($msg));
    }

 ?>
