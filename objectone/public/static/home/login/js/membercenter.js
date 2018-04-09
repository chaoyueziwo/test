/*会员订单中心*/
(function(){
    //获取所选类型的长度
    var typelength = $(".type");
    //循环typelength里的div长度
    typelength.each(function(index,e){
         //如果当前元素的子元素div小于2；
         if($(this).children("div").length<2){
             $(this).css("marginTop","3%");
         }
         else if($(this).children("div").length<3){
             $(this).css("marginTop","2%");
         }
         else {
             $(this).css("marginTop","0");
         }
    });
//    会员点击弹出菜单
    $(".new>p>span").click(function(){
       if($(this).parent().siblings("div").css("display")=="block"){
          $(this).parent().css("opacity","0.5").siblings("div").slideUp();
       }else{
           $(this).parent().css("opacity","1").siblings("div").slideDown();
       }
    });
 /*全部订单，待付款，待填写资料，服务中，已完成服务，待评价点击*/
 $(".order-list1").click(function(){
     $(this).css("borderBottom","3px solid #1cbcb4").siblings().css("borderBottom","3px solid transparent");
     $(".nav-list1").show().siblings(".navlist").hide();
 });
    $(".order-list2").click(function(){
        $(this).css("borderBottom","3px solid #1cbcb4").siblings().css("borderBottom","3px solid transparent");
        $(".nav-list2").show().siblings(".navlist").hide();
    });
    $(".order-list3").click(function(){
        $(this).css("borderBottom","3px solid #1cbcb4").siblings().css("borderBottom","3px solid transparent");
        $(".nav-list3").show().siblings(".navlist").hide();
    });
    $(".order-list4").click(function(){
        $(this).css("borderBottom","3px solid #1cbcb4").siblings().css("borderBottom","3px solid transparent");
        $(".nav-list4").show().siblings(".navlist").hide();
    });
    $(".order-list5").click(function(){
        $(this).css("borderBottom","3px solid #1cbcb4").siblings().css("borderBottom","3px solid transparent");
        $(".nav-list5").show().siblings(".navlist").hide();
    });
    $(".order-list6").click(function(){
        $(this).css("borderBottom","3px solid #1cbcb4").siblings().css("borderBottom","3px solid transparent");
        $(".nav-list6").show().siblings(".navlist").hide();
    });
//    页码
    $(".page>div").click(function(){
       $(this).css({"color":"#fff","background":"#1cbcb4"}).siblings("div").css({"color":"#000","background":"#fff"});
    });
})();