<?php
	
	$id=NULL;
	if(isset($_SESSION['id'])){
		$id=$_SESSION['id'];
	}else{
		die("No Tech ID specified.");	
	}
	$dsn = 'mysql:host=itsql.fvtc.edu;dbname=MachineWorx158';
	$username = 'MachineWorx158';
	$password = 'MachineWorx158';
	$options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

	try {
		$queryString = "SELECT name, id FROM treeview_items WHERE tech_id = :id AND parent_id = 0;";
		$db = new PDO($dsn, $username, $password, $options);
		$query = $db->prepare($queryString); 
		$query -> bindParam(':id', $id);
		$query->execute();
		
		while($row = $query->fetch(PDO::FETCH_ASSOC)){
			echo ("<div onclick=\"nextFolder('".$row['id']."');\">".$row['name']."</div>");
		}
		
		$query->closeCursor();
		$db = null;
	
	} catch(PDOException $e) {
		$error_message = $e->getMessage();
		echo("Database error: $error_message");	
	}
?>