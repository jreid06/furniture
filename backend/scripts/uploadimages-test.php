<?php

    $output_dir = "../../assets/test/";

    if(isset($_FILES['img'])){
        $ret = array();

        if(!is_array($_FILES["img"]["name"])) //single file
	{
 	 	$fileName = $_FILES["img"]["name"];
 		move_uploaded_file($_FILES["myfile"]["tmp_name"],$output_dir.$fileName);
    	$ret[]= $fileName;
	}
	else  //Multiple files, file[]
	{
	  $fileCount = count($_FILES["img"]["name"]);
	  for($i=0; $i < $fileCount; $i++)
	  {
	  	$fileName = $_FILES["img"]["name"][$i];
		move_uploaded_file($_FILES["img"]["tmp_name"][$i],$output_dir.$fileName);
	  	$ret[]= $fileName;
	  }

	}

        $msg = array(
            'status'=>array(
                'code'=>101,
                'code_status'=>'success'
            ),
            'data'=> array(
                'msg'=>'test response',
                'files'=>$_FILES,
                'dir'=>sys_get_temp_dir()
            )
        );

        exit(json_encode( $msg ));
    }else {
        $msg = array(
            'status'=>array(
                'code'=>404,
                'code_status'=>'error'
            ),
            'data'=> array(
                'msg'=>'test error response. no files sent'
            )
        );

        exit(json_encode( $msg ));
    }

 ?>
