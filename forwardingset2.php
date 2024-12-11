<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="main.css" rel="stylesheet" type="text/css" media="print" />
<style type="text/css">
.tail{
	float:right;
	position:static;
	vertical-align:baseline;}
</style>
<title>Untitled Document</title>
</head>

<body style="size:portrait; width:8.27in; height:11.69in;" onload="javascript:print()" >
<?php
	require("dbconn.php");
	$dist=$_POST['nbseDistrict'];
	$tableName = 'c9_pkChrt_16';
	
	$sql=mysql_query("select * from $tableName where district='$dist'");
	while($row=mysql_fetch_array($sql,MYSQL_ASSOC))
	{
//*************************************//
//   SECOND LANGAUGE
//*************************************//

		if(!empty($row['aon'])){ $tot1=1;} else {$tot1=0;}
		if(!empty($row['smi'])){ $tot2=1;} else {$tot2=0;}
		if(!empty($row['lta'])){ $tot3=1;} else {$tot3=0;}
		if(!empty($row['hnd'])){ $tot4=1;} else {$tot4=0;}
		if(!empty($row['bng'])){ $tot5=1;} else {$tot5=0;}
		if(!empty($row['alt'])){ $tot6=1;} else {$tot6=0;}
		if(!empty($row['tny'])){ $tot14=1;} else {$tot14=0;}
	
//*************************************//
//   6th subject
//*************************************//
	/*	if(!empty($row['fit'])){ $tot7=1;} else {$tot7=0;}
		if(!empty($row['ms'])){ $tot8=1;} else {$tot8=0;}
		if(!empty($row['hs'])){ $tot9=1;} else {$tot9=0;}
		if(!empty($row['bk'])){ $tot10=1;} else {$tot10=0;}
		if(!empty($row['ee'])){ $tot11=1;} else {$tot11=0;}
		if(!empty($row['iv'])){ $tot12=1;} else {$tot12=0;}
		if(!empty($row['tt'])){ $tot13=1;} else {$tot13=0;}
*/

		$tot=$tot1+$tot2+$tot3+$tot4+$tot5+$tot6+$tot14+4;
		
		

?>
<div class="single_record">
<div style="float:right; position:static"><strong><font size="+2">Set II</font></strong></div>
<table width="100%" border="0">
  <tr>
    <td colspan="5" align="center"><font size="+2"><strong>Nagaland Board of School Education</strong></font></td>
  </tr>
  <tr>
    <td colspan="5" align="center"><font size="+2"><strong>Kohima</strong></font></td>
  </tr>
   <tr>
    <td colspan="4" align="left"><font size="+1">NO.NBE-1/EX-9/2016-17/</font></td>
    <td align="right">Dated Kohima, the&nbsp;&nbsp;&nbsp; November, 2016</td>
    </tr>
  </table>
   <table width="100%" border="0" style="font-size:18px">
  <tr>
    <td>To</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>The Centre Superintendent/Head of Institution,</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><font size="+1"><u><strong><?php echo $row['school'];?></strong></u></font> &nbsp;Centre.</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Subject:-</td>
    <td><u>ISSUE OF CONFIDENTIAL PAPERS AND INSTRUCTIONS.</u></td>
  </tr>
  <tr>
    <td>Sir/Madam,</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>Please find herewith <?php echo "<strong>"."<u>".$tot."</u>"."  "."</strong>";?>nos. of confidential packets for the Class-IX </td>
  </tr>
  <tr>
  	<td>&nbsp;</td>
    <td>Final Examination <?php echo date('Y');?> containing the following subjects:</td>
    </tr>
</table>
<table width="100%" border="0" style="font-size:16px">
  <tr>
    <td width="8%"><u>Slno.</u></td>
    <td width="21%"></td>
    <td width="54%"><u>Subject</u></td>
    <td width="17%"><u>No. of Copies</u></td>
  </tr>
  <?php 
  $sl=1;
  $ss=mysql_query("select * from c9_timetbl order by sl asc");
			while($rr=mysql_fetch_array($ss,MYSQL_ASSOC)){
				
			if($rr['subject']=='Mils'){?>
  <tr>
    <td><?php echo $sl;?>.</td>
    <td><?php // echo $rr['e_date'];?></td>
    <td>Second Language</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>(i) Tenyidie</td>
    <td><?php if(!empty($row['tny'])){$tny=$row['tny']; echo "<strong>2</strong>";} else echo "___"; ?> copies</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>(ii) Ao</td>
    <td><?php if(!empty($row['aon'])){$ao=$row['aon']; echo "<strong>2</strong>";} else echo "___"; ?> copies</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>(iii) Sumi</td>
    <td><?php if(!empty($row['smi'])){$smi=$row['smi']; echo "<strong>2</strong>";} else echo "___"; ?> copies</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>(iv) Lotha</td>
    <td><?php if(!empty($row['lta'])){$lta=$row['lta']; echo "<strong>2</strong>";} else echo "___"; ?> copies</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>(v) Hindi</td>
    <td><?php if(!empty($row['hnd'])){$hnd=$row['hnd']; echo "<strong>2</strong>";} else echo "___"; ?> copies</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>(vi) Bengali</td>
    <td><?php if(!empty($row['bng'])){$bng=$row['bng']; echo "<strong>2</strong>";} else echo "___"; ?> copies</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>(vii) Alternative English</td>
    <td><?php if(!empty($row['alt'])){$alt=$row['alt']; echo "<strong>2</strong>";} else echo "___"; ?> copies</td>
  </tr>
  <tr><?php } elseif($rr['subject']=='6th') 
  {}
  else  
  {?>
   <tr>
    <td><?php echo $sl;?>.</td>
    <td><?php // echo $rr['e_date'];?></td>
    <td><?php echo $rr['subject'];?></td>
    <td><?php echo "<strong>5</strong>";?>&nbsp; copies</td>
  </tr>
  <?php 
    } $sl++;} ?>
  
</table>
<p></p>
<table width="100%" border="0">
  <tr>
    <td>Note:</td>
    <td>i.</td>
    <td>The date of examination shall be notified later by the board.</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>ii.</td>
    <td><strong>The Centre Superintendent/Head of Institution must be present in the school/centre</strong></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><strong>during the conduct of the examination and he/she cannot delegate the duties to a </strong></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><strong>subordinate.</strong></td>
  </tr>
</table>
<br />
Received ________________ nos.
<br /><br /><br />
<p>1. Signature with date ______________________________</p>
<p>2. Name _____________________________________________</p>
<p>3. Designation ______________________________________</p>
<div align="right">
<table border="0">
  <tr>
    <td></td>
  </tr>
  
  <tr>
    <td align="center">(Rangumbuing Nsarangbe)</td>
  </tr>
  <tr>
    <td height="21" align="center"><strong>Controller of Examinations</strong></td>
      </tr>
</table>
</div></div>
<?php }?>
</body>
</html>