<?php

	class Connect
	{
		private static $connection;
		private static $successConnection = 'false';
		public static $environment = 'LOCAL';

		private static function setConnection($environment)
		{
			if ($environment === "LIVE") {
				self::$connection = new mysqli("athleteshub.dev", "root", "root", "athletes");
			}
			if ($environment === "DEV") {
				self::$connection = new mysqli("db713719409.db.1and1.com", "dbo713719409", "76O8wVzBEx8E%", "db713719409");
			}
			if ($environment === "LOCAL") {
				self::$connection = new mysqli("furniture.local", "root", "root", "furniture");
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
