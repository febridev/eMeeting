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
	<script type="text/javascript" src="../asset/js/jquery.min.js"></script>
	<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/menu.js"></script>
	<script type="text/javascript" src="js/cek-notif.js"></script>
	<script type="text/javascript" src="js/set.private.js"></script>
</head>
<?php 
		$username=$_SESSION['namauser'];
		$query=mysql_query("SELECT users.*, jabatan.desc, departement.dept FROM users, jabatan, departement WHERE users.username='$username' 
				AND users.id_jabatan = jabatan.id_jabatan AND users.id_dept = departement.id_dept");

		$data=mysql_fetch_array($query);

		//menampilkan no document
		$query2 = mysql_query("SELECT id_agenda FROM agenda ORDER BY id_agenda DESC");
		$nodoc = mysql_fetch_array($query2);

		$no = $nodoc['id_agenda'] + 1;
	?>
<header>
	<nav class="navbar navbar-default">
		<div id="konten-header">
			<ul class="nav navbar-nav navbar-right">
				<li><a href="../users/index.php?tab=1"><i class="fa fa-user"></i> <?= $data['username']; ?></a></li>
				<li> <a href="../users/activity-new.php"><i class="fa fa-bell-o"></i> Notification <span class="badge" id="jmlNotif"></span></a></li>
				<li><a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a></li>
			</ul>
		</div>
	</nav>
</header>
<body>

	<div id="konten">
		<div>
			<form action="simpan-agenda.php" class="form-horizontal" role="form" id="form-agenda" name="form-agenda" method="post">
				<div class="form-group" style="width:20%;">
					<label for="pembuat">Dibuat</label>
					<input type="text" value="<?= $data['username']; ?>" class="form-control" readonly id="pembuat" name="pembuat">
				</div>

				<div class="form-group" style="width:20%;">
					<label for="no-dokumen">No Agenda</label>
					<input type="text" value="<?= $no ?>" class="form-control" readonly id="no-dokumen" name="no-dokumen" size="10%"> 
				</div>

				<div class="form-group" style="width:40%">
					<input type="text" id="judul" Placeholder="Judul Agenda" class="form-control" style="float:left;" name="judul">	
				</div>

				
				<div class="form-group" style="width:60%";>
					<label for="input-desc">Keterangan</label>
					<input type="text" id="input-desc" Placeholder="Keterangan" class="form-control" name="keterangan">
					
				</div>
				<hr>
				<div class="form-group">
					<label for="opt-public">
						<input type="radio" name="opt" value="public" id="opt-public" >
						<i class="fa fa-share-alt"></i> Public
					</label><br>
					<small>Public For Share</small>	
				</div>
				<div class="form-group">
					<label for="opt-private">
						<input type="radio" name="opt" value="private" id="opt-private">
						<i class="fa fa-lock"></i> Private	
					</label><br>
					<small>Private For Some People</small>
				</div>
				<div class="form-group" id="hasil2"></div>
				
				<hr>
				<div class="form-group">
					<button type="submit" class="btn btn-success btn-lg">Buat Agenda</button>
					<a href="../users/index.php?tab=1" class="btn btn-default btn-lg">Cancel</a>
				</div>
			</form>
		</div>
	</div>
</body>
</html>
