<?php
require("dbconn.php");

// DATE

$date1 = $_POST['e_date1'];
$date2 = $_POST['e_date2'];
$date3 = $_POST['e_date3'];
$date4 = $_POST['e_date4'];
$date5 = $_POST['e_date5'];
$date6 = $_POST['e_date6'];
$date7 = $_POST['e_date7'];
$date8 = $_POST['e_date8'];
$date9 = $_POST['e_date9'];
$date10 = $_POST['e_date10'];
$date11 = $_POST['e_date11'];
$date12 = $_POST['e_date12'];
$date13 = $_POST['e_date13'];
$date14 = $_POST['e_date14'];

// DAY

$day1 = $_POST['day1'];
$day2 = $_POST['day2'];
$day3 = $_POST['day3'];
$day4 = $_POST['day4'];
$day5 = $_POST['day5'];
$day6 = $_POST['day6'];
$day7 = $_POST['day7'];
$day8 = $_POST['day8'];
$day9 = $_POST['day9'];
$day10 = $_POST['day10'];
$day11 = $_POST['day11'];
$day12 = $_POST['day12'];
$day13 = $_POST['day13'];
$day14 = $_POST['day14'];
// SUBJECT

$sub1  = $_POST['subject1'];
$sub2  = $_POST['subject2'];
$sub3  = $_POST['subject3'];
$sub4  = $_POST['subject4'];
$sub5  = $_POST['subject5'];
$sub6  = $_POST['subject6'];
$sub7  = $_POST['subject7'];
$sub8  = $_POST['subject8'];
$sub9  = $_POST['subject9'];
$sub10  = $_POST['subject10'];
$sub11 = $_POST['subject11'];
$sub12 = $_POST['subject12'];
$sub13 = $_POST['subject13'];
$sub14 = $_POST['subject14'];

//SUBCODE

$subcode1 = $_POST['sub1'];
$subcode2 = $_POST['sub2'];
$subcode3 = $_POST['sub3'];
$subcode4 = $_POST['sub4'];
$subcode5 = $_POST['sub5'];
$subcode6 = $_POST['sub6'];
$subcode7 = $_POST['sub7'];
$subcode8 = $_POST['sub8'];
$subcode9 = $_POST['sub9'];
$subcode10 = $_POST['sub10'];
$subcode11 = $_POST['sub11'];
$subcode12 = $_POST['sub12'];
$subcode13 = $_POST['sub13'];
$subcode14 = $_POST['sub14'];

$update = "update c12s_timetbl set e_date = '$date1',day = '$day1',subject = '$sub1',subcode='$subcode1' where sl=1";
mysql_query($update);
$update = "update c12s_timetbl set e_date = '$date2',day = '$day2',subject = '$sub2',subcode='$subcode2' where sl=2";
mysql_query($update);
$update = "update c12s_timetbl set e_date = '$date3',day = '$day3',subject = '$sub3',subcode='$subcode3' where sl=3";
mysql_query($update);
$update = "update c12s_timetbl set e_date = '$date4',day = '$day4',subject = '$sub4',subcode='$subcode4' where sl=4"; 
mysql_query($update);
$update = "update c12s_timetbl set e_date = '$date5',day = '$day5',subject = '$sub5',subcode='$subcode5' where sl=5";
mysql_query($update);
$update = "update c12s_timetbl set e_date = '$date6',day = '$day6',subject = '$sub6',subcode='$subcode6' where sl=6";
mysql_query($update);
$update = "update c12s_timetbl set e_date = '$date7',day = '$day7',subject = '$sub7',subcode='$subcode7' where sl=7";
mysql_query($update);
$update = "update c12s_timetbl set e_date = '$date8',day = '$day8',subject = '$sub8',subcode='$subcode8' where sl=8";
mysql_query($update);
$update = "update c12s_timetbl set e_date = '$date9',day = '$day9',subject = '$sub9',subcode='$subcode9' where sl=9";
mysql_query($update);
$update = "update c12s_timetbl set e_date = '$date10',day = '$day10',subject = '$sub10',subcode='$subcode10' where sl=10";
mysql_query($update);
$update = "update c12s_timetbl set e_date = '$date11',day = '$day11',subject = '$sub11',subcode='$subcode11' where sl=11";
mysql_query($update);
$update = "update c12s_timetbl set e_date = '$date12',day = '$day12',subject = '$sub12',subcode='$subcode12' where sl=12";
mysql_query($update);
$update = "update c12s_timetbl set e_date = '$date13',day = '$day13',subject = '$sub13',subcode='$subcode13' where sl=13";
mysql_query($update);
$update = "update c12s_timetbl set e_date = '$date14',day = '$day14',subject = '$sub14',subcode='$subcode14' where sl=14";
mysql_query($update);


echo "<BR /><BR /><BR /><BR /><BR /><b><CENTER><h1>"."SUCCESSFULLY SAVED TO THE SERVER";

?>