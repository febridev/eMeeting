function list_open(id){
	$("#openIssue").click(function(){
		$("#halaman").load("listIssueOpen.php?idAgenda="+id);
	});
	
}

function list_close(id){
	$("#closedIssue").click(function(){
		$("#halaman").load("listIssueClosed.php?idAgenda="+id);
	});
	
}
