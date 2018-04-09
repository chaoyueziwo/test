/*头部*/
/*热图，下拉箭头*/
$(".active").mouseenter(function () {
    $(this).children(".activelist").show();
    $(this).siblings().children(".activelist").hide();
    $(this).children(".hot").children("div").css({"background":"url(img/cswd-dhdy-8.png)no-repeat 0 -90px","marginTop":"3px","marginLeft":"2px"});
}).mouseleave(function(){
    $(this).children(".activelist").hide();
    $(this).children(".hot").children("div").css({"background":"url(img/cswd-dhdy-9.png)no-repeat 3px -429px","marginTop":"0","marginLeft":"0"});
});
/*导航栏下拉菜单*/
$(".activelist>div>div").mouseenter(function(){
    $(this).css("background","#2a7b7c").children("a").css("color","#fff");
}).mouseleave(function(){
    $(this).css("background","#fff").children("a").css("color","#000");
});