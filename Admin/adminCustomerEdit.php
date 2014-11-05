<script>
	//Simple array for now. Will require a PHP db query
	var Options = ["Check 1", "Check 2", "Check 3",
	"Check 4", "Check 5", "Check 6", "Check 7","Check 8","Check 9",
	"Check 10","Check 11", "Check 12","Check13", "Check...."];
</script>

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
	    //.append('<option value="whatever">text</option>')
	    //.val('whatever');
	}
	
</script>

	<form name="adminSubAssyEdit" Method="post" action="">
		<div id="editContainer">
		<h2>Edit Customer</h2>
		<p>Edit the equpment available at the facility by picking items from the available machines section on the left and moving them
			to the selected machines area. If the machine you require is not available it can be made on the
			<a href class="link"onclick='setUpAdmin("Create Machine"); return false;'>Create Machines</a> page.</p><!--Calls function in adminOptions.php-->
		
		<h4>Select Customer</h4><select class="dropdown" id="available">
			<script>//Define options for building list of available checks to edit
				
				//Simple array for now. Will require a PHP db query
				var Options = ["Customer 1", "Customer 2", "Customer 3",
				"Customer 4", "Customer 5", "Customer 6", "Customer...."];
				
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
			<div id="column1">
			<h3>Available Machines</h3>	
				<select multiple size=12 id="select1" class="selectLarge">
					<script>//Define options for building list of available checks to edit
					
					for(var i = 0; i<Options.length; i++ ){
						var link = document.createElement('option');
						link.className = "";
						link.textContent = Options[i];
						link.href = '#';
						//link.style.width="100%";
						//link.style.margin="1px";
						//link.onclick = function(){setUpAdmin(this)};
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
				<h3>Selected Machines:</h3>
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
		
		
	
	