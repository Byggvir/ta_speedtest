<!DOCTYPE html>
<html lang="de-DE" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Speedtest</title>
<style type="text/css">

table {
  
  border : 2px solid blue;
  
}
td {
  padding : 0.2em;
  margin: 0.3em
  
}
.verybig {
   font-size :5em;

}

.parameter {
  background : lightgray ;

}

.result {
  text-align : right ;
}

</style>
</head>
<body>
<h1>Speedtest-Reports</h1>

<p>Lastest result</p>

<table class="verybig">
<?php

// $STLoaded = True;

include_once 'speeddb.inc';

$querylast= "SELECT * FROM reports ORDER BY start DESC LIMIT 1;";

/* Select queries return a resultset */
if ($result = $mysqli->query($querylast)) {
 
  while ($row = $result->fetch_row()) {

?>
<tr><td class="parameter">Ping:</td><td class="result"><?php echo sprintf("%0.3f",$row[6]); ?></td><td>ms</td></tr>
<tr><td class="parameter">Download:</td><td class="result"><?php echo sprintf("%0.3f", $row[7]/1000000) ; ?></td><td>MBit/s</td></tr>
<tr><td class="parameter">Upload:</td><td class="result"><?php echo sprintf("%0.3f",$row[8]/1000000) ; ?></td><td>MBit/s</td></tr>
<tr><td class="parameter">Datum:</td><td class="result" colspan="2"><?php echo preg_replace("/ /","<br />",$row[4]); ?></td></tr>
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
