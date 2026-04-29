<?php
session_start();

require 'conn_db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: login.html");
    exit();
}
// Get form data
$Contactemail = trim($_POST['Contactemail']);
$password = trim($_POST['password']);

// Validate inputs
if (empty($Contactemail) || empty($password)) {
    die("Both fields are required.");
}

// Find user
$stmt = $link->prepare("SELECT company_ID, CompanyName, password FROM company_account WHERE Contactemail = ?");
$stmt->execute([$Contactemail]);

$row = $stmt->fetch(PDO::FETCH_ASSOC);
if ($row) {
    $company_ID = $row['company_ID'];
    $CompanyName = $row['CompanyName'];
    $hashed_password = $row['password'];

    // Verify password
    if (password_verify($password, $hashed_password)) {
        $_SESSION['company_ID'] = $company_ID;
        $_SESSION['CompanyName'] = $CompanyName;
        header("Location: HomeLoggedIn.php");
        exit();
    } else {
        die("No account found with that email or password.");
    }
} else {
    die("No account found with that email or password.");
}
?>
