<?php
include "../header/header.php";
?>

<form action="AdminRegisterStaff.php" method="post" role="form" accept-charset="UTF-8"> 
<div class="content-wrapper">

<div class="content-header">
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0 text-dark">PENDAFTARAN PEKERJA</h1>
    </div>

	


			
  </div>
</div>
</div>



<?php
//get value of all field in page

If(isset($_POST['submit']))
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
		$totLeave="16";
		$remainLeave="16";
		$kwsp="0.11";
		$socso="0.12";
		
		/*
		echo $staffName;
		echo $staffIc;
		echo $staffTelNum;
		echo $staffGender;
		echo $staffStatus;
		echo $staffRace;
		echo $staffNationality;
		echo $staffAddress;
		echo $staffEmail;
		echo $eName;
		echo $eRelationship;
		echo $eContact;
		echo $staffType;
		echo $staffPosition;
		echo $staffStartDate;
		echo $staffPay;
		echo $staffid;
		echo $staffPassword;
		*/


		$query="INSERT INTO user(user_name,user_ic,user_phoneNum,user_gender,user_status,user_race,user_nationality,user_address,user_email,user_eContactName,user_eContactRelationship,user_eContactNum,user_type,user_position,date_startWork,salary,user_id,user_password)
		VALUES('$staffName','$staffIc', '$staffTelNum', '$staffGender', '$staffStatus', '$staffRace', '$staffNationality', '$staffAddress', '$staffEmail', '$eName', '$eRelationship', '$eContact', '$staffType', '$staffPosition', '$staffStartDate', '$staffPay', '$staffid','$staffPassword');";

		$query1="INSERT INTO login_user(user_id,user_password,user_position) VALUES('$staffid', '$staffPassword','$staffPosition');";
		
		$query2="INSERT INTO leave_info(user_id,total_leave,leave_remaining) VALUES('$staffid', '$totLeave','$remainLeave');";
		
		$query3="INSERT INTO adminpayroll(adminPayroll_kwsp,adminPayroll_socso,user_id) VALUES('$kwsp','$socso','$staffid');";
		
		$result=mysqli_query($conn,$query);
		$result1=mysqli_query($conn,$query1);
		$result2=mysqli_query($conn,$query2);
		$result3=mysqli_query($conn,$query3);
		
		if ($result){ 
		echo ("<SCRIPT LANGUAGE='JavaScript'>
		window.alert('Register successfully!')
		window.location.href='AdminListStaff.php'
		</SCRIPT>");
		exit();	
		}
		
		else {
			echo ("<SCRIPT LANGUAGE='JavaScript'>
			window.alert('Register unsuccessfully!')
			window.location.href='AdminRegisterStaff.php'
			</SCRIPT>");
			exit();
		}

}

?>


<section class="content">
<div class="container-fluid">

  
	
<div class="row">

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
							<input type="text" name="name" id="name" class="form-control" placeholder="Nama Penuh Staff" required>
						</div>
					</div>
			  
					<div class="col-md-6">
						<div class="form-group">
							<label>No Kad Pengenalan</label>
							<input type="number" name="ic" id="ic" class="form-control" placeholder="Kad Pengenalan" required>
						</div>
					</div>

					<div class="col-md-6">	  
						<div class="form-group">
							<label>No Telefon</label>
							<input type="number" name="telNum" id="telNum" class="form-control" placeholder="Nombor Telefon" required>
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label>Jantina</label>
							<select class="form-control" name="gender" required>
								<option value="Lelaki">Lelaki</option>
								<option value="Perempuan">Perempuan</option>
							</select>
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group" >
							<label>Status</label>
							<select class="form-control" name="status" required>
								<option value="Bujang">Bujang</option>
								<option value="Berkahwin">Berkahwin</option>
							</select>
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group" >
							<label>Bangsa</label>
							<select class="form-control" name="race" required>
								<option value="Melayu">Melayu</option>
								<option value="India">India</option>
								<option value="Cina">Cina</option>
								<option value="Lain-lain">Lain-lain</option>
							</select>
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group" name="nationality" >
							<label>Warganegara</label>
							<input type="text" name="nationality" id="nationality" class="form-control" placeholder="Warganegara" required>
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label>Alamat</label>
							<textarea class="form-control" name="address" id="address" rows="3" placeholder="Alamat Penuh" required></textarea>
						</div>
					</div>
				  
					<div class="col-md-6"> 
						<div class="form-group">
							<label for="exampleInputEmail1">Emel</label>
							<input type="email" name="email" id="email" class="form-control" placeholder="Emel" required>
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
							<input type="text" name="eName" id="eName" class="form-control" placeholder="Nama Waris" required>
						</div>
					</div>  
					
					<div class="col-md-6">
						<div class="form-group" >
							<label>Hubungan</label>
							<select class="form-control" name="eRelationship" placeholder="Hubungan dengan waris" required>
								<option value="Bapa">Bapa</option>
								<option value="Ibu">Ibu</option>
								<option value="Adik Beradik">Adik Beradik</option>
								<option value="Saudara">Saudara</option>
								<option value="Suami">Suami</option>
								<option value="Isteri">Isteri</option>
								<option value="Lain-lain">Lain lain</option>
							</select>
						</div>
					</div>

					<div class="col-md-6">				  
						<div class="form-group">
							<label>No Telefon Waris</label>
							<input type="number" class="form-control" name="eNum" id="eNum" placeholder="No Telefon Waris" required>
						</div>
					</div>
				</div>
			</div>
        </div>
	</div>
		
	<div class="col-md-6">
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
								<option value="Tetap">Tetap</option>
								<option value="Kontrak">Kontrak</option>
								<option value="Praktikal">Praktikal</option>
							</select>
						</div>
					</div>
					
					<div class="col-md-5">
						<div class="form-group">
							<label>Posisi</label>
							<select class="form-control" name="position" required>
								<option value="Boss">Boss</option>
								<option value="Admin">Admin</option>
								<option value="Staff">Staff</option>
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
								<input type="date" name="sDate" id="sDate" class="form-control" required>
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
								<input type="number" name="cPay" id="cPay" class="form-control" required>
							</div>
						</div>
					</div>
				</div>
            </div>
        </div>
    </div>

	<div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">AKAUN PEKERJA</h3>
            </div>

			<div class="card-body">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Id</label>
							<input type="text" name="staffid" id="staffid" class="form-control" placeholder="Staff ID" required>
						</div>
					</div>
					
					<div class="col-md-6">				  
						<div class="form-group">
							<label for="exampleInputPassword1">Kata Laluan</label>
							<input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Kata Laluan" required>
						</div>
					</div>
				</div>
			</div>
        </div>
	</div>
</div>

	<div class="col-12" align="center">
		<button name="submit" type="submit" class="btn btn-success">DAFTAR</button>
	</div>
	<br>
</div>
</section>
</div>
</form>

	
	<?php
	include "../footer/footer.php"
	?>
	
