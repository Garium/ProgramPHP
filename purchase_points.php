<?php
//ob_start is used to start output buffering, so header redirection occurs after output has been generated
ob_start();
// includes the database connection and navigation bar
require 'conn_db.php';
include 'includes/nav.php';
// checks if the 'points_needed' parameter is set in the URL
if (isset($_GET['points_needed'])) {
	// retrieves the number of points needed from the URL and calculates the amount to be paid
	$points_needed = intval($_GET['points_needed']);
	$amountPaid = $points_needed * 100;
	$error = '';
	// checks if the form has been submitted
	if(isset($_POST['Purchase'])){
		// retrieves the card details from the form submission
		$card_name = $_POST['card_name'];
		$card_number = $_POST['card_number'];
		$expiry = $_POST['expiry'];
		$cvv = $_POST['cvv'];
		// validates the card number length
		if (strlen($card_number) < 12) {
			$error = "Invalid card number!";
		} else {
			//tries to update the points and certificate progress for the company in the database
			try{
				// retrieves the company ID from the session
				$company_ID = $_SESSION['company_ID'];
				// updates the points for the company in the database
				$stmt = $link->prepare("UPDATE account_rubrics SET points = points + :pts WHERE company_ID = :cid");
            	$stmt->execute([':pts' => $points_needed, ':cid' => $company_ID]);
				// retrieves the rubric ID for the company
          		$stmt = $link->prepare("SELECT Rubric_ID FROM account_rubrics WHERE company_ID = :cid ORDER BY Rubric_ID DESC LIMIT 1");
            	$stmt->execute([':cid' => $company_ID]);
            	$row = $stmt->fetch();
				// checks if a rubric was found for the company
            	if (!$row) {
                	$error = "No rubric found for this account.";
            	} else {
                	$Rubric_ID = $row['Rubric_ID'];

					// updates the certificate progress for the company in the database and redirects to the certificate page
					$stmt = $link->prepare("UPDATE certificate_progress SET Voucher_Points = :pts, amount_Paid = :amt, Certificate_Achieved = TRUE WHERE Rubric_ID = :rid");
                	$stmt->execute([':pts' => $points_needed, ':amt' => $amountPaid,':rid' => $Rubric_ID,]);
                	header("Location: certificate.php");
                	ob_end_flush();
                	exit();
			}	
			}catch(PDOException $e) {
				echo "Error: " . $e->getMessage();
}}}}
?>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Vidaloka&display=swap" rel="stylesheet">
	<!-- CSS styles for the website page -->
	<style>
	h2,p,a,label, input,#fontChange {
	font-family: "Vidaloka", serif;
	font-weight: 400;
	font-style: normal;
	}
		#box1{width:40rem;   
  margin-left: auto;
  margin-right: auto;
  text-align: center;
  background-color: #432f5e;
  margin-top: 100px;
  height:3	00px;	
		}
	</style>


<!DOCTYPE html>
<html>
<head>
	<!-- Title of the website page -->
    <title>Checkout</title>
    
</head>
<body style="background-color: #2A2334;
		color: #d6bcfa;">
	<div id="box1">
    <h2>Checkout - Total £<?php echo number_format($amountPaid); ?></h2>
	<!-- fill out the form with card details to purchase the points needed to achieve the certificate -->
    <form method="post">
        
            <label>Name on Card</label>
            <input type="text" name="card_name" style="color: #5c1eb3;"  class="form-control" required id="fontChange">
        <br>
                <br>

            <label>Card Number</label>
            <input type="text" name="card_number" style="color: #5c1eb3;" class="form-control" placeholder="1234 5678 9012 3456" required id="fontChange">
        <br>
                <br>

            <label>Expiry (MM/YY)</label>
            <input type="text" name="expiry" style="color: #5c1eb3;" class="form-control" required id="fontChange">
        </br>
                <br>

            <label>CVV</label>
            <input type="text" name="cvv" style="color: #5c1eb3;" class="form-control" required id="fontChange">
        </br>        <br>

        <button type="submit" name="Purchase" style="background-color:#2E2b33;color: #d6bcfa;" id="fontChange">Pay £<?php echo number_format($amountPaid); ?></button>
    </form>
	</div>
</body>
</html>
<?php 
// includes the footer of the website page
include 'includes/FooterLoggedIn.php'; ob_flush()?>