<?php
session_start();
//logout.php
include 'connection/connection.php';
//destroy all session
session_destroy();


//redirect to login.php
header('Location:../../index.php');
?>