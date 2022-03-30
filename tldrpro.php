<?php session_start();
	if(!$_SESSION['myusername']){
   	header("location:login.html");
}?>

<html><title>MCDCoop</title>
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
.style17 {
	color: #006600;
	font-family: "Courier New", Courier, mono;
	font-size: 14px;
	font-weight: bold;
}
.New {
	font-family: "Courier New", Courier, mono;
	font-size: 16px;
	color: #000000;
}
.style19 {
	color: #FFFFFF;
	font-weight: bold;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 10px;
}
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
        <td width="22%" height="26" valign="bottom"><div align="right"><strong> <span class="style11">Today is</span><span class="style12">		<?php echo date("l F d, Y");?></span></strong></div></td>
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
      <table width="80%" height="500"  border="2" cellpadding="5" cellspacing="0" bgcolor="#FFFFFF">
        <tr>
          <td width="100%" height="421" valign="top" class="style12"><table width="100%"  border="0" cellpadding="0" cellspacing="0" bgcolor="#CCCCCC">
              <tr>
                <td width="1%"><span class="style18"><span class="New">
                  <label> </label>
                </span>
                    <label>                    </label>
                </span></td>
                <td width="20%" valign="middle"><span class="style18">DR Number <span class="New"> :
                <?php
					mysql_select_db("mcdcoop") or die("cannot select database");
		  			$query=mysql_query("SELECT dr_num FROM m_controllers") or die("cannot select from database");
					$result=mysql_fetch_array($query);
					$nxdr=$result["dr_num"]+1;
					echo $nxdr;
		  		?>
                </span></span></td>
                <td width="79%" valign="middle"><span class="style18">
                  <label>
                  <input type="radio" name="RadioGroup1" value="radio">
</label>
                </span>
                  <label><span class="style12">Collector's Remittance</span></label>
                  <span class="style18">
                  <label> </label>
                  <input type="radio" name="RadioGroup1" value="radio">
</span><span class="style12">New Member</span></td>
              </tr>
            </table>
            <table width="100%" height="82%"  border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td width="12%" height="43"><p class="style18">Member's Name :
                      
                      
</p>
                  </td>
                <td colspan="2"><p class="style18">
					<form name='sform' method="post" action="tldrpro.php">
                    <input type="text" name="mname" id="mname" size="35">
                    <input type="submit" name="Submit" value="Search">
</form>
                </td>
                <td width="3%" rowspan="4">&nbsp;</td>
                <td width="49%" rowspan="4">&nbsp;</td>
              </tr>
              <tr>
                <td height="22"><span class="style18">Cash Amount :</span></td>
                <td colspan="2"><span class="style18">
                  <input type="text" name="textfield">
                </span></td>
              </tr>
              <tr>
                <td height="31" colspan="3" valign="bottom"><p class="style18">Member's Selection : <span class="New"></span>                </p>
                  </td>
                </tr>
              <tr>
                <td height="365" colspan="3" align="center" valign="top" class="style19"><table width="100%"  border="1" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC">
                  <tr align="center" bgcolor="#666666">
                    <td height="20" class="style19">NAME</td>
                    <td class="style19">MID</td>
                  </tr>
                  <tr>
                    <td width="73%"><span class="style18"><span class="New">
                      <?php   // start member's query
						$mnames=$_POST['mname'];
						$mnames=trim($mnames);
						$expl=explode(" ",$mnames);
						$query=mysql_query("SELECT * FROM m_members WHERE memname like '%$mnames%'");
						while($col01=mysql_fetch_array($query)){
							echo "<a href='#'>$col01[memname]<br></a>";
						}
					?>
                    </span></span></td>
                    <td width="27%"><span class="style18"><span class="New">
					<?php
						$query=mysql_query("SELECT * FROM m_members WHERE memname like '%$mnames%'");
						while($col01=mysql_fetch_array($query)){
							echo "$col01[mid]<br>";
						}
					?>
                    </span></span></td>
                  </tr>
                </table></td>
                </tr>
            </table>
            </td>
        </tr>
      </table>
      </div></td>
  </tr>
</table>
