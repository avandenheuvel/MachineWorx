<?php
	
	require_once('../DemoPasswordVerify/PasswordVerify.php');
	
	$CustomerID = $_SESSION['LoggedInCustID'];
	
	//Get verified variables from the user form
	
	//Regular expressions used for validation
	$namePattern = "/^\s*[a-zA-Z,\s]+\s*$/";
	$phonePattern="/^\d\d\d\-\d\d\d\-\d\d\d\d$/";
	$blankPattern="/\w/";
	$zipPattern="/^\d{5}(-\d{4})?$/";
	$eMailPattern="/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/";
	
	$firstName=$_GET['txtFirstName'];
	if(!preg_match($namePattern, $firstName)){
		header('Location:adminItemCreate.php');
		 
		echo'<script type="text/javascript">alert("1");</script>'; 
		
		exit();
	}
	
	$lastName=$_GET['txtLastName'];
	if(!preg_match($namePattern, $lastName)){
		header('Location:adminItemCreate.php');
		echo'<script type="text/javascript">alert("2");</script>'; 
		exit();
	}
	
	$eMail=$_GET['txtEmail'];
	if(!preg_match($eMailPattern,$eMail)){
		header('Location:adminItemCreate.php');
		echo'<script type="text/javascript">alert("3");</script>'; 
		exit();
	}
	
	$phone=$_GET['txtPhone'];
	if(!preg_match($phonePattern,$phone)){
		header('Location:adminItemCreate.php');
		echo'<script type="text/javascript">alert("4");</script>'; 
		exit();
	}
	
	$address=$_GET['txtAddress'];
	if(!preg_match($blankPattern, $address)){
		header('Location:adminItemCreate.php');
		echo'<script type="text/javascript">alert("5");</script>'; 
		exit();
	}
	
	$city=$_GET['txtCity'];
	if(!preg_match($namePattern, $city)){
		header('Location:adminItemCreate.php');
		echo'<script type="text/javascript">alert("6");</script>'; 
		exit();
	}
	
	include('StateArray.php');
	$state=$_GET['lstState'];
	if (!in_array($state, $stateCodes)){
		header('Location:adminItemCreate.php');
		echo'<script type="text/javascript">alert("7");</script>'; 
		exit();
	}
	
	$zip=$_GET['txtZip'];
	if(!preg_match($zipPattern, $zip)){
		header('Location:adminItemCreate.php');
		echo'<script type="text/javascript">alert("8");</script>'; 
		exit();
	}
	
	$password=$_GET['txtPassword'];
	$passwordVer=$_GET['txtPwdVerify'];
	if(strlen($password)<3 || strlen($passwordVer)<3 || $password!=$passwordVer){
		header('Location:adminItemCreate.php');
		echo'<script type="text/javascript">alert("9");</script>';
		exit();
	}

?>

<html>
	<head><title>Response page</title></head>
	<body>
		<h1>Your Account has been updated</h1>
		<h2>You have submitted the following info:</h2>
		
		<?php
		
		$dsn = 'mysql:host=itsql.fvtc.edu;dbname=90737_120250836';
		$username = '90737_120250836';
		$ServerPassword='90737_120250836';
		
		$options=array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION);
		
		try{
			$db = new PDO($dsn,$username,$ServerPassword,$options);	
			
			$update = "
				UPDATE CustomerInfo
				SET FirstName = :FirstName, LastName = :LastName, 
					Address = :Address, City = :City, State = :State, Zip = :Zip, 
					Phone = :Phone, EMail = :EMail, Password = :Password
				WHERE CustomerID = :CustomerID";
			
			$SQL = $db->prepare($update);
			
			$SQL->bindValue(':CustomerID', $CustomerID);
			$SQL->bindValue(':FirstName', $firstName);
			$SQL->bindValue(':LastName', $lastName);
			$SQL->bindValue(':Address', $address);
			$SQL->bindValue(':City', $city);
			$SQL->bindValue(':State', $state);
			$SQL->bindValue(':Zip', $zip);
			$SQL->bindValue(':Phone', $phone);
			$SQL->bindValue(':EMail', $eMail);
			$SQL->bindValue(':Password', $password);
			
			$SQL->execute();//execute the SQL query
		
			$SQL->closeCursor(); //disconnect from the server
		
			}catch(PDOException $e){
				$error_message = $e->getMessage();		
				echo("<p>Database error: $error_message</p>");
			}
		
		?>
		
		<!--Many times PHP data is output to html with the echo command-->
		<!--This is another way to enter PHP variable tags-->
		<h3>Your Customer number is: <?=$CustomerID?></h3>
		<h3>First name: <?=$firstName?> </h3>
		<h3>Last name: <?=$lastName?> </h3>
		<h3>E-Mail: <?=$eMail?> </h3>
		<h3>Phone: <?=$phone?> </h3>
		<h3>Address: <?=$address?> </h3>
		<h3>City: <?=$city?> </h3>
		<h3>State: <?=$state?> </h3>
		<h3>Zip: <?=$zip?> </h3>
		<h3>Password: <?=$password?> </h3>
		<h3>Verified Password: <?=$passwordVer?> </h3>
		
		
		<?php
		
			$db = null; // Clear memory
			
		?>
		
		<a href=../index.htm>Return Home</a>
		
	</body>
</html>