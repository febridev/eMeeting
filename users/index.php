<?php
include"../asset/config.php";
session_start();
//cek apakah user sudah login 
if(!isset($_SESSION['namauser'])){ 
            echo "Anda Harus Login Dulu.. redirecting\n";
			echo "<meta http-equiv=\"refresh\" content=\"1;url=../login.php\">\n";
// die("Anda belum login");//jika belum login jangan lanjut.. 
 //header('location:../login.php');

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>eMeeting</title>
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="../asset/css/style.css">
	<link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="../sweetalert/lib/sweet-alert.css">
	<script type="text/javascript" src="../asset/js/jquery.min.js"></script>
	<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/menu.js"></script>
	<script type="text/javascript" src="js/cek-notif.js"></script>
	<script type="text/javascript" src="../sweetalert/lib/sweet-alert.min.js"></script>
</head>
	<?php 
		$username=$_SESSION['namauser'];
		$query=mysql_query("SELECT users.*, jabatan.desc, departement.dept FROM users, jabatan, departement WHERE users.username='$username' 
				AND users.id_jabatan = jabatan.id_jabatan AND users.id_dept = departement.id_dept");

		$data=mysql_fetch_array($query);
	?>
<header>
	<nav class="navbar navbar-default navbar-fixed-top">
		<div id="konten-header">	
			<ul class="nav navbar-nav navbar-right">
				<li> <a href="../users/index.php?tab=1"><i class="fa fa-user"></i> <?= $data['username']; ?></a></li>
				<li> <a href="../users/activity-new.php"><i class="fa fa-bell-o"></i> Notification <span class="badge" id="jmlNotif"></span></a></li>
				<li><a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a></li>
			</ul>
		</div>
	</nav>
</header>
<body>
	
	<div id="isi-konten">
		<div id="detail-user">
			<img src="<?= $data['foto']; ?>" alt="Image User" width="50%">
			<h1>
				<span><?= $data['nm_lengkap']; ?></span>
				<span><small><?= $data['username']; ?></small></span>
			</h1>
			<hr>
			<ul>
				<li><i class="fa fa-briefcase"></i> <?= $data['dept']; ?></li>
				<li><i class="fa fa-users"></i> <?= $data['desc']; ?></li>
				<li><i class="fa fa-envelope"></i> <?= $data['email']; ?></li>
				<li><i class="fa fa-table"></i> Join uS</li>
			</ul>
			<button id="" class="btn btn-primary btn-lg"><i class="fa fa-gears"></i> Edit Profile</button>
			
		</div>
		<div id="list-agenda">
			<ul class="nav nav-tabs" id="myTabs">
				<li role="presentation" id="act" class="active"><a href="index.php?tab=1">Agenda</a></li>
				
			</ul>
			<div id="tab-konten">
				<?php include 'menu.php'; ?>
			</div>
		</div>
		<footer>eMeeting Namasindo Plas &copy2014 Beta Version</footer>
	</div>
</body>
</html>
