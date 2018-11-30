<?php

global $SpeedTest;
isset($SpeedTest) or exit ("No direct calls!" ) ;

include_once "speeddb.php";

/* Retrieve the results fom database and printout the rows  */

function SpeedReportTableRows () {
  
  global $mysqli;
  
  $SpeedQuery = "SELECT * FROM speedreports ORDER BY start DESC LIMIT 10;";
  $SpeedAvgQuery = "SELECT avg(ping) as avgping,avg(download) as avgdownload,avg(upload) as avgupload FROM speedreports;";

  /* Select queries return a resultset */
  if ($SpeedResult = $mysqli->query($SpeedQuery)) {
 
    while ($speed = $SpeedResult->fetch_assoc()) {

  /* Table of Reports */
  
?>
<tr>
<td class="result colstart"><?php echo $speed["start"]; ?></td>
<td class="resultright colping"><?php echo sprintf("%0.3f",$speed["ping"]); ?></td>
<td class="resultright coldownload"><?php echo sprintf("%0.3f", $speed["download"]/1000000) ; ?></td>
<td class="resultright colupload"><?php echo sprintf("%0.3f",$speed["upload"]/1000000) ; ?></td>
</tr>
<?php

    } /* end while */ 
  /* free result set */
    $SpeedResult->close();

  } /* end if */
  

  if ($SpeedResult = $mysqli->query($SpeedAvgQuery)) {

    while ($speed = $SpeedResult->fetch_assoc()) {

  /* Table of Reports */
  
?>
<tr class="rowsummary">
<td class="result colstart">Averages</td>
<td class="resultright colping"><?php echo sprintf("%0.3f",$speed["avgping"]); ?></td>
<td class="resultright coldownload"><?php echo sprintf("%0.3f", $speed["avgdownload"]/1000000) ; ?></td>
<td class="resultright colupload"><?php echo sprintf("%0.3f",$speed["avgdownload"]/1000000) ; ?></td>
</tr>
<?php

    } /* end while */ 
    /* free result set */
    $SpeedResult->close();

  } /* end if */
  
} /* end of speedreport */
?>
