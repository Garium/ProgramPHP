<?php # CONNECT TO MySQL DATABASE.

# Connect  on 'localhost' for userto database 'site_db'.
$link = mysqli_connect('localhost','root','','gradedunit'); 
if (!$link) { 
# Otherwise fail gracefully and explain the error. 
	die('Could not connect to MySQL: ' . mysqli_error()); 
} 
#echo 'Connection OK';  