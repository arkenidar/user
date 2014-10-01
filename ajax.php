<?php

class Ajax {

    function test(){
        echo 'test';
    }
    
    function register(){
        require_once 'register-ajax.php';
    }

    function login(){
        require_once 'login-ajax.php';
    }

    function logout(){
        require_once 'logout-lib.php';
    }
    
    function retrieve_password(){
        require_once 'retrieve-password-ajax.php';
    }

}

$ajax = new Ajax();

if(!isset($_REQUEST['action']))
    $action = '';
else
    $action = $_REQUEST['action'];

if( is_callable( array($ajax, $action) ) ){
    $ajax->$action();
}

?>