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
	<div id="editContainer">
		<h2>Edit Customer</h2>
		<p>Edit the equpment available at the facility by picking items from the available machines section on the left and moving them to the selected machines area. If the machine you require is not available it can be made on the <a href class="link"onclick='setUpAdmin("Create Machine"); return false;'>Create Machines</a> page.</p><!--Calls function in adminOptions.php-->
		<h4 id="uName">Select Customer</h4>
		<div id="column1">
			<h3>Available Machines</h3>	
			<select multiple size="12" id="availMachines" class="selectLarge" onclick="clearOpts('custMachines');" ondblclick="moveMachines('availMachines','custMachines');"></select>
		</div>
		<div id="column2mid">	
			<input type="button" class="button" id="add" onclick="moveMachines('availMachines','custMachines');" name="Add" value="Add -->" />
			<input type="button" class="button" id="remove" onclick="moveMachines('custMachines','availMachines');" 
            name="Remove" value="<--Remove" />
		</div>
		<div id="column2right">
			<h3>Customer Machines:</h3>
			<select multiple size="12" id="custMachines" class="selectLarge" onclick="clearOpts('availMachines');" ondblclick="moveMachines('custMachines','availMachines');"></select>
		</div>
	</div><!--End Edit Container-->
	<div class="formButton">
		<input type="submit"  id="btnSubmit" name="Submit" value="Submit" onclick="updateCustomer();"/>
		<input type="reset"  id="btnReset"  onclick="searchCust();" name="Cancel" value="Cancel" />
	</div>
</div>
<script type="text/javascript">
	getCustomers();
</script>