<?php
# https://www.youtube.com/watch?v=Pz5CbLqdGwM

# create mysql connection variables
$host = 'localhost';
$user = 'avanti';
$password = 'aifarbe';

# connect to mysql creating new object ($connection) from mysqli class
$connection = new mysqli($host, $user, $password);

# create the database by running sql query

$connection->query("CREATE DATABASE articles");
?>
