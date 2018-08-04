<?php

global $SpeedTest;

isset($SpeedTest) or exit ("No direct calls!" ) ;

$dbhost = "localhost";
$dbname = "speedtest";
$dbuser = "speedviewer";
$dbpass = "Ahsoo3feeshaeyae";
$dbdb   = "speedtest";

$mysqli = new mysqli($dbhost, $dbuser,$dbpass,$dbdb) or die();

?>
