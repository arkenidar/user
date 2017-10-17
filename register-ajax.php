<?php

$user = (string)@$_REQUEST['email'];
$textual_avatar = (string)@$_REQUEST['textual_avatar'];

if($user=='' || $textual_avatar==''){

	$message = 'E-Mail or Nick-Name is blank.';

}else{

try{

require_once 'db-connection-lib.php';
$stmt = $dbh->prepare('INSERT INTO users (id, username, textual_avatar, password) VALUES (NULL, ?, ?, ?)');
$stmt->execute([$user, $textual_avatar, uniqid()]);
$message = "$user is now registered. A user's password was set automatically. Please use the 'Retrieve Password' feature to login.";

}catch(PDOException $e){

$message = 'exception in register insert';
$code = (int)$e->getCode();
if($code==23000) $message = "$user is already registered or $textual_avatar is already registered.";

}

}

echo json_encode(['message'=>$message]);
