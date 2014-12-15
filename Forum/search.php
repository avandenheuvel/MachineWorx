<!--Add the search bar to the page-->
	<form id="searchbar" name="search" method="post" action="<?=$_SERVER['PHP_SELF']?>">
        <input type="submit" id="searchBtn" name="search" value="Search">
        <input type="text" name="find" placeholder="Search...">
        <select name="field">
            <option value="topic_subject">Topic</option>
            <option value="topic_cat">Category</option>
            <option value="post_content">Content</option>
        </select>        
        <input type="hidden" name="searching" value="yes">        
    </form>

<div class="searchResults">
	 <?php
	 //This is only displayed if they have submitted the form 
	 
	 $searching=(isset($_POST['searching']) ? $_POST['searching'] : null);
	 $find=(isset($_POST['find']) ? $_POST['find'] : null);
	 $field=(isset($_POST['field']) ? $_POST['field'] : null);
	 
	 if ($searching =="yes") 
	 {
	 	 
	 	echo "<h2>Results:</h2>"; 
	 
		 //If they did not enter a search term we give them an error 
		 if ($find == "") 
		 { 
			 echo "<p>You forgot to enter a search term</p>"; 
			 exit; 
		 } 
		 
		 // Otherwise we connect to our Database 
		 //include 'connect.php'; 
		 
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
			 echo '<a href="topic.php?id=' . $result['topic_id'] . '">' . $result['topic_subject'] . '</a> - Posted on - ' . $result['topic_date'];
			 //Include first 50 characters of the description. 	
			 echo'</br>';
		 } 
		 
		 //This counts the number or results - and if there wasn't any it gives them a little message explaining that 
		 $anymatches=mysql_num_rows($data); 
		 if ($anymatches == 0) 
		 { 
		 	echo "Sorry, but we can not find an entry to match your query<br><br>"; 
		 } 
		 
		 //And we remind them what they searched for 
		 echo "</br><b>Searched For:</b> " .$find," in field ", $field; 
	 } 
	 ?>
	 <br class="clearfloat"/>
 </div><!--End searchResults--> 
 