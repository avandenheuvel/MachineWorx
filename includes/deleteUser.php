<?php
	
	$userID=$_POST['userID'];
	if($userID==""){
		die("Error: no user specified.");
	}
	
	$dsn = 'mysql:host=itsql.fvtc.edu;dbname=MachineWorx158';
	$username = 'MachineWorx158';
	$password = 'MachineWorx158';
	$options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

	try {
		$queryString = "DELETE FROM tblUsers WHERE UserID = :ID";
		$db = new PDO($dsn, $username, $password, $options);
		$query = $db->prepare($queryString); 
		$query->bindParam(':ID', $userID);
		$query->execute();
		
		echo("User Deleted!");
		
		$query->closeCursor();
		$db = null;
	
	} catch(PDOException $e) {
		$error_message = $e->getMessage();
		echo("Database error: $error_message");	
	}
	
?>