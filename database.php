<?php

$host = "localhost";
$user = "litbang";
$pass = "w3bl1tb4ng.";
$dbnm = "litbang_rason";

$conn = mysql_connect($host,$user,$pass);
if ($conn) {
	$buka = mysql_select_db($dbnm);
	if (!$buka) {
		die ("database not connected");
	}
}
else {
	die ("server can not connected");
	
}
?>