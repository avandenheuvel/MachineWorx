<?php
	
	//require_once('../DemoPasswordVerify/PasswordVerify.php');
	
	/*$CustomerID = $_SESSION['LoggedInCustID'];*/
	
	//Get verified variables from the user form
	
	//Regular expressions used for validation
	$blankPattern="/\w/";
	
	if(isset($_POST['select2'])){
		$selectedItems=$_POST['select2'];
		
		/*if(!preg_match($blankPattern, $subAssyName)){//updated error check to verify length
			echo'<script>$(function() {
				$("#include").load("userModify.php");	
			});</script>';
			exit();*/
		//}
	}
	
?>

		<script>//Build list of items in righthand select box
			 var sel = document.getElementbyId("select2");
			 var selArr[];
			 var listLength = sel.options.length;
			 for(var i=0;i<listLength;i++){
			 	selArr[i]=sel.options[i].text;
			 	alert(sel.options[i].text);
			  }
		</script>

<html>
	<head><title>Response page</title></head>
	<body>
		<h1>Database Insert</h1>
		<h2>You have submitted the following info:</h2>
		

		
		<!--?php
		
		$dsn = 'mysql:host=itsql.fvtc.edu;dbname=machineworx158';
		$username = 'MachineWorx158';
		$ServerPassword='MachineWorx158';
		
		$options=array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION);
		
		/*
		 * Insert the new check into the components database
		 */
		try{
			$db = new PDO($dsn,$username,$ServerPassword,$options);	
			
			$Insert= "Insert Into tblcomponents
			(Component_Name) 
			Value(:Component_Name)";
			
			$SQL = $db->prepare($Insert);
			
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
			$db = new PDO($dsn,$username,$ServerPassword,$options);	
			
			//Loop through all the items selected and insert into DB for the appropriate component
			
			$Insert= "Insert Into tbljoin_components_checks
			(Component_Name,) 
			Value(:Component_Name)";
			
		//This is the part I'm working on
			$stmt = $db->prepare('INSERT INTO `tbljoin_components_checks` (`col1`, `col2`) 
                      VALUES(:col1, :col2)');
			
			foreach($items as $item)
			{
			    $stmt->bindValue(':col1', $item[0]);
			    $stmt->bindValue(':col2', $item[1]);
			    $stmt->execute();
			}
		//Ends here
		
			$stmt->closeCursor(); //disconnect from the server
		
		}catch(PDOException $e){
			$error_message = $e->getMessage();		
			echo("<p>Database error: $error_message</p>");
		}
		?-->
		
		<!--Many times PHP data is output to html with the echo command-->
		<!--This is another way to enter PHP variable tags-->
		<h3>Sub-Assembly name: <?=$selectedItems?></h3>
			<!--li>Item added to component</li-->
		
		<?php
		
			$db = null; // Clear memory
			
		?>
		
		<a href=index.php>Return Home</a>
		
	</body>
</html>