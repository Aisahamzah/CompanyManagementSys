<?php
include "../header/header.php";

if(isset($_REQUEST['submit'])){
			
			$ch = "check";
			$med_chk = $_REQUEST['checkbox'];
			$m=implode(",",$med_chk);
		
			$sql = "UPDATE medical set med_check = '$ch' where med_id in ($m)";
			$result2=mysqli_query($conn,$sql) or die("Query failed");
			$sql = "UPDATE medical set med_status = 'SEDANG DIPROSES' where med_id in ($m)";
			$result2=mysqli_query($conn,$sql) or die("Query failed");
			/*echo "<meta http-equiv='refresh' content='0;url=medicalAdminHistory.php' >";*/
			
		}
?>

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
		
		$query = "	SELECT distinct(m.user_id),u.user_name
					FROM user u 
					JOIN medical m 
					ON u.user_id = m.user_id
					WHERE med_check=''
					ORDER BY med_id DESC";
		$result = mysqli_query($conn, $query) or die("Query failed");
		
		/*$sql = "SELECT * FROM medical m";
		$result=mysqli_query($conn,$sql) or die("Query failed");*/
		
		
		
		if(isset($_GET["user_id"])) {
			 $id=$_GET['user_id'];
		}
		
	?>
	 <!-- /.MAIN CONTENT --> 
	<section class="content">
		<div class="card card-primary">
			<div class="card-header">
					<h3 class="card-title">SENARAI PEKERJA TUNTUT PERUBATAN</h3>
			</div>
			<div class="card-body" style="overflow-x:auto;">
				<form method="post" >
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th style="width: 10px">Bil</th>
							<th style="width: 10px">ID Pekerja</th>
							<th style="width: 500px"> Name </th>
						</tr>
					</thead>
					<tbody>
						<?php 	$count = 1;
								while($row = mysqli_fetch_array($result)) { ?>
								<tr>
									<td><?php echo $count ?></td>
									<td><?php echo $row['user_id']; ?></td>
									<td>
										<!-- <a href="medicalAdminHistoryStaff.php?user_id=<?php /* print $row["user_id"]; */?>"> -->
										<a href="#" value="view"  id="<?php echo $row['user_id']; ?>" class=" view_data"><?php echo $row['user_name']; ?></a>
									</td> 
								</tr>
						<?php 	$count++; } ?>
					</tbody>
				</table>
				<br>
				</form>
				
				<div class="modal fade bd-example-modal-lg" id="ModalCenter" >
					<div class="modal-dialog modal-lg " role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="ModalLongTitle">Senarai Pekerja</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body" id="medicalDetails">
							
							</div>
							<!-- /.card-body -->
							
						</div>
					</div>
				</div>
				
			</div>
			
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
<script src="../../plugins/datatables/jquery.dataTables.js"></script>
<script src="../../plugins/datatables/dataTables.bootstrap4.js"></script>
<!-- Page script -->
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

<script>
$(document).on('click', '.view_data',function()
	{
		var med_id = $(this).attr("id");
		$.ajax({
			url:"medicalListAdmin.php",
			method:"post",
			data:{med_id:med_id},
			success:function(data){
				$('#medicalDetails').html(data);
				$('#ModalCenter').modal("show");
		}
		});
		});
	
</script>