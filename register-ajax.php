<?php

require_once("request-response-lib.php");

request_valid_parameters_check( ["email", "password"] );

require_once("db-connection-lib.php");

$user = $_REQUEST["email"];

$stmt = $mysqli->prepare("INSERT INTO users (`id`, `username`, `password`) VALUES (NULL, ?, ?);");
$stmt->bind_param("ss", $user, $_REQUEST["password"]);
$stmt->execute();

if($stmt->affected_rows==1)
    $message = "$user is now registered.";
else if($stmt->affected_rows==-1)
    $message = "$user is already registered.";

response_exit_message($message);

?>