<?php include ('include/top.php'); ?>

<div id="page-content">
	
	<h2>Next Game</h2>
	<?php if ( !empty($nextGame) ) : ?>
	<div class="card" data-gameid="<?php echo($nextGame[0]['game_id']); ?>">
		<div class="game-opponent"><?php echo ( ($nextGame[0]['game_home'] == 1) ? 'vs. ' : '@ ' ); ?><?php echo($nextGame[0]['game_opponent']); ?></div>
		<div class="game-details">
			<div class="game-date"><?php echo( date('D, M d, Y', strtotime($nextGame[0]['game_time'])) ); ?> - <?php echo( date('h:i a', strtotime($nextGame[0]['game_time'])) ); ?></div>
			<div class="game-location"><?php echo( $nextGame[0]['game_location'] ); ?></div>
		</div>
		
		<div class="duties">
			<?php $beerduty = $nextGame[0]['beer_player_firstname'] . " " . $nextGame[0]['beer_player_lastname']; ?>
			<table>
				<tbody>
					<tr>
						<td style="padding-left: 0;"><span class="icon">🍺</span><?php echo( $beerduty == " " || empty($beerduty) ? ' Nobody!' : " " . $beerduty ); ?></td>
						<td class="admin-td">
							<?php if ( $auth->hasRole(\Delight\Auth\Role::ADMIN) && strtotime($nextGame[0]['game_time']) > time() ) : ?>
							<select class="admin-beerdute">
								<option value=""></option>
								<?php foreach ($players as $player) : ?>
								<option value="<?php echo($player['p_id']); ?>"><?php echo($player['player_firstname'] . " " . $player['player_lastname']); ?></option>
								<?php endforeach; ?>
							</select>
							<?php else : ?>
							&nbsp;
							<?php endif; ?>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
		
		<div class="attendance-container is-center">
			<div class="attendance attendance-in button inner-pad<?php echo ( (array_key_exists($nextGame[0]['game_id'], $playerGames) && $playerGames[$nextGame[0]['game_id']] == 'in' ) ? ' selected' : '' ); ?>">
				<span class="button-text pull-left">
					<span class="checkmark">⎦</span>IN
				</span>
				<span class="player-count pull-right"><?php echo $nextGameIN; ?></span>
			</div>
			<div class="attendance attendance-out button inner-pad<?php echo ( (array_key_exists($nextGame[0]['game_id'], $playerGames) && $playerGames[$nextGame[0]['game_id']] == 'out' ) ? ' selected' : '' ); ?>">
				<span class="button-text pull-left">
					<span class="x">✕</span>OUT
				</span>
				<span class="player-count pull-right"><?php echo $nextGameOUT; ?></span>
			</div>
		</div>
		
	</div>
	<?php else : ?>
	None...
	<?php endif; ?>
	
	<h3>Upcoming Games</h3>
	<?php if ( !empty($upcomingGames) ) : ?>
	
	<?php foreach ($upcomingGames as $game) : ?>
	<div class="card" data-gameid="<?php echo($game['game_id']); ?>">
		<div class="game-opponent">
			<?php echo ( ($game['game_home'] == 1) ? 'vs. ' : '@ ' ); ?><?php echo($game['game_opponent']); ?>
		</div>
		<div class="game-date"><?php echo( date('D, M d', strtotime($game['game_time'])) ); ?></div>
		<div class="game-time"><?php echo( date('h:i a', strtotime($game['game_time'])) ); ?></div>
		<div class="game-location"><?php echo( $game['game_location'] ); ?></div>
	</div>	
	<?php endforeach; ?>
	
	<?php else : ?>
	None...	
	<?php endif; ?>
	
	<?php 
/*
		echo('<pre>');
		print_r ($_SESSION);
		echo('</pre>');
*/
	?>
</div>

<?php include ('include/bottom.php'); ?>