<?php
include "../asset/config.php";
$tab="";

if ($_REQUEST['tab']==1){
		include 'agenda.php';
	}
else if($_REQUEST['tab']==2){
	include 'activity.php';

}else{
		include 'agenda.php';
}

?>

