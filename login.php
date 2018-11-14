<?php

include 'include/db.inc.php';

$replacestrings=array("<",">","'");
$email="'".str_replace($replacestrings,"",$_POST['em_login'])."'";
$pass="'".str_replace($replacestrings,"",$_POST['pwd_login'])."'";

$link = mysqli_connect('localhost', 'rusinek', 'rusinek');
if (!$link) {
	$error = "Could not connect to server: " . mysqli_error();
	echo $error;
	exit();
}

$db = mysqli_select_db($link, 'rusinek');
if (!$db) {
	$error = "Could not connect to database: " . mysqli_error();
	echo $error;
	exit();
}

//$email = mysqli_real_escape_string($link, $_POST['em_login']);
//$password = mysqli_real_escape_string($link, $_POST['pwd_login']);
//Scramble $_POST['password'] using md5 function
//Dummy characters are ijdb
//$password = SHA1($_POST['pass']);

$sql = "SELECT u_id FROM user WHERE email=$email and pass=SHA1($pass)";
$result = mysqli_query($link, $sql);
if (mysqli_num_rows($result)==1)
{
   $session=SHA1(rand());
   setcookie("gadgetlib",$session,0);
   $id=mysqli_fetch_array($result);
   header("Location: gadgetlibrary.php?id=$id[0]");
}
else
{
   header('Location: retrylogin.php');
}  
?>