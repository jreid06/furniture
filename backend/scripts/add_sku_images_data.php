<?php

    include '../../scripts/dbconnect.php';

    if (isset($_POST['data'])) {

        $image_data = json_decode( $_POST['data'], true );
        $sku_exists = validate_sku($image_data['sku_parent']);
        $sku_stripe_cat = $sku_exists['sku_attributes']['category'];

        if ($sku_exists['status']['code'] === 101) {

            // save sent data in correct database table
            $sku_id = $image_data['sku_parent'];
            $category = 'null';
            $table_name = "images_".$sku_stripe_cat;
            $images = json_encode($image_data['images']);

            // check if table exists
            $create_table = DatabaseFunctions::createImageTable($table_name);

            if ($create_table) {
                // NOTE: ADD NEW IMAGE DATA

                $inventory = json_encode($sku_exists['sku_inventory']);

                // sku attributes
                $sku_type = $sku_exists['sku_attributes']['type'];
                $sku_size = $sku_exists['sku_attributes']['size'];
                $sku_color = $sku_exists['sku_attributes']['color'];
                $sku_main_image = $sku_exists['sku_image'];

                if (!$sku_main_image) {
                    $sku_main_image = DOMAIN.$image_data['images'][0];
                }


                $database_result = DatabaseFunctions::addSkuImages($table_name, '(sku_id, category, images, inventory, sku_type, sku_size, sku_color, sku_stripe_cat, sku_main_image)', $sku_id, $category, $images, $inventory, $sku_type, $sku_size, $sku_color, $sku_stripe_cat, $sku_main_image);

                $params_arr = array( $sku_id, $category, $images, $inventory, $sku_type, $sku_size, $sku_color, $sku_stripe_cat, $sku_main_image);

                if ($database_result[0]) {
                    $msg = array(
                        'status'=> array(
                            'code'=>101,
                            'sku_request_code'=>$sku_exists['status']['code'],
                            'code_status'=>'success'
                        ),
                        'data'=> array(
                            'msg'=>'Image data for '.$image_data['sku_parent']. ' save successfully',
                            'sent_data'=> array(
                                'sku'=> $sku_id,
                                'cat'=>$category,
                                'images'=>$images,
                                'tbl'=>$table_name
                            ),
                            'db'=>$database_result,
                            'params'=>$params_arr
                        )
                    );
                }else {
                    $msg = array(
                        'status'=> array(
                            'code'=>404,
                            'sku_request_code'=>$sku_exists['status']['code'],
                            'code_status'=>'error'
                        ),
                        'data'=> array(
                            'msg'=>'Error adding image data to the database',
                            'db_err'=> $database_result
                        )
                    );
                }
                
            }else {
                // NOTE: TABLE ALREADY EXISTS

                // check whether sku data already exists
                $sku_check = DatabaseFunctions::checkDataExists($table_name, 'sku_id', $sku_id);

                if ($sku_check) {

                    $msg = array(
                        'status'=> array(
                            'code'=>404,
                            'sku_request_code'=>$sku_exists['status']['code'],
                            'code_status'=>'warn'
                        ),
                        'data'=> array(
                            'msg'=>'Images already added for the SKU ID entered'
                        )
                    );

                }
                else {
                    $inventory = json_encode($sku_exists['sku_inventory']);

                    // sku attributes
                    $sku_type = $sku_exists['sku_attributes']['type'];
                    $sku_size = $sku_exists['sku_attributes']['size'];
                    $sku_color = $sku_exists['sku_attributes']['color'];
                    $sku_main_image = $sku_exists['sku_image'];

                    if (!$sku_main_image) {
                        $sku_main_image = DOMAIN.$image_data['images'][0];
                    }


                    $database_result = DatabaseFunctions::addSkuImages($table_name, '(sku_id, category, images, inventory, sku_type, sku_size, sku_color, sku_stripe_cat, sku_main_image)', $sku_id, $category, $images, $inventory, $sku_type, $sku_size, $sku_color, $sku_stripe_cat, $sku_main_image);

                    $params_arr = array( $sku_id, $category, $images, $inventory, $sku_type, $sku_size, $sku_color, $sku_stripe_cat, $sku_main_image);

                    if ($database_result[0]) {
                        $msg = array(
                            'status'=> array(
                                'code'=>101,
                                'sku_request_code'=>$sku_exists['status']['code'],
                                'code_status'=>'success'
                            ),
                            'data'=> array(
                                'msg'=>'Image data for '.$image_data['sku_parent']. ' save successfully',
                                'sent_data'=> array(
                                    'sku'=> $sku_id,
                                    'cat'=>$category,
                                    'images'=>$images,
                                    'tbl'=>$table_name
                                ),
                                'db'=>$database_result,
                                'params'=>$params_arr
                            )
                        );
                    }else {
                        $msg = array(
                            'status'=> array(
                                'code'=>404,
                                'sku_request_code'=>$sku_exists['status']['code'],
                                'code_status'=>'error'
                            ),
                            'data'=> array(
                                'msg'=>'Error adding image data to the database',
                                'db_err'=> $database_result
                            )
                        );
                    }
                }
            }



        }else {
            $msg = array(
                'status'=> array(
                    'code'=>404,
                    'sku_request_code'=>$sku_exists['status']['code'],
                    'code_status'=>'error'
                ),
                'data'=> array(
                    'msg'=>'Invalid Request. Contact Help',
                    'sku_data'=>$sku_exists,
                    "send_data"=>$image_data
                )
            );
        }


        exit(json_encode( $msg ));
    }else {

        $msg = array(
            'status'=> array(
                'code'=>404,
                'code_status'=>'error'
            ),
            'data'=> array(
                'msg'=>'no data sent'
            )
        );

        exit(json_encode( $msg ));
    }

 ?>
