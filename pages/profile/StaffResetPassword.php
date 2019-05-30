<?php
include "../header/header.php";
?>
<div class="content-wrapper">
	<div class="content-header">
	<div class="container-fluid">
	  <div class="row mb-2">
		<div class="col-sm-6">
		  <h1 class="m-0 text-dark">TUKAR KATALALUAN</h1>
		</div>
	  </div>
	</div>
	</div>

<?php
if(isset($_POST['submit']))
{ 

$userid = $_SESSION['user_id'];

$currPass=$_POST['currentPassword'];
$newPass=$_POST['newPassword'];

if (count($_POST) > 0) 
{
    $result = mysqli_query($conn, "SELECT user_id, user_password FROM user WHERE user_id='$userid'" );
    $row = mysqli_fetch_array($result);
    if ($currPass == $row['user_password']) 
	{
        mysqli_query($conn, "UPDATE user SET user_password='$newPass' WHERE user_id='$userid'" );
		mysqli_query($conn, "UPDATE login_user SET user_password='$newPass' WHERE user_id='$userid'" );
		
        //echo $message = "Password Changed";
		echo ("<SCRIPT LANGUAGE='JavaScript'>
		window.alert('BERJAYA Tukar Katalaluan!')
		window.location.href='StaffInfoView.php'
		</SCRIPT>");
		exit();	
		
        
    } 
	else
        //echo $message = "Current Password is not correct";
		echo ("<SCRIPT LANGUAGE='JavaScript'>
		window.alert('Kata Laluan Lama SALAH!')
		window.location.href='StaffResetPassword.php'
		</SCRIPT>");
		exit();		
}


}
?>

    <section class="content" >
	
		<div class="row">
			<div class="col-3"></div>
			<div class="col-6">
				<div class="card">
					<div class="card card-primary">
						<div class="card-header">
							<h3 class="card-title">Tukar Kata Laluan</h3>
						</div>
					</div>
					
					<div class="card-body">
						<form role="form" method="post" action="">
							
								
							<div class="row">
								<div class="col-4">
									<label>Kata Laluan Lama</label>
								</div>
								<div class="col-8">
									<input type="password" class="form-control" name="currentPassword" required>
								</div>
							</div>
							<br>
							
							<div class="row">
								<div class="col-4">
									<label>Kata Laluan Baru</label>
								</div>
								<div class="col-8">
									<input type="password" class="form-control" name="newPassword" required>
								</div>
							</div>
							<br>
							
							<div class="row">
								<div class="col-4">
									<label>Pengesahan Kata Laluan Baru</label>
								</div>
								<div class="col-8">
									<input type="password" class="form-control" name="confirmPassword" required>
								</div>
							</div>
							<br>
							
							<p class="pull-right">
								<a href="javascript:lupaKatalaluan(1)">Lupa Katalaluan</a>
							</p>
							<br>
							<br>
							
							<div align="center" class="col-12">
								<button type="submit" class="btn btn-primary" name="submit" id="submit_btn">HANTAR</button>
							</div>
							
						</form>
					</div>
				</div>
			</div>
        </div>
	
    </section>

</div>

<!--
<div class="modal fade" id="lupaKatalaluanModal" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title text-center" id="defaultModalLabel">Lupa Katalaluan</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" id="lupaKatalaluan" ></div>
		</div>
	</div>
</div>									

<script type="text/javascript">
	function lupaKatalaluan(id)
	{	
		var user_id = id; 
		$.ajax({  
		url:"src/lupaKatalaluan.php",  
		method:"post",  
		data:{user_id:user_id},  
		success:function(data){  
			$('#lupaKatalaluan').html(data);  
			$('#lupaKatalaluanModal').modal("show");  
	}  
		}); 
									
	}
</script>
-->

<?php
	include "../footer/footer.php"
?>


<script>
function validatePassword() {
var currentPassword,newPassword,confirmPassword,output = true;

currentPassword = document.frmChange.currentPassword;
newPassword = document.frmChange.newPassword;
confirmPassword = document.frmChange.confirmPassword;

if(!currentPassword.value) {
currentPassword.focus();
document.getElementById("currentPassword").innerHTML = "required";
output = false;
}
else if(!newPassword.value) {
newPassword.focus();
document.getElementById("newPassword").innerHTML = "required";
output = false;
}
else if(!confirmPassword.value) {
confirmPassword.focus();
document.getElementById("confirmPassword").innerHTML = "required";
output = false;
}
if(newPassword.value != confirmPassword.value) {
newPassword.value="";
confirmPassword.value="";
newPassword.focus();
document.getElementById("confirmPassword").innerHTML = " Tidak Padan";
output = false;
} 	
return output;
}
</script>

<!--
<script>
$(function () {
  'use strict'

  var ticksStyle = {
    fontColor: '#495057',
    fontStyle: 'bold'
  }

  var mode      = 'index'
  var intersect = true

  var $visitorsChart = $('#visitors-chart')
  var visitorsChart  = new Chart($visitorsChart, {
    data   : {
      labels  : ['JAN','FEB','MAC','APR','MEI','JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'],
      datasets: [{
        type                : 'line',
        data                : [
		10,		],
        backgroundColor     : 'transparent',
        borderColor         : '#007bff',
        pointBorderColor    : '#007bff',
        pointBackgroundColor: '#007bff',
        fill                : false
        // pointHoverBackgroundColor: '#007bff',
        // pointHoverBorderColor    : '#007bff'
      },
        {
          type                : 'line',
          data                : [60, 80, 70, 67, 80, 77, 100],
          backgroundColor     : 'tansparent',
          borderColor         : '#ced4da',
          pointBorderColor    : '#ced4da',
          pointBackgroundColor: '#ced4da',
          fill                : false
          // pointHoverBackgroundColor: '#ced4da',
          // pointHoverBorderColor    : '#ced4da'
        }]
    },
    options: {
      maintainAspectRatio: false,
      tooltips           : {
        mode     : mode,
        intersect: intersect
      },
      hover              : {
        mode     : mode,
        intersect: intersect
      },
      legend             : {
        display: false
      },
      scales             : {
        yAxes: [{
          // display: false,
          gridLines: {
            display      : true,
            lineWidth    : '4px',
            color        : 'rgba(0, 0, 0, .2)',
            zeroLineColor: 'transparent'
          },
          ticks    : $.extend({
            beginAtZero : true,
            suggestedMax: 200
          }, ticksStyle)
        }],
        xAxes: [{
          display  : true,
          gridLines: {
            display: false
          },
          ticks    : ticksStyle
        }]
      }
    }
  })
})
</script>
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true
    });
  });
</script>
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example3').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true
    });
  });
</script>
-->
