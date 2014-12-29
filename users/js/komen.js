$(function() {
	$("#simpanKomen").click(function(){
		var name = $("#pembuat").val();
		var idIssue = $("#idIssue").val();
		var tgl = $("#tgl").val();
		var komen = $("#isiKomen").val();
		var dataString = 'pembuat='+ name + '&idIssue=' + idIssue + '&tgl=' + tgl + '&komen=' + komen;
		if(komen==''){
			alert('Please Give Valid Details');
		}
		else{
			//$("#flash").show();
			//$("#flash").fadeIn(400).html('<img src="ajax-loader.gif" />Loading Comment...');
			$.ajax({
				type: "POST",
				url: "simpan-komen.php",
				data: dataString,
				cache: false,
				success: function(html){
				$("ul#update").append(html);
				$("ul#update li:last").fadeIn("slow");
				document.getElementById('isiKomen').value="";
				location.reload();
				//$("#flash").hide();
				}
			});
		}return false;
}); });
