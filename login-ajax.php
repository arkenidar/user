<?php

require_once("request-response-lib.php");

request_valid_parameters_check( ["email", "password"] );

require_once("db-connection-lib.php");

$user = $_REQUEST["email"];

// TODO PDO-based DBMS

$stmt = $mysqli->prepare("SELECT id FROM users WHERE username=? AND password=?;");
$stmt->bind_param("ss", $user, $_REQUEST["password"]);
$stmt->execute();
$stmt->bind_result($id);
$stmt->fetch();

if(isset($id) == false){

	$text = "Login error. Insert a registered username with its password. If you are not yet registered please register.";
	$status = "login error";

} else {

	include("logout-lib.php");

	$_SESSION["user-name"] = $user;
	$_SESSION["user-id"] = $id;

	$text = "Login successful for $user.";
	$status = "login successful";

}

$message = array("text"=>$text, "status"=>$status);
response_exit_message($message);
