<?php

    include '../../scripts/dbconnect.php';
    $output_dir = "../../assets/test/";

    if(isset($_FILES['img'])){

    	$fileCount = count($_FILES["img"]["name"]);
        $res = 'multiple';

      	$fileName = explode(' ',$_FILES["img"]["name"][0]);
        $fileName = implode('-', $fileName);

        $file_type_allowed = preg_match("/.\.(jpg|png|jpeg)$/i", $fileName);
        if (!$file_type_allowed) {
            $msg = array(
                'status'=>array(
                    'code'=>404,
                    'code_status'=>'error'
                ),
                'data'=> array(
                    'msg'=>'File type uploaded not allowed. Only (jpg | png | jpeg )'
                )
            );

        }else {
            move_uploaded_file($_FILES["img"]["tmp_name"][0],$output_dir.$fileName);


            $msg = array(
                'status'=>array(
                    'code'=>101,
                    'code_status'=>'success'
                ),
                'data'=> array(
                    'msg'=>'successfull added to folder response',
                    'files'=>$_FILES,
                    'res'=>$res,
                    'name'=>$fileName,
                    'temp_name'=> $_FILES['img']['tmp_name'],
                    'real_path'=> pathinfo($fileName),
                    'dir'=>$root_dir.$fileName,
                    'typeAllowed'=>$file_type_allowed
                )
            );
        }



        exit(json_encode( $msg ));
    }else {
        $msg = array(
            'status'=>array(
                'code'=>404,
                'code_status'=>'error'
            ),
            'data'=> array(
                'msg'=>'test error response. no files sent'
            )
        );

        exit(json_encode( $msg ));
    }

 ?>
