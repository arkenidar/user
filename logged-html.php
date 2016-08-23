<?php

session_start();

if( isset($_SESSION['user-name']) ){

    header('Location: logged_in.html');

}else{

    header('Location: logged_out.html');

}

?>