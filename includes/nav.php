<?php
session_start();
if (!isset($_SESSION['company_ID'])) {
    header("Location: login.html");
    exit();
}
?>



	
<html lang="en">
	<style>
	a {
	font-family: "Vidaloka", serif;
	font-weight: 400;
	font-style: normal;
	}

	#Override {
		background-color: #2A2334;
		color: #b794f6;
	}

	

	</style>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Vidaloka&display=swap" rel="stylesheet">



  </head>
  <body>
   <nav class="navbar navbar-expand-lg navbar-dark" id="Override">
  <div class="container-fluid">
    <a class="navbar-brand" ><img src="IMG/Logo.JPG" class="card-img-top" alt="IMG/Logo.svg" width="100" height="150"></a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="HomeLoggedIn.php" id="Override">Home</a>
        </li>
		<li class="nav-item">
          <a class="nav-link" href="Rubric.php" id="Override">Rubric</a>
        </li>
		<li class="nav-item">
          <a class="nav-link" href="User.php" id="Override">User</a>
        </li>
		<li class="nav-item">
          <a class="nav-link" href="logout.php" id="Override">Log out</a>
        </li>
        
    </div>
  </div>
</nav>

    <!--  Bootstrap Bundle with Popper -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>
	
