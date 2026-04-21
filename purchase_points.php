	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Vidaloka&display=swap" rel="stylesheet">
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

<?php
require 'conn_db.php';
include 'includes/nav.php';

if (isset($_GET['points_needed'])) {
	$points_needed = intval($_GET['points_needed']);
		$amountPaid = $points_needed * 100;

	if(isset($_POST['Purchase'])){
		$card_name = $_POST['card_name'];
		$card_number = $_POST['card_number'];
		$expiry = $_POST['expiry'];
		$cvv = $_POST['cvv'];
		
		if (strlen($card_number) < 12) {
			echo "<p>Invalid card number!</p>";
		} else {


			// Assuming you have a user session
			$company_ID = $_SESSION['company_ID'];

			// Example: update user points
			$stmt = $link->prepare("UPDATE account_rubrics SET points = points + ? WHERE company_ID = ?");
			$stmt->bind_param("ii", $points_needed, $company_ID);
			$stmt->execute();
			
			$stmt = $link->prepare("SELECT Rubric_ID FROM account_rubrics WHERE company_ID = ?");
			$stmt->bind_param("i", $company_ID);
			if ($stmt->execute()) {
				$stmt->store_result();
				$stmt->bind_result($Rubric_ID);
				$stmt->fetch();
			}else {
				echo "Error: " . $stmt->error;
			}


			$stmt = $link->prepare("UPDATE certificate_progress SET Voucher_Points = ?, amount_Paid = ?, Certificate_Achieved = true WHERE Rubric_ID = ?");
			if ($stmt === false) {
			die("Prepare failed: " . $link->error);
			}
			$stmt->bind_param("iii", $points_needed, $amountPaid ,$Rubric_ID);
			if ($stmt->execute()) {
			// Redirect back to cart after purchase
			header("Location: certificate.php");
			exit();
			}else {
				echo "Error: " . $stmt->error;
			}
}}}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Checkout</title>
    
</head>
<body style="		background-color: #2A2334;
		color: #5c00DE;">
	<div id="box1">
    <h2>Checkout - Total £<?php echo number_format($amountPaid); ?></h2>
    <form method="post">
        
            <label>Name on Card</label>
            <input type="text" name="card_name" style="color: #542e89;"  class="form-control" required id="fontChange">
        <br>
                <br>

            <label>Card Number</label>
            <input type="text" name="card_number" style="color: #542e89;" class="form-control" placeholder="1234 5678 9012 3456" required id="fontChange">
        <br>
                <br>

            <label>Expiry (MM/YY)</label>
            <input type="text" name="expiry" style="color: #542e89;" class="form-control" required id="fontChange">
        </br>
                <br>

            <label>CVV</label>
            <input type="text" name="cvv" style="color: #542e89;" class="form-control" required id="fontChange">
        </br>        <br>

        <button type="submit" name="Purchase" style="background-color:#2E2b33;color: #5c00DE;" id="fontChange">Pay £<?php echo number_format($amountPaid); ?></button>
    </form>
	</div>
</body>
</html>
<?php include 'includes/FooterLoggedIn.php';?>