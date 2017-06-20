$.ajaxSetup({error: failure})

function logged_out(){
$.get('who_is_logged.php', function(logged_user) {
	if(''!=logged_user){
		location='logged_in.html'
	}else{
		// fragment is ready
		$('#logged_info').show()
	}
})
}

function logged_in(){
$.get('who_is_logged.php', function(logged_user) {
	if(''!=logged_user){
		$('#who_is_logged').text(logged_user)
		// fragment is ready
		$('#logged_info').show()
	}else{
		location='logged_out.html'
	}
})
}

function failure(){
	alert('operation failed. please retry.')
}

function logout(){
	$.get('ajax.php?action=logout', logged_in)
}

function login_submit(){
	$('#message').text( 'Loading...' )
	$.post('ajax.php?action=login', $('#login').serialize(),
	function(data) {
		$('#message').text( data.message.text )
		if(data.message.status=='login successful') location = 'logged_in.html'
	})
}

function retrieve_password(){
	$.post('ajax.php?action=retrieve_password', $('#login').serialize(),
	function(data) {
		$('#message').text( data.message )
	})
}

function register_submit(){
	$.post('ajax.php?action=register', $('#register').serialize(),
	function(data) {
		$('#message').text( data.message )
	})
}
