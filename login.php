<?php
// Start the session
session_start();
?>
<!DOCTYPE HTML>
<html>
	<body>
	<center>
		<br><br><br><br><br><br><br>
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			<?php
				error_reporting(0);
				if($_SESSION["user"] == "user_found")
				{
					$location="window.location.href='login.php'";
					echo "<center>";
					echo "<br><br><br><br><br><br><br>";
					echo "<h1>You are already logged in<br>(No point in logging you again is there)</h1>";
					echo "<a href='./dashboard.html' onclick=$location>Click here to go to the Dashboard</a>";
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
						echo "<h1>Wrong username enter again.</h1>";
						header('Location: ./login.html');
					}	
					$conn->close();
				}
			?>
			</form>
		</center>
	</body>
</html>