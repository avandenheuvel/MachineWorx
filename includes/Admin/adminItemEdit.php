<h2>Edit Item</h2>

	<form>
		Select Check<select>
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
					document.getElementById('adminSelect').appendChild(link);
				}
			</script>
		</select>
		
	</br>
		<!--Area for user to select which item to edit-->
		<label for="checkDescription" id="checkHeading">Check Description:</label>
		<textarea rows="15" cols="50" id="checkDescription"
		    style="resize: none;"></textarea>	
	    
	    <!--Select the type of item-->
	    <input type="radio" name="checkType" value="binCheck" />Binary Check</br>
	    <input type="radio" name="checkType" value="dataCheck" />Data Check</br>
	    
	    <input type=submit name="submitItemEdit" value="Submit" />
	    <input type=reset	 name="cancelItemEdit" value="Cancel"/>
		
	</form>
</html>