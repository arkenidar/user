<?php

$actions = [
'test' => 'test.php',
'register' => 'register-ajax.php',
'login' => 'login-ajax.php',
'logout' => 'logout-lib.php',
'retrieve_password' => 'retrieve-password-ajax.php',
];

$action = @$_REQUEST['action'];

if(array_key_exists($action, $actions))
    require_once $actions[$action];
else
    echo 'not found';

/*

class Ajax {

    function test(){
        require_once 'test.php';
        //echo 'test';
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

if( is_callable( array($ajax, $action) ) ){
    $ajax->$action();
}else echo 'not found';

*/

?>