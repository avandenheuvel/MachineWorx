<h2>Create Item</h2>

	<form>

		<!--Area for user to select which item to edit-->
		<label for="checkDescription" id="checkHeading">Check Description:</label></br>
		<textarea rows="5" cols="50" id="checkDescription" style="overflow:scroll"
		    style="resize: none;"></textarea>	
		    
	   </br>
	    <!--Select the type of item-->
	    <input type="radio" name="checkType" value="binCheck" />Binary Check</br>
	    <input type="radio" name="checkType" value="dataCheck" />Data Check</br>
	    
	    <input type=submit name="submitItemEdit" value="Submit" />
	    <input type=reset	 name="cancelItemEdit" value="Cancel"/>
		
	</form>
</html>