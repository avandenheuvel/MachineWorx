

<?php
	/**
	 * Connect to the databese and retrieve available items/checks
	 * Creates an array $arr[] used to store retrieved db values 
	 * encoded in <script> used to generate web page
	 */

	$dsn = 'mysql:host=itsql.fvtc.edu;dbname=machineworx158';
	$username = 'MachineWorx158';
	$ServerPassword='MachineWorx158';
	
	$options=array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION);
	
	try{
		$db = new PDO($dsn,$username,$ServerPassword,$options);
			
		
		$SQL = $db->prepare("Select * from tblmodels");
		$SQL->execute();//execute the SQL query
		$Model = $SQL->fetch();//Gets the first row of the table
		
		//loop through all tuples in relation	
		while($Model != null){
			
			//Gets the current row value from the appropriate column
			$modelID = $Model['Model_ID'];
			$modelName = $Model['Model_Name'];
			$modelDesc=$Model['Model_Desc'];
			
			$arr[] = array('Model_ID' => $modelID, 'Model_Name' => $modelName, 'Model_Desc' => $modelDesc);
			
			$Model = $SQL->fetch();//fetch the next row*/
		}
		
		//echo json_encode($arr); //Used for troubleshooting of JSON data
		
		$SQL->closeCursor(); //disconnect from the server
		$db = null; // Clear memory
	
	}catch(PDOException $e){
		$error_message = $e->getMessage();		
		echo("<p>Database error: $error_message</p>");
	}
?>


<form name="editItem" action="adminMachineCreateRESPONSE.php" method="post">
	<div id="editContainer">
		<h2>Create Machine</h2>
		<p>Create Machines by assigning a serial number to the appropriate model. If the model you require doesn't exist you can make one on the 
			<a href class="link"onclick='setUpAdmin("Create Model"); return false;'>Create Model</a> page.</p><!--Calls function in adminOptions.php-->
		
		<label for="txtInput"><h4><strong>Enter Machine Make</strong></h4></label>
		<textarea id="machineMake" name="machineMake" rows="1" cols="50" maxlength="40" class="txtInput"
			onblur="validate('checkDescSimple','checkDescSimpleErr')"
			onfocus="resetError('checkDescSimpleErr')"></textarea>	
		<div id="checkDescSimpleErr" class="error" ></div>
		
		
		<h4>Select Model</h4><select class="dropdown" id="available" name="available" onchange="populateDesc(this);">
			<option>Choose check to edit...</option>
			<script>
				//Define options for building list of available checks to edit
				
				var tuppleArray=<?=json_encode($arr)?>;
				
				/*
				 * Build the list of available items
				 */
				for(var i = 0; i<tuppleArray.length; i++ ){
					var link = document.createElement('option');
					link.className = "";
					link.textContent = tuppleArray[i].Model_Name;
					link.href = '#';
					document.getElementById('available').appendChild(link);
				}
			</script>
		</select>
		
	</br>
	
	</div><!--End editContainer-->	
	
	<div class="formButton">
	    <input type=submit id="btnSubmit" name="submitItemEdit" action="adminMachineCreateRESPONSE.php" method="post" value="Submit" />
	    <input type=reset	 id="btnReset" name="cancelItemEdit" value="Cancel"/>
    </div>
</form>