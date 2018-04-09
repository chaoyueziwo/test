/*创业资讯分页*/
/*最新资讯*/
$(".newmessageli1").mouseenter(function () {
    $(this).css("background","#ffffff");
    $(".hotmessageli2").css("background","#f6f6f6");
    $(this).parents().find(".newmessage1").show().siblings(".hotmessage1").hide();
});
$(".hotmessageli1").mouseenter(function () {
    $(this).css("background","#ffffff");
    $(".newmessageli1").css("background","#f6f6f6");
    $(this).parents().find(".hotmessage1").show().siblings(".newmessage1").hide();
});
