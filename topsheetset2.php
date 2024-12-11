<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="../css/main.css" rel="stylesheet" type="text/css" media="print" />
<title>Untitled Document</title>
</head>

<body style="size:portrait; width:8.27in; height:11.69in;" onload="javascript:print()" >
<?php
require("dbconn.php");
$dist=$_POST['nbseDistrict'];
$sub=$_POST['sub'];

if($sub=="MATHEMATICS" || $sub=="ENGLISH" || $sub=="SOCIAL SCIENCES" || $sub=="SCIENCE")
{
	if($sub=='ENGLISH') $date= "9th December 2015"; 
	if($sub=='SCIENCE') $date= "8th December 2015";
	if($sub=='MATHEMATICS') $date= "14th December 2015";
	if($sub=='SOCIAL SCIENCES') $date= "11th December 2015";
	$time='9:00 a.m. to 12:00 noon';
	$r=mysql_query("select * from c9_pkChrt_16 where district='$dist' and main>0 ") or die(mysql_error());
while($row=mysql_fetch_array($r,MYSQL_ASSOC))
{
			?><br /><br />
<div class="single_record">
<table width="100%" border="0">
  <tr>
    <td colspan="5" align="center"><font size="+2"><strong>Nagaland Board of School Education</strong></font></td>
  </tr>
  <tr>
    <td colspan="5" align="center"><font size="+2"><strong>Kohima</strong></font></td>
  </tr>
  <tr>
    <td height="36" colspan="5" align="center"><font size="+3"><strong>Class - IX Final Examination <?php echo date('Y');?></strong></font></td>
  </tr>
  <tr height="2">
    <td width="8%">&nbsp;</td>
    <td width="26%">&nbsp;</td>
    <td width="23%">&nbsp;</td>
    <td width="16%">&nbsp;</td>
    <td width="27%">&nbsp;</td>
  </tr>
  <tr>
    <td height="31" colspan="3"><font size="+1">Date of examination : &nbsp;&nbsp;&nbsp;&nbsp;<strong>
      <?php echo $date;
	  /*
	if($sub=='TENYIDIE'||$sub=='AO'||$sub=='SUMI'||$sub=='LOTHA'||$sub=='HINDI'||$sub=='BENGALI'||$sub=='ALTERNATIVE ENGLISH') echo "10th December 2015";
	if($sub=='FIT'||$sub=='MUSIC'||$sub=='HOME SCIENCE'||$sub=='BK & ACCOUNTANCY'||$sub=='ENVIRONMENTAL EDUCATION'||$sub=='TT'||$sub=='IT(VOCATIONAL)') echo "12th December 2015";
	*/?>
    </strong></font></td>
    <td colspan="2" align="right"><font size="+1">Time: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>
      <?php echo $time;?>
    </strong></font></td>
  </tr>
  <tr>
    <td>Subject : </td>
    <td colspan="2"><strong><font size="+3"><?php echo $sub;?></font></strong></td>
     <td colspan="2"><font size="+1">Copies of question papers enclosed</font> :&nbsp;&nbsp;<font size="+3"><strong><?php echo "5";?></strong></font></td>
    
  </tr>
  <tr>
    <td height="31">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center">.....................................................................</td>
    <td>&nbsp;</td>
    <td colspan="2" align="center">.....................................................................</td>
  </tr>
  <tr>
    <td height="33" colspan="2" align="center"><font size="+1">counted by</font></td>
    <td>&nbsp;</td>
    <td colspan="2" align="center"><font size="+1">verified &amp; packed by</font></td>
  </tr>
  <tr>
    <td height="29" colspan="5"><font size="+1">Name of the School/Centre</font><strong><font size="+2">&nbsp;&nbsp;&nbsp;<?php echo $row['school'];?></font></strong></td>
    </tr>
  <tr>
    <td height="53">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2" align="center" valign="bottom"><img src="aaa.gif"  height="49" width="238"/></td>
  </tr>
  <tr>
    <td height="37">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2" align="center" valign="top"><font size="+1"><strong>Controller of Examinations</strong></font></td>
  </tr>
</table></div><br /><br /><br /><br /><br /><br />
<?php }}

else if($sub=="tny" || $sub=="smi" || $sub=="aon" || $sub=="lta" || $sub=="bng" || $sub=="alt" || $sub=="hnd")
{
	$sub1="MILS";$date='asdfasd';
	
	$r=mysql_query("select * from c9_pkChrt_16 where district='$dist' and $sub>0 ") or die(mysql_error());
	if($sub=='tny'){ $sub="TENYIDIE";  }
	if($sub=='aon'){ $sub="AO";  }
	if($sub=='hnd'){ $sub="HINDI";  }
	if($sub=='lta'){ $sub="lotha";  }
	if($sub=='bng'){ $sub="bengali";  }
	if($sub=='alt'){ $sub="alternative english";  }
	if($sub=='smi'){ $sub="sumi";  }
	$time='9:00 a.m. to 12:00 noon';
while($row=mysql_fetch_array($r,MYSQL_ASSOC))
{
			?><br /><br />
<div class="single_record">
<table width="100%" border="0">
  <tr>
    <td colspan="5" align="center"><font size="+2"><strong>Nagaland Board of School Education</strong></font></td>
  </tr>
  <tr>
    <td colspan="5" align="center"><font size="+2"><strong>Kohima</strong></font></td>
  </tr>
  <tr>
    <td height="36" colspan="5" align="center"><font size="+3"><strong>Class - IX Final Examination <?php echo date('Y');?></strong></font></td>
  </tr>
  <tr height="2">
    <td width="8%">&nbsp;</td>
    <td width="31%">&nbsp;</td>
    <td width="15%">&nbsp;</td>
    <td width="16%">&nbsp;</td>
    <td width="30%">&nbsp;</td>
  </tr>
  <tr>
    <td height="31" colspan="3"><font size="+1">Date of examination : &nbsp;&nbsp;&nbsp;&nbsp;<strong>
      <?php echo $date;
	  /*
	if($sub=='TENYIDIE'||$sub=='AO'||$sub=='SUMI'||$sub=='LOTHA'||$sub=='HINDI'||$sub=='BENGALI'||$sub=='ALTERNATIVE ENGLISH') echo "10th December 2015";
	if($sub=='FIT'||$sub=='MUSIC'||$sub=='HOME SCIENCE'||$sub=='BK & ACCOUNTANCY'||$sub=='ENVIRONMENTAL EDUCATION'||$sub=='TT'||$sub=='IT(VOCATIONAL)') echo "12th December 2015";
	*/?>
    </strong></font></td>
    <td colspan="2" align="right"><font size="+1">Time: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>
      <?php echo $time;?>
    </strong></font></td>
  </tr>
  <tr>
    <td>Subject : </td>
    <td colspan="2"><strong><font size="+3"><?php echo strtoupper($sub);?></font></strong></td>
    <td colspan="2"><font size="+1">Copies of question papers enclosed</font> :&nbsp;&nbsp;&nbsp;<font size="+3"><strong><?php echo "5";?></strong></font></td>
    
  </tr>
  <tr>
    <td height="31">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center">.....................................................................</td>
    <td>&nbsp;</td>
    <td colspan="2" align="center">.....................................................................</td>
  </tr>
  <tr>
    <td height="33" colspan="2" align="center"><font size="+1">counted by</font></td>
    <td>&nbsp;</td>
    <td colspan="2" align="center"><font size="+1">verified &amp; packed by</font></td>
  </tr>
  <tr>
    <td height="29" colspan="5"><font size="+1">Name of the School/Centre</font><strong><font size="+2">&nbsp;&nbsp;&nbsp;<?php echo $row['school'];?></font></strong></td>
    </tr>
  <tr>
    <td height="53">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2" align="center" valign="bottom"><img src="aaa.gif"  height="49" width="238"/></td>
  </tr>
  <tr>
    <td height="37">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2" align="center" valign="top"><font size="+1"><strong>Controller of Examinations</strong></font></td>
  </tr>
</table></div><br /><br /><br /><br /><br /><br />
<?php }}
else if($sub=="fit" || $sub=="hs" || $sub=="bk" || $sub=="ms" || $sub=="ee" || $sub=="iv" || $sub=="tt")
{
	$sub1="6th";$date='asdfasd';
	
	$r=mysql_query("select * from c9_pkChrt_16 where district='$dist' and $sub>0 ") or die(mysql_error());
	if($sub=='fit'){ $sub="foundation of information technology"; $time='9:00 a.m. to 12:00 noon'; }
	if($sub=='hs'){ $sub="home science";  $time='9:00 a.m. to 12:00 noon';}
	if($sub=='bk'){ $sub="bk & accountancy";  $time='9:00 a.m. to 12:00 noon';}
	if($sub=='ms'){ $sub="music";  $time='9:00 a.m. to 12:00 noon';}
	if($sub=='ee'){ $sub="environmental education"; $time='9:00 a.m. to 12:00 noon'; }
	if($sub=='iv'){ $sub="it(vocational)"; $time='9:00 a.m. to 11:00 a.m.'; }
	if($sub=='tt'){ $sub="travel & tourism"; $time='9:00 a.m. to 11:00 a.m.'; }
while($row=mysql_fetch_array($r,MYSQL_ASSOC))
{
			?><br /><br />
<div class="single_record">
<table width="100%" border="0">
  <tr>
    <td colspan="5" align="center"><font size="+2"><strong>Nagaland Board of School Education</strong></font></td>
  </tr>
  <tr>
    <td colspan="5" align="center"><font size="+2"><strong>Kohima</strong></font></td>
  </tr>
  <tr>
    <td height="36" colspan="5" align="center"><font size="+3"><strong>Class - IX Final Examination <?php echo date('Y');?></strong></font></td>
  </tr>
  <tr height="2">
    <td width="8%">&nbsp;</td>
    <td width="26%">&nbsp;</td>
    <td width="23%">&nbsp;</td>
    <td width="16%">&nbsp;</td>
    <td width="27%">&nbsp;</td>
  </tr>
  <tr>
    <td height="31" colspan="3"><font size="+1">Date of examination : &nbsp;&nbsp;&nbsp;&nbsp;<strong>
      <?php echo $date;
	  /*
	if($sub=='TENYIDIE'||$sub=='AO'||$sub=='SUMI'||$sub=='LOTHA'||$sub=='HINDI'||$sub=='BENGALI'||$sub=='ALTERNATIVE ENGLISH') echo "10th December 2015";
	if($sub=='FIT'||$sub=='MUSIC'||$sub=='HOME SCIENCE'||$sub=='BK & ACCOUNTANCY'||$sub=='ENVIRONMENTAL EDUCATION'||$sub=='TT'||$sub=='IT(VOCATIONAL)') echo "12th December 2015";
	*/?>
    </strong></font></td>
    <td colspan="2" align="right"><font size="+1">Time: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>
      <?php echo $time;?>
    </strong></font></td>
  </tr>
  <tr>
    <td>Subject : </td>
    <td colspan="2"><strong><font size="+3"><?php echo strtoupper($sub);?></font></strong></td>
    <td colspan="2"><font size="+1">Copies of question papers enclosed</font> :&nbsp;&nbsp;&nbsp;<font size="+3"><strong><?php echo "5";?></strong></font></td>
    
  </tr>
  <tr>
    <td height="31">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center">.....................................................................</td>
    <td>&nbsp;</td>
    <td colspan="2" align="center">.....................................................................</td>
  </tr>
  <tr>
    <td height="33" colspan="2" align="center"><font size="+1">counted by</font></td>
    <td>&nbsp;</td>
    <td colspan="2" align="center"><font size="+1">verified &amp; packed by</font></td>
  </tr>
  <tr>
    <td height="29" colspan="5"><font size="+1">Name of the School/Centre</font><strong><font size="+2">&nbsp;&nbsp;&nbsp;<?php echo $row['school'];?></font></strong></td>
    </tr>
  <tr>
    <td height="11" colspan="5">&nbsp;</td>
    </tr>
  <tr>
    <td height="53">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2" align="center" valign="bottom"><img src="aaa.gif"  height="49" width="238"/></td>
  </tr>
  <tr>
    <td height="37">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2" align="center" valign="top"><font size="+1"><strong>Controller of Examinations</strong></font></td>
  </tr>
</table></div><br /><br /><br /><br /><br />
<?php }}


?>

</body>
</html>