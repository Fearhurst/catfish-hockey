<?php

// Required CSS and JS
$required_css = array('login');
$required_js = array('login' => 1);
$required_modal = array();

if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
	
	$error = NULL;
	
	try {
		// Stay logged in for 1 year
		$rememberDuration = (int) (60 * 60 * 24 * 365.25);
		$auth->login($_POST['email'], $_POST['password'], $rememberDuration);
		
		// Get player details and add to the session
		$player = getPlayerInfo($auth->getUserId());
		
		foreach ($player as $key => $val) {
			//echo $key . ": " . $val . "<br />";
			$_SESSION[$key] = $val;
		}
		
		header('Location: schedule');
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