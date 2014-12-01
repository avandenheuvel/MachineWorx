<script>
	/*
	 * Search check names to find appropriate description
	 * In=<object> element holding the name
	 * load value into checkDescDetail textarea using JQuery .val() function
	 */
	function populateDesc(In){
//********Consider implementing a more efficient search algorithm********//
		var description = ""
		for (var i = 0; i<checkNamesArray.length; i++){
			if(checkNamesArray[i].Check_Name == In.value){
				description = checkNamesArray[i].Check_Desc
				$('#checkDescDetail').val(description);
				switch (checkNamesArray[i].Check_Type){
					case "Data Check":
					document.getElementById("data").checked=true;
					break;					
					case "Item Check":
					document.getElementById("item").checked=true;
					break;
					case "":
					document.getElementById("item").checked=false;
					document.getElementById("data").checked=false;
				}
				return;
			}else{
				$('#checkDescDetail').val("No descriptin found for "+In);
			}
		}		
	}
</script>

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
			
		
		$SQL = $db->prepare("Select * from tblChecks");
		$SQL->execute();//execute the SQL query
		$Check = $SQL->fetch();//Gets the first row of the table
		
		//loop through all tuples in relation	
		while($Check != null){
			
			//Gets the current row value from the appropriate column
			//$CheckID = $Check['CheckID'];
			$CheckName = $Check['Check_Name'];
			$CheckDesc = $Check['Check_Desc'];
			$CheckType=$Check['Check_Type'];
			
			$arr[] = array('Check_Name' => $CheckName, 'Check_Desc' => $CheckDesc, 'Check_Type' => $CheckType);
			
			$Check = $SQL->fetch();//fetch the next row*/
		}
		
		//echo json_encode($arr); //Used for troubleshooting of JSON data
		
		$SQL->closeCursor(); //disconnect from the server
		$db = null; // Clear memory
	
	}catch(PDOException $e){
		$error_message = $e->getMessage();		
		echo("<p>Database error: $error_message</p>");
	}
?>


<form name="editItem" action="adminItemEditRESPONSE.php" method="post">
	<div id="editContainer">
		<h2>Edit Item check</h2>
		<p>Edit the items checks by picking items from the dropdown menu and updating it's description.
			If the item check you require is not available it can be made on the
			<a href class="link"onclick='setUpAdmin("Create Item"); return false;'>Create Items</a> page.</p><!--Calls function in adminOptions.php-->

		<h4>Select Check</h4><select class="dropdown" id="available" name="available" onchange="populateDesc(this);">
			<option>Choose check to edit...</option>
			<script>
				//Define options for building list of available checks to edit
				
				var checkNamesArray=<?=json_encode($arr)?>;
				
				/*
				 * Build the list of available items
				 */
				for(var i = 0; i<checkNamesArray.length; i++ ){
					var link = document.createElement('option');
					link.className = "";
					link.textContent = checkNamesArray[i].Check_Name;
					link.href = '#';
					document.getElementById('available').appendChild(link);
				}
			</script>
		</select>
		
	</br>
	
		<!--Area for user to select which item to edit-->
		<label for="txtInput">Check Description: </label>
		<textarea id="checkDescDetail" name="checkDescDetail" rows="5" cols="50" class="txtInput"
			onblur="validate('checkDescDetail','checkDescErr')"
			onfocus="resetError('checkDescErr')"></textarea>	
		<div id="checkDescErr" class="error" ></div></textarea>	
		    
	   </br>
	    <!--Select the type of item-->
	    <fieldset>
	    	<legend>Type of Check</legend>
	    		<input type=radio name="checkType" id="data" value="Data Check" /><label for="data">Data Check</label>
	    		<input type=radio name="checkType" id="item" value="Item Check" /><label for="item">Item Check</label>
	    </fieldset>
	    
	    
	</div><!--End editContainer-->	
	
	<div class="formButton">
		    <input type=submit id="btnSubmit" name="submitItemEdit" action="adminItemEditRESPONSE.php" method="post" value="Submit" />
		    <input type=reset	 id="btnReset" name="cancelItemEdit" value="Cancel"/>
	    </div>
</form>