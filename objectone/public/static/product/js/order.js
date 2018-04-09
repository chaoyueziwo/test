//下单页面
//(function(){
//    //全局变量index
//    var index = 1;
//    var sum =0;
//    var sumsum = 0;
//   $(".smilltotal").each(function(){
//        sum +=$(this).text()*1;
//    });
//    $(".summation").text(sum);
//    $(".alltotal>span").text(sum);
//    //2.2 加号点击事件，当点击的时候index++；
//    $(".plus").click(function(){
//        var smill = $(".smilltotal");
//        index++;
//        //1.获取当前价格
//        var pri = $(this).parents().siblings(".price").children("span").text();
//        var allcount =pri*index;
//        $(this).siblings(".count").val(index);
//        $(this).parents().siblings(".invoice-box").find(".smilltotal").text(allcount);
//        if(index>=1){
//            $(this).siblings(".min").css("color","#000");
//        }else{
//            $(this).siblings(".min").css("color","#ddd");
//        }
//     //遍历页面
//        smill.each(function(){
//            sumsum +=$(this).text()*1;
//        });
//        $(".summation").text(sumsum);
//        $(".alltotal>span").text(sumsum);
//    });
//    //2.3 减号点击事件，当等于1的时候移除点击事件；大于1添加点击事件
//    $(".min").click(function(){
//        var minpri = $(this).parents().siblings(".price").children("span").text();
//        if(index >=2){
//            index--;
//            $(this).css("color","#000");
//            var minall = minpri*index;
//        }
//        if(index<=1){
//            $(this).css("color","#ddd");
//        }
//        $(this).siblings(".count").val(index);
//        $(this).parents().siblings(".invoice-box").find(".smilltotal").text(minall);
//        // //  遍历页面
//        // $(".smilltotal").each(function(){
//        //     sum +=$(this).text()*1;
//        // });
//        // $(".summation>span").text(sum);
//    });
//    //删除按钮
//    $(".deleteall").click(function(){
//        $(this).parents(".order-detail-box").hide();
//    });
//
//})();


//循环所有li，计算总和
function totalPrice(){
    var sum = 0;
    //计算所有li的总和放进合计金额和应付总额中
    $(".order-detail-box").each(function(i,dom){
        sum += parseInt($(dom).find(".smilltotal").text());
    });
    $(".summation").children("span").text(sum);
    $(".alltotal").children("span").text(sum);
}
//删除当前行
function deleteThis(obj){
    $(obj).parents(".order-detail-box").remove();
    totalPrice();
}
//数量递减
function ReductionInfo(obj){
    var num = parseInt($(obj).siblings(".count").val());
    var price = parseInt($(obj).parent().siblings(".price").children("span").text());
    var combined = parseInt($(obj).parent().siblings(".invoice-box").find(".smilltotal").text());

    if(num <= 1){
        $(obj).css("color","#ddd");
        alert("至少要选择一个！");
        return;
    }else{
        num--;
        $(obj).css("color","#333").siblings(".plus").css("color","#333").siblings(".count").val(num);
        $(obj).parent().siblings(".invoice-box").find(".smilltotal").text(combined - price);
        totalPrice();

    }
}
//数量递增
function addInfo(obj){
    var num = parseInt($(obj).siblings(".count").val());
    var price = parseInt($(obj).parent().siblings(".price").children("span").text());
    var combined = parseInt($(obj).parent().siblings(".invoice-box").find(".smilltotal").text());

    if(num >= 99){
        $(obj).css("color","#ddd");
        alert("最多只能选择99个！");
        return;
    }else {
        num++;
        $(obj).css("color","#333").siblings(".min").css("color", "#333").siblings(".count").val(num);
        $(obj).parent().siblings(".invoice-box").find(".smilltotal").text(combined + price);
        totalPrice();
    }
}
//数量变化
function changeVal(obj){
    var num = parseInt($(obj).val());
    var price = parseInt($(obj).parent().siblings(".price").children("span").text());
    var reg = /^[0-9]{1,2}$/g;   //只能输入数字正则

    if(reg.test($(obj).val()) && num > 1){
        $(obj).parent().siblings(".invoice-box").find(".smilltotal").text(num * price);
        $(obj).siblings(".min").css("color","#333").siblings(".plus").css("color","#333");
    }else{
        $(obj).val(1);
        $(obj).parent().siblings(".invoice-box").find(".smilltotal").text(price);
        $(obj).siblings(".min").css("color","#ddd");
    }
    totalPrice();
}

// (function(){
//     $.ajax({
//         url: "./js/01.json",
//         type: "get",
//         typeData: "json",
//         success: function(data){
//             var str = '';
//             for(var i = 0;i < data.length;i++){
//                 str += '<li class="order-detail-box">';
//                 str += '<div class="order-detail">';
//                 str += '<div>';
//                 str += '<div>';
//                 str += '<div class="order-photo">';
//                 str += '<img src="img/cswd-wtxqy-6_01.png">';
//                 str += '</div>';
//                 str += '<span class="font16 cbcb4">有限公司注册</span>';
//                 str += '</div>';
//                 str += '<div>';
//                 str += '<div>公司类型 : 有限责任公司</div>';
//                 str += '<div>所需刻章 : 刻三章(法人章+公司章+财务章)</div>';
//                 str += '<div>注册地址 : 广东省深圳市福田区</div>';
//                 str += '</div>';
//                 str += '</div>';
//                 str += '<div>';
//                 str += '<div class="price">&yen;<span>'+data[i].price+'</span>元</div>';
//                 str += '<div class="width27">';
//                 str += '<span class="min" onclick="ReductionInfo(this)">-</span>';
//                 str += '<input type="text" onchange="changeVal(this)" value="1" class="count" maxlength="2"/>';
//                 //onkeyup="this.value=this.value.replace(/[^\d]/g, "")" onafterpaste="this.value=this.value.replace(/[^\d]/g, "")"
//                 str += '<span class="plus" onclick="addInfo(this)">+</span>';
//                 str += '</div>';
//                 str += '<div class="invoice-box">';
//                 str += '<div><b>&yen;<span class="smilltotal">'+data[i].price+'</span>元</b></div>';
//                 str += '<div>';
//                 str += '<input type="checkbox"  id="invoice1"></input>';
//                 str += '<label for="invoice1">开发票</label>';
//                 str += '</div>';
//                 str += '</div>';
//                 //删除按钮
//                 str += '<div class="delete">';
//                 str += '<span class="deleteall" onclick="deleteThis(this)">删除</span>';
//                 str += '</div>';
//                 str += '</div>';
//                 str += '</div>';
//                 //优惠券
//                 str += '<div class="discounts">';
//                 str += '<div>优惠券</div>';
//                 str += '<div>';
//                 str += '<span>不使用优惠券</span>';
//                 str += '<span class="downico"></span>';
//                 str += '</div>';
//                 str += '</div>';
//                 str += '</li>';
//             }
//             $("#list-box").append(str);

//             //一开始计算所有li的总和放进合计金额和应付总额中
//             totalPrice();

//         },
//         error: function(){
//             alert('请求错误！');
//         }
//     });

// })();

