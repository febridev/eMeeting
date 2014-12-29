<?php
include '../asset/config.php';
session_start();

$pembuat = $_SESSION['namauser'];

$id_issue = $_GET['id_issue'];
$aktifitas = 4;

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


$direkhalaman = mysql_query("SELECT * FROM issue WHERE id_issue = '$id_issue'");
$ambilIdagenda = mysql_fetch_array($direkhalaman);

$updateIssue = mysql_query("UPDATE issue SET status = 21, date_posting = '$waktu' WHERE id_issue = '$id_issue'")or die(mysql_error());
$updateActivity= mysql_query("INSERT INTO activity(username, diterima, jenis_aktifitas, aktifitas, waktu )
				SELECT '$pembuat', username, '$aktifitas', '$id_issue', '$waktu'
				FROM users")or die(mysql_error());

if($updateIssue){
	//echo "berhasil didelete";//
	header("location:../users/detil_agenda.php?id=".$ambilIdagenda['id_agenda']);
}else{
	echo "gagal";
}
?>
