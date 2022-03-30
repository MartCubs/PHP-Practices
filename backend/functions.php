<?php
function listsumdet($date){
	include ("dbconnect.php");
	$qdet=mysql_query("SELECT * from payrollsum where date='$date' ORDER by name asc") or die(mysql_error());
	$rdet=mysql_num_rows($qdet);
	$ctr=0;
	echo '<div id="summarydetailsY"><table class="summary">';
	while($ctr<$rdet){
		if(($ctr+10)%2==0){
			$bgcolor='bgcolor=#C1E0FF';
		}else{ $bgcolor='';}
		$num=$ctr+1;$name=mysql_result($qdet,$ctr,'name');$empno=mysql_result($qdet,$ctr,'empno');$stat=mysql_result($qdet,$ctr,'status');
		$basic=mysql_result($qdet,$ctr,'basic');$allowance=mysql_result($qdet,$ctr,'allownace');$otherinc=mysql_result($qdet,$ctr,'other_income');
		$holiday=mysql_result($qdet,$ctr,'holiday');$ot=mysql_result($qdet,$ctr,'ot');$tardiness=mysql_result($qdet,$ctr,'tardiness');
		$otherded=mysql_result($qdet,$ctr,'other_deds');$gross=mysql_result($qdet,$ctr,'gross');$sssprem=mysql_result($qdet,$ctr,'sssprem');
		$sssloan=mysql_result($qdet,$ctr,'sssloan');$hdmfprem=mysql_result($qdet,$ctr,'hdmfprem');$hdmfloan=mysql_result($qdet,$ctr,'hdmfloan');
		$philhealth=mysql_result($qdet,$ctr,'philhealth');$tax=mysql_result($qdet,$ctr,'tax');$net=mysql_result($qdet,$ctr,'net');
		echo '<td height="20" width="45" align="right">'.$num.'&nbsp;&nbsp;</td><td width="300">'.$name.'</td><td width="51">&nbsp;'.$empno.'</td>
			<td width="51">&nbsp;'.$stat.'</td><td width="96" align="right">'.$basic.'&nbsp;</td><td width="96" align="right">'.$allowance.'&nbsp;</td>
			<td width="96" align="right">'.$holiday.'&nbsp;</td><td width="96" align="right">'.$ot.'&nbsp;</td><td width="96" align="right">'.$otherinc.'&nbsp;</td>
			<td width="96" align="right">'.$tardiness.'&nbsp;</td><td width="96" align="right">'.$otherded.'&nbsp;</td><td width="96" align="right">'.$gross.'&nbsp;</td>
			<td width="96" align="right">'.$sssprem.'&nbsp;</td><td width="96" align="right">'.$sssloan.'&nbsp;</td><td width="96" align="right">'.$hdmfprem.'&nbsp;</td>
			<td width="96" align="right">'.$hdmfloan.'&nbsp;</td><td width="96" align="right">'.$philhealth.'&nbsp;</td><td width="96" align="right">'.$tax.'&nbsp;</td>
			<td width="96" align="right">'.$net.'&nbsp;</td>
		<tr '.$bgcolor.'>';
		$ctr=$ctr+1;
	}
	echo '</table></div>';
}

function ac_disphead(){
	echo '<table width="2000"  border="0" cellpadding="0" cellspacing="0" bgcolor="#99CC66">
		<tr class="summaryheading"><td width="45"><div align="center">No</div></td>
		<td width="5"><div class="tabtitle">:</div></td>
		<td width="300" height="25">&nbsp;&nbsp;&nbsp;Name <span class="marked">(click employee name below to modify)</span></td>
		<td width="5" class="tabtitle">:</td>
		<td width="51"><div align="center">Empno</div></td>
		<td width="5"><div class="tabtitle">:</div></td>
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
		<td>:</td></tr></table>';
}
?>