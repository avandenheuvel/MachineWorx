<!DOCTYPE html>
<html>
	<head>
		<title>machineWorx</title>
		<link type="text/css" rel="stylesheet" href="../index.css"/>
		<link type="text/css" rel="stylesheet" href="../Admin/adminForms.css"/>
				<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
		<!--<script src="scripts.js" type=text/javascript language=JavaScript></script>-->

	</head>
	<body>
		<?php include("../includes/header.php"); ?>
		<div id="spacer"></div>
		<div id="spacer"></div>
		<div id="adminContainer">
	
	<H1>Administrative options</H1>
	<div id="adminOptCont">
		<?php include('techOptions.php')?>
	</div>
	
	<div id="adminDataArea">
		<?php include('techDataArea.php')?>
	</div>
	
</div>
<?php include("../includes/footer.php"); ?>
	</body>
</html>

