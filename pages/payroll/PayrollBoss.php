<?php
include "../header/header.php";
	
	
	if(isset($_POST["bonus_id"]))
	{
		$bonus = $_POST['bonus'];
		$bonus_id = $_POST['bonus_id'];
		$date = date('Y-m-d');
		
		$query =  "	SELECT * 
							FROM user u join adminPayroll a on u.user_id = a.user_id join payroll p on p.user_id = a.user_id 
							WHERE a.user_id IN ($bonus_id)";
		$result = mysqli_query($conn, $query);
		
		while($row = mysqli_fetch_array($result))
		{
			$salary = $row["salary"];
			$kwspMonthly = $row["adminPayroll_kwsp"];
			$socsoMonthly = $row["adminPayroll_socso"];
			
			$kwsp = $salary * $kwspMonthly/100;
			$socso = $salary* $socsoMonthly/100 ;
			$bonusTot = $salary * $row["payroll_bonus"]/100;
			$tot = $salary + $bonusTot - $kwsp - $socso;
			
			
			$id = $row["user_id"];
			
			$sql = "INSERT INTO payroll(user_id, salary_monthly, payroll_bonus, date_monthly, kwsp_monthly,socso_monthly ) 
			VALUES('".$id."','".$tot."','".$bonus."','".$date."','".$kwspMonthly."','".$socsoMonthly."')";
			$result2 = mysqli_query($conn, $sql);
			
		}
			if($query)
			{
				echo '<script language="javascript">alert("Berjaya")</script>';
				print "<meta http-equiv='refresh' content='0;url=PayrollBoss.php'>";
			
			}
			else
			{
				echo '<script language="javascript">alert("Maaf!")</script>';
				print "<meta http-equiv='refresh' content='0;url=PayrollBoss.php'>";	
			}
	}
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
            <h1>SENARAI GAJI PEKERJA</h1>
          </div>
         
			</div>
			<!-- Button Bonus -->
			<div class="row mb-2">
			<div class="col-sm-12" align='right'>
				<input type="button" value="PEMBAYARAN GAJI" id="buttonBonus" class="btn btn-primary">
		    </div>
		    </div>
			<!-- /.Button Bonus -->
      </div>
	  <!-- /.container-fluid -->
    </section>
<!--TUTUP TAJUKK BESAR -->
	 <!-- /.MAIN CONTENT --> 
	<section class="content">
		<form method="post">
			<div class="card card-primary">
				<div class="card-header">
					<h3 class="card-title"> Pembayaran Gaji Pekerja</h3>
				</div>
				<div class="card-body" id="gajiBoss">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr class="text-center">
								<th> 
									<input type="checkbox" name="check" value="Check" id="check" data-toggle="modal" data-target="#modalBonus" onclick="toggle(this)" ># 
								</th>
								<th>ID Pekerja</th>
								<th>Nama</th>
								<th>Jawatan</th>
								<th>Tarikh</th>
								<th>KWSP (%)</th>
								<th>SOKSO (%)</th>
								<th>Gaji Pokok (RM)</th>
								<th>Gaji Bersih (RM)</th>
							</tr>
						</thead>
						<tbody>
						
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
						where MONTH(date_monthly) = '".$mth."'";
						
						$result = mysqli_query($conn,$query)or die("Query failed");		
						while($row = mysqli_fetch_array($result))
						{
							$salary = $row["salary"];
							
							$salaryMonthly = $row["salary_monthly"];
						
							$tarikh = $row["date_monthly"];
							$date = DateTime::createFromFormat('Y-m-d', $tarikh);
							$tarikh=$date->format('d/m/Y');?>
							<tr>
								<td> 
									<input type="checkbox" name="check_list" value="<?php echo $row['user_id'];?>" > 
								</td>
								<td align="center"> 
									<a href="#" id="<?php echo $row['user_id']?>" class="view_data" >
										<?php echo $row["user_id"];?>
									</a>
								</td>
								<td> <?php echo $row["user_name"];?></td>
								<td> <?php echo $row["user_position"];?></td>
								<td> <?php echo $tarikh ?></td>
								<td align="center"> <?php echo $row["adminPayroll_kwsp"];?></td>
								<td align="center"> <?php echo $row["adminPayroll_socso"];?></td>
								<td align="center"> <?php echo $salary;?></td>
								<td align="center"> <?php echo $salaryMonthly; ?></td>
							</tr> 
						<?php 
						} 
						?>
						
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

 <!-- Modal Bonus -->
		<div class="modal fade bd-example-modal-lg" id="bonusModal">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="ModalLongTitle">Pembayaran Gaji Dan Bonus</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					
					<div class="modal-body"  id="showDataBonus">
					</div>
				</div>
			</div>
		</div>
  <!-- End Modal Bonus -->
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
  <!-- End Modal Slip Gaji Lepas -->
  
 <script>  
 
/* $('input[type="checkbox"]').on('change', function(e){
   if(e.target.checked){
     $('#dataBonus').modal();
   }
});*/
 
 $(document).on('click', '.bonus_data',function(){
	
   
	  var bonus_id = $(this).attr("id");
		 $.ajax({  
                url:"ModalBonus.php",  
                method:"post",  
                data:{bonus_id:bonus_id},  
                success:function(data){  
                     $('#untukbonus').html(data);  
                     $('#dataBonus').modal("show");  
                }  
           });  
	 
	 });   	
 </script>


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

<script>
	$(document).ready(function () {
		$("#buttonBonus").click(function() {
			getValueToPembayaranGaji();
		});
	});

	function getValueToPembayaranGaji(){
		var bonuss = [];
		
		$.each($("input[name='check_list']:checked"), function() {
			bonuss.push($(this).val());
		});
		
		var selected;
		selected = bonuss.join(',') ;
		if(selected.length == 0)
		{
			alert("Sila pilih sekurang-kurangnya 1 pekerja untuk meneruskan proses pembayaran gaji dan penambahan bonus.");	
		} 
		else
		{
			$.ajax({  
			url:"src/insertBonus.php",  
			method:"post",  
			data:{bonuss:bonuss},  
				success:function(data){  
					 $('#showDataBonus').html(data);  
                     $('#bonusModal').modal("show");  
				}  
			}); 
		}
	}
</script>
	
	