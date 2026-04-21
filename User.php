	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Vidaloka&display=swap" rel="stylesheet">
	<style>
	#submitButton {
	font-family: "Vidaloka", serif;
	font-weight: 400;
	font-style: normal;
	background-color:#2e2b33;
	color:#542e89;
}
	h3{
	font-family: "Vidaloka", serif;
	font-weight: 400;
	font-style: normal;
	background-color:#000000;
	color:#542e89;
}
	#box1{width:70rem;   
	margin-left: auto;
	margin-right: auto;
	text-align: center;}
			</style>

<?php

include 'includes/nav.php';

require 'conn_db.php';
?>

<html>
<head>
	<title> Account Info for <?php echo $_SESSION['CompanyName']; ?></title>
</head>
<body style="background-color:#542e89;float:center">
	<center>
		<h3> Delete Account</h3>
		<form action="" method="POST">
			<input type="submit" name="delete" id="submitButton" value="delete data"/>
		</form>
		<h3> change Account name for <?php echo $_SESSION['CompanyName']; ?></h3>
		<form action="" method="POST">
			<input type="text" name="CompanyName" style="color: #543e89">
			<input type="submit" name="updateUsername" id="submitButton"  value="update data"/>
		</form>
		<h3> change Password for <?php echo $_SESSION['CompanyName']; ?></h3>
		<form action="" method="POST">
			<input type="text" name="Password" style="color: #543e89">
			<input type="submit" name="updatePassword" id="submitButton" value="update data 2"/>
		</form>
	</center>

</body>		

<?php

$company_ID = $_SESSION['company_ID'];

if(isset($_POST['delete'])){
	$query = "DELETE FROM company_account WHERE company_ID='$company_ID' ";
	$query_run = mysqli_query($link,$query);
	
	if($query_run){
		header("Refresh:1; url=logout.php");
	}
	else{		
		echo '<script type="text/javascript"> alert("Failed")</script>';	
	}
	}
if(isset($_POST['updateCompanyName'])){
	$CompanyName = $_POST['CompanyName'];
	$query = "UPDATE company_account SET CompanyName = '$CompanyName' WHERE company_ID='$user_id' ";
	$query_run = mysqli_query($link,$query);
	
	if($query_run){
		$_SESSION['CompanyName'] = $CompanyName;	
		}
	else{		
		echo '<script type="text/javascript"> alert("Failed")</script>';	
	}
	}
	
if(isset($_POST['updatePassword'])){
	$password = $_POST['Password'];
	
	$passwordPattern = "/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[\W_]).{8,}$/";
	if (!preg_match($passwordPattern, $password)) {
		die("Password must be at least 8 characters long, include an uppercase letter, a lowercase letter, a number, and a special character.");
	}
	$hashed_password = password_hash($password, PASSWORD_DEFAULT);
	$query = "UPDATE company_account SET password = '$hashed_password' WHERE company_ID='$user_id' ";
	$query_run = mysqli_query($link,$query);
	
	if($query_run){
		echo '<script type="text/javascript"> alert("Password Updated")</script>';
	}
	else{		
		echo '<script type="text/javascript"> alert("Failed")</script>';	
	}
	}
	include 'includes/FooterLoggedIn.php';
?>