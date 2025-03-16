$(document).ready(function() {

/*
	$('.status').on('click', function() {
		
		event.stopPropagation();
		
		let btn = $(this);
		
		if (btn.hasClass('selected')) {
			return;
		}
		
		$('.status').removeClass('selected');
		
		let status;
		let game_id = $(this).parents('.card').attr('data-gameid');
		
		if ( btn.hasClass('status-in') ) {
			status = 1;
		}
		
		if ( btn.hasClass('status-out') ) {
			status = 0;
		}
		
		$.ajax({
			type: 'POST',
			url: 'ajax',
			data: {
				command: 'cmd_setStatus',
				status: status,
				game_id: game_id
			}
		}).done(function(msg) {
			obj = JSON.parse(msg);
			console.log (obj);
			if (obj.result == 'success') {
				btn.addClass('selected');
			}
			
		});
		
	});
	
	$('.card').on('click', function() {
		let game_id = $(this).attr('data-gameid');
		window.location.href = 'game?id=' + game_id;
	});
*/

});