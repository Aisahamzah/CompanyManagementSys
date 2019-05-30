<?php
include "../header/header.php";

?>
<head>
<link rel="stylesheet" href="../../plugins/datatables/dataTables.bootstrap4.css">
</head>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
	<!--TAJUKK BESAR -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>PERMOHONAN PERUBATAN</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DASHBOARD</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<!--TUTUP TAJUKK BESAR -->

<?php
		$username=$_SESSION['user_id'];
		$query = "	Select * from medical
					WHERE user_id=$username
					ORDER BY med_id DESC ";
		$result = mysqli_query($conn, $query) or die("Query failed");
		/*$total = $_SESSION['totalH'];*/
		
		if(isset($_GET["user_id"])) {
			 $id=$_GET['user_id'];
		}
					
	?>
	 <!-- /.MAIN CONTENT --> 

	 <!-- /.MAIN CONTENT --> 
	<section class="content">
		<div class="card card-primary">
			<div class="card-header">
					<h3 class="card-title">SENARAI TUNTUT PERUBATAN</h3>
			</div>
			<form method="post" action="medicalStaffHistory.php" enctype="multipart/form-data">
			<div class="card-body">
				
				<table id="example1" class="table table-bordered table-striped">
				
				<!--<input name = "totalH" type="type" class="btn float-right col-1" placeholder="RM <?php /* echo 400 - $total; */?>" disabled>
				<label class="float-right">Baki <i>'Claim'</i> : </label> -->
					<thead>
						<tr>
							<th>Bil</th>
							<th>Med ID</th>
							<th>Tarikh Cuti</th>
							<th>Status Tuntutan</th>
							<th>Harga Perubatan (RM)</th>
							<th>Lampiran</th>
						</tr>
					</thead>
					
					
					
					<tbody>
					<?php 	$total = 0 ;
							$count = 1;
							while($row = mysqli_fetch_array($result)){ ?>
						<tr>
							<td><?php echo $count ?></td>
							<td><?php echo $row["med_id"]; ?></td>
							<td><?php 
							
									$tarikh = $row["med_date"]; 
									echo date("d-m-Y", strtotime($tarikh));?></td>
									
							<td><?php echo $row["med_status"]; ?></td>
							<td><?php echo $row["med_price"]; ?></td>
							<td>
								<a href="image/<?php echo $row["med_attach_blob"]?>" download>
								<button type="button" class="btn btn-block btn-primary">
								MUAT TURUN
								</button>
											
								</a>
							</td>
						</tr>
						<?php  	$count++;
								$total += $row['med_price'];
								}
								$_SESSION['totalH'] = $total;?>
					</tbody>
				</table>
				<input name = "totalH" type="hidden" class="btn form-control float-right" placeholder="RM <?php echo 400 - $total; ?>" disabled>
			</div>   
			</form>
		</div>
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
</div>
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
<!-- DataTables -->
<script src="../../plugins/datatables/jquery.dataTables.js"></script>
<script src="../../plugins/datatables/dataTables.bootstrap4.js"></script>
<!-- page script -->
<script>
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
	
	$("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
	})
  })
</script>

