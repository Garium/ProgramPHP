<?php
session_start();

require 'conn_db.php';

// Get form data
$Contactemail = trim($_POST['Contactemail']);
$password = trim($_POST['password']);

// Validate inputs
if (empty($Contactemail) || empty($password)) {
    die("Both fields are required.");
}

// Find user
$stmt = $link->prepare("SELECT company_ID, CompanyName, password FROM company_account WHERE Contactemail = ?");
$stmt->bind_param("s", $Contactemail);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows == 1) {
    $stmt->bind_result($company_ID, $CompanyName, $hashed_password);
    $stmt->fetch();

    // Verify password
    if (password_verify($password, $hashed_password)) {
        $_SESSION['company_ID'] = $company_ID;
        $_SESSION['CompanyName'] = $CompanyName;
        header("Location: HomeLoggedIn.php");
        exit();
    } else {
        die("Invalid password.");
    }
} else {
    die("No account found with that email or password.");
}

$stmt->close();
$link->close();
?>
