<?php

$connect =  mysqli_connect("localhost","root","", "tester");
if(!$connect){
    die("Connection failed" . mysqli_connect_error());
}
