<?php
include('../../backend/connection.php');
include('../../backend/auth/auth.php');
?>

<html>
<head>    
	<title>Login</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<link href="../../lib/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="../../lib/lib/datatables/DataTables-1.10.23/css/dataTables.bootstrap4.min.css" rel="stylesheet">
	<link href="../../lib/lib/datatables/FixedColumns-3.3.2/css/fixedColumns.bootstrap4.min.css" rel="stylesheet">
</head>
<body>

	<div style="padding-top: 60px;">	
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<div class="card">
					<div class="card-header text-white bg-success">
						<strong>Login</strong>
					</div>
					<div class="card-body">						
						<form method="post" action="login.php">
							<?php include('../../backend/auth/errors.php'); ?>
							<div class="form-group">
								<label>Username</label>
								<input type="text" name="username" class="form-control">
							</div>
							<div class="form-group">
								<label>Password</label>
								<input type="password" name="password" class="form-control">
							</div>
							<p>
								Belum punya akun? <a href="register.php">Daftar sekarang</a>
							</p>
							<div class="form-group">
								<button type="submit" class="btn btn-success w-100" name="login">Login</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="col-md-3"></div>
		</div>	
	</div>
</body>
</html>