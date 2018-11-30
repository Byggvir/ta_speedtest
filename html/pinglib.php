<?php

/*
 * Autor: Thomas Arend
 * Stand: 30.12.2018
 *
 * Better quick and dirty than perfect but never!
 *
 * Securety check: No direct calls are allowed. 
 */

global $SpeedTest;
isset($SpeedTest) or exit ( "No direct calls!" ) ;

function PingReportByUrl($url) {
  
  global $mysqli;
  
?>
<table class="verybig">
<tr>
<th>Datetime</th>
<th>Address</th>
<th>min<br />[ms]</th>
<th>avg<br />[ms]</th>
<th>max<br />[ms]</th>
<th>mdev<br />[ms]</th>
</tr>
<?php 

  $PingQuery="SELECT * FROM pingreports WHERE url='$url' ORDER BY start DESC LIMIT 20;";
  $AvgQuery="SELECT min(minping) as minmin, avg(avgping) as avgavg, max(maxping) as maxmax ,avg(mdev) as avgmdev FROM pingreports WHERE url='$url';";

  /* Select queries return a resultset */
  if ($PingResult = $mysqli->query($AvgQuery)) {
 
    while ($ping = $PingResult->fetch_assoc()) {

?>
<tr class="rowsummary">
<td class="resultleft" colspan="2">Min/Avg/Max/Avg of all pingreports</td>
<td class="resultright colminping"><?php echo sprintf("%0.3f",$ping["minmin"]); ?></td>
<td class="resultright colavgping"><?php echo sprintf("%0.3f", $ping["avgavg"]) ; ?></td>
<td class="resultright colmaxping"><?php echo sprintf("%0.3f",$ping["maxmax"]) ; ?></td>
<td class="resultright colmdev"><?php echo sprintf("%0.3f",$ping["avgmdev"]) ; ?></td>
</tr>
<?php

    } /* end while */

    /* free result set */
    $PingResult->close();

  } /* end if */
  /* Select queries return a resultset */

  if ($PingResult = $mysqli->query($PingQuery)) {
 
    while ($ping = $PingResult->fetch_assoc()) {

?>
<tr>
<td class="resultleft colstart"><?php echo $ping["start"]; ?></td>
<td class="resultleft colurl"><?php echo $ping["url"]; ?></td>
<td class="resultright colminping"><?php echo sprintf("%0.3f",$ping["minping"]); ?></td>
<td class="resultright colavgping"><?php echo sprintf("%0.3f", $ping["avgping"]) ; ?></td>
<td class="resultright colmaxping"><?php echo sprintf("%0.3f",$ping["maxping"]) ; ?></td>
<td class="resultright colmdev"><?php echo sprintf("%0.3f",$ping["mdev"]) ; ?></td>
</tr>
<?php

    } /* end while */

    /* free result set */
    $PingResult->close();

  } /* end if */

echo "</table>\n" ;

} /* End of PingReportByUrl */

function PingReport () {
   
  global $mysqli;
 
  $urlquery="SELECT DISTINCT url FROM pingreports ORDER BY url;";

  
  if ($urlresult = $mysqli->query($urlquery)) {
 
    while ($urllist = $urlresult->fetch_assoc()) {

      echo "<h2>" . $urllist["url"] . "</h2>";
      PingReportByUrl($urllist["url"]);
    }/* end while */

    $urlresult->close();
    
  } /* end if */

} /* End of pingreport */

?>
