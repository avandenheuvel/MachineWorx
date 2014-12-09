

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
			
		
		$SQL = $db->prepare("Select * from tblcomponents");
		$SQL->execute();//execute the SQL query
		$Component = $SQL->fetch();//Gets the first row of the table
		
		//loop through all tuples in relation	
		while($Component != null){
			
			//Gets the current row value from the appropriate column
			$ComponentID = $Component['ComponentID'];
			$CompName = $Component['Component_Name'];
			$CompDesc = $Component['Component_Desc'];
			
			$arr[] = array('ComponentID' =>$ComponentID, 'Component_Name' => $CompName, 'Component_Desc' => $CompDesc);
			
			$Component = $SQL->fetch();//fetch the next row*/
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
	
	function selectAll(){
		for (var i = 0; i < document.getElementById("select2").options.length; i++){
			document.getElementById("select2").options[i].selected = true;
		}
	return true;
	}
</script>



	<form name="adminModelCreate" onsubmit="return selectAll()" Method="post" action="adminModelCreateRESPONSE.php">
		<div id="editContainer">
		<h2>Create Model</h2>
		<p>A model is made up of one or more sub Assemblies. Select the appropriate assemblies from the box on the 
			left and add them to the box on the right. If the Sub Assembly you need is not availalbe create one on the
			<a href class="link"onclick='setUpAdmin("Create Model"); return false;'>Create Sub Assembly</a> page.</p><!--Calls function in adminOptions.php-->
			
			<label for="txtInput"><h4><strong> Model name: </strong>Short description <40 characters</h4></label>
			<textarea id="ModelName" name="ModelName" rows="1" cols="50" maxlength="40" class="txtInput"
				onblur="validate('ModelName','ModelNameErr')"
				onfocus="resetError('ModelNameErr')"></textarea>	
			<div id="ModelNameErr" name="ModelNameErr" class="error" ></div>
			
			<label for="txtInput"><h4>Model Description: Detailed description that will show up on checklist</h4></label>
			<textarea id="modelDescDetail" name="modelDescDetail" rows="5" cols="50" class="txtInput" 
				onblur="validate('checkDescDetail','checkDescDetailErr')"
				onfocus="resetError('checkDescDetailErr')"></textarea>	
			<div id="checkDescDetailErr" class="error" ></div>
			
			<div id="column1">
			<h3>Available SubAssemblies</h3>	
				<select multiple size=12 id="select1" name="select1" class="selectLarge">
					<script>
						//Define options for building list of available checks to edit
						
						var compNamesArray=<?=json_encode($arr)?>;
						/*
						 * Build the list of available items
						 */
						for(var i = 0; i<compNamesArray.length; i++ ){
							var link = document.createElement('option');
							link.className = "";
							link.textContent = compNamesArray[i].Component_Name;
							link.href = '#';
							link.value = compNamesArray[i].ComponentID;
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
				<h3>Selected SubAssemblies:</h3>
				<select multiple size=12 id="select2" name="ComponentID[]" class="selectLarge"></select>
				<input type=button class="button" id="move up" name="moveUp" value="Move Up" />
				<input type=button class="button" id="move down"  name="moveDown" value="Move Down" />
			</div>
		</div><!--End Edit Container-->
			
		<div class="formButton">
			<input type="submit"  id="btnSubmit" name="Submit" value="Submit" method="post" action="adminModelCreateRESPONSE.php" />
			<input type="reset"  id="btnReset"  onclick="setUpAdmin('Create SubAssembly')" name="Cancel" value="Cancel" />
		</div>
		
	</form>
		
		
	

	
	