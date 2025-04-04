$(document).ready(function() {

	$('#btnAddUser').on('click', function() {
		$.ajax({
			type: 'POST',
			url: 'ajax',
			data: {
				command: 'cmd_addUser',
				email: $('#email').val(),
				password: $('#password').val(),
				firstname: $('#firstname').val(),
				lastname: $('#lastname').val(),
				position: $('#position').val(),
				number: $('#number').val()
			}
		}).done(function(msg) {
			obj = JSON.parse(msg);
			console.log (obj);
			if (obj.result == 'success') {
				//btn.addClass('selected');
				//window.location.reload();
			}
			
		});
	
	});
			
});