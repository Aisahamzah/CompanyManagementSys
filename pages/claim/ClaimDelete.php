	<?php		

		include "../header/header.php";
		
		//if(isset($_POST['deleteClaim']))
		//{
		$id =$_GET['delete'];

		$query9 = "DELETE FROM claim WHERE claim_id='$id'";
		$result9 = mysqli_query($conn,$query9) or die("Query failed");
		
		if ($result9){ 
			echo ("<SCRIPT LANGUAGE='JavaScript'>
			window.alert('Berjaya Padam!')
			window.location.href='ClaimStaff.php'
			</SCRIPT>");
			exit();	
		}
		
		else {
			echo ("<SCRIPT LANGUAGE='JavaScript'>
			window.alert('Tidak Berjaya Padam!')
			window.location.href='ClaimStaff.php'
			</SCRIPT>");
			exit();
		}
		//}		

	?>