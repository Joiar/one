function startMove(obj,itarget,attr,fn){
	clearInterval(obj.timer);
	obj.timer=setInterval(function(){
		var cur=0;
		if(attr=='opacity'){
			cur=parseFloat(getStyle(obj,attr))*100;
		}else{
			cur=parseInt(getStyle(obj,attr));
		}
		speed=(itarget-cur)/20;
		speed=cur<itarget?Math.ceil(speed):Math.floor(speed);
		if (cur==itarget) {
			clearInterval(obj.timer);
			if (fn) fn();
		}else{
			if(attr=='opacity'){
				obj.style.opacity=(cur+speed)/100;
			}else{
				obj.style[attr]=cur+speed+"px";
			}
		};
	},30)
}

function getStyle(obj,cssName){
	if (obj.currentStyle) {
		return obj.currentStyle[cssName];
	}else{
		return getComputedStyle(obj,null)[cssName]
	};
}