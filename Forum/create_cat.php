<?php 
define('_ROOT', "../"); 
define('_ACCESS', 0);
?>

<link rel="icon" type="image/png" href="../favicon.png"/>
<link href="../index.css" type="text/css" rel="stylesheet"/>
<link href="./style.css" type="text/css" rel="stylesheet"/>

<?php
//create_cat.php
include_once("../includes/header.php");
include 'connect.php';
include 'header.php';

echo '<h2>Create a category</h2>';
if(!isset($_SESSION['role'])){
	echo 'Sorry, you have to be <a href="login.php">signed in</a> to create a cateory.';
}else{	
	if($_SESSION['role'] != 1 )
	{
		//the user is not an admin
		echo 'Sorry, you do not have sufficient rights to access this page.';
	}
	else
	{
		//the user has admin rights
		if($_SERVER['REQUEST_METHOD'] != 'POST')
		{
			//the form hasn't been posted yet, display it
			echo '<form method="post" action="">
				Category name: <input type="text" name="cat_name" /><br />
				Category description:<br /> <textarea name="cat_description" /></textarea><br /><br />
				<input type="submit" value="Add category" />
			 </form>';
		}
		else
		{
			//the form has been posted, so save it
			$sql = "INSERT INTO categories(cat_name, cat_description)
			   VALUES('" . mysql_real_escape_string($_POST['cat_name']) . "',
					 '" . mysql_real_escape_string($_POST['cat_description']) . "')";
			$result = mysql_query($sql);
			if(!$result)
			{
				//something went wrong, display the error
				echo 'Error' . mysql_error();
			}
			else
			{
				echo 'New category succesfully added.';
			}
		}
	}
}	

include 'footer.php';
?>
