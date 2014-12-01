

<script>//Create the nav bar to select which Admin form to discplay


	var Options = ["Create/Edit User","Edit Customer", "Assign Technician", 

		"Create Machine", "Edit Machine", 
		"Create Model", "Edit Model",
		"Create SubAssembly", "Edit SubAssembly",
		"Create Item", "Edit Item"];
		
		for(var i = 0; i<Options.length; i++ ){
			var link = document.createElement('a');
			link.className = "adminOptions";
			link.innerHTML=Options[i];
			link.href = '#';
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
			
			var dataArea
			
			//Input can come as an object from the option bar, or txt link from another form.
			if(typeof In == "string"){
				dataArea=In; 
			}else{
				dataArea=In.textContent;
			}
			
			switch(dataArea){
				
				case "Create/Edit User":
					$(function() {
						$("#include").load("userModify.php");	
					});
					break;
				case "Assign Technician":
					$(function(){
						    $("#include").load("adminTechAssign.php");
						});
					
					break;
					
				case "Edit Customer":
					$(function(){
						    $("#include").load("adminCustomerEdit.php");
						});
					
					break;
				case "Create Machine":
					$(function(){
						    $("#include").load("adminMachineCreate.php");
						});
					
					break;
				case "Edit Machine":
					$(function(){
						    $("#include").load("adminMachineEdit.php");
						});
					
					break;
					
				case "Create Model":
					$(function(){
						    $("#include").load("adminModelCreate.php");
						});
					
					break;
				case "Edit Model":
					$(function(){
						    $("#include").load("adminModelEdit.php");
						});
						break;
						
				case "Create SubAssembly":
					$(function(){
						    $("#include").load("adminSubAssyCreate.php");
						});
					break;
					
				case "Edit SubAssembly":
					$(function(){
						    $("#include").load("adminSubAssyEdit.php");
						});
					break;
					
				case "Create Item":
					$(function(){
						    $("#include").load("adminItemCreate.php");
						});
					break;
					
				case "Edit Item":
					$(function(){
						    $("#include").load("adminItemEdit.php");
					});
					break;
				}
				
			}
			
</script>