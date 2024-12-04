<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "inventory_management";

$connection = new mysqli($servername, $username, $password, $database);

if(!$connection){
    die("ERROR: " . mysqli_error($connection));
}else{
}
?>