<?php

	class Connect
	{
		private static $connection;
		private static $successConnection = 'false';
		public static $environment = 'DEV';

		private static function setConnection($environment)
		{
			if ($environment === "LIVE") {
				self::$connection = new mysqli("athleteshub.dev", "root", "root", "athletes");
			}
			if ($environment === "DEV") {
				self::$connection = new mysqli("db726429629.db.1and1.com", "dbo726429629", "idyldev%", "db726429629");
			}
			if ($environment === "LOCAL") {
				self::$connection = new mysqli("127.0.0.1", "root", "root", "furniture");
			}

		}

		public static function returnConnection()
		{
			return self::$connection;
		}

		public static function checkConnection($value='')
		{
			self::setConnection(self::$environment);

			if (self::returnConnection()->connect_error) {
				echo "Error message " . self::returnConnection()->connect_error;
				exit("ERROR CONNECTING TO DATABASE");
			}

			return true;
		}

		public static function returnConSuccess()
		{
			return self::$successConnection;
		}
	}

	// echo "Connect.php connected properly <br>";


 ?>
