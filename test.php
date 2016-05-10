<?php
echo 'page for test ';
session_start();
echo $_SESSION['counter'] = (@$_SESSION['counter']+1)%5;
?>