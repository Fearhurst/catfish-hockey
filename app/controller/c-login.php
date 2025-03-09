<?php

// Required CSS and JS
$required_css = array('login');
$required_js = array();
$required_modal = array();

if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
	
	//$userId = $auth->register("cfairhurst@gmail.com", $_POST['password'], null);
	//exit();

	$error = NULL;
	
	try {
		// Stay logged in for 1 year
		$rememberDuration = (int) (60 * 60 * 24 * 365.25);
		$auth->login($_POST['email'], $_POST['password'], $rememberDuration);
		
		header('Location: home');
		exit();
	
	} catch (\Delight\Auth\InvalidEmailException $e) {
		$error = 'Invalid credentials';
	
	} catch (\Delight\Auth\InvalidPasswordException $e) {
		$error = 'Invalid credentials';
	
	} catch (\Delight\Auth\EmailNotVerifiedException $e) {
		$error = 'Invalid credentials';
	
	} catch (\Delight\Auth\TooManyRequestsException $e) {
		$error = 'Too many requests';
	
	}

}

// Load the view
require ($cfg['server_path'].'/view/v-login.php');

?>