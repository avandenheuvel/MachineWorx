function checkStatus(id, depth, dom){
	if(depth==3){
		var tree=document.getElementById("adminOptCont").childNodes;
		var child=document.getElementById(dom);
		var index=0;
		while((child=child.previousSibling)!=null){
			index++;	
		}
		var custId=null;
		var machId=null;
		var compId=null;
		for(var i=index; i>=0; i--){
			if(compId==null){
				compId=tree[i].dbId;
			}
			if(machId==null){
				if(tree[i].classList.contains("lev2")){
					machId=tree[i].dbId;
				}
			}
			if(custId==null){
				if(tree[i].classList.contains("lev1")){
					custId=tree[i].dbId;	
				}
			}
		}
		loadAssembly(custId, machId, compId);
	}else{
		var linkArray=document.getElementById('adminOptCont').getElementsByClassName(dom);
		if(linkArray.length>0){
			for(var i=linkArray.length-1; i>=0; i--){
				if(depth==1){
					var subLinks=document.getElementById('adminOptCont').getElementsByClassName(linkArray[i].id);
					if(subLinks.length>0){
						for(var c=subLinks.length-1; c>=0; c--){
							document.getElementById('adminOptCont').removeChild(subLinks[c]);
						}
					}
				}
				document.getElementById('adminOptCont').removeChild(linkArray[i]);
			}
		}else{
			updateTree(id, depth, dom);
		}
	}
}

function loadAssembly(custId, machId, compId){
	var params="custId="+custId+"&machId="+machId+"&compId="+compId;
	var xmlObj=new XMLHttpRequest();
	xmlObj.open("POST", "./techInput.php", true);
	xmlObj.setRequestHeader('Content-type','application/x-www-form-urlencoded');
	xmlObj.setRequestHeader("Content-length", params.length);
	xmlObj.setRequestHeader("Connection", "close");
	xmlObj.onreadystatechange = function() {
		if(xmlObj.readyState == 4 && xmlObj.status == 200) {
			document.getElementById('include').innerHTML=xmlObj.responseText;
		}
	}
	xmlObj.send(params);
}

function updateTree(id, depth, pId){
	var params="id="+id+"&depth="+depth;
	var xmlObj=new XMLHttpRequest();
	xmlObj.open("POST", "./loadTree.php", true);
	xmlObj.setRequestHeader('Content-type','application/x-www-form-urlencoded');
	xmlObj.setRequestHeader("Content-length", params.length);
	xmlObj.setRequestHeader("Connection", "close");
	xmlObj.onreadystatechange = function() {
		if(xmlObj.readyState == 4 && xmlObj.status == 200) {
			handleDisplay(xmlObj.responseText, pId);
		}
	}
	xmlObj.send(params);
}

function handleDisplay(info, pId){
	if(info!=""){
		var linkArray=info.split("[|]");
		for(var i=0; i<linkArray.length; i++){
			var dataArray=linkArray[i].split("||");
			var treeLink=document.createElement('div');
			treeLink.id=pId+"-"+i;
			treeLink.dbId=dataArray[0];
			treeLink.onclick=function(){
				checkStatus(this.dbId, dataArray[1], this.id);
			}
			treeLink.innerHTML=dataArray[2];
			treeLink.classList.add("lev"+dataArray[1]);
			treeLink.classList.add(pId);
			if(dataArray[1]==1){
				document.getElementById('adminOptCont').appendChild(treeLink);
			}else{
				document.getElementById('adminOptCont').insertBefore(treeLink, document.getElementById(pId).nextSibling);
			}
		}
	}
}

function updateCheck(custId, machId, compId, checkId, callId){
	var pNode=document.getElementById(callId).parentNode.parentNode;
	var selectNode=pNode.getElementsByTagName('select')[0];
	if(selectNode.options[selectNode.selectedIndex].value==""){
		selectNode.style.borderColor="#F00";
	}else{
		var commentNode=pNode.getElementsByTagName('textarea')[0];
		if(commentNode.value==""){
			commentNode.style.borderColor="#F00";
		}else{
			sendUpdate(custId, machId, compId, checkId, selectNode.options[selectNode.selectedIndex].value, commentNode.value, callId);	
		}
	}
}

function sendUpdate(custId, machId, compId, checkId, cond, comment, callId){
	var params="custId="+custId+"&machId="+machId+"&compId="+compId+"&checkId="+checkId+"&condition="+cond+"&comment="+comment;
	var xmlObj=new XMLHttpRequest();
	xmlObj.open("POST", "./updateCheck.php", true);
	xmlObj.setRequestHeader('Content-type','application/x-www-form-urlencoded');
	xmlObj.setRequestHeader("Content-length", params.length);
	xmlObj.setRequestHeader("Connection", "close");
	xmlObj.onreadystatechange = function() {
		if(xmlObj.readyState == 4 && xmlObj.status == 200) {
			if(xmlObj.responseText=="0"){
				document.getElementById(callId).parentNode.parentNode.parentNode.removeChild(document.getElementById(callId).parentNode.parentNode);
			}else{
				alert(xmlObj.responseText);
			}
		}
	}
	xmlObj.send(params);
}