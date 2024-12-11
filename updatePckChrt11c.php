<?php

require("dbconn.php");
$dist = $_POST['nbseDistrict'];
$centre= $_POST['centre'];
$eng = $_POST['eng'];
$fmm = $_POST['fmm'];
$ent = $_POST['ent'];
$bus = $_POST['bus'];
$fbm = $_POST['fbm'];
$evs = $_POST['evs'];
$acc = $_POST['acc'];
$eco = $_POST['eco'];
$muf = $_POST['muf'];
$csc = $_POST['csc'];
$inf = $_POST['inf'];
$itv = $_POST['itv'];
$ttv = $_POST['ttv'];
$rtv = $_POST['rtv'];
$hcv = $_POST['hcv'];
$alt = $_POST['alt'];
$hnd = $_POST['hnd'];
$bng = $_POST['bng'];
$tny = $_POST['tny'];
$smi = $_POST['smi'];
$aon = $_POST['aon'];
$lta = $_POST['lta'];
$centre = mysql_escape_string($_POST['centre']);
$sl = $_POST['sl'];

 $exec = mysql_query("update c11c_pkChrt set centre = '$centre',
 	eng='$eng',
	fmm='$fmm',
	ent='$ent',
	bus='$bus',
	fbm='$fbm',
	evs='$evs',
	acc='$acc',
	eco='$eco',
	muf='$muf',
	csc='$csc',
	inf='$inf',
	itv='$itv',
	ttv='$ttv',
	rtv='$rtv',
	hcv='$hcv',
	alt='$alt',
	hnd='$hnd',
	bng='$bng',
	tny='$tny',
	smi='$smi',
	aon='$aon',
	lta='$lta' where district='$dist' and sl='$sl'") or die(mysql_error());
if($exec){echo "SUCCESSFULLY UPDATED";} else {echo "CONTACT SYSTEM ADMINISTRATOR";}
/*
*/?>