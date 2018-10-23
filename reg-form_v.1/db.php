<?php

$host = 'localhost';
$user = 'root';
$pass = 'pass';
$db = 'accounts';
$mysqli = new mysqli($host, $user, $pass, $db) or die($mysqli->error); 
