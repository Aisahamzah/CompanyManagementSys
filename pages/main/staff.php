<?php
include "../../session.php";

//hanya boss je boleh masuk
if ((isset($_SESSION['user_position']) && $_SESSION['user_position'] != 'Staff')) {
  header ("Location: $unauthorized_url");
}

include "../header/header.php";
include_once("../../connection/connection.php");

$userid = $_SESSION['user_id'];

$query = "	SELECT * FROM user WHERE user_id = $userid";
$result = mysqli_query($conn,$query); 
$row = mysqli_fetch_array($result);

$query6 = "	SELECT * FROM leave_info WHERE user_id = $userid";
$result6 = mysqli_query($conn,$query6);
$rows = mysqli_fetch_array($result6);

$query5="Select count(claim_id) from claim where user_id = $userid";
$result5=mysqli_query($conn,$query5) or die("Query failed");
$rows5 = mysqli_fetch_array($result5);
$jumlahTuntutan=$rows5[0];

$currMonth = date('m');
						$mth = $currMonth-1;
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
            $row = mysqli_fetch_array($result);

?> 
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0 text-dark">Dashboard (Staff)</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Dashboard v3</li>
      </ol>
    </div><!-- /.col -->
  </div><!-- /.row -->
</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
<div class="container-fluid">
  <!-- Small boxes (Stat box) -->
  <div class="row">
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
          <h3>
          <?php echo $row ['user_id']; ?>
          </h3>

          <p>Staff_id</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
        <a href="../profile/StaffInfoView.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
          <h3>
          <?php echo $rows['leave_remaining'];?>
          </h3>

          <p>Baki Cuti</p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
        <a href="../leave/LeaveFormForStaff.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
     <!-- ./col -->
    <div class="col-lg-3 col-6">
         <!-- small box -->
         <div class="small-box bg-info">
          <div class="inner">
            <h3>
            <?php echo $jumlahTuntutan;?>
            </h3>
  
            <p><i>Claim</i></p>
          </div>
          <div class="icon">
            <i class="ion ion-pie-graph"></i>
          </div>
          <a href="../claim/ClaimStaffStatus.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>
              <?php echo $row["salary_monthly"]; ?>
              </h3>
    
              <p>Gaji</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="../payroll/Payroll.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
    </div>
  </div>
  <!-- /.row -->
  <!-- Main row -->
  <div class="row">
      </div>
      <!-- Calendar -->
      <div class="card bg-success-gradient">
        <div class="card-header no-border">

          <h3 class="card-title">
            <i class="fa fa-calendar"></i>
            Calendar
          </h3>
          <!-- tools card -->
          <div class="card-tools">
            <!-- button with a dropdown -->
            <button type="button" class="btn btn-success btn-sm" data-widget="collapse">
              <i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-success btn-sm" data-widget="remove">
              <i class="fa fa-times"></i>
            </button>
          </div>
          <!-- /. tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
          <!--The calendar -->
          <div id="calendar" style="width: 100%"></div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </section>
    <!-- right col -->
  </div>
  <!-- /.row (main row) -->
</div><!-- /.container-fluid -->
<?php
include "../footer/footer.php"
?>