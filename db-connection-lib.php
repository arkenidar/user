<?php

ini_set('display_errors', 1);

require 'db-user.php';

// init PDO
$dbh = new PDO('mysql:host=localhost;dbname='.$dbname, $dbuser, $dbpass);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
