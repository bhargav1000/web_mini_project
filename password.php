<?php
// Start the session
session_start();
?>
<!DOCTYPE HTML>
<html>
	<body>
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<?php
			$debug=1;
			if($debug==1)
			#if($_SESSION["user"]==="user_found")
			{ 
				echo "<center>";
				echo "<br><br><br><br><br><br><br>";
				echo "<h1>Username found.<br>Enter password</h1><br>";
				echo '<input type="text" name="passcheck" id="passcheck" placeholder="password">';
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