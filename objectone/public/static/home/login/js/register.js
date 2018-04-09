/*注册页面*/
   /* //form表单绑定提交事件
    function confirm(){
        if(($("input[type='tel']").val().length<11)||$("input[type='tel']").val()==""){
            $("input[type='tel']").siblings(".d6623d").show();
            $("input[type='tel']").focus();
            return false;
        }
        else if($("input[type='email']").val()==""){
            $("input[type='email']").siblings(".d6623d").show();
            $("input[type='email']").focus();
            return false;
        }
        else if($(".named").val()==""){
            $(".named").siblings(".d6623d").show();
            $(".named").focus();
            return false;
        }
        else if($("input[type='password']").val()==""||$("input[type='password']").val().length<6){
            $("input[type='password']").siblings(".d6623d").show();
            $("input[type='password']").focus();
            return false;
        }
        else if($(".verify").val()!=$("input[type='password']").val()||$(".verify").val()==""){
            $(".verify").siblings(".d6623d").show();
            $(".verify").focus();
            return false;
        }
        else {
            return true;
        }
}
//只能输入手机
function isMobile(obj){
    reg=/^(\+\d{2,3}\-)?\d{11}$/;
    if(!reg.test(obj)){
        $(".phone").siblings(".d6623d").show();
    }
    else if($("input[type='tel']").val()==""||$("input[type='tel']").val()<11){
        $(".phone").siblings(".d6623d").show();
    }
    else{
        $(".phone").siblings(".d6623d").hide();
    }
}
//手机验证码
//邮箱验证码
function isEmail(obj){
    reg=/^\w{3,}@\w+(\.\w+)+$/;
    if(!reg.test(obj)){
        $("input[type='email']").siblings(".d6623d").show();
    }else{
        $("input[type='email']").siblings(".d6623d").hide();
    }
}
(function(){
    //手机号
    $(".phone").blur(function(){
        isMobile($(this).val());
    });
    //邮箱信息
    $("input[type='email']").blur(function(){
        isEmail($(this).val());
    });
    //姓名称呼
    $(".named").blur(function(){
        if($(this).val()==""){
            $(this).siblings(".d6623d").show();
        }
        else{
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
//    确认密码
    $(".verify").blur(function(){
       var pass = $("input[type='password']").val();
       var passThis = $(this).val();
       if(passThis!=pass||passThis==""){
           $(this).siblings(".d6623d").show();
       }else {
           $(this).siblings(".d6623d").hide();
       }
    });
})();*/