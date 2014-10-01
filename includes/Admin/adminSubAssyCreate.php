<h2>Create Sub-Assembly</h2>

<div id="editContainer">
	<p>Set up sub assembly by picking items from the available items section and moving them
		to the selected items area. If the check you require is not available it can be made on the
		<a href id="link"onclick='setUpAdmin("Create Item"); return false;'>Create Items</a> page.</p><!--Calls function in adminOptions.php-->
	<div id="column1">
	<h3>Available items</h3>	
	<select multiple size=12 id="select1">
		<script>//Define options for building list of available checks to edit
		
		//Simple array for now. Will require a PHP db query
		var Options = ["Check 1", "Check 2", "Check 3",
		"Check 4", "Check 5", "Check 6", "Check 7","Check 8","Check 9",
		"Check 10","Check 11", "Check 12","Check13", "Check...."];
		
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
		</script>
	</select>
</div>
		
	<div id="column2outer">
		<div id="column2mid">	
			<input type=button class="button" id="add"onclick="copyData()" name="Add" value="Add -->" />
			<input type=button class="button" id="remove" onclick="copyData()" name="Remove" value="<--Remove" />
		</div>
		
		<div id="column2right">
			<h3>Selected Items:</h3>
			<select size=12 id="select2"></select>
			<input type=button class="button" id="move up" onclick="changeOrder()" name="moveUp" value="Move Up" />
			<input type=button class="button" id="move down" onclick="changeOrder()" name="moveDown" value="Move Down" />
		</div>
	</div>
</div><!--End Edit Container-->