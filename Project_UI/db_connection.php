<?php
 
$mysql_hostname = "localhost"; // Example : localhost
$mysql_user     = "root";
$mysql_password = "";
$mysql_database = "pro3";

$bd = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Oops some thing went wrong");
mysql_select_db($mysql_database, $bd) or die("Oops some thing went wrong");

?>