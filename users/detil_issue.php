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
	<link rel="stylesheet" href="../sweetalert/lib/sweet-alert.css">
	<script type="text/javascript" src="../asset/js/jquery.min.js"></script>
	<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/menu.js"></script>
	<script type="text/javascript" src="js/cek-notif.js"></script>
	<script type="text/javascript" src="js/komen.js"></script>
	<script type="text/javascript" src="js/closeIssue.js"></script>
	<script type="text/javascript" src="../sweetalert/lib/sweet-alert.min.js"></script>
</head>
<?php
		$isu="";
		$username = $_SESSION['namauser'];
		$isu = $_GET['isu'];
		$tampilIssue = mysql_query("SELECT a.*, b.*, c.*, d.* FROM issue a, agenda b, detil_agenda c, users d
										WHERE a.id_issue = '$isu' AND a.id_agenda = b.id_agenda AND b.id_agenda = c.id_agenda 
										AND d.username = '$username'") or die(mysql_error());
		$listDetail = mysql_fetch_array($tampilIssue);
		
		$updateActivity = mysql_query("UPDATE activity SET dibaca = 'Y'
		 					WHERE diterima = '$username' AND aktifitas = '$isu'");		
	?>
<header>
	<nav class="navbar navbar-default navbar-fixed-top">
		<div id="konten-header">
			<ul class="nav navbar-nav navbar-right">
				<li><a href="../users/index.php?tab=1"><i class="fa fa-user"></i> <?= $username; ?></a></li>
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
				<li><i class="fa fa-book"></i> <a href="../users/detil_agenda.php?id=<?= $listDetail['id_agenda']; ?>"><?= $listDetail['judul'];  ?></a></li>
				<li><a href=""><?= $listDetail['judul_issue'];?></a></li>
			</ol>
		</div>
	</div>
	<div id="closeIssue">
		<a href="javascript: closeIssue(<?=$listDetail['id_issue']; ?>)" class="btn btn-warning" id="closed" onclick="closeIssue(<?=$listDetail['id_issue']; ?>)" ><i class="fa fa-ban"></i> Close Issue</a> 	
	</div>
	<div class="sub-header">
		<div class="panel panel-default">
			<div class="panel-heading">Issue / <?= $listDetail['judul'] ;?></div>
  			<div class="panel-body">
  				<div class="media">
  					<div class="media-left media-top">
  						<img src="<?= $listDetail['foto'] ;?>" alt="">	
  					</div>
  					
  					<div class="media-body">
  						<h4 class="media-heading"><?= $listDetail['judul_issue'] ;?></h4>
  						<p><?= $listDetail['komen'] ;?></p>
  					</div>
  					<hr>
  				</div>

				<?php 
					$tampilKomen = mysql_query("SELECT a.*, b.*, c.* FROM issue a, comment b, users c
										WHERE b.id_issue = '$isu' AND a.id_issue = b.id_issue AND c.username = b.pembuat") or die(mysql_error());
					while ($listkomen = mysql_fetch_array($tampilKomen)) {
				?>
				<div class="media">
  					<div class="media-left media-top">
  						<img src="<?= $listkomen['foto'] ;?>" alt="">	
  					</div>
  					
  					<div class="media-body">
  						<h4 class="media-heading"><?= $listkomen['pembuat'] ;?></h4>
  						<p>
  							<?= $listkomen['komen'] ;?>
  							<img src="<?= $listkomen['foto-komen'] ;?>" alt="">
  						</p>
  						<span><?= $listkomen['date_posting'] ;?></span>
  					</div>
  					<hr>
  				</div>
  				<?php } ?>

  				<div id="tambah-komen">
  					
  					<ul id="update" class="media-list">
  						<li style="display:none;">
  								
  						</li>
  					</ul>
  					<div class="media">
  						<div class="media-left media-top">
  							<img src="<?= $listDetail['foto'] ;?>" alt="">	
  						</div>
						<div class="media-body">
							<?= $username ;?> Comment
							<form action="#" method="post">
								<?php
									$tglHari= date('y-m-d')
								 ?>
								<div class="form-group">
									<input type="hidden" name="idIssue" id="idIssue" value="<?= $isu ;?>">
									<input type="hidden" name="pembuat" id="pembuat" value="<?= $username ;?>">
									<input type="hidden" name="tgl" id="tgl" value="<?= $tglHari; ?>">
									<textarea class="form-control" name="isiKomen" id="isiKomen" cols="100" rows="5"></textarea> 	
								</div>
								<div class="form-group">
									<input type="submit" name="simpanKomen" id="simpanKomen" class="btn btn-success" value="Simpan Komentar">		
								</div>
								
							</form>
							
						</div>
  					</div>
  					
  				</div>
  			</div>
		</div>
	</div>
</body>
</html>
