/*订单支付*/
(function(){
    //订单详情鼠标移入，订单列表显示
    $(".xiangqing").click(function(){
        if($(".xiangqinglist").css("display")=="none"){
            $(this).children(".downnico").css("background","url(img/cswd-dhdy-8.png)no-repeat -12px -86px");
            $(this).siblings(".xiangqinglist").slideDown();
        }else{
            $(this).siblings(".xiangqinglist").slideUp();
            $(this).children(".downnico").css("background","url(img/cswd-dhdy-8.png)no-repeat 4px -85px");
        }
    });
    //支付宝点击
    $(".alipayi").click(function(){
        $(".mask").show().siblings(".paylist").show().children(".payonline").show().siblings().hide();
    })
    //微信点击
    $(".wechartic").click(function(){
        $(".mask").show().siblings(".paylist").show().children(".payonline").hide().siblings().show();
    });
    //a标签点击跳转完触发事件
    $(".bank>div>a").click(function(){
        $(".mask").show().siblings(".paylist").show().children(".payonline").show().siblings().hide();
    });
//在线付款里的关闭按钮
    $(".closed").click(function(){
       $(this).parents(".paylist").hide().siblings(".mask").hide();
    });
//    返回选择其他支付方式点击关闭其父元素
    $(".close").click(function(){
        $(this).parents(".paylist").hide().siblings(".mask").hide();
    });
//获取当前window高度，宽度
    var winhei = $(window).height();
    var winwid = $(window).width();
    $(".mask").height(winhei);
    $(".mask").width(winwid);
    //当屏幕改变的时候
    $(window).resize(function(){
        //获取当前宽度，减去底部工具栏46像素
        var winhei1 = $(window).height();
        //获取当前窗口宽度
        var winwid2 = $(window).width();
        //  遮罩层赋值当前高度
        $(".mask").height(winhei1);
        //    遮罩层赋值当前宽度
        $(".mask").width(winwid2);
    });
})();