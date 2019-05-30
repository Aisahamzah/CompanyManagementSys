<?php
include "../header/header.php";

?>




  <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
	
	
	<!--TAJUKK BESAR -->
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">GAJI</h1>
          </div><!-- /.col -->
         <!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
 <section class="content">
      <div class="container-fluid">
        
          <!-- left column -->
          <?php
				$count = 1;
				$username = $_SESSION['user_id'];
				//$query = "Select * from payroll where user_id = '$username'";
				

				if (isset($_POST['search'])) {
				$year = $_POST['year'];
				$month = $_POST['month'];

                $query = "SELECT * from payroll
                          WHERE user_id ='$username' AND date_monthly = ('$year-$month-01') group by date_monthly";
						
				$result = mysqli_query($conn, $query) or die("Query failed");
				}
				
			?>
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Semakan Gaji</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <div class="card-body">
			  <form method = "POST">
            <div class="row">
			
              <div class="col-md-6">
				<div class="form-group">
				 
                  <label>Pilih Bulan</label>
                  <select class="form-control select" style="width: 100%;" name="month">
                    <option selected="selected" value="1">Januari</option>
                    <option  value="2">Februari</option>
                    <option  value="3">Mac</option>
                    <option  value="4">April</option>
                    <option  value="5">Mei</option>
                    <option  value="6">Jun</option>
					<option  value="7">July</option>
					<option  value="8">Ogos</option>
					<option  value="9">September</option>
					<option  value="10">Oktober</option>
					<option  value="11">November</option>
					<option  value="12">Disember</option>
                  </select>
                </div>
				</div>
				
				<!-- /.form-group -->
			
              <div class="col-md-6">
                <div class="form-group">
                  <label>Pilih Tahun</label>
                  <select class="form-control select" style="width: 100%;" name="year">
                    <option selected="selected" value="2019">2019</option>
                    <option value="2018">2018</option>
                    <option value="2017">2017</option>
                    <option value="2016">2016</option>
                    <option value="2015">2015</option>
                    <option value="2014">2014</option>
					<option value="2013">2013</option>
					<option value="2012">2012</option>
					<option value="2011">2011</option>
					<option value="2010">2010</option>
					<option value="2009">2009</option>
					<option value="2008">2008</option>
					<option value="2007">2007</option>
					<option value="2006">2006</option>
                  </select>
                </div>
				</div>
				
				</div>
				 <div class="row">
              <div class="col-md-6">
                      <button type="submit" class="btn btn-block btn-primary" name = "search" value="search">Semak</button>
			  </div>
			  <div class="col-md-6">
                      <button type="reset" class="btn btn-block btn-primary">Reset</button>
			  </div>
			  </div>
				
                <!-- /.form-group -->
				
			 
				<!-- /.button -->	  
                   
                 
              <!-- /.col -->
			  </br>
			  </br>
			  <div class="row">
              <div class="col">
			  
			  <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <tr>
				    <th>Bil</th>
                    <th>Tarikh</th>
                    <th></th>
                  </tr>
				 <?php 
				     if (isset($_POST['search'])) 
					 {
					 while($row = mysqli_fetch_array($result)){
					 $tarikh = $row["date_monthly"];
					 $date = DateTime::createFromFormat('Y-m-d', $tarikh);
		             $tarikh=$date->format('d/m/Y');
					 $id = $row["user_id"]?>
				
                 <tr>
					<td> <?php echo $count; ?> </td>
					<td> <?php echo $tarikh ?> </td>
                    <td><a href="PrintPayroll.php?user_id=<?php print $id?>&date_monthly=<?php print $tarikh?>">Lihat/Cetak</a></td>
					
                  </tr>
				 <?php $count++; }} ?>
				  
           
                </table>
              </div>
			  </div>
			  </div>
			  </form>
            </div>
            <!-- /.row -->
          </div>
            </div>
			
			</section>
  
	
    <!-- /.content -->
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



