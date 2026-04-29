<?php
//database connection
require 'conn_db.php';

//check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
if(isset($_POST['passwordForgot'])){
// Get form data
$Contactemail = isset($_POST['Contactemail']) ? trim($_POST['Contactemail']) : '';
$password = isset($_POST['password']) ? trim($_POST['password']) : '';

// Basic validation
if (empty($Contactemail) || empty($password)) {
    die("All fields are required.");
}

// Email format validation
if (!filter_var($Contactemail, FILTER_VALIDATE_EMAIL)) {
    die("Invalid email format.");
}

// Password strength check
$passwordPattern = "/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[\W_]).{8,}$/";
if (!preg_match($passwordPattern, $password)) {
    die("Password must be at least 8 characters long, include an uppercase letter, a lowercase letter, a number, and a special character.");
}

// Check if email already exists
$stmt = $link->prepare("SELECT company_ID FROM company_account WHERE Contactemail = ?");
$stmt->execute([$Contactemail]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if (!$row) {
	die("No Email Registered");
}
$company_ID = $row['company_ID'];

// Hash password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Update password
$updateStmt = $link->prepare("UPDATE company_account SET password = ? WHERE company_ID = ?");
if ($updateStmt->execute([$hashed_password, $company_ID])) {
	header("Location: Home.php");
	exit();
} else {
	echo "Error updating password.";
}
}
}
?>
<html lang="en">
	<!-- Styling and structure of the website page -->
	<style>
	#submitButton {
	font-family: "Vidaloka", serif;
	font-weight: 400;
	font-style: normal;
	background-color: #2e2b33;
	color: #542e89;
}
	h1,h3{
	font-family: "Vidaloka", serif;
	font-weight: 400;
	font-style: normal;
	color: #d6bcfa;
}
	#box1{width:70rem;   
	margin-left: auto;
	margin-right: auto;
	text-align: center;}

	#goLeft{float:left;margin:0px 0px 0px 0px;display: block;}

  	#PasswordForgot{float:center;display: block}

  	 #identifier {
	font-family: "Vidaloka", serif;
	font-weight: 400;
	font-style: normal;
	color: #5c1eb3
	}
	</style>


  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <!-- create style-->
	<link rel="stylesheet" href="mystyle.css">
	
	<!--  Google font -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Bangers&family=Marck+Script&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

	<!-- Title of the page -->
	<title>Forgot Password</title>
  </head>
  <body style="background-color: #2A2334;">
	<!-- Logo of the website -->
<img src="IMG/Logo.JPG" alt="IMG/Logo.jpg" width="175" height="175" id="goLeft">
 <div class="container" id="PasswordForgot" style="background-color: #2A2334;color: #d6bcfa;
; border-color:#000000">
	<h1 class="text-center" id="PasswordForgot">New Password</h1>
	<div class="row" style="background-color: #2A2334;border-color:#000000">
		<div class="col-sm" >
		  
		  <div class="card" style="background-color: #2A2334;color: #d6bcfa; border-color:#000000">
  <div class="card-header" style="background-color: #2e2b33;color: #d6bcfa; border-color:#000000">
    New Password
  </div>
  <div class="card-body"  style="background-color: #432f5e;color: #d6bcfa; border-color:#000000">
	<!-- Form for users to input their email and new password -->
		<form action="" method="POST">
			<div class="row">
				<div class="form-group col-md-6">
					<label>Enter Email Used:</label><br>
					<input type="email" class="form-control" id="identifier" name="Contactemail" placeholder="Email" required><br><br>
				</div>
				<div class="form-group col-md-6">
					<label>Enter New Password:</label><br>
					<input type="password" class="form-control" id="identifier" placeholder="Password" name="password" required><br><br>
				</div>
			</div>
			<button class="btn btn-block" name="passwordForgot" id="identifier" style="background-color: #2e2b33;color: #543e89" type="submit">Confirm</button>
		</form>

</div>
</body>
</html>
<?php

?>

