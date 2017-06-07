<?php

require_once("request-response-lib.php");

request_valid_parameters_check( ["email"] );

$username = $_REQUEST["email"];

require_once("db-connection-lib.php");

// TODO PDO-based DBMS

$stmt = $mysqli->prepare("SELECT password FROM users WHERE username=?;");
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->bind_result($password);
$stmt->fetch();

if( isset($password) == false )
	response_exit_message("The username $username is not registered. Please use a registered email address as username. If you are not yet registered please register.");

$mail_message =
	array(
	"to" => $username,
	"subject" => "Password retrieval for user: $username",
	"message" => "The registered password for user $username is: $password."
	);

mail( $mail_message["to"], $mail_message["subject"], $mail_message["message"]);

$message = "The password of user $username was sent at address $username.";
//$message = $mail_message["message"];

response_exit_message($message);
