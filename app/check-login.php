<?php
	
if (!$auth->isLoggedIn()) {
	header('Location: login');
	exit();
}

// Get user ID
$id = $auth->getUserId();

?>