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
<table width="806">
<form name="search" action="gs_result.php" method="GET">
<table cellpadding="0" cellspacing="0" border="1" width="806" class="s">
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
</table>
<table width="806">
<tr>
    <td colspan="5" class="footer">Copyright &copy; 2010, GadgetLibrary. All rights reserved.<br />
			Created by Marvin Rusinek for Advanced PHP with MySQL course within the Advanced Web Development Intensive at NYU.<br />
<a href='javascript: history.go(-1)'>Back to previous page</a></td>
  </tr>
</table>
</body>
</html>