<!DOCTYPE html>
<html>
<head>
<?php require_once('jquery-html.php'); ?>
</head>
<body>

<h1>Register a new account</h1>

<form id="register">
    <input type="email" name="email" placeholder="email" required></input>
    <br>
    <input type="password" name="password" placeholder="password" pattern=".{5,10}" required title="5 to 10 characters for password"></input>
    <br>
    <input type="submit" value="Register"></input>
</form>

<p id="message"></p>

<a href="login-page.php">Login page</a>

<script>
function register_submit(event){
    $.post('register-ajax.php', $('#register').serialize(), function(data) {
        //alert( data.message );
        $('#message').text( data.message );
    });
    return false;
}

$(function(){ $('#register').submit(register_submit); });
</script>

</body>
</html>