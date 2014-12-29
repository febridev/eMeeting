<?php
include"../asset/config.php";
session_start();
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
	<script type="text/javascript" src="js/cek-notif.js"></script>
	<script type="text/javascript" src="js/menu.js"></script>
	<script type="text/javascript" src="js/listIssue.js"></script>
</head>
<?php
		$id="";
		$username = $_SESSION['namauser'];
		$id = $_GET['id'];
		$panggil_agenda = mysql_query("SELECT a.*, b.*, c.* FROM users a, agenda b, detil_agenda c
										WHERE a.username = '$username' AND c.id_user = a.id_user AND b.id_agenda = '$id' 
										AND c.id_agenda = '$id'") or die(mysql_error());
		$listDetail = mysql_fetch_array($panggil_agenda);

		$updateActivity = mysql_query("UPDATE activity SET dibaca = 'Y'
		 					WHERE diterima = '$username' AND jenis_aktifitas = 2 ");
		$updateActivity2 = mysql_query("UPDATE activity SET dibaca = 'Y'
		 					WHERE diterima = '$username' AND jenis_aktifitas = 4 ");				
	?>
	<input type="hidden" value="<?= $id ;?>" id="idagenda">
<script>
		$(document).ready(function(id) {
			var id = $("#idagenda").val();
			$("#halaman").load('listIssueOpen.php?idAgenda='+id);
		});
	</script>
<header>
	<nav class="navbar navbar-default navbar-fixed-top">
		<div id="konten-header">
			<ul class="nav navbar-nav navbar-right">
				<li><a href="../users/index.php?tab=1"><i class="fa fa-user"></i> <?= $listDetail['username']; ?></a></li>
				<li> <a href="../users/activity-new.php"><i class="fa fa-bell-o"></i> Notification <span class="badge" id="jmlNotif"></span></a></li>
				<li><a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a></li>
			</ul>
		</div>
	</nav>
</header>
<body>
	<div class="subheader">
		<div class="sub-header">
			<ol class="breadcrumb">
				<li><i class="fa fa-book"></i> <a href="../users/index.php?tab=1"><?= $listDetail['username'];  ?></a></li>
				<li><a href=""><?= $listDetail['judul'];?></a></li>
			</ol>
		</div>

	</div>
	<div class="sub-header">
		<div id="subissue">
			<div>
				<form action="" id="new-issue">
					<button type= "button" class="btn btn-success" id="tmbh-issue" onclick="tambah_issue()"><i class="fa fa-plus"></i>  New Issue</button>
					<a href="javascript" class="btn btn-default"><i class="fa fa-trash"></i> Hapus Agenda</a>
				</form>

				<?php
					
					$cekOpenIssue = mysql_query("SELECT COUNT(id_issue) openissue FROM issue WHERE status = 20 AND id_agenda = '$id' ");
					$row1 = mysql_fetch_assoc($cekOpenIssue);

					$cekCloseIssue = mysql_query("SELECT COUNT(id_issue) closeissue FROM issue WHERE status = 21 AND id_agenda = '$id' "); 
					$row2 = mysql_fetch_assoc($cekCloseIssue);
				?>

				<ul class="nav nav-pills">
					<li class="active"><a href="#listopen" data-toggle="tab" id="openIssue" onclick="list_open(<?= $id ;?>)"><i class="fa fa-warning"></i> Open <span class="badge"><?= $row1['openissue']; ?></span></a></li>
					<li><a href="#listclose" data-toggle="tab" id="closedIssue" onclick="list_close(<?= $id ;?>)"><i class="fa fa-check"></i> Closed <span class="badge"><?= $row2['closeissue']; ?></span></a></li>
				</ul>
				
				
				<input type="hidden" id="id_agenda" value="<?= $id; ?>" name="id_agenda">
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">Issue / <?= $listDetail['judul'] ;?></div>
  			<div class="panel-body">
   		 		<div id="halaman">
   		
   		 		</div>
  			</div>
		</div>
	</div>	
</body>
</html>
