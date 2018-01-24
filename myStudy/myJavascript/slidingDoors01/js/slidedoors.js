window.onload = function () {
    //获取容器对象
    var box = document.getElementById('container');
    //获取图片NodeList对象集合
    var imgs = box.getElementsByTagName('img');
    //单张图片的宽度
    var imgWidth = imgs[0].offsetWidth;
    var exposeWidth = 160;
    var boxWidth = imgWidth + (imgs.length - 1) * exposeWidth;
    box.style.width = boxWidth + "px";

    function setImgsPos() {
        for (var i = 1; i < imgs.length; i++) {
            imgs[i].style.left = imgWidth + exposeWidth * (i - 1) + 'px';
        }
    }
    setImgsPos();
//设置每道门的初始位置
    setImgsPos();
    //计算每道门打开时应该移动的距离
    var transver = imgWidth - exposeWidth;
    //为每道门绑定事件
    for (var i = 0; i < imgs.length; i++) {
        //使用立即调用的函数表达式，为了获得不同的i值
        (function (i) {
            imgs[i].onmouseover = function () {
                //先将每道门复位
                setImgsPos();
                //打开门
                for (var j = 1; j <= i; j++) {
                    imgs[j].style.left = parseInt(imgs[j].style.left, 10) - transver + 'px';
                }
            }
        })(i);
    }
};
















