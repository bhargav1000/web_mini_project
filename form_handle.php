<html>
	<body>
	<?php
	$dept=$_POST['department'];
	$topic=$_POST['topic'];
	$person=$_POST['person'];
	$phone=$_POST['phone'];
	$dateof=date('d-m-Y', strtotime($_POST['dateof']));
	#echo $dateof."<br>";
	$emailof=$_POST['emailof'];
	$audience=$_POST['audience'];
	$year=$_POST['year'];
	$desc=$_POST['desc'];
	$posc=$_POST['posc'];
	$cosc=$_POST['cosc'];

$servername='localhost';
$username="root";
$password="pass";
$dbname="iti";
$a=[];

$conn=mysqli_connect($servername,$username,$password,$dbname);
if($conn->connect_error)
	die("Connection failed: ".$conn->connect_error);

$sql="SELECT * FROM `event`";
$result=$conn->query($sql);
$speaker_id=0;
if ($result->num_rows > 0)
{
	while($row=$result->fetch_assoc())
	{
		array_push($a,$row['speaker_id']);
	}

	$n=count($a);
	$speaker_id=$n+1;
}

$sql="INSERT INTO `event`(speaker_id, name, email, phone, dept) VALUES ('$speaker_id','$person','$emailof','$phone','$dept')";
if ($conn->query($sql) === TRUE) {
    echo "New record in events table created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql="INSERT INTO `resource_person`(speaker_id, target_audience, year, talk_on, brief_description, posc, cosc) VALUES ('$speaker_id','$audience','$year','$topic','$desc','$posc', '$cosc')";
if ($conn->query($sql) === TRUE) {
    echo "New record in resource_person table created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
	?>
	</body>
</html>	