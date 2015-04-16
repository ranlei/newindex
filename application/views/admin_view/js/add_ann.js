$(document).ready(function(){


	$("#sub_con").click(function(){
		// alert($("#editor").html());
		var content = $("#editor").html();
		$.ajax({
			type:"POST",
			url:"http://localhost/newindex/index.php/admin_view/stu_ann",
			async:true,
			data:{content:content},
			dataType:"html",
			error:function(){


				alert("fail");
			},
			success:function(){
				alert("添加成功");
				
			}

		});


	});




});

