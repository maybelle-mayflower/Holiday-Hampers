<?php
session_start();

session_destroy();

echo "<script>window.open('customize_home.php','_self')</script>";
?>