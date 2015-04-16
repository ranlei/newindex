$(document).ready(function(){

		$("#user_sub").click(function(){
			var user = $('#login_user').val();
			var pass = $('#login_pass').val();
			if(user==""){
				var jing = "<div class=\"alert alert-danger\"><a href=\"\" class=\"alert-link\">用户不能为空哦</a></div>";
				$("#user").focus();
				$('#msg').html(jing).fadeOut(5000);
				return false;
			}
			if(pass==""){
				var jing2 = "<div class=\"alert alert-danger\"><a href=\"#\" class=\"alert-link\">密码不能为空哦</a></div>";
				$("#pass").focus();
				$('#msg').html(jing2).fadeOut(5000);
				return false;	

			}

			$.ajax({
				type:"POST",
				// url:"http://localhost/newindex/index.php/admin_view/stu_login",
				url:"http://newindex.stuzone.com/index.php/admin_view/stu_login",
				dataType:"json",
				data:{user:user,pass:pass},
					
				success:function(data){
					if(data==user){
						location.href="info_list.html";
					}else{
						location.href="index.html";
					}
				}
			});
			$.ajax({
				type:"POST",
				// url:"http://localhost/newindex/index.php/admin_info/updateData",
				url:"http://newindex.stuzone.com/index.php/admin_info/updateData",
				dataType:"json",

				success:function(){
					console.log("update");
				}
			});
		});


});