<?php

/*
 * Autor: Thomas Arend
 * Stand: 30.12.2018
 *
 * Better quick and dirty than perfect but never!
 *
 * Security token to detect direct calls of included libraries. */

/*
 * The user speedviewer needs / has only read access to the database,
 * he can't do much harm with this.
 */

global $SpeedTest;
isset($SpeedTest) or exit ( "No direct calls!" ) ;

$dbhost = "localhost";
$dbname = "speedtest";
$dbuser = "speedviewer";
$dbpass = "Ahsoo3feeshaeyae";
$dbdb   = "speedtest";

$mysqli = new mysqli($dbhost, $dbuser,$dbpass,$dbdb) or die();

?>
