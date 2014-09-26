
<script>//Create the nav bar to select which Admin form to discplay

	var Options = ["Create Customer", "Edit Customer",
		"Create Machine", "Edit Machine", 
		"Create Model", "Edit Model",
		"Create SubAssembly", "Edit SubAssembly",
		"Create Check Point", "Edit Check Point"];
		
		for(var i = 0; i<Options.length; i++ ){
			var link = document.createElement('a');
			link.className = "button tiny";
			link.textContent = Options[i];
			link.href = '#';
			link.style.width="100%";
			link.style.margin="1px";
			link.onclick = function(){setUpAdmin(this)};
			document.getElementById('adminSelect').appendChild(link);
		}
		
		/**
		 * Function used to set up Administrative area:
		 * Create/Edit: Customers, Machines, Sub assy's, Components
		 * 
		 * Uses ajax via jQuery
		 */
		function setUpAdmin(In){
			// Used to display test parameter in //alert(In.textContent);
			$(function(){
			    $("#include").load("viewAdministrator/itemCreate.php");
			});
		}
</script>