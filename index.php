<?php include "asset/config.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>E-Meeting</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="asset/css/style.css">
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
	<script type="text/javascript" src="asset/js/jquery.min.js"></script>
	<script type="text/javascript" src="asset/js/cek-login.js"></script>
</head>
<body>
	<div id="content" class="panel panel-default">
		<div class="panel-heading">Form Login</div>
		<div class="panel-body">
		<form action="login.php" id="login" name="login" type="POST">
			<div class="form-group">
				<label for="username">Username</label>
				<input type="text" id="username" name="username" class="form-control">
			</div>
			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" id="password" name="password" class="form-control">
			</div>
			<button type="button" class="btn btn-primary" id="btn-login"><i class="fa fa-key"></i> LOGIN</button>
		</form>
		<br>
		<div id="notif" class="alert alert-success" role="alert">Login Success</div>
		<div id="notif-salah" class="alert alert-danger" role="alert">Username or Password Wrong</div>
		</div>
	</div>
	
</body>
</html>
