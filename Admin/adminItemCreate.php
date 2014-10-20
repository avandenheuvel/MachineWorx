
<form>
	<div id="editContainer">
		<?php include("helpFiles/helpPopUp.php")?><!--Triggers pop up window with instruction-->
		
		<!--Area for user to select which item to edit-->
		
		<label for="txtInput"><h4><strong> Check name: </strong>Short description <40 characters</h4></label>
		<textarea rows="1" cols="50" maxlength="40" class="txtInput"></textarea>
		
		<label for="txtInput"><h4>Check Description: Detailed description that will show up on checklist</h4></label>

		<label for="txtInput">Check Description: </label>

		<textarea rows="5" cols="50" class="txtInput"></textarea>	
		    
	   </br>
	    <!--Select the type of item-->
	    <fieldset>
	    	<legend>Type of Check</legend>
	    		<input type=radio name="checkType" id="data" value="Data Check" /><label for="data">Data Check</label>
	    		<input type=radio name="checkType" id="item" value="Item Check" /><label for="item">Item Check</label>
	    </fieldset>
	    
	    
	</div><!--End editContainer-->	
	
	<div class="formButton">
		    <input type=submit id="btnSubmit" name="submitItemEdit" value="Submit" />
		    <input type=reset	 id="btnReset" name="cancelItemEdit" value="Cancel"/>
	    </div>
</form>