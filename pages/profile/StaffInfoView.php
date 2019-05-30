<?php
include "../header/header.php";
?>

<?php
		
		$userid = $_SESSION['user_id'];
		
		//$query = "SELECT user_name,user_identity,user_ic,user_phoneNum,user_gender,user_status,user_race,user_nationality,user_address,user_email,user_eContactName,user_eContactRelationship,user_eContactNum,user_type,user_position,date_startWork,salary FROM user;";
		//$result = mysqli_query($conn, $query) or die("Query failed");
		
		$query = "SELECT user_name,user_id,user_ic,user_phoneNum,user_gender,user_status,user_race,user_nationality,user_address,user_email,user_eContactName,user_eContactRelationship,user_eContactNum,user_type,user_position,date_startWork,salary FROM user WHERE user_id = '$userid'";
		$result = mysqli_query($conn, $query) or die("Query failed");
?>

<?php while($row = mysqli_fetch_array($result)){?>
<div class="content-wrapper">
	<div class="content-header">
	<div class="container-fluid">
	  <div class="row mb-2">
		<div class="col-sm-6">
		  <h1 class="m-0 text-dark">PROFIL</h1>
		</div>
	  </div>
	</div>
	</div>





<section class="content">
<div class="container-fluid">
<div class="row">
	<div class="col-md-12">
		<div class="card card-primary">
            <div class="card-header">
				<h3 class="card-title">MAKLUMAT PERIBADI</h3>
            </div>

			<div class="card-body">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Nama: <h5><?php echo $row ['user_name']; ?></h5></label>
						</div>
					</div>
					
					<div class="col-md-6">
						<div class="form-group">
							<label>Id Pekerja: <h5><?php echo $row ['user_id']; ?></h5></label>
						</div>
					</div>
			  
					<div class="col-md-6">
						<div class="form-group">
							<label>No Kad Pengenalan: <h5><?php echo $row ['user_ic']; ?></h5></label>
						</div>
					</div>

					<div class="col-md-6">	  
						<div class="form-group">
							<label>No Telefon: <h5><?php echo $row ['user_phoneNum']; ?></h5></label>
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label>Jantina: <h5><?php echo $row ['user_gender']; ?></h5></label>
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group" >
							<label>Status: <h5><?php echo $row ['user_status']; ?></h5></label>
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group" >
							<label>Bangsa: <h5><?php echo $row ['user_race']; ?></h5></label>
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group" name="nationality" >
							<label>Warganegara: <h5><?php echo $row ['user_nationality']; ?></h5></label>
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label>Alamat: <h5><?php echo $row ['user_address']; ?></h5></label>
						</div>
					</div>
				  
					<div class="col-md-6"> 
						<div class="form-group">
							<label for="exampleInputEmail1">Emel: <h5><?php echo $row ['user_email']; ?></h5></label>
						</div>
					</div>
				</div>
            </div>
        </div>
	</div>

	<div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header">
				<h3 class="card-title">MAKLUMAT WARIS</h3>
            </div>

			<div class="card-body">
				<div class="row">
					<div class="col-md-12">
						<div class="form-group" >
							<label>Nama Waris: <h5><?php echo $row ['user_eContactName']; ?></h5></label>
						</div>
					</div>
				
					<div class="col-md-6">
						<div class="form-group">
							<label>Hubungan: <h5><?php echo $row ['user_eContactRelationship']; ?></h5></label>
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label>No Telefon Waris: <h5><?php echo $row ['user_eContactNum']; ?></h5></label>
						</div>
					</div>
				</div>
            </div>
        </div>
    </div>
		
	<div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header">
				<h3 class="card-title">MAKLUMAT PEKERJAAN</h3>
            </div>

			<div class="card-body">
				<div class="row">
					<div class="col-md-7">
						<div class="form-group" >
							<label>Jenis Pekerja: <h5><?php echo $row ['user_type']; ?></h5></label>
						</div>
					</div>
				
					<div class="col-md-5">
						<div class="form-group">
							<label>Pangkat: <h5><?php echo $row ['user_position']; ?></h5></label>
						</div>
					</div>

					<div class="col-md-7">
						<div class="form-group">
							<label>Tarikh Masuk Kerja: <h5><?php echo $row ['date_startWork']; ?></h5></label>
						</div>
					</div>
				
					<div class="col-md-5">
						<div class="form-group">
							<label>Gaji Bersih: RM <h5><?php echo $row ['salary']; ?></h5></label>
						</div>
					</div>
				</div>
            </div>
        </div>
    </div>
	
	<div align="center" class="col-12">
		<a href="StaffInfoEdit.php?id=<?php echo $row["user_id"] ?>" class="btn btn-primary">KEMASKINI</a>
	</div>
	<br><br>
	
</div>


</div>

</section>
</div>
<?php } ?>

<?php
	include "../footer/footer.php"
?>
	
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>	