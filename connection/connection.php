<?php
$host = "localhost";
$user = "root";
$pass= "";
//nama db
$db = "znnmanagement";
$conn = mysqli_connect($host, $user, $pass, $db);
if(!isset($_SESSION)) {
    session_start();
}
?>
