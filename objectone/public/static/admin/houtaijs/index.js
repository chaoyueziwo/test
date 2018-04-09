/*管理栏目*/
/*组织管理*/
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
(function(){
//    增加栏目点击效果
    $(".newplus").click(function(){
        $(".masks").show().find(".tissue-box").show();
    });
//    增加栏目旁边设置按钮
    $(".settingico").click(function(){
       $(".masks").show();
    });
//  新增组织弹窗里的上级组织选项框
    $(".option-box").click(function(){
        if($(".option-box-list").css("display")=="none"){
            $(this).children(".downico").css("background","url(../img/ht-yctc-20180131-1734.png)no-repeat 1px -72px").siblings(".option-box-list").slideDown();
        }else{
            $(this).children(".downico").css("background","url(../img/ht-yctc-20180131-1734.png)no-repeat 1px -55px").siblings(".option-box-list").slideUp();
        }
    });
//  新增组织弹窗里的上级组织选项框弹窗
    $(".option-box-list>div").click(function(){
        $(".option-box>div:first-child").text($(this).text()).siblings(".downico").css("background","url(../img/ht-yctc-20180131-1734.png)no-repeat 1px -72px");
    });
//负责人选择框点击内容当前文本切换
    $(".principal-list>span").click(function(){
        $(".search-box>input").val($(this).text());
    });
//新增组织弹窗关闭按钮
    $(".close").click(function(){
        $(this).parents(".tissue-box").hide();
        $(this).parents(".masks").hide();
    });
    $(".cancel").click(function(){
        $(this).parents(".tissue-box").hide().parents(".masks").hide();
    });
// 首行部门折叠效果
    // $("#tb_1>tbody:nth-child(2)>tr>.minu>span").click(function(){
    //     if($(this).parents("tbody").next("tbody").is(":visible")){
    //         $(this).text("+").parents("tbody").siblings("tbody").hide();
    //     }else{
    //         $(this).text("-").parents("tbody").siblings("tbody").show();
    //     }
    // });
//    各部门折叠效果
    $(".sectionlist>.minu>span").click(function(){
        if($(this).parents("tr").next().is(":visible")){
            $(this).text("+").parents("tr").siblings("tr").hide();
            $(this).parents("tr").siblings("tr").children(".minu").children("span").text("-");
        }else{
            $(this).text("-").parents("tr").siblings("tr").show();
        }
    });
//    各组折叠效果
    $(".sectionlist-list>.minu>span").click(function(){
        if($(this).parents("tr").next(".sectionlist-list-list").is(":visible")){
            $(this).text("+").parents("tr").siblings(".sectionlist-list-list").hide();
        }else{
            $(this).text("-").parents("tr").siblings(".sectionlist-list-list").show();
        }
    });
    $(".sectionlist-list2>.minu>span").click(function(){
        if($(this).parents("tr").siblings(".sectionlist-list-list2").is(":visible")){
            $(this).text("+").parents("tr").siblings(".sectionlist-list-list2").hide();
        }else{
            $(this).text("-").parents("tr").siblings(".sectionlist-list-list2").show();
        }
    });
    $(".sectionlist-list3>.minu>span").click(function(){
        if($(this).parents("tr").siblings(".sectionlist-list-list3").is(":visible")){
            $(this).text("+").parents("tr").siblings(".sectionlist-list-list3").hide();
        }else{
            $(this).text("-").parents("tr").siblings(".sectionlist-list-list3").show();
        }
    });
    $(".sectionlist-list4>.minu>span").click(function(){
        if($(this).parents("tr").siblings(".sectionlist-list-list4").is(":visible")){
            $(this).text("+").parents("tr").siblings(".sectionlist-list-list4").hide();
        }else{
            $(this).text("-").parents("tr").siblings(".sectionlist-list-list4").show();
        }
    });
    $(".sectionlist-list5>.minu>span").click(function(){
        if($(this).parents("tr").siblings(".sectionlist-list-list5").is(":visible")){
            $(this).text("+").parents("tr").siblings(".sectionlist-list-list5").hide();
        }else{
            $(this).text("-").parents("tr").siblings(".sectionlist-list-list5").show();
        }
    });
//    表格所有删除按钮
    $("#tb_1>tbody>tr>td .dele").click(function(){
        $(".masks").show();
        $(this).siblings(".dele-box").show();
    });
//    表格弹窗关闭按钮
    $(".dele-box .close").click(function(){
        $(".masks").hide();
        $(this).parents(".dele-box").hide();
    });
//    表格删除弹窗确认删除
    $(".confirmdele>span:first-child").click(function(){
        $(".masks").hide();
        $(this).parents(".dele-box").hide();
        if($(this).parents("tr").hasClass("sectionlist")){
            $(this).parents("tbody").children("tr").remove();
        }else if($(this).parents("tr").hasClass("sectionlist-list")){
            $(this).parents("tr").nextAll(".sectionlist-list-list").remove();
            $(this).parents("tr").remove();
        }else if($(this).parents("tr").hasClass("sectionlist-list2")){
            $(this).parents("tr").nextAll(".sectionlist-list-list2").remove();
            $(this).parents("tr").remove();
        }else if($(this).parents("tr").hasClass("sectionlist-list-list")||$(this).parents("tr").hasClass("sectionlist-list-list2")){
           $(this).parents("tr").remove();
        } else{
            $(this).parents("table").children("tbody").remove();
        }
    });
//    表格删除弹窗取消按钮
    $(".confirmdele>span:last-child").click(function(){
        $(".masks").hide();
        $(this).parents(".dele-box").hide();
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