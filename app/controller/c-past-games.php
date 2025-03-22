<?php

require ($cfg['server_path'] . '/check-login.php');

// Required CSS and JS
$required_css = array('past-games');
$required_js = array('past-games' => 1);
$required_modal = array();

$query = $db->prepare("SELECT * FROM game G LEFT JOIN player P ON G.game_beer_player_id = P.player_id WHERE game_time < NOW() ORDER BY game_time");
$query->execute();
$pastGames = $query->fetchAll(PDO::FETCH_ASSOC);


// Load the view
require ($cfg['server_path'] . '/view/v-past-games.php');

?>