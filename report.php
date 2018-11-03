<?php
// Start the session
session_start();
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Report</title>
		<link rel="stylesheet" href="report.css" type="text/css">
		<link rel="icon" href="./images/logo-5527329e306f832982eb5b10b8325a606bc2058ae61b4aa5705c8c2d4e436212.ico" type="x-image/icon">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
		<meta charset="utf-8">
	</head>
	<body>
		<center>
		<?php
			if($_SESSION["passw"]!="password_checked")
			{
				error_reporting(0);
				header("Location: login.php");
			}
			echo "<h1>Year Selected</h1>";
			$searchyear=$_POST["searchitem"];
			echo "<h1>".$searchyear."</h1><br>";
			$servername='localhost';
			$username="root";
			$password="pass";
			$dbname="iti";
			$a=[];
			$b=[];
			$conn=mysqli_connect($servername,$username,$password,$dbname);
			if($conn->connect_error)
				die("Connection failed: ".$conn->connect_error);
			error_reporting(0);

			$sql="SELECT speaker_id FROM `resource_person` WHERE yearof='$searchyear'";
			$result=$conn->query($sql);
			if ($result->num_rows > 0)
			{
				while($row=$result->fetch_assoc())
				{
					array_push($a, $row["speaker_id"]);
				}
				$n=count($a);
			}
			else
			{
				echo "<h1>Table is empty</h1>";
				header("Location: reportyear.php");
				$_SESSION["yearselect"]="no_year";
			}

			for($i=0;$i<$n;$i++)
			{
				$sql="SELECT * FROM `event` a,`resource_person` b WHERE a.speaker_id=b.speaker_id AND a.speaker_id='$a[$i]'";
				$result=$conn->query($sql);
				if ($result->num_rows > 0)
				{
					while($row=$result->fetch_assoc())
					{
						$spid=$row["speaker_id"];
						$name=$row["name"];
						$email=$row["email"];
						$phone=$row["phone"];
						$dept=$row["dept"];
						$ta=$row["target_audience"];
						$year=$row["year"];
						$to=$row["talk_on"];
						$bd=$row["brief_description"];
						$posc=$row["posc"];
						$cosc=$row["cosc"];
						$sl=$row["speaker_location"];
						$do=$row["dateof"];
					}					
				}
				if($year=='0')
				{
					$year="Teachers Only";
				}
				else
				{
					if($year=='1')
						$year=$year."st year students";
					if($year=='2')
						$year=$year."nd year students";
					if($year=='3')
						$year=$year."rd year students";
					if($year=='4')
						$year=$year."th year students";
				}
				echo '<table>';
				echo '<tr><th colspan="2">'.$to.'</th></tr>';
				echo '<tr><td>Department: <br>'.strtoupper($dept).'</td>';
				echo '<td>Date: '.$do.'</td></tr>';
				echo "<tr><td>Speaker</td>"."<td>".$name."</td></tr>";
				echo "<tr><td>Email</td>"."<td>".$email."</td></tr>";
				echo "<tr><td>Phone number</td>"."<td>".$phone."</td></tr>";
				echo "<tr><td>Speaker From</td>"."<td>".$sl."</td></tr>";
				echo "<tr><td>Audience</td>"."<td>".$ta."</td></tr>";
				echo "<tr><td>Batch year</td>"."<td>".$year."</td></tr>";
				echo "<tr><td>Brief Description</td>"."<td>".$bd."</td></tr>";
				echo "<tr><td>Programme Outcomes</td>"."<td>".$posc."</td></tr>";
				echo "<tr><td>Course Outcomes</td>"."<td>".$cosc."</td></tr>";
				echo "</table>";
				echo "<br><br><br><br>";
			}
			
		?>
		<a href='dashboard.html'>Click here to back to the Dashboard</a>
		</center>
	</body>
	<br><br><br><br><br>
	<br><br><br><br><br>
		<div class="footer">
    		<footer>
    			<p><strong> Copyright© 2018.<br>Created by Bhargav Sagiraju and Aditya Subraya Hegde.</strong></p>
			</footer>
		</div>
</html>