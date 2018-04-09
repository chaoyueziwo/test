/*待办任务*/
/*表格拖动*/
function tableMethod(id) {
    var tTD; //用来存储当前更改宽度的Table Cell,避免快速移动鼠标的问题
    var table = id;
    for (j = 0; j < table.rows[0].cells.length; j++) {
        table.rows[0].cells[j].onmousedown = function () {
//记录单元格
            tTD = this;
            if (event.offsetX > tTD.offsetWidth - 10) {
                tTD.mouseDown = true;
                tTD.oldX = event.x;
                tTD.oldWidth = tTD.offsetWidth;
            }
//记录Table宽度
//table = tTD; while (table.tagName != ‘TABLE') table = table.parentElement;
//tTD.tableWidth = table.offsetWidth;
        };
        table.rows[0].cells[j].onmouseup = function () {
//结束宽度调整
            if (tTD == undefined) tTD = this;
            tTD.mouseDown = false;
            tTD.style.cursor = 'default';
        };
        table.rows[0].cells[j].onmousemove = function () {
//更改鼠标样式
            if (event.offsetX > this.offsetWidth - 10)
                this.style.cursor = 'col-resize';
            else
                this.style.cursor = 'default';
//取出暂存的Table Cell
            if (tTD == undefined) tTD = this;
//调整宽度
            if (tTD.mouseDown != null && tTD.mouseDown == true) {
                tTD.style.cursor = 'default';
                if (tTD.oldWidth + (event.x - tTD.oldX) > 0)
                    tTD.width = tTD.oldWidth + (event.x - tTD.oldX);
//调整列宽
                tTD.style.width = tTD.width;
                tTD.style.cursor = 'col-resize';
//调整该列中的每个Cell
                table = tTD;
                while (table.tagName != 'TABLE') table = table.parentElement;
                for (j = 0; j < table.rows.length; j++) {
                    table.rows[j].cells[tTD.cellIndex].width = tTD.width;
                }
//调整整个表
//table.width = tTD.tableWidth + (tTD.offsetWidth – tTD.oldWidth);
//table.style.width = table.width;
            }
        };
    }
}
//传入参数
tableMethod(document.getElementById("tb_1"));
tableMethod(document.getElementById("tb_2"));
tableMethod(document.getElementById("tb_3"));
tableMethod(document.getElementById("tb_4"));

//任务跟进表单提交事件
function save(){
   // 如果款项审核里的选项是请选择则禁止提交
   if($(".chose-box>span:first-child").text()=="请选择"){
      return false;
   }
   //如果textarea内容为空则返回禁止提交
   else if($(".feedback").val()==""){
    return false;
   }
   else{
       return true;
   }
}
// //任务分配表单提交事件
// function allot() {
//
// }
(function(){
    //获取当前屏幕高度
    var winhei = $(window).height();
    var winwid = $(window).width();
    $(".checklist").height(winhei);
    $(".maskbox").height(winhei);
    $(".maskbox").width(winwid);
    //待办任务菜单按钮
    $(".menu>div").click(function(){
        $(this).css({"borderBottom":"2px solid #0183be","color":"#0183be"});
        $(this).siblings("div").css({"borderBottom":"2px solid transparent","color":"#000"});
    });
    //    待办任务菜单切换点击
    $(".menubtn1").click(function(){
        $("#tb_1").show().siblings(".tb").hide();
    });
    $(".menubtn2").click(function(){
        $("#tb_2").show().siblings(".tb").hide();
    });
    $(".menubtn3").click(function(){
        $("#tb_3").show().siblings(".tb").hide();
    });
    $(".menubtn4").click(function(){
         $("#tb_4").show().siblings(".tb").hide();
    });
    //当屏幕改变的时候
    $(window).resize(function(){
      //获取当前宽度，减去底部工具栏46像素
      var winhei1 = $(window).height();
      //获取当前窗口宽度
      var winwid2 = $(window).width();
      //弹出菜单高度赋值当前高度
      $(".checklist").height(winhei1);
      //  遮罩层赋值当前高度
      $(".maskbox").height(winhei1);
     //    遮罩层赋值当前宽度
       $(".maskbox").width(winwid2);
    });
    //获取当前页面td，鼠标移入当前tr添加背景色
    $("td").mouseenter(function(){
        $(this).parent("tr").css("background","#e9f8ff");
    }).mouseleave(function(){
        $(this).parent("tr").css("background","#fff");
    });
    //未读信息点击隐藏
    $(".unread").click(function(){
       $(this).children().hide();
    });
    //任务名称，相关客户点击
    $(".check").click(function(){
        if($(".maskbox").css("display")=="none"){
            $(".maskbox").show().siblings(".checklist").show().animate({width:"900px"});
        }
        else{
            $(".maskbox").hide().siblings(".checklist").animate({width:"0"});
        }
    });
    $(".maskbox").click(function(){
        $(this).hide().siblings(".checklist").animate({width:"0"});
    });
//    弹出菜单关闭按钮
    $(".close").click(function(){
         $(this).parents(".checklist").hide().siblings(".maskbox").hide();
    });
//    核款任务里的订单号点击
    $(".ordernumber").click(function(){
        $(".correlationlist2").show().siblings(".correlationlist").hide();
        $(".screenshot").hide().children().hide();
        $(".downarrows").css("background","url(../img/ht-yctc-20180131-1734.png)no-repeat 0 -57px").siblings(".morelist").slideUp();
        $(".correlationbtn2").addClass("add").css({"borderTop":"2px solid #ddd","borderBottom":"1px solid #fff","borderLeft":"1px solid #ddd","borderRight":"1px solid #ddd"})
            .siblings().removeClass("add").css({"borderTop":"2px solid transparent","borderBottom":"1px solid #ddd","borderLeft":"1px solid transparent","borderRight":"1px solid transparent"});
    });
    //鼠标移入
    $(".correlation>div>div").hover(function(){
        if($(this).hasClass("add")){
            return false;
        }
        else{
            $(this).css({"background":"#f6f6f6","borderBottom":"1px solid #ddd"});
        }
    }).mouseleave(function(){
    //鼠标移除
        if($(this).hasClass("add")){
            $(this).css("background","#fff");
            return false;
        }else{
        $(this).css({"background":"#fff","borderBottom":"1px solid #ddd"});
        }
    });
//    任务相关，订单信息，会员信息，客户资料，更多点击切换
    $(".correlationbtn1").click(function(){
        $(".correlationlist1").show().siblings(".correlationlist").hide();
        $(".screenshot").hide().children().hide();
        $(".downarrows").css("background","url(../img/ht-yctc-20180131-1734.png)no-repeat 0 -57px").siblings(".morelist").slideUp();
        $(this).addClass("add").css({"borderTop":"2px solid #ddd","borderBottom":"1px solid #fff","borderLeft":"1px solid #ddd","borderRight":"1px solid #ddd"})
            .siblings().removeClass("add").css({"borderTop":"2px solid transparent","borderBottom":"1px solid #ddd","borderLeft":"1px solid transparent","borderRight":"1px solid transparent"});
    });
    $(".correlationbtn2").click(function(){
        $(".correlationlist2").show().siblings(".correlationlist").hide();
        $(".screenshot").hide().children().hide();
        $(".downarrows").css("background","url(../img/ht-yctc-20180131-1734.png)no-repeat 0 -57px").siblings(".morelist").slideUp();
        $(this).addClass("add").css({"borderTop":"2px solid #ddd","borderBottom":"1px solid #fff","borderLeft":"1px solid #ddd","borderRight":"1px solid #ddd"})
            .siblings().removeClass("add").css({"borderTop":"2px solid transparent","borderBottom":"1px solid #ddd","borderLeft":"1px solid transparent","borderRight":"1px solid transparent"});
    });
    $(".correlationbtn3").click(function(){
        $(".correlationlist3").show().siblings(".correlationlist").hide();
        $(".screenshot").hide().children().hide();
        $(".downarrows").css("background","url(../img/ht-yctc-20180131-1734.png)no-repeat 0 -57px").siblings(".morelist").slideUp();
        $(this).addClass("add").css({"borderTop":"2px solid #ddd","borderBottom":"1px solid #fff","borderLeft":"1px solid #ddd","borderRight":"1px solid #ddd"})
            .siblings().removeClass("add").css({"borderTop":"2px solid transparent","borderBottom":"1px solid #ddd","borderLeft":"1px solid transparent","borderRight":"1px solid transparent"});
    });
    $(".correlationbtn4").click(function(){
        $(".correlationlist4").show().siblings(".correlationlist").hide();
        $(".screenshot").hide().children().hide();
        $(".downarrows").css("background","url(../img/ht-yctc-20180131-1734.png)no-repeat 0 -57px").siblings(".morelist").slideUp();
        $(this).addClass("add").css({"borderTop":"2px solid #ddd","borderBottom":"1px solid #fff","borderLeft":"1px solid #ddd","borderRight":"1px solid #ddd"})
            .siblings().removeClass("add").css({"borderTop":"2px solid transparent","borderBottom":"1px solid #ddd","borderLeft":"1px solid transparent","borderRight":"1px solid transparent"});
    });
    $(".correlationbtn5").click(function(){
        if($(this).children(".morelist").css("display")=="none"){
            $(this).children(".downarrows").css("background","url(../img/ht-yctc-20180131-1734.png)no-repeat 0 -73px").siblings(".morelist").slideDown();
        }else{
            $(this).children(".downarrows").css("background","url(../img/ht-yctc-20180131-1734.png)no-repeat 0 -57px").siblings(".morelist").slideUp();
        }
    });
    //核款任务更多菜单点击其他范围，子元素弹出菜单元素隐藏
    $(".correlationbtn5").on("click", function(e){
        $(document).one("click", function(){
            $(".downarrows").css("background","url(../img/ht-yctc-20180131-1734.png)no-repeat 0 -57px").siblings(".morelist").slideUp();
        });
        e.stopPropagation();
    });
    $(".morelist").on("click", function(e){
        e.stopPropagation();
    });
    //核款任务里的更多弹出菜单内容选择
    $(".morelist>div").click(function(){
        $(this).parents(".correlationbtn5").addClass("add").css({"borderTop":"2px solid #ddd","borderBottom":"1px solid #fff","borderLeft":"1px solid #ddd","borderRight":"1px solid #ddd"})
            .siblings().removeClass("add").css({"borderTop":"2px solid transparent","borderBottom":"1px solid #ddd","borderLeft":"1px solid transparent","borderRight":"1px solid transparent"});
        $(".correlationbtn5").children(".downarrows").css("background","url(../img/ht-yctc-20180131-1734.png)no-repeat 0 -57px");
        $(this).parent(".morelist").slideUp();
    });
    $(".morelist>div").mouseenter(function(){
        if($(this).parent(".morelist").is(":visible")){
            $(this).css("background","#f6f6f6").parents(".correlationbtn5").css("background","#fff");
        }
    }).mouseleave(function(){
        $(this).css("background","#fff").parents(".correlationbtn5").css("background","#fff");
    });
//    任务相关里的付款信息点击缩上去
    $(".paymessage>p>span").click(function(){
        if($(this).parent().next().is(":visible")){
            $(this).siblings(".down").css("background","url(../img/ht-yctc-20180131-1734.png)no-repeat 0 -25px").parent().siblings().slideUp();
            if($(this).hasClass("down")){
                $(this).css("background","url(../img/ht-yctc-20180131-1734.png)no-repeat 0 -25px").parent().siblings().slideUp();
            }
        }
       else{
            $(this).siblings(".down").css("background","url(../img/ht-yctc-20180131-1734.png)no-repeat 0 -40px").parent().siblings().slideDown();
            if($(this).hasClass("down")){
                $(this).css("background","url(../img/ht-yctc-20180131-1734.png)no-repeat 0 -40px").parent().siblings().slideDown();
            }
        }
    });
//    付款截图点击
    $(".payphoto").click(function(){
        //获取弹出菜单的高度和宽度
        var clheight =$(".checklist").height();
        var clwidth = $(".checklist").width();
        if($(".screenshot").css("display")=="none"){
            $(".screenshot").height(clheight).width(clwidth + 2).show().children().show();
        }else{
            $(".screenshot").height(clheight).width(clwidth + 2).hide().children().hide();
        }
    });
    //付款截图，点击其他范围，图片及遮罩层隐藏
    $(".payphoto").on("click", function(e){
        $(".screenshot").show().children().show();
        $(document).one("click", function(){
            $(".screenshot").hide().children().hide();
        });
        e.stopPropagation();
    });
    //付款截图显示绑定事件.点击当前图片区域外，停止事件冒泡
    $(".screenshot>div").on("click", function(e){
        e.stopPropagation();
    });
//    付款截图里的关闭按钮
    $(".closed").click(function(){
        $(this).parent().hide().parent(".screenshot").hide();
    });
//    跟进任务点击
    $(".followbtn").click(function(){
        if($(".followtask-list").css("display")=="none"){
            $(".followtask-list").show().children(".follow1").show().siblings().hide();
        }else{
            $(".followtask-list").hide();
        }
    });
//    分配任务点击
    $(".allotbtn").click(function(){
        if($(".followtask-list").css("display")=="none"){
            $(".followtask-list").show().children(".follow2").show().siblings().hide();
        }else{
            $(".followtask-list").hide();
        }
    });
    //距离任务时间下面的订单信息里的公司点击客户资料显示
    $(".blue").click(function(){
        $(".correlationlist4").show().siblings(".correlationlist").hide();
        $(".screenshot").hide().children().hide();
        $(".downarrows").css("background","url(../img/ht-yctc-20180131-1734.png)no-repeat 0 -57px").siblings(".morelist").slideUp();
        $(".correlationbtn4").addClass("add").css({"borderTop":"2px solid #ddd","borderBottom":"1px solid #fff","borderLeft":"1px solid #ddd","borderRight":"1px solid #ddd"})
            .siblings().removeClass("add").css({"borderTop":"2px solid transparent","borderBottom":"1px solid #ddd","borderLeft":"1px solid transparent","borderRight":"1px solid transparent"});
    });
//    订单进度点击
    $(".cut-off-bottom>div:first-child>span:first-child").click(function(){
         if($(this).parent().siblings().is(":visible")){
             $(this).parent().children(".down").css("background","url(../img/ht-yctc-20180131-1734.png)no-repeat 0 -25px");
             $(this).parent().siblings().slideUp();
         }else{
             $(this).parent().children(".down").css("background","url(../img/ht-yctc-20180131-1734.png)no-repeat 0 -40px");
             $(this).parent().siblings().slideDown();
         }
    });
    //任务分配取消分配按钮
    $(".cancel").click(function(){
        $(this).parents(".followtask-list").hide();
        $(".hint").hide();
        $(".feedback").val("");
        $(".chosebtn,.chosebtn1").css("border","1px solid #0183be").text("选择").siblings("span").text("");
        $(".chose-box>span:first-child").text("请选择").css("color","#b1b0b0");
    });
//    任务跟进的关闭按钮 点击任务执行人，选择截止时间内容清空，任务加急请选择菜单栏复位
    $(".followtask-list-close").click(function(){
        $(this).parents(".followtask-list").hide();
        $(".hint").hide();
        $(".feedback").val("");
        $(".chosebtn,.chosebtn1").css("border","1px solid #0183be").text("选择").siblings("span").text("");
        $(".chose-box>span:first-child").text("请选择").css("color","#b1b0b0");
    });
//    任务跟进款项审核请选择窗口
    $("#chose-box2").click(function(){
        if($(this).children("div").css("display")=="none"){
            $(this).children("div").slideDown();
        }else{
            $(this).children("div").slideUp();
        }
    });
//       任务跟进里的款项审核弹窗框的内容
    $("#chose-box2>div>div").click(function(){
       // 获取当前点击内容的文本
       var nav =$(this).text();
       //请选择的文本替换点击的当前文本
       $("#chose-box2>span:first-child").text(nav).css("color","#000");
    });
    //    款项审核已到账选择框点击提示文字
    $(".arrive").click(function(){
        $("#chose-box2").siblings(".hint").hide();
    });
    //    款项审核未到账选择框点击提示文字
    $(".nointo").click(function(){
        $("#chose-box2").siblings(".hint").show().children("span").text("未到账");
    });
    //    款项审核金额有误选择框点击提示文字
    $(".mistake").click(function(){
        $("#chose-box2").siblings(".hint").show().children("span").text("金额有误");
    });
    //任务分配任务执行人点击按钮
    $(".chosebtn").click(function(){
        $(".choselist").show().children(".executes1").show().siblings().hide();
    });
    //分配任务启用截止时间点击按钮
    $(".chosebtn1").click(function(){
        $(".choselist").show().children(".executes2").show().siblings().hide();
    });
    //分配任务启用任务加急
    $("#chose-box1").click(function(){
        if($(this).children("div").css("display")=="none"){
            $(this).children("div").slideDown();
        }else{
            $(this).children("div").slideUp();
        }
    });
    //任务分配启用任务加急弹出框里的内容点击
    $("#chose-box1>div>div").click(function(){
        var Thistext = $(this).text();
        $("#chose-box1>span:first-child").text(Thistext).css("color","#000");
    });
    // 任务分配选择执行人所有部门弹窗窗口
    $(".allsection").click(function(){
       if($(this).children(".department").css("display")=="none"){
          $(this).children(".department").slideDown();
       }else{
           $(this).children(".department").slideUp();
       }
    });
    //任务分配选择执行人所有部门弹窗里的div点击，选择框文本替换为当前文本
    $(".department>div").click(function(){
        var all = $(".allsection>span:first-child");
        all.text($(this).text());
    });
    //任务分配选择执行人所有部门弹窗里的各部门点击，相应的成员显示
    //所有部门成员
    $(".all").click(function(){
        $(".member>div").show();
    });
    //会计部
    $(".accountant").click(function(){
        $(".accountantlist").show().siblings("div").not(".accountantlist").hide();
    });
    //工商部
    $(".industry").click(function(){
        $(".industrylist").show().siblings("div").not(".industrylist").hide();
    });
    //财务部
    $(".finance").click(function(){
        $(".financelist").show().siblings("div").not(".financelist").hide();
    });
    //市场部
    $(".market").click(function(){
        $(".marketlist").show().siblings("div").not(".marketlist").hide();
    });
    //总经办
    $(".manager").click(function(){
        $(".managerlist").show().siblings("div").not(".managerlist").hide();
    });
    //税务部
    $(".tax").click(function(){
        $(".taxlist").show().siblings("div").not(".taxlist").hide();
    });
    //外勤部
    $(".legwork").click(function(){
        $(".legworklist").show().siblings("div").not(".legworklist").hide();
    });
    //企划部
    $(".layout").click(function(){
        $(".layoutlist").show().siblings("div").not(".layoutlist").hide();
    });
    //人力资源
    $(".hr").click(function(){
        $(".hrlist").show().siblings("div").not(".hrlist").hide();
    });
    //选择执行人成员选中
    $(".member>div").click(function(){
       $(this).addClass("chosed").siblings().removeClass("chosed");
    });
    //选择执行人关闭按钮
    $(".executes-close").click(function(){
        $("#test5").attr("placeHolder","请选择截止时间");
       $(this).parents(".choselist").hide();
    });
    //选择执行人取消按钮
    $(".executorcancel").click(function(){
        $("#test5").attr("placeHolder","请选择截止时间");
       $(this).parents(".choselist").hide();
    });
    //选择执行人确认按钮
    $(".executes1 .executoraffirm").click(function(){
        var chosed =$(".chosed>span:last-child").text();
        $(this).parents(".choselist").hide();
        $(".taskexecutor").text(chosed);

        if(chosed==''){
            $(".chosebtn").text("选择");
        }else{
            $(".chosebtn").text("修改").css("border","1px solid transparent");
        }
    });
    //选择截止时间确认按钮
    $(".executes2 .executoraffirm").click(function(){
         var timeval = $("#test5").val();
         $(this).parents(".choselist").hide();
         if($("#test5").val()==''){
             $(".executoraffirm").parents(".choselist").hide();
         }else{
             $(".cut-off-time").text(timeval);
             $(".executoraffirm").parents(".choselist").hide();
             $(".chosebtn1").text("修改").css("border","1px solid transparent");
         }
    });
})();