<?php
	include "../header/header.php";
?>

<div class="content-wrapper">  
	
	<!--TAJUKK BESAR -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><i>'CLAIM'</i> PERUBATAN</h1>
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
	
	<?php
		
		$username = $_SESSION['user_id'];
		$query = "Select * from user u WHERE user_id=$username" ;
		$result = mysqli_query($conn, $query) or die("Query failed");
 		
		$link = mysqli_connect("localhost", "root", "", "znnmanagement");
		
		$row = mysqli_fetch_array($result);

		$today = date("Y-m-d");
		
		if(isset($_POST['submit'])){
		
			$med_date 	= $_POST["med_date"];
			$med_price 	= $_POST['med_price'];
			$med_desc 	= $_POST['med_desc'];
			
			$med_attach = $_FILES['med_attach']['name'];
			
		
			if (isset($_FILES['med_attach']['name'])) {
				
				$med_attach = $_FILES['med_attach']['name'];
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
				
				$name= $_FILES['med_attach']['name'];
				$tmp_name= $_FILES["med_attach"]['tmp_name'];
				$imgtype=$_FILES["med_attach"]["type"];
				$ext= GetImageExtension($imgtype);
				$imagename=$name;
				$target_path = "image/".$imagename;
				move_uploaded_file($tmp_name, $target_path);
				/*
				if (isset($name)) {
					$path= 'Uploads/files/';
					if (!empty($name)){
						if (move_uploaded_file($tmp_name, $path.$name)) {
							$sql3="INSERT INTO files(filename)
									VALUES ('$name')";
									$result2=mysqli_query($link,$sql3);
									}

					}
				}*/ 
			}
		/*$targetDir = "uploads/";
		$fileName = basename($_POST['med_attach']);
		$targetFilePath = $targetDir . $fileName;
		$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
		
		if(!empty($_POST['med_attach'])){
			// Allow certain file formats
			$allowTypes = array('jpg','png','jpeg','gif','pdf');
			if(in_array($fileType, $allowTypes)){
				// Upload file to server
				if(move_uploaded_file($_POST['med_attach'], $targetFilePath)){
					// Insert image file name into database
					$insert = $db->query("INSERT into images (file_name, uploaded_on) VALUES ('".$fileName."', NOW())");
						if($insert){
							$statusMsg = "The file ".$fileName. " has been uploaded successfully.";
						}else{
						$statusMsg = "File upload failed, please try again.";
						} 
				}else{
				$statusMsg = "Sorry, there was an error uploading your file.";
				}
			}else{
			$statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
			echo '<script > myFunction()</script>';
			}
		}else{
		$statusMsg = 'Please select a file to upload.';
		} */
		
		$sql = "INSERT INTO medical (user_id,med_date, med_desc, med_price, med_attach_name,med_attach_blob, med_status) 
				VALUES ('$username','$med_date', '$med_desc', '$med_price','$med_attach', '$med_attach', 'BARU')";
		$result=mysqli_query($link,$sql);}
		
		
	?>
	
	
	<section class= "content">
		<div class= "container-fluid">
		<div class= "row">
		<div class= "col-2"></div>
		<div class = "col-8">
		
		
		<div class="card card-primary">
			<div class="card-header">
				<h3 class="card-title">BORANG PERUBATAN</h3>
			</div>
			<form action="medicalStaff.php" method="post" enctype="multipart/form-data">
			
			<div class="card-body">
			
			
			
			
				<!-- text input -->
				<div class="row">
				<div class="col-12">
					<label>Nama :</label>
					<input type="text" class="form-control" value="<?php echo $row["user_name"]; ?>" disabled>
				</div>
				</div>
				<br>
				<div class="row">
					<div class="col-6" >
						<label>Tarikh cuti:</label>
						<div class="input-group">
							
						<input type="date" class="form-control float-right" name="med_date" max="<?php echo $today ?>" required>
						</div>
					</div>				
					<br>
					<div class="col-6">	
						<label>Harga Perubatan :</label>
						<input type="number" class="form-control" placeholder="RM" name="med_price" id="price" min="0" max="35" required>
					</div>
				</div>
			
			
			<br>
			<div class="row">
			<div class="col-12">
                <label>Catatan : </label>
                <textarea class="form-control" rows="3" placeholder="" name="med_desc" ></textarea>
			</div>
			</div>
			
			<br>
			<div class="row">
				<div class="col-12">
                    <label for="exampleInputFile">Lampiran :</label>
                    <div class="input-group">
                        <input type="file" name="med_attach" value="fileupload" id="exampleInputFile" class="file-input" required>                                          
                    </div>
					<br>
					<button name="submit" type="submit" class="btn btn-primary">Hantar</button>
					<!--
					<input class="btn float-right" type="text" class="btn form-control float-right" placeholder="<?php echo 400 - $total ?>" disabled>
					<label class="btn float-right">Baki 'Claim' :</label> -->
					</br>
				</div>
			</div>
			
		
		</div>
		</form>
	</div>
	</div>	
	</div>
	</div>
	</section>
	
  </div>
  
<?php
	include "../footer/footer.php"
	
?>
 
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
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
document.getElementById("price").addEventListener("invalid", myFunction);

if(function myFunction() = "") {
	alert("Sila isi");
	}else{
  alert("Harga perubatan mestilah tidak melebihi RM35");
}
</script>