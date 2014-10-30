<?php session_start();?>
<script src="<?php echo _ROOT."includes/md5.js"?>" type="text/javascript"></script>
<script src="<?php echo _ROOT."includes/redirect.js"?>" type="text/javascript"></script>
<div id="wrapper">
<div id="header">
	<img id="headImg" src="<?php echo _ROOT . "images/headImg.png"?>" width="70" height="70"/>
	<a href="<?php echo _ROOT . "./";?>">machineWorx</a>
<?php
		if(isset($_SESSION['username'])){
			$fname=$_SESSION['fname'];
			$lname=$_SESSION['lname'];
			$role="";
			switch($_SESSION['role']){
				case "1":
					$role="Admin";
					break;
				case "2":
					$role="Technician";
					break;
				case "3":
					$role="Customer";
					break;
			}
			echo "<div id=\"headText\">";
			echo "Welcome, $fname $lname!<br/>You're logged in as: $role";
			echo "</div>";
			echo "<a href=\""._ROOT."includes/logout.php\"><div id=\"logOutBtn\">Logout</div></a>";
			if(_ACCESS!=0){
				if($_SESSION['role']!=_ACCESS){
					echo "<script type=\"text/javascript\">redirect(\""._ROOT."\");</script>";
					die();	
				}
			}
		}else{
			echo (
			"<script type=\"text/javascript\">var base=\""._ROOT."\";</script>
			<script type=\"text/javascript\" src=\""._ROOT."includes/login.js\"></script>
			<div id=\"logBtn\" onclick=\"logBtnClick();\">Login<img id=\"logArrow\" src=\""._ROOT."images/arrow_down.png\" width=\"16\" height=\"16\"/></div>
			<div id=\"logBox\">
			<div id=\"logError\">Login Below:</div>
			<form method=\"post\" onSubmit=\"return validateAndSend();\">
			<label id=\"uLabel\" for=\"username\">Username: </label>
			<input id=\"username\" name=\"username\" type=\"text\"/>
			<label id=\"pLabel\" for=\"password\">Password: </label>
			<input id=\"password\" name=\"password\" type=\"password\"/>
			<input type=\"submit\" value=\"Login\" id=\"submit\"/>
			</form>
			</div>"
			);
			if(_ACCESS!=0){
				echo "<script type=\"text/javascript\">redirect(\""._ROOT."\");</script>";
				die();
			}
		}
?>
</div>
<div id="main">