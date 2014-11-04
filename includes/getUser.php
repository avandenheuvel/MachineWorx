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
		$queryString = "SELECT User_Username, User_FName, User_LName, User_Role FROM tblUsers WHERE UserID = :ID";
		$db = new PDO($dsn, $username, $password, $options);
		$query = $db->prepare($queryString); 
		$query->bindParam(':ID', $userID);
		$query->execute();
		$row = $query->fetch();
		
		if ($row == NULL) {
			echo "Error: no user exists.";
		} else {
			echo $row['User_Username']."[|]".$row['User_FName']."[|]".$row['User_LName']."[|]".$row['User_Role']."[|]".$userID;
		}
		
		$query->closeCursor();
		$db = null;
	
	} catch(PDOException $e) {
		$error_message = $e->getMessage();
		echo("Database error: $error_message");	
	}
	
?>