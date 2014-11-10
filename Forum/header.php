<?php
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="nl" lang="nl">
<head>
 	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
 	<meta name="description" content="A short description." />
 	<meta name="keywords" content="put, keywords, here" />
 	<title>PHP-MySQL forum</title>
	<link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
<h1>B&W megtec - technician forum</h1>
<h3>Items that I will still like to integrate</h3>
	<ul>
		<li>E-mail notification</li>
		<li>Search feature - Link to topic</li>
		<li>Allow pictures or documents</li>
		<li>Allow users to thumbs up or down a topic/reply (Weight search)</li>
	</ul>
	<div id="wrapper">
	<div id="menu">
		<a class="item" href="index.php">Home</a> -
		<a class="item" href="create_topic.php">Create a topic</a> -
		<a class="item" href="create_cat.php">Create a category</a>
		
		<div id="userbar">
		<?php
		if(isset($_SESSION['signed_in']))
		{
			echo 'Hello <b>' . htmlentities($_SESSION['user_name']) . '</b>. Not you? <a class="item" href="signout.php">Sign out</a>';
		}
		else
		{
			echo '<a class="item" href="signin.php">Sign in</a> or <a class="item" href="signup.php">create an account</a>';
		}
		?>
		</div>
	</div>
	
	<?php
		include 'search.php';
	?>
	<div id="content">