<?php
include "../header/header.php";

	$query2="SELECT * FROM holiday h
	join user u
	on h.user_id=u.user_id
		
		where leave_status= 'Dalam Proses' AND leave_check='check' ";	
	
	$result2=mysqli_query($conn, $query2);
	
	
if (isset($_POST['save']))
{
	$leade = $_POST['leid'];
    $ide = $_POST['id'];
    $jenis = $_POST['jenis'];
    $msg = $_POST['message'];
	$stat= "Lulus";

    $sql = "UPDATE holiday SET leave_type='$jenis', leave_message = '$msg' WHERE leave_id = '$leade'";
    $query = mysqli_query($conn, $sql); 
	
	
	$result2=mysqli_query($conn, $query2);
}

if (isset($_POST['statusL']))
{
	$chk= $_REQUEST['check_list'];
	$a=implode(",",$chk);
	$stat="Lulus";
	$stats="Dalam Proses";
	$ch="check";
	
	$query12 ="SELECT * FROM holiday h inner join leave_info l on h.user_id=l.user_id where h.leave_id in ($a) ";	
	$result12=mysqli_query($conn, $query12);
	

	while($row= mysqli_fetch_array($result12))
	{		
					$id= $row['user_id'];
					
					$startDate= $row['leave_startDate'];
					$endDate=$row['leave_endDate'];
					//extract($row);
					$jenis=$row['leave_type'];
					
					
					$date1=date_create($startDate);
					$date2=date_create($endDate);
					$diff=date_diff($date1,$date2);
					$test=$diff->format("%a")+1;
					
				
					if($jenis =='Cuti Tahunan')
					{
					$remain=$row['leave_remaining']- $diff;
					$sql13 = "UPDATE leave_info SET leave_remaining='$remain' where user_id='$id'";
					$query13 = mysqli_query($conn, $sql13);
					}
					
					
				

	}
	
	
	$sql = "UPDATE holiday SET leave_status='$stat' WHERE leave_id in ($a)";
    $query = mysqli_query($conn, $sql); 
	
	$query2="SELECT * FROM holiday h
	join user u
	on h.user_id=u.user_id
	join leave_info l
	on u.user_id=l.user_id
	where leave_status = '$stats' AND leave_check='$ch' ";	
	
	$result2=mysqli_query($conn, $query2);
	
	
}

if (isset($_POST['statusT']))
{
	$chk= $_REQUEST['check_list'];
	$a=implode(",",$chk);
	$stat="TIDAK LULUS";
	$sql = "UPDATE holiday SET leave_status='$stat' WHERE leave_id in ($a)";
    $query = mysqli_query($conn, $sql); 
	
	$query2="SELECT * FROM holiday h
	join user u
	on h.user_id=u.user_id 
	join leave_info l
	on u.user_id=l.user_id
	where leave_status= 'DALAM PROSES' AND leave_check='check' ";	
	 $result2= mysqli_query($conn, $query2);
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
            <h1>PERMOHONAN CUTI PEKERJA</h1>
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
<link href="https://unpkg.com/ionicons@4.5.5/dist/css/ionicons.min.css" rel="stylesheet">

<form role="form" id="frmText" action="LeaveApprovalFromBoss.php" method = "POST" >

				
		
				

		<p style="padding-left:910px"><button type="submit" class="btn btn-success" id="hantar" name="statusL" >LULUS</button>
		
		
		
		
		
			<button type="submit" class="btn btn-danger" id="hantartl" name="statusT" >TIDAK LULUS</button></p>
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
				<th><input type="checkbox" name="check" value="Check" onclick="toggle(this)"> # </th>
				  <th>ID Pekerja</th>
				  <th>Nama</th>
				  <th>Jenis Cuti</th>
				  
				  <th>Tarikh Mohon Cuti</th>
				  <th>Sebab Cuti </th>
				  <th>Jumlah Mohon Cuti</th>		
				  <th>Nota</th>			  
				</tr>
				</thead>
				<tbody>
				
				
		<?php	while($row= mysqli_fetch_array($result2))
			
					
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
			?>
		
			  <tr>
				 <td class="text-center"> <input type="checkbox" name="check_list[]" value="<?php echo $row['leave_id']; ?>"> </td>
				 <td class="text-center" > <?php echo $row['user_id']; ?></td>
				 <td> <?php echo$row['user_name'];?></td>
				 <td><?php echo $row['leave_type'];?></td>
				 <td> <?php echo $from;?> -
				   <?php echo $until;?></td>
				   
				   <td><?php echo $row['leave_reason'];?></td>
				    <td class="text-center"> <?php echo $test; ?> days</td>
				
				  
				
				   <td><a href="#ModalCenter" class="btn btn-app" data-toggle="modal" data-id="<?php echo $row['user_ic']?>" data-nama="<?php echo $row['user_name']?>" data-start="<?php echo $row['leave_startDate']?>" data-end="<?php echo $row['leave_endDate']?>" data-jenis="<?php echo $row["leave_type"]?>" data-sebab="<?php echo $row["leave_reason"]?>" data-mesej="<?php echo $row['leave_message'] ?> name="edit" data-leaveid="<?php echo $row['leave_id']?>">
                  <i class="fa fa-edit"></i> Nota
                  </a></td>

				</tr>
			  
			<?php	
			
			
			} ?>
				
</tbody>
				
				</form>
					
			  
              </table>
            </div>
            <!-- /.card-body -->
		</div>
	<div>
	</section>

	</div>
	</div>
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



	<form action="" method="POST">
				<div class="modal fade" id="ModalCenter" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
				<div class="modal-header">
				<h5 class="modal-title" id="ModalLongTitle">Kemaskini Cuti Pekerja</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>
				<div class="modal-body">
				
	

				<div class="card-body">
				

				  
				  <!-- nama and no kad pegenalan disable -->
                  <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control" placeholder="ENTER..." name="name" disabled>
					<input type="hidden" name="id">
					<input type="hidden" name="leid">
                  </div>
				  
		
				  
				     <!-- Date range -->
                <div class="form-group">
				<div class="row">
 
				<div class="col-6">
                    <label>From : </label>
                    <input name="from" type="text" class="form-control" disabled>
					</div>
                 
				 <div class="col-6">
                    <label>Until :</label>
                    <input name="until" type="text" class="form-control" disabled>
                  </div>
				  </div>
				  </div>
				
				 <div class="form-group">
                    <label>JUMLAH CUTI YANG DIMOHON : </label>
                    <input type="text" class="form-control" placeholder="Enter ..." name="total" DISABLED>
                  </div>
				 
				 
				<label>JENIS CUTI DI POHON:</label>
				
				
				
				<div class="form-check">
                      <input class="form-check-input" name="jenis" id="radio3" onclick="enableTxtBox1()" type="radio" value="Cuti Tahunan">
                      <label class="form-check-label">CUTI TAHUNAN</label>
                 </div>
				 
				  <div class="form-check">
                      <input class="form-check-input" name="jenis" id="radio4" onclick="enableTxtBox1()" type="radio" value="Cuti Sakit">
                      <label class="form-check-label">CUTI SAKIT</label>
					  
                 </div>
				 
				 <div class="form-check">
                      <input class="form-check-input" name="jenis" id="radio5" onclick="enableTxtBox1()"  type="radio" value="Cuti Tanpa Gaji" >
                      <label class="form-check-label">CUTI TANPA GAJI</label>
                 </div>


				<div class="form-check">
					<input class="form-check-input" name="jenis" id="radio1" type="radio" value="Lain-Lain" onclick="enableTxtBox1()">
					<label class="form-check-label">LAIN-LAIN (NYATAKAN)</label>
					<input type="text" id="text1" disabled="disabled" name="lain" class="form-control" placeholder="Enter ...">
				</div>
				
	
				 
				 
				<br><label>SEBAB CUTI :</label>
				<textarea class="form-control" rows="3" placeholder="Enter ..." name="sebab" disabled></textarea>
				
				 <br><label>MESEJ :</label>
				<textarea class="form-control" rows="3" placeholder="Enter ... " name="message"></textarea>
                
				<br><button class="btn btn-block btn-success" name="save">SUBMIT</button>
					
					
					</div>    
					</div>
			</div>
    </div>
	</div>
	
	</form>
		
	



	
	<script>
  $('#ModalCenter').on('show.bs.modal', function(e) {
    var id = $(e.relatedTarget).data('id');
    var name = $(e.relatedTarget).data('nama');
    var start = $(e.relatedTarget).data('start');
    var end = $(e.relatedTarget).data('end');
    var jenis = $(e.relatedTarget).data('jenis');
    var sebab = $(e.relatedTarget).data('sebab');
    var mesej = $(e.relatedTarget).data('mesej');
	var lid = $(e.relatedTarget).data('leaveid');
	
	
	  $('input[name="jenis"][value="'+jenis+'"]').prop('checked',true);
      $(e.currentTarget).find('input[name="id"]').val(id);
      $(e.currentTarget).find('input[name="name"]').val(name);
      $(e.currentTarget).find('input[name="from"]').val(start);
      $(e.currentTarget).find('input[name="until"]').val(end);
      $(e.currentTarget).find('input[name="sebab"]').val(sebab);
      $(e.currentTarget).find('input[name="message"]').val(mesej);
	  $(e.currentTarget).find('input[name="leid"]').val(lid);

	  
	


      //$('#message').html(id);
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
			
			
</script>

 <script>
      function enableTxtBox1()
        {
            document.getElementById("text1").disabled = !document.getElementById("radio1").checked;
           // document.getElementById("text2").disabled = document.getElementById("radio1").checked;
            //document.getElementById("text3").disabled = document.getElementById("radio1").checked;
            //document.getElementById("text4").disabled = document.getElementById("radio1").checked;

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
  
  
  
			$('#hantar').click(function () {
				var checked = $("#frmText input:checked").length;
			if (checked<=0) {
				alert('please check atleast one');
				return false;
			}
			});
			
			$('#hantartl').click(function () {
				var checked = $("#frmText input:checked").length;
			if (checked<=0) {
				alert('please check atleast one');
				return false;
			}
			});
  
  
</script>
