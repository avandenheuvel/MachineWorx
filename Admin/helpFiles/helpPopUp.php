<!DOCTYPE html>
<html>
<head>
<style type="text/css">
div#overlay {
	display: none;
	z-index: 2;
	background: #000;
	position: fixed;
	width: 100%;
	height: 100%;
	top: 0px;
	left: 0px;
	text-align: center;
}
div#specialBox {
	display: none;
	position: relative;
	z-index: 3;
	margin: 150px auto 0px auto;
	width: 500px; 
	height: 300px;
	background: #FFF;
	color: #000;
}
</style>
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
<div id="overlay"></div>
<!-- End Overlay -->
<!-- Start Special Centered Box -->
<div id="specialBox">
  <p>Special box content ...</p> 
  <button onmousedown="toggleOverlay()">Close Overlay</button>
</div>
<!-- Start Special Centered Box -->
<!-- Start Normal Page Content -->
<a href="#" onmousedown="toggleOverlay()"><h2>Create Item:</h2></a>

<!-- End Normal Page Content -->
</body>
</html>