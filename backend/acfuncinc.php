<!--------- AC Function that requires to declare include ---->
<?php

function listsumcolumn123($date,$subtype){
	$qdet=mysql_query("SELECT * from payrollsum where date='$date' and subtype='$subtype' ORDER by name asc") or die(mysql_error());
	$rdet=mysql_num_rows($qdet);
	echo '<table class="summary" cellpadding="0" cellspacing="1" border="0"  width="349">';
	$ctr=0;
	while($ctr<$rdet){
		if(($ctr+10)%2==0){
			$bgcolor='bgcolor=#C1E0FF';
		}else{ $bgcolor='';}
		$num=$ctr+1;$name=mysql_result($qdet,$ctr,'name');$empno=mysql_result($qdet,$ctr,'empno');
		echo '<td height="20" width="40" align="right">'.$num.'&nbsp;&nbsp;</td><td width="250">'.$name.'</td><td width="55">&nbsp;'.$empno.'</td>
		<tr '.$bgcolor.'>';
		$ctr=$ctr+1;
	}
	echo '</table>';
}

function listsumdet($date,$subtype){
	$qdet=mysql_query("SELECT * from payrollsum where date='$date' and subtype='$subtype' ORDER by name asc") or die(mysql_error());
	$rdet=mysql_num_rows($qdet);
	echo '<table class="summary" cellpadding="0" cellspacing="1" border="0" width="1550">';
	$ctr=0;
	while($ctr<$rdet){
		if(($ctr+10)%2==0){
			$bgcolor='bgcolor=#C1E0FF';
		}else{ $bgcolor='';}
		$stat=mysql_result($qdet,$ctr,'status');
		$basic=mysql_result($qdet,$ctr,'basic');$allowance=mysql_result($qdet,$ctr,'allowance');$otherinc=mysql_result($qdet,$ctr,'other_income');
		$holiday=mysql_result($qdet,$ctr,'holiday');$ot=mysql_result($qdet,$ctr,'ot');$tardiness=mysql_result($qdet,$ctr,'tardiness');
		$otherded=mysql_result($qdet,$ctr,'other_deds');$gross=mysql_result($qdet,$ctr,'gross');$sssprem=mysql_result($qdet,$ctr,'sssprem');
		$sssloan=mysql_result($qdet,$ctr,'sssloan');$hdmfprem=mysql_result($qdet,$ctr,'hdmfprem');$hdmfloan=mysql_result($qdet,$ctr,'hdmfloan');
		$philhealth=mysql_result($qdet,$ctr,'philhealth');$tax=mysql_result($qdet,$ctr,'tax');$net=mysql_result($qdet,$ctr,'net');
		echo '<td height="20" width="51">&nbsp;'.$stat.'</td><td width="96" align="right">'.$basic.'&nbsp;</td><td width="96" align="right">'.$allowance.'&nbsp;</td>
			<td width="96" align="right">'.$holiday.'&nbsp;</td><td width="96" align="right">'.$ot.'&nbsp;</td><td width="96" align="right">'.$otherinc.'&nbsp;</td>
			<td width="96" align="right">'.$tardiness.'&nbsp;</td><td width="96" align="right">'.$otherded.'&nbsp;</td><td width="96" align="right">'.$gross.'&nbsp;</td>
			<td width="96" align="right">'.$sssprem.'&nbsp;</td><td width="96" align="right">'.$sssloan.'&nbsp;</td><td width="96" align="right">'.$hdmfprem.'&nbsp;</td>
			<td width="96" align="right">'.$hdmfloan.'&nbsp;</td><td width="96" align="right">'.$philhealth.'&nbsp;</td><td width="96" align="right">'.$tax.'&nbsp;</td>
			<td width="96" align="right">'.$net.'&nbsp;</td>
		<tr '.$bgcolor.'>';
		$ctr=$ctr+1;
	}
	echo '</table></div></td></table>';
}

?>