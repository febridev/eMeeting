<?php
include"../asset/config.php";
session_start();
			$username = $_SESSION['namauser'];
	  		$cekNotifikasi = mysql_query("SELECT COUNT(waktu) aktif FROM activity WHERE username != '$username' AND diterima ='$username' AND dibaca = 'N' ORDER BY waktu");
			$rowNotifikasi = mysql_fetch_assoc($cekNotifikasi);
	  		echo $rowNotifikasi['aktif'];

?>	  		






	
	 			
