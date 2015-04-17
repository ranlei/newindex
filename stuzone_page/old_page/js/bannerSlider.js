/*
 *core js
 *@project stuzone
 *@version 2.0
 *@author c1avie (www.c1avie.com)
 *@copyright bitworkshop
 */
$(document).ready(function() {
	var curr = 0;
	$(".trigger").each(function(i){
		$(this).click(function(){
			curr = i;
			$(".banner-img a").eq(i).fadeIn("slow").siblings("a").hide();
			$(".banner-word").eq(i).fadeIn("slow").siblings(".banner-word").hide();
			$(this).siblings(".trigger").removeClass("img-curr").end().addClass("img-curr");
			return false;
		});
	});
	
	var pg = function(flag){
		if (flag) {
			if (curr == 0) {
				todo = 3;
			} 
			else {
				todo = (curr - 1) % 4;
			}
		} 
		else {
			todo = (curr + 1) % 4;
		}
		$(".trigger").eq(todo).click();
	};
	
	$(".prev").click(function(){
		pg(true);
		return false;
	});
	
	$(".next").click(function(){
		pg(false);
		return false;
	});
	
    var timer = setInterval(function(){
		todo = (curr + 1) % 4;
		$(".trigger").eq(todo).click();
	},3000);

	$(".banner-nav a").hover(function(){
			clearInterval(timer);
		},
		function(){
			timer = setInterval(function(){
				todo = (curr + 1) % 4;
				$(".trigger").eq(todo).click();
			},3000);			
		}
	);
});


