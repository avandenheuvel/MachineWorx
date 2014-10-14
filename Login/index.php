<?php define('_ROOT', "../");?>
<!DOCTYPE html>
<html>
	<head>
		<title>Login to MachineWorx</title>
		<link rel="icon" type="image/png" href="../favicon.png"/>
		<link rel="stylesheet" type="text/css" href="../index.css"/>
        <link rel="stylesheet" type="text/css" href="./login.css"/>
        <script type="text/javascript">
			
			function validateAndSend(){
				if(document.getElementById('username').value==""){
					
				}
				if(document.getElementById('password').value==""){
					
				}
				sendRequest();
				return(true);
			}
			
			function sendRequest(){
				var params="username="+document.getElementById('username').value+"&password="+document.getElementById('password').value;
				var xmlObj=new XMLHttpRequest();
				xmlObj.open("POST", "./login.php", true);
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
				alert(code);
			}
		</script>
	</head>

	<body>
    	<?php include_once("../includes/header.php");?>
        <div id="loginDiv">
        <form method="post" onSubmit="validateAndSend();">
        	<label for="username">Username: </label>
			<input id="username" name="username" type="text"/>
            <label for="password">Password: </label>
			<input id="password" name="password" type="password"/><br/>
            <input type="submit" value="Login"/>
        </form>
        </div>
        <?php include_once("../includes/footer.php");?>
	</body>
</html>