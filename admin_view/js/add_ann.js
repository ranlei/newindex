$(document).ready(function(){
	judge();

	$("#sub_con").click(function(){
		var content = $("#editor").html();
		var pic = $("input[name='pic']").val();
		var title = $("input[name='title']").val();
		$.ajax({
			type:"POST",
			url:"http://localhost:81/newindex/index.php/admin_view/stu_ann",
			// url:"http://newindex.stuzone.com/index.php/admin_view/stu_ann",
			async:true,
			data:{content:content,pic:pic,title:title},
			dataType:"html",
			error:function(){


				alert("fail");
			},
			success:function(){
				alert("添加成功");
				location.href="ann_list.html";
				
			}

		});


	});

});

