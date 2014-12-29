<?php
include "../asset/config.php";

$pembuat = $_REQUEST['pembuat'];
$judul = $_REQUEST['judul'];
$keterangan = $_REQUEST['keterangan'];
$model = $_REQUEST['opt'];
$tgl = date('y-m-d');
$cekjumlah = $_REQUEST['jumlahcek'];
$ndokumen = $_REQUEST['no-dokumen'];

//mengambil nilai waktu;
$dat_server = mktime(date("G"), date("i"),
								date("s"), date("n"), date("j"), date("Y"));
		//echo "Waktu Server (US):".date("H:i:s",$dat_server);

		$diff_gmt = substr(date("O",$dat_server),1,2);
		$datdif_gmt = 60 * 60 * $diff_gmt;

if (substr(date("O",$datdif_gmt),0,1) == '+') {
	$dat_gmt = $dat_server - $datdif_gmt;
} else {
	$dat_gmt = $dat_server + $datdif_gmt;
}
//echo "WAKTU GMT:".date("H:i:s",$dat_gmt);

$datdif_id = 60 * 60 * 7;
$dat_id = $dat_gmt + $datdif_id;

//echo "Waktu Indonesia".date("H:i:s",$dat_id);

	$waktu = date("Y-m-d H:i:s",$dat_id);


if ($model == "public") {		
	$model = 10;
	$eksInput = mysql_query("INSERT INTO agenda (judul, description, date_posting, jenis, pembuat) VALUES (
											'$judul',
											'$keterangan',
											'$waktu',
											'$model',
											'$pembuat')"
						) or die(mysql_error());
	$detilInput = mysql_query("INSERT INTO detil_agenda(id_agenda, id_user)
								SELECT '$ndokumen',id_user
								FROM users")or die(mysql_error());						
}

elseif ($model == "private") {
	$model = 11;
	$eksInput = mysql_query("INSERT INTO agenda (judul, description, date_posting, jenis, pembuat) VALUES (
											'$judul',
											'$keterangan',
											'$waktu',
											'$model',
											'$pembuat')"
						) or die(mysql_error());
		for ($i=0; $i <$cekjumlah ; $i++) { 
			$adduser=$_POST['nama'][$i];
			$detilInput = mysql_query("INSERT INTO detil_agenda(id_agenda, id_user) VALUES (
												'$ndokumen',
												'$adduser')")or die(mysql_error());						
			
		}
}
header('location:../users/index.php?tab=1');
?>
