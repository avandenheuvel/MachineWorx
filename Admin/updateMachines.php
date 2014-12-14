<?php
	
	$id=$_POST['id'];
	$addedStr=$_POST['added'];
	$removedStr=$_POST['removed'];
	if($id==""){
		die("No customer selected!");	
	}
	if($addedStr=="" and $removedStr==""){
		die("Nothing was changed!");	
	}
	
	$dsn = 'mysql:host=itsql.fvtc.edu;dbname=MachineWorx158';
	$username = 'MachineWorx158';
	$password = 'MachineWorx158';
	$options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

	try {
		$db = new PDO($dsn, $username, $password, $options);
		
		if($removedStr!=""){
			$rVals=explode("[|]", $removedStr);
			$qs1="DELETE FROM tbljoin_customer_machines WHERE Join_CustomerID = ".$id." AND (Join_MachineID=".$rVals[0];
			for($i=1; $i<count($rVals); $i++){
				$qs1=$qs1." OR Join_MachineID=".$rVals[$i];
			}
			$qs1=$qs1.")";
			$q1 = $db->prepare($qs1);
			$q1->execute();
			$q1->closeCursor();
		}
		
		if($addedStr!=""){
			$aVals=explode("[|]", $addedStr);
			$qs2="INSERT INTO tbljoin_customer_machines(Join_CustomerID, Join_MachineID) VALUES (".$id.",".$aVals[0].")";
			for($i=1; $i<count($aVals); $i++){
				$qs2=$qs2.",(".$id.",".$aVals[$i].")";
			}
			$q2 = $db->prepare($qs2); 
			$q2->execute();
			$q2->closeCursor();
		}
		
		$db = null;
		echo("0");
	
	} catch(PDOException $e) {
		$error_message = $e->getMessage();
		echo("Database error: $error_message");	
	}
	
?>