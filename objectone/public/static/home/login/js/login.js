/*会员登录页*/

//form表单绑定提交事件
function confirm(){
     if($("input[type='tel']").val()==""||$("input[type='tel']").val().length<11){
        $("input[type='tel']").siblings(".d6623d").show();
         $("input[type='tel']").focus();
        return false;
    }
    else if($("input[type='password']").val()==""||$("input[type='password']").val().length<6){
        $("input[type='password']").siblings(".d6623d").show();
         $("input[type='password']").focus();
        return false;
    }
    else if($("#input1").length <= 0||$("#input1").val() != code){
        $("#input1").siblings(".d6623d").show();
         $("#input1").focus();
        return false;
    }
    else {
        return true;
    }
}
(function(){
    //手机号
    $("input[type='tel']").blur(function(){
        if(($(this).val()==""||$(this).val().length<11)){
            $(this).siblings(".d6623d").show();
        }else{
            $(this).siblings(".d6623d").hide();
        }
    });
//    密码
    $("input[type='password']").blur(function(){
        if($(this).val()==""||$(this).val().length<6){
            $(this).siblings(".d6623d").show();
        }else {
            $(this).siblings(".d6623d").hide();
        }
    });
   // 验证码
    $("#input1").blur(function(){
        var inputCode = document.getElementById("input1").value;
        if (inputCode == null) {
            $(this).siblings(".d6623d").show();
        } else {
            $(this).siblings(".d6623d").hide();
        }
    });
})();
