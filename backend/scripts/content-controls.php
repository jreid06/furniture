<?php

    include '../../scripts/dbconnect.php';

    if (isset($_POST['type']) && isset($_POST['table']) && isset($_POST['id'])) {
        $setting_type = $_POST['type'];
        $table = $_POST['table'];
        $id = $_POST['id'];


        // check whether id exists in database first
        $page_exists = DatabaseFunctions::checkDataExists($table, 'page_id', $id);

        if ($page_exists) {
            switch ($setting_type) {
                case 'save':
                    # save content to database under its id,
                    // markdown stringifyied on front end
                    $markdown = $_POST['markdown'];
                    // encode again to be stored in db
                    $markdown = json_encode($markdown);
                    $fields = array('page_markdown');
                    $values = array($markdown);

                    $update_fields = DatabaseFunctions::updateMultipleFields($table, $fields, $values, 'page_id', $id, true);
                    //
                    if ($update_fields[0]) {
                        $msg = array(
                            'status'=> array(
                                'code'=>101,
                                'code_status'=>'success',
                                'action'=>'save'
                            ),
                            'data'=>array(
                                'product_exists'=> $page_exists,
                                'action'=>$_POST['type']
                            )
                        );

                        exit(json_encode($msg));
                    }
                    else {
                        $msg = array(
                            'status'=> array(
                                'code'=>404,
                                'code_status'=>'error'
                            ),
                            'data'=>array(
                                'msg'=> 'error saving your page content. If error persists contact developer'
                            )
                        );

                        exit(json_encode($msg));
                    }



                    break;
                case 'publish':
                    # save content to table [livepages,pages]. keep same id


                    $markdown = $_POST['markdown'];

                    $msg = array(
                        'status'=> array(
                            'code'=>101,
                            'code_status'=>'success',
                            'action'=>'publish'
                        ),
                        'data'=>array(
                            'action'=>$_POST['type'],
                            'vars'=>array($_POST['type'], $_POST['table'], $_POST['id'])
                        )
                    );

                    exit(json_encode($msg));

                    break;
                case 'retrieve':

                    $field = $_POST['field'];
                    # get content from the pages table for the current active page
                    /*
                        1. select fields, 2. table, 3. where field, 4. value field
                    */
                    $data = DatabaseFunctions::getData('page_markdown', $table, $field, $id);

                    if ($data[0]) {

                        $msg = array(
                            'status'=> array(
                                'code'=>101,
                                'code_status'=>'success',
                                'action'=>'retrieve data'
                            ),
                            'data'=>array(
                                'action'=>$_POST['type'],
                                'markdown'=>$data[1]
                            )
                        );

                        exit(json_encode($msg));
                    }
                    else {


                        $msg = array(
                            'status'=> array(
                                'code'=>404,
                                'code_status'=>'error'
                            ),
                            'data'=>array(
                                'msg'=>'markdown not retrieved. Try refreshing page'
                            )
                        );

                        exit(json_encode($msg));
                    }



                    break;

                default:
                    # code...
                    break;
            }
        }





    }

 ?>
