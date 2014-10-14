<?php
	echo "1";
	/*session_start();
	
	$user = $_POST['username'];
	$pass = $_POST['password'];
	
	//Create a connection to the database and set the error handling
	//to throw messages
	$dsn = 'mysql:host=itsql.fvtc.edu;dbname=MachineWorx158';
	$username = 'MachineWorx158';
	$password = 'MachineWorx158';
	$options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

	//Give the connection a try
	try {
		$queryString = "SELECT User_Password, User_Role FROM tblUsers WHERE User_Username = :username";
		$db = new PDO($dsn, $username, $password, $options);
		$query = $db->prepare($queryString); 
		$query -> bindParam(':username', $user);
		$query->execute();
		$row = $sql->fetch(); //grab the first row of the results
		
		if ($row == NULL) {
			
		} else {
			$password=$row['User_Password'];	
		}
		
		$query->closeCursor(); //close the connection
		$db = null; //null out the connection information
	
	//If we encounter an error, display it	
	} catch(PDOException $e) {
		$error_message = $e->getMessage();
		echo("Database error: $error_message");	
	}*/
	
?>