
/*通知模块的数据提取*/
$(document).ready(function() {
    //推荐
    $.ajax({
        type: "GET",
        contentType: "application/json",
        // url: "http://newindex.stuzone.com/index.php/admin_view/getAllann",
        url: "http://localhost:81/newindex/index.php/admin_view/getAllann",
        dataType: 'json',
        success: function(data) {
            var info="";
            $.each(data,function(i,n) {          
                info +="<div class=\"galleryitem\"><a rel=\"prettyPhoto\" title=\"Project Title Here\"><img class=\"portfolioitem\" src=\""+n['pic_path']+"\"></a><div class=\"portfolioitemtitleholder\"><h6 class=\"portfoliotitle\">"+n['title']+"</h6></div><p class=\"galleryitemdescription\">"+n['content']+"</p></div>"

            });
            $(".content").html(info);
        }
    });
});


