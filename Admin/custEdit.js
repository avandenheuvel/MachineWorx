var currentIds=new Array();
var currentCust=null;

function searchCust(){
	document.getElementById('searchPage').style.display="block";
	document.getElementById('ePage').style.display="none";
	document.getElementById('availMachines').innerHTML="";
	document.getElementById('custMachines').innerHTML="";
	currentIds=new Array();
	currentCust=null;
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
			currentCust=id;
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
			document.getElementById("availMachines").appendChild(option);
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
			document.getElementById("custMachines").appendChild(option);
			currentIds.push(option.id);
		}
	}
}

function moveMachines(from, to) { 
	var availSelect=document.getElementById(from);
	for(var i=0; i<availSelect.options.length; i++){
		var option=availSelect.options[i];
		if(option.selected){
			option.parentNode.removeChild(option);
			document.getElementById(to).appendChild(option);
			i--;
		}
	}
}

function clearOpts(box){
	var selectBox=document.getElementById(box);
	for(var i=0; i<selectBox.options.length; i++){
		if(selectBox.options[i].selected=true){
			selectBox.options[i].selected=false;
		}
	}
}

function updateCustomer(){
	var selList=document.getElementById('custMachines').options;
	var newMachines=new Array();
	var addString="";
	var removeString="";
	var i;
	for(i=0; i<selList.length; i++){
		newMachines.push(selList[i].id);
	}
	for(i=0; i<currentIds.length; i++){
		if(newMachines.indexOf(currentIds[i])==-1){
			removeString+=currentIds[i]+"[|]";	
		}
	}
	for(i=0; i<newMachines.length; i++){
		if(currentIds.indexOf(newMachines[i])==-1){
			addString+=newMachines[i]+"[|]";	
		}
	}
	if(removeString.length>0){
		removeString=removeString.substring(0, removeString.length-3);
		removeString=removeString.replace(/o/g, "");
	}
	if(addString.length>0){
		addString=addString.substring(0, addString.length-3);
		addString=addString.replace(/o/g, "");
	}
	if(removeString.length!=0||addString.length!=0){
		var params="id="+currentCust+"&removed="+removeString+"&added="+addString;
		var sock=new XMLHttpRequest();
		sock.open("POST", "./updateMachines.php", true);
		sock.setRequestHeader('Content-type','application/x-www-form-urlencoded');
		sock.setRequestHeader("Content-length", params.length);
		sock.setRequestHeader("Connection", "close");
		sock.onreadystatechange = function() {
			if(sock.readyState == 4 && sock.status == 200) {
				if(sock.responseText=="0"){
					alert("Customer machines successfully updated!");
					searchCust();
				}else{
					alert(sock.responseText);
				}
			}
		}
		sock.send(params);
	} else {
		alert("You didn't change anything!");	
	}
}