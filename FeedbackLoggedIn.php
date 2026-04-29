<?php

// includes the database connection
require 'conn_db.php';

// define variables and set to empty values
$NameErr=$ContactNumberErr = $emailErr = $failed = "";
$Name=$ContactNumber = $email = $comment = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // check if Name is empty
  if (empty($_POST["Name"])) {
    $NameErr = "Name is required";
  } else {
    $Name = test_input($_POST["Name"]);
    // check if Name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]+$/",$Name)) {
      $NameErr = "Only letters and spaces are allowed";
    }
  }


  // check if Contact Number is empty
  if (empty($_POST["ContactNumber"])) {
    $ContactNumberErr = "ContactNumber is required";
  } else {
    $ContactNumber = test_input($_POST["ContactNumber"]);
    // check if Contact Number only contains letters and whitespace
    if (!preg_match("/^[0-9]+$/",$ContactNumber)) {
      $ContactNumberErr = "Only Numbers are allowed";
    }
  }
  
  // check if email is empty
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }

  // check if comment is empty
  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

// if there are any errors, set the failed message
if ($ContactNumberErr != "" || $emailErr  != "" || $NameErr != ""){
	$failed = "Please ensure all required fields have been filled out correctly";
}
else{
	$date = date("Y-m-d");
	// try to execute the prepared statement and catch any exceptions
  try{
            $stmt = $link->prepare(
                "INSERT INTO feedback
                 (feedback, feedback_date, ContactNumberforFeedback, emailAdressforFeedback, name)
                 VALUES (:comment, :date, :contact, :email, :name)"
            );

            $stmt->execute([
                ':comment' => $comment,
                ':date'    => $date,
                ':contact' => $ContactNumber,
                ':email'   => $email,
                ':name'    => $Name
            ]);
		// Redirect to login page
    header("Location: HomeLoggedIn.php");
		exit();
	} catch (PDOException $e) {
		$failed = "Error: " . $e->getMessage();
	}
}}
// function to sanitize user input
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
// includes the navigation bar
include 'includes/nav.php';
?>
  
  <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Vidaloka&display=swap" rel="stylesheet">
	<!-- CSS styles for the website page -->
  <style>
	#submitButton {
	font-family: "Vidaloka", serif;
	font-weight: 400;
	font-style: normal;
	background-color: #2e2b33;
	color: #d6bcfa;
}
	h3,#errorText{
	font-family: "Vidaloka", serif;
	font-weight: 400;
	font-style: normal;
	background-color: #432F5E;
	color: #d6bcfa;
}

#identifier {
	font-family: "Vidaloka", serif;
	font-weight: 400;
	font-style: normal;
	color: #5c1eb3
	}

	#box1{width:70rem;   
	margin-left: auto;
	margin-right: auto;
	text-align: center;
	background-color: #432F5E;
}
			</style>



<!DOCTYPE HTML>  
<html>

<head>
  <!-- Title of the website page -->
<title>Feedback</title>
</head>
<body style="background-color:#2A2334">

<!-- form for user to submit feedback, with error messages displayed if there are any issues with the input -->
<form method="post" style="background-color:#432F5E" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
   <h3>Name:</h3> 
  <input type="text" id="identifier" name="Name" value="<?php echo $Name;?>">
  <span id="errorText">* <?php echo $NameErr;?></span>
  <br><br>
  <h3>ContactNumber:</h3> 
  <input type="text" id="identifier" name="ContactNumber" value="<?php echo $ContactNumber;?>">
  <span id="errorText">* <?php echo $ContactNumberErr;?></span>
  <br><br>
  <h3>E-mail:</h3> <input type="text" id="identifier" name="email" value="<?php echo $email;?>">
  <span id="errorText">* <?php echo $emailErr;?></span>
  <br><br>
  <h3>Comment:</h3> <textarea name="comment" id="identifier" rows="5" cols="40"><?php echo $comment;?></textarea>
  <br><br>
  <input type="submit"  id="submitButton" name="submit" value="Submit">  
  <span id="errorText">* <?php echo $failed;?></span>
</form>
</body>
</html>
<?php
// includes the footer of the website page
include 'includes/FooterLoggedIn.php';?>