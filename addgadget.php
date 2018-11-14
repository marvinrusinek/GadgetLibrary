<?php
if (!isset($_COOKIE["gadgetlib"]))
{
   header("Location: gadgetlibrary.php");
}

//$id = $_POST['id'];
//$category = $_POST['category'];
$replacestrings = array("<", ">");
$id = str_replace($replacestrings, "", $_POST['id']);
$id = str_replace("'", "\'", $id);
$g_name = str_replace($replacestrings, "", $_POST['g_name']);
$g_name = str_replace("'", "\'", $g_name);
$g_desc = str_replace($replacestrings, "", $_POST['g_desc']);
$g_desc = str_replace("'", "\'", $g_desc);
$g_comp = str_replace($replacestrings, "", $_POST['g_comp']);
$g_comp = str_replace("'", "\'", $g_comp);
$g_manu = str_replace($replacestrings, "", $_POST['g_manu']);
$g_manu = str_replace("'", "\'", $g_manu);
$g_cat = str_replace($replacestrings, "", $_POST['g_cat']);
$g_cat = str_replace("'", "\'", $g_cat);

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

$sql = "INSERT INTO gadgetlibrary VALUES (default, '$g_name', '$g_desc', '$g_comp', '$g_manu', '$g_cat', default, '$id', null)";
$result = mysqli_query($link, $sql);
if (!$result) {
	$error = "Query error: " . mysqli_error();
	echo $error;
	exit();
}
header("Location: gadgetlibrary.php?id=$id");
?>