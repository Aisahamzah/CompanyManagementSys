<?php
include "../header/header.php";

?>

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
	
	
	<!--TAJUKK BESAR -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><i>CLAIM</i></h1>
          </div>
          
        </div>
      </div><!-- /.container-fluid -->
    </section>
<!--TUTUP TAJUKK BESAR -->
	
	<?php
		
		$today = date("Y-m-d");
		
		$username = $_SESSION['user_id'];
		$query2 = "Select * from user WHERE user_id=$username";
		$result2 = mysqli_query($conn,$query2) or die("Query failed");
		
		$row = mysqli_fetch_array($result2);
		
		if(isset($_POST['submit'])){ 
			
			$add_claimDate=$_POST['claimDate'];
			$add_claimDesc=$_POST['claimDesc'];
			//$add_claimAttach=$_POST['claimAttach'];
			$add_claimPrice=$_POST['claimPrice'];
			$add_claimStatus="Baru";
			$add_check= "uncheck";

		
			//echo $add_claimStatus;
		//$date = DateTime::createFromFormat('d/m/Y', $add_claimDate);
		//$add_claimDate=$date->format('Y-m-d');
		
		$claim_attach = $_FILES['claimAttach']['name'];
			
		
			if (isset($_FILES['claimAttach']['name'])) {
				
				$claim_attach = $_FILES['claimAttach']['name'];
				function GetImageExtension($imagetype)
				{
					if(empty($imagetype)) return false;
					switch($imagetype)
					{
						case 'image/bmp': return '.bmp';
						case 'image/gif': return '.gif';
						case 'image/jpeg': return '.jpg';
						case 'image/png': return '.png';
						default: return false;
					}
					
				}
				
				//echo "hi";
				$name= $_FILES['claimAttach']['name'];
				$tmp_name= $_FILES["claimAttach"]['tmp_name'];
				$imgtype=$_FILES["claimAttach"]["type"];
				$ext= GetImageExtension($imgtype);
				$imagename=$name.$ext;
				$target_path = "image/".$imagename;
				move_uploaded_file($tmp_name, $target_path);
			}
		$query="INSERT INTO claim ( claim_date, user_id, claim_desc, claim_attach, claim_price, claim_status, claim_check) VALUES ('$add_claimDate','$username', '$add_claimDesc', '$claim_attach', '$add_claimPrice', '$add_claimStatus', '$add_check')";
		$result = mysqli_query($conn,$query) or die("Query failed");
			
		$message = "Berjaya Dihantar!";
		echo "<script type='text/javascript'>alert('$message');</script>";
		
		}
		
		
	
	?>
	
	 <!-- /.MAIN CONTENT --> 
	<section class="content">

   		  	<div class="card card-primary">
				<div class="card-header">
					<h3 class="card-title">BORANG <i>CLAIM</i></h3>
				</div>
				<div class="card-body">
					<form role="form" method="post"action= "ClaimStaff.php" enctype="multipart/form-data" >
					
						<div class="form-group">
							<label>Nama:</label>
								<input type="text" name="claimName" class="form-control" value="<?php echo $row['user_name'] ?>" disabled>
						</div>
							  
						
								
						<div class="form-group">
							<label>Jenis <i>Claim</i>:</label> 
							<input type="text" name="claimDesc"class="form-control" placeholder="Jenis Tuntutan" required>
						</div>
							
						<div class="form-group">
							<label>Lampiran: </label>
							<div class="input-group">
								<div class="custom-file">
									<input type="file" name="claimAttach"class="custom-file-input" id="exampleInputFile">
									<label class="custom-file-label" for="exampleInputFile"></label>
								</div>
							</div>  
						</div>
						
						<div class="form-group">
						<div class="row">
						<div class="col-6">
							<label>Tarikh:</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fa fa-calendar"></i></span>
								</div>
								<input type="date" name="claimDate" class="form-control" max="<?php echo $today ?>" >
							</div>
						</div>
						
						<div class="col-6">
							<label>Harga:</label>
							<input type="number" name="claimPrice"class="form-control" placeholder="RM" step=".01" required>
						</div>
						</div>
						</div>
							 
						<div class="col-12" align="center">
							<button type="submit" name="submit" class="btn btn-primary">HANTAR</button>
							<button type="reset" name="reset" class="btn btn-primary">KOSONGKAN</button>
						</div>             
						
					</form>
				</div>  
				</div>
		
			
			<?php
				$count=1;
				$username = $_SESSION['user_id'];
				$query = "Select claim_id,claim_date, claim_desc, claim_attach, claim_price, claim_status from claim WHERE user_id=$username and (claim_status='Baru' or claim_status='Dalam Proses')";
				$result = mysqli_query($conn, $query) or die("Query failed");
				
			?>
			
			<div class="card card-primary">
				<div class="card-header">
					<h3 class="card-title">SENARAI TUNTUTAN</h3>
				</div>
              <!-- /.card-header -->
				<div style="overflow-x:auto;">
					<div class="card-body">
					<form action="ClaimStaff.php" method="POST" enctype="multipart/form-data">
						<table id="example1"  class="table table-bordered table-striped">
							<thead>
							<tr>
								<th style="width: 10px" class="text-center">Bil</th>
								<th class="text-center">Tarikh</th>
								<th class="text-center">Jenis <i>Claim</i></th>
								<th style="width: 40px" class="text-center">Lampiran</th>
								<th style="width: 40px" class="text-center">Harga</th>
								<th style="width: 40px" class="text-center"></th>
						
							</tr>
							</thead>
							
							<tbody>
							<?php 
							$total_price =0;
							while($row = mysqli_fetch_array($result)){
										
									 $date = $row["claim_date"];
									 $add_claimDate = date("d/m/Y",strtotime($date));
								?>
							<tr>
									<td style="width: 10px" class="text-center"><?php echo $count; ?></td >
									<td class="text-center"><?php echo $add_claimDate; ?></td>
									<td class="text-center"> <?php echo $row["claim_desc"]; ?></td>
									<td style="width: 40px" class="text-center"><a href="image/<?php echo $row["claim_attach"]; ?>" download> <?php echo $row["claim_attach"]; ?></td>
									<td style="width: 100px" class="text-center"><?php echo $row["claim_price"]; ?></td>
									<td class="text-center"><a onclick="return confirm('Adakah anda pasti?')" href="ClaimDelete.php?delete=<?php echo $row["claim_id"]; ?> ">delete</td>
									
								
									
							</tr>
							
							
							<?php $count++; 
							$total_price += $row['claim_price'];} ?>	
							<tr>
								<td colspan="4">Total  </td>
								<td ><b><?php echo $total_price;?></b> </td>
							</tr>
							</tbody>
						</table>
						</form>
		
						
														

					<!-- /.card-body -->
					</div>
              
				</div>
			</div>		 
			<!-- </section>-->
			
	</section>

	</div>
	
	<?php
	include "../footer/footer.php"
	?>
  <!-- /.content-wrapper -->
  
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="../../plugins/select2/select2.full.min.js"></script>
<!-- InputMask -->
<script src="../../plugins/input-mask/jquery.inputmask.js"></script>
<script src="../../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="../../plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="../../plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="../../plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="../../plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="../../plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="../../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- Page script -->
<!-- DataTables -->
<script src="../../plugins/datatables/jquery.dataTables.js"></script>
<script src="../../plugins/datatables/dataTables.bootstrap4.js"></script>
<!-- SlimScroll -->
<script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>

<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker         : true,
      timePickerIncrement: 30,
      format             : 'MM/DD/YYYY h:mm A'
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
</script>

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