<?php define('_ROOT', "../");?>
<!DOCTYPE html>
<html>
	<head>
		<title>Login to MachineWorx</title>
		<link rel="icon" type="image/png" href="../favicon.png"/>
		<link rel="stylesheet" type="text/css" href="../index.css"/>
        <link rel="stylesheet" type="text/css" href="./login.css"/>
	</head>

	<body>
    	<?php include_once("../includes/header.php");?>
        <div id="loginDiv">
        <form action="./login.php" method="post">
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