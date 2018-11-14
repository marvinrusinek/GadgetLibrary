<html>
<head><title>GadgetLibrary Search</title>
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
<tr><td colspan="5">
<?php
include 'include/db.inc.php'; 

$sql = "SELECT cat_desc, g_name, g_comp, g_manu, DATE_FORMAT(date_added, '%b %e %Y') FROM gadgetlibrary gl JOIN category c on gl.g_cat=c.cat_id ORDER BY date_added desc"; 
$result = mysqli_query($link, $sql);

if (!$result) { 
	$error = 'Error fetching data: ' . mysqli_error($link);
	echo $error; 
	exit();
}

if (mysqli_num_rows($result) > 0) {

echo "<center><br /><h2>Gadgets in the Database</h2>";
echo "<table style='border-color:#999999' border-style='double' border='1'>"; 
echo "<tr><th>Category</th><th>Name</th><th>Component(s)</th><th>Manufacturer(s)</th><th>Date Added<th></tr>";
while($recording=mysqli_fetch_array($result)){
	echo "<tr>";
	for ($i = 0; $i <= 4; $i++)
	{
		echo "<td>$recording[$i]</td>";
	}
	echo "</tr>";
}
echo "</table></center>";
} else {
echo "<center>There are currently no gadgets in the gadget library. Please come back later.</center>";
}
?>
</td></tr>
</table>
<table width="805">
  <tr>
    <td colspan="5" class="footer">Copyright &copy; 2010, GadgetLibrary. All rights reserved.<br />
			Created by Marvin Rusinek for Advanced PHP with MySQL course within the Advanced Web Development Intensive at NYU.<br />
<a href='javascript: history.go(-1)'>Back to previous page</a></td></tr>
</table>
</body>
</html>