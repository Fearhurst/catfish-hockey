<?php include ('include/top.php'); ?>

<div id="page-content">
	
	<h3>Past Games</h3>
	<?php if ( !empty($pastGames) ) : ?>
	
	<?php foreach ($pastGames as $game) : ?>
	<div class="card" data-gameid="<?php echo($game['game_id']); ?>">
		<div class="row">
			<div class="col">
				<span class="game-date"><?php echo( date('D, M d', strtotime($game['game_time'])) ); ?></span> @ 
				<span class="game-time"><?php echo( date('h:i a', strtotime($game['game_time'])) ); ?></span>
				<div class="game-location"><?php echo( $game['game_location'] ); ?></div>
			</div>
			<div class="col text-right">
				<?php
					if ($game['catfish_score'] > $game['opponent_score']) {
						echo('WIN');	
					} else if ($game['catfish_score'] == $game['opponent_score']) {
						echo ('TIE');
					} else {
						echo ('LOSS');
					}
				?>
			</div>
		</div>
		
		<div class="row">
			<div class="col"><hr /></div>
		</div>
		
		<div class="row team">
			<div class="col team-name">
				Catfish Tapas</div>
			<div class="col team-score text-right"><?php echo($game['catfish_score']); ?></div>
		</div>
		<div class="row team">
			<div class="col team-name"><?php echo($game['game_opponent']); ?></div>
			<div class="col team-score text-right"><?php echo($game['opponent_score']); ?></div>
		</div>
		
		
<!--
		<div class="game-opponent">
			<?php echo ( ($game['game_home'] == 1) ? 'vs. ' : '@ ' ); ?><?php echo($game['game_opponent']); ?>
		</div>
		
		
		
		
-->
	</div>	
	<?php endforeach; ?>
	
	<?php else : ?>
	None...	
	<?php endif; ?>

</div>

<?php include ('include/bottom.php'); ?>