<?php

require("dbconn.php");
$dist = $_POST['nbseDistrict'];
$school= $_POST['school'];

$eng = $_POST['eng'];
$mata = $_POST['mata'];
$matb = $_POST['matb'];
$ss = $_POST['ss'];
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
$hv = $_POST['hv'];
$rv = $_POST['rv'];
$ev = $_POST['ev'];
$bv = $_POST['bv'];
$mv = $_POST['mv'];
$sc = $_POST['sc'];
$pv = $_POST['pv'];
$mm = $_POST['mm'];
$graph = $_POST['graph'];
$centre = mysql_escape_string($_POST['centre']);
$sl = $_POST['sl'];
 $exec = mysql_query("update c10_pkChrt_16 set school='$centre',
 	eng='$eng',
	mata='$mata',
	matb='$matb',
	ss='$ss',
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
	hv='$hv',
	rv='$rv',
	ev='$ev',
	bv='$bv',
	mv='$mv',
	sc='$sc',
	pv='$pv',
	mm='$mm',
	graph='$graph'
	where district='$dist' and sl='$sl'") or die(mysql_error());
 if($exec){echo "SUCCESSFULLY UPDATED";} else {echo "CONTACT SYSTEM ADMINISTRATOR";}

/*
*/?>