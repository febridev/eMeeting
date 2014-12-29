function closeIssue(id_issue){
	$("#closed").click(function(){
		swal({
  			title: "Are you sure Close This issue "+id_issue,
  			text: "You will not be able to recover this imaginary file!",
  			type: "warning",
  			showCancelButton: true,
  			confirmButtonColor: "#DD6B55",
 			confirmButtonText: "Yes, Close it!",
  			closeOnConfirm: false
		},
		function(){
			window.location.href="changeStatusIssue.php?id_issue="+id_issue;
  			swal("Closed!", "Your Issue has been closed.", "success");
		});
	});
		
}

$("document").ready(function(){
	closeIssue();
})
