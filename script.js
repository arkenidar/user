function logged_out(){
$.get("who_is_logged.php")
	.done(function(logged_user) {
	if(""!=logged_user){
		location="logged_in";
	}else{
		// fragment is ready
		$("#logged_info").show();
	}
	})
	.fail(failure);
}

function logged_in(){
	$.get("who_is_logged.php")
	.done(function(logged_user) {
	if(""!=logged_user){
		$("#who_is_logged").text(logged_user);
		// fragment is ready
		$("#logged_info").show();
	}else{
		location="logged_out";
	}
	})
	.fail(failure);
}

function failure(){
	alert("operation failed. please retry.");
}

function logout(){
	$.get("ajax.php?action=logout").always(logged_in);
}
