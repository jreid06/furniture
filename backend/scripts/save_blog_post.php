<?php

    include '../../scripts/dbconnect.php';

    if (isset($_POST['type'])) {

        if ($_POST['type'] === 'draft') {

            // update an existsing blog post
            if (isset($_POST['blogpost_id'])) {
                $post = $_POST['blogpost'];
                $post_id = $_POST['blogpost_id'];

                // overwrite timestamps set by JS
                $post['date_modified'] = generate_current_date()[6];

                // update post with new data
                $fields = array('cat_id', 'main_img_path', 'title', 'brief_desc', 'blog_body', 'date_modified', 'date_published', 'status');
                $values = array($post['cat_id'], $post['main_img'], $post['post_title'], $post['post_brief'], $post['post_body'], $post['date_modified'], "N/A", $post['post_status']);

                $update_post = DatabaseFunctions::updateMultipleFields('blog', $fields, $values, 'post_id', $post_id);

                if ($update_post[0]) {
                    $msg = array(
                        'status'=>array(
                            'code'=> 101,
                            'code_status'=> 'success'
                        ),
                        'data'=> array(
                            'type'=>$_POST['type'],
                            'msg'=>'success response. POST UPDATED',
                            'post'=> $post
                        )
                    );

                    // session variable will go here
                    $_SESSION['blog_post_edited'] = $post_id." has been edited and saved successfully";

                }else {

                    $msg = array(
                        'status'=> array(
                            'code'=> 404,
                            'code_status'=>'error'
                        ),
                        'data'=>array(
                            'msg'=> 'Error updating post info in database. Try again or contact help'
                        )
                    );
                }

            }else {
                // create a new blog post entry in database

                $post = $_POST['blogpost'];
                $post['post_id'] = "post_".bin2hex(random_bytes(5));

                // overwrite timestamps set by JS
                $post['date_created'] = generate_current_date()[6];
                $post['date_modified'] = generate_current_date()[6];

                // save post in database
                $save_post = DatabaseFunctions::saveBlogPost('blog', '(post_id, cat_id, main_img_path, title, brief_desc, blog_body, date_created, date_modified, date_published, status)', $post['post_id'], $post['cat_id'], $post['main_img'], $post['post_title'], $post['post_brief'], $post['post_body'], $post['date_created'], $post['date_modified'], $post['date_published'], $post['post_status']);

                if ($save_post[0]) {
                    $msg = array(
                        'status'=>array(
                            'code'=> 101,
                            'code_status'=> 'success'
                        ),
                        'data'=> array(
                            'type'=>$_POST['type'],
                            'msg'=>'success response',
                            'post'=> $post
                        )
                    );

                    $_SESSION['blog_post_created'] = "Blog post <strong>".$post['post_title']."</strong> has been saved successfully as a ".$_POST['type'].". Visit Edit page to make changes";

                }else {
                    $msg = array(
                        'status'=> array(
                            'code'=> 404,
                            'code_status'=>'error'
                        ),
                        'data'=>array(
                            'msg'=> 'Error saving post info in database. Try again or contact help'
                        )
                    );
                }
            }


            exit(json_encode( $msg ));
        }





        if ($_POST['type'] === 'publish') {

            // update an existsing published blog post
            if (isset($_POST['blogpost_id'])) {
                $post = $_POST['blogpost'];
                $post_id = $_POST['blogpost_id'];

                // overwrite timestamps set by JS
                $post['date_modified'] = generate_current_date()[6];
                $post['date_published'] = generate_current_date()[6];

                // update post with new data
                $fields = array('cat_id', 'main_img_path', 'title', 'brief_desc', 'blog_body', 'date_modified', 'date_published', 'status');
                $values = array($post['cat_id'], $post['main_img'], $post['post_title'], $post['post_brief'], $post['post_body'], $post['date_modified'], $post['date_published'], $post['post_status']);

                $update_post = DatabaseFunctions::updateMultipleFields('blog', $fields, $values, 'post_id', $post_id);

                if ($update_post[0]) {
                    $msg = array(
                        'status'=>array(
                            'code'=> 101,
                            'code_status'=> 'success'
                        ),
                        'data'=> array(
                            'type'=>$_POST['type'],
                            'msg'=>'success response. POST UPDATED and PUBLISHED Successfully',
                            'post'=> $post
                        )
                    );

                    // session variable will go here
                    $_SESSION['blog_post_edited'] = $post_id." has been edited, saved and PUBLISHED successfully";

                }else {

                    $msg = array(
                        'status'=> array(
                            'code'=> 404,
                            'code_status'=>'error'
                        ),
                        'data'=>array(
                            'msg'=> 'Error updating post info in database. Try again or contact help'
                        )
                    );
                }

            }else {
                $post = $_POST['blogpost'];
                $post['post_id'] = "post_".bin2hex(random_bytes(5));

                // overwrite timestamps set by JS
                $post['date_created'] = generate_current_date()[6];
                $post['date_modified'] = generate_current_date()[6];
                $post['date_published'] = generate_current_date()[6];

                // save post in database
                $save_post = DatabaseFunctions::saveBlogPost('blog', '(post_id, cat_id, main_img_path, title, brief_desc, blog_body, date_created, date_modified, date_published, status)', $post['post_id'], $post['cat_id'], $post['main_img'], $post['post_title'], $post['post_brief'], $post['post_body'], $post['date_created'], $post['date_modified'], $post['date_published'], $post['post_status']);

                if ($save_post[0]) {
                    $msg = array(
                        'status'=>array(
                            'code'=> 101,
                            'code_status'=> 'success'
                        ),
                        'data'=> array(
                            'type'=>$_POST['type'],
                            'msg'=>'success response',
                            'post'=> $post
                        )
                    );

                    $_SESSION['blog_post_created'] = "Blog post <strong>".$post['post_title']."</strong> has been saved and <strong>PUBLISHED</strong> successfully. Visit Edit page to make changes";

                }else {
                    $msg = array(
                        'status'=> array(
                            'code'=> 404,
                            'code_status'=>'error'
                        ),
                        'data'=>array(
                            'msg'=> 'Error saving post info in database. Try again or contact help'
                        )
                    );
                }
            }


            exit(json_encode( $msg ));
        }

    }else {
        $msg = array(
            'status'=> array(
                'code'=> 404,
                'code_status'=>'error'
            ),
            'data'=>array(
                'msg'=> 'No data type set. '
            )
        );

        exit(json_encode( $msg ));
    }
 ?>
