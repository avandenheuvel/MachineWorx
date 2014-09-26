
<h3>Create Machine Item</h3>
</br>
<form>	
    
  <div class="row">
    <div class="large-8 columns">
      <label>Enter the description of item check to add
        <textarea placeholder="small-12.columns"></textarea>
      </label>
     </div>
      <div class="large-3 columns">
	      <label>Type of check</label>
	      <input type="radio" name="checkType" value="DataCheck" id="dataCheck"><label for="DataCheck">Data Check</label></br>
	      <input type="radio" name="checkType" value="ItemCheck" id="itemCheck"><label for="ItemCheck">Item Check</label>
	    </div>
    </div>
   </br>
    <div class="row">
    	<div class="large-4 large-offset-8">
			<input type="submit" class="success button" value="Create" />
			<input type="reset" class="alert button" value="Clear" />
		</div>
	</div>
</form>