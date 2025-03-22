<?php include ('include/top.php'); ?>

<div id="page-content">
	
	<div class="card" data-gameid="<?php echo($game[0]['game_id']); ?>">
		<div class="game-opponent"><?php echo ( ($game[0]['game_home'] == 1) ? 'vs. ' : '@ ' ); ?><?php echo($game[0]['game_opponent']); ?></div>
		<div class="game-details">
			<div class="game-date"><?php echo( date('D, M d, Y', strtotime($game[0]['game_time'])) ); ?> - <?php echo( date('h:i a', strtotime($game[0]['game_time'])) ); ?></div>
			<div class="game-location"><?php echo( $game[0]['game_location'] ); ?></div>
		</div>
		
		<?php $beerduty = $game[0]['beer_player_firstname'] . " " . $game[0]['beer_player_lastname']; ?>
		<div class="duties"><span class="icon">🍺</span><?php echo( $beerduty == " " || empty($beerduty) ? ' Holy shit! Nobody\'s on beer!' : " " . $beerduty ); ?></div>
		
		<?php if ( new DateTime() < new DateTime($game[0]['game_time']) ) : ?>
		<div class="attendance-container is-center">
			<div class="attendance attendance-in button inner-pad<?php echo ( array_key_exists($id, $in) ? ' selected' : '' ); ?>">
				<span class="button-text pull-left">
					<span class="checkmark">⎦</span>IN
				</span>
				<span class="player-count pull-right"><?php echo(count($in)); ?></span>
			</div>
			<div class="attendance attendance-out button inner-pad<?php echo ( array_key_exists($id, $out) ? ' selected' : '' ); ?>">
				<span class="button-text pull-left">
					<span class="x">✕</span>OUT
				</span>
				<span class="player-count pull-right"><?php echo(count($out)); ?></span>
			</div>
		</div>
		
		<?php else : ?>
		
		<div class="row">
			<div class="col"><hr /></div>
		</div>

		<div class="row team score">
			<div class="col team-name">Catfish Tapas</div>
			<div class="col team-score text-right"><?php echo($game[0]['catfish_score']); ?></div>
		</div>
		<div class="row team score">
			<div class="col team-name"><?php echo($game[0]['game_opponent']); ?></div>
			<div class="col team-score text-right"><?php echo($game[0]['opponent_score']); ?></div>
		</div>
		
		<?php endif; ?>
		
		
	</div>
	
	<div class="card">
		<h2>In</h2>
		<hr />
		<table>
			<tbody>
				<?php foreach ($in as $player) :?>
				<tr>
					<td>
						<span class="player-number in"><?php echo($player['player_number']); ?></span>
						<span class="player-name"><?php echo($player['player_firstname']); ?> <?php echo($player['player_lastname']); ?></span>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
	
	<div class="card">
		<h2>Out</h2>
		<hr />
		<table>
			<tbody>
				<?php foreach ($out as $player) :?>
				<tr>
					<td>
						<span class="player-number out"><?php echo($player['player_number']); ?></span>
						<span class="player-name"><?php echo($player['player_firstname']); ?> <?php echo($player['player_lastname']); ?></span>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
	
	<div class="card">
		<h2>Unknown</h2>
		<hr />
		<table>
			<tbody>
				<?php foreach ($unknown as $player) :?>
				<tr>
					<td>
						<span class="player-number unknown"><?php echo($player['player_number']); ?></span>
						<span class="player-name"><?php echo($player['player_firstname']); ?> <?php echo($player['player_lastname']); ?></span>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
	
</div>

<?php include ('include/bottom.php'); ?>