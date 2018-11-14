<?php
include 'include/db.inc.php';

$firstname = mysqli_real_escape_string($link, $_POST['fname']);
$lastname = mysqli_real_escape_string($link, $_POST['lname']);
$email = mysqli_real_escape_string($link, $_POST['email']);
$password = mysqli_real_escape_string($link, $_POST['pass']);
$telnumber = mysqli_real_escape_string($link, $_POST['phone']);
$city = mysqli_real_escape_string($link, $_POST['city']);
$state = mysqli_real_escape_string($link, $_POST['state']);
$country = mysqli_real_escape_string($link, $_POST['country']);

$link = mysqli_connect('localhost', 'root', '');
if (!$link){
	$output = "Unable to connect to the database" . mysqli_error();
	echo $output; 
	exit(); 
}

if (!mysqli_select_db($link, 'rusinek')){
	$output = "Unable to locate the database" . mysqli_error();
	echo $output; 
	exit();
}

$sql2 = "SELECT email FROM user WHERE email=$email";
$result2 = mysqli_query($link, $sql2);
if (mysqli_num_rows($result2) > 0)
{
?>
<script>
	alert("There is already an account with that email address.");
	window.location="index.php";
</script>
<?
  
}
else
{
$sql = "INSERT INTO user VALUES(default, '$firstname', '$lastname', '$email', SHA1('$password'), '$telnumber', '$city', '$state', '$country')";
$result = mysqli_query($link, $sql);    

if (!$result) {
	$error = "Query failed: " . mysqli_error();
	echo $error;
	exit();
}

header('Location: index.php');
}
?>