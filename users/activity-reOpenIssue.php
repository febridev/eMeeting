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
	<title>Document</title>
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="../asset/css/style.css">
	<link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="../sweetalert/lib/sweet-alert.css">
	<script type="text/javascript" src="../asset/js/jquery.min.js"></script>
	<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/menu.js"></script>
	
</head>
<?php
	$username = $_SESSION['namauser'];
?>

<body>	
	 	<div class="panel-body">
	 			<?php 
			$username = $_SESSION['namauser'];
	  		$panggil_activity=mysql_query("SELECT a.*, b.*, c.* FROM activity a, issue b, activity_ver c WHERE a.username != '$username'
	  									AND a.diterima = '$username' AND a.jenis_aktifitas = 5 AND a.aktifitas = b.id_issue AND a.jenis_aktifitas = c.id_veractivity AND a.dibaca = 'N' ORDER BY waktu DESC");
	  		while ($listaktifitas=mysql_fetch_array($panggil_activity)) {?>	
	 			<div class="list-group">
	 				<a class="list-group-item" href="../users/detil_agenda.php?id=<?= $listaktifitas['id_agenda']; ?>">
	 					<span><i class="fa fa-bell-o"></i> <?= $listaktifitas['username'] ;?>&nbsp<?= $listaktifitas['ket_aktifitas'] ;?>&nbsp<?= $listaktifitas['judul_issue'] ;?>	
	 					<span>Pada : <?= $listaktifitas['waktu'];?></span>
	 				</a>
	 			</div>
	 			<?php }?>	
	 	</div>
	
</body>
</html>
