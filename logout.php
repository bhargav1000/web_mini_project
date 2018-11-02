<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>
<center>
	<br><br><br><br>
	<h1>You have successfully logged out.</h1>
<?php
// remove all session variables
session_unset(); 

// destroy the session 
session_destroy(); 
header("Refresh: 1;URL=./index.html");
?>

</body>
</html>