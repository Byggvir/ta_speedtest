<?php
/* Securety check: Nod direct calls are allowd */

global $SpeedTest;
isset($SpeedTest) or exit ("No direct calls!" ) ;

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

  /* Select queries return a resultset */
  if ($PingResult = $mysqli->query($PingQuery)) {
 
    while ($ping = $PingResult->fetch_assoc()) {

?>
<tr>
<td class="result"><?php echo $ping["start"]; ?></td>
<td class="result"><?php echo $ping["url"]; ?></td>
<td class="result"><?php echo sprintf("%0.3f",$ping["minping"]); ?></td>
<td class="result"><?php echo sprintf("%0.3f", $ping["avgping"]) ; ?></td>
<td class="result"><?php echo sprintf("%0.3f",$ping["maxping"]) ; ?></td>
<td class="result"><?php echo sprintf("%0.3f",$ping["mdev"]) ; ?></td>
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
