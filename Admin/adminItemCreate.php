
<form name="createItem" action="adminItemCreateRESPONSE.php" method="post" >
	<div id="editContainer">
		<?php include("helpFiles/helpPopUp.php")?><!--Triggers pop up window with instruction-->
		
		<!--Area for user to select which item to edit-->
		
		<label for="txtInput"><h4><strong> Check name: </strong>Short description <40 characters</h4></label>
		<textarea id="checkDescSimple" name="checkDescSimple" rows="1" cols="50" maxlength="40" class="txtInput"
			onblur="validate('checkDescSimple','checkDescSimpleErr')"
			onfocus="resetError('checkDescSimpleErr')"></textarea>	
		<div id="checkDescSimpleErr" class="error" ></div>
		
		<label for="txtInput"><h4>Check Description: Detailed description that will show up on checklist</h4></label>

		<textarea id="checkDescDetail" name="checkDescDetail" rows="5" cols="50" class="txtInput" 
			onblur="validate('checkDescDetail','checkDescDetailErr')"
			onfocus="resetError('checkDescDetailErr')"></textarea>	
		<div id="checkDescDetailErr" class="error" ></div>
		    
	   </br>
	    <!--Select the type of item-->
	    <fieldset>
	    	<legend>Type of Check</legend>
	    		<input type=radio name="checkType" id="checkType" value="Data Check" /><label for="data">Data Check</label>
	    		<input type=radio name="checkType" id="checkType" value="Item Check" checked="checked"/><label for="item">Item Check</label>
	    </fieldset>
	    
	    
	</div><!--End editContainer-->	
	
	<div class="formButton">
	    <!--input type=submit id="btnSubmit" name="submitItemEdit" action="adminItemCreateRESPONSE.php" method="get" value="Submit" /-->
	    <input type=submit id="btnSubmit" name="submitItemEdit" action="adminItemCreateRESPONSE.php" method="post" value="Submit" />
	    <input type=reset	 id="btnReset" name="cancelItemEdit" value="Cancel"/>
    </div>
</form>