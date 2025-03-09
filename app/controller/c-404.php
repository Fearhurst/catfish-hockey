<?php

// Required CSS and JS
$required_css = array();
$required_js = array();

// Chnage default meta details
$pagedata['title']				= "";
$pagedata['description']		= "";
$pagedata['og:title']			= "";
$pagedata['og:description']		= "";

// Load the view
require ($cfg['server_path'].'/view/v-404.php');

?>