<?php
include "../header/header.php";


if(isset($_POST['edit']))
{    
 
	
	$staffName=$_POST['name'];
	$staffIc=$_POST['ic'];
	$staffTelNum=$_POST['telNum'];
	$staffGender=$_POST['gender'];
	$staffStatus=$_POST['status'];
	$staffRace=$_POST['race'];
	$staffNationality=$_POST['nationality'];
	$staffAddress=$_POST['address'];
	$staffEmail=$_POST['email'];
	$eName=$_POST['eName'];
	$eRelationship=$_POST['eRelationship'];
	$eContact=$_POST['eNum'];
	$staffid=$_POST['staffid'];


    //updating the table
    $sql1 = "UPDATE user 
	SET 
	user_name='$staffName',
	user_ic='$staffIc',
	user_phoneNum='$staffTelNum',
	user_gender='$staffGender',
	user_status='$staffStatus',
	user_race='$staffRace',
	user_nationality='$staffNationality',
	user_address='$staffAddress',
	user_email='$staffEmail',
	user_eContactName='$eName',
	user_eContactRelationship='$eRelationship',
	user_eContactNum='$eContact',
	user_id='$staffid'
	WHERE user_id = '$staffid'";
	
	$results = mysqli_query($conn, $sql1);
	
if($results)
	{ 
		echo ("<SCRIPT LANGUAGE='JavaScript'>
		window.alert('Update successfully!')
		window.location.href='StaffInfoView.php'
		</SCRIPT>");
		exit();	
	}
	else
	{
		echo ("<SCRIPT LANGUAGE='JavaScript'>
		window.alert('Update not successfull!')
		window.location.href='StaffInfoEdit.php?id='".$staffid."''
		</SCRIPT>");
		exit();	
	}	

		
}

$id= $_GET['id'];
$sql ="SELECT user_name,user_ic,user_phoneNum,user_gender,user_status,user_race,user_nationality,user_address,user_email,user_eContactName,user_eContactRelationship,user_eContactNum,user_id 
		FROM user 
		WHERE user_id ='$id'";
$result = mysqli_query($conn, $sql) or die("Query failed");

?>

<form action="StaffInfoEdit.php" method="post" role="form" accept-charset="UTF-8">   
<div class="content-wrapper">
	<div class="content-header">
	<div class="container-fluid">
	  <div class="row mb-2">
		<div class="col-sm-6">
		  <h1 class="m-0 text-dark">KEMASKINI INFORMASI</h1>
		</div>
	  </div>
	</div>
	</div>


<!-- Main content -->
<section class="content">
<div class="container-fluid">



<div class="row">

<?php while($row = mysqli_fetch_array($result)){?>
	<div class="col-md-12">
		<div class="card card-primary">
            <div class="card-header">
				<h3 class="card-title">MAKLUMAT PERIBADI</h3>
            </div>

			<div class="card-body">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Nama</label>
							<input type="text" name="name" id="name" class="form-control" value= "<?php echo $row ['user_name']; ?>" required>
						</div>
					</div>
					
					<div class="col-md-6">
						<div class="form-group">
							<label>Id Pekerja</label>
							<input type="text" name="staffid" id="staffid" class="form-control" value= "<?php echo $row ['user_id']; ?>" readonly >
							
						</div>
					</div>
			  
					<div class="col-md-6">
						<div class="form-group">
							<label>No Kad Pengenalan</label>
							<input type="number" name="ic" id="ic" class="form-control" value= "<?php echo $row ['user_ic']; ?>" required>
						</div>
					</div>

					<div class="col-md-6">	  
						<div class="form-group">
							<label>No Telefon</label>
							<input type="number" name="telNum" id="telNum" class="form-control" value= "<?php echo $row ['user_phoneNum']; ?>" required>
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label>Jantina</label>
							<select class="form-control" name="gender" required>
								<option <?php if($row['user_gender']=="Lelaki"){echo "selected";}?>>Lelaki</option>
								<option <?php if($row['user_gender']=="Perempuan"){echo "selected";}?>>Perempuan</option>
							</select>
						</div>
					</div>
					

					<div class="col-md-6">
						<div class="form-group" >
							<label>Status</label>
							<select class="form-control" name="status" required>								
								<option <?php if($row['user_status']=="Bujang"){echo "selected";}?>>Bujang</option>
								<option <?php if($row['user_status']=="Berkahwin"){echo "selected";}?>>Berkahwin</option>
							</select>
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group" >
							<label>Bangsa</label>
							<select class="form-control" name="race" required>
								<option <?php if($row['user_race']=="Melayu"){echo "selected";}?>>Melayu</option>
								<option <?php if($row['user_race']=="India"){echo "selected";}?>>India</option>
								<option <?php if($row['user_race']=="Cina"){echo "selected";}?>>Cina</option>
								<option <?php if($row['user_race']=="Lain-lain"){echo "selected";}?>>Lain-lain</option>
							</select>
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group" name="nationality" >
							<label>Warganegara</label>
							<input type="text" name="nationality" id="nationality" class="form-control" value= "<?php echo $row ['user_nationality']; ?>" required>
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label>Alamat</label>
							<textarea class="form-control" name="address" id="address" rows="3" required><?php echo $row ['user_address']; ?></textarea>
						</div>
					</div>
				  
					<div class="col-md-6"> 
						<div class="form-group">
							<label for="exampleInputEmail1">Emel</label>
							<input type="email" name="email" id="email" class="form-control" value= "<?php echo $row ['user_email']; ?>" required>
						</div>
					</div>
				</div>
            </div>
        </div>
	</div>

		
	<div class="col-md-12">
		<div class="card card-primary">
            <div class="card-header">
				<h3 class="card-title">MAKLUMAT WARIS</h3>
            </div>
			
			<div class="card-body">
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label>Nama Waris</label>
							<input type="text" name="eName" id="eName" class="form-control" value= "<?php echo $row ['user_eContactName']; ?>" required>
						</div>
					</div>  
			  
					<div class="col-md-6">
						<div class="form-group" >
							<label>Hubungan</label>
							<select class="form-control" name="eRelationship" required>
								<option <?php if($row['user_eContactRelationship']=="Bapa"){echo "selected";}?>>Bapa</option>
								<option <?php if($row['user_eContactRelationship']=="Ibu"){echo "selected";}?>>Ibu</option>
								<option <?php if($row['user_eContactRelationship']=="Adik Beradik"){echo "selected";}?>>Adik Beradik</option>
								<option <?php if($row['user_eContactRelationship']=="Saudara"){echo "selected";}?>>Saudara</option>
								<option <?php if($row['user_eContactRelationship']=="Suami"){echo "selected";}?>>Suami</option>
								<option <?php if($row['user_eContactRelationship']=="Isteri"){echo "selected";}?>>Isteri</option>
								<option <?php if($row['user_eContactRelationship']=="Lain-lain"){echo "selected";}?>>Lain lain</option>
							</select>
						</div>
					</div>
			  
					<div class="col-md-6">				  
						<div class="form-group">
							<label>No Telefon Waris</label>
							<input type="number" class="form-control" name="eNum" id="eNum" value= "<?php echo $row ['user_eContactNum']; ?>" required>
						</div>
					</div>
				</div>
			</div>
        </div>
	</div>
<?php } ?>

	<div align="center" class="col-12">
		<button type="submit" name="edit" class="btn btn-primary">HANTAR</button>
		<button type="button" class="btn btn-secondary" onclick="goBack()">KEMBALI</button>
	</div>
	<br><br>
	
	<script>
		function goBack() 
		{
			window.history.back();
		}
	</script>

</div>
</div>
</section>
</div>
</form>

<?php
	include "../footer/footer.php"
?>
