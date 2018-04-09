/*增加流程*/
/*submitting发生提交事件*/
function submitting(){
    if($(".columnname").val()==""){
        $(".columnname").parent().next().show().css("color","red").text("请输入栏目名");
        $(".columnname").focus();
    }
    if($(".keyword").val()==""){
        $(".keyword").next().show().css("color","red");
        $(".keyword").focus();
    }
    if($(".columnname").val()==""||$(".keyword").val()==""){
        return false;
    }
    return true;
}
//增加栏目里的表单验证
function missionsubmit(){
    if($(".missionname").val()==""){
        $(".hint").css("display","inline");
        return false;
    }else{
        return true;
    }
}
(function(){
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
            $(this).parent().next().show().css("color","red").text("请输入栏目名");
        } else{
            $(this).parent().next().show().css("color","green").text("可以使用");
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
//    任务管理任务点击
    $(".mission-list-list").click(function(){
        $(this).css("border","1px solid #0183be").siblings().css("border","1px solid #ddd");
    });
//    任务管理禁用点击
    $(".mission-list-list>div:last-child>span:first-child").click(function(){
        if($(this).text()=="禁用"){
            $(this).text("启用").parent("div").siblings("div").css("color","#ddd");
        }else{
            $(this).text("禁用").parent("div").siblings("div").css("color","#000");
        }
    });
//    任务管理修改按钮
    $(".amendbtn").click(function(){
        $(".masks").show();
        $(".newly-box").show();
    });
//    任务管理删除按钮
    $(".delebtn").click(function(){
       $(this).parents(".mission-list-list").remove();
    });
//    新增任务
    $(".newly").click(function(){
       $(".masks").show();
       $(".newly-box").show();
    });
//    新增任务任务名称焦点事件
    $(".missionname").blur(function(){
       if($(this).val()==""){
           $(".hint").css("display","inline");
       }else{
           $(".hint").css("display","none");
       }
    });
//    上移下移按钮
    $(document).on('click', '.sort-down', function(){
        //判断是否有下一个节点
        if($(this).parents('.mission-list-list').nextAll().length > 0){
            $(this).parents('.mission-list-list').next().after($(this).parents('.mission-list-list').prop('outerHTML'));
            $(this).parents('.mission-list-list').remove();
        }
    }).on('click', '.sort-asc', function(){
        //判断是否有上一个节点
        if($(this).parents('.mission-list-list').prevAll().length > 0){
            $(this).parents('.mission-list-list').prev().before($(this).parents('.mission-list-list').prop('outerHTML'));
            $(this).parents('.mission-list-list').remove();
        }
    });
//    新增任务弹窗关闭按钮
    $(".newly-box .close").click(function(){
       $(this).parents(".newly-box").hide().parents(".masks").hide();
    });
//    新增任务弹窗取消按钮
    $(".newly-box-bottom>div:last-child>span").click(function(){
        $(this).parents(".newly-box").hide().parents(".masks").hide();
    });
})();