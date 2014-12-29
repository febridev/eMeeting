<?php
include "../asset/config.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" href="../asset/css/style.css">
</head>
<body>
	<div class="area-user">
	<?php
		$calluser=mysql_query("SELECT * FROM users");
		$indexcek=0;
		while ($data=mysql_fetch_array($calluser)) {
	?>
	<ul id="listUserAgenda">
		<li id="listUserAgenda"><input type="checkbox" value="<?= $data['id_user'];?>" id="nama[]" name="nama[]" >
			<span><?= $data['username']; ?></span>
		</li>
	</ul>

	<?php 
		$indexcek++;
		} 
	?>
	</div>
	<input type="hidden" id="jumlahcek" value="<?= $indexcek ?>" name="jumlahcek">
</body>
</html>
