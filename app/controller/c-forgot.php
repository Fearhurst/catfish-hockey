<?php

// Required CSS and JS
$required_css = array('login');
$required_js = array();
$required_modal = array();

$reset_step = 'start';

if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
	
	if ( isset($_POST['selector']) && isset($_POST['token']) && isset($_POST['password']) ) {

		try {
			$auth->resetPasswordAndSignIn($_POST['selector'], $_POST['token'], $_POST['password']);
			$reset_step = 'complete';
			
		} catch (\Delight\Auth\InvalidSelectorTokenPairException $e) {
		    $error = 'Invalid token';
		
		} catch (\Delight\Auth\TokenExpiredException $e) {
			$error = 'Token expired';
		
		} catch (\Delight\Auth\ResetDisabledException $e) {
			$error = 'Password reset is disabled';
		
		} catch (\Delight\Auth\InvalidPasswordException $e) {
			$error = 'Invalid password';
		
		} catch (\Delight\Auth\TooManyRequestsException $e) {
			$error = 'Too many requests';
		
		}
				
	} else if ( isset($_POST['email']) ) {
				
		// Generate the reset link
		try {
			$auth->forgotPassword($_POST['email'], function ($selector, $token) use($reset_step) {
				
				global $cfg;
				//global $reset_step;
				
				$url = $cfg['url'] . '/forgot?s=' . \urlencode($selector) . '&t=' . \urlencode($token);
				//echo ($url);
				
				// Email the URL
				$postmark_result = sendPasswordResetEmail($_POST['email'], $url);
				//die ($postmark_result);
				
				$reset_step = 'link';
			
			});
		
		} catch (\Delight\Auth\InvalidEmailException $e) {
			$error = 'Invalid email address';
		
		} catch (\Delight\Auth\EmailNotVerifiedException $e) {
			$error = 'Email not verified';
		
		} catch (\Delight\Auth\ResetDisabledException $e) {
			$error = 'Password reset is disabled';
		
		} catch (\Delight\Auth\TooManyRequestsException $e) {
			$error = 'Too many requests';
		
		}
		
	}
		
} else if ( isset($_GET['s']) && isset($_GET['t']) ) {
	
	try {
    	$auth->canResetPasswordOrThrow($_GET['s'], $_GET['t']);
		$reset_step = 'prompt';
		
	} catch (\Delight\Auth\InvalidSelectorTokenPairException $e) {
		$error = 'Invalid token';
	
	} catch (\Delight\Auth\TokenExpiredException $e) {
		$error = 'Token expired';
	
	} catch (\Delight\Auth\ResetDisabledException $e) {
		$error = 'Password reset is disabled';
	
	} catch (\Delight\Auth\TooManyRequestsException $e) {
		$error = 'Too many requests';
	}
	
}

// Load the view
require ($cfg['server_path'].'/view/v-forgot.php');

?>