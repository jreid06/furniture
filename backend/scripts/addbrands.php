<?php

    include '../../scripts/dbconnect.php';

    if (isset($_POST['brandData'])) {
        $sent_brand_data = $_POST['brandData'];
        $brand_letter = $sent_brand_data['brand_letter'];
        $database_field = 'ALPH_'.ucwords($brand_letter);

        // check if brand data for letter already exists
        /*
            - if it does then only add brand_names in brand_array to existsing brand_arry

            - else add the whole $brand_data object to storage and create an entry for the brands under that letter
        */

        $brand_info_exists = DatabaseFunctions::getData($database_field, 'brands', 'type', 'brand');

        // check if query was successful or not
        if ($brand_info_exists[0]) {
            // check if data is actually exists in returned array
            if ($brand_info_exists[1][$database_field] !== '') {

                // decode the json
                $brand_data_exists = json_decode( $brand_info_exists[1][$database_field], true );

                $old_brand_data_exists = $brand_data_exists;
                $push_different = false;
                $diff = array();



                for ($i=0; $i < count($sent_brand_data['brand_array']); $i++) {

                    for ($k=0; $k < count($brand_data_exists['brand_array']); $k++) {
                        if ($sent_brand_data['brand_array'][$i]['brand_name'] === $brand_data_exists['brand_array'][$k]['brand_name']) {
                            $sent_brand_data['brand_array'][$i]['matched'] = true;
                        }
                    }
                }


                for ($j=0; $j < count($sent_brand_data['brand_array']); $j++) {
                    if (!isset($sent_brand_data['brand_array'][$j]['matched'])) {
                        array_push($diff, $sent_brand_data['brand_array'][$j]);
                    }
                }

                if (count($diff) > 0) {
                    for ($r=0; $r < count($diff); $r++) {
                        array_push($brand_data_exists['brand_array'], $diff[$r]);
                    }
                }

                // // update database with new brands category details
                $stringified_brand_info = json_encode( $brand_data_exists );
                $fields = array($database_field);
                $values = array($stringified_brand_info);

                $brand_update = DatabaseFunctions::updateMultipleFields('brands', $fields, $values, 'type', 'brand');

                if ($brand_update[0]) {
                    // return success message if update was successful

                    $msg = array(
                        'status'=> array(
                            'code'=> 101,
                            'code_status'=>'success'
                        ),
                        'data'=>array(
                            'msg'=>"Brand category <strong>".ucwords($brand_letter).' </strong> has been updated successfully. Visit <strong><em>View/edit brands page</em></strong> to make changes',
                            'orig'=>$old_brand_data_exists,
                            'test'=>$sent_brand_data['brand_array'],
                            'diff'=>$diff,
                            'newdata'=>$brand_data_exists['brand_array']
                        )
                    );
                }else {
                    $msg = array(
                        'status'=> array(
                            'code'=> 404,
                            'code_status'=>'error'
                        ),
                        'data'=>array(
                            'msg'=>'BRAND data not UPDATED. TRY AGAIN or contact help'
                        )
                    );
                }


            }else {
                //stringify the data to be saved
                $stringified_brand_info = json_encode( $sent_brand_data );

                $fields = array($database_field);
                $values = array($stringified_brand_info);

                $brand_init = DatabaseFunctions::updateMultipleFields('brands', $fields, $values, 'type', 'brand');

                if ($brand_init[0]) {
                    $msg = array(
                        'status'=> array(
                            'code'=> 101,
                            'code_status'=>'success'
                        ),
                        'data'=>array(
                            'msg'=>'Brand data for category <strong>'.ucwords($brand_letter).'</strong> has been added successfully. Visit <strong><em>View/edit brands page</em></strong> to make changes'
                        )
                    );
                }else {
                    $msg = array(
                        'status'=> array(
                            'code'=> 404,
                            'code_status'=>'error'
                        ),
                        'data'=>array(
                            'msg'=>'BRAND data not added to database. TRY AGAIN or contact help'
                        )
                    );
                }

            }
        }

        exit(json_encode( $msg ));

    }else {
        $msg = array(
            'status'=> array(
                'code'=> 404,
                'code_status'=>'error'
            ),
            'data'=>array(
                'msg'=>'data not sent to server. Please try again'
            )
        );

        exit(json_encode( $msg ));
    }
 ?>
