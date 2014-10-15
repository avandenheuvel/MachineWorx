

<?php
mysql_connect('itsql.fvtc.edu', 'MachineWorx158', 'MachineWorx158');
mysql_select_db('machineworx158');

$qry="SELECT * FROM treeview_items";
$result=mysql_query($qry);

$arrayCategories = array();

while($row = mysql_fetch_assoc($result)){
	$arrayCategories[$row['id']] = array("parent_id" => $row['parent_id'], "name" => $row['name']);   
}

function createTree($array, $currentParent, $currLevel = 0, $prevLevel = -1) {
	
	foreach ($array as $categoryId => $category) {
	//Used to help understand recursive function
	//echo '<p>'.'array row-'.$categoryId.', currParent-'.$currentParent.', currLevel-'.$currLevel.', prevLevel-'.$prevLevel.'<p>';
	 
		if ($currentParent == $category['parent_id']) {

	   		if ($currLevel > $prevLevel) echo " <ol class='tree'> "; 
	
	   		if ($currLevel == $prevLevel) echo " </li> ";
	
	    	echo '<li> <label for="subfolder2">'.$category['name'].'</label> 
	    	<input type="checkbox" id="subfolder2"/>';
			
			if($category['name']=='SubAssy1'){
				//Installed for testing of 'file' class	
				echo"<ol>
							<li class='file'><a href='' onclick='setUpTech()'>Subfile 1</a></li>
							<li class='file'><a href=''>Subfile 2</a></li>
							<li class='file'><a href=''>Subfile 3</a></li>
							<li class='file'><a href=''>Subfile 4</a></li>
							<li class='file'><a href=''>Subfile 5</a></li>
							<li class='file'><a href=''>Subfile 6</a></li>
						</ol>
						";
			}
	
		    if ($currLevel > $prevLevel) {
		    	 $prevLevel = $currLevel; 
			}
		
		    $currLevel++; 
	
	    	createTree ($array, $categoryId, $currLevel, $prevLevel);
	
	    	$currLevel--;               
	    }   
	
	}
	
	if ($currLevel == $prevLevel) echo " </li>  </ol> ";

}   
?><!--End Create Tree-->

<div id="content" class="general-style1">

<script>
//Had to create this via JavaScript. For some reason it wasnt working with simple HTML
	var link = document.createElement('a');
	link.className = "button tiny";
	link.textContent = "testing123";
	link.href = '#';
	link.style.width="100%";
	link.style.margin="1px";
	link.onclick = function(){setUpAdmin(this)};
	document.getElementById('adminOptCont').appendChild(link);
	
	
	/**
	 * Function used to set up Administrative area:
	 * Create/Edit: Customers, Machines, Sub assy's, Components
	 * 
	 * Uses ajax via jQuery
	 */
	function setUpAdmin(In){
		// Used to display test parameter in //alert(In.textContent);
		$(function(){
		    $("#include").load("techInput.php");
		});
	}
</script>

<?php
if(mysql_num_rows($result)!=0){
	createTree($arrayCategories, 0); 
}
?>

</div>