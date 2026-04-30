<?php
// includes the navigation bar and database connection
include 'includes/nav.php';

require 'conn_db.php';
?>
<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Vidaloka&display=swap" rel="stylesheet">
  <!-- CSS styles for the website page -->
  <style>

	#box1{width:100%;   
	margin-left: auto;
	margin-right: auto;
	text-align: center;
  background-color: #432F5E;
  color: #b794f6;
}
			</style>

<head>
  <!-- Title of the website page -->
<title>Info Page</title>
</head>
<body style="background-color:#2A2334">
  <div id="box1">
    <h2> Mission Statement </h2>
    <p>
      Sustain Energy has only one goal in mind, helping companies improve their ability to be eco-friendly and ensuring that they have a positive, sustainable impact on 
      the world around them. We provide a service, which allows users to register with us for a fee and fill in a rubric, which determines a green point score, which allows the user
      to receive a certification for that score, either bronze, silver or gold. IF the company has failed to get a perfect score, they will be expected to purchase a certain
      number of green vouchers for their certificates, these purchase will get donated to good causes in efforts for sustainability.  
    </p>
    <p>
      As Part of our efforts, Sustain Energy is committed to protecting the privacy of our users. We will not share any of your information with third parties, and we will 
      only use your information for the purposes of providing our services to you. We may collect certain information from you, such as your name, email address, phone 
      number, and company information, but we will never sell or share this information with anyone else. We take the privacy of our users very seriously, and we will do 
      everything in our power to protect it.
    </p>
  </div>
</body>

<?php 
// includes the footer of the website page
include 'includes/FooterLoggedIn.php';
?>