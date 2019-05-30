<?php
include "../header/header.php";
?>
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1 class="m-0 text-dark">Dashboard (Admin)</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="../main/admin.php">Menu</a></li>
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
    <form role="form">
          <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">MAKLUMAT PERIBADI PEKERJA</h3>
              </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-10">
				
				<div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control" placeholder="Nama Penuh Staff" disabled>
                </div>
				
				<div class="form-group">
                    <label>No Kad Pengenalan</label>
                    <input type="text" class="form-control" placeholder="Kad Pengenalan" disabled>
                  </div>
				  
				  <div class="form-group">
                    <label>Alamat</label>
                    <textarea class="form-control" rows="3" placeholder="Alamat Penuh" disabled></textarea>

                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Emel</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Emel" disabled>
                  </div>
				  
				  <div class="form-group">
                    <label>No Telefon</label>
                    <input type="text" class="form-control" placeholder="Nombor Telefon" disabled>
                  </div>
				  
                  <div class="form-group">
					<label>Jantina</label>
                    <input type="text" class="form-control" placeholder="Jantina" disabled>
				  </div>

                  <div class="form-group">
					<label>Status</label>
                    <input type="text" class="form-control" placeholder="Status" disabled>
				  </div>

                  <div class="form-group">
					<label>Bangsa</label>
                    <input type="text" class="form-control" placeholder="Bangsa" disabled>
				  </div>

				  <div class="form-group">
                    <label>Warganegara</label>
                    <input type="text" class="form-control" placeholder="Warganegara" disabled>
                  </div>
				
                <!-- /.form-group -->

                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-md-6">

                <!-- /.form-group -->

                <!-- /.form-group -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
        </div>
		
		<div class="card card-primary">
            <div class="card-header">
				<h3 class="card-title">MAKLUMAT WARIS</h3>
            </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-10">
				
				<div class="form-group">
                    <label>Nama Waris</label>
                    <input type="text" class="form-control" placeholder="Nama Waris" disabled>
                  </div>
				  
				  <div class="form-group">
                    <label>Hubungan</label>
                    <input type="text" class="form-control" placeholder="Contoh: Ibu/Bapa/Abang/Kakak/..." disabled>
                  </div>
				  
                  <div class="form-group">
                    <label for="exampleInputPassword1">No Telefon Waris</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="No Telefon Waris" disabled>
                  </div>
				
                <!-- /.form-group -->

                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-md-6">
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
        </div>

          <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">MAKLUMAT PEKERJAAN PEKERJA</h3>
              </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-10">
				
				<div class="form-group">
					<label>Jenis Pekerja</label>
                    <input type="text" class="form-control" placeholder="Jenis Pekerja" disabled>
				  </div>

				  <div class="form-group">
                    <label>Pangkat</label>
                    <input type="text" class="form-control" placeholder="Pangkat" disabled>
                  </div>

                <div class="form-group">
                  <label>Tarikh Masuk Kerja</label>

                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                    </div>
                    <input type="date" class="form-control" disabled>
                  </div>
                  <!-- /.input group -->
                </div>
				
				<div class="form-group">
                    <label>Gaji Bersih</label>
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text">RM</span>
						</div>
						<input type="text" class="form-control" disabled>
						<div class="input-group-append">
							<span class="input-group-text">.00</span>
						</div>
					</div>
                </div>
				
                <!-- /.form-group -->

                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-md-6">

                <!-- /.form-group -->

                <!-- /.form-group -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
        </div>



          <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">ID PEKERJA</h3>
              </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-10">
				
				<div class="form-group">
                    <label>Id Pekerja</label>
                    <input type="text" class="form-control" placeholder="Id Pekerja" disabled>
                  </div>
				  
                  <div class="form-group">
                    <label for="exampleInputPassword1">Kata Laluan</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Kata Laluan" disabled>
                  </div>
				
                <!-- /.form-group -->

                <!-- /.form-group -->
              </div>
              <!-- /.col -->
              <div class="col-md-6">
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
        </div>


    <div class="card-footer">
		<br><button type="submit" class="btn btn-block btn-primary" onclick="goBack()">KEMBALI</button>
    </div>
</form>
</div>
</section>
  <!-- /.row (main row) -->
</div><!-- /.container-fluid -->
	<?php
	include "../footer/footer.php"
	?>


