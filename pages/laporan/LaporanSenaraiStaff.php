<?php
include "../header/header.php";
?>

<div class="content-wrapper">

<div class="content-header">
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0 text-dark"></h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
			<li class="breadcrumb-item"><a href="../main/admin.php">Menu</a></li>
        <li class="breadcrumb-item active">Dashboard v3</li>
      </ol>
    </div>
  </div>
</div>
</div>


<?php

		$query = "SELECT user_identity, user_name, user_phoneNum, user_email FROM user ";
		$result = mysqli_query($conn, $query) or die("Query failed");
?>

<section class="content">
	<div class="card card-primary">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">SENARAI PEKERJA</h3>
            </div>

            <div class="card-body">
              <table id="example1" class="table table-hover">
                <thead>
                <tr>
                  <th style="width: 80px">Id Pekerja</th>
                  <th>Nama Pekerja</th>
                  <th>No Telefon</th>
                  <th style="width: 80px">Emel</th>
                </tr>
                </thead>
                
				<tbody>
					<?php while($row = mysqli_fetch_array($result)){?>
						<tr>
							<td style="width: 80px"><a href="BossListStaff.php" data-toggle="modal" data-target=".bd-example-modal-lg"><?php echo $row["user_identity"]; ?></a></td>
							<td><?php echo $row["user_name"]; ?></td>
							<td><?php echo $row["user_phoneNum"]; ?></td>
							<td style="width: 80px"><?php echo $row["user_email"]; ?></td>
						</tr>
					<?php } ?>
				</tbody>
                
              </table>
			</div>
          </div>
		</div>
	  </div>
	</div>
</section>


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

<!--MODAL POPOUT-->
<?php

		$query = "SELECT user_name,user_ic,user_phoneNum,user_gender,user_status,user_race,user_nationality,user_address,user_email,user_eContactName,user_eContactRelationship,user_eContactNum,user_type,user_position,date_startWork,salary,user_identity,user_password FROM user ";
		$result = mysqli_query($conn, $query) or die("Query failed");
?>

<?php while($row = mysqli_fetch_array($result)){?>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">MAKLUMAT PENUH STAFF</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  
      <div class="modal-body">
			

		<div class="card card-primary">
            <div class="card-header">
				<h3 class="card-title">MAKLUMAT PERIBADI PEKERJA</h3>
            </div>
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
							<label>Id Pekerja: <h5><?php echo $row ['user_identity']; ?></h5></label>
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

		<div class="card card-primary">
            <div class="card-header">
				<h3 class="card-title">MAKLUMAT WARIS</h3>
            </div>
		</div>	
		
			<div class="card-body">
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
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

		
		<div class="card card-primary">
            <div class="card-header">
				<h3 class="card-title">MAKLUMAT PEKERJAAN PEKERJA</h3>
            </div>
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

<?php } ?>

      </div>
	  
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
	  
    </div>
  </div>
</div>
