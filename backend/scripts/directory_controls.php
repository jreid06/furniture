<?php

    if (isset($_POST['request'])) {

        $request = json_decode( $_POST['request'], true );

        switch ($request['type']) {
            case 'directory-listing':
                $folder = $request['folder'];
                $dir = '../../assets/'.$folder;

                $images_in_dir = scandir($dir);
                $images_list = array();

                for ($i=0; $i < count($images_in_dir); $i++) {

                    if (strlen($images_in_dir[$i]) > 2) {
                        $image_file = array(
                            'type'=> pathinfo($images_in_dir[$i], PATHINFO_EXTENSION),
                            'file'=> $images_in_dir[$i]
                        );

                        array_push($images_list, $image_file);
                    }


                }

                $msg = array(
                    'status'=>array(
                        'code'=> 101,
                        'code_status'=> 'success'
                    ),
                    'info'=> array(
                        'msg'=>'',
                        'imagelist'=> $images_list
                    )
                );

                break;

            default:
                # code...
                break;
        }


        // exit with the response array

        exit(json_encode( $msg ));
    }


 ?>
