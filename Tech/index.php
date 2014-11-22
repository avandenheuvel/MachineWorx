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
		<link type="text/css" rel="stylesheet" href="_styles.css" />
		
        <script type="text/javascript">
			function nextFolder(id){
				alert("Get all items with parent id of: "+id);	
			}
		</script>
        
	</head>
	<body>
		<?php include("../includes/header.php");?>
		<div id="adminContainer">
			<H1>Technician Data Entry</H1>
			<div id="adminOptCont">
				<?php include('./loadTree.php');?>
			</div>
			<div id="adminDataArea">
				<?php include('techDataArea.php');?>
			</div>		
		</div>
		<?php include("../includes/footer.php");?>
	</body>
</html>

