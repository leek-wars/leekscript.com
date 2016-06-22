<?php

spl_autoload_register(function ($class) {
	$file = '../class/' . $class . '.class.php';
	if (file_exists($file)) require($file);
});

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);

Util::init();

if (Util::isApi()) {

	header('Access-Control-Allow-Origin: *');

	session_set_cookie_params(0, '/', '', false, true);
	session_start();

	Router::start();

} else {

	echo ViewController::get('main');
	return;
}

?>
