<?php
    include '../../scripts/dbconnect.php';

    if (isset($_POST['navjson'])) {
        $nav_json = $_POST['navjson'];
        $nav_title = strtolower($_POST['navtitle']);
        $nav_id = $_POST['navid'];
        $nav_status = $_POST['navstatus'];

        // check if link with that name already email_exists
        $link_exists = DatabaseFunctions::checkDataExists('navigation', 'nav_custom_id', $nav_id);

        if ($link_exists) {
            $msg = array(
                'status'=>array(
                    'code'=>404,
                    'code_status'=>'warn'
                ),
                'info'=>array(
                    'msg'=>'<strong>'.strtoupper($nav_title).'</strong> link already exists. Please change your input'
                )
            );
        }else {

            // store it in the database
            $nav_create_status = DatabaseFunctions::saveNavigationLink('navigation', '(nav_custom_id, nav_title, nav_json_data, nav_status)', $nav_id, $nav_title, $nav_json, $nav_status);

            if ($nav_create_status[0]) {
                $msg = array(
                    'status'=>array(
                        'code'=>101,
                        'code_status'=>'success'
                    ),
                    'info'=>array(
                        'msg'=>'nav link created and saved successfully',
                        'response'=> $nav_create_status
                    )
                );

                // TODO: create session for successful save here
                $_SESSION['navlink_status'] = array(
                    'class'=>'alert-success',
                    'msg'=> 'Nav link <strong>'.strtoupper($nav_title).'</strong> has been CREATED successfully. View and edit below'
                );

            }else {

                $msg = array(
                    'status'=>array(
                        'code'=>404,
                        'code_status'=>'error'
                    ),
                    'info'=>array(
                        'msg'=>'nav link <strong>NOT SAVED</strong> successfully. Try again',
                        'response'=> $nav_create_status
                    )
                );
            }

        }

        exit(json_encode( $msg ));
    }
 ?>
