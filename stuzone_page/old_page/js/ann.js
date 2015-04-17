/*通知模块的数据提取*/
$(document).ready(function() {
    //推荐
    $.ajax({
        type: "GET",
        contentType: "application/json",
        url: "http://newindex.stuzone.com/index.php/admin_view/getAllann",
        // url: "http://localhost/newindex/index.php/admin_view/getAllann",
        dataType: 'json',
        success: function(data) {
            var info="";
            $.each(data,function(i,n) {
                // recommend += "<li>" + '<a href="' + n['any_link_addr'] + '">' + n["any_title"] + "</a></li>";
                info +="<div class=\"col-sm-6 col-md-6\"><div class=\"thumbnail\"><div class=\"caption\"><blockquote><p>"+n['content']+"</p><small>发布时间：<time title=\"time\">"+n['create_date']+"</time></small></blockquote></div></div>   </div>";

            });
            $("#ann").html(info);
        }
    });
});
