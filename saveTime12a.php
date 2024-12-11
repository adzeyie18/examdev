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
$date15 = $_POST['e_date15'];
$date16 = $_POST['e_date16'];
$date17 = $_POST['e_date17'];
$date18 = $_POST['e_date18'];
$date19 = $_POST['e_date19'];
$date20 = $_POST['e_date20'];
$date21 = $_POST['e_date21'];
$date22 = $_POST['e_date22'];
$date23 = $_POST['e_date23'];

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
$day15 = $_POST['day15'];
$day16 = $_POST['day16'];
$day17 = $_POST['day17'];
$day18 = $_POST['day18'];
$day19 = $_POST['day19'];
$day20 = $_POST['day20'];
$day21 = $_POST['day21'];
$day22 = $_POST['day22'];
$day23 = $_POST['day23'];


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
$sub11  = $_POST['subject11'];
$sub12  = $_POST['subject12'];
$sub13  = $_POST['subject13'];
$sub14  = $_POST['subject14'];
$sub15  = $_POST['subject15'];
$sub16  = $_POST['subject16'];
$sub17  = $_POST['subject17'];
$sub18  = $_POST['subject18'];
$sub19  = $_POST['subject19'];
$sub20  = $_POST['subject20'];
$sub21  = $_POST['subject21'];
$sub22  = $_POST['subject22'];
$sub23  = $_POST['subject23'];

// SUBCODE

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
$subcode15 = $_POST['sub15'];
$subcode16 = $_POST['sub16'];
$subcode17 = $_POST['sub17'];
$subcode18 = $_POST['sub18'];
$subcode19 = $_POST['sub19'];
$subcode20 = $_POST['sub20'];
$subcode21 = $_POST['sub21'];
$subcode22 = $_POST['sub22'];
$subcode23 = $_POST['sub23'];


$update = "update c12a_timetbl set e_date = '$date1',day = '$day1',subject = '$sub1', subcode = '$subcode1' where sl=1";
mysql_query($update);
$update = "update c12a_timetbl set e_date = '$date2',day = '$day2',subject = '$sub2', subcode = '$subcode2' where sl=2";
mysql_query($update);
$update = "update c12a_timetbl set e_date = '$date3',day = '$day3',subject = '$sub3', subcode = '$subcode3' where sl=3";
mysql_query($update);
$update = "update c12a_timetbl set e_date = '$date4',day = '$day4',subject = '$sub4', subcode = '$subcode4' where sl=4"; 
mysql_query($update);
$update = "update c12a_timetbl set e_date = '$date5',day = '$day5',subject = '$sub5', subcode = '$subcode5' where sl=5";
mysql_query($update);
$update = "update c12a_timetbl set e_date = '$date6',day = '$day6',subject = '$sub6', subcode = '$subcode6' where sl=6";
mysql_query($update);
$update = "update c12a_timetbl set e_date = '$date7',day = '$day7',subject = '$sub7', subcode = '$subcode7' where sl=7";
mysql_query($update);
$update = "update c12a_timetbl set e_date = '$date8',day = '$day8',subject = '$sub8', subcode = '$subcode8' where sl=8";
mysql_query($update);
$update = "update c12a_timetbl set e_date = '$date9',day = '$day9',subject = '$sub9', subcode = '$subcode9' where sl=9";
mysql_query($update);
$update = "update c12a_timetbl set e_date = '$date10',day = '$day10',subject = '$sub10', subcode = '$subcode10' where sl=10";
mysql_query($update);
$update = "update c12a_timetbl set e_date = '$date11',day = '$day11',subject = '$sub11', subcode = '$subcode11' where sl=11";
mysql_query($update);
$update = "update c12a_timetbl set e_date = '$date12',day = '$day12',subject = '$sub12', subcode = '$subcode12' where sl=12";
mysql_query($update);
$update = "update c12a_timetbl set e_date = '$date13',day = '$day13',subject = '$sub13', subcode = '$subcode13' where sl=13";
mysql_query($update);
$update = "update c12a_timetbl set e_date = '$date14',day = '$day14',subject = '$sub14', subcode = '$subcode14' where sl=14";
mysql_query($update);
$update = "update c12a_timetbl set e_date = '$date15',day = '$day15',subject = '$sub15', subcode = '$subcode15' where sl=15";
mysql_query($update);
$update = "update c12a_timetbl set e_date = '$date16',day = '$day16',subject = '$sub16', subcode = '$subcode16' where sl=16";
mysql_query($update);
$update = "update c12a_timetbl set e_date = '$date17',day = '$day17',subject = '$sub17', subcode = '$subcode17' where sl=17";
mysql_query($update);
$update = "update c12a_timetbl set e_date = '$date18',day = '$day18',subject = '$sub18', subcode = '$subcode18' where sl=18";
mysql_query($update);
$update = "update c12a_timetbl set e_date = '$date19',day = '$day19',subject = '$sub19', subcode = '$subcode19' where sl=19";
mysql_query($update);
$update = "update c12a_timetbl set e_date = '$date20',day = '$day20',subject = '$sub20', subcode = '$subcode20' where sl=20";
mysql_query($update);
$update = "update c12a_timetbl set e_date = '$date21',day = '$day21',subject = '$sub21', subcode = '$subcode21' where sl=21";
mysql_query($update);
$update = "update c12a_timetbl set e_date = '$date22',day = '$day22',subject = '$sub22', subcode = '$subcode22' where sl=22";
mysql_query($update);
$update = "update c12a_timetbl set e_date = '$date23',day = '$day23',subject = '$sub23', subcode = '$subcode23' where sl=23";
mysql_query($update);


echo "<BR /><BR /><BR /><BR /><BR /><b><CENTER><h1>"."SUCCESSFULLY SAVED TO THE SERVER";

?>