$(document).ready(function(){
	$("#btn-login").click(function(){

		var action = $("#login").attr('action');
		var form_data = {
			username: $("#username").val(),
			password: $("#password").val(),
			//is_ajax: 1
		};

		$.ajax({
			type: "POST",
			url: action,
			data: form_data,
			success: function (response){
				if (response == "success") {
					document.getElementById('notif-salah').style.display = "none";
					$("#notif").fadeIn(1000);
					window.location.replace("users/index.php?tab=1");
				} else{
					$("#notif-salah").fadeIn(1000);
				};
				
			}	
		});
	});
});
