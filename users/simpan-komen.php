<?php
include '../asset/config.php';
if($_POST)
{
	$pembuat=$_POST['pembuat'];
	$idIssue=$_POST['idIssue'];
	$tgl=$_POST['tgl'];
	$komen=$_POST['komen'];
	$aktifitas = 3;

//panggil waktu
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

	mysql_query("INSERT INTO comment (id_issue,
									pembuat,
									komen,
									date_posting) 
								VALUES (
									'$idIssue',
									'$pembuat',
									'$komen',
									'$waktu')") or die(mysql_error());

	mysql_query("INSERT INTO activity(username, diterima, jenis_aktifitas, aktifitas, waktu )
				SELECT '$pembuat', username, '$aktifitas', '$idIssue', '$waktu'
				FROM users");
}
else { }
?>

<li class="media-list">
	<div class="media-body">
  		<h4 class="media-heading"><?= $pembuat ;?></h4>
  		<p><?= $komen;?></p>
  		<span><?= $tgl ;?></span>
  	</div>
  	<hr>
</li>
