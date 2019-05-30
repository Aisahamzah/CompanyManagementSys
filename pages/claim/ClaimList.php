<?php  
 if(isset($_POST["claim_id"]))  
 {  
		$uid=$_POST["claim_id"];
      $output = '';  
      $conn = mysqli_connect("localhost", "root", "", "znnmanagement");  
      $query = "SELECT * FROM claim c 
            JOIN user u 
			ON c.user_id = u.user_id 
			WHERE u.user_id = '".$_POST["claim_id"]."' and claim_status='Baru'";  
      
	  $result = mysqli_query($conn, $query);  
      
	  $count=1;
	  
	  $output .= '  
      <div class="table-responsive">  
        <table id="example1" class="table table-bordered table-striped">
			<tr>
				<th class="text-center">Bil</th>   
				<th class="text-center">Id <i>Claim</i> </th>
				<th class="text-center">Tarikh <i>Claim</i></th>
				<th class="text-center">Jenis <i>Claim</i></th>   
				<th class="text-center">Lampiran <i>Claim</i></th>
				<th class="text-center">Harge <i>Claim</i></th>	
			</tr>		   
		';
		
		$total_price=0;		
		while($row = mysqli_fetch_array($result))  
		{  
			$output .= '  
                <tr>  
                     <td class="text-center"> '.$count.' </td>
                     <td class="text-center" width="10%">'.$row["claim_id"].'</td>  
                     <td class="text-center" width="20%">'.$row["claim_date"].'</td>  
                     <td class="text-center" width="50%">'.$row["claim_desc"].'</td>  
					 <td class="text-center" width="50%">'.$row["claim_attach"].'</td>  
                     <td class="text-center" width="50%">'.$row["claim_price"].'</td>  
                </tr>  
                ';  
			
			
			$count++;
			
			$total_price += $row['claim_price'];
		}  
			$output .= ' 
			<tr>
				<td colspan="5"><b>Total </b> </td>
				<td><b>'.$total_price.'</b> </td>
			</tr>
			
			 '; 
	  
      $output .= "</table></div>"; 

		$output .= '
		
		<div class="modal-footer">
			<a  href="ClaimPrint.php?user_id='.$uid.'" type="button" value="Print this page" class="btn btn-primary">CETAK</a>
			<button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
		</div>
		
		';
      echo $output;  
 }  
 ?>

