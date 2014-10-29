<?php

	$user=$_POST['user'];
	$pass=$_POST['pass'];
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$role=$_POST['role'];
	
	if($user=="" or $pass=="" or $fname=="" or $lname==""){
		echo "2";	
	} else {
		
		$dsn = 'mysql:host=itsql.fvtc.edu;dbname=MachineWorx158';
		$username = 'MachineWorx158';
		$password = 'MachineWorx158';
		$options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

		try {
			$queryString = "SELECT User_Username FROM tblUsers WHERE User_Username = :username";
			$db = new PDO($dsn, $username, $password, $options);
			$query = $db->prepare($queryString); 
			$query -> bindParam(':username', $user);
			$query->execute();
			$row = $query->fetch();
			
			if ($row == NULL) {
				$insert=$db->prepare("INSERT INTO tblusers (User_FName, User_LName, User_Username, User_Password, User_Role) VALUES (:fname, :lname, :user, :pass, :role)");
				$insert->bindParam(':fname',$fname);
				$insert->bindParam(':lname',$lname);
				$insert->bindParam(':user',$user);
				$insert->bindParam(':pass',$pass);
				$insert->bindParam(':role',$role);
				$insert->execute();
				$insert->closeCursor();
				echo "0";
			}else{
				echo "1";	
			}
		
			$query->closeCursor();
			$db = null;
	
		} catch(PDOException $e) {
			
			$error_message = $e->getMessage();
			echo("Database error: $error_message");	
			
		}
	}
	
?>