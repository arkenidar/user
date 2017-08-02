<?php

$user = (string)@$_REQUEST['email'];
$password = (string)@$_REQUEST['password'];

if($user=='' || $password==''){

	$message = 'User or password is blank.';

}else{

try{

require_once 'db-connection-lib.php';
$stmt = $dbh->prepare('INSERT INTO users (id, username, password) VALUES (NULL, ?, ?)');
$stmt->execute([$user, $password]);
$message = "$user is now registered.";

}catch(PDOException $e){

$message = 'exception in register insert';
$code = (int)$e->getCode();
if($code==23000) $message = "$user is already registered.";

}

}

echo json_encode(['message'=>$message]);
