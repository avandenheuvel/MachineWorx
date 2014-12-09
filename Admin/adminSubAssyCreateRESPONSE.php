<?php
	
//	//require_once('../DemoPasswordVerify/PasswordVerify.php');
//	
//	/*$CustomerID = $_SESSION['LoggedInCustID'];*/
//	
//	//Get verified variables from the user form
//	
//	//Regular expressions used for validation
//	$blankPattern="/\w/";
//	
//	if(isset($_POST['select2'])){
//		$selectedItems=$_POST['select2'];
//		$subAssyName=$_POST['subAssyName'];
//		
	/*if(!preg_match($blankPattern, $subAssyName)){//updated error check to verify length
//			echo'<script>$(function() {
//				$("#include").load("userModify.php");	
//			//});</script>';
//			//exit();*/
//		//}
//	}
	
	//Ensure that there are values in subAssyName and checkID, else exit

	if (!empty($_POST['subAssyName']) || !empty($_POST['checkID'])) {
		$subAssyName = $_POST['subAssyName'];
		$checkID = $_POST['checkID'];
	} else {
		echo "Empty - bye";
		exit;
	}

	//Insert new Component (subAssy) and grab the ID of that new subAssy
	
	$lastInserted = "";
	
	$dsn = 'mysql:host=itsql.fvtc.edu;dbname=MachineWorx158';
	$username = 'MachineWorx158';
	$password = 'MachineWorx158';
	$options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);	
	
	try {
		
		$db = new PDO($dsn, $username, $password, $options);
		$sqlInsert = 'INSERT INTO tblcomponents(Component_Name) '.
				 	 'VALUES(:Component_Name)';
		
		$sql = $db->prepare($sqlInsert);
		$sql->bindValue(':Component_Name', $subAssyName);
		$sql->execute(); //execute the statement	
		
		$sql->closeCursor(); //release the table
		
		$lastInserted = $db->lastInsertId();
		
		//loop through each value in select2 and insert it into the DB with the ID of the new Component
		foreach ($checkID as &$value) {
			$joinInsert = 'INSERT INTO tbljoin_components_checks(Join_Component_ID, Join_Check_ID) '.
						  'VALUES (:CompID, :CheckID)';
			$join = $db->prepare($joinInsert);
			$join->bindValue(':CompID', $lastInserted);
			$join->bindValue(':CheckID', $value);
			$join->execute();
		}
		
		$join->closeCursor();
		
	} catch(PDOException $e) {
		$error_message = $e->getMessage();
		echo("<p>Database error: $error_message</p>");	
	}
	
	$db = null;
	
?>

<html>
	<head><title>Response page</title></head>
	<body>
		<h1>Database Insert</h1>
		<h2>You have prepared the following items for submission:</h2>
		

		
		
		
		<a href=index.php>Return Home</a>
		
	</body>
</html>