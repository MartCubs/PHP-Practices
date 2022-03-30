<style type="text/css">
<!--
body {
	background-color: #CCCCCC;
}
-->
</style>
<?php
	// $mnames=$_POST['mname'];
	mysql_select_db("mcdcoop") or die("cannot select database");
	$query=mysql_query("SELECT dr_num FROM m_controllers") or die("cannot select from database");
	$result=mysql_fetch_array($query);
	$nxdr=$result["dr_num"]+1;
	echo $nxdr;
?>