/*轮播插件*/
$(document).ready(function(){
var mySwiper = new Swiper('.swiper-container', {
    autoplay: 2000,//可选选项，自动滑动
    pagination : '.swiper-pagination',
    paginationClickable :true,
    autoplayDisableOnInteraction : false     //用户操作后是否停止swiper轮播，默认为true;
});
/*第一个服务分类列表第一个*/
$(".server-hover-1").mouseenter(function(){
     $(this).css({"background":"white","opacity":"1"});
    $(".server-hover-1>ul").css("color","black");
     $(".server-hover-1 ul>li>a").css("color","black");
     $(".companyico").css("background","url(img/image/sy-1.png)no-repeat 3px -260px");
     $(".server-list-box-right").css("display","inline-block");
     /*判断鼠标移入时2.3.4.5.6列表是否为隐藏，是隐藏就显示，否则就无效，继续隐藏*/
     if($(".server-none-2").hide(),$(".server-none-3").hide(),$(".server-none-4").hide(),
         $(".server-none-5").hide(),$(".server-none-6").hide()){
         $(".server-none-1").show();
     }else{
         $(".server-none-1").hide();
     }
});
$(".server-hover-1").mouseleave(function(){
    $(".companyico").css("background","url(img/image/sy-1.png)no-repeat -83px -47px");
    $(this).css({"background":"#2B7773","opacity":"0.8"});
    $(".server-hover-1>ul").css("color","white");
    $(".server-hover-1 ul>li>a").css("color","white");
    $(".server-none-1").hide();
    $(".server-list-box-right").hide();
});
$(".server-none-1").mouseenter(function(){
    $(".server-none-1").show().siblings().hide();
});
/*弹出框容器鼠标移入移出效果*/
$(".server-list-box-right").mouseenter(function(){
    $(".server-list-box-right").css("display","inline-block");
});
$(".server-list-box-right").mouseleave(function(){
    $(".server-list-box-right").hide();
});
/*第2个服务分类列表第一个*/
$(".server-hover-2").mouseenter(function(){
    $(this).css({"background":"white","opacity":"1"});
    $(".server-hover-2>ul").css("color","black");
    $(".server-hover-2 ul>li>a").css("color","black");
    $(".accountantico").css("background","url(img/image/sy-1.png)no-repeat -21px -260px");
    $(".server-list-box-right").css("display","inline-block");
    /*判断鼠标移入时2.3.4.5.6列表是否为隐藏，是隐藏就显示，否则就无效，继续隐藏*/
    if($(".server-none-1").hide(),$(".server-none-3").hide(),$(".server-none-4").hide(),
            $(".server-none-5").hide(),$(".server-none-6").hide()){
        $(".server-none-2").show();
    }else{
        $(".server-none-2").hide();
    }
});
$(".server-hover-2").mouseleave(function(){
    $(this).css({"background":"#2B7773","opacity":"0.8"});
    $(".server-hover-2>ul").css("color","white");
    $(".server-hover-2 ul>li>a").css("color","white");
    $(".accountantico").css("background","url(img/image/sy-1.png)no-repeat -109px -47px");
    $(".server-list-box-right").hide();
});
$(".server-none-2").mouseenter(function(){
    $(".server-none-2").show().siblings().hide();
});

/*第3个服务分类列表第一个*/
$(".server-hover-3").mouseenter(function(){
    $(this).css({"background":"white","opacity":"1"});
    $(".server-hover-3>ul").css("color","black");
    $(".server-hover-3 ul>li>a").css("color","black");
    $(".equityico").css("background","url(img/image/sy-1.png)no-repeat -55px -260px");
    $(".server-list-box-right").css("display","inline-block");
    /*判断鼠标移入时2.3.4.5.6列表是否为隐藏，是隐藏就显示，否则就无效，继续隐藏*/
    if($(".server-none-1").hide(),$(".server-none-2").hide(),$(".server-none-4").hide(),
            $(".server-none-5").hide(),$(".server-none-6").hide()){
        $(".server-none-3").show();
    }else{
        $(".server-none-3").hide();
    }
});
$(".server-hover-3").mouseleave(function(){
    $(this).css({"background":"#2B7773","opacity":"0.8"});
    $(".server-hover-3>ul").css("color","white");
    $(".server-hover-3 ul>li>a").css("color","white");
    $(".equityico").css("background","url(img/image/sy-1.png)no-repeat -139px -47px");
    $(".server-list-box-right").hide();
});
$(".server-none-3").mouseenter(function(){
    $(".server-none-3").show().siblings().hide();
});

/*第4个服务分类列表第一个*/
$(".server-hover-4").mouseenter(function(){
    $(this).css({"background":"white","opacity":"1"});
    $(".server-hover-4>ul").css("color","black");
    $(".server-hover-4 ul>li>a").css("color","black");
    $(".socialico").css("background","url(img/image/sy-1.png)no-repeat -83px -258px");
    $(".server-list-box-right").css("display","inline-block");
    /*判断鼠标移入时2.3.4.5.6列表是否为隐藏，是隐藏就显示，否则就无效，继续隐藏*/
    if($(".server-none-1").hide(),$(".server-none-2").hide(),$(".server-none-3").hide(),
            $(".server-none-5").hide(),$(".server-none-6").hide()){
        $(".server-none-4").show();
    }else{
        $(".server-none-4").hide();
    }
});
$(".server-hover-4").mouseleave(function(){
    $(this).css({"background":"#2B7773","opacity":"0.8"});
    $(".server-hover-4>ul").css("color","white");
    $(".server-hover-4 ul>li>a").css("color","white");
    $(".socialico").css("background","url(img/image/sy-1.png)no-repeat 1px -76px");
    $(".server-list-box-right").hide();
});
$(".server-none-4").mouseenter(function(){
    $(".server-none-4").show().siblings().hide();
});

/*第5个服务分类列表第一个*/
$(".server-hover-5").mouseenter(function(){
    $(this).css({"background":"white","opacity":"1"});
    $(".server-hover-5>ul").css("color","black");
    $(".server-hover-5 ul>li>a").css("color","black");
    $(".aptitudeico").css("background","url(img/image/sy-1.png)no-repeat -112px -258px");
    $(".server-list-box-right").css("display","inline-block");
    /*判断鼠标移入时2.3.4.5.6列表是否为隐藏，是隐藏就显示，否则就无效，继续隐藏*/
    if($(".server-none-1").hide(),$(".server-none-2").hide(),$(".server-none-3").hide(),
            $(".server-none-4").hide(),$(".server-none-6").hide()){
        $(".server-none-5").show();
    }else{
        $(".server-none-5").hide();
    }
});
$(".server-hover-5").mouseleave(function(){
    $(this).css({"background":"#2B7773","opacity":"0.8"});
    $(".server-hover-5>ul").css("color","white");
    $(".server-hover-5 ul>li>a").css("color","white");
    $(".aptitudeico").css("background","url(img/image/sy-1.png)no-repeat -27px -76px");
    $(".server-list-box-right").hide();
});
$(".server-none-5").mouseenter(function(){
    $(".server-none-5").show().siblings().hide();
});

/*第5个服务分类列表第一个*/
$(".server-hover-6").mouseenter(function(){
    $(this).css({"background":"white","opacity":"1"});
    $(".server-hover-6>ul").css("color","black");
    $(".server-hover-6 ul>li>a").css("color","black");
    /*特殊图标*/
    $(".specialico").css("background","url(img/image/sy-1.png)no-repeat -112px -258px");
    $(".server-list-box-right").css("display","inline-block");
    /*判断鼠标移入时2.3.4.5.6列表是否为隐藏，是隐藏就显示，否则就无效，继续隐藏*/
    if($(".server-none-1").hide(),$(".server-none-2").hide(),$(".server-none-3").hide(),
            $(".server-none-4").hide(),$(".server-none-5").hide()){
        $(".server-none-6").show();
    }else{
        $(".server-none-6").hide();
    }
});
$(".server-hover-6").mouseleave(function(){
    $(this).css({"background":"#2B7773","opacity":"0.8"});
    $(".server-hover-6>ul").css("color","white");
    $(".server-hover-6 ul>li>a").css("color","white");
    /*特殊图标*/
    $(".specialico").css("background","url(img/image/sy-1.png)no-repeat -27px -76px");
    $(".server-list-box-right").hide();
});
$(".server-none-6").mouseenter(function(){
    $(".server-none-6").show().siblings().hide();
});
/*工商注册鼠标移入*/
$(".linetype1>img").mouseenter(function(){
        $(".linetype>div>img").attr("src","img/image/sy-0002_02.png");
        $(this).attr("src","img/image/sy-0002_01.png");
        $(".linetypeli1").css("color","#1cbbb4").siblings().css("color","#000");
        $(".linetypelist1").show().siblings(".entrepreneurship-box-bottom").hide();
});
//工商注册文字
$(".linetypeli1").mouseenter(function(){
    $(".linetype>div>img").attr("src","img/image/sy-0002_02.png");
    $(".linetype1>img").attr("src","img/image/sy-0002_01.png");
    $(this).css("color","#1cbbb4").siblings().css("color","#000");
    $(".linetypelist1").show().siblings(".entrepreneurship-box-bottom").hide();
});
//工商变更鼠标移入
$(".linetype2>img").mouseenter(function(){
    $(".linetype>div>img").attr("src","img/image/sy-0002_02.png");
    $(this).attr("src","img/image/sy-0002_01.png");
    $(".linetypeli2").css("color","#1cbbb4").siblings().css("color","#000");
    $(".linetypelist2").show().siblings(".entrepreneurship-box-bottom").hide();
});
//工商变更文字
    $(".linetypeli2").mouseenter(function(){
        $(".linetype>div>img").attr("src","img/image/sy-0002_02.png");
        $(".linetype2>img").attr("src","img/image/sy-0002_01.png");
        $(this).css("color","#1cbbb4").siblings().css("color","#000");
        $(".linetypelist2").show().siblings(".entrepreneurship-box-bottom").hide();
    });
//知识产权
$(".linetype3>img").mouseenter(function(){
    $(".linetype>div>img").attr("src","img/image/sy-0002_02.png");
    $(this).attr("src","img/image/sy-0002_01.png");
    $(".linetypeli3").css("color","#1cbbb4").siblings().css("color","#000");
    $(".linetypelist3").show().siblings(".entrepreneurship-box-bottom").hide();
});
//知识产权文字
    $(".linetypeli3").mouseenter(function(){
        $(".linetype>div>img").attr("src","img/image/sy-0002_02.png");
        $(".linetype3>img").attr("src","img/image/sy-0002_01.png");
        $(this).css("color","#1cbbb4").siblings().css("color","#000");
        $(".linetypelist3").show().siblings(".entrepreneurship-box-bottom").hide();
    });
//资质办理
$(".linetype4>img").mouseenter(function(){
    $(".linetype>div>img").attr("src","img/image/sy-0002_02.png");
    $(this).attr("src","img/image/sy-0002_01.png");
    $(".linetypeli4").css("color","#1cbbb4").siblings().css("color","#000");
    $(".linetypelist4").show().siblings(".entrepreneurship-box-bottom").hide();
});
//资质办理文字
    $(".linetypeli4").mouseenter(function(){
        $(".linetype>div>img").attr("src","img/image/sy-0002_02.png");
        $(".linetype4>img").attr("src","img/image/sy-0002_01.png");
        $(this).css("color","#1cbbb4").siblings().css("color","#000");
        $(".linetypelist4").show().siblings(".entrepreneurship-box-bottom").hide();
    });
//税务代理
$(".linetype5>img").mouseenter(function(){
    $(".linetype>div>img").attr("src","img/image/sy-0002_02.png");
    $(this).attr("src","img/image/sy-0002_01.png");
    $(".linetypeli5").css("color","#1cbbb4").siblings().css("color","#000");
    $(".linetypelist5").show().siblings(".entrepreneurship-box-bottom").hide();
});
//税务代理文字
    $(".linetypeli5").mouseenter(function(){
        $(".linetype>div>img").attr("src","img/image/sy-0002_02.png");
        $(".linetype5>img").attr("src","img/image/sy-0002_01.png");
        $(this).css("color","#1cbbb4").siblings().css("color","#000");
        $(".linetypelist5").show().siblings(".entrepreneurship-box-bottom").hide();
    });
/*视频切换，创业者切换*/
$(".linetype6>img").mouseenter(function(){
    $(".linetypelist>div>img").attr("src","img/image/sy-0002_02.png");
    $(this).attr("src","img/image/sy-0002_01.png");
    $(".linetypeli6").css("color","#1cbbb4").siblings().css("color","#000");
    $(".linetypelist6").show().siblings(".video-box-footer-list-1").hide();
});
    //创业者文字切换
    $(".linetypeli6").mouseenter(function(){
        $(".linetypelist>div>img").attr("src","img/image/sy-0002_02.png");
        $(".linetype6>img").attr("src","img/image/sy-0002_01.png");
        $(this).css("color","#1cbbb4").siblings().css("color","#000");
        $(".linetypelist6").show().siblings(".video-box-footer-list-1").hide();
    });
//    企业家切换
$(".linetype7>img").mouseenter(function(){
    $(".linetypelist>div>img").attr("src","img/image/sy-0002_02.png");
    $(this).attr("src","img/image/sy-0002_01.png");
    $(".linetypeli7").css("color","#1cbbb4").siblings().css("color","#000");
    $(".linetypelist7").show().siblings(".video-box-footer-list-1").hide();
});
//企业家文字切换
    $(".linetypeli7").mouseenter(function(){
        $(".linetypelist>div>img").attr("src","img/image/sy-0002_02.png");
        $(".linetype7>img").attr("src","img/image/sy-0002_01.png");
        $(this).css("color","#1cbbb4").siblings().css("color","#000");
        $(".linetypelist7").show().siblings(".video-box-footer-list-1").hide();
    });
//   投资人切换
$(".linetype8>img").mouseenter(function(){
    $(".linetypelist>div>img").attr("src","img/image/sy-0002_02.png");
    $(this).attr("src","img/image/sy-0002_01.png");
    $(".linetypeli8").css("color","#1cbbb4").siblings().css("color","#000");
    $(".linetypelist8").show().siblings(".video-box-footer-list-1").hide();
});
//投资人文字切换
    $(".linetypeli8").mouseenter(function(){
        $(".linetypelist>div>img").attr("src","img/image/sy-0002_02.png");
        $(".linetype8>img").attr("src","img/image/sy-0002_01.png");
        $(this).css("color","#1cbbb4").siblings().css("color","#000");
        $(".linetypelist8").show().siblings(".video-box-footer-list-1").hide();
    });
//    合伙人切换
$(".linetype9>img").mouseenter(function(){
    $(".linetypelist>div>img").attr("src","img/image/sy-0002_02.png");
    $(this).attr("src","img/image/sy-0002_01.png");
    $(".linetypeli9").css("color","#1cbbb4").siblings().css("color","#000");
    $(".linetypelist9").show().siblings(".video-box-footer-list-1").hide();
});
//合伙人文字切换
    $(".linetypeli9").mouseenter(function(){
        $(".linetypelist>div>img").attr("src","img/image/sy-0002_02.png");
        $(".linetype9>img").attr("src","img/image/sy-0002_01.png");
        $(this).css("color","#1cbbb4").siblings().css("color","#000");
        $(".linetypelist9").show().siblings(".video-box-footer-list-1").hide();
    });
//    企业家切换
$(".linetype10>img").mouseenter(function(){
    $(".linetypelist>div>img").attr("src","img/image/sy-0002_02.png");
    $(this).attr("src","img/image/sy-0002_01.png");
    $(".linetypeli10").css("color","#1cbbb4").siblings().css("color","#000");
    $(".linetypelist10").show().siblings(".video-box-footer-list-1").hide();
});
//企业家文字切换
    $(".linetypeli10").mouseenter(function(){
        $(".linetypelist>div>img").attr("src","img/image/sy-0002_02.png");
        $(".linetype10>img").attr("src","img/image/sy-0002_01.png");
        $(this).css("color","#1cbbb4").siblings().css("color","#000");
        $(".linetypelist10").show().siblings(".video-box-footer-list-1").hide();
    });
/*视频播放*/
var a = document.getElementById("play");
$(".playbtn").click(function(){
   $("#mask").css("height",$(document).height());
    $("#mask").css("width",$(document).width());
    $("#mask").show();
    $(".maskvideo").show();
    a.play();
});

$("#mask").click(function(){
    $("#mask").hide();
    $(".maskvideo").hide();
    a.pause();
});
});