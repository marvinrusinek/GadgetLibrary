<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Library Admin Page</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<script text="text/javascript">
function rotateGadgetImage(imageNumber) {
   var gi = document.getElementById('gadget_image');
   gi.src = "images/gadget_rotate/" + imageNumber + ".jpg";
}
function login_info() {
   if (document.getElementById('em_login').value == '' || document.getElementById('pwd_login').value == '')
   {
       alert ('Please fill in both fields.');
   }
   else
   {
       document.forms['loginform'].submit();
   }
}
</script>
<body>
<table width="800" cellpadding="0" cellspacing="0">

  <tr>
    <td height="22" colspan="4" class="link"><img src="images/logo.jpg" alt="GadgetLibrary Logo" width="800" height="200" /></td>
  </tr>
  <tr>
    <td class="link">Home</td>
    <td class="link"><a href="about.php">About Us</a></td>
    <td class="link"><a href="gadget.php">Gadget</a></td>
    <td class="link"><a href="search.php">Search</a></td>
  </tr>

  <tr>
    <td height="63" colspan="4">
<div id="wrap">
    <div id="content">

<div class="aboutnews">
<div class="box"><center>
About GadgetLibrary
</center>
<div class="about">
<p>As consumers, we have taken for granted the onslaught of gadgetry that we acquire without considering where it comes from, how and by whom it's made.  In a global marketplace, the things we buy are no longer produced locally. Therefore it has never been more necessary to be aware of objects that we purchase and of the environmental and human rights ramifications.</p>
<p><em>GadgetLibrary</em> will serve such a need, with a simple, user-friendly interface that lets users add, remove, and update information about gadgets.  With the complete system, the user will be able to select among a growing list of consumer items such as iPods, cellphones, e-readers, and GPS devices.  By clicking on each tech item, the user will be shown an explanation of how, where, with what materials, and by whom the object is made and designed.  The user will also be able to follow on interactive maps where the items are designed, produced, shipped, as well as where the original materials are mined, and the e-waste which is produced.  The user will be able to literally <em>follow</em> the supply chain from start to finish.  The user will be able to also find information on the technology and mining corporations with mapping and RSS news feeds.  The library will function as an expanding, dynamic database as new information is gathered and new consumer items are added.</p>
</div></div>
<div class="box2"><center>Featured Gadgets</center>
<center><img id="gadget_image" src="images/gadget_rotate/1.jpg" height="175" width="125" border="0" />
	<div id="g_nav">
		<a href="#" onClick="rotateGadgetImage(1);">1</a>
		<a href="#" onClick="rotateGadgetImage(2);">2</a>
		<a href="#" onClick="rotateGadgetImage(3);">3</a>
		<a href="#" onClick="rotateGadgetImage(4);">4</a>
		<a href="#" onClick="rotateGadgetImage(5);">5</a>
	</div>
</center>
</div>

<div class="box2"><center>Existing User</center><br />
<form name="loginform" action="login.php" method="POST">
<fieldset><legend>User Login</legend>
<table>
                <tr>
                    <td><div align="right">Email</div></td>
                    <td>&nbsp;</td>
                    <td><input type="text" id="em_login" name="em_login" /></td>
                </tr>
                <tr>
                    <td><div align="right">Password</div></td>
                    <td>&nbsp;</td>
                    <td><input type="text" id="pwd_login" name="pwd_login" /></td>
               </tr>
               <tr>
                    <td colspan="3">
                        <input type="submit" value="Log in" onclick="login_info()" />
                    </td>
                </tr>
<tr><td colspan="3"><a href="registration.html">New User? Create an account here.</a></td></tr>
            </table>
</fieldset>
</form>

</div>
    </div>    </td>
  </tr>
<tr><td colspan="5">
<?php
//include 'include/db.inc.php';
$link = mysqli_connect('my03.winhost.com', 'marvinru', 'aspnet821', 'mysql_52428_wpthemetest');
//echo $output;
$sql = "SELECT g_name, g_manu, g_comp, g_cat, DATE_FORMAT(date_added, '%b %e %Y') FROM gadgetlibrary";
//$sql = "SELECT cat_desc, g_name, g_comp, g_manu, DATE_FORMAT(date_added, '%b %e %Y') FROM gadgetlibrary gl JOIN category c on gl.g_cat=c.cat_id ORDER BY date_added desc";
//echo $sql;
$result = mysqli_query($link, $sql);

if (!$result) {
	$error = 'Error fetching data: ' . mysqli_error($link);
	echo $error;
	exit();
}

$rowcount = mysqli_num_rows($result);
if ($rowcount > 0) {
echo "<center>Gadgets in the Gadget Library<br />";
echo "<table style='border-color:#999999' border-style='double' border='1'>";
echo "<tr><th>Name</th><th>Manufacturer</th><th>Component(s)</th><th>Category</th><th>Date Added<th></tr>";
while($recording=mysqli_fetch_array($result)){
	echo "<tr>";
	for ($i = 0; $i <= 4; $i++)
	{
		echo "<td>$recording[$i]</td>";
	}
	echo "</tr>";
}
echo "</table></center>";
}
else {
echo "<center>There are currently no gadgets in the gadget library. Please come back later.";
}
?>
</td><br clear="left" /></tr>
  <tr>
    <td colspan="5" class="footer">Copyright &copy; 2010, GadgetLibrary. All rights reserved.<br />
			Created by Marvin Rusinek for Advanced PHP with MySQL course within the Advanced Web Development Intensive at NYU.
	</td>
  </tr>
</table>

</body>
</html>
