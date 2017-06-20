$.ajaxSetup({error: failure})

function logged(is_logged){

$.get('who_is_logged.php', function(logged_user) {
	var logged = logged_user != ''
	var location_to_go_to = is_logged?'logged_out.html':'logged_in.html'
	if(is_logged^logged){
		location=location_to_go_to
	}else{
		$('#who_is_logged').text(logged_user)
		// fragment is ready
		$('#logged_info').show()
	}
})

}

function failure(){
	alert('operation failed. please retry.')
}

function logout(){
	$.get(ajax_action('logout'), ()=>logged(true))
}

function ajax_action(action){
	return 'ajax.php?action=' + action
}

function login_submit(){
	$('#message').text( 'Loading...' )
	$.post(ajax_action('login'), $('#login').serialize(),
	function(data) {
		$('#message').text( data.message.text )
		if(data.message.status=='login successful') location = 'logged_in.html'
	})
}

function retrieve_password(){
	$.post(ajax_action('retrieve_password'), $('#login').serialize(),
	function(data) {
		$('#message').text( data.message )
	})
}

function register_submit(){
	$.post(ajax_action('register'), $('#register').serialize(),
	function(data) {
		$('#message').text( data.message )
	})
}
