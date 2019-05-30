<?php
include '../../connection/connection.php';

date_default_timezone_set('Asia/Kuala_Lumpur');
$currDay = date('D');
$currDate = date('d');
$currMonth = date('m');
$currYear = date('Y');
$currTime = date('l jS \of F Y h:i:s A');
$currFullDate = date('dmY');
$currFullDate2 = date('Y-m-d');
$currClock = date('H:i');
$clock = date('h:i:s A');
$year = date("y");

$user_id = $_SESSION['user_id'];
$user_position = $_SESSION['user_position'];


$id=$_GET['user_id'];
$tarikh = $_GET['date_monthly'];
$date = DateTime::createFromFormat('d/m/Y', $tarikh);
$tarikhs=$date->format('Y-m-d');

$query = "Select * from 
		  adminpayroll a 
		  inner join
		  payroll p 
		  on 
		  a.user_id = p.user_id 
		  inner join 
		  user u 
		  on 
		  u.user_id = p.user_id 
		  where 
		  p.user_id = '$id' 
		  and 
		  p.date_monthly= '$tarikhs'
		  group by date_monthly
		  ";
		  
$result = mysqli_query($conn, $query) or die("Query failed");
$today = date("d/m/Y");
?>

<link rel="stylesheet" href="../../plugins/bootstrap/css/bootstrap.min.css">
<font face="serif">
<div align = "center">
<h1> SLIP GAJI </h1>
</div>
<div align = "center">
<h5>ZNN Technology Centre Sdn Bhd</h5>
<p> No 3A & 3B, Jalan Pendidikan 8, </br>Taman Universiti, 81300 Skudai, Johor
</br>
07-595 3074 
</br> 
znntechsb@gmail.com </p>

</div>
</br>
<div class="card-body">
<form>

<div align="center">
<?php while($row = mysqli_fetch_array($result)){ ?>
<table border="0">

<tr>
<td>ID Pekerja </td>
<td>: </td>
<td><?php echo $row['user_id'] ?></td>
<td width="25%"></td>
<td>Jantina</td>
<td>: </td>
<td><?php echo $row['user_gender'] ?></td>
<td width="25%"></td>
<td>Bulan</td>
<td>: </td>
<td><?php 
					 $tarikh = $row["date_monthly"];
					 $date = DateTime::createFromFormat('Y-m-d', $tarikh);
		             $tarikh=$date->format('d/m/Y');
					 echo $tarikh; ?></td>

</tr>

<tr>
<td>Nama </td>
<td>: </td>
<td><?php echo $row['user_name'] ?></td>
<td width="25%"></td>
<td>Jenis Pekerja</td>
<td>: </td>
<td><?php echo $row['user_type'] ?></td>
</tr>

<tr>
<td>Jawatan</td>
<td>: </td>
<td><?php echo $row['user_position'] ?></td>
<td width="25%"></td>
<td>KWSP</td>
<td>: </td>
<td><?php 	$kwspMonthly = $row['kwsp_monthly'];
			echo $kwspMonthly ?>% </td>
<td width="25%"></td>
<td>SOKSO</td>
<td>: </td>
<td><?php 	$socsoMonthly = $row['socso_monthly'];
			echo $socsoMonthly ?>%</td>
</tr>



</table>
</br>

<table border="2">

<tr>
<td width = "10%"><b>Pendapatan</b> </td>
<td width = "10%"></td>
<td width = "10%"><b>Potongan</b></td>
<td width = "10%"></td>
</tr>

<tr>
<td>Gaji Pokok (RM)</td>
<td class="text-center"><?php 	$salary = $row['salary'];
								$salary= number_format($salary, 2, '.', '');
								echo $salary; ?> </td>
<td>KWSP Pekerja (RM)</td>
<td class="text-center"><?php 
								$kwsp = $salary * $kwspMonthly /100;
								$kwsp = number_format($kwsp, 2, '.', '');
								echo $kwsp;?> </td>
</tr>

<tr>
<td>Bonus (RM)</td>
<td class="text-center"><?php 
								$bonus = $salary * $row['payroll_bonus'] /100;
								$bonus = number_format($bonus, 2, '.', '');
								echo $bonus;?> </td>
<td>SOKSO Pekerja (RM)</td>
<td class="text-center"><?php 
								$sokso = $salary * $socsoMonthly /100;
								$sokso = number_format($sokso, 2, '.', '');
								echo $sokso;?> </td>
</tr>


<tr>
<td>Jumlah Pendapatan (RM)</td>
<td class="text-center"><?php 
								$totalPendapatan = 0;
								$totalPendapatan = ($salary + $bonus);
								$totalPendapatan =  number_format($totalPendapatan, 2, '.', '');
								echo $totalPendapatan  ?> </td>
<td>Jumlah Penolakan (RM)</td>
<td class="text-center"><?php 
								$totalPenolakan = 0;
								$totalPenolakan = ($kwsp + $sokso);
								$totalPenolakan =  number_format($totalPenolakan, 2, '.', '');
								echo $totalPenolakan ?>  </td>
</tr>

<tr>
<td></td>
<td></td>
<td><b>Gaji Bersih (RM)</b></td>
<td class="text-center"><?php 	$totalGaji = $totalPendapatan-$totalPenolakan;
								$totalGaji =  number_format($totalGaji, 2, '.', '');
								echo $totalGaji; ?>  </td>
</tr>



</table>
<?php } ?>

</div>

</form>



</font>
<div class="row mb-2" align="center">
 <div class="col-sm-12">
 <button class=" btn btn-sm btn-default d-print-none" type="button" name="print" onClick="window.print()">Cetak</button>
 <a href="Payroll.php" ><button class="btn btn-sm btn-default d-print-none" type="button" name="kembali" >Kembali</button></a>
 </div>
 </div>
</div>

