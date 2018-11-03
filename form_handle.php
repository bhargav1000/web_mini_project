<?php
// Start the session
session_start();
?>
<html>
	<body>
	<?php
	$dept=$_POST['department'];
	$topic=$_POST['topic'];
	$person=$_POST['person'];
	$person_loc=$_POST['person_location'];
	$phone=$_POST['phone'];
	$dateof=date('d-m-Y', strtotime($_POST['dateof']));
	#echo $dateof."<br>";
	$emailof=$_POST['emailof'];
	$audience=$_POST['audience'];
	$year=$_POST['year'];
	$desc=$_POST['desc'];
	$posc=$_POST['posc'];
	$cosc=$_POST['cosc'];
	$yearof=$dateof[6].$dateof[7].$dateof[8].$dateof[9];

	$login_check=0;
	if($_SESSION["passw"]!="password_checked")
	{
		error_reporting(0);
		header("Location: login.php");
		$login_check=1;
	}
$servername='localhost';
$username="root";
$password="pass";
$dbname="iti";
$a=[];

$conn=mysqli_connect($servername,$username,$password,$dbname);
if($conn->connect_error)
	die("Connection failed: ".$conn->connect_error);
	error_reporting(0);

$sql="SELECT MAX(speaker_id) FROM `resource_person`";
$result=$conn->query($sql);
if ($result->num_rows > 0)
{
	while($row=$result->fetch_assoc())
	{
		$n=$row["MAX(speaker_id)"]."<br>";
		
	}
	$speaker_id=$n+1;
}

else
{
	echo "Table is empty";
}

$sql="INSERT INTO `event`(speaker_id, name, email, phone, dept) VALUES ('$speaker_id','$person','$emailof','$phone','$dept')";
if ($conn->query($sql) === TRUE && $login_check==0) {
    echo "New record in events table created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql="INSERT INTO `resource_person`(speaker_id, target_audience, year, talk_on, brief_description, posc, cosc, speaker_location, dateof, yearof) VALUES ('$speaker_id','$audience','$year','$topic','$desc','$posc', '$cosc', '$person_loc', '$dateof', '$yearof')";
if ($conn->query($sql) === TRUE && $login_check==0) {
    echo "New record in resource_person table created successfully";
    header("Location: dashboard.html");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
	?>
	</body>
</html>	