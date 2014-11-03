

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
		
		//echo json_encode($arr); Used for troubleshooting of JSON data
		
		$SQL->closeCursor(); //disconnect from the server
		$db = null; // Clear memory
	
	}catch(PDOException $e){
		$error_message = $e->getMessage();		
		echo("<p>Database error: $error_message</p>");
	}
?>

<script>
	//move selected date from the left select box to the right
	function copyData(){
	$().ready(function() {  
		$('#add').click(function() {  
			return !$('#select1 option:selected').remove().appendTo('#select2');  
		});  
		$('#remove').click(function() {  
			return !$('#select2 option:selected').remove().appendTo('#select1');  
		});  
		});
	}
	
	//JQuery function to change order of items in select box.
	$(document).ready(function(){
	    $('input[type="button"]').click(function(){
	        var $op = $('#select2 option:selected'),
	            $this = $(this);
	        if($op.length){
	            ($this.val() == 'Move Up') ? 
	                $op.first().prev().before($op) : 
	                $op.last().next().after($op);
	        }
	    });
	});
	
	function clearSelected(){
		$('#select2')
	    .find('option')
	    .remove()
	    .end()
	}
	
</script>

	<form name="adminSubAssyCreate" Method="post" action="">
		<div id="editContainer">
		<h2>Create Sub-Assembly</h2>
		<p>Set up sub assembly by picking items from the available items section and moving them
			to the selected items area. If the check you require is not available it can be made on the
			<a href class="link"onclick='setUpAdmin("Create Item"); return false;'>Create Items</a> page.</p><!--Calls function in adminOptions.php-->
			
			<label for="txtInput"><h4><strong> Sub Assembly name: </strong>Short description <40 characters</h4></label>
			<textarea id="subAssyName" name="subAssyName" rows="1" cols="50" maxlength="40" class="txtInput"
				onblur="validate('subAssyName','subAssyNameErr')"
				onfocus="resetError('subAssyNameErr')"></textarea>	
			<div id="subAssyNameErr" name="subAssyNameErr" class="error" ></div>
			
			<div id="column1">
			<h3>Available items</h3>	
				<select multiple size=12 id="select1" name="select1" class="selectLarge">
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
							document.getElementById('select1').appendChild(link);
						}
					</script>
				</select>
			</div>
				
			<div id="column2mid">	
				<input type=button class="button" id="add"onclick="copyData()" name="Add" value="Add -->" />
				<input type=button class="button" id="remove" onclick="copyData()" name="Remove" value="<--Remove" />
			</div>
			
			<div id="column2right">
				<h3>Selected Items:</h3>
				<select size=12 id="select2" class="selectLarge"></select>
				<input type=button class="button" id="move up" name="moveUp" value="Move Up" />
				<input type=button class="button" id="move down"  name="moveDown" value="Move Down" />
			</div>
		</div><!--End Edit Container-->
			
		<div class="formButton">
			<input type="submit"  id="btnSubmit" name="Submit" value="Submit" />
			<input type="reset"  id="btnReset"  onclick="setUpAdmin('Create SubAssembly')" name="Cancel" value="Cancel" />
		</div>
		
	</form>
		
		
	
	