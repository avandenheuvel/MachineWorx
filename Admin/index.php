<?php 
define('_ROOT', "../");
define('_ACCESS', 1);
?>
<!DOCTYPE html>
<html>
	<head>
		<title>machineWorx</title>
        <link rel="icon" type="image/png" href="../favicon.png"/>
		<link type="text/css" rel="stylesheet" href="../index.css"/>
		<link type="text/css" rel="stylesheet" href="./adminForms.css"/>
		<link type="text/css" rel="stylesheet" href="./helpFiles/_popUpStyle.css"/>
		
		<script src="./validation.js"></script>
		<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
		<!--<script src="scripts.js" type=text/javascript language=JavaScript></script>-->

	</head>
	<body>
		<?php include("../includes/header.php"); ?>
		<div id="adminContainer">
	
	<H1>Administrative options</H1>
	<div id="adminOptCont">
		<?php include('adminOptions.php');?>
	</div>
	
	<div id="adminDataArea">
		<?php include('adminDataArea.php');?>
	</div>
	
</div>
<?php include("../includes/footer.php"); ?>
	</body>
</html>

