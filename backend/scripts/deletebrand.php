<?php

    include '../../scripts/dbconnect.php';

    if (isset($_POST['params'])) {
        # code...
        $brand_data = $_POST['params'];
        $column_name = 'ALPH_'.ucwords($brand_data['cat']);

        // get current brand category data
        $existing_brand_data = DatabaseFunctions::getData($column_name, 'brands', 'type', 'brand');

        if ($existing_brand_data[0]) {
            $existing_brand_data = $existing_brand_data[1][$column_name];

            // decode brand_array
            $existing_brand_data = json_decode( $existing_brand_data, true );
            $remove_slice = false;
            // loop through it to find match with deleted result
            for ($i=0; $i < count($existing_brand_data['brand_array']); $i++) {

                // delete the selected match by removing it from the array
                if ($brand_data['name'] === $existing_brand_data['brand_array'][$i]['brand_name']) {
                    $remove_slice = true;
                    $sliced_res = array_splice($existing_brand_data['brand_array'], $i,1);
                }
            }

            //stringify updated results
            $stringified_brand_info = json_encode( $existing_brand_data );

            // resave the brand array to the database
            $fields = array($column_name);
            $values = array($stringified_brand_info);
            $brand_update = DatabaseFunctions::updateMultipleFields('brands', $fields, $values, 'type', 'brand');

            // send back a success response for front end

            if ($brand_update[0]) {
                $msg = array(
                    'status'=> array(
                        'code'=> 101,
                        'code_status'=>'success'
                    ),
                    'data'=>array(
                        'msg'=>'Brand <strong style="text-transform: uppercase">'.$brand_data['name'].'</strong> has been deleted successfully'                    )
                );

                $_SESSION['brand_edit_success'] = 'Brand <strong style="text-transform: uppercase">'.$brand_data['name'].'</strong> has been deleted successfully';

            }else {

                $msg = array(
                    'status'=> array(
                        'code'=> 404,
                        'code_status'=>'error'
                    ),
                    'data'=>array(
                        'msg'=>'error updating brand data. Please try again'
                    )
                );

                $_SESSION['brand_edit_error'] = 'error updating brand data. Please try again';
            }


        }else {
            $msg = array(
                'status'=> array(
                    'code'=> 404,
                    'code_status'=>'error'
                ),
                'data'=>array(
                    'msg'=>'error updating brand data. Please try again'
                )
            );

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
