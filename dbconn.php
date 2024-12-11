<?php

$dbhost= "localhost";
$dbuser= "root";
$dbpssd= "";
$con=mysql_connect($dbhost,$dbuser,$dbpssd)
	or die("connection failed<br/>");
$sql=mysql_select_db("nbse");
?>