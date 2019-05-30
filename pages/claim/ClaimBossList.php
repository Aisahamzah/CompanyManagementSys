<?php  
 if(isset($_POST["claim_id"]))  
 {  
      $output = '';  
      $conn = mysqli_connect("localhost", "root", "", "znnmanagement");  
      $query = "SELECT * FROM claim c 
            JOIN user u 
			ON c.user_id = u.user_id WHERE u.user_id = '".$_POST["claim_id"]."' and  claim_status='Dalam Proses' ";  
      $result0 = mysqli_query($conn, $query);  
      
	  $count=1;
	  
		
	  
	
	  
	  $output .= '  
	  <form action="ClaimBoss.php" id="frmText" method="post">
      <div class="table-responsive">  
           <table id="example1" class="table table-bordered table-striped">
		   <tr>
		<th style="width: 10px"><input type="checkbox" name="check" value="Check" onclick="toggle(this)"</th>   
		<th> Id <i>Claim</i></th>
		<th>Tarikh <i>Claim</i></th>
		<th>Jenis <i>Claim</i></th>   
		<th>Lampiran <i>Claim</i></th>
		<th>Harga <i>Claim</i> </th>	
		</tr>		   
		   ';
		
		$total_price=0;		
		while($row = mysqli_fetch_array($result0))  
		{  
			$output .= '  
				<tr>  
					 <td><input type="checkbox" name="check_list[]" value= "'.$row["claim_id"].' "></td> 
					 <td width="10%">'.$row["claim_id"].'</td>  
					 <td width="30%">'.$row["claim_date"].'</td>  
					 <td width="70%">'.$row["claim_desc"].'</td>  
					 <td width="50%">'.$row["claim_attach"].'</td>  
					 <td width="50%">'.$row["claim_price"].'</td>  
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
			<button type="submit" name="terima" id="hantarTerima" value="terima" class="btn btn-success" >TERIMA</button>
			<button type="submit" name="tolak" id="hantarTolak" class="btn btn-danger" >TOLAK</button>
			<button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
		</div>
	</form>
	  
	  ';  
      echo $output;  
 }  
 ?>
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
$('#hantarTerima').click(function () {
				var checked = $("#frmText input:checked").length;
			if (checked<=0) {
				alert('Sila Tanda Sebelum Hantar');
				return false;
			}
			});
			
			$('#hantarTolak').click(function () {
				var checked = $("#frmText input:checked").length;
			if (checked<=0) {
				alert('Sila Tanda Sebelum Hantar');
				return false;
			}
			});
</script>



















































 