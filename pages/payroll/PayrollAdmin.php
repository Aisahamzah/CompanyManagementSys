<?php
include "../header/header.php";

if (isset($_POST['save']))
{
    $id = $_POST['id'];
    $kwsp = $_POST['kwsp'];
    $socso = $_POST['socso'];
    $pokok = $_POST['gaji'];

    $sql = "UPDATE adminpayroll SET adminPayroll_kwsp = '$kwsp', adminPayroll_socso = '$socso' WHERE user_id = '$id'";
    $query = mysqli_query($conn, $sql);

    $sql2 = "UPDATE user SET salary = '$pokok' WHERE user_id = '$id'";
    $query2 = mysqli_query($conn, $sql2);

    if ($query && $query2)
    {
      echo
      (
        "<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Maklumat telah dikemaskini.')
        window.location.href='PayrollAdmin.php'
        </SCRIPT>"
      );
      exit();
    }

  

}

		

?>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
  
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
	
	
	<!--TAJUKK BESAR -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>GAJI PEKERJA</h1>
          </div>
          
        </div>
      </div><!-- /.container-fluid -->
    </section>
<!--TUTUP TAJUKK BESAR -->

	 <!-- /.MAIN CONTENT --> 
	<section class="content">
   
<?php
			$username = $_SESSION['user_id'];
			$query = "Select *
			from  user u 
		    join
			adminpayroll a
			on 
			u.user_id = a.user_id
			inner join
			payroll p 
			on p.user_id = a.user_id
			group by
			a.user_id";
			
			$count = 1;
			

			$result = mysqli_query($conn,$query)or die("Query failed");
?>

            <form method="post">
			 <div class="card card-primary">
				  <div class="card-header">
					<h3 class="card-title">Semakan Gaji Pekerja</h3>
				  </div>
					<div class="card-body">
				   <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr class="text-center" >
				  <th>Bil</th>
                  <th>ID Pekerja</th>
                  <th>Nama</th>
                  <th>Jawatan</th>
				  <th>Tarikh</th>
                  <th>KWSP (%)</th>
                  <th>SOKSO (%)</th>
				  <th>Gaji Pokok (RM)</th>
				  <th>Gaji Bersih (RM)</th>
				  <th></th>
				  
				  
                </tr>
                </thead>
                <tbody>
				
				<?php while($row = mysqli_fetch_array($result)){
					
					
					
					$tarikh = $row["date_startWork"];
					$date = DateTime::createFromFormat('Y-m-d', $tarikh);
		            $tarikh=$date->format('d/m/Y');?>
                 <tr>
				   <td align="center"><?php echo $count;?></td>
				  
				  <td align="center"> <a href="#" id="<?php echo $row['user_id']?>" class="view_data" >
				       <?php echo $row["user_id"];?></a>
					   </td>
					   
					   
                  <td width ="50%"> <?php echo $row["user_name"];?></td>
                  <td> <?php echo $row["user_position"];?></td>
                  <td> <?php echo $tarikh;?></td>
                  <td align="center"> <?php echo $row["adminPayroll_kwsp"];?></td>
				  <td align="center"> <?php echo $row["adminPayroll_socso"];?></td>
				  <td align="center"> <?php echo $row["salary"];?></td>
				  <td align="center"> <?php  
											$a=$row["salary"] * $row["adminPayroll_kwsp"] / 100;
											$b=$row["salary"] * $row["adminPayroll_socso"] / 100;
											$c=$row["salary"] * $row["payroll_bonus"]/ 100;
											$tot = $row["salary"] - $a - $b + $c;
											$tot = number_format($tot, 2, '.', '');
				  
										echo $tot; ?></td>
				  <td>
				
						<a  class="btn btn-app-primary" href="#ModalCenter" data-toggle="modal" data-id="<?php echo $row['user_id']?>" 
						data-nama="<?php echo $row['user_name']?>" data-jawatan="<?php echo $row['user_position']?>" 
						data-start="<?php echo $row['date_startWork']?>" data-kwsp="<?php echo $row["adminPayroll_kwsp"]?>" 
						data-socso="<?php echo $row["adminPayroll_socso"]?>" data-gaji="<?php echo $row['salary']?>"> 
                        <i class="fa fa-edit"></i>  Kemaskini</a>
						
				 </td>
                </tr> 
				<?php $count++ ;} ?>
				
                </tbody>  
              </table>
			  </br>
			 
			</div>    
			</div>
			</form>
			
			<!-- Modal -->
					
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
<script
  src="http://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
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
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="../../plugins/datatables/jquery.dataTables.js"></script>
<script src="../../plugins/datatables/dataTables.bootstrap4.js"></script>
<!-- SlimScroll -->

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
	
  });
  

  
</script>

<form action="" method="POST">
   <div class="modal fade bd-example-modal-lg" id="ModalCenter" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="ModalLongTitle">Kemaskini Gaji Pekerja</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			<div class="modal-body">
				
<?php
			$query2 = "Select *
			from  user u 
		    inner join
			adminpayroll a
			on 
			u.user_id = a.user_id";
			 
			$result2 = mysqli_query($conn,$query2)or die("Query failed");
?>
	           
                <div class="card-body">
					<div class="form-group">
						<label>ID Pekerja</label>
						<input name="id" type="text" class="form-control" disabled="">
						<input type="hidden" name="id">
					</div>
					
					<div class="form-group">
						<label>Nama</label>
						<input type="text" name="claimName" class="form-control" disabled>
					</div>
					
					<div class="form-group">
						<label>Jawatan</label>
						<input name="position" type="text" class="form-control" disabled>
					</div>
					
					<div class="form-group">
						<label>Tarikh</label>
						<input name="start" type="text" class="form-control" disabled>
					</div>
					
					<div class="form-group">
						<label>KWSP (RM)</label>
						<input name="kwsp" type="text" class="form-control">
					</div>
						
					<div class="form-group">
						<label>SOKSO (RM)</label>
						<input name="socso" type="text" class="form-control">
					</div>
					
					<div class="form-group">
						<label>Gaji Pokok (RM)</label>
						<input name="gaji" type="text" class="form-control">
					</div>
                </div>
	<!-- /.card-body -->
				
				<div class="modal-footer">
					<p align="center">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button class="btn btn-primary" name="save">Save changes</button>
					</p>
				</div>
			
			</div>
		</div>
	</div>
  </div>
</form>
		

<!-- Modal Tambah -->

		
		
</div>
<script>
  $('#ModalCenter').on('show.bs.modal', function(e) {
    var id = $(e.relatedTarget).data('id');
    var name = $(e.relatedTarget).data('nama');
    var pos = $(e.relatedTarget).data('jawatan');
    var start = $(e.relatedTarget).data('start');
    var kwsp = $(e.relatedTarget).data('kwsp');
    var socso = $(e.relatedTarget).data('socso');
    var gaji = $(e.relatedTarget).data('gaji');

      $(e.currentTarget).find('input[name="id"]').val(id);
      $(e.currentTarget).find('input[name="claimName"]').val(name);
      $(e.currentTarget).find('input[name="position"]').val(pos);
      $(e.currentTarget).find('input[name="start"]').val(start);
      $(e.currentTarget).find('input[name="kwsp"]').val(kwsp);
      $(e.currentTarget).find('input[name="socso"]').val(socso);
      $(e.currentTarget).find('input[name="gaji"]').val(gaji);

      //$('#message').html(id);
    });
	
</script>

 
 <?php
$query3 = " Select *
			from user u
		    join
			adminpayroll a
			on 
			u.user_id = a.user_id
			join
			payroll p
			on
			p.user_id = a.user_id
			";
			
$result3 = mysqli_query($conn,$query3)or die("Query failed");
?>

<form action="" method="POST">
	<div id="dataModal" class="modal fade bd-example-modal-lg" >
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="ModalLongTitle">Slip Gaji</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					
					<div class="modal-body" id = "slipgaji">
					</div>
				
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
	</div>
  </form>
  
  <script>  
 $(document).on('click', '.view_data',function(){
                     

		var slip_id = $(this).attr("id");
		 $.ajax({  
                url:"ModalSlipGaji.php",  
                method:"post",  
                data:{slip_id:slip_id},  
                success:function(data){  
                     $('#slipgaji').html(data);  
                     $('#dataModal').modal("show");  
                }  
           });  
      });    
 </script>

