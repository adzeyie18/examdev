<?php
require("dbconn.php");
$date1 = $_POST['e_date1'];
$date2 = $_POST['e_date2'];
$date3 = $_POST['e_date3'];
$date4 = $_POST['e_date4'];
$date5 = $_POST['e_date5'];
$date6 = $_POST['e_date6'];


$sub1  = $_POST['subject1'];
$sub2  = $_POST['subject2'];
$sub3  = $_POST['subject3'];
$sub4  = $_POST['subject4'];
$sub5  = $_POST['subject5'];
$sub6  = $_POST['subject6'];


$day1  = $_POST['day1'];
$day2  = $_POST['day2'];
$day3  = $_POST['day3'];
$day4  = $_POST['day4'];
$day5  = $_POST['day5'];
$day6  = $_POST['day6'];

$update = "update c10_timetbl set e_date = '$date1',day = '$day1',subject = '$sub1' where sl=1";
mysql_query($update);
$update = "update c10_timetbl set e_date = '$date2',day = '$day2',subject = '$sub2' where sl=2";
mysql_query($update);
$update = "update c10_timetbl set e_date = '$date3',day = '$day3',subject = '$sub3' where sl=3";
mysql_query($update);
$update = "update c10_timetbl set e_date = '$date4',day = '$day4',subject = '$sub4' where sl=4"; 
mysql_query($update);
$update = "update c10_timetbl set e_date = '$date5',day = '$day5',subject = '$sub5' where sl=5";
mysql_query($update);
$update = "update c10_timetbl set e_date = '$date6',day = '$day6',subject = '$sub6' where sl=6";
mysql_query($update);

echo "<BR /><BR /><BR /><BR /><BR /><b><CENTER><h1>"."SUCCESSFULLY SAVED TO THE SERVER";

?>