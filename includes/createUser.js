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

/*function changePhoto(){
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
}*/

function validateCreation(){
	var send=true;
	if(document.getElementById('fname').value==""){
		document.getElementById('fname').style.borderColor="#F00";
		send=false;
	}
	if(document.getElementById('lname').value==""){
		document.getElementById('lname').style.borderColor="#F00";
		send=false;
	}
	if(document.getElementById('user').value==""){
		document.getElementById('user').style.borderColor="#F00";
		send=false;
	}
	if(document.getElementById('pass').value==""){
		document.getElementById('pass').style.borderColor="#F00";
		send=false;
	}
	if(document.getElementById('passV').value==""){
		document.getElementById('passV').style.borderColor="#F00";
		send=false;
	}
	if(document.getElementById('pass').value!=document.getElementById('passV').value){
		document.getElementById('pass').style.borderColor="#F00";
		document.getElementById('passV').style.borderColor="#F00";
		send=false;
	}
	if(send){
		createUser();
	}
	return false;	
}

function createUser(){
	var roles=document.getElementsByName('role')
	var role;
	for(var i=0; i<roles.length; i++){
		if(roles[i].checked){
			role=CryptoJS.MD5(roles[i].value);
		}
	}
	var pass=CryptoJS.MD5(document.getElementById('pass').value);
	var params="user="+document.getElementById('user').value;
	params+="&pass="+pass;
	params+="&fname="+document.getElementById('fname').value;
	params+="&lname="+document.getElementById('lname').value;
	params+="&role="+role;
	var xmlObj=new XMLHttpRequest();
	xmlObj.open("POST", "../includes/createUser.php", true);
	xmlObj.setRequestHeader('Content-type','application/x-www-form-urlencoded');
	xmlObj.setRequestHeader("Content-length", params.length);
	xmlObj.setRequestHeader("Connection", "close");
	xmlObj.onreadystatechange = function() {
		if(xmlObj.readyState == 4 && xmlObj.status == 200) {
			getResponse(xmlObj.responseText);
		}
	}
	xmlObj.send(params);
}

function getResponse(response){
	alert(response);
}