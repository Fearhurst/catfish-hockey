<?php

require ($cfg['server_path'] . '/check-login.php');

if ( $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['command']) ) {

	if (in_array($_POST['command'], $cfg['validAjaxCommands'])) {
		$command = $_POST['command'];
	} else {
		exit(json_encode(array('result' => 'error')));
	}

	switch ($command) {
		
		case 'cmd_CommandName' :
			// Any ajax call will need to include $_POST['cmd_CommandName'] to trigger the right switch case
			exit();
			
		break;
		
		default :
			exit(json_encode(array('result' => 'error')));
		
		break;
	
	}

}

?>
