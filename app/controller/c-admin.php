<?php

require ($cfg['server_path'] . '/check-login.php');

// Required CSS and JS
$required_css = array('admin');
$required_js = array('admin' => 1);
$required_modal = array();


// Load the view
require ($cfg['server_path'] . '/view/v-admin.php');

?>