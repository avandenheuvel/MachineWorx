
<form>
	<div id="editContainer">
		<h2>Create Item:</h2>
		<!--Area for user to select which item to edit-->
		
		<label for="txtInput"><h4><strong> Check name: </strong>Short description <40 characters</h4></label>
		<textarea rows="1" cols="50" maxlength="40" class="txtInput"></textarea>
		
		<label for="txtInput"><h4>Check Description: Detailed description that will show up on checklist</h4></label>
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