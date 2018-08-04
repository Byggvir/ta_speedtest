<!DOCTYPE html>
<html lang="de-DE" class="no-js">
<head>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="expires" content="0"> 
	<meta http-equiv="refresh" content="60">
	<meta http-equiv="cache-control" content="no-cache">
	<meta http-equiv="pragma" content="no-cache">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	
    <title>Speedtest</title>

</head>
<body>

<?php

// $STLoaded = True;

include_once 'speeddb.inc';

/* Report the speedtest results */

function speedreport () {
  
  global $mysqli;
  
?>

<h1>Ookla Speedtest-Reports</h1>

<p>Results of the last ten tests</p>

<table class="verybig">
<tr>
<th>Datetime</th>
<th>Ping<br />[ms]</th>
<th>Download<br />[MBit/s]</th>
<th>Upload<br />[MBit/s]</th>
<tr>

<?php

  $queryspeed = "SELECT * FROM speedreports ORDER BY start DESC LIMIT 10;";

  /* Select queries return a resultset */
  if ($speedresult = $mysqli->query($queryspeed)) {
 
    while ($speed = $speedresult->fetch_assoc()) {

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
    $speedresult->close();

  } /* end if */
  
  echo "</table>\n" ;

} /* end of speedreport */

function pingreport_by_url($mysqli,$url) {
  
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
<tr>
<?php 

  $queryping="SELECT * FROM pingreports WHERE url='$url' ORDER BY start DESC LIMIT 20;";

  /* Select queries return a resultset */
  if ($pingresult = $mysqli->query($queryping)) {
 
    while ($ping = $pingresult->fetch_assoc()) {

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
    $pingresult->close();

  } /* end if */

echo "</table>\n" ;

} /* End of pingreport_by_url */

function pingreport ($mysqli) {
   
  global $mysqli;
 
  $urlquery="SELECT DISTINCT url FROM pingreports ORDER BY url;";

  echo "<h1>Results of the last ten ping test ordered by URL</h1>";
  if ($urlresult = $mysqli->query($urlquery)) {
 
    while ($urllist = $urlresult->fetch_assoc()) {

      echo "<h2>" . $urllist["url"] . "</h2>";
      pingreport_by_url($mysqli,$urllist["url"]);
    }/* end while */

    $urlresult->close();
    
  } /* end if */

} /* End of pingreport */


speedreport();
pingreport();

$mysqli->close();
?>
</body>
</html>
