<?php

    include '../../scripts/dbconnect.php';
    $output_dir = "../../assets/blogimages/";

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

            // add uploaded image to the blogimages database table
            // create a unique id blogimg_13445d2
            $folder_path = '/assets/blogimages/';
            $full_path = $folder_path.$fileName;
            $blog_img_id = 'blogimg_'.bin2hex(random_bytes(5));

            $update_blogimages_db = DatabaseFunctions::storeBlogImages('blog_images', '(custom_img_id, path, image_name)', $blog_img_id, $full_path, $fileName);

            if ($update_blogimages_db) {
                $msg = array(
                    'status'=>array(
                        'code'=>101,
                        'code_status'=>'success'
                    ),
                    'data'=> array(
                        'msg'=>'successfull added to folder response',
                        'files'=>$_FILES,
                        'name'=>$fileName,
                        'temp_name'=> $_FILES['img']['tmp_name'],
                        'real_path'=> $folder_path.$fileName,
                        'blogimgID'=>$blog_img_id,
                        'dir'=>$root_dir_slide.$fileName,
                        'typeAllowed'=>$file_type_allowed
                    )
                );
            }else {
                $msg = array(
                    'status'=>array(
                        'code'=>404,
                        'code_status'=>'error'
                    ),
                    'data'=> array(
                        'msg'=>'Image data not saved in database successfully. Please try again'
                    )
                );
            }
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
