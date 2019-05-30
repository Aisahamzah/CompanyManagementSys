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
            <h1>PERMOHONAN PERUBATAN</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="../main/admin.php">Menu</a></li>
              <li class="breadcrumb-item active">DASHBOARD</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<!--TUTUP TAJUKK BESAR -->

<?php
		$count=1;
		$query = "Select user.user_name,medical.med_date,medical.med_desc,medical.med_attach,medical.med_price,medical.med_status from medical JOIN user ";
		$result = mysqli_query($conn, $query) or die("Query failed");
	?>
	 <!-- /.MAIN CONTENT --> 
	<section class="content">
		<div class="card card-primary">
			<div class="card-header">
					<h3 class="card-title">SENARAI PEKERJA TUNTUT PERUBATAN</h3>
			</div>
			<div class="card-body" style="overflow-x:auto;">
				<table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
				  
                  <th>Name </th>
                  <th>Tarikh Cuti</th>
                  <th>Harga Perubatan (RM)</th>
                  <th>Catatan</th>
                  <th>Lampiran</th>
				  <th>Status Tuntutan</th>
				  <th>
				  <script>
					function toggle(source) {
					var checkboxes = document.querySelectorAll('input[type="checkbox"]');
					for (var i = 0; i < checkboxes.length; i++) {
					if (checkboxes[i] != source)
						checkboxes[i].checked = source.checked;
						}
					}
					</script>
				  <input type="checkbox" name="check" value="check" onclick="toggle(this);"/>
				    Check
				  </th>
                </tr>
                </thead>
				
				<?php while($row = mysqli_fetch_array($result)){?>
				
				<tbody>
                <tr>
                  <td><a href="medicalAdminHistoryStaff.php"><?php echo $row["user_name"]; ?></a></td>
                  <td><?php echo $row["med_date"]; ?></td>
                  <td><?php echo $row["med_price"]; ?></td>
                  <td><?php echo $row["med_desc"]; ?></td>
                  <td><?php echo $row["med_attach"]; ?>
				  
				  <div class="custom-file">
                        <a href="/images/myw3schoolsimage.jpg" download>
						<button type="submit" class="btn btn-primary">Muat Turun</button>
						</a>
				  </div>
				  
				  </td>
				  <td><?php echo $row["med_status"]; ?></td>
				  <td><input type="checkbox" name="check"></td>
                </tr>
				</tbody>
				
				<?php $count++; } ?>
              </table>
			  
			  <br>
			  <td><button type="button" class="btn btn-primary">Submit</button>
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
