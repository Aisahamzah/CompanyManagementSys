<?php
include 'connection/connection.php';
$username = $_POST['username'];
$password = $_POST['password'];

$query = "	SELECT user_id, user_password, user_position 
				FROM login_user 
				WHERE user_id ='".$username."' AND user_password ='".$password."'";

$result = mysqli_query($conn,$query);
$row = mysqli_fetch_array($result);

if (!isset($_SESSION["attempts"]))
    $_SESSION["attempts"] = 0;

if ($_SESSION["attempts"] < 2)
{
	if($username == null)
		$username = "kosong";
			
	if($password == null)
		$password = "kosong";
	else
		$password = $row['user_password'];

if ($username == $row['user_id'] && $password == $row['user_password'] && $row['user_position'] == Admin)
{
		
		$_SESSION['is_logged_in'] = true;
		$_SESSION['user_id'] = $row['user_id'];
		$_SESSION['user_password'] = $row['user_password'];
		$_SESSION['user_position'] = $row['user_position'];
	
		header('Location:pages/main/admin.php');
}
else if($username == $row['user_id'] && $password == $row['user_password'] && $row['user_position'] == Staff)
{
		
		$_SESSION['is_logged_in'] = true;
		$_SESSION['user_id'] = $row['user_id'];
		$_SESSION['user_password'] = $row['user_password'];
		$_SESSION['user_position'] = $row['user_position'];
	
		header('Location:pages/main/staff.php');
}
else if($username == $row['user_id'] && $password == $row['user_password'] && $row['user_position'] == Boss)
{
		
		$_SESSION['is_logged_in'] = true;
		$_SESSION['user_id'] = $row['user_id'];
		$_SESSION['user_password'] = $row['user_password'];
		$_SESSION['user_position'] = $row['user_position'];
	
		header('Location:pages/main/boss.php');
}
else
	{//user tak wujud
		//if ($username == "kosong" || $password == "kosong")
		//{
			$_SESSION['is_logged_in'] = false;
			echo '<script>';
			echo 'alert(" Login Fail! Please Insert Your Username And Password!");';
			echo 'location.href="index.php"';
			echo '</script>';
			$_SESSION["attempts"] = $_SESSION["attempts"] + 1;

	}
}
else{
	$_SESSION['is_logged_in'] = false;
	echo '<script>';
	echo 'alert(" Login Blocked! Too many login attempts!");';
	echo 'location.href="index.php"';
	echo '</script>';
}

?>