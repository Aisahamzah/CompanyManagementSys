<?php
include '../../connection/connection.php';
$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT user_id, user_name, user_password, user_position FROM USER WHERE BINARY user_name ='".$username."' AND user_password = '".$password."'";

$result = mysqli_query($conn,$query);
$row = mysqli_fetch_array($result);

if($username == null)
	$username = "kosong";
if($password == null)
	$password = "kosong";
else
	$password = $row[2];

if ($username == $row[1] && $password == $row[2] && $row[3] == admin)
{
		
		$_SESSION['is_logged_in'] = true;
		$_SESSION['user_id'] = $row[0];
		$_SESSION['user_name'] = $row[1];
		$_SESSION['user_password'] = $row[2];
		$_SESSION['user_position'] = $row[3];
		
		header('Location:../../pages_admin/main/admin.php');
}
else if ($username == $row[1] && $password == $row[2] && $row[3] == user)
{
		
		$_SESSION['is_logged_in'] = true;
		$_SESSION['user_id'] = $row[0];
		$_SESSION['user_name'] = $row[1];
		$_SESSION['user_password'] = $row[2];
		$_SESSION['user_position'] = $row[3];
		
		header('Location:../../pages_pegawai/main/pegawai.php');
}
else
{//user tak wujud
	if ($username == "kosong" || $password == "kosong")
	{
		$_SESSION['is_logged_in'] = false;
		echo '<script>';
		echo 'alert("Login Fail! No Data Accepted");';
		echo 'location.href="index.php"';
		echo '</script>';
	}
	else
	{
		$_SESSION['is_logged_in'] = false;
		echo '<script>';
		echo 'alert("Login Fail!");';
		echo 'location.href="index.php"';
		echo '</script>';
	}
}
 
?>