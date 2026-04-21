<?php 
#link to MySQL DATABASE.
require 'conn_db.php';

// Get form data
$title = trim($_POST['title']);
$poster_url = trim($_POST['poster_url']);
$trailer = trim($_POST['trailer']);
$description = trim($_POST['description']);
$showtime = trim($_POST['showtime']);
$year = trim($_POST['year']);
$certification = trim($_POST['certification']);
$category = trim($_POST['category']);

// Validate inputs
if (empty($title) || empty($poster_url) || empty($trailer) 
				  || empty($description) || empty($showtime)
				  || empty($year) || empty($certification)
				  || empty($category)) {
    die("All fields are required.");
}

// Insert new user
$stmt = $link->prepare("INSERT INTO movies (title, poster_url, trailer, description, showtime, year, certification, category) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
//The number of elements in the type definition string must match the number of bind variables
$stmt->bind_param("ssssssss", $title, $poster_url, $trailer, $description, $showtime, $year, $certification, $category);

if ($stmt->execute()) {
	include 'includes/nav.php';
		
    echo "<div class=\"container\">
	<div class=\"alert alert-secondary\" alert-warning alert-dismissible fade show\" role=\"alert\">
	Record created successful! <a href=\"admin.php\" class=\"alert-link\">Close</a>
	
	</div></div>";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$link->close();
?>





