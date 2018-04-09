/*专题管理*/
/*管理栏目*/
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
// tableMethod(document.getElementById("tb_2"));
// tableMethod(document.getElementById("tb_3"));
// tableMethod(document.getElementById("tb_4"));




// var i = 1;
// var aaa = $(".column");
// for(var k = 0; k < aaa.length; k++){
//     $(aaa[k]).addClass("column" + i);
// }
/*折叠效果*/
// $(".minusFirst").click(function(){
//     //var a ="+";
//     //var b="-";
//     //if($(this).parent().siblings(".minuslist").css("display")=="none"){
//     //    $(this).text(b);
//     //}else{
//     //    $(this).text(a);
//     //}
//     //$(this).parents().siblings(".minuslist").toggle();
//     var n = $(".column");
//     if(n.next().css("display") == "none"){
//         $(this).text("-");
//         n.show();
//     }else{
//         $(this).text("+");
//         n.hide().eq(0).show();
//     }
// });
//
// var i = 0;
// $("#addColumn-btn").on("click",function(){
//     // var str = '';
//     // str += '<tr>';
//     // str += '<td><input type="checkbox"></td>';
//     // str += '<td>1</td>';
//     // str += '<td><input type="number"></td>';
//     // str += '<td class="lanse">公司注册</td>';
//     // str += '<td>注册深圳公司_免费扶持创业者注册公司</td>';
//     // str += '<td>';
//     // str += '<span class="lanse">修改</span>';
//     // str += '<span class="lanse">复制</span>';
//     // str += '<span class="lanse">删除</span>';
//     // str += '</td>';
//     // str += '</tr>';
//     i++;
//     var a = '';
//     a += '<tr>';
//     a += '<td><input type="checkbox"></td>';
//     a += "<td>"+i+"</td>";
//     a += '<td><input type="number"></td>';
//     a += '<td class="lanse">有限公司注册</td>';
//     a += '<td>注册深圳公司_免费扶持创业者注册公司</td>';
//     a += '<td>';
//     a += '<span class="lanse">修改</span>';
//     a += '<span class="lanse">&nbsp;复制</span>';
//     a += '<span class="lanse">&nbsp;删除</span>';
//     a += '</td>';
//     a += '</tr>';
//     $("#tb_1").append(a);
// });
//
//
//
// function addColumnFun(obj,i){
//     var a = ".columnI"+i;
//     console.log(a);
//     $(obj).parent().parent().siblings(a).show();
// }