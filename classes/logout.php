<?php

	class Logout
	{

		static public function signOutUser()
		{

			if (isset($_COOKIE['idyl_tkn'])) {
				$result = DatabaseFunctions::destroyLoggedInData();
				return $result;
			}

			if (isset($_SESSION['idyl_tkn'])) {
				session_unset();
				session_destroy();

				$msg = array(
					'type'=>'session',
					'status'=> 'deleted'
				);

				return $msg;
			}

		}
	}

 ?>
