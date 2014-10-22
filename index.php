<?php define('_ROOT', "./"); ?>

<!DOCTYPE html>
<html>
	<head>
		<title>machineWorx</title>
        <link rel="icon" type="image/png" href="./favicon.png"/>
		<link href="./index.css" type="text/css" rel="stylesheet"/>
        <link href="./main.css" type="text/css" rel="stylesheet"/>
        <script type="text/javascript" src="./fade.js"></script>
	</head>
	
	<body>
		<?php include_once("./includes/header.php");?>
			<div id="top">
            	<h1>Marketing</h1>
                
                	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sagittis auctor turpis ut vulputate. Aliquam nec hendrerit nulla, ac pellentesque tellus. Sed sapien elit, rhoncus sit amet molestie vel, semper nec tellus. Nulla mauris neque, tempus vitae sem et, finibus interdum felis. Proin fringilla, turpis quis varius vestibulum, magna mauris lobortis metus, vel cursus ligula mi et turpis. Donec pulvinar lorem ac volutpat tincidunt. Fusce sed massa dolor. Donec fringilla, ante in imperdiet varius, tellus magna posuere nunc, a posuere ipsum augue et justo. Cras tincidunt maximus vestibulum.
                    
                <img id="bottomSlide" src="./images/checklist.png"/>
            	<img id="topSlide" src="./images/gear.png"/>
            </div>
            <a href="">
            <div id="left">
            	<h1>Equipment</h1>
                Manage your equipment assets. Print reports, view service history, and track data points.
            </div>
            </a>
            <a href="./Forum">
            <div id="mid">
            	<h1>Forum</h1>
                Post your questions to the Technician Forum.
            </div>
            </a>
            <a href="./Wiki">
            <div id="right">
            	<h1>Wiki</h1>
                Information about machine checks, calibration procedures, recommended repairs, tools needed, etc.
            </div>
            </a>
        <?php include_once("./includes/footer.php");?>
	</body>
</html>