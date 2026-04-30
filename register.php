<?php


 require 'conn_db.php';
 
// Get form data
$CompanyName = trim($_POST['CompanyName']);
$Contactemail = trim($_POST['Contactemail']);
$password = trim($_POST['password']);
$card_name = $_POST['card_name'];
$card_number = $_POST['card_number'];
$expiry = $_POST['expiry'];
$cvv = $_POST['cvv'];
if (strlen($card_number) < 12) {
	die("Invalid card number!");
}
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
$stmt = $link->prepare("SELECT company_ID FROM company_account WHERE Contactemail = :email");
$stmt->execute([':email' => $Contactemail]);
if ($stmt->rowCount() > 0) {
    die("Email already registered.");
}
$stmt = null;

// Hash password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Insert new user
$stmt = $link->prepare("INSERT INTO company_account (CompanyName, Contactemail, password) VALUES (:company_name, :email, :password)");
$result = $stmt->execute([
    ':company_name' => $CompanyName,
    ':email' => $Contactemail,
    ':password' => $hashed_password
]);

if ($result) {
    // Redirect to login page
    header("Location: HomeLoggedIn.php");
    exit();
} else {
    echo "Error: " . $stmt->errorInfo()[2];
}

$stmt = null;
$link = null;
?>
