/*
 *core js
 *@project stuzone
 *@version 2.0
 *@author c1avie (www.c1avie.com)
 *@copyright bitworkshop
 */
$(document).ready(function() {
  //切换下拉菜单
  $("#drop-menu").hover(function() {
      $(this).addClass("drop-menu");
    },
    function() {
      $(this).removeClass("drop-menu");
    });
  
  /**
   *function: back-to-top,background toggle
   */
  var windowObj1 = $(window);
  var windowObj2 = $(window);
  var scroll_to_top = $("#scroll-to-top");
  scroll_to_top.hide();
  windowObj1.scroll(function() {
    if (windowObj1.scrollTop() > 600) {
      scroll_to_top.fadeIn(500);
    } else {
      scroll_to_top.fadeOut(500);
    }
  });
  scroll_to_top.click(function() {
    $('body,html').animate({
      scrollTop: 0
    }, 500);
    return false;
  });

  // windowObj2.scroll(function() {
  //     if(windowObj2.scrollTop() >= 0 ) {
  //       $("body").attr("class","");
  //     }
  //   	if(windowObj2.scrollTop() > 571 ) {
  //       $("body").attr("class","body-infor-bg");
  //   	}
  //   	if(windowObj2.scrollTop() > 814 ) {
  //       $("body").attr("class","body-vision-bg");
  //   	}
  //     if(windowObj2.scrollTop() > 1107 ) {
  //       $("body").attr("class","body-video-bg");
  //     }
  //     if(windowObj2.scrollTop() > 1431 ) {
  //       $("body").attr("class","body-market-bg");
  //     }
  //     if(windowObj2.scrollTop() > 1628) {
  //       $("body").attr("class","body-know-bg");
  //     }
  // });
});


$(function(){    
  　　var screenwidth,screenheight,mytop,getPosLeft,getPosTop;  
  　　screenwidth = $(window).width();    
  　　screenheight = $(window).height();    
  　　mytop = $(document).scrollTop();    
  　　getPosLeft = screenwidth/2 - 260;    
  　　getPosTop = screenheight/2 - 150;    
  　　$("#box").css({"left":getPosLeft,"top":getPosTop});   
    
  $(window).resize(function(){    
  　　screenwidth = $(window).width();    
  　　screenheight = $(window).height();    
  　　mytop = $(document).scrollTop();    
  　　getPosLeft = screenwidth/2 - 260;    
  　　getPosTop = screenheight/2 - 150;    
  　　$("#box").css({"left":getPosLeft,"top":getPosTop+mytop});    
  });    
  
　　$(window).scroll(function(){    
  　　screenwidth = $(window).width();    
  　　screenheight = $(window).height();    
  　　mytop = $(document).scrollTop();    
  　　getPosLeft = screenwidth/2 - 260;    
  　　getPosTop = screenheight/2 - 150;    
  　　$("#box").css({"left":getPosLeft,"top":getPosTop+mytop});    
　　});    
  
　　
  　　$("#box").fadeIn("fast");    
  　　$("body").append("<div id='greybackground'></div>");    
  　　var documentheight = $(document).height();    
  　　$("#greybackground").css({"opacity":"0.5","height":documentheight});        
  
　　$("#closeBtn").click(function() {   
  　　$("#box").hide();    
  　　$("#greybackground").remove();    
  　　return false;    
　　});    
    
});   