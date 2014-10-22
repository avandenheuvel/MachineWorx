<?php
	
	//require_once('../DemoPasswordVerify/PasswordVerify.php');
	
	/*$CustomerID = $_SESSION['LoggedInCustID'];*/
	
	//Get verified variables from the user form
	
	//Regular expressions used for validation
	$namePattern = "/^\s*[a-zA-Z,\s]+\s*$/";
	$phonePattern="/^\d\d\d\-\d\d\d\-\d\d\d\d$/";
	$blankPattern="/\w/";
	$zipPattern="/^\d{5}(-\d{4})?$/";
	$eMailPattern="/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/";
	
	$simpleDesc=$_GET['checkDescSimple'];
	/*if(!preg_match($blankPattern, $simpleDesc)){//updated error check to verify length
		header('Location:index.php');
		echo'<script type="text/javascript">alert("1");</script>'; 
		exit();
	}*/
	
	$detailedDesc=$_GET['checkDescDetail'];
	/*if(!preg_match($blankPattern, $detailedDesc)){
		header('Location:index.php');
		echo'<script type="text/javascript">alert("2");</script>'; 
		exit();
	}*/
	
	$checkType=$_GET['checkType'];
	echo'<script type="text/javascritp"alert(<?=$checkType?>);</script>';
	
	

?>

<html>
	<head><title>Response page</title></head>
	<body>
		<h1>Your Account has been updated</h1>
		<h2>You have submitted the following info:</h2>
		
		<?php
		/*
		$dsn = 'mysql:host=itsql.fvtc.edu;dbname=machineworx158';
		$username = 'MachineWorx158';
		$ServerPassword='MachineWorx158';
		
		$options=array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION);
		
		try{
			$db = new PDO($dsn,$username,$ServerPassword,$options);	
			
			$update = "
				UPDATE CustomerInfo
				SET FirstName = :FirstName, LastName = :LastName, 
					Address = :Address, City = :City, State = :State, Zip = :Zip, 
					Phone = :Phone, EMail = :EMail, Password = :Password
				WHERE CustomerID = :CustomerID";
			
			$SQL = $db->prepare($update);
			
			$SQL->bindValue(':CustomerID', $CustomerID);
			$SQL->bindValue(':FirstName', $firstName);
			$SQL->bindValue(':LastName', $lastName);
			$SQL->bindValue(':Address', $address);
			$SQL->bindValue(':City', $city);
			$SQL->bindValue(':State', $state);
			$SQL->bindValue(':Zip', $zip);
			$SQL->bindValue(':Phone', $phone);
			$SQL->bindValue(':EMail', $eMail);
			$SQL->bindValue(':Password', $password);
			
			$SQL->execute();//execute the SQL query
		
			$SQL->closeCursor(); //disconnect from the server
		
			}catch(PDOException $e){
				$error_message = $e->getMessage();		
				echo("<p>Database error: $error_message</p>");
			}
		*/
		?>
		
		<!--Many times PHP data is output to html with the echo command-->
		<!--This is another way to enter PHP variable tags-->
		<h3>Check name: <?=$simpleDesc?></h3>
		<h3>Check Description: <?=$detailedDesc?> </h3>
		<h3>Check Type: <?=$$checkType?> </h3>
		
		<?php
		
			$db = null; // Clear memory
			
		?>
		
		<a href=index.php>Return Home</a>
		
	</body>
</html>