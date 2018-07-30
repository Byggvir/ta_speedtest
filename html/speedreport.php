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
<h1>Speedtest-Reports</h1>

<p>Lastest result</p>

<table class="verybig">
<tr>
<th>Datetime</th>
<th>Ping<br />[ms]</th>
<th>Download<br />[MBit/s]</th>
<th>Upload<br />[MBit/s]</th>
<tr>

<?php

// $STLoaded = True;

include_once 'speeddb.inc';

$querylast= "SELECT * FROM speedreports ORDER BY start DESC LIMIT 10;";

/* Select queries return a resultset */
if ($result = $mysqli->query($querylast)) {
 
  while ($row = $result->fetch_assoc()) {

?>

<tr>
<td class="result"><?php echo $row["start"]; ?></td>
<td class="result"><?php echo sprintf("%0.3f",$row["ping"]); ?></td>
<td class="result"><?php echo sprintf("%0.3f", $row["download"]/1000000) ; ?></td>
<td class="result"><?php echo sprintf("%0.3f",$row["upload"]/1000000) ; ?></td>

</tr>
<?php

  }

  /* free result set */
  $result->close();

}
?>
</table>


<p>Lastest ping results:</p>

<table class="verybig">
<tr>
<th>Datetime</th>
<th>Min<br />[ms]</th>
<th>avg<br />[ms]</th>
<th>max<br />[ms]</th>
<th>mdev<br />[ms]</th>
<tr>



<?php 
$querylast= "SELECT * FROM pingreports ORDER BY start DESC LIMIT 10;";

/* Select queries return a resultset */
if ($result = $mysqli->query($querylast)) {
 
  while ($row = $result->fetch_assoc()) {

?>

<tr>
<td class="result"><?php echo $row["start"]; ?></td>
<td class="result"><?php echo sprintf("%0.3f",$row["minping"]); ?></td>
<td class="result"><?php echo sprintf("%0.3f", $row["avgping"]) ; ?></td>
<td class="result"><?php echo sprintf("%0.3f",$row["maxping"]) ; ?></td>
<td class="result"><?php echo sprintf("%0.3f",$row["mdev"]) ; ?></td>
</tr>
<?php

  }

  /* free result set */
  $result->close();

}

$mysqli->close();

?>
</table>

</body>
</html>
