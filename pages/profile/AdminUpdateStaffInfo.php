<?php
include "../header/header.php";

if(isset($_POST['update']))
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
	$staffType=$_POST['wType'];
	$staffPosition=$_POST['position'];
	$staffStartDate=$_POST['sDate'];
	$staffPay=$_POST['cPay'];
	$staffid=$_POST['staffid'];
	$staffPassword=$_POST['password'];				

    //updating the table
    $sql = "UPDATE user 
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
	user_type='$staffType',
	user_position='$staffPosition',
	date_startWork='$staffStartDate',
	salary='$staffPay',
	user_id='$staffid',
	user_password='$staffPassword'
	WHERE user_id = '$staffid'";
	
	if(mysqli_query($conn, $sql))
	{ 
		echo ("<SCRIPT LANGUAGE='JavaScript'>
		window.alert('Update successfully!')
		window.location.href='AdminListStaff.php'
		</SCRIPT>");
		exit();	
	}
	else
	{
		echo ("<SCRIPT LANGUAGE='JavaScript'>
		window.alert('Update not successfull!')
		window.location.href='AdminUpdateStaffInfo.php?id='".$staffid."''
		</SCRIPT>");
		exit();	
	}

		
}
$id= $_GET['id'];
$sql ="SELECT user_name,user_ic,user_phoneNum,user_gender,user_status,user_race,user_nationality,user_address,user_email,user_eContactName,user_eContactRelationship,user_eContactNum,user_type,user_position,date_startWork,salary,user_id,user_password 
		FROM user 
		WHERE user_id ='$id'";
$result = mysqli_query($conn, $sql) or die("Query failed");



?>




<form  action="AdminUpdateStaffInfo.php" method="post" role="form" accept-charset="UTF-8">
<div class="content-wrapper">
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">KEMASKINI MAKLUMAT PEKERJA</h1>
				</div>
			</div>
		</div>
	</div>

<section class="content">
<div class="container-fluid">
	
<div class="row">
<?php while($row1 = mysqli_fetch_array($result)){?>
	<div class="col-md-12">
		<div class="card card-primary">
            <div class="card-header">
				<h3 class="card-title">MAKLUMAT PERIBADI PEKERJA</h3>
            </div>

			<div class="card-body">
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label>Nama</label>
							<input type="text" name="name" id="name" class="form-control" value= "<?php echo $row1 ['user_name']; ?>"/>
						</div>
					</div>
			  
					<div class="col-md-6">
						<div class="form-group">
							<label>No Kad Pengenalan</label>
							<input type="number" name="ic" id="ic" class="form-control" value= "<?php echo $row1 ['user_ic']; ?>"/>
						</div>
					</div>

					<div class="col-md-6">	  
						<div class="form-group">
							<label>No Telefon</label>
							<input type="number" name="telNum" id="telNum" class="form-control" value= "<?php echo $row1 ['user_phoneNum']; ?>"/>
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label>Jantina</label>
							<select class="form-control" name="gender">
								<option <?php if($row1['user_gender']=="Lelaki"){echo "selected";}?>>Lelaki</option>
								<option <?php if($row1['user_gender']=="Perempuan"){echo "selected";}?>>Perempuan</option>
							</select>
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group" >
							<label>Status</label>
							<select class="form-control" name="status">
								<option <?php if($row1['user_status']=="Bujang"){echo "selected";}?>>Bujang</option>
								<option <?php if($row1['user_status']=="Berkahwin"){echo "selected";}?>>Berkahwin</option>
							</select>
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group" >
							<label>Bangsa</label>
							<select class="form-control" name="race">
								<option <?php if($row1['user_race']=="Melayu"){echo "selected";}?>>Melayu</option>
								<option <?php if($row1['user_race']=="India"){echo "selected";}?>>India</option>
								<option <?php if($row1['user_race']=="Cina"){echo "selected";}?>>Cina</option>
								<option <?php if($row1['user_race']=="Lain-lain"){echo "selected";}?>>Lain-lain</option>
							</select>
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group" name="nationality" >
							<label>Warganegara</label>
							<input type="text" name="nationality" id="nationality" class="form-control" value= "<?php echo $row1 ['user_nationality']; ?>"/>
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label>Alamat</label>
							<textarea class="form-control" name="address" id="address" rows="3"><?php echo $row1 ['user_address']; ?></textarea>
						</div>
					</div>
				  
					<div class="col-md-6"> 
						<div class="form-group">
							<label for="exampleInputEmail1">Emel</label>
							<input type="email" name="email" id="email" class="form-control" value= "<?php echo $row1 ['user_email']; ?>"/>
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
							<input type="text" name="eName" id="eName" class="form-control" value= "<?php echo $row1 ['user_eContactName']; ?>"/>
						</div>
					</div>  
			  
					
					<div class="col-md-6">
						<div class="form-group" >
							<label>Hubungan</label>
							<select class="form-control" name="eRelationship" required>
								<option <?php if($row1['user_eContactRelationship']=="Bapa"){echo "selected";}?>>Bapa</option>
								<option <?php if($row1['user_eContactRelationship']=="Ibu"){echo "selected";}?>>Ibu</option>
								<option <?php if($row1['user_eContactRelationship']=="Adik Beradik"){echo "selected";}?>>Adik Beradik</option>
								<option <?php if($row1['user_eContactRelationship']=="Saudara"){echo "selected";}?>>Saudara</option>
								<option <?php if($row1['user_eContactRelationship']=="Suami"){echo "selected";}?>>Suami</option>
								<option <?php if($row1['user_eContactRelationship']=="Isteri"){echo "selected";}?>>Isteri</option>
								<option <?php if($row1['user_eContactRelationship']=="Lain-lain"){echo "selected";}?>>Lain lain</option>
							</select>
						</div>
					</div>					
					
			  
					<div class="col-md-6">				  
						<div class="form-group">
							<label>No Telefon Waris</label>
							<input type="number" class="form-control" name="eNum" id="eNum" value= "<?php echo $row1 ['user_eContactNum']; ?>"/>
						</div>
					</div>
				</div>
			</div>
        </div>
	</div>
		
	<div class="col-6">
        <div class="card card-primary">
            <div class="card-header">
				<h3 class="card-title">MAKLUMAT PEKERJAAN PEKERJA</h3>
            </div>

			<div class="card-body">
				<div class="row">
					<div class="col-md-7">
						<div class="form-group" >
							<label>Jenis Pekerja</label>
							<select class="form-control" name="wType" required>
								<option <?php if($row1['user_type']=="Tetap"){echo "selected";}?>>Tetap</option>
								<option <?php if($row1['user_type']=="Kontrak"){echo "selected";}?>>Kontrak</option>
								<option <?php if($row1['user_type']=="Praktikal"){echo "selected";}?>>Praktikal</option>
							</select>
						</div>
					</div>
				
					<div class="col-md-5">
						<div class="form-group">
							<label>Posisi</label>
							<select class="form-control" name="position" required>
								<option <?php if($row1['user_position']=="Boss"){echo "selected";}?>>Boss</option>
								<option <?php if($row1['user_position']=="Admin"){echo "selected";}?>>Admin</option>
								<option <?php if($row1['user_position']=="Staff"){echo "selected";}?>>Staff</option>
							</select>
						</div>
					</div>

					<div class="col-md-7">
						<div class="form-group">
							<label>Tarikh Masuk Kerja</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fa fa-calendar"></i></span>
								</div>
								<input type="date" name="sDate" id="sDate" class="form-control" value= "<?php echo $row1 ['date_startWork']; ?>"/>
							</div>
						</div>
					</div>
				
					<div class="col-md-5">
						<div class="form-group">
							<label>Gaji Bersih</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text">RM</span>
								</div>
								<input type="number" name="cPay" id="cPay" class="form-control" value= "<?php echo $row1 ['salary']; ?>"/>
							</div>
						</div>
					</div>
				</div>
            </div>
        </div>
	</div>

	<div class="col-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">ID PEKERJA</h3>
            </div>

			<div class="card-body">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Id Pekerja</label>
							<input type="text" name="staffid" id="staffid" class="form-control" value= "<?php echo $row1 ['user_id']; ?>" readonly>
						</div>
					</div>
					
					<div class="col-md-6">				  
						<div class="form-group">
							<label for="exampleInputPassword1">Kata Laluan</label>
							<input type="password" class="form-control" name="password" id="exampleInputPassword1" value= "<?php echo $row1 ['user_password']; ?>" readonly>
						</div>
					</div>
				</div>
			</div>
        </div>
	</div>
	
<?php } ?>

	<div align="center" class="col-12">
		<button type="submit" name="update" class="btn btn-primary">KEMASKINI</button>
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


