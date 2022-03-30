<?php
include ("dbconnect.php");
$search = $_GET['search'];
$tablename=$_GET['tablename'];
$fieldname=$_GET['fieldname'];
$pperiod=$_GET['subtype'];
if (isset($_GET['search']) && $_GET['search'] != '') {

 $counter=0;
 $suggest_query = mysql_query("SELECT * FROM $tablename WHERE $fieldname like '%".$search."%' ORDER BY ".$fieldname." ASC") or die(mysql_error());
 $suggested=mysql_num_rows($suggest_query);
 while($counter<$suggested) {
	$result=mysql_result($suggest_query,$counter,$fieldname);
	$qonlist=mysql_query("SELECT * from payrollsum where name='$result'");
	$onlist=mysql_num_rows($qonlist);
	if($onlist>0){ echo $result."^selected\n";} else {	echo $result."\n";}
	$counter=$counter+1;
 }
} else {
 $counter=0;
 $suggest_query = mysql_query("SELECT * from $tablename where pay_period='$pperiod' ORDER by ".$fieldname." ASC") or die(mysql_error());
 $suggested=mysql_num_rows($suggest_query);
 while($counter<$suggested) {
	$result=mysql_result($suggest_query,$counter,$fieldname);
	$qonlist=mysql_query("SELECT * from payrollsum where name='$result'");
	$onlist=mysql_num_rows($qonlist);
	if($onlist>0){ echo $result."^selected\n";} else {	echo $result."\n";}
	$counter=$counter+1;
 }
}
?>