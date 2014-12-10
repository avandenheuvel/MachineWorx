<?php
	
	//Ensure that there are values in subAssyName and checkID, else exit

	if (!empty($_POST['machineMake']) || !empty($_POST['available'])) {
		$machineMake = $_POST['machineMake'];
		$ModelName = $_POST['available'];
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
		$sqlInsert = 'INSERT INTO tblmachines(Machine_Make, Machine_Model) '.
				 	 'VALUES(:Machine_Make, :Machine_Model)';
		
		$sql = $db->prepare($sqlInsert);
		$sql->bindValue(':Machine_Make', $machineMake);
		$sql->bindValue(':Machine_Model', $ModelName);
		$sql->execute(); //execute the statement	
		
		$sql->closeCursor(); //release the table
		
		$lastInserted = $db->lastInsertId();
		
		//loop through each value in select2 and insert it into the DB with the ID of the new Component
		
		$joinInsert = 'INSERT INTO  tbljoin_machine_model(Join_MachineID,Join_Model_ID) '.
					  'VALUES (:machID, :modelID)';
		$join = $db->prepare($joinInsert);
		$join->bindValue(':machID', $lastInserted);
		$join->bindValue(':modelID', $ModelName);
		$join->execute();
		
		
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
		<h2>The following inserts were completed on the DB:</h2>
		<h3><?=$sqlInsert?></h3>
		<h3><?=$joinInsert?></h3>
		<a href=index.php>Return Home</a>
		
	</body>
</html>