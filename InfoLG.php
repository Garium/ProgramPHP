	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Vidaloka&display=swap" rel="stylesheet">
	<style>

	#links{
	font-family: "Vidaloka", serif;
	font-weight: 400;
	font-style: normal;
	background-color:#432F5E;
	color:#2a2334;
	font-size:35;
}
	#box1{width:70rem;   
	margin-left: auto;
	margin-right: auto;
	text-align: center;}
			</style>

<?php

include 'includes/nav.php';

require 'conn_db.php';
?>
<head>
<title>Contact Us</title>
</head>
<body style="background-color:#2A2334">

      <section class="text-center mb-5">
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

<?php include 'includes/FooterLoggedIn.php';?>