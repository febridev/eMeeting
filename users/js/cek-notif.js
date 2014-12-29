function cek_notif () {
	$.ajax({
		url: "cekNotifikasi.php",
		cache : false,
		success : function(msg){
			$("#jmlNotif").html(msg);
		}
	});
	var waktu = setTimeout("cek_notif()",3000);
}

$("document").ready(function(){
	cek_notif();
});
