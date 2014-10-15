<?php
//Create a connection to the database and set the error handling
//to throw messages
$dsn = 'mysql:host=itsql.fvtc.edu;dbname=MachineWorx158';
$username = 'MachineWorx158';
$password = 'MachineWorx158';
$options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

//Give the connection a try
try {
	$queryString = "SELECT U.UserID, U.User_FName, U.User_LName, U.User_Username, U.User_Password, U.User_Role, R.UserRole_Desc " .
				   "FROM tblUsers U " .
				   "JOIN tblUserRoles R " .
				   "WHERE U.User_Role = R.UserRoleID";
	$db = new PDO($dsn, $username, $password, $options);
	$sql = $db->prepare($queryString); 
	$sql->execute();
	$user = $sql->fetch(); //grab the first row of the results
	
	echo "Hello from dboConnect - Your connection to the DB was successful. Below is a list of users!";
	
	?>
	<table width="80%" border="1" style="margin: 0 auto;text-align: center">
	<tr>
    	<th>User ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>UserName</th>
        <th>User Password</th>
        <th>User Role</th>
        <th>Role Description</th>
    </tr>
    <?php
	while ($user != NULL) {
		
		//declare all of our variables for display
		$ID = $user['UserID'];
		$firstName = $user['User_FName'];
		$lastName = $user['User_LName'];
		$username = $user['User_Username'];
		$userPassword = $user['User_Password'];
		$userRole = $user['User_Role'];
		$userRoleDescription = $user['UserRole_Desc'];
		
		//display each row
		echo("<tr>");
		echo("<td>$ID</td>");
		echo("<td>$firstName</td>");
		echo("<td>$lastName</td>");
		echo("<td>$username</td>");
		echo("<td>$userPassword</td>");
		echo("<td>$userRole</td>");
		echo("<td>$userRoleDescription</td>");
		echo("</tr>");

		$user = $sql->fetch(); //grab the next row	
	}
	
	$sql->closeCursor(); //close the connection
	$db = null; //null out the connection information

//If we encounter an error, display it	
} catch(PDOException $e) {
	$error_message = $e->getMessage();
	echo("<p>Database error: $error_message</p>");	
}

//close the table tag 
echo("</table>");
?>