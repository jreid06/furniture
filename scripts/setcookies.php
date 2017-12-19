<?php
	include 'dbconnect.php';

	$cookieCode = isset($_SESSION['tkn'])?$_SESSION['tkn']:'empty';
	$name = isset($_SESSION['_unm'])?$_SESSION['_unm']:'empty';
	$id = isset($_SESSION['_qni'])?$_SESSION['_qni']:'empty';
	$email = isset($_SESSION['_uem'])?$_SESSION['_uem']:'empty';
    $role = isset($_SESSION['_rle'])?$_SESSION['_rle']:'empty';

	setcookie('tkn', $cookieCode, time() + 86400, "/");
	// $_COOKIE['tkn'] = $cookieCode;
	setcookie('_unm', $name, time() + 86400, "/");
	setcookie('_qni', $id, time() + 86400, "/");
	setcookie('_uem', $email, time() + 86400, "/");
    setcookie('_rle', $email, time() + 86400, "/");

	header('location: ../');
	session_unset();
	session_destroy();




 ?>
