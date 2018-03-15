<?php
	session_start();
    define('ROOT_PATH', dirname(__DIR__).'/');

	$root_dir = dirname(__DIR__).'/assets/test/';
	$root_dir_slide = dirname(__DIR__).'/assets/slideshow/';
	$root_dir_blog = dirname(__DIR__).'/assets/blogimages/';

	$months = array('january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december');

	require_once "random_compat-2.0.10/lib/random.php";
	require_once "parsedown/Parsedown.php";
	require_once "easypost-php/lib/easypost.php";
	// require_once "shippo-php-client/lib/Shippo.php";
	require_once 'functions.php';

	require_once ROOT_PATH.'vendor/autoload.php';

	$stripe = array(
	  "secret_key"      => "sk_test_o3lzBtuNJXFJOnmzNUfNjpXW",
	  "publishable_key" => "pk_test_o1lkn4I74t5tIEB8rdzKbCtp"
	);

	// \Stripe\Stripe::setApiKey($stripe['secret_key']);


	require_once ROOT_PATH.'vendor/twig/twig/lib/Twig/Autoloader.php';
	Twig_autoloader::register();
	$loader = new Twig_Loader_Filesystem(ROOT_PATH.'/twig_templates');
	$twig = new Twig_Environment($loader, array(
		'cache' => ROOT_PATH .'/twigcache',
		'auto_reload' => true,
		'debug' => true
	));
	$twig->addExtension(new Twig_Extension_Debug());

	// create twig filters

	$twig->addFilter(new Twig_SimpleFilter('start_case', function ($input) {
	   	// return ucwords($input);
		return strtoupper($input);
	}));

	$twig->addFilter(new Twig_SimpleFilter('camel_case', function ($input) {
		return ucwords($input);
	}));

	$twig->addFilter(new Twig_SimpleFilter('timestamp_format', function ($input) {
		return format_timestamp($input);
	}));

	$twig->addFilter(new Twig_SimpleFilter('decode', function ($input) {
		return json_decode($input, true);
	}));

	// include necessary files

	$includes = array(
		'classes/connect.php',
		'classes/database.php',
		'classes/logout.php',
		'classes/address.php',
		'classes/itemorder.php'
	);
	foreach($includes as $file) {
     	include_once ROOT_PATH . $file;
	};

	$from_address = array(
		"street1" => "39 sandmere road",
		"street2" => "N/a",
		"city"    => "london",
		"state"   => "GB",
		"zip"     => "sw47ps",
		"country" => "UK",
		"company" => "IDYL",
		"phone"   => "415-123-4567"
	);

	// $session_not_set = !isset($_SESSION['idyl_tkn'])?true:'session is set';
	// $cookie_not_set = !isset($_COOKIE['idyl_tkn'])?true:'cookie is set';
    //
	// if ($session_not_set && $cookie_not_set) {
	// 	// SET BASKET SESSION TO EXPIRE AFTER SESSION IS CLOSED DAYS
	// 	setcookie('idyl_basket_session', bin2hex(random_bytes(10)), 0, "/");
	// }



	// Connect::checkConnection();
	/**
	 *
	 */

     // set global variables for use across the whole website

 ?>
