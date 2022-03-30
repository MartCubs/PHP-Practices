<?php
// --------- AC Functions that should not be use as include ---->
$funcrun=$_GET['acfuncrun'];
$param1=$_GET['acfuncparam01'];
$param2=$_GET['acfuncparam02'];
$param3=$_GET['acfuncparam03'];
$param4=$_GET['acfuncparam04'];
include ("dbconnect.php");
$funcrun($param1,$param2,$param3,$param4);

// select all
function acselectall($reference,$subtype,$param3,$param4){
	$date=$_SESSION['date'];
	$all=mysql_query("SELECT * from employee")or die(mysql_error());
	$nos=mysql_num_rows($all);
	$ctr=0;
	while($ctr<$nos){
		$empname=mysql_result($all,$ctr,'name');
		$subtype=$_SESSION['subtype'];
		$empno=mysql_result($all,$ctr,'no');
		$position=mysql_result($all,$ctr,'position');
		$department=mysql_result($all,$ctr,'department');
		$basic=mysql_result($all,$ctr,'rate');
		$allowance=mysql_result($all,$ctr,'allowance');
		$leave=mysql_result($all,$ctr,'leave_cr');
		$taxstat=mysql_result($all,$ctr,'taxstat');
		$fexist=mysql_query("SELECT * from payrollsum where name='$empname' and date='$date'") or die(mysql_error());
		$exist=mysql_num_rows($fexist);
		if($exist==0){
			mysql_query("INSERT into payrollsum (reference,subtype,date,name,empno,position,department,status,basic,leave_cr,allowance)
							VALUES ('$reference','$subtype','$date','$empname','$empno','$position','$department','$taxstat','$basic','$leave','$allowance')") or die(mysql_error());
		}else{}
		$ctr=$ctr+1;
	}
	echo '<script>history.back()</script>';
}

// unselect all
function acdeletall($subtype,$param2,$param3,$param4){
	$date=$_SESSION['date'];
	$all=mysql_query("DELETE from payrollsum where date='$date' and subtype='$subtype'")or die(mysql_error());
	echo '<script>history.back()</script>';
}

// function to add individual searched to details on click
function transert($empname,$reference,$param3,$param4){
	session_start();
	$date=$_SESSION['date'];
	$subtype=$_SESSION['subtype'];

	$qemp=mysql_query("SELECT * from employee where name='$empname'") or die(mysql_error());
	$empno=mysql_result($qemp,0,'no');
	$position=mysql_result($qemp,0,'position');
	$department=mysql_result($qemp,$qem0,'department');
	$rate=mysql_result($qemp,0,'rate');
	$taxstat=mysql_result($qemp,0,'taxstat');
	$basic=mysql_result($qemp,0,'rate');
	$allowance=mysql_result($qemp,0,'allowance');
	$leave=mysql_result($qemp,0,'leave_cr');

	$fexist=mysql_query("SELECT * from payrollsum where name='$empname' and date='$date'") or die(mysql_error());
	$exist=mysql_num_rows($fexist);
	if($exist==0){
		mysql_query("INSERT into payrollsum (reference,subtype,date,name,empno,position,department,status,basic,leave_cr,allowance)
						VALUES ('$reference','$subtype','$date','$empname','$empno','$position','$department','$taxstat','$basic','$leave','$allowance')") or die(mysql_error());
	}else{}
	echo '<script>history.back()</script>';
}

//populating payslip
function poppayslip($empno,$datefr,$dateto,$param4){
	$regdays=getempdays($empno,$datefr,$dateto,date('Y'));
	$emp = mysql_query("SELECT * from employee where no='$empno'");
	$e=mysql_fetch_array($emp);
	$leave=$e['leave_cr'];
	echo number_format($regdays,2).'/^'.$leave;
}

// amount of working days within payroll period
function getempdays($empno,$datefr,$dateto,$year){
	$ydays = date("z", mktime(0,0,0,12,31,$year)) + 1; // days in year

	$dateto = strtotime("$dateto");
	$datefr = strtotime("$datefr");
	$differ=$dateto-$datefr;
	$diff=floor($differ/(60*60*24))+1;

	$emp = mysql_query("SELECT * from employee where no='$empno'");
	$exoffdays = explode(', ',mysql_result($emp,0,'daysoff'));
	$offdays = count($exoffdays); // employee days off

	$wyeardays = $ydays-round(($ydays/7)*$offdays,0); // working days with in a year
	$work = $diff-round(($diff/7)*$offdays,0); // working days between payroll period

	// get employee daily rate
	if(mysql_result($emp,0,'rate_mode')=='per day'){
		$dayrate = mysql_result($emp,0,'rate');
	} elseif(mysql_result($emp,0,'rate_mode')=='per month'){
		$dayrate = round((mysql_result($emp,0,'rate')*12)/$wyeardays,2);
	}
	$regulardays=$dayrate*$work;
	return $regulardays;
}
?>