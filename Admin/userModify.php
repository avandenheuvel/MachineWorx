<script src="../includes/createUser.js" type="text/javascript"></script>
<div id="createTab" onclick="createPageSelect();">Create</div>
<div id="createUser">
<form id="createForm" method="post" onsubmit="return validateCreation();">
	<div id="statusDiv">Create New User:</div>
	<!--<img src="../images/default.png" id="profPic" width="200" height="200"/>
    <input type="file" id="profImg" name="profImg" accept="image/jpeg, image/gif, image/png" onchange="changePhoto();"/>-->
    <div style="position: relative; height: 210px;">
    <fieldset style="left: 2%;">
	<label for="fname" class="txtLabel">First Name: </label>
	<input type="text"  id="fname" name="fname"/>
    <label for="lname" class="txtLabel">Last Name: </label>
    <input id="lname" name="lname" type="text"/>
    <label for="user" class="txtLabel">Username: </label>
    <input id="user" name="user" type="text"/>
    </fieldset>
    <div id="section">
    <fieldset>
    <label for="pass" class="txtLabel">Password: </label>
    <input id="pass" name="pass" type="password"/>
    <label for="passV" class="txtLabel">Re-Enter Password: </label>
    <input id="passV" name="passV" type="password"/>
    </fieldset>
    <fieldset>
    <input id="role1" name="role" type="radio" value="1"/>
    <label for="role1">Administrator</label><br/>
    <input id="role2" name="role" type="radio" value="2"/>
    <label for="role2">Technician</label><br/>
    <input id="role3" name="role" type="radio" value="3" checked/>
    <label for="role3">Customer</label>
    </fieldset>
    </div>
    </div>
    <div style="height: 40px; position: relative;">
    <input id="submit" type="submit" value="Create"/>
    <input id="reset" type="reset" value="Reset"/>
    </div>
</form>
</div>
<div id="editTab" onclick="editPageSelect();">Edit</div>
<div id="editUser">
<div id="searchPage">
<label for="unSearch">Search Users: </label>
<input type="text" id="unSearch" name="unSearch" onkeyup="getUsers();"/>
<table id="userTable">
	<tr>
    	<th>ID</th>
        <th>Username</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Role</th>
    </tr>
</table>
<div id="sResults"></div>
</div>
<div id="editPage">
    <form id="editForm">
        <div id="editStatus">Edit User: </div>
        <input type="hidden" id="uId" name="uId"/>
        <input type="hidden" id="origFName" name="origFName"/>
        <input type="hidden" id="origLName" name="origLName"/>
        <input type="hidden" id="origRole" name="origRole"/>
        <div id="fieldCont" style="position: relative; width: 100%; height: 250px;">
        <div id="leftFields">
        <fieldset>
            <label for="editFName" class="txtLabel">First Name: </label>
            <input type="text"  id="editFName" name="editFName"/>
            <label for="editLName" class="txtLabel">Last Name: </label>
            <input id="editLName" name="editLName" type="text"/>
        </fieldset>
        <fieldset>
            <label for="editPass" class="txtLabel">Change Password: </label>
            <input id="editPass" name="editPass" type="password"/>
            <label for="editPassV" class="txtLabel">Re-Enter New Password: </label>
            <input id="editPassV" name="editPassV" type="password"/>
        </fieldset>
        </div>
        <div style="position: absolute; right: 2%; width: 47%; height: 250px">
        <fieldset style="width: 100%;">
            <input id="editRole1" name="editRole" type="radio" value="1"/>
            <label for="editRole1">Administrator</label><br/>
            <input id="editRole2" name="editRole" type="radio" value="2"/>
            <label for="editRole2">Technician</label><br/>
            <input id="editRole3" name="editRole" type="radio" value="3" checked/>
            <label for="editRole3">Customer</label>
        </fieldset>
        <div id="info"></div>
        <div style="position: absolute; height: 40px; width: 100%; bottom: 0px;">
        <input type="button" id="backBtn" value="Back" onclick="backToSearch();"/>
        <input type="button" id="editBtn" value="Edit" onclick="editUser();"/>
        <input type="button" id="deleteBtn" value="Delete" onclick="deleteUser();"/>
        </div>
         </div>
        </div>
    </form>
</div>
</div>