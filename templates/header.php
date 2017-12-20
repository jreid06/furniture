<?php
   $root_dir = '';
    if ($_SERVER['PHP_SELF'] === '/athlete/profile.php'){
        $add_dots = '../';
    }else {
        $add_dots = '';
    }
 ?>

<!DOCTYPE html>
<html style="overflow-x: hidden">
	<head>
		<meta charset="utf-8">
		<title>Vue Js</title>

		<meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />

	    <meta name="description" content="">
	    <meta name="keywords" content="athletes">
	    <meta name="author" content="Jason Brandon Reid">


        <!-- <script src="https://cdn.jsdelivr.net/npm/vue"></script> -->
	   	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

	    <link href="https://fonts.googleapis.com/css?family=Quicksand|Raleway:400,600" rel="stylesheet">
        <!-- <link rel="stylesheet" href="<?=$add_dots?>css/basic.css"> -->
		<!-- <link rel="stylesheet" href="<?=$add_dots?>css/animate.css"> -->
        <link rel="stylesheet" href=https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">
	    <!-- Custom CSS -->
		<link rel="stylesheet" href="<?=$add_dots?>/css/main.css">
	    <link rel="stylesheet" href="<?=$add_dots?>/css/hover-min.css">

		<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
        <!-- <script src="/js/vue.js" charset="utf-8"></script> -->
        <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
		<script src="/js/plugins/jquery.validate.js" charset="utf-8"></script>

	</head>

	<body style="position: relative" class="">
