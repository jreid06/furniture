<?php

    include '../../scripts/dbconnect.php';

    // if (isset($_POST['brandData'])) {
        // $_SESSION['dta'] = $_POST['brandData'];
        // $sent_brand_data = $_POST['brandData'];
        $sent_brand_data = $_SESSION['dta'];
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
            echo "SENT";
            echo "<pre>";
            var_dump($sent_brand_data);
            echo "</pre>";
            // check if data is actually exists in returned array
            if ($brand_info_exists[1][$database_field] !== '') {

                // decode the json
                $brand_data_exists = json_decode( $brand_info_exists[1][$database_field], true );
                $temp = array();


                // check if sent brand data matches existing brand data
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
                    }else {
                        array_push($diff, 'match successful. No different brand');
                    }
                }


                // echo "<br><br><br>";
                //
                // echo "ORIG";
                // echo "<pre>";
                // var_dump($brand_data_exists);
                // echo "</pre>";

                echo "<br><br><br>";

                echo "DIFF";
                echo "<pre>";
                var_dump($diff);
                echo "</pre>";

                echo "<br><br><br>";

                echo "NEW SENT DATA";
                echo "<pre>";
                var_dump($sent_brand_data);
                echo "</pre>";


                // add just brand names to existing data
                $msg = array(
                    'status'=> array(
                        'code'=> 101,
                        'code_status'=>'success'
                    ),
                    'data'=>array(
                        'db_response'=> gettype($brand_data_exists['brand_array']),
                        'send_data'=>gettype($sent_brand_data['brand_array']),
                        'diff'=> $diff,
                        'temp'=> $temp
                    )
                );
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
                            'msg'=>'full brand data has been added to database'
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

        // exit(json_encode( $msg ));

    // }else {
    //     $msg = array(
    //         'status'=> array(
    //             'code'=> 404,
    //             'code_status'=>'error'
    //         ),
    //         'data'=>array(
    //             'msg'=>'data not sent to server. Please try again'
    //         )
    //     );
    //
    //     exit(json_encode( $msg ));
    // }
 ?>
