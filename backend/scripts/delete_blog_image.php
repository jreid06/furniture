<?php
    include '../../scripts/dbconnect.php';
    $image_dir = "../../assets/blogimages/";

    if (isset($_POST['imgID'])) {
        $img_id = $_POST['imgID'];
        $img_name = $_POST['img_name'];
        // delete entry from database
        $delete_status = DatabaseFunctions::deleteInfoDynamic('blog_images', 'custom_img_id', $img_id);

        // if true then delete entry from directory
        if ($delete_status) {

            if (unlink($image_dir.$img_name)) {

                $_SESSION['blog_img_deleted'] = $img_name;

                $msg = array(
                    'status'=> array(
                        'code'=>101,
                        'code_status'=>'success'
                    ),
                    'data'=>array(
                        'msg'=>'image data deleted successfully from database and directory'
                    )
                );

            }else {
                $msg = array(
                    'status'=> array(
                        'code'=>404,
                        'code_status'=>'error'
                    ),
                    'data'=>array(
                        'msg'=>'error deleting file from directory. Try again or Contact help to remove image successfully'
                    )
                );

            }

            exit(json_encode( $msg ));

        }else {
            $msg = array(
                'status'=> array(
                    'code'=>404,
                    'code_status'=>'error'
                ),
                'data'=>array(
                    'msg'=>'error deleting file from directory. Try again or Contact help to remove image successfully'
                )
            );

            exit(json_encode( $msg ));
        }
    }else {
        header('location: /');
    }
 ?>
