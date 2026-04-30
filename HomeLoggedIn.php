<?php
//navigation bar and database connection
require 'conn_db.php';
include 'includes/nav.php';
?>
<html>
<head>
	<!-- Title of the page -->
	<title> Home </title>  
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Vidaloka&display=swap" rel="stylesheet">
</head>
    <!-- Styling of the website page -->
	<style>
	.Box {
	font-family: "Vidaloka", serif;
	font-weight: 400;
	font-style: normal;
	float: center;
	display: flex;
    padding-left: 20px;
  }

		h1, #fontChange {
	font-family: "Vidaloka", serif;
	font-weight: 400;
	font-style: normal;
	color:#b794f6;
	font-size: 133%;
	}
	
	.Box{position:relative;display:flex;align-items: center;justify-content: center;flex-direction:column;min-width:0;word-wrap:break-word;background-color:#432F5E;background-clip:border-box;border:1px solid rgba(0,0,0,.125);border-radius:.25rem}
	#ButtonChange{
		background-color:#2E2b33;
	}
        .image-container {
            display: flex;
            justify-content: center; 
			background-color:#432F5E;
			gap: 16%; 
        }
        .image-container img {
            width: 16%; 
            height: auto; 
        }
	</style>

<body id = "Override">
    <div class="image-container">
        <?php
        // Array of image sources
        $images = [
            'IMG/HPSustainable1.jpg',
            'IMG/Sustainability2.jpg',
            'IMG/Sustainability3.avif'
        ];

        // Loop through images and display
        foreach ($images as $img) {
            echo "<img src='$img' alt='Image'>";
        }
        ?>
    </div>
	<div class = "Box">
		<!-- Welcome message and description of the website -->
	<p id = "fontChange">
	Welcome to Sustain Energy<br>This site is dedicated to the valuation of the companies on their efforts to be green and Sustainable<br>Log in and take part in our rubric
	to see how you do<br>Once your done, and donate for green vouchers any points you missed out on, you'll have an official certificate<br>they come in gold, silver or
	bronze, so aim for the highest one, the max score is 100 green points.<br> Warning, this site expects users to enter accurate answers in the rubric, with 
	consideration to Good Corporate Citizenship
	</p>
	</div>
</body>
</html>
<?php
//footer
include 'includes/FooterLoggedIn.php';
?>