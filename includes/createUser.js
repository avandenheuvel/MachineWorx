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

function resetErrors(elements){
	for(var i=0; i<elements.length; i++){
		document.getElementById(elements[i]).style.borderColor="#4DC3FF";	
	}
}

function setErrors(elements){
	for(var i=0; i<elements.length; i++){
		document.getElementById(elements[i]).style.borderColor="#F00";	
	}
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
	resetErrors(new Array('fname','lname','user','pass','passV'));
	var errorArray=new Array();
	var errorMessage=new Array();
	if(document.getElementById('pass').value!=document.getElementById('passV').value){
		if(errorArray.indexOf('pass')==-1) errorArray.push('pass');
		if(errorArray.indexOf('passV')==-1) errorArray.push('passV');
		document.getElementById('pass').focus();
		errorMessage.push("the passwords do not match!");
		send=false;
	}
	if(document.getElementById('passV').value==""){
		errorArray.push('passV');
		document.getElementById('passV').focus();
		errorMessage.push("re-enter the password");
		send=false;
	}
	if(document.getElementById('pass').value==""){
		errorArray.push('pass');
		document.getElementById('pass').focus();
		errorMessage.push("the password");
		send=false;
	}
	if(document.getElementById('user').value==""){
		errorArray.push('user');
		document.getElementById('user').focus();
		errorMessage.push("the username");
		send=false;
	}
	if(document.getElementById('lname').value==""){
		errorArray.push('lname');
		document.getElementById('lname').focus();
		errorMessage.push("the last name");
		send=false;
	}
	if(document.getElementById('fname').value==""){
		errorArray.push('fname');
		document.getElementById('fname').focus();
		errorMessage.push("the first name");
		send=false;
	}
	setErrors(errorArray);
	var errorString;
	if(errorMessage.length==0){
		errorString="Creating user!";
	}else{
		errorString="Please enter ";
		for(var i=errorMessage.length-1; i>=0; i--){
			errorString+=errorMessage[i];
			if(i!=0){
				errorString+=", ";
			}
		}
		
	}
	document.getElementById('statusDiv').innerHTML=errorString;
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
			role=roles[i].value;
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
	switch(response){
		case "0": 
			//success
			document.getElementById('statusDiv').innerHTML="User successfully created!";
			document.getElementById('createForm').reset();
			break;
		case "1": 
			//user exists
			document.getElementById('statusDiv').innerHTML="That user already exists.";
			setErrors([user]);
			document.getElementById('user').focus();
			break;
		case "2":
			//invalid info
			document.getElementById('statusDiv').innerHTML="Invalid info was entered.";
			break;
		default:
			document.getElementById('statusDiv').innerHTML="Sorry, something went wrong.";
			break;
	}
}