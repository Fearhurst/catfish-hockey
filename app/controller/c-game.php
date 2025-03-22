<?php

require ($cfg['server_path'] . '/check-login.php');

// Required CSS and JS
$required_css = array('game');
$required_js = array('game' => 1);
$required_modal = array();

$query = $db->prepare("SELECT G.game_id, G.game_time, G.game_opponent, G.game_location, G.game_home, G.catfish_score, G.opponent_score, P.player_firstname AS beer_player_firstname, P.player_lastname AS beer_player_lastname FROM game G LEFT JOIN player P ON G.game_beer_player_id = P.player_id WHERE G.game_id = :game_id LIMIT 1");

$query->execute( array(":game_id" => $_GET['id']) );
$game = $query->fetchAll(PDO::FETCH_ASSOC);

$query = $db->prepare("SELECT P.player_id AS p_id, player_firstname, player_lastname, player_number,
	(SELECT attendance FROM player_game WHERE player_id = p_id AND game_id = :game_id) as game_attendance
	FROM player P"
);
$query->execute( array(":game_id" => $game[0]['game_id']) );
$players = $query->fetchAll(PDO::FETCH_ASSOC);


/*
echo('<pre>');
print_r ($players);
echo('</pre>');
exit();
*/


$in = [];
$out = [];
$unknown = [];

foreach ($players as $player) {
	
	if ($player['game_attendance'] == 'out') {
		$out[$player['p_id']] = $player;
	
	} else if ($player['game_attendance'] == 'in') {
		$in[$player['p_id']] = $player;
	
	} else if (is_null($player['game_attendance'])) {
		$unknown[$player['p_id']] = $player;
	
	}
	
}

/*
echo('<pre>');
print_r ($in);
echo('</pre>');

echo('<pre>');
print_r ($out);
echo('</pre>');

echo('<pre>');
print_r ($unknown);
echo('</pre>');
exit();
*/

// Load the view
require ($cfg['server_path'] . '/view/v-game.php');

?>