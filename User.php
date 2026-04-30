<?php
//
ob_start();
//navigation bar and database connection
include 'includes/nav.php';
require 'conn_db.php';

//get company ID from session
$company_ID = $_SESSION['company_ID'];

//get companyName, companyEmail, created_at and accountStatus
$stmt = $link->prepare(
    "SELECT CompanyName, Contactemail, created_at, accountStatus
     FROM company_account
     WHERE company_ID = ?"
);
$stmt->execute([$company_ID]);
$account = $stmt->fetch();



//if the delete button is clicked, delete the account and redirect to logout
if (isset($_POST['delete'])) {
    $stmt = $link->prepare("DELETE FROM company_account WHERE company_ID = ?");
    if ($stmt->execute([$company_ID])) {
        ob_end_clean();
        header("Location: logout.php");   
        exit();
    }
}

//if the update username button is clicked, update the company name in the database and session
if (isset($_POST['updateUsername'])) {    
    $CompanyName = $_POST['CompanyName'];
    $stmt = $link->prepare("UPDATE company_account SET CompanyName = ? WHERE company_ID = ?");
    if ($stmt->execute([$CompanyName, $company_ID])) {
        $_SESSION['CompanyName'] = $CompanyName;
    }
}

//if the update password button is clicked, validate the new password and update it in the database
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


if (isset($_POST['Deactivate'])) {
    $stmt = $link->prepare("UPDATE company_account SET accountStatus = 'Deactivated' WHERE company_ID = :cid");
    $stmt->execute([':cid' => $company_ID]);
    session_unset();
    session_destroy();
    ob_end_clean();
    header("Location: Home.php");
    exit();
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Vidaloka&display=swap" rel="stylesheet">
    <!-- Styling of the website page -->
    <style>
        #submitButton, h3, .background {
            font-family: "Vidaloka", serif;
            background-color: #2e2b33;
            color: #d6bcfa;
        }
    </style>
</head>

<html>
<head>
    <!-- Title of the page -->
	<title> Account Info for <?php echo htmlspecialchars($_SESSION['CompanyName']) ?></title>
</head>
<body style="background-color:#542e89;float:center">
	<center>

    <section class="background">
        <h2>Account information</h2>
        <div>
            <!-- display company name-->
            <span>Company: </span>
            <span><?= htmlspecialchars($account['CompanyName']) ?></span>
        </div>
        <div>
            <!-- display Contact email-->
            <span>Contact email: </span>
            <span><?= htmlspecialchars($account['Contactemail']) ?></span>
        </div>
        <div>
            <!-- display date account created-->
            <span>Joined on: </span>
            <span><?= htmlspecialchars($account['created_at']) ?></span>
        </div>
        <div>
            <!-- display Status-->
            <span>Status: </span>
            <span>
                <span><?= htmlspecialchars($account['accountStatus']) ?></span>
            </span>
        </div>
    </section>


        <!-- Deactivate Account Button -->
		<h3> Deactivate Account</h3>
		<form action="" method="POST">
			<input type="submit" name="Deactivate" id="submitButton" value="Deactivate account"/>
		</form>


        <!-- Delete Account Button -->
		<h3> Delete Account</h3>
		<form action="" method="POST">
			<input type="submit" name="delete" id="submitButton" value="Delete account"/>
		</form>


        <!-- Update Account Name Button -->
		<h3> change Account name for <?php echo htmlspecialchars($_SESSION['CompanyName']) ?></h3>
		<form action="" method="POST">
			<input type="text" name="CompanyName" style="color: #543e89">
			<input type="submit" name="updateUsername" id="submitButton"  value="update account"/>
		</form>


        <!-- Update Account Password Button -->
		<h3> change Password for <?php echo htmlspecialchars($_SESSION['CompanyName']) ?></h3>
		<form action="" method="POST">
			<input type="text" name="Password" style="color: #543e89">
			<input type="submit" name="updatePassword" id="submitButton" value="update account"/>
		</form>
	</center>

</body>		
</html>
<?php 
//footer
include 'includes/FooterLoggedIn.php';
ob_end_flush();
?>