$(document).ready(function() {
    thisHost =  top.location.hostname; 
    console.log(thisHost);
    //推荐
    $.ajax({
        type: "GET",
        contentType: "application/json",
        url: "../index.php/admin_stuzone_api/getReco",
        dataType: 'json',
        success: function(data) {
            var recommend = "<ul>";
            $.each(data,function(i,n) {
                recommend += "<li>" + '<a href="' + n['any_link_addr'] + '">' + n["any_title"] + "</a></li>";
            });
            recommend += "</ul>";
            $(".recommend-details").append(recommend);
        }
    });

        //资讯
        $.ajax({
            type: "GET",
            contentType: "application/json",
            url: "http://newindex.stuzone.com/index.php/admin_stuzone_api/getInfo",
            dataType: 'json',
            success: function(data) {
                var infor = "<ul>";
                $.each(data,function(i,n) {
                    infor += "<li>" + '<a href="' + n['any_link_addr'] + '">' + n["any_title"] + "</a></li>";
                });
                infor += "</ul>";
                $(".infor-details").append(infor);
            }
        });

        //视觉
        $.ajax({
            type: "GET",
            contentType: "application/json",
            url: "http://newindex.stuzone.com/index.php/admin_stuzone_api/getVision",
            dataType: 'json',
            success: function(data) {
                var vision = "<ul>";
                $.each(data,function(i,n) {
                    vision += "<li>" + '<a href="' + n['any_link_addr'] + '"' + " title='" + n['any_title'] + "'" +'>' 
                            + "<img src='" + n['pic_addr'] + "'" + " width=190" + " height=142" + " alt='" + n["any_title"] + "'>" + "</a></li>";
                });
                vision += "</ul>";
                $(".vision-scroll-mask").append(vision);

                //控制图片滚动
                $("#vision-scroll").vision_scroll({
                    scroller_title_show: 'enable',
                    scroller_time_interval: '3000',
                    scroller_window_background_color: "#fdfefe",
                    scroller_window_padding: '10',
                    scroller_border_size: '0',
                    scroller_border_color: '',
                    scroller_images_width: '190',
                    scroller_images_height: '142',
                    scroller_title_size: '14',
                    scroller_title_color: '#333',
                    scroller_show_count: '3',
                    directory: 'images'
                });
                }
        });

        //视频
        $.ajax({
            type: "GET",
            contentType: "application/json",
            url: "http://newindex.stuzone.com/index.php/admin_stuzone_api/getVideo",
            dataType: 'json',
            success: function(data) {
                var video = "<ul>";
                $.each(data,function(i,n) {
                    video += "<li>" + '<a href="' + n['any_link_addr'] + '">' + n["any_title"] + "</a></li>";
                });
                video += "</ul>";
                $(".video-details").append(video);
            }
        });

        //学生市场
        $.ajax({
            type: "GET",
            contentType: "application/json",
            url: "http://newindex.stuzone.com/index.php/admin_stuzone_api/getMarket",
            dataType: 'json',
            success: function(data) {
                var market = "";
                $.each(data,function(i,n) {
                    market += "<dl>" + '<a href="' + n['any_link_addr'] + '">' 
                            + "<dt>" + "<img src='" + n['pic_addr'] + "'" + " title='" +n["any_title"] + "'" + " alt='" + n["any_title"] + "'>" + "</dt>" 
                            + "<dd>" + n["any_title"] + "</dd>" + "</a></dl>";
                });
                $(".market-details").append(market);
            }
        });

        //故问
        $.ajax({
            type: "GET",
            contentType: "application/json",
            url: "http://newindex.stuzone.com/index.php/admin_stuzone_api/getGuwen",
            dataType: 'json',
            success: function(data) {
                var know = "<ul>";
                $.each(data,function(i,n) {
                    know += "<li>" + '<a href="' + n['any_link_addr'] + '">' + n["any_title"] + "</a></li>";
                });
                know += "</ul>";
                $(".know-details").append(know);
            }
        });

        //下载
        $.ajax({
            type: "GET",
            contentType: "application/json",
            url: "http://newindex.stuzone.com/index.php/admin_stuzone_api/getDown",
            dataType: 'json',
            success: function(data) {
                var down = "<ul>";
                $.each(data,function(i,n) {
                    down += "<li>" + '<a href="' + n['any_link_addr'] + '">' + n["any_title"] + "</a></li>";
                });
                down += "</ul>";
                $("#aside-div-download").append(down);
            }
        });

        //排行榜test
        $.ajax({
            type: "GET",
            contentType: "application/json",
            url: "http://newindex.stuzone.com/index.php/admin_stuzone_api/getRank",
            dataType: 'json',
            success: function(data) {
                var rank = "<ul>";
                $.each(data,function(i,n) {
                    rank += "<li>" + '<a href="' + n['ranking_addr'] + '">' + n["any_title"] + "</a></li>";
                });
                rank += "</ul>";
                $(".aside-rank").append(rank);
            }
        });
        //更新所有数据（author:ranlei）
        // $.ajax({
        //             type:"POST",
        //             // url:"http://localhost/newindex/index.php/admin_info/updateData",
        //             url:"http://newindex.stuzone.com/index.php/admin_info/updateData",
        //             dataType:"json",

        //             success:function(){
        //                 console.log("update");
        //             }
        //         });
});