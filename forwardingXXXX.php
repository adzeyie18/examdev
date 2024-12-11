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
  $class = $_POST['class'];
  if($class=='9')
	{
	$sql=mysql_query("select * from c9_pkChrt_16 where district='$dist'");
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
		if(!empty($row['fit'])){ $tot7=1;} else {$tot7=0;}
		if(!empty($row['ms'])){ $tot8=1;} else {$tot8=0;}
		if(!empty($row['hs'])){ $tot9=1;} else {$tot9=0;}
		if(!empty($row['bk'])){ $tot10=1;} else {$tot10=0;}
		if(!empty($row['ee'])){ $tot11=1;} else {$tot11=0;}
		if(!empty($row['iv'])){ $tot12=1;} else {$tot12=0;}
		if(!empty($row['tt'])){ $tot13=1;} else {$tot13=0;}
    if(!empty($row['hc'])){ $tot16=1;} else {$tot16=0;}
    if(!empty($row['rt'])){ $tot15=1;} else {$tot15=0;}


		$tot=$tot1+$tot2+$tot3+$tot4+$tot5+$tot6+$tot7+$tot8+$tot9+$tot10+$tot11+$tot12+$tot13+$tot14+$tot16+$tot15+4;
		
		

?>

<div class="single_record">
<div style="float: right;"><?php echo "<i><b>Confidential</b></i>"?></div>
<table width="100%" border="0">
  <tr>
    <td colspan="5" align="center"><font size="+2"><strong>Nagaland Board of School Education</strong></font></td>
  </tr>
  <tr>
    <td colspan="5" align="center"><font size="+2"><strong>Kohima</strong></font></td>
  </tr>
   <tr>
    <td colspan="4" align="left"><font size="+1"><?php echo "<b>(".$row['sl'].")</b>";?>NO.NBE-1/EX-9/2017-18/</font></td>
    <td align="right">Dated Kohima, the&nbsp;&nbsp;&nbsp; November, 2017</td>
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
  <tr >
  	
    <td colspan="2">Final Examination <?php echo date('Y');?> containing the following subjects:</td>

    </tr>
</table>
<table width="100%" border="0" style="font-size:16px">
  <tr>
    <td width="8%"><u>Slno.</u></td>
    <td width="21%"><u>Date of Exam</u></td>
    <td width="54%"><u>Subject</u></td>
    <td width="17%"><u>No. of Copies</u></td>
  </tr>
  <?php 
  $sl=1;
  $ss=mysql_query("select * from c9_timetbl order by sl asc");
			while($rr=mysql_fetch_array($ss,MYSQL_ASSOC)){
				
			if($rr['subject']=='Mils')
        {
          ?>
  <tr>
    <td><?php echo $sl;?>.</td>
    <td><?php echo $rr['e_date'];?></td>
    <td>Second Language</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>(i) Tenyidie</td>
    <td><?php if(!empty($row['tny'])){$tny=$row['tny']; echo "<strong>".$tny."</strong>";} else echo "___"; ?> copies</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>(ii) Ao</td>
    <td><?php if(!empty($row['aon'])){$ao=$row['aon']; echo "<strong>".$ao."</strong>";} else echo "___"; ?> copies</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>(iii) Sumi</td>
    <td><?php if(!empty($row['smi'])){$smi=$row['smi']; echo "<strong>".$smi."</strong>";} else echo "___"; ?> copies</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>(iv) Lotha</td>
    <td><?php if(!empty($row['lta'])){$lta=$row['lta']; echo "<strong>".$lta."</strong>";} else echo "___"; ?> copies</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>(v) Hindi</td>
    <td><?php if(!empty($row['hnd'])){$hnd=$row['hnd']; echo "<strong>".$hnd."</strong>";} else echo "___"; ?> copies</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>(vi) Bengali</td>
    <td><?php if(!empty($row['bng'])){$bng=$row['bng']; echo "<strong>".$bng."</strong>";} else echo "___"; ?> copies</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>(vii) Alternative English</td>
    <td><?php if(!empty($row['alt'])){$alt=$row['alt']; echo "<strong>".$alt."</strong>";} else echo "___"; ?> copies</td>
  </tr>
  <tr><?php } else if($rr['subject']=='6th') {?>
 <tr>
    <td><?php echo $sl;?>.</td>
    <td><?php echo $rr['e_date'];?></td>
    <td>Sixth subject/Vocational subject</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>(i) FIT</td>
    <td><?php if(!empty($row['fit'])){$fit=$row['fit']; echo "<strong>".$fit."</strong>";} else echo "___"; ?> copies</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>(ii) Music</td>
    <td><?php if(!empty($row['ms'])){$ms=$row['ms']; echo "<strong>".$ms."</strong>";} else echo "___"; ?> copies</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>(iii) Home Science</td>
    <td><?php if(!empty($row['hs'])){$hs=$row['hs']; echo "<strong>".$hs."</strong>";} else echo "___"; ?> copies</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>(iv) BK &amp; Accountancy</td>
    <td><?php if(!empty($row['bk'])){$bk=$row['bk']; echo "<strong>".$bk."</strong>";} else echo "___"; ?> copies</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>(v) Environmental Education</td>
    <td><?php if(!empty($row['ee'])){$ee=$row['ee']; echo "<strong>".$ee."</strong>";} else echo "___"; ?> copies</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>(vi) <?php if(!empty($row['iv']) && !empty($row['tt'])){echo "IT/TT";}
					else if(!empty($row['iv']) && empty($row['tt'])){echo "IT";}
					else if(empty($row['iv']) && !empty($row['tt'])){echo "TT";}
					else echo "IT/TT";?></td>
    <td><?php if(!empty($row['iv']) && empty($row['tt'])){$iv=$row['iv']; echo "<strong>".$row['iv']."</strong>";}
	else if(empty($row['iv']) && !empty($row['tt'])){$tt=$row['tt']; echo "<strong>".$row['tt']."</strong>";}
	else if(!empty($row['iv']) && !empty($row['tt'])){ echo "<strong>".$row['iv']."/".$row['tt'];}
	else echo "___"; ?> copies</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>(vii) Health Care</td>
    <td><?php if(!empty($row['hc'])){$hc=$row['hc']; echo "<strong>".$hc."</strong>";} else echo "___"; ?> copies</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>(viii) Retail</td>
    <td><?php if(!empty($row['rt'])){$rt=$row['rt']; echo "<strong>".$rt."</strong>";} else echo "___"; ?> copies</td>
  </tr>
 <?php } else {?>
   <tr>
    <td><?php echo $sl;?>.</td>
    <td><?php echo $rr['e_date'];?></td>
    <td><?php echo $rr['subject'];?></td>
    <td><?php echo "<strong>".$row['main']."</strong>";?>&nbsp; copies</td>
  </tr>
  <?php 
    } $sl++;} ?>
  
</table>
<p></p>
<table width="100%" border="0">
  <tr>
    <td>Note:</td>
    <td>i.</td>
    <td>The duration of the examination for IT,TT,Retail &amp; Health Care-(vocational)  is 2 hours (9.00 am to 11.00 am).</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>ii.</td>
    <td><strong>The Centre Superintendent/Head of Institution must be present in the school/centre during the</strong></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><strong>conduct of the examination and he/she cannot delegate the duties to a subordinate.</strong></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><strong></strong></td>
  </tr>
</table>
<br />
Received ________________ nos.
<br /><br /><br />
<p>1. Signature with date ______________________________</p>
<p>2. Name _____________________________________________</p>
<p>3. Designation ______________________________________</p>
<div class="tail" align="right">
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
<?php }}


if($class=='10')
{
  include('fpdf/fpdf.php');
  $pdf= new FPDF('P','mm','legal');
  $pdf->AddPage();

  $sql=mysql_query("select * from c10_pkChrt_16 where district='$dist'");
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
    if(!empty($row['fit'])){ $tot7=1;} else {$tot7=0;}
    if(!empty($row['ms'])){ $tot8=1;} else {$tot8=0;}
    if(!empty($row['hs'])){ $tot9=1;} else {$tot9=0;}
    if(!empty($row['bk'])){ $tot10=1;} else {$tot10=0;}
    if(!empty($row['ee'])){ $tot11=1;} else {$tot11=0;}
    if(!empty($row['iv'])){ $tot12=1;} else {$tot12=0;}
    if(!empty($row['tt'])){ $tot13=1;} else {$tot13=0;}
    if(!empty($row['hc'])){ $tot16=1;} else {$tot16=0;}
    if(!empty($row['rt'])){ $tot15=1;} else {$tot15=0;}


    $tot=$tot1+$tot2+$tot3+$tot4+$tot5+$tot6+$tot7+$tot8+$tot9+$tot10+$tot11+$tot12+$tot13+$tot14+$tot16+$tot15+4;
    
      $pdf->SetFont('Times','B',14);
      $pdf->SetXY(10,100);
      $pdf->Cell(190,4,'Confidential(HSLC)',0,0,'L',0);
      $pdf->SetXY(20,20);
      $pdf->Cell(190,4,'Nagaland Board of School Education',0,0,'L',0);
      $pdf->SetXY(30,20);
      $pdf->Cell(190,4,'Kohima',0,0,'L',0);
      $pdf->SetXY(10,20);
      $pdf->Cell(190,4,'NO.NBE-2/Ex-10/2016-17/',0,0,'L',0);
      $pdf->SetXY(10,20);
      $pdf->Cell(190,4,'Dated Kohima, the     th January,2017',0,0,'L',0);
      $pdf->SetXY(30,20);
      $pdf->Cell(190,4,'To,',0,0,'L',0);
      $pdf->SetXY(30,20);
      $pdf->Cell(190,4,'Mr,Mrs.____________',0,0,'L',0);
      $pdf->SetXY(30,20);
      $pdf->Cell(190,4,'Centre Superintendent,',0,0,'L',0);
      $pdf->SetXY(30,20);
      $pdf->Cell(190,4,'____________',0,0,'L',0);
      $pdf->SetXY(30,20);
      $pdf->Cell(190,4,'Subject:-',0,0,'L',0);
      $pdf->SetXY(30,20);
      $pdf->Cell(190,4,'Confidential papers of the High School Leaving Certificate Examination 2017',0,0,'L',0);
      $pdf->SetXY(30,20);
      $pdf->Cell(190,4,'Sir/Madam,',0,0,'L',0);
      $pdf->SetXY(30,20);
      $pdf->Cell(190,4,'I am to inform you that the sealed packets containing the confidential papers for the HSLC',0,0,'L',0);
      $pdf->SetXY(30,20);
      $pdf->Cell(190,4,'Examination 2018, to be held from 15th February 2018 at your centre shall be kept in the custody of this',0,0,'L',0);
      $pdf->SetXY(30,20);
      $pdf->Cell(190,4,'Office',0,0,'L',0);
      $pdf->SetXY(30,20);
      $pdf->Cell(190,4,'Kindly collect the packets on the specific dates. The numbers of question papers supplied',0,0,'L',0);
      $pdf->SetXY(30,20);
      $pdf->Cell(190,4,'are given below and you are requested to confirm the numbers to ensure that all the subjects and the',0,0,'L',0);
      $pdf->SetXY(30,20);
      $pdf->Cell(190,4,'required numbers issued to your centre are sufficient. You are also directed to read the necessary',0,0,'L',0);
      $pdf->SetXY(30,20);
      $pdf->Cell(190,4,'instructions for the conduct of examinations.',0,0,'L',0);
      $pdf->SetXY(30,20);
      $pdf->Cell(190,4,'Time: 9 am -12 noon',0,0,'L',0);
      $pdf->SetXY(30,20);
      $pdf->Cell(190,4,'Date',0,0,'L',0);
      $pdf->SetXY(30,20);
      $pdf->Cell(190,4,'Day',0,0,'L',0);
      $pdf->SetXY(30,20);
      $pdf->Cell(190,4,'Subject',0,0,'L',0);
      $pdf->SetXY(30,20);
      $pdf->Cell(190,4,'Number of confidential papers',0,0,'L',0);
    
      $sl=1;
      $ss=mysql_query("select * from c10_timetbl order by sl asc");
      while($rr=mysql_fetch_array($ss,MYSQL_ASSOC))
      {
        
      if($rr['subject']=='Mils')
        {
          
      $pdf->SetXY(30,20);
      $pdf->Cell(190,4,$rr['e_date'],0,0,'L',0);
      $pdf->SetXY(30,20);
      $pdf->Cell(190,4,$rr['day'],0,0,'L',0);
      $pdf->SetXY(30,20);
      $pdf->Cell(190,4,'Second Language:',0,0,'L',0);
      $pdf->SetXY(30,20);
      $pdf->Cell(190,4,'i.  Tenyidie',0,0,'L',0);
      $pdf->SetXY(30,20);
      if(!empty($row['tny']))
      {
      $pdf->Cell(190,4,$row['tny'],0,0,'L',0);
      }
      else
      {
      $pdf->Cell(190,4,'______',0,0,'L',0);
      }
      $pdf->SetXY(30,20);
      $pdf->Cell(190,4,'ii.  Ao',0,0,'L',0);
      $pdf->SetXY(30,20);
      if(!empty($row['aon']))
      {
      $pdf->Cell(190,4,$row['aon'],0,0,'L',0);
      }
      else
      {
      $pdf->Cell(190,4,'______',0,0,'L',0);
      }
      $pdf->SetXY(30,20);
      $pdf->Cell(190,4,'iii.  Sumi',0,0,'L',0);
      $pdf->SetXY(30,20);
       if(!empty($row['smi']))
      {
      $pdf->Cell(190,4,$row['smi'],0,0,'L',0);
      }
      else
      {
      $pdf->Cell(190,4,'______',0,0,'L',0);
      }
      $pdf->SetXY(30,20);
      $pdf->Cell(190,4,'iv.  Lotha',0,0,'L',0);
      $pdf->SetXY(30,20);
       if(!empty($row['lta']))
      {
      $pdf->Cell(190,4,$row['lta'],0,0,'L',0);
      }
      else
      {
      $pdf->Cell(190,4,'______',0,0,'L',0);
      }
      $pdf->SetXY(30,20);
      $pdf->Cell(190,4,'v.  Hindi',0,0,'L',0);
      $pdf->SetXY(30,20);
       if(!empty($row['aon']))
      {
      $pdf->Cell(190,4,$row['hnd'],0,0,'L',0);
      }
      else
      {
      $pdf->Cell(190,4,'______',0,0,'L',0);
      }
      $pdf->SetXY(30,20);
      $pdf->Cell(190,4,'vi.  Bengali',0,0,'L',0);
      $pdf->SetXY(30,20);
       if(!empty($row['bng']))
      {
      $pdf->Cell(190,4,$row['bng'],0,0,'L',0);
      }
      else
      {
      $pdf->Cell(190,4,'______',0,0,'L',0);
      }
      $pdf->SetXY(30,20);
      $pdf->Cell(190,4,'vii.  Alternative English',0,0,'L',0);
      $pdf->SetXY(30,20);
       if(!empty($row['alt']))
      {
      $pdf->Cell(190,4,$row['alt'],0,0,'L',0);
      }
      else
      {
      $pdf->Cell(190,4,'______',0,0,'L',0);
      }
    
      }

      else if($rr['subject']=='6th') 
      {
      $pdf->SetXY(30,20);
      $pdf->Cell(190,4,$rr['e_date'],0,0,'L',0);
      $pdf->SetXY(30,20);
      $pdf->Cell(190,4,$rr['day'],0,0,'L',0);
      $pdf->SetXY(30,20);
      $pdf->Cell(190,4,'Sixth Subjects/Vocational:',0,0,'L',0);
      $pdf->SetXY(30,20);
      $pdf->Cell(190,4,'i.  FIT',0,0,'L',0);
      $pdf->SetXY(30,20);
      if(!empty($row['fit']))
      {
      $pdf->Cell(190,4,$row['fit'],0,0,'L',0);
      }
      else
      {
      $pdf->Cell(190,4,'______',0,0,'L',0);
      }
      $pdf->SetXY(30,20);
      $pdf->Cell(190,4,'ii.  Music',0,0,'L',0);
      $pdf->SetXY(30,20);
      if(!empty($row['msc']))
      {
      $pdf->Cell(190,4,$row['msc'],0,0,'L',0);
      }
      else
      {
      $pdf->Cell(190,4,'______',0,0,'L',0);
      }
      $pdf->SetXY(30,20);
      $pdf->Cell(190,4,'iii.  Home Science',0,0,'L',0);
      $pdf->SetXY(30,20);
      if(!empty($row['hs']))
      {
      $pdf->Cell(190,4,$row['hs'],0,0,'L',0);
      }
      else
      {
      $pdf->Cell(190,4,'______',0,0,'L',0);
      }
      $pdf->SetXY(30,20);
      $pdf->Cell(190,4,'iv.  BK & Accountancy',0,0,'L',0);
      $pdf->SetXY(30,20);
      if(!empty($row['bk']))
      {
      $pdf->Cell(190,4,$row['bk'],0,0,'L',0);
      }
      else
      {
      $pdf->Cell(190,4,'______',0,0,'L',0);
      }
      $pdf->SetXY(30,20);
      $pdf->Cell(190,4,'v.  Environmental Education',0,0,'L',0);
      $pdf->SetXY(30,20);
      if(!empty($row['ee']))
      {
      $pdf->Cell(190,4,$row['ee'],0,0,'L',0);
      }
      else
      {
      $pdf->Cell(190,4,'______',0,0,'L',0);
      }
      $pdf->SetXY(30,20);
      if(!empty($row['iv']) && !empty($row['tt']))
      {
      $pdf->Cell(190,4,'vi.  IT/TT(Vocational)',0,0,'L',0);
      }
      else if(!empty($row['iv']) && empty($row['tt']))
      {
         $pdf->Cell(190,4,'vi.  IT(Vocational)',0,0,'L',0);
      }
      else if(empty($row['iv']) && !empty($row['tt']))
      {
         $pdf->Cell(190,4,'vi.  TT(Vocational)',0,0,'L',0);
      }
      else
      {
        $pdf->Cell(190,4,'vi.  IT/TT(Vocational)',0,0,'L',0);
      }
      $pdf->SetXY(30,20);
      if(!empty($row['iv']) && !empty($row['tt']))
      {
      $pdf->Cell(190,4,'____/____',0,0,'L',0);
      }
      else if(!empty($row['iv']) && empty($row['tt']))
      {
         $pdf->Cell(190,4,$row['iv'],0,0,'L',0);
      }
      else if(empty($row['iv']) && !empty($row['tt']))
      {
         $pdf->Cell(190,4,$row['tt'],0,0,'L',0);
      }
      else
      {
        $pdf->Cell(190,4,$row['iv'].'/'.$row['tt'],0,0,'L',0);
      }

      $pdf->SetXY(30,20);
      if(!empty($row['rt']) && !empty($row['hc']))
      {
      $pdf->Cell(190,4,'vii.  Retail/Health Care(Vocational)',0,0,'L',0);
      }
      else if(!empty($row['rt']) && empty($row['hc']))
      {
         $pdf->Cell(190,4,'vii.  health(Vocational)',0,0,'L',0);
      }
      else if(empty($row['rt']) && !empty($row['hc']))
      {
         $pdf->Cell(190,4,'vi.  TT(Vocational)',0,0,'L',0);
      }
      else
      {
        $pdf->Cell(190,4,'vi.  IT/TT(Vocational)',0,0,'L',0);
      }
      $pdf->SetXY(30,20);
      if(!empty($row['rt']) && !empty($row['hc']))
      {
      $pdf->Cell(190,4,$row['rt'].'/'.$row['hc'],0,0,'L',0);
      }
      else if(!empty($row['rt']) && empty($row['hc']))
      {
         $pdf->Cell(190,4,$rr['hv'],0,0,'L',0);
      }
      else if(empty($row['rt']) && !empty($row['hc']))
      {
         $pdf->Cell(190,4,$row['hc'],0,0,'L',0);
      }
      else
      {
        $pdf->Cell(190,4,'____/____',0,0,'L',0);
      }
          
   
       } 
       else
       {
        $pdf->SetXY(30,20);
        $pdf->Cell(190,4,$rr['e_date'],0,0,'L',0);
        $pdf->SetXY(30,20);
        $pdf->Cell(190,4,$rr['day'],0,0,'L',0);
        $pdf->SetXY(30,20);
        $pdf->Cell(190,4,$rr['subject'],0,0,'L',0);
        $pdf->SetXY(30,20);
        $pdf->Cell(190,4,$row['main'],0,0,'L',0);

       }
       $sl++;} 
  

}
}
$pdf->Output();
?>
</body>
</html>