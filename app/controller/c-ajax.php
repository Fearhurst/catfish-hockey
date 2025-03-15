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
		
		case 'cmd_setStatus' :
			
			//print_r ($_POST);
			
			if (
				isset($_POST['status']) &&
				in_array($_POST['status'], array(0,1)) &&
				isset($_POST['game_id']) &&
				is_numeric($_POST['game_id'])
			) {
				//$query = $db->prepare("UPDATE player_game SET player_id = :player_id AND game_id = :game_id AND status = :status");
				$query = $db->prepare("INSERT into player_game (player_id, game_id, status) VALUES (:player_id, :game_id, :status)");
				
				if ($query->execute( array(":player_id" => $id, ":game_id" => $_POST['game_id'], ":status" => $_POST['status'])) ) {
					exit(json_encode(array('result' => 'success')));
					
				} else {
					exit(json_encode(array('result' => 'error')));
				}
				
			}
			
			exit();
			
		break;
		
		
		default :
			exit(json_encode(array('result' => 'error')));
		
		break;
	
	}

}

?>
