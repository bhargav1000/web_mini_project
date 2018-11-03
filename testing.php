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
		<style>
			table, td, tr
			{
				border: 1px solid black;
				width: 33%;
				text-align: left;
				border-collapse: collapse;
				background-color: white;
			}
			table { margin: auto; }
		</style>
		<center>
		<?php
			echo "<h1>Year Selected</h1>";
			$searchyear=1996;
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
					#echo "<h1>".$row["speaker_id"]."</h1><br>";
					array_push($a, $row["speaker_id"]);
				}
				$n=count($a);
			}
			else
			{
				echo "<h1>Table is empty</h1>";
				#header("Location: reportyear.php");
				#$_SESSION["yearselect"]="no_year";
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
				echo "<table>";
				echo "<tr>";
				echo "<td>".$name."</td>";
				echo "<td>".$email."</td>";
				echo "<td>".$phone."</td>";
				echo "<td>".strtoupper($dept)."</td>";
				echo "</tr>";
				echo "<tr>";
				echo "<td>".$ta."</td>";
				echo "<td>".$year."</td>";
				echo "<td>".$to."</td>";
				echo "<td>".$bd."</td>";
				echo "</tr>";
				echo "<tr>";
				echo "<td>".$posc."</td>";
				echo "<td>".$cosc."</td>";
				echo "<td>".$sl."</td>";
				echo "<td>".$do."</td>";
				echo "</tr>";
				echo "</table>";
				echo "<br><br><br><br><br>";
			}
				/*
				$m=count($b);
				for($j=0;$j<$m;$j++)
				{	
					echo "Array no: ".$j."<br>";
					echo b[$j]."<br>";
					echo b[$j]."<br>";
					echo b[$j]."<br>";
					echo b[$j]."<br>";
					echo b[$j]."<br>";
					echo b[$j]."<br>";
					echo b[$j]."<br>";
					echo b[$j]."<br>";
					echo b[$j]."<br>";
					echo b[$j]."<br>";
					echo b[$j]."<br>";
					echo b[$j]."<br>";
					echo b[$j]."<br>";
					echo "<br><br><br><br>";
				}*/
			#}
		$conn->close();	
		?>
		</center>
	</body>
</html>