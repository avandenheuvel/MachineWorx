<?php
	
	//Ensure that there are values in subAssyName and checkID, else exit

	if (!empty($_POST['ModelName']) || !empty($_POST['ComponentID'])) {
		$ModelName = $_POST['ModelName'];
		$modelDescDetail = $_POST['modelDescDetail'];
		$ComponentID = $_POST['ComponentID'];
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
		$sqlInsert = 'INSERT INTO tblmodels(Model_Name, Model_Desc) '.
				 	 'VALUES(:Model_Name, :Model_Desc)';
		
		$sql = $db->prepare($sqlInsert);
		$sql->bindValue(':Model_Name', $ModelName);
		$sql->bindValue(':Model_Desc', $modelDescDetail);
		$sql->execute(); //execute the statement	
		
		$sql->closeCursor(); //release the table
		
		$lastInserted = $db->lastInsertId();
		
		//loop through each value in select2 and insert it into the DB with the ID of the new Component
		foreach ($ComponentID as &$value) {
			$joinInsert = 'INSERT INTO  tbljoin_model_component(Join_Model_ID,Join_ComponentID) '.
						  'VALUES (:ModelID, :CompID)';
			$join = $db->prepare($joinInsert);
			$join->bindValue(':ModelID', $lastInserted);
			$join->bindValue(':CompID', $value);
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
		<h2>The following inserts were completed on the DB:</h2>
		<h3><?=$sqlInsert?></h3>
		<h3><?=$joinInsert?></h3>
		<a href=index.php>Return Home</a>
		
	</body>
</html>