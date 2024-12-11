<?php
require("dbconn.php");
$yr = $_POST['yr'];
$upyr = "update year set year='$yr'";
mysql_query($upyr);

$noti1 = $_POST['noti1'];
$noti2 = $_POST['noti2'];
$noti3 = $_POST['noti3'];
$noti4 = $_POST['noti4'];

$year1 = $_POST['year1'];
$year2 = $_POST['year2'];
$year3 = $_POST['year3'];
$year4 = $_POST['year4'];


$sup1 = $_POST['sup1'];
$sup2 = $_POST['sup2'];
$sup3 = $_POST['sup3'];
$sup4 = $_POST['sup4'];

$update = "update notification_tbl set noti_detail = '$noti1',noti_month_year = '$year1',sup_script = '$sup1' where sl=1";
mysql_query($update);
$update = "update notification_tbl set noti_detail = '$noti2',noti_month_year = '$year2',sup_script = '$sup2' where sl=2";
mysql_query($update);
$update = "update notification_tbl set noti_detail = '$noti3',noti_month_year = '$year3',sup_script = '$sup3' where sl=3";
mysql_query($update);

$update = "update notification_tbl set noti_detail = '$noti4',noti_month_year = '$year4',sup_script = '$sup4' where sl=4";
mysql_query($update);
echo "<BR /><BR /><BR /><BR /><BR /><b><CENTER><h1>"."SUCCESSFULLY SAVED TO THE SERVER";
?>