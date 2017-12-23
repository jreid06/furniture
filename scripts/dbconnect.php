<?php
	session_start();
    define('ROOT_PATH', dirname(__DIR__).'/');

	require_once "random_compat-2.0.10/lib/random.php";
	require_once 'functions.php';

	require_once ROOT_PATH.'vendor/autoload.php';

	$stripe = array(
	  "secret_key"      => "sk_test_o3lzBtuNJXFJOnmzNUfNjpXW",
	  "publishable_key" => "pk_test_o1lkn4I74t5tIEB8rdzKbCtp"
	);

	\Stripe\Stripe::setApiKey($stripe['secret_key']);


	require_once ROOT_PATH.'vendor/twig/twig/lib/Twig/Autoloader.php';
	Twig_autoloader::register();
	$loader = new Twig_Loader_Filesystem(ROOT_PATH.'/twig_templates');
	$twig = new Twig_Environment($loader, array(
		'cache' => ROOT_PATH .'/twigcache',
		'auto_reload' => true,
		'debug' => true
	));
	$twig->addExtension(new Twig_Extension_Debug());
	$twig->addFilter(new Twig_SimpleFilter('start_case', function ($input) {
	   	// return ucwords($input);
		return strtoupper($input);
	}));

	$includes = array(
		'classes/connect.php',
		'classes/database.php'
	);
	foreach($includes as $file) {
     	include_once ROOT_PATH . $file;
	};

	// Connect::checkConnection();
	/**
	 *
	 */

     // set global variables for use across the whole website

 ?>
