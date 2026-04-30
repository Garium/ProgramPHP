	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Vidaloka&display=swap" rel="stylesheet">
	<!-- Styling for the website page -->
	<style>

	h3,p{
	font-family: "Vidaloka", serif;
	font-weight: 400;
	font-style: normal;
	color:#b794f6;
	word-wrap: break-word;
}
	#box1{width:100%;   
	margin-left: auto;
	margin-right: auto;
	text-align: center;
		background-color:#432F5E;
}
	#links{
	font-family: "Vidaloka", serif;
	font-weight: 400;
	font-style: normal;
	background-color:#432F5E;
	color:#b794f6;
	font-size:35;
}
        .image-container {
            display: flex;
            justify-content: center; 
            gap: 12.5%; 
			background-color:#432F5E;
        }
        .image-container img {
            width: 12.5%; 
            height: auto; 
        }
			</style>

<?php
// Include navigation bar and database connection
include 'includes/navIndex.php';

require 'conn_db.php';
?>
<head>
<!-- Title of the page -->
<title>About us</title>
</head>
<body style="background-color:#2A2334">
	<div id="box1">
		<h3> about us</h3>
		<p>Sustain Energy is a project started in 2026 with the aim of sustainability becoming more widespread, managed and ran by edinburgh college</p>
		<p>Scotland's Capital College which provides high-quality education and training to people and businesses across the region and beyond. We welcome students from more than 135 countries worldwide, who choose from over hundreds of courses across 21 different subject areas with full-time, part-time, evening and distance-learning options available from access to degree level.</p>	
				
		<h3> Goals Outline:</h3>
		<p>
		Sustainability is the heart of our mission, and we take it seriously. In alignment with the UN's Sustainable Development Goals, Our rubric is designed to evaluate
		a companies sustainability efforts across a range of categories, including energy efficiency, waste reduction, and social responsibility, with the aim of encouraging
		companies to adopt more sustainable practices and contribute to a more sustainable future for all.
		</p>
	</div>
	<div id="box1">
	<h3> Accredited By:</h3>
	</div>
    <div class="image-container">
        <?php
        // Array of image sources
        $images = [
            'IMG/HPSustainable1.jpg',
            'IMG/Sustainability2.jpg',
            'IMG/Sustainability3.avif',
			'IMG/Sustainability3.avif'
        ];

        // Loop through images and display
        foreach ($images as $img) {
            echo "<img src='$img' alt='Image'>";
        }
        ?>
    </div>


		<section class="text-center mb-5">
		<h3> Links to our social media Pages:</h3>
        <a href="https://www.facebook.com/" class="links">
          <i id="links">facebook   </i>
        </a>
        <a href="https://x.com/" class="links">
          <i class="fab fa-twitter" id="links">twitter</i>
        </a>
        <a href="https://mail.google.com/" class="links">
          <i class="fab fa-google" id="links">google</i>
        </a>
        <a href="https://www.instagram.com/" class="links">
          <i  id="links" class="fab fa-instagram">instagram</i>
        </a>
        <a href="https://www.linkedin.com/" class="links" >
          <i id="links" >linkedin</i>
        </a>
        <a  href="https://github.com/" class="links">
          <i id="links">github</i>
        </a>
      </section>

</body>

<?php 
// Include footer of the website
include 'includes/Footer.php';?>