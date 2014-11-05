<?php
	
	if(isset($_POST['user'])){
		$userID=$_POST['user'];
		
		$argArray=array();
		if(isset($_POST['pass'])){
			array_push($argArray, "User_Password", "'".$_POST['pass']."'");
		}
		if(isset($_POST['role'])){
			array_push($argArray, "User_Role", $_POST['role']);
		}
		if(isset($_POST['fname'])){
			array_push($argArray, "User_FName", "'".$_POST['fname']."'");
		}
		if(isset($_POST['lname'])){
			array_push($argArray, "User_LName", "'".$_POST['lname']."'");
		}
		if(count($argArray)>0){
			$qStr="UPDATE tblUsers SET ";
			for($i=0; $i<count($argArray); $i+=2){
				if($i!=0){
					$qStr=$qStr.", ";
				}
				$qStr=$qStr.$argArray[$i]." = ".$argArray[$i+1];
			}
			$qStr=$qStr." WHERE UserID = ".$userID;
			
			$dsn = 'mysql:host=itsql.fvtc.edu;dbname=MachineWorx158';
			$username = 'MachineWorx158';
			$password = 'MachineWorx158';
			$options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
		
			try {
				$db = new PDO($dsn, $username, $password, $options);
				$query = $db->prepare($qStr); 
				$query->execute();
				
				echo("User updated!");
				
				$query->closeCursor();
				$db = null;
			
			} catch(PDOException $e) {
				$error_message = $e->getMessage();
				echo("Database error: $error_message");	
			}
			
		}else{
			die("You must change something to update the user.");
		}
	} else {
		die("No user specified!");	
	}

?>