<?php
	
	$user="";
	if($_POST['userID']!=""){
		$user=$_POST['userID'];
	} else {
		die("No customer specified.");	
	}
		
	$dsn = 'mysql:host=itsql.fvtc.edu;dbname=MachineWorx158';
	$username = 'MachineWorx158';
	$password = 'MachineWorx158';
	$options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

	try {
		$db = new PDO($dsn, $username, $password, $options);
		
		$username="";
		$q1 = $db->prepare("SELECT User_Username FROM tblusers WHERE UserID=:user");
		$q1->bindParam(":user", $user); 
		$q1->execute();
		while($row = $q1->fetch(PDO::FETCH_ASSOC)){
			$username=$row['User_Username'];
		}
		$q1->closeCursor();
		
		$availableMachines="";
		$ownedMachines="";
		$q3 = $db->prepare("SELECT m.MachineID, m.Machine_Make , m.Machine_Model, c.Join_CustomerID FROM tblmachines m LEFT JOIN tbljoin_customer_machines c ON m.MachineID = c.Join_MachineID AND c.Join_CustomerID = :user");
		$q3->bindParam(":user", $user); 
		$q3->execute();
		while($row = $q3->fetch(PDO::FETCH_ASSOC)){
			if($row['Join_CustomerID']==""){
				$availableMachines=$availableMachines.$row['MachineID']."[|]".$row['Machine_Make']." ".$row['Machine_Model']."[||]";
			}else{
				$ownedMachines=$ownedMachines.$row['MachineID']."[|]".$row['Machine_Make']." ".$row['Machine_Model']."[||]";
			}
		}
		$q3->closeCursor();
		
		if($availableMachines!=""){
			$availableMachines=substr($availableMachines, 0, -4);
		}
		if($ownedMachines!=""){
			$ownedMachines=substr($ownedMachines, 0, -4);
		}
		
		echo($username."[|||]".$availableMachines."[|||]".$ownedMachines);
		$db = null;
	
	} catch(PDOException $e) {
		$error_message = $e->getMessage();
		echo("Database error: $error_message");	
	}
	
?>