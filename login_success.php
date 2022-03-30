<?php session_start();
if(!$_SESSION['myusername']){
   header("location:login.html");
}?>

<html>
<title>MCDCoop</title>
<style type="text/css">
<!--
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
}
.style13 {
	font-size: 24px;
	color: #FF0000;
	font-family: arial;
	font-weight: bold;
}
-->
</style>
</html>
<style type="text/css">
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color: #CCCCCC;
}
.style11 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-weight: bold;
}
.style12 {font-size: 12px; font-family: Arial, Helvetica, sans-serif;}
-->
</style>
<table width="100%" height="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr bgcolor="#E8E8E8">
    <td height="53" background="hresource/top.gif" bgcolor="#E8E8E8" class="style1"><div align="center"><span class="style5"> </span> <span class="style2"> </span></div>      <div align="center" class="style10">
    <table width="80%" height="50" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="56%" rowspan="2" valign="bottom"><a href="login_success.php"><img src="hresource/logo.jpg" width="350" height="50" border="0"></a></td>
        <td width="22%" rowspan="2"><div align="right" class="style3 style11"><span class="style10 style5"><strong>Hello <?php echo $_SESSION['myusername'];?></strong></span>!</div></td>
        <td width="22%" height="26" valign="bottom"><div align="right"><strong><span class="style11">Today is <?php echo date("l F d, Y");?></span></strong></div></td>
      </tr>
      <tr>
        <td valign="top"><div align="right"><span class="style12">Please dont forget to</span><span class="style11"><strong> <a href="logout.php">LOGOUT</a></strong></span></div></td>
      </tr>
    </table>
    <span class="style11"><span class="style11"></span></span></div></td>
  </tr>
  <tr bgcolor="#003333">
    <td valign="top" bgcolor="#CCCCCC" class="style20"><div align="center"></div>      <table width="80%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr align="center" valign="middle">
          <td height="59" colspan="3"><div align="left"></div></td>
        </tr>
        <tr align="center" valign="middle">
          <td width="35%" height="93"><p align="center" class="style15"><a href="Tellersmenu.php" class="style19 style13">Teller's Menu</a></p>
          </td>
          <td width="31%"><p align="center" class="style13">Loan Menu</p>
          </td>
          <td width="34%"><p align="center" class="style13">Collection Menu</p>
          </td>
        </tr>
        <tr valign="top" class="style11">
          <td height="72"><div align="center"><span class="style16">Front Desk system</span></div></td>
          <td><div align="center"><span class="style16">Loan Application System</span></div></td>
          <td><div align="center"><span class="style16">Collection Reports / Member's Loan Review</span></div></td>
        </tr>
    </table>      <span class="style5"><span class="style7"><span class="style10"><span class="style11"></span></span></span></span></td>
  </tr>
</table>
