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
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ZnnManagement</title>
  <style>
      blink {
        animation: blinker 1.0s linear infinite;
        color: ##FFFFFF;
       }
      @keyframes blinker {  
        50% { opacity: 0; }
       }
       .blink-one {
         animation: blinker-one 1s linear infinite;
       }
    </style>
  <link rel="icon" href="../../dist/img/icon.png" type="image/x-icon">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../../plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="../../plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="../../plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="../../plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../../plugins/daterangepicker/daterangepicker-bs3.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables/dataTables.bootstrap4.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i
            class="fa fa-th-large"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../user/znnmanagement.php" class="brand-link">
      <img src="../../dist/img/icon.png" alt="Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">ZnnManagement</span>
    </a>
  

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">
			<?php
			 if($user_position == 'Boss' )
			 {
			?>
			Boss
			<?php
			 }
			 else if($user_position == 'Admin' )
			 {
			?>
			Admin
			<?php
			 }
			 else if($user_position == 'Staff' )
			 {
			?>
			Staff
			<?php
			 }
			?>
		  </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
		  <?php
			  if($user_position == 'Boss' )
			  {
		  ?>
          <li class="nav-item">
            <a href="../main/boss.php" class="nav-link">
              <i class="nav-icon fa fa-th"></i>
              <p>
                Dashboard Boss
              </p>
            </a>
          </li>
		  
		  <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-pie-chart"></i>
              <p>
				Senarai <i>Claim</i> Perubatan
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../medicalclaim/medicalBossHistory.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Senarai Perubatan Lain-Lain</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../medicalclaim/medicalBossHistoryAll.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Senarai Perubatan Terdahulu</p>
                </a>
              </li>
            </ul>
          </li>
		  
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-pie-chart"></i>
              <p>
              <i>Claim</i> Lain-Lain
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../claim/ClaimBoss.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Senarai <i>Claim</i> Lain-Lain</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../claim/ClaimAllList.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Senarai <i>Claim</i> Terdahulu</p>
                </a>
              </li>
            </ul>
          </li>
		  
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-pie-chart"></i>
              <p>
                Senarai Cuti Staff
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../leave/LeaveApprovalFromBoss.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Senarai Cuti Staff</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../leave/LeaveHistoryForAdminandBoss.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Senarai Cuti Staff Terdahulu</p>
                </a>
              </li>
            </ul>
          </li>
		  
          <li class="nav-item">
            <a href="../payroll/PayrollBoss.php" class="nav-link">
              <i class="nav-icon fa fa-table"></i>
              <p>
                Gaji Pekerja
              </p>
            </a>
          </li>
		  
		  <li class="nav-item has-treeview treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-file"></i>
              <p>
                Laporan
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../laporan/BossListStaff.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Laporan Senarai Staff</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../medicalclaim/medicalBossHistoryAll.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Laporan Senarai Perubatan Staff</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../leave/LeaveHostoryForAdminandBoss.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Laporan Cuti Staff</p>
                </a>
              </li><li class="nav-item">
                <a href="../claim/ClaimAllList.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Laporan <i>Claim</i> Staff</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../laporan/LaporanGajiStaff.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Laporan Senarai Gaji Staf</p>
                </a>
              </li>
            </ul>
          </li>
		  
		  <?php
			  }
			?>
			<?php
			  if($user_position == 'Admin' )
			  {
		  ?>
          <li class="nav-item">
            <a href="../main/admin.php" class="nav-link">
              <i class="nav-icon fa fa-th"></i>
              <p>
                Dashboard Admin
              </p>
            </a>
          </li>
		  

		  <li class="nav-item">
            <a href="../profile/AdminListStaff.php" class="nav-link">
              <i class="nav-icon fa fa-bars"></i>
              <p>Senarai Pekerja
			  </p>
			</a>
		  </li>
			
			<li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-pie-chart"></i>
              <p>
                Semak <i>Claim</i> Perubatan
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../medicalclaim/medicalAdminHistory.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Senarai Perubatan Lain-Lain</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../medicalclaim/medicalAdminHistoryAll.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Senarai Perubatan Terdahulu</p>
                </a>
              </li>
            </ul>
          </li>
			
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-pie-chart"></i>
              <p>
                <i>Claim</i> Lain-Lain
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../claim/ClaimAdmin.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Senarai <i>Claim</i> Lain-Lain</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../claim/ClaimAllList.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Senarai <i>Claim</i> Terdahulu</p>
                </a>
              </li>
            </ul>
          </li>
		  
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-pie-chart"></i>
              <p>
                Senarai Cuti Staff
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../leave/LeaveCheckForAdmin.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Senarai Cuti Staff</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../leave/LeaveHistoryForAdminandBoss.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Senarai Cuti Staff Terdahulu</p>
                </a>
              </li>
            </ul>
          </li>
		  
          <li class="nav-item">
            <a href="../payroll/PayrollAdmin.php" class="nav-link">
              <i class="nav-icon fa fa-file"></i>
              <p>
                Senarai Gaji Pekerja
              </p>
            </a>
          </li>
		  <?php
			  }
			?>
			<?php
			  if($user_position == 'Staff' )
			  {
		  ?>

<li class="nav-item">

            <a href="../main/staff.php" class="nav-link">
              <i class="nav-icon fa fa-th"></i>
              <p>
                Dashboard Staff
              </p>
            </a>
          </li>

          <li class="nav-item has-treeview treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-th"></i>
              <p>
                Profil Staff
				<i class="right fa fa-angle-left"></i>
              </p>
            </a>
			<ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../profile/StaffInfoView.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Papar Maklumat</p>
                </a>
              </li>
			  <li class="nav-item">
                <a href="../profile/StaffResetPassword.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Tukar Kata Laluan</p>
                </a>
              </li>
			 </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-pie-chart"></i>
              <p>
                Perubatan
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../medicalclaim/medicalStaff.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Borang <i>Claim</i> Perubatan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../medicalclaim/medicalStaffHistory.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Status <i>Claim</i> Perubatan</p>
                </a>
              </li>
            </ul>
          </li>
		  
           <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-tree"></i>
              <p>
              <i>Claim</i> Lain Lain
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../claim/claimStaff.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Borang <i>Claim</i> Staff</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../claim/claimStaffStatus.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Status <i>Claim</i></p>
                </a>
              </li>
            </ul>
          </li>
		  
		  
            <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-calendar"></i>
              <p>
                Cuti
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../leave/LeaveFormForStaff.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Mohon Cuti</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../leave/LeaveStatusForStaff.php" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Status Permohonan Cuti</p>
                </a>
              </li>
            </ul>
          </li>
		  
          <li class="nav-item">
            <a href="../payroll/Payroll.php" class="nav-link">
              <i class="nav-icon fa fa-file"></i>
              <p>
                Gaji
              </p>
            </a>
          </li>
		  <?php
			  }
			?>
		  <li class="nav-item">
            <a href="../../pages/user/logout.php" class="nav-link">
              <i class="nav-icon fa fa-sign-out"></i>
              <p>
                Log Keluar
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>