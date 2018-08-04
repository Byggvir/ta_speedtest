<!DOCTYPE html>
<?php

/* Security token to detect direct calls of includes libraries. */ 

$SpeedTest = "Started";

include_once "speeddb.php" ;
include_once "speedlib.php" ;
include_once "pinglib.php" ;
?>

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

<h1>Ookla Speedtest-Reports</h1>

<p>Results of the last ten tests</p>

<table class="verybig">
<tr>
<th>Datetime</th>
<th>Ping<br />[ms]</th>
<th>Download<br />[MBit/s]</th>
<th>Upload<br />[MBit/s]</th>
</tr>

<?php

SpeedReportTableRows();

?>
</table>

<h1>Results of the last ten ping test ordered by URL</h1>

<?php

PingReport();

$mysqli->close();
?>
</body>
</html>
