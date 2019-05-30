<?php
include "../header/header.php";


			$query2="SELECT distinct (c.user_id), u.user_name FROM claim c
			join user u
			on c.user_id=u.user_id where c.claim_check='uncheck'";
			$result3=mysqli_query($conn, $query2);

			if(isset($_REQUEST['hantarClaim'])) { 

				$ch = "check";
				$chk= $_REQUEST['check_list'];
				$a=implode(",",$chk);
									
				$query4 = "Update claim set claim_check = '$ch', claim_status='Dalam Proses' where user_id in ($a) ";
				$result = mysqli_query($conn, $query4);
				
				$query2="SELECT distinct (c.user_id), u.user_name FROM claim c
				join user u
				on c.user_id=u.user_id where c.claim_check='uncheck'";
				$result3=mysqli_query($conn, $query2);
				
				
				$message = "Berjaya Dihantar!";
				echo "<script type='text/javascript'>alert('$message');</script>";
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
            <h1><i>CLAIM</i></h1>
          </div>
          
        </div>
      </div><!-- /.container-fluid -->
    </section>
<!--TUTUP TAJUKK BESAR -->
		
	<!-- /.MAIN CONTENT --> 
	<section class="content">
	
	
	<form role="form"  id="frmText" action="ClaimAdmin.php" method = "POST" >
	<p style="padding-left:1000px"><button  type="submit" name="hantarClaim" id="hantar" class="btn btn-primary">HANTAR</button></p>
	<!--<a href="ClaimPrint.php" type="submit" name="print" value="printletter" class="btn btn-success">Print</a>-->
	<iframe src="ClaimList.php" style="display:none;" name="frame"></iframe>

	
	
		<?php
			//$count=1;
			if(isset($_GET["user_id"])) {
			 $id=$_GET['user_id'];
			}
			
			
			$query3 = "	Select distinct(c.user_id),u.user_name 
						from user u inner join claim c 
						where u.user_id = c.user_id 
						and c.claim_status ='Baru'"; 
			$result2 = mysqli_query($conn, $query3) or die("Query failed");
			
					
		?>
		  
		  
			<div class="card card-primary ">
				<div class="card-header d-print-none">
					<h3 class="card-title">SENARAI PENAMA <i>CLAIM</i></h3>
				</div>
				<div class="card-body">
					
						
							<table id="example1" class="table table-bordered table-striped">
								<thead>
								<tr>
									<th class="text-center" style="width: 20px"><input type="checkbox" name="check" value="Check" onclick="toggle(this)" > #</th>
								
									<th  style="width: 200px">Id Pekerja</th>
									<th  style="width: 300px">Nama</th>
									
								</tr>
								</thead>
								
								<tbody>
								<?php while($row = mysqli_fetch_array($result2)){?>
								
								<tr>
									<td class="text-center"> <input type="checkbox" name="check_list[]" value="<?php echo $row['user_id']; ?>"></td>
									<td > <?php echo $row["user_id"]; ?></td>
									<td ><a href="#" value="view"  id="<?php echo $row['user_id']; ?>" class="view_data"><?php echo $row['user_name']; ?></a></td>
								</tr>
								<?php } ?>
								</tbody>
							</table>
				</form>	
					

					<!--MODAL-->				
					<div id="claimModal" class="modal fade bd-example-modal-lg">
					  <div class="modal-dialog modal-lg" >
						<div class="modal-content">
						  <div class="modal-header">
							<h5 class="modal-title" >Senarai <i>Claim</i></h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						  </div>
						  <div class="modal-body" id="claimDetails">
						  </div>								
						  
						
							<!--<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<a href="ClaimPrint.php?user_id=<?php ?>" type="button" value="Print this page" class="d-print-none btn btn-success">Cetak</a>
							</div>-->
						</div>
					  </div>
					</div>
					<!-- TUTUP MODAL-->
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
<!-- DataTables -->
<script src="../../plugins/datatables/jquery.dataTables.js"></script>
<script src="../../plugins/datatables/dataTables.bootstrap4.js"></script>
<!-- SlimScroll -->
<script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
<!-- Bootstrap Modal -->
<!-- Page script -->

<script>

$(document).on('click', '.view_data',function()
{
	
	var claim_id = $(this).attr("id");   
        $.ajax(
		{  
            url:"ClaimList.php",  
            method:"post",  
            data:{claim_id:claim_id},  
            success:function(data)
			{  
                $('#claimDetails').html(data);  
                $('#claimModal').modal("show");  
            }  

		});
});	
</script>

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
$('#hantar').click(function () {
				var checked = $("#frmText input:checked").length;
			if (checked<=0) {
				alert('Sila Tanda Sebelum Hantar');
				return false;
			}
			});
			
			/*$('#hantartl').click(function () {
				var checked = $("#frmText input:checked").length;
			if (checked<=0) {
				alert('please check atleast one');
				return false;
			}
			});*/
</script>
