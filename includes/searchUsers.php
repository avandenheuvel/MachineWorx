<?php
	
	$user="";
	if($_POST['user']!=""){
		$user=$_POST['user'];
	}
		
	$dsn = 'mysql:host=itsql.fvtc.edu;dbname=MachineWorx158';
	$username = 'MachineWorx158';
	$password = 'MachineWorx158';
	$options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

	try {
		$queryString = "SELECT User_Username, User_FName, User_LName, User_Role FROM tblUsers WHERE User_Username LIKE '".$user."%'";
		$db = new PDO($dsn, $username, $password, $options);
		$query = $db->prepare($queryString); 
		$query->execute();
		
		while($row = $query->fetch(PDO::FETCH_ASSOC)){
			echo "<div>Username: ".$row['User_Username']." First Name: ".$row['User_FName']." Last Name: ".$row['User_LName']." Role: ".$row['User_Role']."</div>";
		}
		
		$query->closeCursor();
		$db = null;
	
	} catch(PDOException $e) {
		$error_message = $e->getMessage();
		echo("Database error: $error_message");	
	}
	
?>