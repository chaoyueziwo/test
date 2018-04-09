/*头部*/
/*热图，下拉箭头*/
$(".active").mouseenter(function () {
    $(this).children(".activelist").show();
    $(this).siblings().children(".activelist").hide();
    $(this).children(".hot").children("div").css({"background":"url(img/cswd-dhdy-8.png)no-repeat 0 -90px","marginTop":"3px","marginLeft":"2px"});
}).mouseleave(function(){
    $(this).children(".activelist").hide();
    $(this).children(".hot").children("div").css({"background":"url(img/cswd-dhdy-9.png)no-repeat 3px -429px","marginTop":"0","marginLeft":"0"});
});
/*导航栏下拉菜单*/
$(".activelist>div>div").mouseenter(function(){
    $(this).css("background","#2a7b7c").children("a").css("color","#fff");
}).mouseleave(function(){
    $(this).css("background","#fff").children("a").css("color","#000");
});
/*所有服务分类*/
$(".server-none-1").hide();
$(".server-list-box-right").hide();
$(".server-none-2").hide();
$(".server-none-3").hide();
$(".server-none-4").hide();
$(".server-none-5").hide();
$(".server-none-6").hide();
/*工商注册*/
$(".linetypelist2").hide();
$(".linetypelist3").hide();
$(".linetypelist4").hide();
$(".linetypelist5").hide();
/*视频列表*/
$(".linetypelist7").hide();
$(".linetypelist8").hide();
$(".linetypelist9").hide();
$(".linetypelist10").hide();
/*第一个服务分类列表第一个*/
$(".server-hover-1").mouseenter(function(){
    $(this).css({"background":"white","opacity":"1"});
    $(".server-hover-1>ul").css("color","black");
    $(".server-hover-1 ul>li>a").css("color","black");
    $(".companyico").css("background","url(img/sy-1.png)no-repeat 3px -260px");
    $(".server-list-box-right").show();
    /*判断鼠标移入时2.3.4.5.6列表是否为隐藏，是隐藏就显示，否则就无效，继续隐藏*/
    if($(".server-none-2").hide(),$(".server-none-3").hide(),$(".server-none-4").hide(),
            $(".server-none-5").hide(),$(".server-none-6").hide()){
        $(".server-none-1").show();
    }else{
        $(".server-none-1").hide();
    }
});
$(".server-hover-1").mouseleave(function(){
    $(".companyico").css("background","url(img/sy-1.png)no-repeat -83px -47px");
    $(this).css({"background":"#2B7773","opacity":"0.8"});
    $(".server-hover-1>ul").css("color","white");
    $(".server-hover-1 ul>li>a").css("color","white");
    $(".server-none-1").hide();
    $(".server-list-box-right").hide();
});
$(".server-list-box-right").mouseenter(function(){
    $(".server-list-box-right").show();
});
$(".server-none-1").mouseenter(function(){
    $(".server-none-1").show();
    $(".server-none-2").hide();
    $(".server-none-3").hide();
    $(".server-none-4").hide();
    $(".server-none-5").hide();
    $(".server-none-6").hide();
});
/*弹出框容器鼠标移入移出效果*/
$(".server-list-box-right").mouseenter(function(){
    $(".server-list-box-right").show();
});
$(".server-list-box-right").mouseleave(function(){
    $(".server-list-box-right").hide();
});
/*第2个服务分类列表第一个*/
$(".server-hover-2").mouseenter(function(){
    $(this).css({"background":"white","opacity":"1"});
    $(".server-hover-2>ul").css("color","black");
    $(".server-hover-2 ul>li>a").css("color","black");
    $(".accountantico").css("background","url(img/sy-1.png)no-repeat -21px -260px");
    $(".server-list-box-right").show();
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
    $(".accountantico").css("background","url(img/sy-1.png)no-repeat -109px -47px");
    $(".server-list-box-right").hide();
});
$(".server-list-box-right").mouseenter(function(){
    $(".server-list-box-right").show();
});
$(".server-none-2").mouseenter(function(){
    $(".server-none-2").show();
    $(".server-none-1").hide();
    $(".server-none-3").hide();
    $(".server-none-4").hide();
    $(".server-none-5").hide();
    $(".server-none-6").hide();
});

/*第3个服务分类列表第一个*/
$(".server-hover-3").mouseenter(function(){
    $(this).css({"background":"white","opacity":"1"});
    $(".server-hover-3>ul").css("color","black");
    $(".server-hover-3 ul>li>a").css("color","black");
    $(".equityico").css("background","url(img/sy-1.png)no-repeat -55px -260px");
    $(".server-list-box-right").show();
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
    $(".equityico").css("background","url(img/sy-1.png)no-repeat -139px -47px");
    $(".server-list-box-right").hide();
});
$(".server-list-box-right").mouseenter(function(){
    $(".server-list-box-right").show();
});
$(".server-none-3").mouseenter(function(){
    $(".server-none-3").show();
    $(".server-none-1").hide();
    $(".server-none-2").hide();
    $(".server-none-4").hide();
    $(".server-none-5").hide();
    $(".server-none-6").hide();
});

/*第4个服务分类列表第一个*/
$(".server-hover-4").mouseenter(function(){
    $(this).css({"background":"white","opacity":"1"});
    $(".server-hover-4>ul").css("color","black");
    $(".server-hover-4 ul>li>a").css("color","black");
    $(".socialico").css("background","url(img/sy-1.png)no-repeat -83px -258px");
    $(".server-list-box-right").show();
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
    $(".socialico").css("background","url(img/sy-1.png)no-repeat 1px -76px");
    $(".server-list-box-right").hide();
});
$(".server-list-box-right").mouseenter(function(){
    $(".server-list-box-right").show();
});
$(".server-none-4").mouseenter(function(){
    $(".server-none-4").show();
    $(".server-none-1").hide();
    $(".server-none-2").hide();
    $(".server-none-3").hide();
    $(".server-none-5").hide();
    $(".server-none-6").hide();
});

/*第5个服务分类列表第一个*/
$(".server-hover-5").mouseenter(function(){
    $(this).css({"background":"white","opacity":"1"});
    $(".server-hover-5>ul").css("color","black");
    $(".server-hover-5 ul>li>a").css("color","black");
    $(".aptitudeico").css("background","url(img/sy-1.png)no-repeat -112px -258px");
    $(".server-list-box-right").show();
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
    $(".aptitudeico").css("background","url(img/sy-1.png)no-repeat -27px -76px");
    $(".server-list-box-right").hide();
});
$(".server-list-box-right").mouseenter(function(){
    $(".server-list-box-right").show();
});
$(".server-none-5").mouseenter(function(){
    $(".server-none-5").show();
    $(".server-none-1").hide();
    $(".server-none-2").hide();
    $(".server-none-3").hide();
    $(".server-none-4").hide();
    $(".server-none-6").hide();
});

/*第5个服务分类列表第一个*/
$(".server-hover-6").mouseenter(function(){
    $(this).css({"background":"white","opacity":"1"});
    $(".server-hover-6>ul").css("color","black");
    $(".server-hover-6 ul>li>a").css("color","black");
    /*特殊图标*/
    $(".specialico").css("background","url(img/sy-1.png)no-repeat -112px -258px");
    $(".server-list-box-right").show();
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
    $(".specialico").css("background","url(img/sy-1.png)no-repeat -27px -76px");
    $(".server-list-box-right").hide();
});
$(".server-list-box-right").mouseenter(function(){
    $(".server-list-box-right").show();
});
$(".server-none-6").mouseenter(function(){
    $(".server-none-6").show();
    $(".server-none-1").hide();
    $(".server-none-2").hide();
    $(".server-none-3").hide();
    $(".server-none-4").hide();
    $(".server-none-5").hide();
});