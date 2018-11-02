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

		<script type="text/javascript">
			function myFunction() {
    			var x = document.getElementById("passcheck");
    			if (x.type === "password") {
        			x.type = "text";
    			} else {
        			x.type = "password";
    			}
			}
		</script>
	</head>
	<body>
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<?php
			$debug=1;
			error_reporting(0);
			#if($debug==1)
			if($_SESSION["passw"]=="password_checked")
			{
				$location="window.location.href='login.php'";
				echo "<center>";
				echo "<br><br><br><br><br><br><br>";
				echo "<h1>You are already logged in<br>(No point in logging you again is there?)</h1>";
				header("Refresh: 1.5;URL=./dashboard.html");
				echo "</center>";
			}
			else if($_SESSION["user"]=="user_found")
			{ 
				echo "<center>";
				echo "<br><br><br><br><br><br><br>";
				echo "<h1>Username found.<br>Enter password</h1><br>";
				echo '<input type="password" name="passcheck" id="passcheck" placeholder="password"><br><br>';
				echo '<input type="submit" id="submit">';
				$id = isset($_POST['passcheck']) ? $_POST['passcheck'] : '';
				#echo $id;
				echo "</center>";
					$servername='localhost';
					$username="root";
					$password="pass";
					$dbname="iti";
					$a=[];

					$conn=mysqli_connect($servername,$username,$password,$dbname);
					if($conn->connect_error)
						die("Connection failed: ".$conn->connect_error);
					$userverified=$_SESSION["uservar"];
					$sql="SELECT password FROM `user` WHERE username='$userverified'";
					$result=$conn->query($sql);
					if ($result->num_rows > 0)
					{
						while($res=$result->fetch_assoc())
						{
							$verify=$res['password'];
						}
						if($verify==$id)
						{
							echo "TRUE";
							$_SESSION["passw"] = "password_checked";
							header('Location: ./dashboard.html');
						}
						else
						{
							
						}
					}
			}
			else
			{
				echo "<center>";
				echo "<br><br><br><br><br><br><br>";
				echo "<h1>You must be logged in to continue</h1>";
				echo "</center>";
				header("Refresh: 5;URL=./login.php");
			}
		?>
		</form>		
	</body>
</html>