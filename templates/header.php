
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


        <!-- ONLINE BS css & VUE -->
        <!-- <script src="https://cdn.jsdelivr.net/npm/vue"></script> -->
	   	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

        <!-- <link rel="stylesheet" href="/bootstrap-4.0.0-alpha.6-dist/css/bootstrap.min.css"> -->
        <!-- <link rel="stylesheet" href="/bootstrap-4.0.0-alpha.6-dist/css/bootstrap-grid.min.css"> -->
        <!-- <link rel="stylesheet" href="/bootstrap-4.0.0-alpha.6-dist/css/bootstrap-reboot.min.css"> -->
	    <link href="https://fonts.googleapis.com/css?family=Quicksand|Raleway:400,600" rel="stylesheet">

        <!-- ONLINE SLICK-->
        <!-- <link rel="stylesheet" href=https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css> -->
        <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"> -->

        <!-- OFFLINE SLICK-->
        <link rel="stylesheet" href="/slick-1.8.0/slick/slick.css">
        <link rel="stylesheet" href="/slick-1.8.0/slick/slick-theme.css">


        <link rel="stylesheet" href="/font-awesome-4.7.0/css/font-awesome.min.css">
	    <!-- Custom CSS -->
		<link rel="stylesheet" href="/css/main.css">
	    <link rel="stylesheet" href="/css/hover-min.css">

        <!-- ONLINE JQUERY-->
		<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
        <script src="/js/plugins/jquery.validate.js" charset="utf-8"></script>

        <!-- OFFLINE JQUERY & VUE -->
        <!-- <script src="/js/jquery-3.2.1.min.js"></script> -->
        <script src="/js/vue.js"></script>
        <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <!-- <script src="/js/plugins/jquerymigrate-1.2.1.min.js"></script> -->

        <!-- OFFLINE SLICK -->
        <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script> -->

        <!-- ONLINE SLICK -->
        <script src="/slick-1.8.0/slick/slick.min.js"></script>
        <!-- <script src="https://js.stripe.com/v3/"></script> -->

        <!-- NOTE: allow script to work in basket only -->
        <!-- $_SERVER['REQUEST_URI'] === "/basket" -->
        <?php if (true): ?>
            <script src="https://checkout.stripe.com/checkout.js"></script>
        <?php endif; ?>

	</head>

	<body style="position: relative" class="">
