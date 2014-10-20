<!DOCTYPE html>
<html>
	<head>
	
	<script type="text/javascript">
	function toggleOverlay(){
		var overlay = document.getElementById('overlay');
		var specialBox = document.getElementById('specialBox');
		overlay.style.opacity = .8;
		if(overlay.style.display == "block"){
			overlay.style.display = "none";
			specialBox.style.display = "none";
		} else {
			overlay.style.display = "block";
			specialBox.style.display = "block";
		}
	}
	</script>
	</head>
	
	<body>
		<!-- Start Overlay -->
		<div id="overlay">
		</div><!-- End Overlay -->
		
		<!-- Start Special Centered Box -->
		<div id="specialBox">
		  <p>Special box content ...</p> 
		  <button onmousedown="toggleOverlay()">Close Overlay</button>
		</div><!-- End Special Centered Box -->
		
		<!-- Start Normal Page Content -->
		<a href="#" onmousedown="toggleOverlay()"><h2>Create Item:</h2></a>
		
		<!-- End Normal Page Content -->
	</body>
</html>