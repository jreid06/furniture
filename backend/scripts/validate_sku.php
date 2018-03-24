<?php
    include '../../scripts/dbconnect.php';

    if (isset($_POST['sku_id'])) {

        $sku_id = $_POST['sku_id'];
        $sku_result = validate_sku($sku_id);

        if ($sku_result['status']['code'] === 101) {

            $sku_cat = $sku_result['sku_attributes']['category'];
            $table_name = "images_".$sku_cat;

            //check if table exists
            $table_exists = DatabaseFunctions::checkTableExists($table_name);
            if (!$table_exists) {

                $msg = array(
                    'status'=> array(
                        'code'=>101,
                        'code_status'=>'success'
                    ),
                    'data'=> array(
                        'msg'=>'Valid SKU entered. Add images below',
                        'exists'=>$table_exists
                    )
                );
            }else {
                // check whether sku data already exists
                $sku_check = DatabaseFunctions::checkDataExists($table_name, 'sku_id', $sku_id);

                if ($sku_check) {

                    $msg = array(
                        'status'=> array(
                            'code'=>404,
                            'code_status'=>'warn'
                        ),
                        'data'=> array(
                            'msg'=>'Images already added for the SKU ID entered'
                        )
                    );

                }else {

                    $msg = array(
                        'status'=> array(
                            'code'=>101,
                            'code_status'=>'success'
                        ),
                        'data'=> array(
                            'msg'=>'Valid SKU entered. Add images below',
                            'exists'=>$table_exists
                        )
                    );
                }

            }

        }else {
            $msg = array(
                'status'=> array(
                    'code'=>404,
                    'code_status'=>'error'
                ),
                'data'=> array(
                    'msg'=>'Invalid SKU ID. Please enter a valid SKU'
                )
            );
        }

        exit(json_encode( $msg ));
    }
 ?>
