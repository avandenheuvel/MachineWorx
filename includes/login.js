var displaying=false;

function logBtnClick(){
	if(displaying){
		document.getElementById('logBox').style.display='none';
		displaying=false;	
	}else{
		document.getElementById('logBox').style.display='block';
		displaying=true;
	}
}

function validateAndSend(url){
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
		sendRequest(url);
	}
	return false;
}

function sendRequest(url){
	var params="username="+document.getElementById('username').value+"&password="+document.getElementById('password').value;
	var xmlObj=new XMLHttpRequest();
	xmlObj.open("POST", url, true);
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
			window.location.replace("");
			break;
		case("2"):
			window.location.replace("");
			break;
		case("3"):
			window.location.replace("");
			break;
	}
}