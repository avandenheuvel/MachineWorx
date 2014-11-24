<?php 
define('_ROOT', "../");
define('_ACCESS', 2);
?>
<!DOCTYPE html>
<html>
	<head>
		<title>machineWorx</title>
        <link rel="icon" type="image/png" href="../favicon.png"/>
		<link type="text/css" rel="stylesheet" href="../index.css"/>
		<link type="text/css" rel="stylesheet" href="../Admin/adminForms.css"/>
        <link type="text/css" rel="stylesheet" href="./tech.css"/>
		<script src="./tree.js" type="text/javascript"></script>
        
	</head>
	<body onload="updateTree(0,0,'adminOptCont');">
		<?php include("../includes/header.php");?>
		<div id="adminContainer">
			<H1>Technician Data Entry</H1>
			<div id="adminOptCont">
            	<!--Dynamically load tree from javascript.-->
			</div>
			<div id="adminDataArea">
				<?php include('techDataArea.php');?>
			</div>		
		</div>
		<?php include("../includes/footer.php");?>
	</body>
</html>

