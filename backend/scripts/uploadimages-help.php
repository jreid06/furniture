<?php
    include '../../scripts/dbconnect.php';
    if (isset($_FILES['attachments'])) {
        // var_dump($_FILES);
        // echo $_FILES['attachments']['name'][0];

        // adds file to database
        $file_name = preg_replace('(\s)','_',$_FILES['attachments']['name'][0]);

        $target_dir = "upload/";
        $target_file = $target_dir.basename($file_name);
        $size = $_FILES['attachments']['size'][0];
        $size_len = strlen($size);
        $sizeRep = str_replace(',', '.', number_format($size));

        $finalSize = add_size_suffix($size_len, $sizeRep);


        $filetypeallowed = preg_match("/.\.(gif|jpg|png|jpeg)$/i", $file_name);

        if (!$filetypeallowed) {
            $msg = array('status'=>2,'msg'=>'Only (gif | jpg | png | jpeg )', 'file'=>$file_name);

            exit(json_encode($msg));
        }

        if (file_exists($target_file)) {
            $msg = array('status'=>0, 'msg'=>'file already exists', 'filePath'=>$target_file, 'fileName'=>$file_name);

            exit(json_encode($msg));
        }

        // 2MB
        if ($_FILES['attachments']['size'][0] >  2000000) {
            $msg = array('status'=>1, 'msg'=>'file size to large', 'file'=>$target_file, 'fileName'=>$file_name);

            exit(json_encode($msg));
        }

        if (move_uploaded_file($_FILES['attachments']['tmp_name'][0], $target_file)) {
            $current_date = getdate();
            $timestamp = $current_date[0];

            $readable_date = date('m/d/Y H:i:s', $timestamp);
            $time = date('H:i:s', $timestamp);
            $date_now = date('m/d/Y', $timestamp);
            $month = $current_date['month'];
            $weekday = $current_date['weekday'];

            $loggedInUser = isset($_COOKIE['_unm'])?$_COOKIE['_unm']:$_SESSION['_unm'];
            // $uploaded_file_data = array(
            //     'location'=>$target_file,
            //     ''
            // )


            DatabaseFunctions::addGalleryImages('galleryImages', $target_file, 'Gallery image', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.(Change Me)', $finalSize, $loggedInUser, $readable_date, $time, $month, $weekday);

            Connect::checkConnection();

            // get the data of the uploaded file SO IT CAN BE USED TO render new table row
            $uploaded_file_data = DatabaseFunctions::getData('*','galleryImages','imgAddress', $target_file, false);

            $msg = array('status'=>7, 'msg'=>'file uploaded successfully to', 'file'=>$target_file, 'readable_size'=>$finalSize, 'uploaded_file_data'=>$uploaded_file_data);

            exit(json_encode($msg));
        }
    }
