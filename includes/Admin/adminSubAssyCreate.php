<h2>Create Sub-Assembly</h2>

<select size=15 id="listBoxAvailable">
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
					document.getElementById('listBoxAvailable').appendChild(link);
				}
			</script>
			
		<input type=button name="Add" value="Add -->" />
		<input type=button name="Remove" value="<--Remove" />
		
		<select size=15 id="machine">
			
		</select>
		
		<input type=submit name="submitItemEdit" value="Submit" />
	    <input type=reset	 name="cancelItemEdit" value="Cancel"/>
</select>