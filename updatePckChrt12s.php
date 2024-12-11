<?php

require("dbconn.php");
$dist = $_POST['nbseDistrict'];
$centre= $_POST['centre'];
$eng = $_POST['eng'];
$phy = $_POST['phy'];
$che = $_POST['che'];
$bio = $_POST['bio'];
$mat = $_POST['mat'];
$csc = $_POST['csc'];
$inf = $_POST['inf'];
$alt = $_POST['alt'];
$hnd = $_POST['hnd'];
$bng = $_POST['bng'];
$tny = $_POST['tny'];
$smi = $_POST['smi'];
$aon = $_POST['aon'];
$lta = $_POST['lta'];
$centre = mysql_escape_string($_POST['centre']);
$sl = $_POST['sl'];

$exec = mysql_query("update c12s_pkChrt set centre='$centre',
	eng='$eng',
	phy='$phy',
	che='$che',
	bio='$bio',
	mat='$mat',
	csc='$csc',
	inf='$inf',
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