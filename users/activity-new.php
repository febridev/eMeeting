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
	<script>
		$(document).ready(function() {
			$("#isipanel").load("activity-issue.php");
		});
			
	</script>
	
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
	<div id="list-notifikasi">
		<div id="menu-activity">
			<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
				<?php
					$cekNotifikasi = mysql_query("SELECT COUNT(waktu) aktif FROM activity WHERE username != '$username' AND diterima ='$username' AND jenis_aktifitas = 3 AND dibaca = 'N' ORDER BY waktu");
						$rowNotifikasi = mysql_fetch_assoc($cekNotifikasi);
				?>
  				<div class="panel panel-default">
    				<div class="panel-heading" role="tab" id="headingOne">
      					<h4 class="panel-title">
        					<a data-toggle="collapse" id="act1" data-parent="#accordion" href="#commentIssue" aria-expanded="true" aria-controls="collapseOne" onclick="menu_notif()">
        						<i class="fa fa-bell"></i> Comment Notification <span class="badge" id="jmlNotif"><?= $rowNotifikasi ['aktif'] ;?></span>
        					</a>
      					</h4>
    				</div>
  				</div>
  				<div class="panel panel-default">
  					<?php
    					$cekNotifikasi1 = mysql_query("SELECT COUNT(waktu) aktifa FROM activity WHERE username != '$username' AND diterima ='$username' AND jenis_aktifitas = 2 AND dibaca = 'N' ORDER BY waktu");
						$rowNotifikasi1 = mysql_fetch_assoc($cekNotifikasi1);

						$cekNotifikasi2 = mysql_query("SELECT COUNT(waktu) aktifb FROM activity WHERE username != '$username' AND diterima ='$username' AND jenis_aktifitas = 4 AND dibaca = 'N' ORDER BY waktu");
						$rowNotifikasi2 = mysql_fetch_assoc($cekNotifikasi2);

						$cekNotifikasi3 = mysql_query("SELECT COUNT(waktu) aktifc FROM activity WHERE username != '$username' AND diterima ='$username' AND jenis_aktifitas = 5 AND dibaca = 'N' ORDER BY waktu");
						$rowNotifikasi3 = mysql_fetch_assoc($cekNotifikasi3);

						$notif1= $rowNotifikasi1['aktifa'];
						$notif2= $rowNotifikasi2['aktifb'];
						$notif3= $rowNotifikasi3['aktifc'];

						$ttlNotifikasi = $notif1 + $notif2 +$notif3;
	  						
    				?>
    				<div id="collapseListGroupHeading1" class="panel-heading" role="tab">
    					<h4 class="panel-title">
    						<a href="#collapseListGroup1" aria-controls="collapseListGroup1" aria-expanded="true" data-togle="collapse">
    							<i class="fa fa-bell"></i> Notification Issue <span class="badge" id="jmlNotif"><?= $ttlNotifikasi ;?></span>
    						</a>
    					</h4>
    				</div>
    				
    				<div id="collapseListGroup1" class="panel-collapse collapse in" aria-labelledby="collapseListGroupHeading1" role="tabpanel" aria-expanded="true" style="">
    					<ul class="list-group">
    						<li class="list-group-item"><a href="#openIssue" id="open" onclick="menu_notif2()">Open Issue Notification <span class="badge" id="jmlNotif"><?= $rowNotifikasi1['aktifa'] ;?></span></a></li>
    						<li class="list-group-item"><a href="#closeIssue" id="close" onclick="menu_notif3()">Close Issue Notification <span class="badge" id="jmlNotif"><?= $rowNotifikasi2['aktifb'] ;?></span></a></li>
    						<li class="list-group-item"><a href="#reOpenIssue" id="openA">re-Open Issue Notification <span class="badge" id="jmlNotif"><?= $rowNotifikasi3['aktifc'] ;?></span></a></li>
    					</ul>	
    				</div>
  				</div>
  			</div>
		</div>
		<div id="isi_activity">
			<div class="panel panel-default">
				<div class="panel-heading"><i class="fa fa-info-circle"></i> List Notification</div>
				<div class="panel-body">
					<div id="isipanel"></div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
