<?php
include "../header/header.php";

?>


  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  	
	
	<!--TAJUKK BESAR -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>LAPORAN SENARAI GAJI PEKERJA</h1>
          </div>
		</div>
      </div>
	  <!-- /.container-fluid -->
    </section>
<!--TUTUP TAJUKK BESAR -->
	 <!-- /.MAIN CONTENT --> 
<section class="content">
   
<?php
			$currMonth = date('m');
			$mth = $currMonth-1;
			
			$username = $_SESSION['user_id'];
			$query = "Select *
			from user u
		    join
			adminpayroll a
			on 
			u.user_id = a.user_id
			join
			payroll p
			on
			p.user_id = a.user_id
			where MONTH(date_monthly) = '".$mth."';
			";
			

			$result = mysqli_query($conn,$query)or die("Query failed");
			$count = 1;		
?>
	<form method="post">

		<div class="card card-primary">
			<div class="card-header">
				<h3 class="card-title">Laporan Gaji Pekerja</h3>
			</div>
			<div class="card-body" id="gajiBoss">
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr align="center">
							<th>Bil</th>
							<th>ID Pekerja</th>
							<th>Nama</th>
							<th>Jawatan</th>
							<th>Tarikh</th>
							<th>KWSP (%)</th>
							<th>SOKSO (%)</th>
							<th>Bonus (%)</th>
							<th>Gaji Pokok (RM)</th>
							<th>Gaji Bersih (RM)</th>
						</tr>
					</thead>
					<tbody>
				
						<?php while($row = mysqli_fetch_array($result))
						{
							
							$salary = $row["salary"];
							$salary = number_format($salary, 2, '.', '');
							$salaryMonthly = $row["salary_monthly"];
							$salaryMonthly = number_format($salaryMonthly, 2, '.', '');
							$tarikh = $row["date_monthly"];
							$date = DateTime::createFromFormat('Y-m-d', $tarikh);
							$tarikh=$date->format('d/m/Y');?>
						 
						 <tr>
						  <td align = "center"> <?php echo $count?></td>
						  <td align = "center"> <a href="#" id="<?php echo $row['user_id']?>" class="view_data" >
							   <?php echo $row["user_id"];?></a>
							   </td>
						  <td> <?php echo $row["user_name"];?></td>
						  <td> <?php echo $row["user_position"];?></td>
						  <td> <?php echo $tarikh ?></td>
						  <td align = "center"> <?php echo $row["adminPayroll_kwsp"];?></td>
						  <td align = "center"> <?php echo $row["adminPayroll_socso"];?></td>
						  <td align = "center"> <?php echo $row["payroll_bonus"];?></td>
						  <td align = "center"> <?php echo $salary;?></td>
						  <td align = "center"> <?php echo $salaryMonthly; ?></td>
						</tr> 
						<?php $count++; } ?>
				
					</tbody>  
              </table>
			  </br>		  
			</div>         
		</div>    
	</form>
		 <!-- </section>-->
</section>
	</div>
	
	<?php
	include "../footer/footer.php"
	?>
  <!-- /.content-wrapper -->
<!-- ./wrapper -->

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
  
   <!-- Modal Slip Gaji Lepas -->
 
	<div class="modal fade  bd-example-modal-lg" id="dataModal" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="ModalLongTitle">Slip Gaji</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
			<div class="modal-body" id = "slipgaji">
		</div>
                <!-- /.card-body -->
				<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
            
  </form>
  <!-- End Modal Slip Gaji Lepas -->

<script>
 $(document).on('click', '.view_data',function(){
                     

		var slip_id = $(this).attr("id");
		 $.ajax({  
                url:"../payroll/ModalSlipGaji.php",  
                method:"post",  
                data:{slip_id:slip_id},  
                success:function(data){  
                     $('#slipgaji').html(data);  
                     $('#dataModal').modal("show");  
                }  
           });  
      });    	
</script>
	
	