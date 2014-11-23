<?php require_once('jquery-html.php'); ?>
<?php

session_start();

if( isset($_SESSION['user-name']) ){

?>

<?php echo $_SESSION['user-name']; ?> is logged in

<br>

<button type="button" id="logout">Logout</button> 

<script>

$(function(){ $('#logout').click(logout_click); });

function logout_click(event){
    
    //alert('logout!');
    
    $.get( "ajax?action=logout", function( data ) {
        location.reload();
    });

}

</script>

<?php

}else{

?>

You are logged out.

<br>

<a href="login-page">Login page</a>

<?php
}

?>