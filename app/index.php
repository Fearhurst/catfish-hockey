<?php

\ini_set('session.cookie_httponly', 1);

require ("../config/config.php");
require __DIR__ . '/vendor/autoload.php';
require ("functions.php");
require ("init.php");

$auth = new \Delight\Auth\Auth($db);

// Figure out the page
if ( isset($_GET['p']) && !empty($_GET['p']) ) {
	$urlParts = explode('/', $_GET['p']);	
	$page = $urlParts[0];
} else {
	$page = "login";
}

$controller = 'controller/c-'.$page.'.php';

if (file_exists($controller)) {
	include($controller);
} else {
	include('controller/c-404.php');
}

?>
