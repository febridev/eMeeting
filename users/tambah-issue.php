<?php
include"../asset/config.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
	<script type="text/javascript" src="js/menu.js"></script>
</head>
<body>
	<?php
		$username = $_SESSION['namauser'];
		$agendaid = $_GET['idAgenda'];
	?>
	<div id="div-kiri">
		<img src="../asset/img/user60.svg" alt="">
	</div>
	<div id="tengah">---</div>
	<div id="div-kanan">
		<form action="simpan-issue.php" name="form-issue" id="form-issue" method="post">
			<div class="form-group">
				<input type="text" id="judul-issue" name="judul-issue" class="form-control" Placeholder="Judul" required>
				<input type="hidden" id="id_agenda" name="id_agenda"  value="<?= $agendaid ;?>">
				<input type="hidden" id="pembuat"  name="pembuat" value="<?= $username; ?>">
			</div>
			<div class="form-group">
				<textarea id="komen-issue" name="komen-issue" class="form-control" Placeholder ="Silakan Isi Komentar" required></textarea>
				<p id="dragnDrop">Drag N Drop Image Upload</p>
			</div>

			<div class="form-group">
				<button id="simpan-comment" class="btn btn-success">Simpan Issue</button>
			</div>
			
		</form>
		
	</div>
	
</body>
</html>
