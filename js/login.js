 $(function ($) {
        $("#login").hover(function () {
            $(this).stop().animate({
                opacity: '1'
            }, 600);
        }, function () {
            $(this).stop().animate({
                opacity: '0.6'
            }, 1000);
        }).on('click', function () {
            $("body").append("<div id='mask'></div>");
            $("#mask").addClass("mask").fadeIn("slow");
            $("#LoginBox").fadeIn("slow");
        });
        //
        //按钮的透明度
        $("#loginbtn").hover(function () {
            $(this).stop().animate({
                opacity: '1'
            }, 600);
        }, function () {
            $(this).stop().animate({
                opacity: '0.8'
            }, 1000);
        });
        $("#signupbtn").hover(function () {
            $(this).stop().animate({
                opacity: '1'
            }, 600);
        }, function () {
            $(this).stop().animate({
                opacity: '0.8'
            }, 1000);
        });





        //关闭
        $(".close_btn").hover(function () { $(this).css({ color: 'black' }) }, function () { $(this).css({ color: '#999' }) }).on('click', function () {
            $("#LoginBox").fadeOut("fast");
            $("#mask").css({ display: 'none' });
        });
    });

/**
 * Created by lenovo on 2016/4/30.
 */
