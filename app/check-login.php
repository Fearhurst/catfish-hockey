<?php
	
if (!$auth->isLoggedIn()) {
	header('Location: login');
	exit();
}

if (!isset($_SESSION['player_id'])) {
	header('Location: login');
	exit();
}

?>