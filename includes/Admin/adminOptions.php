

<script>//Create the nav bar to select which Admin form to discplay

	var Options = ["Create Customer", "Edit Customer",
		"Create Machine", "Edit Machine", 
		"Create Model", "Edit Model",
		"Create SubAssembly", "Edit SubAssembly",
		"Create Item", "Edit Item"];
		
		for(var i = 0; i<Options.length; i++ ){
			var link = document.createElement('a');
			link.className = "adminOptions";
			link.textContent = Options[i];
			link.href = '#';
			link.style.width="";
			link.style.margin="";
			link.onclick = function(){setUpAdmin(this)};
			document.getElementById('adminOptCont').appendChild(link);
		}
		
		/**
		 * Function used to set up Administrative area:
		 * Create/Edit: Customers, Machines, Sub assy's, Components
		 * 
		 * Uses ajax via jQuery
		 */
		function setUpAdmin(In){
			var dataArea = In.textContent;
			switch(dataArea){
				case "Create Customer":
					$(function(){
						    $("#include").load("includes/Admin/adminCustomerCreate.php");
						});
					
					break;
					
				case "Edit Customer":
					$(function(){
						    $("#include").load("includes/Admin/adminCustomerEdit.php");
						});
					
					break;
				case "Create Machine":
					$(function(){
						    $("#include").load("includes/Admin/adminMachineCreate.php");
						});
					
					break;
				case "Edit Machine":
					$(function(){
						    $("#include").load("includes/Admin/adminMachineEdit.php");
						});
					
					break;
					
				case "Create Model":
					$(function(){
						    $("#include").load("includes/Admin/adminModelCreate.php");
						});
					
					break;
				case "Edit Model":
					$(function(){
						    $("#include").load("includes/Admin/adminModelEdit.php");
						});
						break;
						
				case "Create SubAssembly":
					$(function(){
						    $("#include").load("includes/Admin/adminSubAssyCreate.php");
						});
					break;
					
				case "Edit SubAssembly":
					$(function(){
						    $("#include").load("includes/Admin/adminSubAssyEdit.php");
						});
					break;
					
				case "Create Item":
					$(function(){
						    $("#include").load("includes/Admin/adminItemCreate.php");
						});
					break;
					
				case "Edit Item":
					$(function(){
						    $("#include").load("includes/Admin/adminItemEdit.php");
					});
					break;
				}
				
			}
			
</script>