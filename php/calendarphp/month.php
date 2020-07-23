<tr>
	<td width="10px">Dom</td>
	<td width="10px">Seg</td>
	<td width="10px">Ter</td>
	<td width="10px">Qua</td>
	<td width="10px">Qui</td>
	<td width="10px">Sex</td>
	<td width="10px">Sab</td>
</tr>

<?php

ini_set('date.timezone', 'America/Sao_Paulo');
date_default_timezone_set ('America/Sao_Paulo');

$d=1;

$counter=1;

	echo "<tr>";
	$j=0;
	$timeStamp= strtotime("$Year-$month-1");
	$firstday= date("w",$timeStamp);
	
	for ($i=1; $i <=$numDays+$firstday ; $i++,$counter++) { 
		$timeStamp= strtotime("$Year-$month-$i");
		
		if ($i==1) {
		$firstday= date("w",$timeStamp);
		}

		if ($j<$firstday) {
			$j++;
			echo "<td>&nbsp</td>";
		}
		else{
		echo "<td class='day' id=".$Year."/".$m."/".$d.">".$d++."</td>";
		}

		if ($counter%7==0) 
		{
			echo "</tr><tr>";
		}


	}

	echo "</tr>";
?>
