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
	getUsers();
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

function getUsers(){
	var user=document.getElementById("unSearch").value;
	var params="user="+user;
	var xmlObj=new XMLHttpRequest();
	xmlObj.open("POST", "../includes/searchUsers.php", true);
	xmlObj.setRequestHeader('Content-type','application/x-www-form-urlencoded');
	xmlObj.setRequestHeader("Content-length", params.length);
	xmlObj.setRequestHeader("Connection", "close");
	xmlObj.onreadystatechange = function() {
		if(xmlObj.readyState == 4 && xmlObj.status == 200) {
			displayUsers(xmlObj.responseText);
		}
	}
	xmlObj.send(params);
}

function displayUsers(data){
	document.getElementById('sResults').innerHTML="<table>"+data+"</table>";
}

function pullUserInfo(user){
	var params="userID="+user;
	var sock=new XMLHttpRequest();
	sock.open("POST", "../includes/getUser.php", true);
	sock.setRequestHeader('Content-type','application/x-www-form-urlencoded');
	sock.setRequestHeader("Content-length", params.length);
	sock.setRequestHeader("Connection", "close");
	sock.onreadystatechange = function() {
		if(sock.readyState == 4 && sock.status == 200) {
			setForm(sock.responseText);
		}
	}
	sock.send(params);
}

function setForm(user){
	var userInfo=user.split("[|]");
	document.getElementById('searchPage').style.display="none";
	document.getElementById('editPage').style.display="block";
	document.getElementById('editStatus').innerHTML="Edit user " + userInfo[0] + ":";
	document.getElementById('editFName').value=userInfo[1];
	document.getElementById('origFName').value=userInfo[1];
	document.getElementById('editLName').value=userInfo[2];
	document.getElementById('origLName').value=userInfo[2];
	document.getElementById('origRole').value=userInfo[3];
	switch(userInfo[3]){
		case "1":
			document.getElementById('editRole1').checked=true;
			break;
		case "2":
			document.getElementById('editRole2').checked=true;
			break;
		case "3":
			document.getElementById('editRole3').checked=true;
			break;
		default:
			break;	
	}
	document.getElementById('uId').value=userInfo[4];
}

function deleteUser(){
	if(window.confirm("Are you sure you want to delete this user?")){
	var params="userID="+document.getElementById('uId').value;
	var sock=new XMLHttpRequest();
	sock.open("POST", "../includes/deleteUser.php", true);
	sock.setRequestHeader('Content-type','application/x-www-form-urlencoded');
	sock.setRequestHeader("Content-length", params.length);
	sock.setRequestHeader("Connection", "close");
	sock.onreadystatechange = function() {
		if(sock.readyState == 4 && sock.status == 200) {
			alert(sock.responseText);
			backToSearch();
		}
	}
	sock.send(params);
	}
}

function editUser(){
	var params=new Array();
	var send=true;
	resetErrors(new Array("editFName","editLName","editPass","editPassV"));
	var errorArray=new Array();
	var errorStr="";
	if(document.getElementById('origFName').value!=document.getElementById('editFName').value){
		if(document.getElementById('editFName').value==""){
			send=false;
			errorArray.push("editFName");
			errorStr+="The first name is blank. ";
		}else{
			params.push("fname", document.getElementById('editFName').value);
		}
	}
	if(document.getElementById('origLName').value!=document.getElementById('editLName').value){
		if(document.getElementById('editLName').value==""){
			send=false;
			errorArray.push("editLName");
			errorStr+="The last name is blank. ";
		}else{
			params.push("lname", document.getElementById('editLName').value);
		}
	}
	if(document.getElementById('editPass').value!=""){
		if(document.getElementById('editPass').value!=document.getElementById('editPassV').value){
			send=false;
			errorArray.push("editPass");
			errorArray.push("editPassV");
			errorStr+="The passwords are incorrectly entered. ";
		}else{
			params.push("pass", CryptoJS.MD5(document.getElementById('editPass').value));
		}
	}
	var role;
	if(document.getElementById('editRole1').checked==true){
		role=document.getElementById('editRole1').value;
	}
	if(document.getElementById('editRole2').checked==true){
		role=document.getElementById('editRole2').value;
	}
	if(document.getElementById('editRole3').checked==true){
		role=document.getElementById('editRole3').value;
	}
	if(document.getElementById('origRole').value!=role){
		params.push("role", role);
	}
	setErrors(errorArray);
	params.push("user", document.getElementById('uId').value);
	if(params.length<4){
		errorStr+="You didn't change anything!";
	}
	document.getElementById('info').innerHTML=errorStr;
	if(send&&params.length>2){
		var pStr="";
		for(var i=0; i<params.length; i+=2){
			if(i==0){
				pStr+=params[i]+"="+params[i+1];
			}else{
				pStr+="&"+params[i]+"="+params[i+1];
			}
		}
		sendUserEdit(pStr);
	}
}

function sendUserEdit(params){
	var sock=new XMLHttpRequest();
	sock.open("POST", "../includes/editUser.php", true);
	sock.setRequestHeader('Content-type','application/x-www-form-urlencoded');
	sock.setRequestHeader("Content-length", params.length);
	sock.setRequestHeader("Connection", "close");
	sock.onreadystatechange = function() {
		if(sock.readyState == 4 && sock.status == 200) {
			alert(sock.responseText);
			backToSearch();
		}
	}
	sock.send(params);
}

function backToSearch(){
	document.getElementById('searchPage').style.display="block";
	document.getElementById('editPage').style.display="none";
	document.getElementById('unSearch').value="";
	getUsers();
}