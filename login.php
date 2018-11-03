<?php
// Start the session
session_start();
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Login</title>
		<link rel="stylesheet" href="home.css" type="text/css">
		<link rel="icon" href="./images/logo-5527329e306f832982eb5b10b8325a606bc2058ae61b4aa5705c8c2d4e436212.ico" type="x-image/icon">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
		<meta charset="utf-8">
	</head>
	<body>
	<center>
		<br><br><br><br><br><br><br>
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			<?php
				error_reporting(0);
				if($_SESSION["passw"]=="password_checked")
				{
					echo "<center>";
					echo "<br><br><br><br><br><br><br>";
					echo "<h1>You are already logged in<br>(No point in logging you again is there?)</h1>";
					header("Refresh: 1;URL=./dashboard.html");
					echo "</center>";
				}
				if($_SESSION["user"] == "user_found")
				{
					$location="window.location.href='login.php'";
					echo "<center>";
					echo "<br><br><br><br><br><br><br>";
					#echo "<h1>You are already logged in<br>(No point in logging you again is there?)</h1>";
					header("Location: ./password.php");
					echo "</center>";
				}		
				else
				{
					$servername='localhost';
					$username="root";
					$password="pass";
					$dbname="iti";
					$a=[];

					$conn=mysqli_connect($servername,$username,$password,$dbname);
					if($conn->connect_error)
						die("Connection failed: ".$conn->connect_error);

					$user=$_POST['username'];
					$user="userverified@".$user;
					$sql="SELECT * FROM `user` WHERE username LIKE '$user'";
					$result=$conn->query($sql);
					if ($result->num_rows > 0)
					{
						echo "<br><br><br><br><br><br><br>";
						echo "<h1>Username found.<br>Redirecting</h1>";
						$_SESSION["user"] = "user_found";
						$_SESSION["uservar"]=$user;
						header("Refresh: 1;URL=./password.php");
					}	
					else
					{	
						echo "<br><br><br><br><br><br><br>";
						header('Location: ./login.html');
					}	
					$conn->close();
				}
			?>
			</form>
		</center>
	</body>
	  <br><br><br><br><br><br><br><br>
	<div class="footer">
    	<footer>
    		<p><strong> Copyright© 2018.<br>Created by Bhargav Sagiraju and Aditya Subraya Hegde.</strong></p>
		</footer>
	</div>
</html>