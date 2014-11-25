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
<script src="./custEdit.js" type="text/javascript"></script>
<div id="searchPage">
<label for="unSearch">Search Customers: </label>
<input type="text" id="unSearch" name="unSearch" onkeyup="getCustomers();"/>
<table id="userTable">
	<tr>
    	<th>ID</th>
        <th>Username</th>
        <th>First Name</th>
        <th>Last Name</th>
    </tr>
</table>
<div id="sResults"></div>
</div>
<div id="ePage">
	<form name="adminSubAssyEdit" Method="post" action="">
	<div id="editContainer">
		<h2>Edit Customer</h2>
		<p>Edit the equpment available at the facility by picking items from the available machines section on the left and moving them to the selected machines area. If the machine you require is not available it can be made on the <a href class="link"onclick='setUpAdmin("Create Machine"); return false;'>Create Machines</a> page.</p><!--Calls function in adminOptions.php-->
		<h4 id="uName">Select Customer</h4>
		<div id="column1">
			<h3>Available Machines</h3>	
			<select multiple size=12 id="select1" class="selectLarge"></select>
		</div>
		<div id="column2mid">	
			<input type=button class="button" id="add" onclick="copyData()" name="Add" value="Add -->" />
			<input type=button class="button" id="remove" onclick="copyData()" name="Remove" value="<--Remove" />
		</div>
		<div id="column2right">
			<h3>Customer Machines:</h3>
			<select size=12 id="select2" class="selectLarge"></select>
			<input type=button class="button" id="move up" name="moveUp" value="Move Up" />
			<input type=button class="button" id="move down"  name="moveDown" value="Move Down" />
		</div>
	</div><!--End Edit Container-->
	<div class="formButton">
		<input type="submit"  id="btnSubmit" name="Submit" value="Submit" />
		<input type="reset"  id="btnReset"  onclick="searchCust();" name="Cancel" value="Cancel" />
	</div>
	</form>
</div>
<script type="text/javascript">
	getCustomers();
</script>