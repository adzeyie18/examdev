<?php
require("dbconn.php");

$noti1 = $_POST['noti1'];
$noti2 = $_POST['noti2'];
$noti3 = $_POST['noti3'];
$noti4 = $_POST['noti4'];

$year1 = $_POST['year1'];
$year2 = $_POST['year2'];
$year3 = $_POST['year3'];
$year4 = $_POST['year4'];




$update = "update timing_tbl set exam_time = '$noti1',voc_time = '$year1' where sl=1";
mysql_query($update);
$update = "update timing_tbl set exam_time = '$noti2',voc_time = '$year2' where sl=2";
mysql_query($update);
$update = "update timing_tbl set exam_time = '$noti3',voc_time = '$year3' where sl=3";
mysql_query($update);

$update = "update timing_tbl set exam_time = '$noti4',voc_time = '$year4' where sl=4";
mysql_query($update);
echo "<BR /><BR /><BR /><BR /><BR /><b><CENTER><h1>"."SUCCESSFULLY SAVED TO THE SERVER";
?>