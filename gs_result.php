<html>
<head><title>GadgetLibrary Search Results</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<table width="800" cellpadding="0" cellspacing="0">
  <tr>
    <td height="22" colspan="4" class="link"><img src="images/logo.jpg" alt="GadgetLibrary Logo" width="800" height="200" /></td>
  </tr>
  <tr>
    <td class="link"><a href="index.php">Home</a></td>
    <td class="link"><a href="about.php">About Us</a></td>
    <td class="link"><a href="gadget.php">Gadget</a></td>
    <td class="link"><a href="search.php">Search</a></td>
  </tr>
</table>
<?php

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

$fields="SELECT cat_desc, g_name, g_desc, g_comp, g_manu ";
$table="FROM gadgetlibrary gl JOIN category c ON gl.g_cat=c.cat_id ";
$where="where 1=1";

$g_name=$_GET['g_name'];
$g_desc=$_GET['g_desc'];

if ($g_name != '') {
	$where .= " and g_name LIKE '%$g_name%'";
}

if ($g_desc != '') {
	$where .= " AND g_desc LIKE '%$g_desc%'";
}

$sql=$fields.$table.$where;
$result = mysqli_query($link, $sql);

if (!$result) { 
	$error = 'Error fetching data: ' . mysqli_error($link);
	echo $error; 
	exit();
}

echo "<table border='1' width='806'>"; 
echo "<tr><td colspan='5'><center><h2>Gadget Search Results</h2></center></td></tr>";
echo "<tr><th>Category</th><th>Name</th><th>Description</th><th>Component(s)</th><th>Manufacturer(s)</th></tr>";
while($recording=mysqli_fetch_array($result)){
	echo "<tr>";
	echo "<td>$recording[0]</td><td>$recording[1]</td><td>$recording[2]</td><td>$recording[3]</td><td>$recording[4]</td>";
	echo "</tr>";
}
echo "</table>"; 
?>
<table width="806">
  <tr>
    <td colspan="5" class="footer">Copyright &copy; 2010, GadgetLibrary. All rights reserved.<br />
			Created by Marvin Rusinek for Advanced PHP with MySQL course within the Advanced Web Development Intensive at NYU.<br />
<a href='javascript: history.go(-1)'>Back to previous page</a> | <a href="logout.php">Logout</a>
	</td>
  </tr>
</table>
</body>
</html>