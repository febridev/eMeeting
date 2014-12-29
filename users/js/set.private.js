$(document).ready(function(){
	$("#opt-private").click(function(){
		//var opt = $("#opt-private").val();
		//var noagenda = $("#no-dokument").val();
		$("#hasil").hide();
		$("#hasil2").show();
		$("#hasil2").load('list-user2.php');
	});	
});


		

	
