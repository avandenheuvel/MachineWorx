<!--Add the search bar to the page-->
<div id="searchbar"> 
	<form name="search" method="post" action="<?=$_SERVER['PHP_SELF']?>">
		Seach for: <input type="text" name="find" /> in 
		<Select NAME="field">
			<Option VALUE="topic_cat">Category</option>
			<Option VALUE="topic_subject">Topic</option>
			<Option VALUE="post_content">Content</Option>
		</Select>
		<input type="hidden" name="searching" value="yes" />
		<input type="submit" name="search" value="Search" />
	</form>
</div>

 <?php
 //This is only displayed if they have submitted the form 
 
 $searching=(isset($_POST['searching']) ? $_POST['searching'] : null);
 $find=(isset($_POST['find']) ? $_POST['find'] : null);
 $field=(isset($_POST['field']) ? $_POST['field'] : null);
 
 if ($searching =="yes") 
 { 
 	echo "<h2>Results</h2><p>"; 
 
	 //If they did not enter a search term we give them an error 
	 if ($find == "") 
	 { 
		 echo "<p>You forgot to enter a search term</p>"; 
		 exit; 
	 } 
	 
	 // Otherwise we connect to our Database 
	 include 'connect.php'; 
	 
	 // We preform a bit of filtering 
	 $find = strtoupper($find); 
	 $find = strip_tags($find); 
	 $find = trim ($find); 
	 
	 //Structure the SQL query
	 $sql="
	 SELECT * 
	 FROM topics 
	 WHERE upper($field) LIKE'%$find%'
	 ";
	 
	 //Now we search for our search term, in the field the user specified 
	 $data = mysql_query($sql); 
	 
	 //And we display the results 
	 while($result = mysql_fetch_array($data)) 
	 {
		 echo '<a href="topic.php?id=' . $result['topic_id'] . '">' . $result['topic_subject'] . '</a> ' ;
		 //Include first 50 characters of the description. 	 
		 echo "<br>"; 
		 
	 } 
	 
	 //This counts the number or results - and if there wasn't any it gives them a little message explaining that 
	 $anymatches=mysql_num_rows($data); 
	 if ($anymatches == 0) 
	 { 
	 	echo "Sorry, but we can not find an entry to match your query<br><br>"; 
	 } 
	 
	 //And we remind them what they searched for 
	 echo "<b>Searched For:</b> " .$find," in field ", $field; 
 } 
 ?> 