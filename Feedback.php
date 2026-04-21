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
	h3,#errorText{
	font-family: "Vidaloka", serif;
	font-weight: 400;
	font-style: normal;
	background-color:#432F5E;
	color:#2a2334;
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
		background-color:#432F5E;
}
			</style>

<?php

include 'includes/navIndex.php';

require 'conn_db.php';


// define variables and set to empty values
$ContactNumberErr = $emailErr = $failed = "";
$ContactNumber = $email = $comment = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["ContactNumber"])) {
    $ContactNumberErr = "ContactNumber is required";
  } else {
    $ContactNumber = test_input($_POST["ContactNumber"]);
    // check if Contact Number only contains letters and whitespace
    if (!preg_match("/^[0-9]*$/",$ContactNumber)) {
      $ContactNumberErr = "Only Numbers are allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

if ($ContactNumberErr != "" || $emailErr  != ""){
	$failed = "Please ensure all required fields have been filled out correctly";
}
else{
	$date = date("Y/m/d");
	$stmt = $link->prepare("INSERT INTO feedback (feedback, feedback_date,ContactNumberforFeedback,emailAdressforFeedback) VALUES (?, ?, ?,?)");
	$stmt->bind_param("ssis", $comment, $date, $ContactNumber, $email);

	if ($stmt->execute()) {
		// Redirect to login page
		header("Location: Home.php");
		exit();
	} else {
		echo "Error: " . $stmt->error;
	}
}}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<!DOCTYPE HTML>  
<html>

<head>
<title>Help</title>
</head>
<body style="background-color:#2A2334">

<form method="post" style="background-color:#432F5E" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  <h3>ContactNumber:</h3> 
  <input type="text" id="identifier" name="ContactNumber" value="<?php echo $ContactNumber;?>">
  <span id="errorText">* <?php echo $ContactNumberErr;?></span>
  <br><br>
  <h3>E-mail:</h3> <input type="text" id="identifier" name="email" value="<?php echo $email;?>">
  <span id="errorText">* <?php echo $emailErr;?></span>
  <br><br>
  <h3>Comment:</h3> <textarea name="comment" id="identifier" rows="5" cols="40"><?php echo $comment;?></textarea>
  <br><br>
  <input type="submit" id="identifier" name="submit" value="Submit">  
  <span id="errorText">* <?php echo $failed;?></span>
</form>
</body>
</html>
<?php include 'includes/Footer.php';?>