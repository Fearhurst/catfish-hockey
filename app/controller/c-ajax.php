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
		
		case 'cmd_setAttendance' :
			
			if (
				isset($_POST['attendance']) &&
				in_array($_POST['attendance'], array('in','out')) &&
				isset($_POST['game_id']) &&
				is_numeric($_POST['game_id'])
			) {
				
				// 1. Check if this user has a status already set for this game
				$query = $db->prepare("SELECT id FROM player_game WHERE player_id = :player_id AND game_id = :game_id");
				$query->execute( array("player_id" => $_SESSION['player_id'], ":game_id" => $_POST['game_id']) );
				$result = $query->fetchColumn();
				
				if (!empty($result)) {
					// There is already a status record for this player
					$query = $db->prepare("UPDATE player_game SET attendance = :attendance WHERE id = :id");
					
					if ($query->execute( array(":attendance" => $_POST['attendance'], ":id" => $result)) ) {
						exit(json_encode(array('result' => 'success')));
						
					} else {
						exit(json_encode(array('result' => 'error1')));
					}
				
				} else {
					// This is the first time this player has checked in for this game
					$query = $db->prepare("INSERT into player_game (player_id, game_id, attendance) VALUES (:player_id, :game_id, :attendance)");
					
					if ($query->execute( array(":player_id" => $_SESSION['player_id'], ":game_id" => $_POST['game_id'], ":attendance" => $_POST['attendance'])) ) {
						exit(json_encode(array('result' => 'success')));
						
					} else {
						exit(json_encode(array('result' => 'error2')));
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
