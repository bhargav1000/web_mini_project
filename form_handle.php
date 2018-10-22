<html>
	<body>
	<?php
	echo "<h1>You have entered:</h1><br>";
	echo $_POST['department']."<br>";
	echo $_POST['topic']."<br>";
	echo $_POST['person']."<br>";
	echo $_POST['phone']."<br>";
	$dateof=date('d-m-Y', strtotime($_POST['dateof']));
	echo $dateof."<br>";
	echo $_POST['emailof']."<br>";
	echo $_POST['audience']."<br>";
	echo $_POST['year']."<br>";
	echo $_POST['desc']."<br>";
	echo $_POST['posc']."<br>";
	echo $_POST['cosc']."<br>";
	?>
	</body>
</html>	