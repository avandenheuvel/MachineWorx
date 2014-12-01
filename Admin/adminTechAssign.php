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
		<h2>Assign Technician Work</h2>
		<p>Decide which customers/machines will be available for the technicians to enter/update data on.
			The users logged in as technician will only be able to view machines which are assigned to them on this page.
			
		<h4>Select Technician</h4><select class="dropdown" id="available">
			<script>//Define options for building list of available checks to edit
				
				//Simple array for now. Will require a PHP db query
				var Options = ["Tech 1", "Tech 2", "Tech 3",
				"Tech 4", "Tech 5", "Tech 6", "Tech...."];
				
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
			<h3>Available Customers</h3>	
				<select multiple size=12 id="select1" class="selectLarge">
					<script>
						//Define options for building list of available checks to edit
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
				<h3>Selected Customers:</h3>
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
		
		
	
	