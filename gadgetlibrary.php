<?php
if (!isset($_COOKIE["gadgetlib"]))
{
   header("Location: gadgetlibrary.php");
}

$id = $_GET['id'];

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

$sql = "SELECT * FROM user WHERE u_id='$id'";
$result = mysqli_query($link, $sql);
$person = mysqli_fetch_array($result);
$fname = $person[1];
$sql2 = "SELECT cat_id, cat_desc FROM category ORDER BY cat_id";
$result2 = mysqli_query($link, $sql2);

if ($_POST['searched'] == 1)
{
$keyword = $_POST['keyword'];
$sql3 = "SELECT cat_desc, g_name, g_desc, g_comp, g_manu, fname, lname FROM gadgetlibrary gl JOIN category c ON gl.g_cat=c.cat_id JOIN user u ON gl.user_added=u.u_id WHERE user_adding is null AND (g_name like '%$keyword%' or g_desc like '%$keyword%') ORDER BY date_added desc";
$result3 = mysqli_query($link, $sql3);
}
else
{
$sql3 = "SELECT cat_desc, g_name, g_desc, g_comp, g_manu, fname, lname FROM gadgetlibrary gl JOIN category c ON gl.g_cat=c.cat_id JOIN user u ON gl.user_added=u.u_id WHERE user_adding is null ORDER BY date_added desc";
$result3 = mysqli_query($link, $sql3);
}
?>
<html>
<head>
<title>GadgetLibrary</title>
<link rel="stylesheet" type="text/css" href="style.css">
<style>
table.t{background-color:green;}
table.c{background-color:#339999;}
table.s{background-color:blue;}
td{color:white;vertical-align:top}
th{color:white;}
#margins{margin:20px;}
</style>
<script>
function verifyaddgadget()
{
    if (document.getElementById('g_name').value == '' || document.getElementById('g_desc').value == '')
    {
       alert ('You must enter both a gadget name and description to add a gadget.');
    }
    else
    {
       document.forms['addgadget'].submit();
    }
}
</script>
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
<tr><td id="margins"><h2><font color="blue">Welcome to GadgetLibrary, <? echo $fname ?>!</font></h2></td></tr>
<br />

<center><table>
<tr>
<td id="margins">
<div style="float:left">
<form name="addgadget" method="POST" action="addgadget.php">
<table class="t" border="1">
<tr><td colspan="2"><b>Add a gadget to the library</b></td></tr>
<tr><td>Category</td><td>
<select name="g_cat">
<?
while ($resultarr = mysqli_fetch_array($result2))
{
 $catid = $resultarr[0];
 $desc = $resultarr[1];
 echo "<option value=$catid>$desc</option>";
}
?>
</select></td></tr>
<tr><td>Name</td><td><input id="g_name" type="text" name="g_name" /></td></tr>
<tr><td>Manufacturer(s)</td><td><input id="g_manu" type="text" name="g_manu" /></td></tr>
<tr><td>Component(s)</td><td><input id="g_comp" type="text" name="g_comp" /></td</tr>
<tr><td>Description</td><td><textarea name="g_desc" id="g_desc" cols="20" rows="5"></textarea></td></tr>
<input type="hidden" value=<? echo $id; ?> name="id" id="id" />
<tr><td colspan="2"><center><input type="button" value="Add Gadget" onclick="verifyaddgadget()" /></center></td></tr>
</table>
</form>
</div>
</td>
<td>
<div style="float:right">
<form action="gs_result.php" method="get" name="search">
<table cellpadding="0" cellspacing="0" border="1" class="s">
   <tr><td colspan="2"><b>Search by Name or Description</b></td></tr>
   <tr>
      <td>Name</td><td><input type="text" name="g_name" id="g_name" /></td>
   </tr>
   <tr>
      <td>Description</td><td><input type="text" name="g_desc" id="g_desc" /></td>
   </tr>
   <tr>
      <td colspan="2"><center><input type="submit" value="Search"></center></td>
   </tr>
</table>
</form>
</div>
</td>
</tr>
<tr>
<td colspan="2" id="margins">
<table cellpadding="0" cellspacing="0" border="1" width="794" class="c">
<tr><td colspan="6"><strong>Gadgets in the Library</strong></td></tr>
<tr><th><strong>Category</strong></th><th><strong>Name</strong></th><th><strong>Manufacturer(s)</strong></th><th><strong>Component(s)</strong></th><th><strong>Description</strong></th><th><strong>Added By</strong></th></tr>
<?
while ($resultarr2 = mysqli_fetch_array($result3))
{
  echo "<tr>";
  echo "<td>$resultarr2[0]</td><td>$resultarr2[1]</td><td>$resultarr2[4]</td><td>$resultarr2[3]</td><td>$resultarr2[2]</td><td>$resultarr2[5] $resultarr2[6]</td>";
  echo "</tr>";
}
?>
</table>
</td>
</tr>
<table width="806">
  <tr>
    <td colspan="5" class="footer">Copyright &copy; 2010, GadgetLibrary. All rights reserved.<br />
			Created by Marvin Rusinek for Advanced PHP with MySQL course within the Advanced Web Development Intensive at NYU.<br />
<a href='javascript: history.go(-1)'>Back to previous page</a> | <a href="logout.php">Logout</a>
	</td>
  </tr>
</table>
</table>
</body>
</html>