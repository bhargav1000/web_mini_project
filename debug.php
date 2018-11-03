<!DOCTYPE HTML>
<html>
<body>
<?php
$servername='localhost';
$username="root";
$password="pass";
$dbname="iti";
$a=[];

$conn=mysqli_connect($servername,$username,$password,$dbname);
if($conn->connect_error)
	die("Connection failed: ".$conn->connect_error);

$sql="SELECT password FROM `user` WHERE username='user'";
$result=$conn->query($sql);
while($res=$result->fetch_assoc())
{
	echo $res['password'];
}

$sql="SELECT * FROM `event`";
$result=$conn->query($sql);
/*
if ($result->num_rows > 0)
{
	while($row=$result->fetch_assoc())
	{
		echo $row["speaker_id"]."<br>";
		echo $row["name"]."<br>";
		echo $row["email"]."<br>";
		echo $row["phone"]."<br>";
		echo $row["dept"]."<br>";
		array_push($a,$row['speaker_id']);
	}

	$n=count($a);
	echo "Speaker Ids: ".$n."<br>";
}

else
{
	echo "Table is empty";
}
*/




$sql="SELECT MAX(speaker_id) FROM `resource_person`";
$result=$conn->query($sql);
if ($result->num_rows > 0)
{
	while($row=$result->fetch_assoc())
	{
		echo $row["MAX(speaker_id)"]."<br>";
		
	}

	#$n=count($a);
	#echo "Speaker Ids: ".$n."<br>";
}

else
{
	echo "Table is empty";
}

$conn->close();
?>
</body>
</html>