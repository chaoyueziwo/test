function htmlFontSize() {
    var windowWidth;
    if (document.documentElement.clientWidth) {
        windowWidth= document.documentElement.clientWidth;
    } else if ((document.body) && (document.body.clientWidth)) {
        windowWidth = document.body.clientWidth;
    }
    document.getElementById("html").style.fontSize =  windowWidth / 1.903 + "px";   /*针对宽度为1903px的大屏显示器*/
}
htmlFontSize();
window.onresize = function () {
    htmlFontSize();
};