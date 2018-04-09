/*增加产品*/
/*submitting发生提交事件*/
function submitting(){
    if($(".columnname").val()==""){
        $(".columnname").next().show().css("color","red").text("请输入栏目名")
        $(".columnname").focus();
        return false;
    }
    else if($(".columnname").val()==""||$(".keyword").val()==""){
        return false;
    }
    else {
        return true;
    }
}
(function(){
/*栏目名称判断为空则提示，否则隐藏*/
$(".columnname").blur(function(){
   if($(".columnname").val()==""){
       $(this).next().show().css("color","red").text("请输入栏目名");
   } else{
       $(this).next().show().css("color","green").text("可以使用");
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
    $("#file2").change(function(){
        var str2 =  $(this).val();
        var arr2 =str2.split("\\");
        var my2 = arr2[arr2.length-1];
        $("#text2").val(my2);
    });
    $("#file3").change(function(){
        var str3 =  $(this).val();
        var arr3 =str3.split("\\");
        var my3 = arr3[arr3.length-1];
        $("#text3").val(my3);
    });
//    全选按钮
$("#all").change(function(){
    var all = 0;
    $("#tb_1 input[type='checkbox']").each(function(i) {
        all++;
        $(".cheng").text(all);
    });
    if($(this).is(":checked")){
        $("#tb_1 input[type='checkbox']").prop("checked",true);
        $(".cheng").text(all);
    }else{
        $("#tb_1 input[type='checkbox']").prop("checked",false);
        $(".cheng").text("0");
    }
});
//    序号全部选中时，底部全选被选中
$("#tb_1 input[type='checkbox']").change(function(){
    var allChecked = 0;//所有选中checkbox的数量
    var all = 0;//所有checkbox的数量
    var change = $(".cheng");//选中个数
    $("#tb_1 input[type='checkbox']").each(function(i) {
        all++;
        if ($(this).is(":checked")) {
            allChecked++;
        }
        change.text(allChecked);
    });
    if(allChecked==all){//相等时，则所有的checkbox都选中了，否则，反之；
        $("#all").prop("checked",true);
    }else{
        $("#all").prop("checked",false);
    }
});
})();