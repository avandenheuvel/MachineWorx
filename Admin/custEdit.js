var oldIds=new Array();
var newIds=new Array();

function searchCust(){
	document.getElementById('searchPage').style.display="block";
	document.getElementById('ePage').style.display="none";
	document.getElementById('select1').innerHTML="";
	document.getElementById('select2').innerHTML="";
}

function getCustomers(){
	var user=document.getElementById("unSearch").value;
	var params="user="+user;
	var xmlObj=new XMLHttpRequest();
	xmlObj.open("POST", "./searchCust.php", true);
	xmlObj.setRequestHeader('Content-type','application/x-www-form-urlencoded');
	xmlObj.setRequestHeader("Content-length", params.length);
	xmlObj.setRequestHeader("Connection", "close");
	xmlObj.onreadystatechange = function() {
		if(xmlObj.readyState == 4 && xmlObj.status == 200) {
			displayCust(xmlObj.responseText);
		}
	}
	xmlObj.send(params);
}

function displayCust(data){
	document.getElementById('sResults').innerHTML="<table>"+data+"</table>";
}

function pullCustInfo(id){
	var params="userID="+id;
	var sock=new XMLHttpRequest();
	sock.open("POST", "./getMachines.php", true);
	sock.setRequestHeader('Content-type','application/x-www-form-urlencoded');
	sock.setRequestHeader("Content-length", params.length);
	sock.setRequestHeader("Connection", "close");
	sock.onreadystatechange = function() {
		if(sock.readyState == 4 && sock.status == 200) {
			setEdit(sock.responseText);
		}
	}
	sock.send(params);
}

function setEdit(data){
	var arrays=data.split("[|||]");
	document.getElementById('searchPage').style.display="none";
	document.getElementById('ePage').style.display="block";
	document.getElementById('uName').innerHTML="Editing Customer: "+arrays[0];
	if(arrays[1]!=""){
		var availableMachines=arrays[1].split("[||]");
		for(var i=0; i<availableMachines.length; i++){
			var machineData=availableMachines[i].split("[|]");
			var option=document.createElement('option');
			option.value=machineData[0];
			option.id="o"+machineData[0];
			option.innerHTML=machineData[1];	
			document.getElementById("select1").appendChild(option);
		}
	}
	if(arrays[2]!=""){
		var ownedMachines=arrays[2].split("[||]");
		for(i=0; i<ownedMachines.length; i++){
			var machineData=ownedMachines[i].split("[|]");
			var option=document.createElement('option');
			option.value=machineData[0];
			option.id="o"+machineData[0];
			option.innerHTML=machineData[1];	
			document.getElementById("select2").appendChild(option);	
		}
	}
}