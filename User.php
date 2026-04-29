<?php
include 'includes/nav.php';
require 'conn_db.php';

// All POST handling goes here, BEFORE any HTML output
$company_ID = $_SESSION['company_ID'] ?? null;

if (isset($_POST['delete'])) {
    $stmt = $link->prepare("DELETE FROM company_account WHERE company_ID = ?");
    if ($stmt->execute([$company_ID])) {
        header("Location: logout.php");   // works now — no output yet
        exit();
    }
}

if (isset($_POST['updateUsername'])) {    // matches the form's name="updateUsername"
    $CompanyName = $_POST['CompanyName'];
    $stmt = $link->prepare("UPDATE company_account SET CompanyName = ? WHERE company_ID = ?");
    if ($stmt->execute([$CompanyName, $company_ID])) {
        $_SESSION['CompanyName'] = $CompanyName;
    }
}

if (isset($_POST['updatePassword'])) {
    $password = $_POST['Password'];
    $passwordPattern = "/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[\W_]).{8,}$/";
    if (!preg_match($passwordPattern, $password)) {
        $pwError = "Password must be at least 8 chars, with upper, lower, number, special.";
    } else {
        $hashed = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $link->prepare("UPDATE company_account SET password = ? WHERE company_ID = ?");
        $stmt->execute([$hashed, $company_ID]);
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Account Info for <?= htmlspecialchars($_SESSION['CompanyName']) ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Vidaloka&display=swap" rel="stylesheet">
    <style>
        #submitButton, h3 {
            font-family: "Vidaloka", serif;
            background-color: #2e2b33;
            color: #d6bcfa;
        }
        .submit-button { /* use a class instead — see note below */ }
    </style>
</head>

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
</html>
<?php include 'includes/FooterLoggedIn.php';?>