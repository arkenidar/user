<!DOCTYPE html>
<html>
<head>
<?php require_once('jquery-html.php'); ?>
</head>
<body>

<h1>Login into a registered account</h1>

<form id="login">
    <input type="email" name="email" placeholder="email" required></input>
    <br>
    <input type="password" name="password" placeholder="password" required></input>
    <br>
    <input type="submit" value="Login"></input>
    <br>
    <input type="button" value="Retrieve Password" id="retrieve-pw"></input>
</form>

<p id="message"></p>

<a href="register-page">Register page</a>

<script>
function login_submit(event){
    $.post('ajax?action=login', $('#login').serialize(), function(data) {
        //alert( data.message );
        $('#message').text( data.message.text );
        if(data.message.status=='login successful')
            location.href = 'logged-html';
    });
    return false;
}

function retrieve_password(event){
    $.post('ajax?action=retrieve_password', $('#login').serialize(), function(data) {
        // alert( data.message );
        $('#message').text( data.message );
    });
    return false;
}

$(function(){ $('#login').submit(login_submit); });
$(function(){ $('#retrieve-pw').click(retrieve_password); });
</script>

</body>
</html>