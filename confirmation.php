<?php
session_start();
require 'conn_db.php';

if (!isset($_GET['ref']) || !isset($_SESSION['last_booking_ref'])) {
    echo "<p>No booking found!</p>";
    exit;
}
$user_id = $_SESSION['user_id']; // assuming the user_id is stored in session
$booking_ref = $_GET['ref'];
$total = $_SESSION['last_booking_total'] ?? 0.00;

// You can query bookings if you want to show the booked movies
$q = "
  SELECT b.*, m.title 
  FROM booking b 
  JOIN movies m ON b.movie_id = m.movie_id 
  WHERE b.user_id = '$user_id' 
  ORDER BY b.booking_date DESC 
  LIMIT 5
";

$r = mysqli_query($link, $q);

?>

<!DOCTYPE html>
	<style>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Vidaloka&display=swap" rel="stylesheet">
	.Box {
	font-family: "Vidaloka", serif;
	font-weight: 400;
	font-style: normal;
	float: center;
	display: flex;
    padding-left: 20px;
	}
		a {
	font-family: "Vidaloka", serif;
	font-weight: 400;
	font-style: normal;
	color:#5c00de;
	font-size:25px;
	}

		h1,p,h4, #fontChange,th,td {
	font-family: "Vidaloka", serif;
	font-weight: 400;
	font-style: normal;
	color:#2a2334
	}
		.Box{position:relative;display:Block;align-items: center;justify-content: center;flex-direction:row;min-width:0;word-wrap:break-word;background-color:#432F5E;background-clip:border-box;border:1px solid rgba(0,0,0,.125);margin: 25px 25px 25px 25px;border-radius:.25rem;text-align:center;}

	#ButtonChange{
		background-color:#2E2b33;
	}
	hr {
  display: block;
  height: 1px;
  border: 0;
  border-top: 1px solid #2A2334;
  margin: 1em 0;
  padding: 0;
}
	table{
		width:50%;
		margin: 0 auto;		
	}
	
	</style>
<html>
<head>
    <title>Booking Confirmation</title>
    
</head>
<body style="background-color: #2A2334;">
		<div class="Box">
        <h1>Booking Confirmed 🎉</h1>
        <p>Thank you for your payment!</p>
        <p><strong>Booking Reference:</strong> <?php echo $booking_ref; ?></p>
        <p><strong>Total Paid:</strong> £<?php echo number_format($total, 2); ?></p>
		<a href="HomeLoggedIn.php" class="btn btn-primary">Back to Home</a>
        <hr>
        <h4>Your Recent Bookings</h4>
        <table>
            <thead>
                <tr>
                    <th>Movie</th>
                    <th>Seats</th>
                    <th>Total</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
            <?php while ($row = mysqli_fetch_assoc($r)) { ?>
                <tr>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['seats']; ?></td>
                    <td>£<?php echo number_format($row['total'], 2); ?></td>
                    <td><?php echo date('d M Y, H:i', strtotime($row['booking_date'])); ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>      
            <a href="TrailersMoviesLoggedIn.php" class="btn btn-primary">Or look at upcoming movies?</a>
		</div>
</body>
</html>