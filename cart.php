<?php
//ob_start is used to start output buffering, so header redirection occurs after output has been generated
ob_start();

include 'includes/nav.php';
// Include navigation bar

// Check if points_needed parameter exists
if (isset($_GET['points_needed'])) {
    $points_needed = intval($_GET['points_needed']);
	$points = 100 - $points_needed;
	
	if(isset($_POST['proceedToPurchase'])){
        ob_end_clean();
		header("Location: purchase_points.php?points_needed=$points_needed");
        exit;
	}

    ?>
    <!DOCTYPE html>
    <html>
    <head>
<!-- Title of the page -->
        <title>Purchase Points</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Vidaloka&display=swap" rel="stylesheet">
	<!-- Styling for the website page -->
        <style>
            h1, p, a, #fontChange {
                font-family: "Vidaloka", serif;
                font-weight: 400;
                font-style: normal;
                color: #d6bcfa;
            }
            #box1 {
                width: 100%;
                margin-left: auto;
                margin-right: auto;
                text-align: center;
				background-color: #2E2b33;
            }
        </style>
    </head>
    <body style="background-color:#2A2334;">
        <div id="box1" style="margin-top:50px;">
            <h1>Purchase Green vouchers</h1>
            <p>You earned <?php echo $points; ?> green points, purchase a green voucher to make up the additional <strong><?php echo $points_needed; ?></strong> points needed to reach 100 green points and receive a certificate.</p>
        </div>
		<div id="box1" style="margin-top:10px;">
            <form action=""  method="POST">
                <button type="submit" name="proceedToPurchase" style="font-size:20px;padding:10px 20px;background-color:#2A2334;color: #b794f6;">Proceed to purchase</button>
            </form>
		</div>
    </body>
    </html>



<?php
}
// includes the footer of the website page
include 'includes/Footer.php';
ob_end_flush();
?>