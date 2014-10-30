<script src="../includes/createUser.js" type="text/javascript"></script>
<div id="createTab" onclick="createPageSelect();">Create</div>
<div id="createUser">
<form id="createForm" method="post" onsubmit="return validateCreation();">
	<div id="statusDiv">Create New User:</div>
	<!--<img src="../images/default.png" id="profPic" width="200" height="200"/>
    <input type="file" id="profImg" name="profImg" accept="image/jpeg, image/gif, image/png" onchange="changePhoto();"/>-->
    <fieldset>
	<label for="fname" class="txtLabel">First Name: </label>
	<input type="text"  id="fname" name="fname"/>
    <label for="lname" class="txtLabel">Last Name: </label>
    <input id="lname" name="lname" type="text"/>
    <label for="user" class="txtLabel">Username: </label>
    <input id="user" name="user" type="text"/>
    </fieldset>
    <fieldset>
    <label for="pass" class="txtLabel">Password: </label>
    <input id="pass" name="pass" type="password"/>
    <label for="passV" class="txtLabel">Re-Enter Password: </label>
    <input id="passV" name="passV" type="password"/>
    </fieldset>
    <fieldset>
    <input id="role1" name="role" type="radio" value="1"/>
    <label for="role1">Administrator</label>
    <input id="role2" name="role" type="radio" value="2"/>
    <label for="role2">Technician</label>
    <input id="role3" name="role" type="radio" value="3" checked/>
    <label for="role3">Customer</label>
    </fieldset>
    <input id="submit" type="submit" value="Create"/>
    <input id="reset" type="reset" value="Reset"/>
</form>
</div>
<div id="editTab" onclick="editPageSelect();">Edit</div>
<div id="editUser">
&nbsp;
</div>