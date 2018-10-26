<html>
	<body>
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<?php
		$debug1=1;
			if($debug1=1)
			{ 
				echo "<center>";
				echo "<br><br><br><br><br><br><br>";
				echo "<h1>Username found.<br>Enter password</h1><br>";
				echo '<input type="text" name="passcheck1" placeholder="password">';
				echo '<input type="submit" id="submit">';
				#$id = isset($_POST['passcheck']) ? $_POST['passcheck'] : '';
				echo "</center>";
					$servername='localhost';
					$username="root";
					$password="pass";
					$dbname="iti";
					$a=[];

					$conn=mysqli_connect($servername,$username,$password,$dbname);
					if($conn->connect_error)
						die("Connection failed: ".$conn->connect_error);
					$id="user";
					$sql="SELECT password FROM `user` WHERE username='$id'";
					$result=$conn->query($sql);
					if ($result->num_rows > 0)
					{
						while($res=$result->fetch_assoc())
						{
							$verify=$res['password'];
						}
						echo $verify."<br>";
						$userpassword=$_POST["passcheck1"];
						echo $userpassword;
						if($verify===$userpassword)
						{
							echo "true";
						}
						/*
						if($verify==$id)
						{
							$_SESSION["passw"] = "password_checked";
							#header('Location: ./dashboard.html');
						}

						else
						{
							echo "<h1>Enter again</h1>";
						}
						*/
					}
			}
			else
			{
				echo "<center>";
				echo "<br><br><br><br><br><br><br>";
				echo "<h1>You must be logged in to continue</h1>";
				echo "</center>";
				header('Location: ./login.html');
			}
		?>
		</form>		
	</body>
</html>