<?php

$user = (string)@$_REQUEST['email'];
$password = (string)@$_REQUEST['password'];

if($user=='' || $password==''){

	$text = 'User or password is blank.';
	$status = 'login error';

}else{

require_once 'db-connection-lib.php';

try{

$stmt = $dbh->prepare('SELECT * FROM users WHERE username=? AND password=?');
$stmt->execute([$user, $password]);
$row = $stmt->fetch();

if($stmt->rowCount() == 0){

	$text = 'Login error. Insert a registered username with its password. If you are not yet registered please register.';
	$status = 'login error';

} else if($stmt->rowCount() == 1){

	$id = $row['id'];

	require 'logout-lib.php';

	$_SESSION['user-name'] = $user;
	$_SESSION['user-id'] = $id;

	$text = "Login successful for $user.";
	$status = 'login successful';

}

}catch(PDOException $e){

	$text = 'Login error. An exceptional condition occurred.';
	$status = 'login error';

}

}

$message = ['text'=>$text, 'status'=>$status];
echo json_encode(['message'=>$message]);
