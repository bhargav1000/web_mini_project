<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Logout</title>
		<link rel="stylesheet" href="home.css" type="text/css">
		<link rel="icon" href="./images/logo-5527329e306f832982eb5b10b8325a606bc2058ae61b4aa5705c8c2d4e436212.ico" type="x-image/icon">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
		<meta charset="utf-8">
	</head>
	<body>
	<center>
		<br><br><br><br>
		<h1>You have successfully logged out.</h1>
<?php
// remove all session variables
session_unset(); 

// destroy the session 
session_destroy(); 
header("Refresh: 1;URL=./index.html");
?>

	</body>
  <br><br><br><br><br><br><br>
  <br><br><br><br><br><br><br>
  <br><br><br><br><br><br><br>
	<div class="footer">
    	<footer>
    		<p><strong> Copyright© 2018.<br>Created by Bhargav Sagiraju and Aditya Subraya Hegde.</strong></p>
		</footer>
	</div>
</html>