$.ajaxSetup({error: failure});

function logged_out(){
$.get(uf("who_is_logged"), function(logged_user) {
	if(""!=logged_user){
		location="logged_in";
	}else{
		// fragment is ready
		$("#logged_info").show();
	}
});
}

function logged_in(){
$.get(uf("who_is_logged"), function(logged_user) {
	if(""!=logged_user){
		$("#who_is_logged").text(logged_user);
		// fragment is ready
		$("#logged_info").show();
	}else{
		location="logged_out";
	}
});
}

function failure(){
	alert("operation failed. please retry.");
}

function logout(){
	$.get(uf("ajax")+"?action=logout", logged_in);
}

// url filename
function uf(filename){
	return filename+".php";
}

function login_submit(event){
	$("#message").text( "Loading..." );
	$.post(uf("ajax")+"?action=login", $("#login").serialize(),
	function(data) {
		$("#message").text( data.message.text );
		if(data.message.status=="login successful") location = "logged_in";
	});
	return false;
}

function retrieve_password(){
	$.post(uf("ajax")+"?action=retrieve_password", $("#login").serialize(),
	function(data) {
		$("#message").text( data.message );
	});
}

function register_submit(event){
	$.post(uf("ajax")+"?action=register", $("#register").serialize(),
	function(data) {
		$("#message").text( data.message );
	});
	return false;
}