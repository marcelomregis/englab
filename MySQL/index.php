<?php

$server = "localhost";
$user = "root";
$pass = "root";
$database="test";

//Conect MySQL
$mysqli = new mysqli($server, $user, $pass, $database);

//Error

if(mysqli_connect_errno()){
    echo "Filed to connect to MySQL:(".$mysqli->conect_errno.")".$mysqli -> connect_error;
    exit;
    
}

?>