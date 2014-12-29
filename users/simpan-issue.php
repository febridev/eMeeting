<?php
include '../asset/config.php';

$judulIssue = $_POST['judul-issue'];
$commentIssue = $_POST['komen-issue'];
$tgl = date('y-m-d');
$pembuat = $_POST['pembuat'];
$idAgenda = $_POST['id_agenda'];
$aktifitas = 2;

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
//end panggil waktu

$jlnQuery = mysql_query("INSERT INTO issue (
											id_agenda,
											judul_issue,
											komen,
											date_posting,
											pembuat)
								VALUES(
										'$idAgenda',
										'$judulIssue',
										'$commentIssue',
										'$waktu',
										'$pembuat')"
					)or die(mysql_error());

mysql_query("INSERT INTO activity(username, diterima, jenis_aktifitas, aktifitas, waktu )
				SELECT '$pembuat', username, '$aktifitas', '$idAgenda', '$waktu'
				FROM users") or die(mysql_error());

header("location:../users/detil_agenda.php?id=".$idAgenda);
//echo "berhasil";

?>
