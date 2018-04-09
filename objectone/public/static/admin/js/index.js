//删除当前聚惠企业导航栏

function deleteSpan(obj){
    $(obj).parent().hide();
}
// function deleteLi(obj){
//     $(obj).addClass("marleft26px-li").children("span").addClass("marleft26px-li-span");
//     $(obj).parent().siblings("a").children("li").removeClass("marleft26px-li").children("span").removeClass("marleft26px-li-span");
// }
/*#main 的当前高度等于*/
(function(){
    var jian = 1;
    var a1 =  $(window).width() - 77;
    var a2 =  $(window).width() -77 -210;
    var windowh = $(window).height();
    var liwidth =0;       //存右头部菜单里的li的长度
    var ulmargin ="";       //存ul的偏移距离
    $(".right-box").width(a1);
    $(".left-box").height(windowh);
    $("#main").width(a1);
    $(".middle-box-middle").height(windowh-45);
    /*右侧首页点击切换背景图*/
    var qie = 1;
    $(".shouyeico").click(function(){
       if(qie){
           qie = 0;
           $(this).css("background","url(img/ht-zydh-20180103-1002.png)no-repeat -78px -241px");
       }else{
           qie = 1;
           $(this).css("background","url(img/ht-zydh-20180103-1002.png)no-repeat -52px -241px");
       }
    });
    /*头像点击*/
    $(".left-box-list").click(function(){
        var a5 =$(window).width() - 77;
        var a6 =$(window).width() -77 -210;
        if($(this).siblings(".middle-box").css("display")=="none"){
            $(".right-box").width(a6);
            $("#main").width(a6);
            $(".middle-box-middle").height($(window).height()-45);
        } else{
            $(".right-box").width(a5);
            $("#main").width(a5);
        }
        $(this).siblings(".middle-box").toggle();
        $(this).parent().siblings("div").children(".middle-box").hide();
    });
    /*关闭按钮*/
    $(".close").click(function(){
        var a7 = $(window).width() - 77;
        $(".middle-box").hide();
        $(".right-box").width(a7);
        $("#main").width(a7);
    });
    /*主页右头部li里的关闭按钮*/
    $(".closeed").click(function () {
        var clolength = $(".nav-item-li:visible").length;
        $(this).parent("li").hide();
        //如果li的长度大于10,箭头显示，否则隐藏
        if(clolength<10){
            $(".arrows-box").hide();
        }else{
            $(".arrows-box").show();
        }
    });
    /*窗口发生变化的时候*/
    $(window).resize(function(){
        var a3 = $(window).width() - 77;
        var a4 = $(window).width() -77 -210;
        var b1 = $(window).height()-45;
        $("#main").height(b1);
        $(".left-box").height($(window).height());
        $(".middle-box-middle").height($(window).height()-45);
       // 判断最左侧菜单栏右多少个
       if($(".middle-box").is(":visible")){
           $(".right-box").width(a4);
           $("#main").width(a4);
       }else{
           $(".right-box").width(a3);
           $("#main").width(a3);
       }
    });
    /*右箭头切换*/
    $(".rightarrows").click(function(){
        // ulmargin=parseInt($("#management-nav").css("marginLeft"));
        liwidth+=$(".nav-item-li").width();
        if(liwidth=0){
            return false;
        }else{
            $("#management-nav").css("marginLeft",""+liwidth+"px");
        }
    });
    /*左箭头切换*/
    $(".leftarrows").click(function(){
        liwidth-=152;
        if(liwidth>$("#management-nav").width()){
            return false;
        }else{
            $("#management-nav").css("marginLeft",""+liwidth+"px");
        }
    });
    /*管理中心点击*/
    $(".middle-box-middle>div>ul>li:first-child").click(function(){
        if($(this).next().is(":visible")){
            $(this).siblings("li").slideUp();
            $(this).children("span").css({"fontSize":"15px","lineHeight":"7px","fontWeight":"bold","opacity":"0.6"}).text("+").parent("li").css("opacity","1");
        }else{
            $(this).siblings("li").slideDown();
            $(this).children("span").text("-").css({"fontSize":"21px","lineHeight":"5px"}).parent("li").css("opacity","0.5");
        }
    });
    /*个人工作台点击*/
    $(".file-list>div>ul>li:first-child").click(function(){
        if($(this).next().is(":visible")){
            $(this).siblings("li").slideUp();
            $(this).children("span:first-child").css({"fontSize":"15px","lineHeight":"7px","fontWeight":"bold","opacity":"0.6"}).text("+").parent("li").css("opacity","1");
        }else{
            $(this).siblings("li").slideDown();
            $(this).children("span:first-child").text("-").css({"fontSize":"21px","lineHeight":"5px"}).parent("li").css("opacity","0.5");
        }
    });
    /*个人工作台文件夹点击*/
    $(".middle-box-middle>p").click(function(){
        if($(this).next().css("display")=="none"){
            $(this).children("span:last-child").css("background","url('img/ht-zydh-20180103-1002.png')no-repeat -81px -314px");
            $(this).next(".file-list").slideDown();
        }else{
            $(this).children("span:last-child").css("background","url('img/ht-zydh-20180103-1002.png')no-repeat -81px -322px");
            $(this).next(".file-list").slideUp();
        }
    });
    //添加/显示所有聚惠企业导航栏
    var arr = [],itemInfo = [],str = '',atttr=[];
    $(".nav-item-title").each(function(i,dom){
        arr.push($(dom).text());
        atttr.push($(dom).attr('href'));
    });
    arr.forEach(function(dom,i,arr){
        str += '<li class="nav-item-li" href='+atttr[i]+'>'+arr[i];
        str += '<span class="closeed" onclick="deleteSpan(this)"></span>';
        str += '</li>';
        itemInfo.push(str);
    });
    $("#management-nav").append(str);

    $(".marleft26px>a").on("click",function(){
        $("#main").height(windowh-45);
        var _thisVal = $(this).text();
        var navItemLi = $(".nav-item-li");
        var lilength = $(".nav-item-li:visible").length;
        navItemLi.each(function(i,dom){
            $(navItemLi[i]).removeClass("marleft26px-li").children("span").removeClass("marleft26px-li-span");
            if(_thisVal === $(navItemLi[i]).text()){
                $(navItemLi[i]).css("display","inline-block").addClass("marleft26px-li").children("span").addClass("marleft26px-li-span");
            }
        });
        //如果li的长度大于10,箭头显示，否则隐藏
        if(lilength>10){
            $(".arrows-box").show();
        }else{
            $(".arrows-box").hide();
        }
    });
    //点击显示当前聚惠企业导航栏
    $(".nav-item-li").on("click",function(){
        var lihref = $(this).attr("href");
        $(this).addClass("marleft26px-li").children("span").addClass("marleft26px-li-span");
        $(this).siblings("li").removeClass("marleft26px-li").children("span").removeClass("marleft26px-li-span");
        window.open(lihref,"main");
    });
    /*主页内容点击*/
    $(".right-box-top-nav>ul>li").click(function(){
        $(this).css("borderBottom","30px solid #ffffff").siblings().css("borderBottom","30px solid #959495");
        $(this).children(".closeed").css("background","#ffffff");
        $(this).siblings().children(".closeed").css("background","#959495");
    });
    //右头部菜单双击关闭
    $(".right-box-top-nav>ul>li").dblclick(function(){
        $(this).hide();
        var lllength = $(".nav-item-li:visible").length;
        //如果li的长度大于10,箭头显示，否则隐藏
        if(lllength<10){
            $(".arrows-box").hide();
        }else{
            $(".arrows-box").show();
        }
    });
})();