<?php
include "../header/header.php";
?>

<div class="content-wrapper">
	<div class="content-header">
	<div class="container-fluid">
	  <div class="row mb-2">
		<div class="col-sm-6">
		  <h1 class="m-0 text-dark">PEKERJA</h1>
		</div>
	  </div>
	</div>
	</div>


<?php
		

		//$query = "SELECT user_id, user_name, user_phoneNum, user_email FROM user";
		//$result = mysqli_query($conn, $query) or die(mysql_error());
		
		//$userid = $_SESSION['user_id'];
		
		$query = "SELECT user_name,user_id,user_ic,user_phoneNum,user_gender,user_status,user_race,user_nationality,user_address,user_email,user_eContactName,user_eContactRelationship,user_eContactNum,user_type,user_position,date_startWork,salary FROM user";
		$result = mysqli_query($conn, $query) or die(mysql_error());
?>



<section class="content">
	<div class="card card-primary">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">SENARAI PEKERJA</h3>
            </div>

            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
				  <th class="text-center">Bil</th>
                  <th class="text-center" style="width: 80px">ID Pekerja</th>
                  <th class="text-center">Nama Pekerja</th>
                  <th class="text-center">No Telefon</th>
                  <th class="text-center" style="width: 80px">Emel</th>
                </tr>
                </thead>
                
				<tbody>
				
					<?php 
					$count=1;
					while($row = mysqli_fetch_array($result)){?>
						<tr>
							<td class="text-center"><?php echo $count++?></td>
							<td class="text-center" style="width: 80px">
								<b><a href="#modalBoss" data-toggle='modal' data-target='#modalBoss'
								data-staffname="<?php echo $row['user_name']?>" 
								data-id="<?php echo $row['user_id']?>"  
								data-ic="<?php echo $row['user_ic']?>" 
								data-telNum="<?php echo $row['user_phoneNum']?>" 
								data-jantina="<?php echo $row["user_gender"]?>" 
								data-status="<?php echo $row["user_status"]?>" 
								data-bangsa="<?php echo $row['user_race']?>" 
								data-warga="<?php echo $row['user_nationality']?>" 
								data-alamat="<?php echo $row['user_address']?>" 
								data-emel="<?php echo $row['user_email']?>" 
								data-waris="<?php echo $row['user_eContactName']?>"
								data-relay="<?php echo $row['user_eContactRelationship']?>" 
								data-wnum="<?php echo $row['user_eContactNum']?>" 
								data-jenis="<?php echo $row['user_type']?>" 
								data-pangkat="<?php echo $row['user_position']?>"
								data-start="<?php echo $row['date_startWork']?>" 
								data-gaji="<?php echo $row['salary']?>">
								<?php echo $row['user_id']?></a></b>
							</td>
							<td><?php echo $row["user_name"]; ?></td>
							<td class="text-center"><?php echo $row["user_phoneNum"]; ?></td>
							<td style="width: 80px"><?php echo $row["user_email"]; ?></td>
						</tr>
					<?php } ?>
				</tbody>
                
              </table>
			</div>
          </div>
		</div>
	  </div>
	</div>
</section>
</div>
<?php
	include "../footer/footer.php"
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



<!--MODAL POPOUT-->


<div class="modal fade bd-example-modal-lg" id="modalBoss" tabindex="-1" role="dialog" aria-labelledby="StaffInfoModal" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">MAKLUMAT PENUH STAFF</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  
      <div class="modal-body">

<?php

		$userid = $_SESSION['user_id'];
		//$userid= $_GET['id'];
		
		$query = "SELECT user_name,user_id,user_ic,user_phoneNum,user_gender,user_status,user_race,user_nationality,user_address,user_email,user_eContactName,user_eContactRelationship,user_eContactNum,user_type,user_position,date_startWork,salary 
		FROM user 
		WHERE user_id = '$userid'";
		$result = mysqli_query($conn, $query) or die(mysql_error());
?>

		<div class="card card-primary">
            <div class="card-header">
				<h3 class="card-title">MAKLUMAT PERIBADI PEKERJA</h3>
            </div>
		</div>
		
			<div class="card-body">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Nama</label>
							<input id='staffname' class='form-control' name='staffname' value='' type='text' disabled>
						</div>
					</div>
					
					<div class="col-md-6">
						<div class="form-group">
							<label>Id Pekerja</label>
							<input id='staffid' class='form-control' name='staffid' value='' type='text' disabled>
						</div>
					</div>
			  
					<div class="col-md-6">
						<div class="form-group">
							<label>No Kad Pengenalan</label>
							<input id='staffic' class='form-control' name='staffic' value='' type='text' disabled>
							
						</div>
					</div>

					<div class="col-md-6">	  
						<div class="form-group">
							<label>No Telefon</label>
							<input id='telnum' class='form-control' name='telnum' value='' type='text' disabled>
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label>Jantina</label>
							<input id='staffgender' class='form-control' name='staffgender' value='' type='text' disabled>
						
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label>Status</label>
							<input id='staffstatus' class='form-control' name='staffstatus' value='' type='text' disabled>
						
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label>Bangsa</label>
							<input id='staffrace' class='form-control' name='staffrace' value='' type='text' disabled>
						
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label>Warganegara</label>
							<input id='staffnationality' class='form-control' name='staffnationality' value='' type='text' disabled>
						
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label>Alamat</label>
							<input type="hidden" name="staffadds">
							<textarea class="form-control" name="staffadds" id="staffadds" rows="3" value='' disabled></textarea>
							
						</div>
					</div>
				  
					<div class="col-md-6"> 
						<div class="form-group">
							<label for="exampleInputEmail1">Emel</label>
							<input id='staffemail' class='form-control' name='staffemail' value='' type='email' disabled>
						
						</div>
					</div>
				</div>
            </div>

		<div class="card card-primary">
            <div class="card-header">
				<h3 class="card-title">MAKLUMAT WARIS</h3>
            </div>
		</div>	
		
			<div class="card-body">
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label>Nama Waris</label>
							<input id='ename' class='form-control' name='ename' value='' type='text' disabled>
						
						</div>
					</div>  
			  
					<div class="col-md-6">
						<div class="form-group">
							<label>Hubungan</label>
							<input id='erelay' class='form-control' name='erelay' value='' type='text' disabled>
						
						</div>
					</div>
			  
					<div class="col-md-6">				  
						<div class="form-group">
							<label for="exampleInputPassword1">No Telefon Waris</label>
							<input id='etelnum' class='form-control' name='etelnum' value='' type='text' disabled>
						
						</div>
					</div>
				</div>
			</div>

		
		<div class="card card-primary">
            <div class="card-header">
				<h3 class="card-title">MAKLUMAT PEKERJAAN PEKERJA</h3>
            </div>
		</div>

			<div class="card-body">
				<div class="row">
					<div class="col-md-7">
						<div class="form-group">
							<label>Jenis Pekerja</label>
							<input id='stafftype' class='form-control' name='stafftype' value='' type='text' disabled>
						
						</div>
					</div>
				
					<div class="col-md-5">
						<div class="form-group">
							<label>Pangkat</label>
							<input id='staffposition' class='form-control' name='staffposition' value='' type='text' disabled>
						
						</div>
					</div>

					<div class="col-md-7">
						<div class="form-group">
							<label>Tarikh Masuk Kerja</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fa fa-calendar"></i></span>
								</div>
								<input type="date" name="staffstart" id="staffstart" class="form-control" value='' disabled>
							</div>
						</div>
					</div>
				
					<div class="col-md-5">
						<div class="form-group">
							<label>Gaji Bersih</label>
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text">RM</span>
								</div>
								<input type="text" name="staffpay" id="staffpay" class="form-control" value='' disabled>
								<div class="input-group-append">
									<span class="input-group-text">.00</span>
								</div>
							</div>
						</div>
					</div>
				</div>
            </div>

      </div>
  
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
      </div>
	  
    </div>
  </div>
</div>

<!--
<script>
    $(document).ready(function () {
    $('#modalBoss').on('show.bs.modal', function (event) { // id of the modal with event
      var button = $(event.relatedTarget) // Button that triggered the modal
      var id = button.data('id') // Extract info from data-* attributes
      var name = button.data('name')
      var description = button.data('description')
      var type= button.data('type')
      var address = button.data('address')
      var country = button.data('country')
      var timezone = button.data('timezone')
      
	var name = button.data('staffname');
    var id = button.data('id');
    var ic = button.data('ic');
    var tel = button.data('telNum'); //tak display
    var jan = button.data('jantina');
    var sta = button.data('status');
    var bang = button.data('bangsa');
	var warga = button.data('warga');
	var alamat = button.data('alamat'); //tak display
	var emel = button.data('emel');
	var waris = button.data('waris');
	var warisHubungan = button.data('wHubungan'); //tak display
	var warisTel = button.data('wNum'); //tak display
	var jenis = button.data('jenis');
	var pangkat = button.data('pangkat');
	var startD = button.data('start');
	var gaji = button.data('gaji');
	  
	  // Update the modal's content.
	  var modal = $(this)
      modal.find('#staffname').val(name)
      modal.find('#staffid').val(id)
      modal.find('#staffic').val(ic)
      modal.find('#telnum').val(tel)
      modal.find('#staffgender').val(jan)
      modal.find('#staffstatus').val(sta)
      modal.find('#staffrace').val(bang)
	  modal.find('#staffnationality').val(warga);
      modal.find('#staffadds').val(alamat); //tak display
      modal.find('#staffemail').val(emel); 
      modal.find('#ename').val(waris);
      modal.find('#erelay').val(warisHubungan); //tak display
      modal.find('#etelnum').val(warisTel); //tak display
      modal.find('#stafftype').val(jenis);
	  modal.find('#staffposition').val(pangkat);
	  modal.find('#staffstart').val(startD);
	  modal.find('#staffpay').val(gaji);
    })
})
</script>
-->


<script>
  $('#modalBoss').on('show.bs.modal', function(e) {
    var name = $(e.relatedTarget).data('staffname');
    var id = $(e.relatedTarget).data('id');
    var ic = $(e.relatedTarget).data('ic');
    var tel = $(e.relatedTarget).data('telnum'); 
    var jan = $(e.relatedTarget).data('jantina');
    var sta = $(e.relatedTarget).data('status');
    var bang = $(e.relatedTarget).data('bangsa');
	var warga = $(e.relatedTarget).data('warga');
	var alamat = $(e.relatedTarget).data('alamat');
	var emel = $(e.relatedTarget).data('emel');
	var waris = $(e.relatedTarget).data('waris');
	var warisHubungan = $(e.relatedTarget).data('relay'); //tak display
	var warisTel = $(e.relatedTarget).data('wnum'); //tak display
	var jenis = $(e.relatedTarget).data('jenis');
	var pangkat = $(e.relatedTarget).data('pangkat');
	var startD = $(e.relatedTarget).data('start');
	var gaji = $(e.relatedTarget).data('gaji');

    var modal = $(this)  
      modal.find('#staffname').val(name)
      modal.find('#staffid').val(id)
      modal.find('#staffic').val(ic)
      modal.find('#telnum').val(tel)
      modal.find('#staffgender').val(jan)
      modal.find('#staffstatus').val(sta)
      modal.find('#staffrace').val(bang)
	  modal.find('#staffnationality').val(warga);
      modal.find('#staffadds').val(alamat); 
      modal.find('#staffemail').val(emel); 
      modal.find('#ename').val(waris);
      modal.find('#erelay').val(warisHubungan); //tak display
      modal.find('#etelnum').val(warisTel); //tak display
      modal.find('#stafftype').val(jenis);
	  modal.find('#staffposition').val(pangkat);
	  modal.find('#staffstart').val(startD);
	  modal.find('#staffpay').val(gaji);

	  $("#modalBoss").modal('show')
    });
</script>
