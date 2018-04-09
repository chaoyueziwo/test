/*管理自定义列表*/
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
table = tTD;
            while (table.tagName != 'TABLE') table = table.parentElement;
tTD.tableWidth = table.offsetWidth;
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
//form表单绑定提交事件
function confirm(){
    if($("#phone").val()==""||$("#phone").val().length<11){
        $("#phone").siblings(".orange").show();
        $("#phone").focus();
        return false;
    }
    else if($(".check1").val()==""||$(".check1").val().length<6){
        $(".check1").siblings(".orange").show();
        $(".check1").focus();
        return false;
    }
    else if($(".check2").val()==""||$(".check2").val() != $(".check1").val()||$(".check2").val().length<6){
        $(".check2").siblings(".orange").show();
        $(".check2").focus();
        return false;
    }
    else {
        return true;
    }
}
(function () {
    $(".menubtn1").click(function(){
        $(this).css("color","#0183be").siblings("div").css("color","#000");
        //$("#tb_1").show().siblings("#tb_2").hide();
    });
    $(".menubtn2").click(function(){
        $(this).css("color","#0183be").siblings("div").css("color","#000");
        //$("#tb_2").show().siblings("#tb_1").hide();
    });
    //    新增点击效果
    $(".newplus").click(function(){
        $(".masks").show().find(".tissue-box").show();
    });
    //增加用户弹窗关闭按钮
    $(".close").click(function(){
        $(this).parents(".tissue-box").hide().parents(".masks").hide();
    });
    $(".cancel").click(function(){
        $(this).parents(".tissue-box").hide().parents(".masks").hide();
    });
//    增加用户表单验证
    //手机号
    $("#phone").blur(function(){
        if(($(this).val()==""||$(this).val().length<11)){
            $(this).siblings(".orange").show();
        }else{
            $(this).siblings(".orange").hide();
        }
    });
//    密码
    $(".check1").blur(function(){
        if($(this).val()==""||$(this).val().length<6){
            $(this).siblings(".orange").show();
        }else {
            $(this).siblings(".orange").hide();
        }
    });
    $(".check2").blur(function(){
        var checkpw =$(".check1").val();
        if($(this).val()==""||$(this).val()!=checkpw||$(this).val().length<6){
            $(this).siblings(".orange").show();
        }else {
            $(this).siblings(".orange").hide();
        }
    });
    /*显示的元素全选反选*/
    $("#all").change(function(){
        if($("#all").is(":checked")){
            $("td:visible input").prop("checked",true);//全选
            $(".all:visible").prop("checked",true);
            $(".bottombtn").show();
        }else{
            $("td:visible input").prop("checked",false);  //取消全选
            $(".all:visible").prop("checked",false);
            $(".bottombtn").hide();
        }
    });
    $(".all").change(function(){
        if($(".all").is(":checked")){
            $(this).parent().parent().siblings("tr").children("td").children("input").prop("checked",true);//全选
            $("#all").prop("checked",true);
            $(".bottombtn").show();
        }else{
            $(this).parent().parent().siblings("tr").children("td").children("input").prop("checked",false);  //取消全选
            $("#all").prop("checked",false);
            $(".bottombtn").hide();
        }
    });
//    序号被选中时，底部按钮显示
    $("td input").change(function(){
        if($("td:visible input").is(":checked")){
            $(".bottombtn").show();
        }else{
            $(".bottombtn").hide();
        }
    });
})();