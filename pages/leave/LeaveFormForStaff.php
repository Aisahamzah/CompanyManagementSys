<?php
include "../header/header.php";


$userid = $_SESSION['user_id'];

$query = "	SELECT * FROM user WHERE user_id = $userid";
/*WHERE user_id = $username" */

$result = mysqli_query($conn,$query);
$row = mysqli_fetch_array($result);



$query6 = "	SELECT * FROM leave_info WHERE user_id = $userid";
			$result6 = mysqli_query($conn,$query6);
			$rows = mysqli_fetch_array($result6);




if(isset($_POST['submit']))
		{
			$userid=$_SESSION["user_id"];
			$from=$_POST["from"];
			$until=$_POST["until"];
			$type=$_POST["jenis"];
			$reason=$_POST["reason"];			
			$status="Baru";
			$check="uncheck";
			
			
			if($type == "Lain-Lain")
			{
				$lainlain=$_POST["lain"];
			}
			else
				$lainlain="";
			
		
		
					$date = DateTime::createFromFormat('Y-m-d', $from);
					$froms=$date->format('d/m/Y');
			
					$dateu = DateTime::createFromFormat('Y-m-d', $until);
					$untils=$dateu->format('d/m/Y');
					
					 
					$date1=date_create($from);
					$date2=date_create($until);
					$diff=date_diff($date1,$date2);
					$test=$diff->format("%a");
					$test=$test+1;
					echo "<center>";
					echo $test;
					echo "</center>";
					
			$query3 = "	SELECT * FROM leave_info WHERE user_id = $userid";
			$result3 = mysqli_query($conn,$query3);
			$rows = mysqli_fetch_array($result3);
			
			$remain=$rows['leave_remaining'];
	
			$proof=$remain-$test;
			
		
	
		if($proof<=0)
		{
				echo '<script>';
				echo 'alert("TIDAK BERJAYA.CUTI DAH HABIS!");';
				//echo 'location.href=".php"';
				echo '</script>';		
		}
		
		else {
				$query1="INSERT INTO holiday (user_id, leave_startDate, leave_endDate, leave_type, leave_reason,leave_status,leave_check,leave_type_reason) VALUES ('$userid','$from','$until','$type', '$reason','$status','$check','$lainlain')";
				$sendquery = mysqli_query($conn,$query1);

				echo '<script>';
				echo 'alert("PERMOHONAN BERJAYA DIHANTAR!");';

				//echo 'location.href=".php"';
				echo '</script>';
		}
			
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
            <h1>PEMOHONAN CUTI</h1>
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

	 <!-- /.MAIN CONTENT --> 
	<section class="content">
	
			 <div class="card card-primary">
				  <div class="card-header">
					<h3 class="card-title">BORANG PERMOHONAN CUTI</h3>
				  </div>
					<div class="card-body">
				  
						
							 <form role="form" action="LeaveFormForStaff.php" method="post">
<div style="padding-left:450px;">	
<h5 class="mb-2">BAKI CUTI</h5>
        <div align="center" class="row">
          <div class="col-md-2">
            <div  class="info-box">             
              <div class="info-box-content">
                <h1><span class="info-box-number"><?php echo $rows['leave_remaining'];?></span></h1>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
			</div>  
	</div>			  
				  <!-- nama and no kad pegenalan disable -->
                  <div class="form-group">
				   <div class="row">
				  <div class="col-6">
                    <label>Nama :</label>
                    <input type="text" class="form-control" placeholder="<?php echo $row['user_name'] ?> " disabled required>
                 </div>
				 <div class="col-6">
                    <label>No Kad Pengenalan :</label>
                    <input type="text" class="form-control" placeholder="<?php echo $row['user_ic'] ?>" disabled required>
                  </div>
				  </div>
				  </div>
				  
				 <?php $today = date("Y-m-d"); ?>
				  <div class="form-group">
				 <div class="row">
 
                  <div class="col-6">
				  <label>Dari :</label>
                    <div class="input-group-prepend">
						<span class="input-group-text"><i class="fa fa-calendar"></i></span>
						<input type="date" name="from" class="form-control"  min="<?php echo $today ?>" required>
						</div>
					
                  </div>
				  <div class="col-6">
				  <label>Hingga :</label>
                   <div class="input-group-prepend">
									  <span class="input-group-text"><i class="fa fa-calendar"></i></span>
									  <input type="date" name="until" class="form-control"required>
									</div>
									
                  </div>
                </div>
				</div>
												
					
				
				<label>Jenis Cuti Di Pohon :</label>
				
					
				<div class="form-check">
                      <input class="form-check-input" name="jenis" id="radio3" onclick="enableTxtBox1()" type="radio" value="Cuti Tahunan"required>
                      <label class="form-check-label">Cuti Tahunan</label>
                 </div>
				 
				  <div class="form-check">
                      <input class="form-check-input" name="jenis" id="radio4" onclick="enableTxtBox1()" type="radio" value="Cuti Sakit"required>
                      <label class="form-check-label">Cuti Sakit</label>
                 </div>
				 
				 <div class="form-check">
                      <input class="form-check-input" name="jenis" id="radio5" onclick="enableTxtBox1()"  type="radio" value="Cuti Tanpa Gaji" required>
                      <label class="form-check-label">Cuti Tanpa Gaji</label>
                 </div>


				<div class="form-check">
					<input class="form-check-input" name="jenis" id="radio1" type="radio" value="Lain-Lain" onclick="enableTxtBox1()">
					<label class="form-check-label">Lain- Lain (Nyatakan)</label>
					<input type="text" id="text1" disabled="disabled" name="lain" class="form-control" placeholder=""required>
				</div>
		
				
				 <br><label>Sebab Bercuti :</label>
				 <textarea class="form-control" name="reason" rows="3" required></textarea>
				<br>
		

		

			
				<button type="submit" class="btn btn-success " name="submit" >SUBMIT</button>
                </form>

					  
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
      function enableTxtBox1()
        {
            document.getElementById("text1").disabled = !document.getElementById("radio1").checked;
           // document.getElementById("text2").disabled = document.getElementById("radio1").checked;
            //document.getElementById("text3").disabled = document.getElementById("radio1").checked;
            //document.getElementById("text4").disabled = document.getElementById("radio1").checked;

        }
           
    </script>

