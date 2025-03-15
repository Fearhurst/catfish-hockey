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
			
			if (
				isset($_POST['status']) &&
				in_array($_POST['status'], array(0,1)) &&
				isset($_POST['game_id']) &&
				is_numeric($_POST['game_id'])
			) {
				
				// 1. Check if this user has a status already set for this game
				$query = $db->prepare("SELECT id FROM player_game WHERE player_id = :player_id AND game_id = :game_id");
				$query->execute( array("player_id" => $id, ":game_id" => $_POST['game_id']) );
				$result = $query->fetchColumn();
				
				if (!empty($result)) {
					// There is already a status record for this player
					$query = $db->prepare("UPDATE player_game SET status = :status WHERE id = :id");
					
					if ($query->execute( array(":status" => $_POST['status'], ":id" => $result)) ) {
						exit(json_encode(array('result' => 'success')));
						
					} else {
						exit(json_encode(array('result' => 'error')));
					}
				
				} else {
					// This is the first time this player has checked in for this game
					$query = $db->prepare("INSERT into player_game (player_id, game_id, status) VALUES (:player_id, :game_id, :status)");
					
					if ($query->execute( array(":player_id" => $id, ":game_id" => $_POST['game_id'], ":status" => $_POST['status'])) ) {
						exit(json_encode(array('result' => 'success')));
						
					} else {
						exit(json_encode(array('result' => 'error')));
					}
				
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
