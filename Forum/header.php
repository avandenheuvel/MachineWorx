<head>
	<meta charset="UTF-8">
</head>

<div id="forumWrapper">
		<h1>Technical forum</h1>
		
		<div id="menu">
			<a class="item" id="homeBtn"  href="index.php">Home</a> -
			<a class="item" id="topicBtn" onclick="hideSearch();" href="create_topic.php">Create a topic</a> -
			<a class="item" id="catBtn" onclick="hideSearch();" href="create_cat.php">Create a category</a>
				
				<?php
					include 'search.php';
				?>
				<br class="clearfloat" />
		
		<div id="content">