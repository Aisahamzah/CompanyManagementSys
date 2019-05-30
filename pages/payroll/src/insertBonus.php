<?php  
include '../../../connection/connection.php';
$currFullDate2 = date('Y-m-d');
$user_id = $_SESSION['user_id'];

 if(isset($_POST["bonuss"]))  
 {  
    $bonuss = $_POST["bonuss"];
	
	$id = implode(",",$bonuss);
	$id2 = '';
	$output = '';  
	$output .= '<form method="post" action="PayrollBoss.php">';  
	$output .= '
	<div class="card-body" id="gajiBoss">
					<table id="modal" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>ID Pekerja</th>
								<th>Nama</th>
								<th>Gaji Pokok (RM)</th>
							</tr>
						</thead>
						<tbody>';
						
								$query = "	Select *
											from user 
											where user_id IN ($id)";
											
								$result = mysqli_query($conn,$query)or die("Query failed");		
								while($row = mysqli_fetch_array($result))
								{
									
									$salary = $row["salary"];
									$salary = number_format($salary, 2, '.', '');
	$output .= '	
									<tr>
										<td>'.$row["user_id"].'</td>
										<td>'.$row["user_name"].'</td>
										<td>'.$salary.'</td>
									</tr> ';
								 } 
						
	$output .= '					
						</tbody>  
					</table>
					</br>
	
			<h5 class="text-center">
				Masukkan Jumlah Bonus Jika Ada (%) :
			</h5>			
			<input class="form-control" type="text" id="bonus" name="bonus">
			<input type="hidden" id="bonus_id" value="'.$id.'" name="bonus_id">		
			</div>
				<br>
			<div class="card-footer">
				<center>  
						<button type="submit" class="btn btn-primary" name="terima_btn" id="terima_btn">Hantar</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</center>
			</div>
			';
    $output .= "</form>";  
   
	echo '<script src="../../plugins/datatables/jquery.dataTables.js"></script>
		  <script src="../../plugins/datatables/dataTables.bootstrap4.js"></script>';
			 
	echo '<script>
			$(function () {
				$("#modal").DataTable();
				$("#modal1").DataTable({
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
 
	
	
	
	
	
	
	
	
	
	
