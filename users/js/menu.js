function tambah(){
	$("#btn-tambah").click(function(){
		window.location.href("../users/tambah-agenda.php");
	});
}

function tambah_issue(){
	$("#tmbh-issue").click(function(){
			var data_agenda = $("#id_agenda").val();
			$("#halaman").load("tambah-issue.php?idAgenda=" + data_agenda);
		});
}



function menu_notif(){
	$("#act1").click(function() {
		$("#isipanel").load("activity-issue.php");
	});
}

function menu_notif2(){
	$("#open").click(function() {
		$("#isipanel").load("activity-comment.php");
	});
}

function menu_notif3(){
	$("#close").click(function() {
		$("#isipanel").load("activity-closeIssue.php");
	});
}

function edit_profil(id_profil) {
	$("#editprofil").click(function(){
		window.location.replace("../users/editProfil.php?idprofil="+id_profil);
	});
}

$(document).ready(function(){
	menu_notif();
	menu_notif2();
	menu_notif3();
	tambah();
	tambah_issue();
	edit_profil();
	
})
