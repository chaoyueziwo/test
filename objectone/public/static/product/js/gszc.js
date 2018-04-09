/*产品展销展示页*/
(function(){
   var jian = 1;
    /*公司类型选择框*/
    $(".companytype>a>li").click(function(){
        $(this).css("border","1px solid #1cbcb4").children(".triangle-bottomright")
            .show().parents().siblings().children().children(".triangle-bottomright").hide().parent().css("border","1px solid #ddd");
    });
    /*相关服务展开栏*/
    $(".related-left>div:last-child>ul>li:first-child").click(function(){
        if(jian){
            jian = 0;
            $(this).children(".minus").text("+");
            $(this).siblings("a").children().slideUp();
        }else{
            jian = 1;
            $(this).children(".minus").text("-").css("border","1px solid #ddd");
            $(this).siblings("a").children().slideDown();
        }
    });
    //选择区域
    $(".region-list-1").click(function(){
        $(this).css({"borderTop":"3px solid #1cbcb4","borderRight":"1px solid #ddd","borderLeft":"1px solid #ddd","borderBottom":"none"}).
        siblings().css({"borderTop":"3px solid transparent","borderLeft":"1px solid transparent","borderRight":"1px solid transparent","borderBottom":"1px solid #ddd"});
        $(".r1").show().siblings(".regionchose").hide();
    });
    $(".region-list-2").click(function(){
        $(this).css({"borderTop":"3px solid #1cbcb4","borderRight":"1px solid #ddd","borderLeft":"1px solid #ddd","borderBottom":"none"}).
        siblings().css({"borderTop":"3px solid transparent","borderLeft":"1px solid transparent","borderRight":"1px solid transparent","borderBottom":"1px solid #ddd"});
        $(".r2").show().siblings(".regionchose").hide();
    });
    $(".region-list-3").click(function(){
        $(this).css({"borderTop":"3px solid #1cbcb4","borderRight":"1px solid #ddd","borderLeft":"1px solid #ddd","borderBottom":"none"}).
        siblings().css({"borderTop":"3px solid transparent","borderLeft":"1px solid transparent","borderRight":"1px solid transparent","borderBottom":"1px solid #ddd"});
        $(".r3").show().siblings(".regionchose").hide();
    });
    //选择省份，当前的text为点击的省份
    /*获取省市区3个按钮的text*/
    var province = $(".region-list-1");
    var town  = $(".region-list-2");
    var district = $(".region-list-3");
    //给每个省份地区加点击事件，获取当前点击的text，然后存入省text
    $(".r1>div").click(function(){
       var provincestr = $(this).text();
       province.text(provincestr);
        $(".r1").hide();
        $(".r2").show();
        $(".region-list-2").css({"borderTop":"3px solid #1cbcb4","borderRight":"1px solid #ddd","borderLeft":"1px solid #ddd","borderBottom":"none"}).
        siblings().css({"borderTop":"3px solid transparent","borderLeft":"1px solid transparent","borderRight":"1px solid transparent","borderBottom":"1px solid #ddd"});
    });
    //给每个市地区加点击事件，获取当前点击的text，然后存入市text
    $(".r2>div").click(function(){
        var townstr = $(this).text();
        town.text(townstr);
        $(".r2").hide();
        $(".r3").show();
        $(".region-list-3").css({"borderTop":"3px solid #1cbcb4","borderRight":"1px solid #ddd","borderLeft":"1px solid #ddd","borderBottom":"none"}).
        siblings().css({"borderTop":"3px solid transparent","borderLeft":"1px solid transparent","borderRight":"1px solid transparent","borderBottom":"1px solid #ddd"});
    });
    //给每个区加点击事件，获取当前点击的text，然后存入区text
    $(".r3>div").click(function(){
        var districtstr = $(this).text();
        var rtext = province.text()+"-"+town.text()+"-"+districtstr;
        district.text(districtstr);
        $(".region-list-3").css({"borderTop":"3px solid #1cbcb4","borderRight":"1px solid #ddd","borderLeft":"1px solid #ddd","borderBottom":"none"}).
        siblings().css({"borderTop":"3px solid transparent","borderLeft":"1px solid transparent","borderRight":"1px solid transparent","borderBottom":"1px solid #ddd"});
        // $(".region").textContent(rtext);
        $(".regiontext").text(rtext);
    });
    /*服务介绍6个点击事件*/
    $(".related-right>div:first-child>div:first-child>a>div").click(function(){
        $(this).css({"background":"#fff","borderTop":"2px solid #1cbcb4"}).
        parent().siblings("a").children().css({"background":"#f6f6f6","borderTop":"2px solid transparent"});
    });
    /*切换菜单点击按钮所有按钮*/
    $(".process-menu>div:first-child>div").click(function(){
        $(this).css("background","#fff").siblings().css("background","#f6f6f6");
    });
    /*切换菜单按钮*/
    $(".bt1").click(function(){
        $("#server1").css("display","block").siblings().css("display","none");
    });
    $(".bt2").click(function(){
        $("#server2").css("display","block").siblings().css("display","none");
    });
    $(".bt3").click(function(){
        $("#server3").css("display","block").siblings().css("display","none");
    });
    $(".bt4").click(function(){
        $("#server4").css("display","block").siblings().css("display","none");
    });
    $(".bt5").click(function(){
        $("#server5").css("display","block").siblings().css("display","none");
    });
    /*获取好评里的纯数字*/
// var spanstr = $(".good1>span:first-child").text().replace(/[^0-9/.]/ig,"");
// var jindu = $(".good1>progress").val();
    /*全部评价*/
    $(".comment>div:first-child>span").click(function(){
        $(this).css("color","#1cbcb4").siblings().css("color","#000");
    });
    $(".all1").click(function(){
        $(".details1").show().siblings(".details").hide();
    });
    $(".all2").click(function(){
        $(".details2").show().siblings(".details").hide();
    });
    $(".all3").click(function(){
        $(".details3").show().siblings(".details").hide();
    });
    $(".all4").click(function(){
        $(".details4").show().siblings(".details").hide();
    });
    /*用户评价页码切换*/
    $(".page>span").click(function(){
        $(this).css({"background":"#1cbcb4","color":"#fff"}).siblings().css({"background":"#fff","color":"#000"});
    });
    /*常见问题，全部问题*/
    $(".allquestion>div").click(function(){
        $(this).css("color","#1cbcb4").siblings().css("color","#000");
    });
    /*常见问题*/
    $(".questionpage>span").click(function(){
        $(this).css({"background":"#1cbcb4","color":"#fff"}).siblings().css({"background":"#fff","color":"#000"});
    });
    /*全部评价*/
    $(".allquestion1").click(function(){
        $(".allquestionlistlist1").show().siblings(".allquestionlist").hide();
    });
    /*服务内容*/
    $(".allquestion2").click(function(){
        $(".allquestionlistlist2").show().siblings(".allquestionlist").hide();
    });
    /*费用相关*/
    $(".allquestion3").click(function(){
        $(".allquestionlistlist3").show().siblings(".allquestionlist").hide();
    });
    /*办理时间*/
    $(".allquestion4").click(function(){
        $(".allquestionlistlist4").show().siblings(".allquestionlist").hide();
    });
    /*发票相关*/
    $(".allquestion5").click(function(){
        $(".allquestionlistlist5").show().siblings(".allquestionlist").hide();
    });
    /*支付相关*/
    $(".allquestion6").click(function(){
        $(".allquestionlistlist6").show().siblings(".allquestionlist").hide();
    });
    /*其他问题*/
    $(".allquestion7").click(function(){
        $(".allquestionlistlist7").show().siblings(".allquestionlist").hide();
    });
    /*轮播*/
    var mySwiper = new Swiper('.swiper-container', {
        autoplay: 2000,//可选选项，自动滑动
        pagination : '.swiper-pagination',
        paginationClickable :true,
        autoplayDisableOnInteraction : false,   //用户操作后是否停止swiper轮播，默认为true;
        prevButton:'.swiper-button-prev',
        nextButton:'.swiper-button-next',
        loop:true,                  //箭头无限切换；
        noSwiping : true,                      //禁止触屏切换
        noSwipingClass : 'stop-swiping',       //禁止触屏切换的class
    });
//滚动事件
    var divoffset = $(".related-right>div:first-child").offset().top;
    $(window).scroll(function(){
        if($(this).scrollTop() > divoffset){
            $(".related-right>div:first-child").css({"position":"fixed","top":"0","zIndex":"10"}).children("#promptlybox").show().children(".callonline");
        }
        else {
            $(".related-right>div:first-child").css({"position":"inherit","top":"0"}).children("#promptlybox").hide();
        }
    });
})();