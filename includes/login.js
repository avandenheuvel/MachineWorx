var displaying=false;
var arrowDown=new Image();
arrowDown.src=base+"images/arrow_down.png";
var arrowUp=new Image();
arrowUp.src=base+"images/arrow_up.png";

function logBtnClick(){
	if(displaying){
		document.getElementById('logBox').style.display='none';
		document.getElementById('logArrow').src=arrowDown.src;
		displaying=false;	
	}else{
		document.getElementById('logBox').style.display='block';
		document.getElementById('logArrow').src=arrowUp.src;
		displaying=true;
	}
}

function validateAndSend(){
	var valid=true;
	if(document.getElementById('password').value==""){
		document.getElementById('password').style.borderColor='#F00';
		document.getElementById('logError').innerHTML="Please fill in all fields.";
		document.getElementById('password').focus();
		valid=false;
	}
	if(document.getElementById('username').value==""){
		document.getElementById('username').style.borderColor='#F00';
		document.getElementById('logError').innerHTML="Please fill in all fields.";
		document.getElementById('username').focus();
		valid=false;
	}
	if(valid){
		sendRequest();
	}
	return false;
}

function sendRequest(){
	var params="username="+document.getElementById('username').value+"&password="+CryptoJS.MD5(document.getElementById('password').value);
	var xmlObj=new XMLHttpRequest();
	xmlObj.open("POST", base+"includes/login.php", true);
	xmlObj.setRequestHeader('Content-type','application/x-www-form-urlencoded');
	xmlObj.setRequestHeader("Content-length", params.length);
	xmlObj.setRequestHeader("Connection", "close");
	xmlObj.onreadystatechange = function() {
		if(xmlObj.readyState == 4 && xmlObj.status == 200) {
			getRequest(xmlObj.responseText);
		}
	}
	xmlObj.send(params);
}

function getRequest(code){
	switch(code){
		case("0"):
			document.getElementById('logError').innerHTML="Invalid username or password.";	
			break;
		case("1"):
			window.location.replace(base+"Admin");
			break;
		case("2"):
			window.location.replace(base+"Tech");
			break;
		case("3"):
			window.location.replace(base+"Customer");
			break;
		default:
			document.getElementById('logError').innerHTML="Unable to login.";	
			break;
	}
}