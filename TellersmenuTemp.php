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
/* horizontal menu arrangement
-------------------------------*/
#tlmenu > li {
	float: left;
	padding: 0 5px;
}

/* Preventing submenus to display
----------------------------------*/
#tlmenu li ul {
	display: none;
}

/* Showing submenus on mouse over
--------------------------------------*/
#tlmenu li:hover ul {
	display: block;
}


/* Menu display properties
----------------------------*/
#tlmenu li a {
display: block;
	color: #fff; 
	background: #2E2EFE;
	font-family: arial;
	font-weight: bold;
	font-size: 0.8em;
	padding: 8 30px;
	text-decoration: none;
}
	#tlmenu li a:hover {
		color: #A4A4A4;
	}


/* Submenu display properties
------------------------------*/
#tlmenu ul a {
	color: #fff; 
	background: #4b545f;
}
	#tlmenu ul a:hover {
		color: #58FA58;
		background: #424242;
	}


/* Sub menu vertical arrangement
----------------------------------*/
#tlmenu ul {
	list-style: none;
	position: absolute;
	z-index: 999;
}
.style18 {font-size: 12px}
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
.style13 {
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
	font-style: italic;
	font-size: 30px;
	color: #FF0000;
}
.style17 {color: #006600}
.New {
	font-family: "Courier New", Courier, mono;
	font-size: 16px;
	color: #000000;
}
.style19 {font-size: 60px}
-->
</style>
<table width="100%" height="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr bgcolor="#E8E8E8">
    <td height="53" background="hresource/top.gif" bgcolor="#E8E8E8" class="style1"><div align="center"><span class="style5"> </span> <span class="style2"> </span></div>      <div align="center" class="style10">
    <table width="80%" height="50" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="56%" rowspan="2" valign="bottom"><a href="login_success.php"><img src="hresource/logo.jpg" width="350" height="50" border="0"></a></td>
        <td width="22%" rowspan="2"><div align="right" class="style3 style11"><span class="style10 style5"><strong>Hello 
		<?php echo $_SESSION['myusername'];?>
		</strong></span>!</div></td>
        <td width="22%" height="26" valign="bottom"><div align="right"><strong><span class="style5"><span class="style7"><span class="style1"><a href="logout.php">&nbsp;</a> </span></span></span><span class="style12">Today is 
		<?php echo date("l F d, Y");?></span></strong></div></td>
      </tr>
      <tr>
        <td valign="top"><div align="right"><span class="style12">Please dont forget to</span><span class="style11"><strong> <a href="logout.php">LOGOUT</a></strong></span></div></td>
      </tr>
    </table>
    <span class="style11"><span class="style11"></span></span></div></td>
  </tr>
  <tr bgcolor="#E8E8E8">
    <td valign="top" bgcolor="#E8E8E8" class="style1"><div align="center">
      <table width="80%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td height="19" colspan="2"><div align="center"></div></td>
        </tr>
        <tr>
          <td width="65%" height="34"><div align="left"><span class="style12">Your transaction date is</span><span class="style11"><span class="style17">
              <?php
						$host="localhost";
						$username="root";
   						$password="";
						mysql_connect("$host", "$username", "$password");
						mysql_select_db("mcdcoop") or die("cannot select database");
						$query=mysql_query("SELECT ttransdt FROM m_controllers");
						$result=mysql_fetch_assoc($query);
						$dbreak=explode("-",$result["ttransdt"]);
						$year = $dbreak["0"];
						$month = $dbreak["1"];
						$day = $dbreak["2"];
						echo $month, " ", $day, ", ", $year;
						mysql_close()
			?>
          </span></span></div></td>
          <td><div align="right"></div>
              <div align="right"><span class="style11"><span class="style13"><a href="Tellersmenu.php" class="style13">Teller's Menu</a></span> </span></div></td>
        </tr>
        <tr align="left" valign="bottom" bgcolor="#2E2EFE">
          <td height="20" colspan="2"><ul id="tlmenu">
              <li><a href="#">Operations</a>
                  <ul>
                    <li><a href="tldr.php">Deposit Receipt</a></li>
                    <li><a href="tlor.php">Official Receipt</a></li>
                    <li><a href="tlwit.php">Withdrawals</a></li>
                    <li><a href="tlset">Set Transaction Date</a></li>
                  </ul>
              <li><a href="#">View Subsidiary</a>
                  <ul>
                    <li><a href="tlvscap.php">Share Capital</a></li>
                    <li><a href="tlvpref.php">Prefered Share</a></li>
                    <li><a href="tlvprim.php">Prime Deposit</a></li>
                    <li><a href="tlvsav.php">Savings Deposit</a></li>
                    <li><a href="tlvtdep.php">Time Deposit</a></li>
                    <li><a href="#">Special Deposit</a></li>
                  </ul>
              </li>
              <li><a href="#">Check your Entry</a>
                  <ul>
                    <li><a href="tlcdr.php">Deposit Receipt</a></li>
                    <li><a href="tlcor.php">Official Receipt</a></li>
                    <li><a href="tlcwit.php">Withdrawals</a></li>
                  </ul>
              </li>
              <li><a href="#">REPORTS</a></li>
              <p>&nbsp;</p>
          </ul></td>
        </tr>
      </table>
      <p align="center" class="style19">&nbsp;</p>
      <p align="center" class="style19">MCDCoop Teller's Menu</p>
      <p align="center" class="style11">This system is solely created for the use of MALOLOS CREDIT &amp; DEVELOPMENT COOPERATIVE and is developed for effective frontline system.</p>
      <p>&nbsp;</p>
    </div></td>
  </tr>
</table>
