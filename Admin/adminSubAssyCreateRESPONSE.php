<?php
	
	//require_once('../DemoPasswordVerify/PasswordVerify.php');
	
	/*$CustomerID = $_SESSION['LoggedInCustID'];*/
	
	//Get verified variables from the user form
	
	//Regular expressions used for validation
	$blankPattern="/\w/";
	
	//if(isset($_POST['select2'])){
		$selectedItems=$_POST['select2'];
		$subAssyName=$_POST['subAssyName'];
		
		/*if(!preg_match($blankPattern, $subAssyName)){//updated error check to verify length
			echo'<script>$(function() {
				$("#include").load("userModify.php");	
			});</script>';
			exit();*/
		//}
	//}
	
?>

<html>
	<head><title>Response page</title></head>
	<body>
		<h1>Database Insert</h1>
		<h2>You have prepared the following info(Not submitted):</h2>
		

		
		<?php
		
		$dsn = 'mysql:host=itsql.fvtc.edu;dbname=machineworx158';
		$username = 'MachineWorx158';
		$ServerPassword='MachineWorx158';
		
		$options=array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION);
		
		/*
		 * Insert the new check into the components database
		 */
		try{
			$db1 = new PDO($dsn,$username,$ServerPassword,$options);	
			
			$Insert= "Insert Into tblcomponents
			(Component_Name) 
			Value(:Component_Name)";
			
			$SQL = $db1->prepare($Insert);
			
			$SQL->bindValue(':Component_Name', $subAssyName);
			
			$SQL->execute();//execute the SQL query
		
			$SQL->closeCursor(); //disconnect from the server
		
		}catch(PDOException $e){
			$error_message = $e->getMessage();		
			echo("<p>Database error: $error_message</p>");
		}
			
		/*
		 * Insert the entries selected in  tbljoin_components_checks table
		 */
		try{
			$db2 = new PDO($dsn,$username,$ServerPassword,$options);	
			
			//Loop through all the items selected and insert into DB for the appropriate component
			$Insert= '';
			$i=1;
			$x=2;
			foreach($selectedItems as $selected){
				//$Insert .="('$subAssyName','$selected'),";
				//Test if numbers are accepted
				$Insert.="('$i', '$x'),";			
			}
			//$Insert="INSERT INTO  tbljoin_components_checks (Join_Component_ID,Join_Check_ID) VALUES " .trim($Insert,',');
			$Insert="INSERT INTO  tbljoin_components_checks (Join_Component_ID,Join_Check_ID) VALUES " .trim($Insert,',');
			
			$SQL = $db1->prepare($Insert);
			
			$SQL->bindValue(':Join_Component_ID', $subAssyName);
			$SQL->bindValue(':Join_Check_ID', $selected);
			
			$SQL->execute();//execute the SQL query
		
			$SQL->closeCursor(); //disconnect from the server
		
		}catch(PDOException $e){
			$error_message = $e->getMessage();		
			echo("<p>Database error: $error_message</p>");
		}
		?>
		
		<?php
			echo("<h3>The following array was provided from the rightmost select box:</h3>");
			print_r($_POST['select2']);
			//Check what the SQL statement looks like
			echo("<h3>The following SQL statement was executed:</h3>");
			print_r($Insert);
			echo('</br>');
		?>
			<!--li>Item added to component</li-->
		
		<?php
		
			$db1 = null; // Clear memory
			$db2 = null;
			
		?>
		
		<a href=index.php>Return Home</a>
		
	</body>
</html>