function hapus(id_agenda, judul){
	$("#hapus-agenda").click(function(){
		swal({
  			title: "Are you sure Delete Agenda "+judul,
  			text: "You will not be able to recover this imaginary file!",
  			type: "warning",
  			showCancelButton: true,
  			confirmButtonColor: "#DD6B55",
 			confirmButtonText: "Yes, delete it!",
  			closeOnConfirm: false
		},
		function(){
			window.location.href="hapus-agenda.php?id_agenda="+id_agenda;
  			swal("Deleted!", "Your Agenda has been deleted.", "success");
		});
	});
		
}
