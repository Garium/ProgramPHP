<?php


 require 'conn_db.php';
 
// Get form data
$CompanyName = trim($_POST['CompanyName']);
$Contactemail = trim($_POST['Contactemail']);
$password = trim($_POST['password']);

// Basic validation
if (empty($CompanyName) || empty($Contactemail) || empty($password)) {
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
$stmt->bind_param("s", $Contactemail);
$stmt->execute();
$stmt->store_result();
if ($stmt->num_rows > 0) {
    die("Email already registered.");
}
$stmt->close();

// Hash password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Insert new user
$stmt = $link->prepare("INSERT INTO company_account (CompanyName, Contactemail, password) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $CompanyName, $Contactemail, $hashed_password);

if ($stmt->execute()) {
    // Redirect to login page
    header("Location: HomeLoggedIn.php");
    exit();
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$l->close();
?>
