<?php

	include 'dbconnect.php';

	if (isset($_COOKIE['idyl_tkn']) && isset($_POST['type'])) {

		$logout_success = Logout::signOutUser();
		$logout_status = json_decode($logout_success, true);

		if ($logout_status['status'] === 'true' || $logout_status['status']) {
			$msg = array(
				'status'=>array(
					'code'=> 101,
					'code_status'=>'success'
				),
				'data'=>array(
					'msg'=>'cookie data destroyed successfully',
					'deletedToken'=>$logout_status['cookieCode']
				)
			);

			exit(json_encode($msg));

		}else {
			$msg = array(
				'status'=>array(
					'code'=> 404,
					'code_status'=>'error'
				),
				'data'=>array(
					'msg'=>'error logging you out. Retry or contact help for further information',
					'log'=>json_encode($logout_status),
					'test'=>$logout_success
				)
			);

			exit(json_encode($msg));
		}

	}elseif (isset($_SESSION['idyl_tkn']) && isset($_POST['type'])) {
		$logout_success = Logout::signOutUser();

		$msg = array(
			'status'=>array(
				'code'=> 101,
				'code_status'=>'success'
			),
			'data'=>array(
				'msg'=>'session data destroyed successfully'
			)
		);

		exit(json_encode($msg));
	}
	else {
		$msg = array(
			'status'=>array(
				'code'=> 404,
				'code_status'=>'error'
			),
			'data'=>array(
				'msg'=>'Cant log you out as you are not currently logged in'
			)
		);

		exit(json_encode($msg));
	}


 ?>
