<?php

require ($cfg['server_path'] . '/check-login.php');

// Required CSS and JS
$required_css = array('home');
$required_js = array('home' => 1);
$required_modal = array();


// Load the view
require ($cfg['server_path'] . '/view/v-home.php');

?>