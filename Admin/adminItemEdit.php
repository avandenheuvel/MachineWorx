
<form>
	<div id="editContainer">
		<h2>Edit Item check</h2>
		<p>Edit the items checks by picking items from the dropdown menu and updating it's description.
			If the item check you require is not available it can be made on the
			<a href class="link"onclick='setUpAdmin("Create Item"); return false;'>Create Items</a> page.</p><!--Calls function in adminOptions.php-->

		<h4>Select Check</h4><select class="dropdown" id="available">
			<script>//Define options for building list of available checks to edit
				
				//Simple array for now. Will require a PHP db query
				var Options = ["Check 1", "Check 2", "Check 3",
				"Check 4", "Check 5", "Check 6", "Check...."];
				
				for(var i = 0; i<Options.length; i++ ){
					var link = document.createElement('option');
					link.className = "";
					link.textContent = Options[i];
					link.href = '#';
					//link.style.width="100%";
					//link.style.margin="1px";
					//link.onclick = function(){setUpAdmin(this)};
					document.getElementById('available').appendChild(link);
				}
			</script>
		</select>
		
	</br>
	
		<!--Area for user to select which item to edit-->
		<label for="txtInput"><h4>Check Description: </h4></label>
		<textarea rows="5" cols="50" class="txtInput"></textarea>	
		    
	   </br>
	    <!--Select the type of item-->
	    <fieldset class="radGrpChkType">
	    	<legend>Type of Check</legend>
	    		<input type=radio name="checkType" id="data" value="Data Check" /><label for="data">Data Check</label></li>
	    		<input type=radio name="checkType" id="item" value="Item Check" /><label for="item">Item Check</label></li>
	    </fieldset>
	    
	    
	</div><!--End editContainer-->	
	
	<div class="formButton">
		    <input type=submit id="btnSubmit" name="submitItemEdit" value="Submit" />
		    <input type=reset	 id="btnReset" name="cancelItemEdit" value="Cancel"/>
	    </div>
</form>