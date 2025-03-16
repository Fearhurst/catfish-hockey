<?php include ('include/top.php'); ?>

<div id="page-content">
	
	<?php foreach($players as $player) : ?>
	<div class="card">
		<span class="player-number">#<?php echo($player['player_number']); ?></span>
		<span class="player-name"><?php echo($player['player_firstname']); ?> <?php echo($player['player_lastname']); ?></span>
	</div>
	<?php endforeach; ?>

</div>

<?php include ('include/bottom.php'); ?>