function getByClass(className,parent) {
    var oParent=parent?document.getElementById(parent):parent,
        eles=[],//初始化数组
        elements=oParent.getElementsByTagName('*');
    for(var i=0;i<elements.length;i++){
        if(elements[i].className===className){
            eles.push(elements[i]);
        }
    }
        return eles;
}

window.onload=drag;
function drag() {
    var oTitle=getByClass('login_logo_webqq','loginPanel')[0];
    //拖拽
    oTitle.onmousedown=fnDown;
    //关闭
    var oClose=document.getElementById('ui_boxyClose');
    oClose.onclick=function () {
        document.getElementById('loginPanel').style.display='none';
    };
    //状态切换
    var loginState=document.getElementById('loginState'),
        statelist=document.getElementById('loginStatePanel'),
        lis=statelist.getElementsByTagName('li'),
        stateTxt=document.getElementById('login2qq_state_txt'),
        loginStateShow=document.getElementById('loginStateShow');
    loginState.onclick=function (e) {
        statelist.style.display='block';
        e.stopPropagation();//阻止冒泡
    };
    document.onclick=function () {
        statelist.style.display='none';
    };
    //鼠标滑过、离开和点击状态列表时
    for(var i=0;i<lis.length;i++){
        lis[i].onmouseover=function () {
            this.style.background='#676767';
        };
        lis[i].onmouseout=function () {
            this.style.background='#fff';//这里为什么不能用lis[i].style.background?
        };
        lis[i].onclick=function (e) {
            statelist.style.display='none';
            var id=this.id;
            stateTxt.innerHTML=getByClass('stateSelect_text',id)[0].innerHTML;
            loginStateShow.className='';
            loginStateShow.className='login-state-show '+id;
            e.stopPropagation();
        }
    }
}

function fnDown(e) {
    var oDrag=document.getElementById('loginPanel');
    var x=e.clientX-oDrag.offsetLeft,
        y=e.clientY-oDrag.offsetTop;

    document.onmousemove=function (ev) {
        fnMove(ev,x,y);
    };
    document.onmouseup=function () {
        document.onmousemove=null;
        document.onmouseup=null;
    }
}

function fnMove(event,posX,posY) {
    var oDrag=document.getElementById('loginPanel'),
        l=event.clientX-posX,
        t=event.clientY-posY;
    var winWidth=document.documentElement.clientWidth,
        winHeight=document.documentElement.clientHeight,
        maxWidth=winWidth-oDrag.offsetWidth-10,
        maxHeight=winHeight-oDrag.offsetHeight-10;
    l=l<maxWidth?l:maxWidth;
    t=t<maxHeight?t:maxHeight;
    l=l>10?l:10;
    t=t>10?t:10;
    oDrag.style.left=l+"px";
    oDrag.style.top=t+"px";
}