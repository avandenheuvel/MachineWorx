<div id="tableHeader">
	<div class="description">
		Description
		
	</div>
	<div class="condition">
		Condition
	</div>
	<div class="comments">
		Comment
	</div>
	<div class="picture"></div><!--Placeholder for spacing only-->
</div>

<div class="subAssyCont">
	<?php
	
	$componentID=$_POST['compId'];
	$customerID=$_POST['custId'];
	$machineID=$_POST['machId'];
	if($componentID==""){
		die("No component specified");	
	}
	
	$dsn = 'mysql:host=itsql.fvtc.edu;dbname=MachineWorx158';
	$username = 'MachineWorx158';
	$password = 'MachineWorx158';
	$options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

	try {
		
		$queryString = "SELECT c.Check_Name, c.Check_Desc, i.Join_Check_ID FROM tblchecks c, tbljoin_components_checks i WHERE i.Join_Component_ID = :id AND i.Join_Check_ID = c.CheckID";
		$db = new PDO($dsn, $username, $password, $options);
		$query = $db->prepare($queryString); 
		$query -> bindParam(':id', $componentID);
		$query->execute();

		while($row = $query->fetch(PDO::FETCH_ASSOC)){
			echo("<div class=\"itemCheckCont\">
				<div class=\"description\"><b>".$row['Check_Name']."</b><br/>".$row['Check_Desc']."</div>
		
				<div class=\"condition\">
					<select>
						<option value=\"\">Condition</option>
						<option value=\"Good\">Good</option>
						<option value=\"Ok\">Ok</option>
						<option value=\"Poor\">Poor</option>
						<option value=\"Repaired\">Repaired</option>	
					</select>
				</div>
		
				<div class=\"comments\">
					<textarea class=\"txtInput\"></textarea>
				</div>
		
				<div class=\"picture\">	
					<input id=\"btn".$row['Join_Check_ID']."\" type=\"button\" value=\"Check\" onclick=\"updateCheck(".$customerID.",".$machineID.",".$componentID.",".$row['Join_Check_ID'].", this.id);\"/>
				</div>
			</div>");
		}
		
		$query->closeCursor();
		$db = null;
	
	} catch(PDOException $e) {
		$error_message = $e->getMessage();
		echo("Database error: $error_message");	
	}

	?>
</div>