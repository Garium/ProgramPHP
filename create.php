<?php
# Include HTML and navigation 
include 'includes/nav.php';

?>
<div class="container">
  <div class="row">
    <div class="col">
	<!--  The form sends data via POST to register.php.-->
	<div class="card">
	  <div class="card-header">
		Add Movie
	  </div>
	
	 <div class="card-body">
	 
	   <form action="create_now.php" method="POST">
		<div class="row">
		 <div class="col-6">
		   
		   <input type="text"  class="form-control" name="title" placeholder="Movie Title" required><br><br>
		</div>
		
		<div class="col-6">
			
			<input type="text" class="form-control" name="poster_url" placeholder="Poster URL"required><br><br>
		</div>
		</div>
	
		<div class="row">
		  <div class="col-6">
			
			<input type="text" class="form-control" name="trailer" placeholder="Trailer"required><br><br>
		</div>
		<div class="col-6">
			
			<textarea type="text" rows="6" class="form-control" name="description" placeholder="Movie Description"required></textarea>
		<br>
		</div>
		
		</div>
		
		<div class="row">
		<div class="col-6">
			
			<input type="time" class="form-control"  name="showtime" placeholder="Showtime"required><br><br>
		</div>
		<div class="col-6">
			
			<input type="text" class="form-control" name="year" placeholder="year" required><br><br>
		</div>
		</div>
		<div class="row">
		<div class="col-6">
			<select class="form-select" name="certification" id="certification"aria-label="Default select example">
				<option selected>Select Certification</option>
				<option value="U">U</option>
				<option value="PG">PG</option>
				<option value="12A">12A</option>
				<option value="12">12</option>
				<option value="15">15</option>
				<option value="18">18</option>
			</select>
			<br>
			<!--<input type="text" class="form-control" name="certification" placeholder="Cerification"required><br><br>-->
		</div>
		<div class="col-6">
			<select class="form-select" name="category" id="category"aria-label="Default select example">
			<option selected>Select Category</option>
			<option value="Now Showing">Now Showing</option>
			<option value="Coming Soon">Coming Soon</option>
			
		</select>
		<br>
			<!--<input type="text" class="form-control" name="category" placeholder="Category" required><br><br>-->
		</div>
		</div>
		<div class="row">
			
			  <button type="submit"  class="btn btn-dark btn-block">Submit</button>
			
		</div>
		</form>
	</div>
</div>



