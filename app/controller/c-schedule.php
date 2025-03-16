<?php

require ($cfg['server_path'] . '/check-login.php');

// Required CSS and JS
$required_css = array('schedule');
$required_js = array('schedule' => 1);
$required_modal = array();

$query = $db->prepare("SELECT * FROM game G, player P WHERE G.game_beer_player_id = P.player_id ORDER BY game_time LIMIT 1");
$query->execute();
$nextGame = $query->fetchAll(PDO::FETCH_ASSOC);

$query = $db->prepare("SELECT count(*) AS nextGameIn FROM player_game WHERE game_id = :game_id AND attendance = :attendance");
$query->execute( array(":game_id" => $nextGame[0]['game_id'], ":attendance" => "in") );
$nextGameIN = $query->fetchColumn();

$query = $db->prepare("SELECT count(*) AS nextGameOUT FROM player_game WHERE game_id = :game_id AND attendance = :attendance");
$query->execute( array(":game_id" => $nextGame[0]['game_id'], ":attendance" => "out") );
$nextGameOUT = $query->fetchColumn();

$query = $db->prepare("SELECT * FROM game ORDER BY game_time LIMIT 50 OFFSET 1");
$query->execute();
$upcomingGames = $query->fetchAll(PDO::FETCH_ASSOC);

$query = $db->prepare("SELECT game_id, attendance FROM player_game WHERE player_id = :player_id");
$query->execute( array(":player_id" => $id) );
$playerGames = $query->fetchAll(PDO::FETCH_KEY_PAIR);



// Load the view
require ($cfg['server_path'] . '/view/v-schedule.php');

?>