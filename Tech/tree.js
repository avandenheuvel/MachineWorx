var tree;

function checkStatus(id, depth, dom){
	if(depth==3){
		loadAssembly(id);
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

function loadAssembly(id){
	var params="id="+id;
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