<?php
	
	session_start();
	
	$id=$_POST['id'];
	$depth=$_POST['depth'];
	if($id==0){
		if(isset($_SESSION['id'])){
			$id=$_SESSION['id'];
		}else{
			die("No ID specified.");	
		}
	}
	if($depth<0 or $depth>2 or $depth==NULL){
		die("Invalid depth.");
	}
	$dsn = 'mysql:host=itsql.fvtc.edu;dbname=MachineWorx158';
	$username = 'MachineWorx158';
	$password = 'MachineWorx158';
	$options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

	try {
		$queryString="";
		switch($depth){
			case 0:
				$queryString = "SELECT c.Join_Cust_ID, u.User_FName, u.User_LName FROM tbljoin_technician_customer c, tblusers u WHERE c.Join_Tech_ID = :id AND c.Join_Cust_ID = u.UserID";
				break;
			case 1:
				$queryString = "SELECT c.Join_MachineID, m.Machine_Make, m.Machine_Model FROM tbljoin_customer_machines c, tblmachines m WHERE c.Join_CustomerID = :id AND c.Join_MachineID = m.MachineID";
				break;
			case 2:
				$queryString = "SELECT m.Join_ComponentID, c.Component_Name FROM tbljoin_machine_component m, tblcomponents c WHERE m.Join_MachineID = :id AND m.Join_ComponentID = c.ComponentID";
				break;
			default:
				die("Invalid Depth");
				break;	
		}
		$db = new PDO($dsn, $username, $password, $options);
		$query = $db->prepare($queryString); 
		$query -> bindParam(':id', $id);
		$query->execute();
		$return="";
		while($row = $query->fetch(PDO::FETCH_ASSOC)){
			switch($depth){
				case 0:
				$return=$return.$row['Join_Cust_ID']."||1||".$row['User_FName']." ".$row['User_LName']."[|]";
				break;
			case 1:
				$return=$return.$row['Join_MachineID']."||2||".$row['Machine_Make']." ".$row['Machine_Model']."[|]";
				break;
			case 2:
				$return=$return.$row['Join_ComponentID']."||3||".$row['Component_Name']."[|]";
				break;
			default:
				die("Invalid Depth");
				break;	
			}
		}
		if($return!=""){
			$return=substr($return, 0, -3);	
		}
		echo($return);
		
		$query->closeCursor();
		$db = null;
	
	} catch(PDOException $e) {
		$error_message = $e->getMessage();
		echo("Database error: $error_message");	
	}
?>