<?php

 if(isset($_POST["slip_id"]))  
 {  

      $output = ''; 
      $connect = mysqli_connect("localhost", "root", "", "znnmanagement");	  
      $query = "Select *
			from user u
		    join
			adminpayroll a
			on 
			u.user_id = a.user_id
			join
			payroll p
			on
			p.user_id = a.user_id WHERE a.user_id = '".$_POST["slip_id"]."'
			group by 
			date_monthly
			order by
			date_monthly desc" ;  
      $result = mysqli_query($connect, $query);  
 
     
	 $output .= '  
     <div class="card-body"">
				   <table id="example3" class="table table-bordered table-striped">
				<thead>
                <tr>
				<th>Tarikh</th>
				<th align = "center">Kwsp (RM)</th>
				<th align = "center">Sokso (RM)</th>
				<th align = "center">Bonus (RM)</th>
				<th align = "center">Gaji Pokok (RM)</th>
				<th align = "center">Gaji Bersih (RM)</th>
				</tr>
                </thead>
				<tbody>';
				
	 while($row = mysqli_fetch_array($result)) 
	{
		$kwsp= $row["salary"]*( $row["kwsp_monthly"]/100);
		$kwsp = number_format($kwsp, 2, '.', '');
		$socso= $row["salary"]*( $row["socso_monthly"]/100);
		$socso = number_format($socso, 2, '.', '');
		$bonus= $row["salary"]*( $row["payroll_bonus"]/100);
		$bonus = number_format($bonus, 2, '.', '');
		$salary = $row["salary"];
		$salary = number_format($salary, 2, '.', '');
		$salaryMonthly = $row["salary_monthly"];
		$salaryMonthly = number_format($salaryMonthly, 2, '.', '');
		
		$tarikh = $row["date_monthly"];
					$date = DateTime::createFromFormat('Y-m-d', $tarikh);
		            $tarikh=$date->format('d/m/Y');
		
		$output .= '
				
				<tr>
				<td >'.$tarikh.'</td>
				<td align = "center">'.$kwsp.'</td>
				<td align = "center">'.$socso.'</td>
				<td align = "center">'.$bonus.'</td>
				<td align = "center">'.$salary.'</td>
				<td align = "center">'.$salaryMonthly.'</td>
				</tr>
				
				
                ';  
				}
      $output .= "</tbody></table></div>";  
     


 echo '<script src="../../plugins/datatables/jquery.dataTables.js"></script>
       <script src="../../plugins/datatables/dataTables.bootstrap4.js"></script>';
			 
 echo '<script>
			$(function () {
				$("#example3").DataTable();
				$("#modal4").DataTable({
				"paging": true,
				"lengthChange": true,
				"searching": true,
				"ordering": true,
				"info": true,
				"autoWidth": true
				});
			});
		</script>';


 echo $output; 

 }
 ?>