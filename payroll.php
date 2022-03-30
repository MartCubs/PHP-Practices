<?php
session_start();
$_SESSION['reference']='DV-031-2014';
$_SESSION['type']='payroll';
$_SESSION['subtype']='semi_monthly';
$_SESSION['date']=date('2014-04-05');
$date=$_SESSION['date'];
$dvref=$_SESSION['reference'];
$type=$_SESSION['type'];
$subtype=$_SESSION['subtype'];
include ("backend/dbconnect.php");
include ("backend/acfuncinc.php");

$qdv=mysql_query("SELECT * from temptab where date='$date' and reference='$dvref'");
$period01=date('M d, Y', strtotime(mysql_result($qdv,0,'payperiod1')));
$period02=date('M d, Y', strtotime(mysql_result($qdv,0,'payperiod2')));
$ptr01=date('Y-m-d', strtotime(mysql_result($qdv,0,'payperiod1')));
$ptr02=date('Y-m-d', strtotime(mysql_result($qdv,0,'payperiod2')));

$getno=10;

?>
<html>
<head>
<script language="JavaScript" type="text/javascript" src="js/suggest.js"></script>
<link rel="stylesheet" href="css/style.css" type="text/css" media="screen, projection" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body onLoad="clearsearch(), searchSuggest('employee','name','<?php echo $subtype; ?>'), loadslipvalue(<?php echo $getno.",'".$ptr01."','".$ptr02."'";?>)">
<div align="center"></div>
<div align="center"><table width="1100" height="70" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="1101" height="95">&nbsp;</td>
  </tr>
</table></div>
<table width="1100" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td rowspan="2" align="left" valign="top"><div align="left"><p><span class="keyword">&nbsp;&nbsp;&nbsp;Search </span>
        <input id="searchbox" type="text" name="searchbox" size="45" placeholder=" Lastname, Firstname" onKeyUp="searchSuggest('employee','name')"
				 onkeydown="movesuggest(event)" style="height:30; border-radius:5; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:13px">
    	<ul id="suggest"><div id="layer1"></div>
    	</ul></div>
	  <div id="septable"><table width="390" border="0" cellpadding="0" cellspacing="0"><tr>
		  <td width="224"><strong class="tabtitle">Select from list below </strong></td>
		  <td width="156"><div align="right"><span class="summaryheading"><strong>
		  		<a href="backend/acfunc.php?acfuncrun=acselectall&acfuncparam01=<?php echo $dvref.'&acfuncparam02='.$subtype;?>">Select All</a>
				</strong></span> | <span class="summaryheading"><strong>
					<a href="backend/acfunc.php?acfuncrun=acdeletall&acfuncparam01=<?php echo $subtype;?>"> Unselect all </a></strong></span></div></td>
	  </tr>
		  <tr><td colspan="2"></td></tr></table>
	  </div>
		<div id="septable2"></div>

	</td>
    <td width="300" valign="top" class="tabtitle" align="right">
		 <strong><?php echo $emparray['name']; ?></strong><br>
		 <span class="tabtitle">&nbsp;</span><span class="marked"><?php echo $emparray['department'].' Deparment'; ?> &nbsp; &nbsp; &nbsp;  
		 		&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<?php echo $emparray['position']; ?></span><br>
		 -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -<br>
	</td>
    <td width="350" rowspan="2" align="right" valign="top"><div id="reference"><?php echo $dvref.'<br>'.
			ucwords(str_replace('_',' ',$subtype)).' - '.strtoupper($type).'<br>Payroll Period<br>from : '.$period01.'<br> to : '.$period02; ?></div></td>
  </tr>
  <tr>
    <td width="300" height="314" align="right" valign="top" class="tabtitle" id="pslip">
		<span class="marked">Leave CR </span><span class="summaryheading">
		<input name="textfield" type="text" size="1" maxlength="2" style="border:none;" 
			readonly>
		&nbsp; &nbsp; Regular Days : </span>
		<input name="regdays" type="text" class="num" id="regdays" style="border:none; background-color:#CCCCCC;" size="10" 
			maxlength="10" align="right" readonly><br>
		<span class="summaryheading">Allowances(DeMinimis) : </span>
        <input name="allowance" type="text" class="num" id="allowance" style="border:none; background-color:#B3E287;" size="10" 
			maxlength="10" align="right"><br>
        <span class="summaryheading">Holidays : </span>
    	<input name="num" type="text" class="num" id="num" style="border:none; background-color:#B3E287;" size="1" align="right">
    	<span class="summaryheading"> Amount : </span>
    	<input name="num" type="text" class="num" id="num" style="border:none; background-color:#CCCCCC;" size="10" 
			maxlength="10" align="right" readonly><br>
		<span class="summaryheading">OT(hrs) : </span>
    	<input name="num" type="text" class="num" id="num" style="border:none; background-color:#B3E287;" size="1" align="right">
    	<span class="summaryheading"> Amount : </span>
    	<input name="num" type="text" class="num" id="num" style="border:none; background-color:#CCCCCC;" size="10" 
			maxlength="10" align="right" readonly><br>
		<span class="summaryheading">Other Income : </span>
        <input name="num" type="text" class="num" id="num" style="border:none; background-color:#B3E287;" size="10" maxlength="10" align="right"><br>
		<span class="summaryheading">Absent(days) : </span>
    	<input name="num" type="text" class="num" id="num" style="border:none; background-color:#B3E287;" size="1" align="right"
			value="<?php echo number_format($emparray['absentd'],(int)2); ?>"> &nbsp;<span class="summaryheading"> Amount : </span>
    	<input name="num" type="text" class="num" id="num" style="border:none; background-color:#CCCCCC;" size="3" align="right" readonly><br>
		<span class="summaryheading">Tardiness(mins) : </span>
    	<input name="num" type="text" class="num" id="num" style="border:none; background-color:#B3E287;" size="1" align="right"
			value="<?php echo number_format($emparray['tardmin'],(int)2); ?>"> &nbsp;<span class="summaryheading"> Amount : </span>
    	<input name="num" type="text" class="num" id="num" style="border:none; background-color:#CCCCCC;" size="3" align="right" readonly><br>
    	<span class="summaryheading">
			<strong>GROSS SALARY</strong> &nbsp; &nbsp; &nbsp; : </span> 
        <input name="num" type="text" class="num" id="num" style="border:none; background-color:#CCCCCC;" size="10" 
			maxlength="10" align="right" readonly><br>
        <span class="summaryheading">Other deductions : </span>
        <input name="num" type="text" class="num" id="num" style="border:none; background-color:#B3E287;" size="5" align="right"
			value="<?php echo number_format($emparray['other_deds'],(int)2); ?>"><br>
		<span class="summaryheading">SSS Prem : </span>
    	<input name="num" type="text" class="num" id="num" style="border:none; background-color:#CCCCCC;" size="3" align="right"
			value="<?php echo number_format($emparray['sssprem'],(int)2); ?>" readonly><span class="summaryheading"> SSS Loan : </span>
   	    <input name="num" type="text" class="num" id="num" style="border:none; background-color:#CCCCCC;" size="3" maxlength="3" align="right"
			value="<?php echo number_format($emparray['sssloan'],(int)2); ?>" readonly><br><span class="summaryheading"> HDMF Prem : </span>
    	<input name="num" type="text" class="num" id="num" style="border:none; background-color:#CCCCCC;" size="3" align="right"
			value="<?php echo number_format($emparray['hdmfprem'],(int)2); ?>" readonly><span class="summaryheading"> HDMF Loan : </span>
   	    <input name="num" type="text" class="num" id="num" style="border:none; background-color:#CCCCCC;" size="3" maxlength="3" align="right"
			value="<?php echo number_format($emparray['hdmfloan'],(int)2); ?>" readonly><br><span class="summaryheading">Phil-Health : </span>
        <input name="num" type="text" class="num" id="num" style="border:none; background-color:#CCCCCC;" size="10" maxlength="10" align="right"
			value="<?php echo number_format($emparray['philhealth'],(int)2); ?>" readonly><br><span class="summaryheading">TAX Widthheld : </span>
        <input name="num" type="text" class="num" id="num" style="border:none; background-color:#CCCCCC;" size="10" maxlength="10" align="right"
			value="<?php echo number_format($emparray['tax'],(int)2); ?>" readonly><br>
		<strong>SAVE</strong>&nbsp; &nbsp; &nbsp; &nbsp; <span class="summaryheading"><strong>NET SALARY</strong> &nbsp; &nbsp; &nbsp; : </span>
    <input name="num" type="text" class="num" id="num" style="border:none; background-color:#CCCCCC;" size="10" maxlength="10" align="right"
		value="<?php echo number_format($emparray['net'],(int)2); ?>" readonly></td>
  </tr>
  <tr>
    <td colspan="3" align="center" valign="top"></td>
  </tr>
  <tr>
    <td colspan="3" align="center" valign="top"><div align="left">
      <div class="tabtitle" id="summarytitle"><strong>&nbsp;&nbsp;&nbsp;&nbsp;Summmary Details </strong></div>
    </div></td>
  </tr>
  <tr valign="top">
    <td colspan="3" align="center">
      <div class="summary" id="summary05" align="left">
	  		<table cellpadding="0" cellspacing="0" border="0">
			<tr>
				<td><div id="summary04"><?php echo '
					  		<table width="350" border="0" cellpadding="0" cellspacing="0" bgcolor="#99CC66">
   							<tr class="summaryheading" height="25"><td width="45"><div align="center">No</div></td>
       						<td width="5"><div class="tabtitle">:</div></td>
							<td width="300">&nbsp;Name <span class="marked">(click employee name below to modify)</span></td>
       						<td width="5" class="tabtitle">:</td>
       						<td width="51"><div align="center">Empno</div></td>
       						<td width="5"><div class="tabtitle">:</div></td></table>'; ?>
				</div></td>
	  			<td><div id="summary03"><?php echo '
					  		<table width="1650" border="0" cellpadding="0" cellspacing="0" bgcolor="#99CC66">
							<tr class="summaryheading" height="25">
            				<td width="51"><div align="center">Status</div></td>
            				<td width="5"><span class="tabtitle">:</span></td>
            				<td width="95"><div align="center">Basic</div></td>
           				 	<td width="5"><span class="tabtitle">:</span></td>
            				<td width="95"><div align="center">+Allowance</div></td>
            				<td width="5"><span class="tabtitle">:</span></td>
            				<td width="95"><div align="center">+Holiday Pay </div></td>
            				<td width="5"><span class="tabtitle">:</span></td>
            				<td width="95"><div align="center">+OT Pay </div></td>
            				<td width="5"><span class="tabtitle">:</span></td>
            				<td width="95"><div align="center">+Other Pay</div></td>
            				<td width="5"><span class="tabtitle">:</span></td>
            				<td width="95"><div align="center">- Tardiness </div></td>
            				<td width="5"><span class="tabtitle">:</span></td>
            				<td width="95"><div align="center">-Other Deduc</div></td>
            				<td width="5"><span class="tabtitle">:</span></td>
            				<td width="95"><div align="center">GROSS Salary </div></td>
            				<td width="5"><span class="tabtitle">:</span></td>
            				<td width="95"><div align="center">SSS Premium</div></td>
            				<td width="5"><span class="tabtitle">:</span></td>
            				<td width="95"><div align="center">SSS Loan</div></td>
            				<td width="5"><span class="tabtitle">:</span></td>
            				<td width="95"><div align="center">HDMF Premium</div></td>
            				<td width="5"><span class="tabtitle">:</span></td>
            				<td width="95"><div align="center">HDMF Loan</div></td>
            				<td width="5"><span class="tabtitle">:</span></td>
            				<td width="95"><div align="center">PhilHealth</div></td>
            				<td width="5"><span class="tabtitle">:</span></td>
            				<td width="95"><div align="center">TAX</div></td>
            				<td width="5"><span class="tabtitle">:</span></td>
            				<td width="95"><div align="center">NET SALARY</div></td>
            				<td>:</td></tr></table>';?>
				</div></td></tr>
			<tr>
				<td valign="top"><div id="summary02" onscroll="column123scroll(this)"><?php listsumcolumn123($date,$subtype); ?></div></td>
							
				<td valign="top"><div id="summary01" onscroll="columnscroll(this)"><?php listsumdet($date,$subtype); ?></div></td></tr>
							
			</table>
	  </div>
    </td>
  </tr>
</table>
</body>
</html>
