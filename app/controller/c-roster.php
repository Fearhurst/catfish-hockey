<?php

require ($cfg['server_path'] . '/check-login.php');

// Required CSS and JS
$required_css = array('roster');
$required_js = array('roster' => 1);
$required_modal = array();

$query = $db->prepare("SELECT * FROM player");
$query->execute();
$players = $query->fetchAll(PDO::FETCH_ASSOC);


// Load the view
require ($cfg['server_path'] . '/view/v-roster.php');

?>