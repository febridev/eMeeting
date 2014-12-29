
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>

	<h2>Agenda</h2>
	<div id="tambah">
		<a href="../users/tambah-agenda.php" id="btn-tambah" class="btn btn-success"><i class="fa fa-plus"></i> New Agenda</a>
		<hr>
	</div>
	<div>
		<?php
			$username=$_SESSION['namauser'];
			$query1= mysql_query("SELECT a.*, b.*, c.* FROM agenda a, users b, detil_agenda c 
						WHERE b.username = '$username' AND b.id_user = c.id_user AND a.id_agenda = c.id_agenda
						 ORDER BY a.date_posting DESC");
			while ($dagenda=mysql_fetch_array($query1)) {	
		?>
		<div class="detil-agenda">
			<h3><a href="../users/detil_agenda.php?id=<?= $dagenda['id_agenda']; ?>"><?= $dagenda['judul']; ?></a></h3>
			<p><?= $dagenda['description']; ?></p>
			<p><?= $dagenda['date_posting'];?></p>
			<hr>
		</div>
		<?php
			 
		 } ?>
	</div>
</body>
</html>
