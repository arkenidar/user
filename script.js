
// AJAX

function failure(){
    alert('operation failed. please retry.')
}

function post_json(url, data, callback){
$.post(url, data).done( json_data=>callback($.parseJSON(json_data)) ).fail(failure)
}

function get_ajax(url, callback){
$.get(url).done( data=>callback(data) ).fail(failure)
}

// register, retrieve password, login, logout

function register_submit(){
post_json('register-ajax.php', $('#register').serialize(), data=>{$('#message').text(data.message)} )
}

function retrieve_password(){
    post_json('retrieve-password-ajax.php', $('#login').serialize(), data=>{$('#message').text(data.message)})
}

function login_submit(){
    $('#message').text( 'Loading...' )
    post_json('login-ajax.php', $('#login').serialize(),
    function(data) {
        $('#message').text( data.message.text )
        if(data.message.status=='login successful') location = 'logged_in.html'
    })
}

function logged(is_logged){

get_ajax('who_is_logged.php', function(logged_user) {
    var logged = logged_user != ''
    var location_to_go_to = is_logged?'logged_out.html':'logged_in.html'
    if(is_logged^logged){
        location=location_to_go_to
    }else{
        $('#who_is_logged').text(logged_user)

        get_ajax('tavatar.php', function(tavatar) {

            $('#tavatar').text(tavatar)

            // fragment is ready
            $('#logged_info').show()
        })
    }
})

}

function logout(){
    get_ajax('logout-lib.php', ()=>logged(true))
}
