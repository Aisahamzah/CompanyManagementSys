<?php		

	include "../header/header.php";

	$id =$_GET['delete'];

	$query1 = "DELETE FROM user WHERE user_id='$id'";
	$result1 = mysqli_query($conn,$query1) or die("Query failed");
	
	$query2 = "DELETE FROM login_user WHERE user_id='$id'";
	$result2 = mysqli_query($conn,$query2) or die("Query failed");
	
	$query3 = "DELETE FROM leave_info WHERE user_id='$id'";
	$result3 = mysqli_query($conn,$query3) or die("Query failed");
	
	$query4 = "DELETE FROM adminpayroll WHERE user_id='$id'";
	$result4 = mysqli_query($conn,$query4) or die("Query failed");
		
	if ($result1){ 
		echo ("<SCRIPT LANGUAGE='JavaScript'>
		window.alert('Delete successfully!')
		window.location.href='AdminListStaff.php'
		</SCRIPT>");
		exit();	
	}
	
	else {
		echo ("<SCRIPT LANGUAGE='JavaScript'>
		window.alert('Delete unsuccessfully!')
		window.location.href='AdminListStaff.php'
		</SCRIPT>");
		exit();
	}

?>