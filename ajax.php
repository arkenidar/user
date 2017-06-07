<?php

$actions = [
	"test" => "test.php",
	"register" => "register-ajax.php",
	"login" => "login-ajax.php",
	"logout" => "logout-lib.php",
	"retrieve_password" => "retrieve-password-ajax.php",
];

$action = @$_REQUEST["action"];

if(array_key_exists($action, $actions))
	require_once $actions[$action];
else
	echo "action not found";
