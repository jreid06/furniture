<?php

	class Login
	{
		public $userName;
		public $userEmail;
		private $password;
		private $staySignedIn;

		public static $loginStatus = false;



		public function __construct($email=null, $pword=null, $cookie=false)
		{
			$this->userEmail = $email;
			$this->password = $pword;
			$this->staySignedIn = $cookie;
		}

		public function __toString()
		{
			return "Name: " . $this->userName . "--- Email: " . $this->userEmail . "--- CookieSet: " . $this->staySignedIn . "----- Status: " . self::returnLoginStatus();
		}

		static public function returnEmail()
		{
			return $this->userEmail;
		}

		static public function checkCookieSession()
		{

			if (self::$loginStatus) {
				// self::updateCookieSessionVariables();
				return true;
			}
			else if (isset($_COOKIE['tkn']) || isset($_SESSION['tkn'])) {
				self::updateLoginStatus();
				// self::updateCookieSessionVariables();
				return true;
			}
			else {
				// log out and delete cookie information from database
				return false;
			}
		}

		static public function updateCookieSessionVariables()
		{
			// return the values of either session or cookie depending on which one has been set
			$userID = isset($_COOKIE['_qni'])? $_COOKIE['_qni']:$_SESSION['_qni'];

			$userEmail = isset($_COOKIE['_uem'])?$_COOKIE['_uem']:$_SESSION['_uem'];
			$userName = isset($_COOKIE['_unm'])?$_COOKIE['_unm']:$_SESSION['_unm'];

			// --------- //

			// pull the latest info of the current user from the database to compare cookies/sessions with
			$data = DatabaseFunctions::getData('email, firstName', 'users', 'id', $userID);

			/*
			 	1. check to see if database value is not a match with current stored variable
				2. if its not then update the variable with the database value
			*/
			if ($data[0]['email'] != $userEmail) {
				isset($_COOKIE['_uem'])? setcookie('_uem', $data[0]['email'], time() + 86400, '/'):$_SESSION['_uem'] = $data[0]['email'];
			}

			if ($data[0]['firstName'] != $userName) {
				isset($_COOKIE['_unm'])? setcookie('_unm', $data[0]['firstName'], time() + 86400, '/'):$_SESSION['_unm'] = $data[0]['firstName'];
			}
		}

		static public function updateLoginStatus()
		{
			self::$loginStatus = true;
		}

		// static public function returnEmail()
		// {
		// 	return $this->userEmail;
		// }

		static public function returnLoginStatus()
		{
			return self::$loginStatus;
		}

		public function returnCookieValue()
		{
			return $this->staySignedIn;
		}

	}


 ?>