<?php define('_ROOT', "./"); ?>

<!DOCTYPE html>
<html>
	<head>
		<title>machineWorx</title>
        <link rel="icon" type="image/png" href="./favicon.png"/>
		<link href="./index.css" type="text/css" rel="stylesheet"/>
	</head>
	
	<body>
		<?php include_once("./includes/header.php");?>
		<div id="test" style="position: relative; top: 20%;">
			<a href="./Admin">Admin Options</a></br>
			<a href="./Tech">Technician - Enter Data</a><br/>
		</div>
        <?php include_once("./includes/footer.php");?>
	</body>
</html>