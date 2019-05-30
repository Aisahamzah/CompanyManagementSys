<?php

include "../../session.php";

//hanya boss je boleh masuk
if ((isset($_SESSION['user_position']) && $_SESSION['user_position'] != 'Boss')) {
  header ("Location: $unauthorized_url");
}

include "../header/header.php";
include_once("../../connection/connection.php");

$query = "SELECT COUNT(*) FROM user";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_array($result);
$jumlah_staff = $row[0];

$query_intern = "SELECT COUNT(*) FROM user WHERE user_type = 'intern'";
$result_intern = mysqli_query($conn,$query_intern);
$row_intern = mysqli_fetch_array($result_intern);
$jumlah_intern = $row_intern[0];

$query_cuti = "SELECT COUNT(*) FROM holiday WHERE leave_status='LULUS'";
$result_cuti = mysqli_query($conn,$query_cuti);
$row_cuti = mysqli_fetch_array($result_cuti);
$jumlah_cuti = $row_cuti[0];

$query_cuti_ditolak = "SELECT COUNT(*) FROM holiday WHERE leave_status='TIDAK LULUS'";
$result_cuti_ditolak = mysqli_query($conn,$query_cuti_ditolak);
$row_cuti_ditolak = mysqli_fetch_array($result_cuti_ditolak);
$jumlah_cuti_ditolak = $row_cuti_ditolak[0];

$query_medical = "SELECT COUNT(*) FROM medical";
$result_medical = mysqli_query($conn,$query_medical);
$row_medical = mysqli_fetch_array($result_medical);
$jumlah_perubatan = $row_medical[0];

$query_claim = "SELECT COUNT(*) FROM claim";
$result_claim = mysqli_query($conn,$query_claim);
$row_claim = mysqli_fetch_array($result_claim);
$jumlah_claim = $row_claim[0];

$query_payroll = "SELECT COUNT(*) FROM payroll";
$result_payroll = mysqli_query($conn,$query_payroll);
$row_payroll = mysqli_fetch_array($result_payroll);
$jumlah_gaji= $row_payroll[0];

$query_notifikasi ="SELECT COUNT(*) FROM claim WHERE claim_status='new'";
$result_notifikasi =mysqli_query($conn,$query_notifikasi);
$row_notifikasi=mysqli_fetch_array($result_notifikasi);
$jumlah_notifikasi=$row_notifikasi[0];

$today = date("D j  F  Y"); // 10 March, 2018

// chart open

$tarikh = date("Y-m-d"); 

$query_terima = "SELECT COUNT(*) FROM holiday WHERE leave_status='LULUS' AND leave_startDate='$tarikh'" ;
$result_terima = mysqli_query($conn,$query_terima);
$row_terima = mysqli_fetch_array($result_terima);
$jumlah_terima = $row_terima[0];

$query_tolak = "SELECT COUNT(*) FROM holiday WHERE leave_status='TIDAK LULUS' AND leave_startDate='$tarikh'" ;
$result_tolak = mysqli_query($conn,$query_tolak);
$row_tolak = mysqli_fetch_array($result_tolak);
$jumlah_tolak = $row_tolak[0];

$query_Cterima = "SELECT COUNT(*) FROM claim  WHERE claim_status='Terima' AND claim_date='$tarikh '" ;
$result_Cterima = mysqli_query($conn,$query_Cterima);
$row_Cterima = mysqli_fetch_array($result_Cterima);
$jumlah_Cterima = $row_Cterima[0];

$query_Ctolak = "SELECT COUNT(*) FROM claim WHERE claim_status='Tolak' AND claim_date='$tarikh'" ;
$result_Ctolak = mysqli_query($conn,$query_Ctolak);
$row_Ctolak = mysqli_fetch_array($result_Ctolak);
$jumlah_Ctolak = $row_Ctolak[0];

// chart close

mysqli_close($conn);

?> 
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0 text-dark">Dashboard (Boss)</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Dashboard v2</li>
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
          <h3><?php echo "$jumlah_staff" ?></h3>

          <p>Bilangan Staff</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
        <a href="../profile/AdminListStaff.php" class="small-box-footer">papar info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
          <h3><?php echo"$jumlah_intern" ?></h3>

          <p>Pelajar LI</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
        <a href="../profile/AdminListStaff.php" class="small-box-footer">papar info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
     <!-- ./col -->
    <div class="col-lg-3 col-6">
         <!-- small box -->
         <div class="small-box bg-info">
          <div class="inner">
            <h3>
            <?php echo("$jumlah_perubatan") ?>
            </h3>
  
            <p><i>Claim </i> Perubatan</p>
          </div>
          <div class="icon">
            <i class="ion ion-pie-graph"></i>
          </div>
          <a href="../medicalclaim/medicalBossHistory.php" class="small-box-footer">papar info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3><?php echo "$jumlah_claim" ?></h3>
    
              <p><i>Claim</i> Lain</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="..\claim\claimAllList.php" class="small-box-footer">papar info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-danger">
        <div class="inner">
          <h3><?php echo"$jumlah_cuti" ?></h3>

          <p>Cuti Diterima
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
        <a href="../leave/LeaveHistoryForAdminandBoss.php" class="small-box-footer">papar info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
      <div class="small-box bg-danger">
        <div class="inner">
          <h3>
          <?php echo"$jumlah_cuti_ditolak" ?>
          </h3>
          <p>Cuti Ditolak</p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
        <a href="../leave/LeaveHistoryForAdminandBoss.php" class="small-box-footer">papar info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-danger">
        <div class="inner">
          <h3>
          <?php echo"$jumlah_gaji" ?>
          </h3>

          <p>Senarai Pendapatan</p>
        </div>
        <div class="icon">
          <i class="ion ion-bag"></i>
        </div>
        <a href="../payroll/PayrollBoss.php" class="small-box-footer">papar info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-danger">
        <div class="inner">
          <h3><blink><?php echo"$jumlah_notifikasi" ?></blink></h3>

          <p><blink>Notifikasi</blink></p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
        <a href="../leave/LeaveApprovalFromBoss.php" class="small-box-footer">papar info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
  </div>
  <!-- /.row -->
  <!-- Main row -->
  <div class="row">
      </div>
      <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6">
 <!-- Calendar -->
 <div class="card bg-success-gradient">
              <div class="card-header no-border">

                <h3 class="card-title">
                  <i class="fa fa-calendar"></i>
                  Kalendar
                </h3>
                <!-- tools card -->
                <div class="card-tools">
                  <!-- button with a dropdown -->
                  <div class="btn-group">
                    <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">
                      <i class="fa fa-bars"></i></button>
                    <div class="dropdown-menu float-right" role="menu">
                      <a href="#" class="dropdown-item">Add new event</a>
                      <a href="#" class="dropdown-item">Clear events</a>
                      <div class="dropdown-divider"></div>
                      <a href="#" class="dropdown-item">View calendar</a>
                    </div>
                  </div>
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
           </div>

           <!-- solid sales graph -->
           <div class="col-md-6">
           <div class="card bg-info-gradient">
              <div class="card-header no-border">
                <h3 class="card-title">
                  <i class="fa fa-th mr-1"></i>
                  Status <i>Claim</i> dan Cuti
                </h3>

                <div class="card-tools">
                  <button type="button" class="btn bg-info btn-sm" data-widget="collapse">
                    <i class="fa fa-minus"></i>
                  </button>
                  <button type="button" class="btn bg-info btn-sm" data-widget="remove">
                    <i class="fa fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div  align="center">
                  <p class="d-flex flex-column" align="center">
                    <span class="text-bold text-lg"><?php echo"$today" ?></span>
                  </p>
                                    
                  </div>
                <!-- chart-open -->
                <div class="card-body">
                <div class="row">
                  <div class="col-6 col-mb-3 text-center">
                    <input type="text" class="knob" value="<?php echo"$jumlah_terima" ?>"data-width="100" data-height="100" data-fgColor="#87CEEB"
                           data-readonly="true">

                    <div class="knob-label"><b>Cuti Diterima =<?php echo"$jumlah_terima" ?> </b></div>
                  </div>
                  <!-- ./col -->
                  <div class="col-6 col-mb-3 text-center">
                    <input type="text" class="knob" value="<?php echo"$jumlah_tolak" ?>" data-width="100" data-height="100" data-fgColor="#87CEEB"
                           data-readonly="true">

                    <div class="knob-label"><b>Cuti Ditolak =<?php echo"$jumlah_tolak"?> </b></div>
                  </div>

                  <div class="col-6 col-mb-3 text-center">
                    <input type="text" class="knob" value="<?php echo"$jumlah_Cterima"?>" data-width="100" data-height="100" data-fgColor="#87CEEB"
                           data-readonly="true">

                    <div class="knob-label"><b><i>Claim</i> Diterima =<?php echo"$jumlah_Cterima"?> </b></div>
                  </div>

                  <div class="col-6 col-mb-3 text-center">
                    <input type="text" class="knob" value="<?php echo "$jumlah_Ctolak" ?>" data-width="100" data-height="100" data-fgColor="#87CEEB"
                           data-readonly="true">

                    <div class="knob-label"><b><i>Claim</i> Ditolak =<?php echo"$jumlah_Ctolak" ?> </b></div>
                  </div>
                  <!--chart close -->
                  <!-- ./col -->
            <!-- /.card -->
            
    </section>
    <!-- right col -->
  </div>
  <!-- /.row (main row) -->
</div><!-- /.container-fluid -->
<?php
include "../footer/footer.php"
?>