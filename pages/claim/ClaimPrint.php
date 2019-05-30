<?php
include '../../connection/connection.php';

$id=$_GET['user_id'];
//echo $id;
 $query = "	SELECT * FROM claim c 
			JOIN user u
			ON c.user_id = u.user_id 
			WHERE u.user_id = '$id' and claim_status='Baru' 
			ORDER BY claim_date desc";  
			
$results = mysqli_query($conn, $query) or die("Query failed");
$result = mysqli_query($conn, $query) or die("Query failed");	
$rows = mysqli_fetch_array($result);
?>

<link rel="stylesheet" href="../../plugins/bootstrap/css/bootstrap.min.css">
	<font face="Verdana">
		<div align = "center">
			<h1> SENARAI <i>CLAIM</i></h1>
		</div>
		
		<div align = "center">
			<h5>ZNN Technology Centre Sdn Bhd</h5>
			<p> No 3A & 3B, Jalan Pendidikan 8, </br>Taman Universiti, 81300 Skudai, Johor
			</br>
			07-595 3074 
			</br> 
			znntechsb@gmail.com </p>
		</div>
		</br></br>
	
	
	
			<div class="card-body" align="center">
				<table>
					<tr>
						<td>Nama Pekerja: </td>
						<td><?php echo $rows['user_name'] ?></td>
						<td style="width: 40%"></td>
						<td>ID Pekerja: </td>
						<td><?php echo $rows['user_id'] ?></td>
					</tr>	
				</table>
			</div>	
			
		<div class="card-body" align="center">
			<div class="table-responsive">  
				<table id="example1" class="table table-bordered table-striped">
					<tr>
						<th >Bil</th>   
						<th class="text-center" style="width: 10%">Id <i>Claim</i> </th>
						<th class="text-center" style="width: 10%">Tarikh <i>Claim</i></th>
						<th style="width: 50%">Jenis <i>Claim</i></th>   
						<th class="text-center" style="width: 40%">Harga <i>Claim</i> (RM)</th>	
					</tr>	

					<?php 
					
						$count=1; 
						$total_price=0;
						while($row = mysqli_fetch_array($results))  
						{
							$date = $row["claim_date"];
							$add_claimDate = date("d/m/Y",strtotime($date));
							
							
							
							
					?>
						
			 
					<tr>  
						<td > <?php echo $count; ?></td>
						<td class="text-center"><?php echo $row["claim_id"] ?></td>  
						<td class="text-center" ><?php echo $add_claimDate ?></td>  
						<td ><?php echo $row["claim_desc"]?></td>  
						<td class="text-center"><?php echo $row["claim_price"]?></td>  
					</tr>  
					
						<?php 
						$count++; 
						$total_price += $row['claim_price'];}
						?>
					<tr>
						<td colspan="4"><b>Total </b> </td>
						<td class="text-center"><b><?php echo $total_price; ?></b> </td>
					</tr>
				</table>

			</div>
		</div>	
</font>
<div align="center"> <button class="btn btn-primary d-print-none " type="button" name="print" onClick="window.print()">CETAK</button>
<button class="btn btn-secondary d-print-none" type="button" name="print" onClick="goBack()">KEMBALI</button></div>

<script>
function goBack() {
  window.history.back();
}
</script>