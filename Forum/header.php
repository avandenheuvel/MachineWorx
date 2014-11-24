
<body>


	<div id="forumWrapper">
		<h1>Technical forum</h1>
	<div id="menu">
		<a class="item" href="index.php">Home</a> -
		<a class="item" href="create_topic.php">Create a topic</a> -
		<a class="item" href="create_cat.php">Create a category</a>
			<?php
				include 'search.php';
			?>
		<div id="userbar">
		<?php
		/*
		if(isset($_SESSION['signed_in']))
		{
			echo 'Hello <b>' . htmlentities($_SESSION['user_name']) . '</b>. Not you? <a class="item" href="signout.php">Sign out</a>';
		}
		else
		{
			echo '<a class="item" href="signin.php">Sign in</a> or <a class="item" href="signup.php">create an account</a>';
		}*/
		?>
	</div>
	</div>
	
	<div id="content">