function createPageSelect(){
	document.getElementById("editUser").style.display="none";
	document.getElementById("createUser").style.display="block";
	document.getElementById("createTab").style.backgroundColor="#4DC3FF";
	document.getElementById("editTab").style.backgroundColor="#DDD";
}

function editPageSelect(){
	document.getElementById("editUser").style.display="block";
	document.getElementById("createUser").style.display="none";
	document.getElementById("createTab").style.backgroundColor="#DDD";
	document.getElementById("editTab").style.backgroundColor="#4DC3FF";
}

function changePhoto(){
	var ext=document.getElementById("profImg").value.substring(document.getElementById("profImg").value.length-4);
	if(ext=="jpeg"||ext==".png"||ext==".jpg"||ext==".gif"){
		var reader=new FileReader();
		reader.onload=function(e){
			document.getElementById("profPic").src=e.target.result;
		}
		reader.readAsDataURL(document.getElementById("profImg").files[0]);
	}else{
		document.getElementById("profPic").src="../images/default.png";
	}
}

function validateCreation(){
	var send=true;
	document.getElementById('fname').value;
	document.getElementById('lname').value;
	document.getElementById('user').value;
	if(document.getElementById('pass').value==""){
		//send=false;
	}
	if(document.getElementById('pass').value==""){
		//send=false;
	}
	if(document.getElementById('pass').value!=document.getElementById('passV')){
		//send=false;
	}
	document.getElementById('pass').value;
	document.getElementById('passV').value;
	if(send){
		createUser();
	}
	return false;	
}

function createUser(){
	var pass=CryptoJS.MD5(document.getElementById('pass').value);
	/*var params="username="+document.getElementById('username').value+"&password="+document.getElementById('password').value;
	var xmlObj=new XMLHttpRequest();
	xmlObj.open("POST", base+"includes/login.php", true);
	xmlObj.setRequestHeader('Content-type','application/x-www-form-urlencoded');
	xmlObj.setRequestHeader("Content-length", params.length);
	xmlObj.setRequestHeader("Connection", "close");
	xmlObj.onreadystatechange = function() {
		if(xmlObj.readyState == 4 && xmlObj.status == 200) {
			getResponse(xmlObj.responseText);
		}
	}
	xmlObj.send(params);*/
}

function getResponse(response){
	
}