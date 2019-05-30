<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>znnManagement</title>
  <link rel="icon" href="dist/img/icon.png" type="image/x-icon">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
				<div class="login-box">
					<div class="login-logo">
						<a href="../../index.html">Znn<b>M</b>anagement</a>
					</div>
					<div class="card">
						<div class="card-body login-card-body">
						  <p class="login-box-msg">Log Masuk Dalam Sistem</p>

						  <form action="login.php" method="post">
							<div class="form-group has-feedback">
							  <input type="text" class="form-control" placeholder="Nama Pengguna" name="username">
							  <span class="fa fa-user form-control-feedback"></span>
							</div>
							<div class="form-group has-feedback">
							  <input type="password" class="form-control" placeholder="Kata Laluan" name="password">
							  <span class="fa fa-lock form-control-feedback"></span>
							</div>
							<div class="row">
							  <div class="col-2">
							  </div>
							  <!-- /.col -->
							  <div class="col-4">
								<button type="submit" class="btn btn-primary btn-block btn-flat">Log Masuk</button>
							  </div>
							  <div class="col-4">
								<button type="reset" class="btn btn-danger btn-block btn-flat">Reset</button>
							  </div>
							  <div class="col-2">
							  </div>
							  <!-- /.col -->
							</div>
						  </form>
						  <!-- /.social-auth-links -->
						</div>
						<!-- /.login-card-body -->
					</div>
				</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass   : 'iradio_square-blue',
      increaseArea : '20%' // optional
    })
  })
</script>
</body>
</html>
