<?php session_start();?>
<div id="header">
	<img id="headImg" src="<?php echo _ROOT . "./images/gear.png"?>" width="70" height="70"/>
	<a href="<?php echo _ROOT . "./";?>">machineWorx</a>
	<?php
		if(isset($_SESSION['user'])){
			#display information
		}else{
			echo "<a href=\""._ROOT."./Login\"><div id=\"logBtn\">Login</div></a>";
		}
	?>
</div>