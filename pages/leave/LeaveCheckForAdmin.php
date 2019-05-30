<?php
include "../header/header.php";


	$query = "Select *
			from  holiday h 
		    inner join user u
			on 
			h.user_id = u.user_id
			inner join leave_info l
			on u.user_id = l.user_id
			";
			
	$query2="SELECT * FROM holiday h
	join user u
	on h.user_id=u.user_id where h.leave_check='uncheck'";

	
	$result2=mysqli_query($conn, $query2);
			
    $result = mysqli_query($conn, $query);
	

		
	if(isset($_REQUEST['hantar'])) { 

		$ch = "check";
		$ch = "Dalam Proses";
		//$uch = "uncheck";
		$chk= $_REQUEST['check_list'];
		$a=implode(",",$chk);
		
			
		
			$query4 = "Update holiday set leave_check = '$ch', leave_status='Dalam Proses' where leave_id in ($a) ";
			$result = mysqli_query($conn, $query4);
		
			$query2="SELECT * FROM holiday h
			join user u
			on h.user_id=u.user_id where h.leave_check='uncheck'";
			$result2=mysqli_query($conn, $query2);
			
		
		
		
		
		
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
            <h1>SEMAK PERMOHONAN CUTI</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Advanced Form</li>
            </ol>
			
          </div>
        </div>
      </div><!-- /.container-fluid -->
	  
	  
    </section>
	
<!--TUTUP TAJUKK BESAR -->
 <form role="form" action="LeaveCheckForAdmin.php" method = "POST" id="frmText">
	 <p style="padding-left:1015px;"><button type="submit" name="hantar" id="hantar"class="btn btn-success">HANTAR</button></p>
	
	<!-- /.MAIN CONTENT --> 
	<section class="content">
      <div class="row">
        <div class="col-12">
		 <div class="card">
		 <div class="card-primary">
            <div class="card-header">
              <h3 class="card-title">SENARAI PERMOHONAN CUTI PEKERJA</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr class="text-center">
				  <td> <input type="checkbox" id="check" name="check" value="Check" onclick="toggle(this)"   > #</td>
				  <th>ID Pekerja</th>
				  <th>Nama</th>			  
				  <th>Tarikh Mohon Cuti</th>
				  <th>Jumlah Mohon Cuti</th>
				  <th>Jenis Cuti</th>
				  <th>Sebab Cuti</th>
				</tr>
				</thead>
				
                <tbody>
				
				
				

			  <?php 
				
				$count =0;
				while($row= mysqli_fetch_array($result2))
				{
					$startDate= $row['leave_startDate'];
					$endDate=$row['leave_endDate'];
					
					$date = DateTime::createFromFormat('Y-m-d', $startDate);
					$from=$date->format('d/m/Y');
			
					$dateu = DateTime::createFromFormat('Y-m-d', $endDate);
					$until=$dateu->format('d/m/Y');
					
					 
					$date1=date_create($startDate);
					$date2=date_create($endDate);
					$diff=date_diff($date1,$date2);
					$test=$diff->format("%a")+1;
					//extract($row);
			 ?>
				
				<tr>
				 <td class="text-center"> <input type="checkbox" id="check" name="check_list[]" value="<?php echo $row['leave_id']; ?> "> </td>
				 <td class="text-center" > <?php echo $row['user_id']; ?></td>
				 <td> <?php echo$row['user_name'];?></td>			 
				 <td width="170px"> <?php echo $from;?> -
	     		 <?php echo $until;?></td>
				 <td class="text-center"> <?php echo $test; ?> days </td>
				 <td><?php echo $row['leave_type'];?></td>
				 <td><?php echo $row['leave_reason'];?></td>
	
				</tr>
				
				 <?php 
				$count++;}
				?>
				</tbody>
				
				</form>
					
			  
              </table>
            </div>
            <!-- /.card-body -->
			</div>
		</div>
	<div>
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
		function toggle(source) 
			{
				var checkboxes = document.querySelectorAll('input[type="checkbox"]');
				for (var i = 0; i < checkboxes.length; i++) {
				if (checkboxes[i] != source)
				checkboxes[i].checked = source.checked;
			}
			}
</script>










	
	<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="../../plugins/datatables/jquery.dataTables.js"></script>
<script src="../../plugins/datatables/dataTables.bootstrap4.js"></script>
<!-- SlimScroll -->
<script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>


<!-- page script -->
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

<script>
		function toggle(source) 
			{
				var checkboxes = document.querySelectorAll('input[type="checkbox"]');
				for (var i = 0; i < checkboxes.length; i++) {
				if (checkboxes[i] != source)
				checkboxes[i].checked = source.checked;
			}
			}
			
			$('#hantar').click(function () {
				var checked = $("#frmText input:checked").length;
			if (checked<=0) {
				alert('please check atleast one');
				return false;
			}
			});
			
			
			
			
</script>

