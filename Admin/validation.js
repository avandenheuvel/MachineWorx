/*
 * Test the users input
 * Input str = string value to be evaluated against appropriate regular expression(regEx)
 * Input code = 3 digit code coming from the first 3 letters in the name of the HTML text field id
 * 	Ex: nam = name (first or last), zip = zip code, sta = state...
 * 
 * used expression building tool here: http://regexlib.com/?AspxAutoDetectCookieSupport=1
 */
function testInput(str, inID) {
	
	//Variable used to store then write the error message to display
	var result = "";
	
	//Get 3 digit code for use in validating input
	var code = "";
	for(var i = 0; i <=2; i++){
		code += inID.charAt(i);
	}
	
	switch (true) {
		
		//Check not blank
		case (str == ""):
			result = "*Required*";
		break;
		
		//nam code match & str input does not contain any numbers		
		case (inID == "txtFirstName") || (inID == "txtCity") || (inID == "txtLastName"):
			if (/^\s*[a-zA-Z,\s]+\s*$/.test(str) == true) {
				result = "";
			}else{
				result = "Only letters allowed";
			}
		break;
		
		//Check that detailed description has between 10 and 4000 characters
		case (inID == "checkDescDetail") || (inID=="subAssyName") ||(InID=="ModelName"):
			if(/^.{10,4000}$/.test(str) == true){
				result = "";
			}else{
				result = "Description must be between 10 and 4000 characters";
			}		        
		break;
		
		//Check that simple description has between 2 and 40 characters
		case (inID == "checkDescSimple") || (inID=="subAssyName")||(InID=="ModelName"):
			if(/^.{2,40}$/.test(str) == true){
				result = "";
			}else{
				result = "Simple Description must be between 2 and 40 characters";
			}		        
		break;
		
		//Check that password is at least 3 charachters long
		case (inID == "txtPassword"):
			if(parseInt(str.length)>2){
				result = "";
			}else{
				result = "Password must be at least 3 characters long";
			}	        
		break;
		
		//Check that password is reentered correctly
		case (inID =="txtPwdVerify"):
			var matchBase = document.getElementById("txtPassword");
			if(str == matchBase.value){
				result="";
			}else{
				result="Passwords do not match"
			}
		break;
		
		//Check if state is a state
		case (inID == "lstState"):
		
			//put all states in this array. 
			var states = ["AK","AL","AR","AS","AZ","CA","CO","CT","DC","DE","FL","GA",
				"GU","HI","IA","ID","IL","IN","KS","KY","LA","MA","MD","ME","MH","MI","MN",
				"MO","MS","MT","NC","ND","NE","NH","NJ","NM","NV","NY","OH","OK","OR","PA",
				"PR","PW","RI",	"SC","SD","TN","TX","UT","VA","VI","VT","WA","WI","WV","WY"];
			
		    for(var i=0;i< states.length;i++) {
		      if(str.toUpperCase() != states[i]) {
		        result = str + " is not a valid state";
		      }else{
		      	result = "";
		      	var ele = document.getElementById(inID);
		      	ele.value = str.toUpperCase();
		      	break;
		      }
		    }
	    break;
		
		//Check zip code
		case (inID == "txtZip"):
			if( /^\d{5}(-\d{4})?$/.test(str) == true){
				result = "";
			}else{
				result = str + " is not a valid zip";
			}	
		break;
		
		//Check phone number
		case(inID == "txtPhone"):
			if( /^[2-9]\d{2}-\d{3}-\d{4}$/.test(str) == true){
				result = "";
			}else{
				result = str + " is not a valid phone #"
			}
		break;
		
		//Verify e-mail address
		case(inID == "txtEmail"):
			if(/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/.test(str) == true){
				result = "";
			}else{
				result = str + " is not a valid e-mail";
			}
		break;
		
		//Should be no unaccounted for. Display troubleshooting info if default evaluates true
		default:
			result = "Default case: str= " + str + ", code =  " + code;
		break;
	}
	return result;
}

//On text box blur event
//Function to look at and validate user input (inID)
//Display error at appropriate line using innerHTML on errID line
function validate(inID, errID) {
	var name = document.getElementById(inID).value.trim();
	var nameField = document.getElementById(inID);
	var errorMess = document.getElementById(errID);
	
	//Validate user input and add message. Message is blank if input okay
	errorMess.innerHTML = 	testInput(nameField.value, inID);
}


//Reset all of the errors
function resetErrors() {	
	//Get all "error" Class elements
	var paragraphs = document.getElementsByClassName('error');
	for (i = 0;  i < paragraphs.length; i++) {
		paragraphs[i].innerHTML = "";
		//return false; 
	}
	//return true;
}

//Reset single Error field id as param
//Called from input box onkeypressed event
function resetError(errID){
	document.getElementById(errID).innerHTML = "";
}

//On Submit
//Check that all fields are submitted
//If error found ennunciate and set focus
function checkOnSubmit(){
	
	var errClassArray = document.getElementsByClassName("error");
	var inputClassArray = document.getElementsByClassName("userInput");
	var errClassLength =  errClassArray.length;
	var inputClassLength = inputClassArray.length;
	
	//Check userInput class values. Flag first blank
	var inputCheckValue = ""; //Get value of all "userInput" class values
	for(var i = 0; i < inputClassArray.length; i++){
		inputCheckValue = inputClassArray[i].value;
		if(inputCheckValue == ""){
			alert("Your input contains blank fields. Please fill out completely");
			inputClassArray[i].focus();
			return false;
		}
	}
	
	//Check all error class innerHTML. If blank, then there is no error.
	var errCheckValue ="";//Stores value of innerHTML "error" class <p> tags
	for(var i = 0; i < errClassLength; i++){
		errCheckValue = errClassArray[i].innerHTML;
		
		//If not blank get previous sibling from DOM and set focus
		var prevSibID = "";
		if(errCheckValue != ""){
			prevSibID = errClassArray[i].previousSibling.previousSibling.id;
			alert("Your input containes Error(s). Please correct the indicated fields");
			document.getElementById(prevSibID).focus();
			break;
		}
	}					
}
							
// code to display all of the attributes of an element
function showAttribute() {
	var idName = prompt("Enter the id of the element who's attributes you'd like to return", "nameFirstShip");
	var e = document.getElementById(idName);
	var elemList = "";
	for(var element in e) {
    	    var attrib = e.getAttribute(element);
    	    if(attrib != null){
	   			elemList = elemList + element + ": " + attrib + "\n";
	   		}
	}
	alert(elemList);	
}

function getShippingData(){
	var fromArray = ["nameFirstShip", "nameLastShip", "addressShip", "cityShip", "stateShip", "zipShip", "phoneShip"];
	var toArray = ["nameFirstBill", "nameLastBill", "addressBill", "cityBill", "stateBill", "zipBill", "phoneBill"];
	var errArray = ["firstErrBill", "lastErrBill", "addErrBill", "citErrBill", "staErrBill", "zipErrBill", "phoErrBill"];
	
	clearBillingTable();
	
	for (var i = 0; i < toArray.length; i++){
		document.getElementById(toArray[i]).value = document.getElementById(fromArray[i]).value;
		validate(toArray[i], errArray[i]);
	}
}

function clearBillingTable(){
	var toArray = ["nameFirstBill", "nameLastBill", "addressBill", "cityBill", "stateBill", "zipBill", "phoneBill"];
	var errArray = ["firstErrBill", "lastErrBill", "addErrBill", "citErrBill", "staErrBill", "zipErrBill", "phoErrBill"];
	
	for(var i = 0; i < toArray.length; i++){
		document.getElementById(toArray[i]).value = "";
		document.getElementById(errArray[i]).innerHTML = "";
	}
}