<?php

$username = (string)@$_REQUEST['email'];

if($username == ''){

	$message = 'User is blank. Insert a user email you want to use for password retrieval.';

}else{

require_once('db-connection-lib.php');

$stmt = $dbh->prepare('SELECT password FROM users WHERE username=?');
$stmt->execute([$username]);
$row = $stmt->fetch();

if($stmt->rowCount()==0){

	$message = "The username $username is not registered. Please use a registered email address as username. If you are not yet registered please register. If you are registred consider retrieving password.";

}else if($stmt->rowCount()==1){

$password = $row['password'];

$mail_message =
	array(
	'to' => $username,
	'subject' => "Password retrieval for user: $username",
	'message' => "The registered password for user $username is: $password."
	);

mail( $mail_message['to'], $mail_message['subject'], $mail_message['message']);

$message = "The password of user $username was sent at address $username.";
///$message = $mail_message['message']; // TODO comment out for production version

}

}

echo json_encode(['message'=>$message]);
