<?php

require("dbconn.php");
$dist = $_POST['nbseDistrict'];
$school= $_POST['school'];
$main = $_POST['main'];
$tny = $_POST['tny'];
$smi = $_POST['smi'];
$bng = $_POST['bng'];
$alt = $_POST['alt'];
$aon = $_POST['aon'];
$lta = $_POST['lta'];
$hnd = $_POST['hnd'];
$fit = $_POST['fit'];
$hs = $_POST['hs'];
$bk = $_POST['bk'];
$ms = $_POST['ms'];
$ee = $_POST['ee'];
$iv = $_POST['iv'];
$tt = $_POST['tt'];
$hc = $_POST['hc'];
$rt = $_POST['rt'];
$et = $_POST['et'];
$bw = $_POST['bw'];
$mc = $_POST['mc'];
$sl = $_POST['sl'];
$centre = mysql_escape_string($_POST['centre']);
 $exec = mysql_query("update c9_pkChrt_16 set main='$main',school='$centre',
	tny='$tny',
	smi='$smi',
	bng='$bng',
	alt='$alt',
	aon='$aon',
	lta='$lta',
	hnd='$hnd',
	fit='$fit',
	hs='$hs',
	bk='$bk',
	ms='$ms',
	ee='$ee',
	iv='$iv',
	tt='$tt',
	hc='$hc',
	rt='$rt', 
	et='$et',
	bw='$bw',
	mc='$mc'
	where district='$dist' and sl='$sl'") or die(mysql_error());
if($exec){echo "SUCCESSFULLY UPDATED";} else {echo "CONTACT SYSTEM ADMINISTRATOR";}
/*
*/?>