<html>
<body>
<?php
// define variables and set to empty values
$name = $email = $gender = $comment = $website = "";


  $dept = test_input($_POST["department"]);
  $topic = test_input($_POST["topic"]);
  $person = test_input($_POST["person"]);
  $description = test_input($_POST["description"]);


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
echo "Department: ".$description;
echo "Talk On: ".$topic;
echo "Resource Person: ".$person;
echo "Phone: ".$phone;

?>
</body>
</html>