var box=document.getElementById('box'),
	aImg=box.getElementsByTagName('ul')[0].getElementsByTagName('li'),
	myol=box.getElementsByTagName('ol')[0],
	olli=myol.getElementsByTagName('li'),
	// aBtn=box.getElementsByTagName('ol')[0].getElementsByTagName('li'),
	timer=null,
	n=0,
	z=1;

function change(){
	n++;
	if (n==aImg.length) {
		n=0;
	};
	aImg[n].style.opacity='0';
	startMove(aImg[n],100,'opacity');
	aImg[n].style.zIndex=++z;

	for (var i = 0; i <olli.length; i++) {
		olli[i].className='';
	};
	olli[n].className='list';
}
function tIme(){
	timer=setInterval(function(){
		change()
	},3500);
}
tIme()

for (var i = 0; i < olli.length; i++) {
	olli[i].index=i;
	olli[i].onmouseover=function(){
		n=this.index-1;
		change()
	}
};
myol.onmouseover=function(){
	clearInterval(timer)
}
myol.onmouseout=function(){
	timer=setInterval(function(){
		change()
	},3500)
}




// 定时更换背景图片

var mydiv = document.getElementById('bannerbg');
	// alert(mydiv);
    var imgArray = ['#EA9817','#7F17AA','#E33351','#F8432C','#F2474A','#F78146','#3C6CED']
    var j = 0;
    setInterval(function () {
        j++;
        j %= imgArray.length;
        mydiv.style.background =  imgArray[j] ;
    }, 3500);