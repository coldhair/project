var data=['iphone 8','100元代金卷','ipad pro','三星笔记本','佳能相机','小霸王学习机'],
    timer=null,
    flag=0;

window.onload=function () {
    var play=document.getElementById('play'),
        stop=document.getElementById('stop');

    //开始抽奖
    play.onclick=playFun;
    // 停止抽奖
    stop.onclick=stopFun;

    // 键盘事件
    document.onkeyup=function (ev2) {
        if(ev2.keyCode===13){ //判断是否是回车键
           if(flag===0){
               playFun();

           }else {
               stopFun();

           }

        }

        //下面可以通过控制台获得具体的键盘码。
       //console.log(ev2.keyCode);
    }
};

// 开始抽奖函数
function playFun() {
    var title=document.getElementById('title'),
        play=document.getElementById('play');
    // 先清除定时器再执行新的定时器，否则每点一次就会开启一个新的定时器。
    clearInterval(timer);
    //用定时器setInterval第隔100毫秒执行一次。
    timer=setInterval(lotteryGenerate,100);

    // 随机产生奖品
    function lotteryGenerate() {
        // 这里用Math.floor()而不能用 Math.round()来取整。
        var random=Math.floor(Math.random()*data.length);
        title.innerHTML=data[random];
    }

/*点击后把按钮变成灰色,this表示执行playFun函数的元素
 play.onclick=playFun;即play。
但是，当使用键盘事件时，this属性就不是play这个元素了。
所以就不能用了，注释掉。*/
    //this.style.background="#999";
    play.style.background="#999";

    //把 flag=1，为键盘事件做判断
    flag=1;
}

// 停止抽奖函数
function stopFun() {
    clearInterval(timer);//timer在开始已经声明为了全局变量
    var play=document.getElementById('play');
    play.style.background="#1316ad";

    //把变回0，为键盘事件做判断
    flag=0;
}