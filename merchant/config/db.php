<?php
$host = "localhost";
$user = "root";
$password ="";
$database = "ecom";

$con = mysqli_connect($host, $user, $password, $database);
if(!$con){
    echo "Error connecting to database: ".mysqli_connect_error();
}
?>
