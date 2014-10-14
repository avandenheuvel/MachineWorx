<?php session_start();?>
<div id="header">
	<img id="headImg" src="<?php echo _ROOT . "images/gear.png"?>" width="70" height="70"/>
	<a href="<?php echo _ROOT . "./";?>">machineWorx</a>
<?php
		if(isset($_SESSION['user'])){
			#display information
		}else{
			echo (
			"<script type=\"text/javascript\" src=\""._ROOT."includes/login.js\"></script>
			<div id=\"logBtn\" onclick=\"logBtnClick();\">Login</div>
			<div id=\"logBox\">
			<div id=\"logError\">Login Below:</div>
			<form method=\"post\" onSubmit=\"return validateAndSend('"._ROOT."includes/login.php');\">
			<label id=\"uLabel\" for=\"username\">Username: </label>
			<input id=\"username\" name=\"username\" type=\"text\"/>
			<label id=\"pLabel\" for=\"password\">Password: </label>
			<input id=\"password\" name=\"password\" type=\"password\"/>
			<input type=\"submit\" value=\"Login\" id=\"submit\"/>
			</form>
			</div>"
			);
		}
?>
</div>