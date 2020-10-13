<?php

$servername = "localhost";
$username = "ben";
$password = "ben";
$dbname = "webphp";


$connection = new mysqli($servername, $username, $password, $dbname);

if($connection->connect_error){
    die("connection failed".$connection->connect_error);
}
?>