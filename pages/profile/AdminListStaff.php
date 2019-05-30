<?php
include "../header/header.php";




?>
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
<div class="container-fluid">
	<div class="col-12">
		<p align="right"><a href="AdminRegisterStaff.php" class="btn btn-success btn-lg">DAFTAR BARU</a></p>
	</div>

</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<?php

		$query = "SELECT user_id, user_name, user_phoneNum, user_email FROM user ";
		$result = mysqli_query($conn, $query) or die("Query failed");
?>

<!-- Main content -->
<section class="content">
	<div class="card card-primary">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">SENARAI PEKERJA</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
				  <th class="text-center">Bil</th>
                  <th class="text-center" style="width: 80px">ID Pekerja</th>
                  <th class="text-center">Nama Pekerja</th>
                  <th class="text-center">No Telefon</th>
                  <th class="text-center" style="width: 80px">Emel</th>
				  <th class="text-center"></th>
                </tr>
                </thead>
				
				<tbody>
					<?php 
					$count=1;
					while($row = mysqli_fetch_array($result)){?>
						<tr>
							<td class="text-center"><?php echo $count++?></td>
							<td class="text-center" style="width: 80px"><b><a href="AdminUpdateStaffInfo.php?id=<?php echo $row["user_id"] ?> "><?php echo $row["user_id"];?></a></b></td>
							<!--<td style="width: 80px"><a href="TESTING.php?id=<?php //echo $row["user_id"] ?> "><?php /* echo $row["user_id"];  */?></a></td>-->
							<td><?php echo $row["user_name"]; ?></td>
							<td class="text-center"><?php echo $row["user_phoneNum"]; ?></td>
							<td style="width: 80px"><?php echo $row["user_email"]; ?></td>
							<td><p class="text-center"><a href="Delete.php?delete=<?php echo $row["user_id"]; ?>" class="btn btn-danger">PADAM</a></p></td>
						</tr>
					<?php } ?>
				</tbody>
                
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
	</div>
</section>
  <!-- /.row (main row) -->
</div><!-- /.container-fluid -->
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

