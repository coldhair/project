window.onload=function () {
    waterfall('main','box');
};
function waterfall(parent,box) {
    // 将main下所有class为box的元素取出来
    var oparent=document.getElementById(parent),
        obox=getByClass(oparent,box);
    //计算整个页面显示的列数
    var oboxW=obox[0].offsetWidth;
    var cols=document.documentElement.clientWidth/oboxW;
    var col=Math.floor(cols);

    oparent.style.cssText='width:'+oboxW*col+'px; margin:0 auto';
    var hArr=[];
    for (i=0;i<obox.length;i++){
        if(i<col){
            hArr.push(obox[i].offsetHeight);
        }else {
            var minH=Math.min.apply(null,hArr);
            var index=getMinIndex(hArr,minH);
            obox[i].style.position='absolute';
            obox[i].style.top=minH+'px';
            //obox[i].style.left=oboxW*index+'px';
            obox[i].style.left=obox[index].offsetLeft+"px";
            hArr[index] +=obox[i].offsetHeight;
            console.log(minH);
        }
    }


}

//根据class获取元素
function getByClass(parent,clsName) {
    var boxArr= new Array(),//用来储存所有class为clsName的元素
        oElements=parent.getElementsByTagName('*');
    for(var i=0;i<oElements.length;i++){
        if(oElements[i].className===clsName){
            boxArr.push(oElements[i])
        }
    }
    return boxArr;
}
function     getMinIndex(array,val) {
    for(var i in array){//遍历数组
        if(array[i]===val){
            return i;
        }
    }
}