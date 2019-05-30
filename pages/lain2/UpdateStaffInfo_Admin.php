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
            <h1>INFORMASI PEKERJA</h1>
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
	<form role="form">
          <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">MAKLUMAT PERIBADI PEKERJA</h3>
              </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-10">
				
				<div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control" placeholder="Nama Penuh Staff">
                </div>
				
				<div class="form-group">
                    <label>No Kad Pengenalan</label>
                    <input type="text" class="form-control" placeholder="Kad Pengenalan">
                  </div>
				  
				  <div class="form-group">
                    <label>Alamat</label>
                    <textarea class="form-control" rows="3" placeholder="Alamat Penuh"></textarea>

                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Emel</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Emel">
                  </div>
				  
				  <div class="form-group">
                    <label>No Telefon</label>
                    <input type="text" class="form-control" placeholder="Nombor Telefon">
                  </div>
				  
                  <div class="form-group">
					<label>Jantina</label>
                    <div class="form-check">
                      <input class="form-check-input" name="jantina" type="radio" value="Lelaki">
                      <label class="form-check-label">Lelaki</label>
					  <br><input class="form-check-input" name="jantina" type="radio" value="Perempuan">
                      <label class="form-check-label">Perempuan</label>
                    </div>
				  </div>

                  <div class="form-group">
					<label>Status</label>
                    <div class="form-check">
                      <input class="form-check-input" name="status" type="radio" value="Bujang">
                      <label class="form-check-label">Bujang</label>
					  <br><input class="form-check-input" name="status" type="radio" value="Berkahwin">
                      <label class="form-check-label">Berkahwin</label>
                    </div>
				  </div>

                  <div class="form-group">
					<label>Bangsa</label>
                    <div class="form-check">
                      <input class="form-check-input" name="bangsa" type="radio" value="Melayu">
                      <label class="form-check-label">Melayu</label>
					  <br><input class="form-check-input" name="bangsa" type="radio" value="India">
                      <label class="form-check-label">India</label>
					  <br><input class="form-check-input" name="bangsa" type="radio" value="Cina">
                      <label class="form-check-label">Cina</label>
					  <br><input class="form-check-input" name="bangsa" type="radio" value="Lain-lain">
                      <label class="form-check-label">Lain-lain</label>
                    </div>
				  </div>

				  <div class="form-group">
                    <label>Warganegara</label>
                    <input type="text" class="form-control" placeholder="Warganegara">
                  </div>
				
                <!-- /.form-group -->

                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-md-6">

                <!-- /.form-group -->

                <!-- /.form-group -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
        </div>
		
		<div class="card card-primary">
            <div class="card-header">
				<h3 class="card-title">MAKLUMAT WARIS</h3>
            </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-10">
				
				<div class="form-group">
                    <label>Nama Waris</label>
                    <input type="text" class="form-control" placeholder="Nama Waris">
                  </div>
				  
				  <div class="form-group">
                    <label>Hubungan</label>
                    <input type="text" class="form-control" placeholder="Contoh: Ibu/Bapa/Abang/Kakak/...">
                  </div>
				  
                  <div class="form-group">
                    <label for="exampleInputPassword1">No Telefon Waris</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="No Telefon Waris">
                  </div>
				
                <!-- /.form-group -->

                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-md-6">
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
        </div>

          <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">MAKLUMAT PEKERJAAN PEKERJA</h3>
              </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-10">
				
				<div class="form-group">
					<label>Jenis Pekerja</label>
                    <div class="form-check">
                      <input class="form-check-input" name="jenis" type="radio" value="Tetap">
                      <label class="form-check-label">Tetap</label>
					  <br><input class="form-check-input" name="jenis" type="radio" value="Kontrak">
                      <label class="form-check-label">Kontrak</label>
					  <br><input class="form-check-input" name="jenis" type="radio" value="Pelajar Praktikal">
                      <label class="form-check-label">Pelajar Praktikal</label>
                    </div>
				  </div>

				  <div class="form-group">
                    <label>Pangkat</label>
                    <input type="text" class="form-control" placeholder="Pangkat">
                  </div>

                <div class="form-group">
                  <label>Tarikh Masuk Kerja</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                    </div>
                    <input type="date" class="form-control">
                  </div>
                  <!-- /.input group -->
                </div>
				
				<div class="form-group">
                    <label>Gaji Bersih</label>
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text">RM</span>
						</div>
						<input type="text" class="form-control">
						<div class="input-group-append">
							<span class="input-group-text">.00</span>
						</div>
					</div>
                </div>
				
                <!-- /.form-group -->

                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-md-6">

                <!-- /.form-group -->

                <!-- /.form-group -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
        </div>



          <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">ID PEKERJA</h3>
              </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-10">
				
				<div class="form-group">
                    <label>Id Pekerja</label>
                    <input type="text" class="form-control" placeholder="Id Pekerja">
                  </div>
				  
                  <div class="form-group">
                    <label for="exampleInputPassword1">Kata Laluan</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Kata Laluan">
                  </div>
				
                <!-- /.form-group -->

                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-md-6">
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
        </div>

<center>
<table>
	<tr>
		<td>
			<div class="card-footer">
				<button type="submit" class="btn btn-success">KEMASKINI</button>
			</div>
		</td>
	</tr>
</table>
</center>

</form>

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

