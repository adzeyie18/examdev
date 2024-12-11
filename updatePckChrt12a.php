<?php

require("dbconn.php");
$dist = $_POST['nbseDistrict'];
$centre= $_POST['centre'];
$eng = $_POST['eng'];
$edn = $_POST['edn'];
$psy = $_POST['psy'];
$geo = $_POST['geo'];
$msc = $_POST['msc'];
$his = $_POST['his'];
$sgy = $_POST['sgy'];
$psc = $_POST['psc'];
$eco = $_POST['eco'];
$phi = $_POST['phi'];
$csc = $_POST['csc'];
$inf = $_POST['inf'];
$itv = $_POST['itv'];
$ttv = $_POST['ttv'];
$rtv = $_POST['rtv'];
$hcv = $_POST['hcv'];
$ehv = $_POST['ehv'];
$btv = $_POST['btv'];
$msv = $_POST['msv'];
$fmm = $_POST['fmm'];
$mm = $_POST['mm'];
$graph = $_POST['graph'];
$alt = $_POST['alt'];
$hnd = $_POST['hnd'];
$bng = $_POST['bng'];
$tny = $_POST['tny'];
$smi = $_POST['smi'];
$aon = $_POST['aon'];
$lta = $_POST['lta'];
$centre = mysql_escape_string($_POST['centre']);
$sl = $_POST['sl'];

 $exec=mysql_query("update c12a_pkChrt set centre='$centre',
 	eng='$eng',
	edn='$edn',
	psy='$psy',
	geo='$geo',
	msc='$msc',
	his='$his',
	sgy='$sgy',
	psc='$psc',
	eco='$eco',
	phi='$phi',
	csc='$csc',
	inf='$inf',
	itv='$itv',
	ttv='$ttv',
	rtv='$rtv',
	hcv='$hcv',
	ehv='$ehv',
	btv='$btv',
	msv='$msv',
	fmm='$fmm',
	mm='$mm',
	graph='$graph',
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