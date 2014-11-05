<?php
	
	//require_once('../DemoPasswordVerify/PasswordVerify.php');
	
	/*$CustomerID = $_SESSION['LoggedInCustID'];*/
	
	//Get verified variables from the user form
	
	//Regular expressions used for validation
	$blankPattern="/\w/";
	
	if(isset($_POST['available'])){
		$simpleDesc=$_POST['available'];
		if(!preg_match($blankPattern, $simpleDesc)){//updated error check to verify length
			echo'<script>$(function() {
				$("#include").load("adminItemCreate.php");	
			});</script>';
			exit();
		}
	}
	
	//if(isset($_POST['checkDescDetail'])){
		$detailedDesc=$_POST['checkDescDetail'];
		
		if(!preg_match($blankPattern, $detailedDesc)){//updated error check to verify length
			//header('Location:index.php');
			echo'<script>alert("2");</script>'; 
			exit();
		}
	//}
	
	//if(isset($_POST['checkType'])){
		$checkType=$_POST['checkType'];
		
		if(!preg_match($blankPattern, $checkType)){//updated error check to verify length
			//header('Location:index.php');
			echo'<script>alert("");</script>'; 
			exit();
		}
	//}
?>


<html>
	<head><title>Response page</title></head>
	<body>
		<h1>Database Update</h1>
		<h2>You have submitted the following info:</h2>
		
		<?php

		$dsn = 'mysql:host=itsql.fvtc.edu;dbname=machineworx158';
		$username = 'MachineWorx158';
		$ServerPassword='MachineWorx158';
		
		$options=array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION);
		
		try{
			$db = new PDO($dsn,$username,$ServerPassword,$options);	
			
			$update = "
				UPDATE tblChecks
				SET Check_Type = :Check_Type, Check_Desc = :Check_Desc
				WHERE Check_Name = :Check_Name";
			
			$SQL = $db->prepare($update);
			
			$SQL->bindValue(':Check_Name', $simpleDesc);
			$SQL->bindValue(':Check_Desc', $detailedDesc);
			$SQL->bindValue(':Check_Type', $checkType);
			
			
			$SQL->execute();//execute the SQL query
		
			$SQL->closeCursor(); //disconnect from the server
		
			}catch(PDOException $e){
				$error_message = $e->getMessage();		
				echo("<p>Database error: $error_message</p>");
			}
		?>
		
		<!--Many times PHP data is output to html with the echo command-->
		<!--This is another way to enter PHP variable tags-->
		<h3>Check name: <?=$simpleDesc?></h3>
		<h3>Check Description: <?=$detailedDesc?> </h3>
		<h3>Check Type: <?=$checkType?> </h3>
		
		<?php
		
			$db = null; // Clear memory
			
		?>
		
		<a href=index.php>Return Home</a>
		
	</body>
</html>