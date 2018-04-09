/*增加栏目*/
$(".call").hide();
/*热搜隐藏*/
$(".resoulist").hide();
$(".calllist").change(function(){
        $(".caption").hide();
        $(".call").show();
});
$(".captionlist").change(function(){
    $(".caption").show();
    $(".call").hide();
});
/*当导航显示按钮被激活热搜显示，否则隐藏*/
$(".resou").change(function(){
           $(".resoulist").show();
});
$(".resou").siblings("input").change(function(){
    $(".resoulist").hide();
});
/*栏目名称判断为空则提示，否则隐藏*/
$(".columnname").blur(function(){
   if($(".columnname").val()==""){
       $(this).siblings("span").show().css("color","red").text("请输入栏目名");
   } else{
       $(this).siblings("span").show().css("color","green").text("可以使用");
   }
});
/*获取栏目名称里的值*/
$(".columntitle").blur(function(){
    if($(".columntitle").val()==""){
        $(this).val($(".columnname").val());
    }
});
$(".keyword").blur(function(){
    if($(".keyword").val()==""){
        $(this).next(".redwarn").show().css("color","red");
    }else{
        $(this).next(".redwarn").show().css("color","green");
    }
});
$("#file1").change(function(){
    var str =  $(this).val();
    var arr =str.split("\\");
    var my = arr[arr.length-1];
    $("#text").val(my);
});
/*submitting发生提交事件*/
function submitting(){
    if($(".columnname").val()==""){
        $(".columnname").parent().next().show().css("color","red").text("请输入栏目名");
    }

    if($(".keyword").val()==""){
        $(".keyword").next().show().css("color","red");
    }
    if($(".columnname").val()==""||$(".keyword").val()==""){
        return false;
    }
        return true;
}
