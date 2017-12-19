<?php
	include 'dbconnect.php';

	if ($_POST['click'] === "true") {
		$email = $_POST['email'];
		$pass = $_POST['pass'];
		$staySignedIn = $_POST['cookie'];

		/*
			UPDATES PASSWORD WHEN USER HAS BEEN ADDED MANUALLY
			Connect::checkConnection();
			updatePassword(Connect::returnConnection(), $pass);
		*/

		// Connect::checkConnection();
		// updatePassword(Connect::returnConnection(), $pass);
		// check to make sure that email entered is valid e.g a real email address with @something.co.uk/com .etc
		$emailReal = filter_var($email, FILTER_VALIDATE_EMAIL);
		if ($emailReal) {
			$emailTrue = true;
		}

		if (DatabaseFunctions::checkExists($email) && $emailTrue) {

			// echo "User Exists \n";
			$userDetails = DatabaseFunctions::getDetails($email)->fetch_assoc();

            if ($userDetails['role'] !== 'admin') {
                echo "NOACCESS-Your account doesnt have permission to sign in yet";
                die();
            }

			if (verifyPassword($pass, $userDetails['password'])) {
				// echo "correct password";

				// get users id
				Connect::checkConnection();
				$id = DatabaseFunctions::getData('id', 'users', 'email', $email);

				if ($staySignedIn === "true") {

					generatecookieToken(20 ,$email, $userDetails['firstName'], $id[0]['id'],  Connect::returnConnection(), $userDetails['role']);

				}else{

					//create our session varaiables for the user

					$_SESSION['tkn'] = bin2hex(random_bytes(20));
					$_SESSION['_unm'] = $userDetails['firstName'];
					$_SESSION['_qni'] = $id[0]['id'];
					$_SESSION['_uem'] = $email;
                    $_SESSION['_rle'] = $userDetails['role'];
					echo "\n SESSION CREATED \n ";
				}
			}
			else {
				echo "Check Password is Correct";
			}

		}
		else {
			echo "User Doesn't exist. Check Email is Correct";
		}
	}else {
		header('location: ../index');
	}




 ?>
