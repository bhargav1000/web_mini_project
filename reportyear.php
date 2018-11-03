<?php
// Start the session
session_start();
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Select Year</title>
		<link rel="stylesheet" href="home.css" type="text/css">
		<link rel="icon" href="./images/logo-5527329e306f832982eb5b10b8325a606bc2058ae61b4aa5705c8c2d4e436212.ico" type="x-image/icon">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
		<meta charset="utf-8">
	</head>
	<body>
		<center>
			<br><br><br><br><br><br>
			<form method="post" action="report.php">
				<h1>Select Year</h1>
		<?php
		$servername='localhost';
		$username="root";
		$password="pass";
		$dbname="iti";
		$a=[];
		error_reporting(0);
		if($_SESSION["passw"]!="password_checked")
		{
			error_reporting(0);
			header("Location: login.php");
			$login_check=1;
		}

		if($_SESSION["yearselect"]=="no_year")
		{
			echo "<h1>No report found. Enter again.</h1>";
			$_SESSION["yearselect"]="";
		}
		?>
				<br>
				<input type="text" name="searchitem" placeholder="Search" autocomplete="off"><br>
				<br>
				<input type="submit" id="save">
			</form>
			<br><br>
			<a href='dashboard.html'>Click here to back to the Dashboard</a>
		</center>
	</body>
	<br><br><br><br><br>
	<br><br><br><br><br>
	<br><br>
		<div class="footer">
    		<footer>
    			<p><strong> Copyright© 2018.<br>Created by Bhargav Sagiraju and Aditya Subraya Hegde.</strong></p>
			</footer>
		</div>
</html>