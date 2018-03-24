<?php

    include '../../scripts/dbconnect.php';


    if (isset($_POST['action'])) {
        $action = $_POST['action'];
        $nav_json = $_POST['navjson'];
        $old_nav_id = $_POST['navOldID'];
        $new_nav_id = $_POST['navNewID'];
        $nav_title = $_POST['navTitle'];
        $is_cat = $_POST['isCat'];

        // check what action to do (save offline link, save & make LIVE)
        if ($action === 'save-offline') {
            // NOTE: update the nav_custom_id & nav_json_data fields

            // check to make sure the data we are trying to update exists
            $nav_link_exists = DatabaseFunctions::checkDataExists('navigation', 'nav_custom_id', $old_nav_id);

            if ($nav_link_exists) {

                $fields = array('nav_custom_id', 'nav_title', 'nav_json_data', 'nav_status', 'nav_is_cat');
                $values = array($new_nav_id, $nav_title, $nav_json, 'false', $is_cat);

                $nav_link_update = DatabaseFunctions::updateMultipleFields('navigation', $fields, $values, 'nav_custom_id', $old_nav_id);

                if ($nav_link_update[0]) {

                    $msg = array(
                        'status'=>array(
                            'code'=>101,
                            'code_status'=>'success'
                        ),
                        'info'=>array(
                            'msg'=>'nav link data UPDATED and saved successfully'
                        )
                    );

                    // TODO: create session for successful save here
                    $_SESSION['navlink_status'] = array(
                        'class'=>'alert-success',
                        'msg'=> 'Nav link <strong>'.strtoupper($nav_title).'</strong> has been UPDATED successfully. View and edit below'
                    );

                }else {

                    $msg = array(
                        'status'=>array(
                            'code'=>404,
                            'code_status'=>'error'
                        ),
                        'info'=>array(
                            'msg'=>'Error updating Nav link data. Try again or contact help'
                        )
                    );
                }



            }else {
                $msg = array(
                    'status'=>array(
                        'code'=>404,
                        'code_status'=>'error'
                    ),
                    'info'=>array(
                        'msg'=>'<strong>'.strtoupper($nav_title).'</strong> link doesnt exist in databse. Failed to update. REFRESH PAGE and try again'
                    )
                );
            }

            exit(json_encode( $msg ));
        }

        if ($action === "save-live") {

            $link_status = $_POST['linkStatus'];

            // check to make sure the data we are trying to update exists
            $nav_link_exists = DatabaseFunctions::checkDataExists('navigation', 'nav_custom_id', $old_nav_id);

            if ($nav_link_exists) {

                $fields = array('nav_custom_id', 'nav_title', 'nav_json_data', 'nav_status', 'nav_is_cat');
                $values = array($new_nav_id, $nav_title, $nav_json, $link_status, $is_cat);

                $nav_link_update = DatabaseFunctions::updateMultipleFields('navigation', $fields, $values, 'nav_custom_id', $old_nav_id);

                if ($nav_link_update[0]) {

                    $msg = array(
                        'status'=>array(
                            'code'=>101,
                            'code_status'=>'success'
                        ),
                        'info'=>array(
                            'msg'=>'nav link data UPDATED and saved successfully'
                        )
                    );

                    // TODO: create session for successful save here
                    $_SESSION['navlink_status'] = array(
                        'class'=>'alert-success',
                        'msg'=> 'Nav link <strong>'.strtoupper($nav_title).'</strong> has been UPDATED successfully and is <strong class="big-strong bs-red">LIVE</strong>. View and edit below'
                    );

                }else {

                    $msg = array(
                        'status'=>array(
                            'code'=>404,
                            'code_status'=>'error'
                        ),
                        'info'=>array(
                            'msg'=>'Error updating Nav link data. Try again or contact help'
                        )
                    );
                }



            }else {
                $msg = array(
                    'status'=>array(
                        'code'=>404,
                        'code_status'=>'error'
                    ),
                    'info'=>array(
                        'msg'=>'<strong>'.strtoupper($nav_title).'</strong> link doesnt exist in databse. Failed to update. REFRESH PAGE and try again'
                    )
                );
            }

            exit(json_encode( $msg ));
        }

    }else {



    }
 ?>
