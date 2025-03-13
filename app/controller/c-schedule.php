<?php

require ($cfg['server_path'] . '/check-login.php');

// Required CSS and JS
$required_css = array('schedule');
$required_js = array('schedule' => 1);
$required_modal = array();

$query = $db->prepare("SELECT * FROM game G, player P WHERE G.game_beer_player_id = P.player_id ORDER BY game_time LIMIT 1");
$query->execute();
$nextGame = $query->fetchAll(PDO::FETCH_ASSOC);

$query = $db->prepare("SELECT * FROM game ORDER BY game_time LIMIT 50 OFFSET 1");
$query->execute();
$upcomingGames = $query->fetchAll(PDO::FETCH_ASSOC);


// Load the view
require ($cfg['server_path'] . '/view/v-schedule.php');

?>