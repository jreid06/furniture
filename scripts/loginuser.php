<?php
	include 'dbconnect.php';

	if (isset($_POST['type'])) {

		$user_login_details = $_POST['user'];
		$email = $user_login_details['email'];
		$pass = $user_login_details['password'];
		$staySignedIn = $user_login_details['rememberMe'];

		// check to make sure that email entered is valid e.g a real email address with @something.co.uk/com .etc
		$emailReal = filter_var($email, FILTER_VALIDATE_EMAIL);
		if ($emailReal) {
			$emailTrue = true;
		}else {
			$msg = array(
				'status'=>array(
					'code'=> 404,
                    'code_status'=>'error'
                ),
                'data'=>array(
                    'msg'=>'email is not valid. please enter a real email'
                )
			);

			exit(json_encode($msg));
		}


		if (DatabaseFunctions::checkExists($email) && $emailTrue) {

			$userDetails = DatabaseFunctions::getDetailsLogin($email)->fetch_assoc();

			// verify password
			if (verifyPassword($pass, $userDetails['password'])) {

				// check whether to set cookies or session variables
				$sign_in_status = 'session';

				if ($staySignedIn === "true") {
					$sign_in_status = 'cookie';

					// create logged in cookies
					if (generatecookieToken(20 ,$email, $userDetails['fname'], $userDetails['cus_id'], $userDetails['address'])) {

						$msg = array(
							'status'=>array(
								'code'=> 101,
								'code_status'=>'success'
							),
							'data'=>array(
								'msg'=>'user logged in and cookies have been set',
								'cookie'=>json_encode($_COOKIE)
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
								'msg'=>'error creating cookies. please check',
							)
						);

						exit(json_encode($msg));
					}



				}else {
					// create logged in session

					$_SESSION['idyl_tkn'] = bin2hex(random_bytes(20));
					$_SESSION['idyl_unm'] = $userDetails['fname'];
					$_SESSION['idyl_qni'] = $userDetails['cus_id'];
					$_SESSION['idyl_uem'] = $email;
					$_SESSION['idyl_uaddrs'] = $userDetails['address'];


					$msg = array(
						'status'=>array(
							'code'			=> 101,
							'code_status'	=>'success'
						),
						'data'=>array(
							'msg'			=>'user logged in successfully. session has begun. will end when browser is closed'
						),
						'user'=>array(
							'details'		=>json_encode($userDetails)
						)
					);

					exit(json_encode($msg));
				}


			}else {
				$msg = array(
					'status'=>array(
						'code'			=> 404,
						'code_status'	=>'error',
						'name'  		=>'password'
					),
					'data'=>array(
						'msg'			=>'Error with email or password entered'
					)
				);

				exit(json_encode($msg));
			}


		}else {
			$msg = array(
				'status'=>array(
					'code'			=> 404,
					'code_status'	=>'error',
					'name'  		=>'email'
				),
				'data'=>array(
					'msg'			=>'Error with email or password entered'
				)
			);

			exit(json_encode($msg));
		}

	}else {
		header('location: ../index');
	}




 ?>
