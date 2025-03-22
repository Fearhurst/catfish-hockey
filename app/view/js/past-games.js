$(document).ready(function() {
	
	$('.card').on('click', function() {
		let game_id = $(this).attr('data-gameid');
		window.location.href = 'game?id=' + game_id;
	});
	
});