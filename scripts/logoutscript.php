<?php

	include 'dbconnect.php';

	// if (isset($_SESSION['tkn']) || isset($_COOKIE['tkn'])) {
		header('location: ../');
		Logout::signOutUser();

		// echo "Val value: " . $val;
		// echo json_encode(array("S-DELETED","sessions deleted"));
	// }

 ?>