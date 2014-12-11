<?php
	
	$componentID=$_POST['compId'];
	$customerID=$_POST['custId'];
	$machineID=$_POST['machId'];
	$checkID=$_POST['checkId'];
	$comment=$_POST['comment'];
	$condition=$_POST['condition'];
	if($componentID=="" or $customerID=="" or $machineID=="" or $checkID=="" or $comment=="" or $condition==""){
		die("1");	
	}
	
	$dsn = 'mysql:host=itsql.fvtc.edu;dbname=MachineWorx158';
	$username = 'MachineWorx158';
	$password = 'MachineWorx158';
	$options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

	try {
		
		$queryString = "DELETE FROM tblchecked WHERE CustID=:custID AND MachID=:machID AND CompID=:compID AND CheckID=:checkID";
		$db = new PDO($dsn, $username, $password, $options);
		$query = $db->prepare($queryString); 
		$query -> bindParam(':custID', $customerID);
		$query -> bindParam(':machID', $machineID);
		$query -> bindParam(':compID', $componentID);
		$query -> bindParam(':checkID', $checkID);
		$query->execute();
		$query->closeCursor();
		
		$q=$db->prepare("INSERT INTO tblchecked (CustID, MachID, CompID, CheckID, Date, Cond, Comment) VALUES (".$customerID.",".$machineID.",".$componentID.",".$checkID.",'".date("Y-m-d")."','".$condition."','".$comment."')");
		$q->execute();
		$q->closeCursor();
		
		$db = null;
		echo("0");
	
	} catch(PDOException $e) {
		$error_message = $e->getMessage();
		echo($error_message);	
	}
	
?>