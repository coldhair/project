window.onload=function () {
    waterfall('main','box');
var dataInt={"data":[{"src":"0.jpg"},{"src":"1.jpg"},{"src":"0.jpg"},{"src":"1.jpg"},{"src":"45.jpg"},{"src":"46.jpg"},{"src":"47.jpg"},{"src":"48.jpg"},{"src":"49.jpg"},{"src":"50.jpg"},{"src":"51.jpg"},{"src":"52.jpg"},{"src":"53.jpg"},{"src":"54.jpg"},{"src":"55.jpg"},{"src":"56.jpg"},{"src":"57.jpg"},{"src":"58.jpg"},{"src":"59.jpg"},{"src":"60.jpg"},{"src":"61.jpg"},{"src":"62.jpg"},{"src":"63.jpg"},{"src":"64.jpg"},{"src":"65.jpg"},{"src":"66.jpg"},{"src":"67.jpg"},{"src":"68.jpg"},{"src":"69.jpg"},{"src":"70.jpg"},{"src":"71.jpg"},{"src":"72.jpg"},{"src":"73.jpg"},{"src":"74.jpg"},{"src":"75.jpg"},{"src":"76.jpg"},{"src":"77.jpg"},{"src":"78.jpg"},{"src":"79.jpg"},{"src":"80.jpg"},{"src":"81.jpg"},{"src":"82.jpg"},{"src":"83.jpg"},{"src":"84.jpg"},{"src":"85.jpg"},{"src":"86.jpg"},{"src":"87.jpg"},{"src":"88.jpg"},{"src":"89.jpg"},{"src":"90.jpg"},{"src":"91.jpg"},{"src":"92.jpg"},{"src":"93.jpg"},{"src":"94.jpg"},{"src":"95.jpg"},{"src":"96.jpg"},{"src":"97.jpg"}]};
   console.log(dataInt.data.length);
    window.onscroll=function () {
       if(checkScrollSlide) {
           var oParent=document.getElementById('main');
        for(var i=0;i<dataInt.data.length;i++){
            var obox=document.createElement('div');
            obox.className='box';
            oParent.appendChild(obox);
            var opic=document.createElement('div');
            opic.className="pic";
            obox.appendChild(opic);
            var oimg=document.createElement('img');
            oimg.src="images/"+dataInt.data[i].src;
            opic.appendChild(oimg);
        }
           waterfall('main','box');
       }
    }
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
           // console.log(minH);
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

// 检测是否具备了加载数据块的条件
function checkScrollSlide() {
    var oparent=document.getElementById('main'),
        obox=getByClass(oparent,'box'),
        lastBoxH=obox[obox.length-1].offsetTop+Math.floor(obox[obox.length-1].offsetHeight/2),
        scrollTops=document.documentElement.scrollTop,
        height=document.documentElement.clientHeight;
    return (lastBoxH<scrollTops+height)?true:false;

}