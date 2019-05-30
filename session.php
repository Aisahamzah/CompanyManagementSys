<?php

include("constant.php");

if(!isset($_SESSION)) {
    session_start();
}

if(!isset($_SESSION['is_logged_in'])) 
{
header("Location: $base_url");
}

?>