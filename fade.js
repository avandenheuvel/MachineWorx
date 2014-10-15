var images=new Array();
images.push("./images/gear.png", "./images/checklist.png", "./images/reports.png", "./images/Wikipedia-logo.png");
var imageObjs=new Array();
var currentImage=0;
var topOp=1;
var botOp=0;
var timer;

window.onload=function(){loadImages();};

function loadImages(){
	for(var i=0; i<images.length; i++){
		var image=new Image();
		image.src=images[i];
		imageObjs.push(image);	
	}
	setInterval(function(){changeImage()},8000);	
}

function changeImage(){
	currentImage++;
	if(currentImage>3){
		currentImage=0;	
	}
	document.getElementById('bottomSlide').src=imageObjs[currentImage].src;
	timer=setInterval(function(){fadeImages()}, 50);
}

function fadeImages(){
	topOp-=0.025;
	botOp+=0.025;
	document.getElementById('topSlide').style.opacity=topOp;
	document.getElementById('bottomSlide').style.opacity=botOp;
	if(topOp<=0){
		document.getElementById('topSlide').src=document.getElementById('bottomSlide').src;
		document.getElementById('topSlide').style.opacity=1;
		document.getElementById('bottomSlide').style.opacity=0;
		topOp=1;
		botOp=0;
		clearInterval(timer);	
	}
}