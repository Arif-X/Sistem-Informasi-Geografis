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
	<nav class="navbar navbar-expand-lg navbar-light bg-success">
		<strong><a class="navbar-brand text-white" href="../../">SIG</a></strong>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				
			</ul>
			<div class="my-2 my-lg-0">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<strong><a class="nav-link text-white" href="register.php">Register <span class="sr-only"></span></a></strong>
					</li>
					<li class="nav-item">
						<strong class="nav-link text-white">|<span class="sr-only"></span></strong>
					</li>
					<li class="nav-item active">
						<strong><a class="nav-link text-white" href="login.php">Login <span class="sr-only"></span></a></strong>
					</li>
				</ul>
			</div>
		</div>
	</nav>

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
							<div class="form-group">
								<button type="submit" class="btn btn-success" name="login" style="width:100%;">Login</button>
							</div>
							<p>
								Not yet a member? <a href="register.php">Sign up</a>
							</p>
						</form>
					</div>
				</div>
			</div>
			<div class="col-md-3"></div>
		</div>	
	</div>
</body>
</html>