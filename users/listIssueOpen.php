<?php
include"../asset/config.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	<?php 
   $id = $_REQUEST['idAgenda'];
  		 				$panggilIssue = mysql_query("SELECT * FROM issue WHERE id_agenda = '$id' AND status = 20");
						$cekIssue = mysql_num_rows($panggilIssue);
   		 				if ($cekIssue > 0) {  while ($dataIssue = mysql_fetch_array($panggilIssue)) {?>
   		 					<div class="list-group">
   		 						<a href="../users/detil_issue.php?isu=<?= $dataIssue['id_issue']; ?>" class="list-group-item">
   		 							 <h4 class="list-group-item-heading"><i class="fa fa-warning"></i> <?= $dataIssue['judul_issue']; ?></h4>
   		 							<p clas="list-group-item-text">Opened By <?= $dataIssue['pembuat']; ?> Date Post <?= $dataIssue['date_posting']; ?></p>
   		 						</a>
   		 					</div>
   		 				<?php } 
   		 					} else { ?>
   		 				<div class="rata-tengah">
   		 					<i class="fa fa-warning fa-4x"></i>
   		 				</div>
   		 				<div class="rata-tengah">
   		 					<h3>Selamat Datang Di Issue</h3>
   		 					<h4>Silakan Tambah Issue Dengan Klik Tombol New Issue</h4>
   		 				</div>
   		 				<?php } ?>
</body>
</html>
