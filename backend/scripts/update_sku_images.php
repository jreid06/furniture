<?php

    include '../../scripts/dbconnect.php';

    if (isset($_POST['imgs'])) {

        $new_image_array = $_POST['imgs'];
        $new_image = $_POST['newImage'];
        $image_to_remove = $_POST['delete_img'];
        $sku_id = $_POST['skuID'];
        $sku_cat = $_POST['skuCAT'];
        $position = $_POST['position'];

        $path = '../..';
        $table_name = "images_".$sku_cat;
        $image_deleted = false;

        if (unlink($path.$image_to_remove)) {
            $image_deleted = true;
        }

        if ($image_deleted) {
            // add the data to the database

            if ($position === '1') {
                # update two fields (images, sku_main_image)
                $fields = array('images', 'sku_main_image');
                $values = array($new_image_array, $new_image);
            }else {
                $fields = array('images');
                $values = array($new_image_array);
            }

            if($update_result = DatabaseFunctions::updateMultipleFields($table_name, $fields, $values, 'sku_id', $sku_id)){

                $msg = array(
                    'status'=>array(
                        'code'=> 101,
                        'code_status'=>'success'
                    ),
                    'data'=> array(
                        'msg'=>'Changes made successfully to SKU',
                        'images_arr'=> $new_image_array,
                        'new_image'=>$new_image
                    )
                );

                exit(json_encode( $msg ));
            }else {

                $msg = array(
                    'status'=> array(
                        'code'=> 404,
                        'code_status'=>'error'
                    ),
                    'data'=> array(
                        'msg'=>'error saving changes to SKU. Try again or contact help if error persists'
                    )
                );

                exit(json_encode($msg));
            }


        }else {

            $msg = array(
                'status'=> array(
                    'code'=> 404,
                    'code_status'=>'error'
                ),
                'data'=> array(
                    'msg'=>'error deleting old image. Try again or contact help if error persists'
                )
            );

            exit(json_encode($msg));
        }
    }
 ?>
