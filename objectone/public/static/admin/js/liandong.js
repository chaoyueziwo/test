
/**
 * Created by Administrator on 14-12-01.
 * 模拟淘宝SKU添加组合
 * 页面注意事项：
 *      1、 .div_contentlist   这个类变化这里的js单击事件类名也要改
 *      2、 .Father_Title      这个类作用是取到所有标题的值，赋给表格，如有改变JS也应相应改动
 *      3、 .Father_Item       这个类作用是取类型组数，有多少类型就添加相应的类名：如: Father_Item1、Father_Item2、Father_Item3 ...
 */
$(function () {
    //SKU信息
    $(".div_contentlist label").bind("change", function (obj) {
        step.Creat_Table();
    });
    var step = {
        //SKU信息组合
        Creat_Table: function () {
            step.hebingFunction();
            var SKUObj = $(".Father_Title");
            //var skuCount = SKUObj.length;//
            var arrayTile = new Array();//标题组数
            var arrayInfor = new Array();//盛放每组选中的CheckBox值的对象
            var arrayColumn = new Array();//指定列，用来合并哪些列
            var bCheck = true;//是否全选
            var columnIndex = 0;
            $.each(SKUObj, function (i, item){
                
                arrayColumn.push(columnIndex);
                columnIndex++;


                var itemName = "Father_Item" + i;

                var isSetFlag = 0;
                //选中的CHeckBox取值
                var order = new Array();
                $("." + itemName + " input[type=checkbox]:checked").each(function (){

                    if(isSetFlag == 0){
                        arrayTile.push(SKUObj.find("li").eq(i).html().replace("：", ""));
                        isSetFlag = 1;
                    }
                    
                    order.push($(this).val());
                });
                arrayInfor.push(order);
                // console.log("order:"+order);
                // console.log("arrayInfo:"+arrayInfor);
                // alert(arrayInfor);
                // alert( "-----"+order.join() );

                if (order.join() == ""){

                    //bCheck = false;
                }

                index = 0;
                var skuValue = SKUObj.find("li").eq(index).html();
                // arrayTile = '{$title}';
                // arrayInfor = '{$title}';
            });

            titleLength = arrayTile.length;
            //开始创建Table表
            if (bCheck == true) {
                var RowsCount = 0;
                $("#createTable").html("");
                var table = $("<table id=\"process\" border=\"1\" cellpadding=\"1\" cellspacing=\"0\" style=\"width:100%;padding:5px;\"></table>");
                table.appendTo($("#createTable"));
                var thead = $("<thead></thead>");
                thead.appendTo(table);
                var trHead = $("<tr></tr>");
                trHead.appendTo(thead);
                //创建表头
                $.each(arrayTile, function (index, item) {
                    var td = $("<th>" + item + "</th>");
                    td.appendTo(trHead);
                });

                if(arrayTile.length != 0){
                    var itemColumHead = $("<th  style=\"width:70px;\">价格</th><th style=\"width:70px;\">发布</th> ");
                    itemColumHead.appendTo(trHead);
                }

                //var itemColumHead2 = $("<td >商家编码</td><td >商品条形码</td>");
                //itemColumHead2.appendTo(trHead);
                var tbody = $("<tbody></tbody>");
                tbody.appendTo(table);
                console.log("arrayInfor:"+arrayInfor);

                var tempIndex = 0;
                var tempArray = new Array();
                for( var i=0; i<arrayInfor.length; i++ ){

                    if(arrayInfor[i] != ""){
                        tempArray[tempIndex] = arrayInfor[i];
                        tempIndex += 1;

                    }

                }

                ////生成组合
                // var zuheDate = step.doExchange(arrayInfor);
                var zuheDate = step.doExchange(tempArray);
                var attrPrices = {$attrPrices};
                console.log("attrPrices:"+attrPrices);

                if (zuheDate.length > 0) {
                    //创建行
                    console.log("index:"+index);
                    $.each(zuheDate, function (index, item) {
                        console.log("item:"+item);
                        var td_array = item.split(",");
                        console.log("td_array:"+td_array);
                        var tr = $("<tr></tr>");
                        tr.appendTo(tbody);

                        var attrIdArray = new Array();

                        $.each(td_array, function (i, values) {
                            var td = $("<td>" + values + "<input type=\"hidden\" name='vid"+i+"' class='vid"+i+"' value="+values+"></td>");
                            var temp = values.split("|");
                            attrIdArray[i] = temp[1];
                            td.appendTo(tr);
                        });
                        attrIdArray = sort(attrIdArray);
                        console.log(attrIdArray);
                        var key = "";
                        for(var i = 0; i < attrIdArray.length; i++){
                            key += attrIdArray[i];
                        }

                        var price = "";
                        var isSetPrice = 0;
                        for(var j = 0; j < attrPrices.length; j++){

                            if(attrPrices[j]['vid'] == key){
                                price = attrPrices[j]['price'];
                                isSetPrice = 1;
                            }
                        }

                        var td1 = $("<td ><input name=\"price\"  value='"+price+"'  class=\"price\" type=\"text\" onkeyup=\"this.value=this.value.replace(/[^\\d]/g,'')\n" +
                            "                    \" onafterpaste=\"this.value=this.value.replace(/[^\\d]/g,'') \"  value=\"\"></td>");
                        td1.appendTo(tr);
                        var td2 = "";
                        if(isSetPrice == 1){
                            td2 = $("<td ><input type=\"checkbox\" checked=\"checked\" class=\"pull-right btn btn-xs btn-primary\" id=\"btn-white\" onclick=\"rentCar(this)\">发布</button></td>");
                        }else{
                            td2 = $("<td ><input type=\"checkbox\" class=\"pull-right btn btn-xs btn-primary\" id=\"btn-white\" onclick=\"rentCar(this)\">发布</button></td>");                            
                        }

                        td2.appendTo(tr);
                        //var td3 = $("<td ><input name=\"Txt_NumberSon\" class=\"l-text\" type=\"text\" value=\"\"></td>");
                        //td3.appendTo(tr);
                        //var td4 = $("<td ><input name=\"Txt_SnSon\" class=\"l-text\" type=\"text\" value=\"\"></td>");
                        //td4.appendTo(tr);
                    });
                }
                //结束创建Table表
                arrayColumn.pop();//删除数组中最后一项
                //合并单元格
                $(table).mergeCell({
                    // 目前只有cols这么一个配置项, 用数组表示列的索引,从0开始
                    cols: arrayColumn
                });
            } else{
                //未全选中,清除表格
                document.getElementById('createTable').innerHTML="";
            }
        },//合并行
        hebingFunction: function () {
            $.fn.mergeCell = function (options) {
                return this.each(function () {
                    var cols = options.cols;
                    for (var i = cols.length - 1; cols[i] != undefined; i--) {
                        // fixbug console调试
                        // console.debug(cols[i]);
                        mergeCell($(this), cols[i]);
                    }
                    dispose($(this));
                });
            };
            function mergeCell($table, colIndex) {
                // $table.data('col-content', ''); // 存放单元格内容
                // $table.data('col-rowspan', 1); // 存放计算的rowspan值 默认为1
                // $table.data('col-td', $()); // 存放发现的第一个与前一行比较结果不同td(jQuery封装过的), 默认一个"空"的jquery对象
                // $table.data('trNum', $('tbody tr', $table).length); // 要处理表格的总行数, 用于最后一行做特殊处理时进行判断之用
                // // 进行"扫面"处理 关键是定位col-td, 和其对应的rowspan
                // $('tbody tr', $table).each(function (index) {
                //     // td:eq中的colIndex即列索引
                //     var $td = $('td:eq(' + colIndex + ')', this);
                //     // 取出单元格的当前内容
                //     var currentContent = $td.html();
                //     // 第一次时走此分支
                //     if ($table.data('col-content') == '') {
                //         $table.data('col-content', currentContent);
                //         $table.data('col-td', $td);
                //     } else {
                //         // 上一行与当前行内容相同
                //         if ($table.data('col-content') == currentContent) {
                //             // 上一行与当前行内容相同则col-rowspan累加, 保存新值
                //             var rowspan = $table.data('col-rowspan') + 1;
                //             $table.data('col-rowspan', rowspan);
                //             // 值得注意的是 如果用了$td.remove()就会对其他列的处理造成影响
                //             $td.hide();
                //             // 最后一行的情况比较特殊一点
                //             // 比如最后2行 td中的内容是一样的, 那么到最后一行就应该把此时的col-td里保存的td设置rowspan
                //             if (++index == $table.data('trNum'))
                //                 $table.data('col-td').attr('rowspan', $table.data('col-rowspan'));
                //         } else { // 上一行与当前行内容不同
                //             // col-rowspan默认为1, 如果统计出的col-rowspan没有变化, 不处理
                //             if ($table.data('col-rowspan') != 1) {
                //                 $table.data('col-td').attr('rowspan', $table.data('col-rowspan'));
                //             }
                //             // 保存第一次出现不同内容的td, 和其内容, 重置col-rowspan
                //             $table.data('col-td', $td);
                //             $table.data('col-content', $td.html());
                //             $table.data('col-rowspan', 1);
                //         }
                //     }
                // });
            }
            // 同样是个private函数 清理内存之用
            function dispose($table) {
                $table.removeData();
            }
        },
        //组合数组
        doExchange: function (doubleArrays) {
            var len = doubleArrays.length;
            if (len >= 2) {
                var arr1 = doubleArrays[0];
                var arr2 = doubleArrays[1];
                var len1 = doubleArrays[0].length;
                var len2 = doubleArrays[1].length;
                var newlen = len1 * len2;
                var temp = new Array(newlen);
                var index = 0;
                for (var i = 0; i < len1; i++) {
                    for (var j = 0; j < len2; j++) {
                        temp[index] = arr1[i] + "," + arr2[j];
                        index++;
                    }
                }
                var newArray = new Array(len - 1);
                newArray[0] = temp;
                if (len > 2) {
                    var _count = 1;
                    for (var i = 2; i < len; i++) {
                        newArray[_count] = doubleArrays[i];
                        _count++;
                    }
                }

                return step.doExchange(newArray);
            }
            else {
                return doubleArrays[0];
            }
        }
    }

    step.Creat_Table();
    return step;
})
