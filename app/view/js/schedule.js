$(document).ready(function() {

	$('.attendance').on('click', function() {
		
		event.stopPropagation();
		
		let btn = $(this);
		
		if (btn.hasClass('selected')) {
			return;
		}
		
		$('.attendance').removeClass('selected');
		
		let attendance;
		let game_id = $(this).parents('.card').attr('data-gameid');
		
		if ( btn.hasClass('attendance-in') ) {
			attendance = 'in';
		}
		
		if ( btn.hasClass('attendance-out') ) {
			attendance = 'out';
		}
		
		$.ajax({
			type: 'POST',
			url: 'ajax',
			data: {
				command: 'cmd_setAttendance',
				attendance: attendance,
				game_id: game_id
			}
		}).done(function(msg) {
			obj = JSON.parse(msg);
			console.log (obj);
			if (obj.result == 'success') {
				//btn.addClass('selected');
				window.location.reload();
			}
			
		});
		
	});
	
	$('.card').on('click', function() {
		let game_id = $(this).attr('data-gameid');
		window.location.href = 'game?id=' + game_id;
	});
	
});