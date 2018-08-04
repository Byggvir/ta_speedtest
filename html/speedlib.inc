<?php 

include_once "speeddb.php";

/* Retrieve the results fom database and printout the rows  */

function SpeedReportTableRows () {
  
  global $mysqli;
  
  $SpeedQuery = "SELECT * FROM speedreports ORDER BY start DESC LIMIT 10;";

  /* Select queries return a resultset */
  if ($SpeedResult = $mysqli->query($SpeedQuery)) {
 
    while ($speed = $SpeedResult->fetch_assoc()) {

  /* Table of Reports */
  
?>
<tr>
<td class="result"><?php echo $speed["start"]; ?></td>
<td class="result"><?php echo sprintf("%0.3f",$speed["ping"]); ?></td>
<td class="result"><?php echo sprintf("%0.3f", $speed["download"]/1000000) ; ?></td>
<td class="result"><?php echo sprintf("%0.3f",$speed["upload"]/1000000) ; ?></td>
</tr>
<?php

    } /* end while */ 

    /* free result set */
    $SpeedResult->close();

  } /* end if */
  
} /* end of speedreport */
?>