<?php  
 if(isset($_POST["med_id"]))  
 {  
		$output = '';  
		$conn = mysqli_connect("localhost", "root", "", "znnmanagement");  
		$query2 = 
					
				  "	SELECT * FROM medical m 
					JOIN user u 
					ON m.user_id = u.user_id 
					WHERE u.user_id = '".$_POST["med_id"]."' 
					and  med_check ='' 
					ORDER BY med_id DESC";
		$result2 = mysqli_query($conn,$query2)or die("Query failed");
						
		$output .= ' 
		<form action="medicalAdminHistory.php" method="post">		
		<table id="example1" class="table table-bordered table-striped">
							
								<tr>
									<th style="width: 90px">
										<input type="checkbox" name="check" value="check" onclick="toggle(this);"/>
									Check
									</th>
									<th>Med ID</th>
									<th>Tarikh Cuti</th>
									<th>Status Tuntutan</th>
									<th>Harga Perubatan (RM)</th>
									<th>Lampiran</th>  
								</tr>
									   
		   ';
		$count = 1;
		while($row = mysqli_fetch_array($result2))  
		{  	$tarikh = $row["med_date"]; 
			$tarSo = date("d-m-Y", strtotime($tarikh));
           $output .= '  
							
								<tr>
									<td ><input type="checkbox" name="checkbox[]" value="'.$row['med_id'].'"></td>
									<td>'.$row["med_id"]. '</td> 
									<td>'.$tarSo.'</td>
									<td>'.$row["med_status"].'</td>
									<td>'.$row["med_price"].'</td>
									<td> 
										<div class="custom-file">
											<a href=image/'.$row["med_attach_name"].' download>
												<button type="button" class="btn btn-block btn-primary">MUAT TURUN</button>
											</a>
										</div>
									</td> 
								</tr>
											
                ';  
		$count++;}  
		$output .= "</table>"; 

		$output .= '
						<button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
						<button name="submit" type="submit" class="bg-primary btn float-right">HANTAR</button>
						</form>
						';	
		
		echo $output;		
 }  
 ?>

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
	function toggle(source) {
	var checkboxes = document.querySelectorAll('input[type="checkbox"]');
	for (var i = 0; i < checkboxes.length; i++) {
	if (checkboxes[i] != source)
		checkboxes[i].checked = source.checked;
	}
	}
</script>