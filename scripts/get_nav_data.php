<?php

    include 'dbconnect.php';

    if (isset($_POST['nav'])) {

        // get nav data from DB
        Connect::checkConnection();
        $nav_data = DatabaseFunctions::getDataLimit('*', 'navigation', 'nav_status', 'true', false, false);

        if ($nav_data[0]) {

            $nav_data = $nav_data[1];
            // decode json data here && sort nav data into nav with sublinks & single nav links

            $sublink_nav_items = array();
            $single_nav_items = array();

            for ($i=0; $i < count($nav_data); $i++) {
                $nav_data[$i]['nav_json_data'] = json_decode( $nav_data[$i]['nav_json_data'], true);

                // check json data for submenu/sublink status
                if ($nav_data[$i]['nav_json_data']['submenu']) {
                    array_push($sublink_nav_items, $nav_data[$i]);
                }else {
                    array_push($single_nav_items, $nav_data[$i]);
                }
            }



            // send success response array

            $msg = array(
                'status'=> array(
                    'code'=>101,
                    'code_status'=>'success'
                ),
                'info'=> array(
                    'nav_data'=>$nav_data,
                    'link_types'=> array(
                        'submenu_navs'=>$sublink_nav_items,
                        'singlem_navs'=> $single_nav_items
                    ),
                    'msg'=>'nav data retrieved successfully'
                )
            );



        }else {

            // return error response array

            $msg = array(
                'status'=> array(
                    'code'=>404,
                    'code_status'=>'error'
                ),
                'info'=> array(
                    'msg'=>'Reload page again. Error retrieving data',
                    'error_type'=> 'nav error'
                )
            );
        }

        exit(json_encode( $msg ));
    }

 ?>
