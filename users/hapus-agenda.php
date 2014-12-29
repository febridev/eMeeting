<?php
include '../asset/config.php';

$id_agenda = $_GET['id_agenda'];

$hapus= mysql_query("DELETE FROM agenda WHERE id_agenda='$id_agenda'");
$hapus1= mysql_query("DELETE FROM detil_agenda WHERE id_agenda='$id_agenda'");

if($hapus AND $hapus1){
	//echo "berhasil didelete";//
	header('location:../users/index.php?tab=1');
}else{
	echo "gagal";
}
?>
