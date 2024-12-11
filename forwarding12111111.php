<?php
include('fpdf/fpdf.php');
require("dbconn.php");
	
$dist=$_POST['nbseDistrict'];
$class = $_POST['class'];
$exam = $_POST['exam'];
$pdf= new FPDF('P','mm','legal');
//$pdf= new FPDF('P','mm',array(216,355));
$left = 20;
$off=0;
$off11=0;
$valAlign = 180;
$sign = 0;
$inc = 8;
$inc11 = 7;
$yr=mysql_query("select * from year");
$yr=mysql_fetch_array($yr);
$year = $yr['year'];
if($class=='9'){$class1=9;}
if($class=='10'){$class1=10;}
if($class=='11a'||$class=='11c'||$class=='11s'){$class1=11;}
if($class=='12a'||$class=='12c'||$class=='12s'){$class1=12;}
$findEtime = mysql_query("select * from timing_tbl where class=$class1");
$findEtime = mysql_fetch_array($findEtime);
$Etime = $findEtime['exam_time'];
$Vtime = $findEtime['voc_time'];


if($class=='9')
{
	$content = 105;
	$sql=mysql_query("select * from c9_pkChrt_16 where district='$dist'");
	while($row=mysql_fetch_array($sql,MYSQL_ASSOC))
	{
		$pdf->AddPage();
		$inc = 7;
		//*************************************
		//   SECOND LANGAUGE
		//*************************************

		if(!empty($row['aon'])){ $tot1=1;} else {$tot1=0;}
		if(!empty($row['smi'])){ $tot2=1;} else {$tot2=0;}
		if(!empty($row['lta'])){ $tot3=1;} else {$tot3=0;}
		if(!empty($row['hnd'])){ $tot4=1;} else {$tot4=0;}
		if(!empty($row['bng'])){ $tot5=1;} else {$tot5=0;}
		if(!empty($row['alt'])){ $tot6=1;} else {$tot6=0;}
		if(!empty($row['tny'])){ $tot14=1;} else {$tot14=0;}
		
		//*************************************
		//   6th subject
		//*************************************
		if(!empty($row['fit'])){ $tot7=1;} else {$tot7=0;}
		if(!empty($row['ms'])){ $tot8=1;} else {$tot8=0;}
		if(!empty($row['hs'])){ $tot9=1;} else {$tot9=0;}
		if(!empty($row['bk'])){ $tot10=1;} else {$tot10=0;}
		if(!empty($row['ee'])){ $tot11=1;} else {$tot11=0;}
		if(!empty($row['iv'])){ $tot12=1;} else {$tot12=0;}
		if(!empty($row['tt'])){ $tot13=1;} else {$tot13=0;}
		if(!empty($row['hc'])){ $tot16=1;} else {$tot16=0;}
		if(!empty($row['rt'])){ $tot15=1;} else {$tot15=0;}
		if(!empty($row['et'])){ $tot17=1;} else {$tot17=0;}
		if(!empty($row['bw'])){ $tot18=1;} else {$tot18=0;}
		if(!empty($row['mc'])){ $tot19=1;} else {$tot19=0;}
		if(!empty($row['av'])){ $tot20=1;} else {$tot20=0;}
		$tot=$tot1+$tot2+$tot3+$tot4+$tot5+$tot6+$tot7+$tot8+$tot9+$tot10+$tot11+$tot12+$tot13+$tot14+$tot16+$tot15+$tot17+$tot18+$tot19+$tot20+4;
		$not = mysql_query("select * from notification_tbl where class='9'");
		$get = mysql_fetch_array($not);
		$pdf->SetFont('Times','B',7);
		$pdf->SetXY(10,10);
		$pdf->Cell(190,4,'Confidential(Class-IX)',0,0,'R',0);
		$pdf->SetFont('Times','B',13);
		$pdf->SetXY(10,20);
		$pdf->Cell(190,4,'Nagaland Board of School Education',0,0,'C',0);
		$pdf->SetXY(10,25);
		$pdf->Cell(190,4,'Kohima',0,0,'C',0);
		$pdf->SetFont('Times','',11);
		$pdf->SetXY($left,30);
		$pdf->Cell(190,4,$get['noti_detail'],0,0,'L',0);
		$pdf->SetXY(134,30);
		$pdf->Cell(150,4,'Dated Kohima, the      ',0,0,'L',0);
		$pdf->SetXY(171,28);
		$pdf->Cell(190,4,$get['sup_script'],0,0,'L',0);
		$pdf->SetXY(175,30);
		$pdf->Cell(190,4,$get['noti_month_year'],0,0,'L',0);
		$pdf->SetFont('Times','',12);
		$pdf->SetXY($left,40);
		$pdf->Cell(190,4,'To,',0,0,'L',0);
		$pdf->SetXY(30,45);
		$pdf->Cell(190,4,'The Centre Superintendent/Head of Institution,',0,0,'L',0);
		$pdf->SetFont('Times','B',12);
		$pdf->SetXY(30,50);
		$pdf->Cell(190,4,''.$row['school'],0,0,'L',0);
		$pdf->SetFont('Times','',12);
		$pdf->SetXY($left,65);
		$pdf->Cell(190,4,'Subject:-',0,0,'L',0);
		$pdf->SetFont('Times','B',12);
		$pdf->SetXY(40,65);
		$pdf->Cell(190,4,'ISSUE OF CONFIDENTIAL PAPERS AND INSTRUCTIONS',0,0,'L',0);
		$pdf->SetFont('Times','',12);
		$pdf->SetXY($left,70);
		$pdf->Cell(190,4,'Sir/Madam,',0,0,'L',0);
		$pdf->SetXY(40,75);
		$pdf->Cell(190,4,'Please find herewith '.$tot.' nos of confidential packets for the Class-IX Final Examination '.$year,0,0,'L',0);
		$pdf->SetXY($left,80);
		$pdf->Cell(190,4,' containing the following subjects:',0,0,'L',0);
		$firstExam = mysql_query('select * from c9_timetbl where sl=1');
		$firstExam = mysql_fetch_array($firstExam);
		$pdf->SetFont('Times','B',12);
		$pdf->SetFont('Times','B',12);
		$pdf->SetXY(80,90);
		$pdf->Cell(190,4,'Time: '.$Etime,0,0,'L',0);
		$pdf->SetXY($left,95);
		$pdf->Cell(192,8,'Date',1,0,'L',0);
		$pdf->SetXY(60,95);
		$pdf->Cell(190,8,'Day',0,0,'L',0);
		$pdf->SetXY(90,95);
		$pdf->Cell(190,8,'Subject',0,0,'L',0);
		$pdf->SetXY(145,95);
		$pdf->Cell(190,8,'Number of confidential papers',0,0,'L',0);
		$sl=1;
		$ss=mysql_query("select * from c9_timetbl order by sl asc");
		while($rr=mysql_fetch_array($ss,MYSQL_ASSOC))
		{
			if($rr['subject']=='Mils')
			{
				$pdf->SetXY($left,$content+$off);
				$pdf->Cell(190,4,$rr['e_date'],0,0,'L',0);
				$pdf->SetXY(60,$content+$off);
				$pdf->Cell(190,4,$rr['day'],0,0,'L',0);
				$pdf->SetXY(90,$content+$off);
				$pdf->Cell(190,4,'Second Language:',0,0,'L',0);
				$off=$off+$inc;      
				$pdf->SetXY(95,$content+$off);
				$pdf->Cell(190,4,'i.     Tenyidie',0,0,'L',0);
				$pdf->SetXY($valAlign,$content+$off);
				if(!empty($row['tny']))
				{
					$pdf->Cell(190,4,$row['tny'],0,0,'L',0);
				}
				else
				{
					$pdf->Cell(190,4,'______',0,0,'L',0);
				}
				$off=$off+$inc;
				$pdf->SetXY(95,$content+$off);
				$pdf->Cell(190,4,'ii.    Ao',0,0,'L',0);
				$pdf->SetXY($valAlign,$content+$off);
				if(!empty($row['aon']))
				{
					$pdf->Cell(190,4,$row['aon'],0,0,'L',0);
				}
				else
				{
					$pdf->Cell(190,4,'______',0,0,'L',0);
				}
				$off=$off+$inc;
				$pdf->SetXY(95,$content+$off);
				$sumi = iconv('UTF-8','windows-1252','iii.   Sumi(Sütsah)');
				$pdf->Cell(190,4,$sumi,0,0,'L',0);
				$pdf->SetXY($valAlign,$content+$off);
				if(!empty($row['smi']))
				{
					$pdf->Cell(190,4,$row['smi'],0,0,'L',0);
				}
				else
				{
					$pdf->Cell(190,4,'______',0,0,'L',0);
				}
				$off=$off+$inc;
				$pdf->SetXY(95,$content+$off);
				$pdf->Cell(190,4,'iv.   Lotha',0,0,'L',0);
				$pdf->SetXY($valAlign,$content+$off);
				if(!empty($row['lta']))
				{
					$pdf->Cell(190,4,$row['lta'],0,0,'L',0);
				}
				else
				{
					$pdf->Cell(190,4,'______',0,0,'L',0);
				}
				$off=$off+$inc;
				$pdf->SetXY(95,$content+$off);
				$pdf->Cell(190,4,'v.    Hindi',0,0,'L',0);
				$pdf->SetXY($valAlign,$content+$off);
				if(!empty($row['hnd']))
				{
					$pdf->Cell(190,4,$row['hnd'],0,0,'L',0);
				}
				else
				{
					$pdf->Cell(190,4,'______',0,0,'L',0);
				}
				$off=$off+$inc;
				$pdf->SetXY(95,$content+$off);
				$pdf->Cell(190,4,'vi.   Bengali',0,0,'L',0);
				$pdf->SetXY($valAlign,$content+$off);
				if(!empty($row['bng']))
				{
					$pdf->Cell(190,4,$row['bng'],0,0,'L',0);
				}
				else
				{
					$pdf->Cell(190,4,'______',0,0,'L',0);
				}
				$off=$off+$inc;
				$pdf->SetXY(95,$content+$off);
				$pdf->Cell(190,4,'vii.  Alternative English',0,0,'L',0);
				$pdf->SetXY($valAlign,$content+$off);
				if(!empty($row['alt']))
				{
					$pdf->Cell(190,4,$row['alt'],0,0,'L',0);
				}
				else
				{
					$pdf->Cell(190,4,'______',0,0,'L',0);
				}
				$off=$off+$inc;
			}
			else if($rr['subject']=='6th') 
			{
				$pdf->SetXY($left,$content+$off);
				$pdf->Cell(190,4,$rr['e_date'],0,0,'L',0);
				$pdf->SetXY(60,$content+$off);
				$pdf->Cell(190,4,$rr['day'],0,0,'L',0);
				$pdf->SetXY(90,$content+$off);
				$pdf->Cell(190,4,'Sixth/Vocational Subjects:',0,0,'L',0);
				$off=$off+$inc;
				$pdf->SetXY(95,$content+$off);
				$pdf->Cell(190,4,'i.     FIT',0,0,'L',0);
				$pdf->SetXY($valAlign,$content+$off);
				if(!empty($row['fit']))
				{
					$pdf->Cell(190,4,$row['fit'],0,0,'L',0);
				}
				else
				{
					$pdf->Cell(190,4,'______',0,0,'L',0);
				}
				$off=$off+$inc;
				$pdf->SetXY(95,$content+$off);
				$pdf->Cell(190,4,'ii.    Music',0,0,'L',0);
				$pdf->SetXY($valAlign,$content+$off);
				if(!empty($row['msc']))
				{
					$pdf->Cell(190,4,$row['msc'],0,0,'L',0);
				}
				else
				{
					$pdf->Cell(190,4,'______',0,0,'L',0);
				}
				$off=$off+$inc;
				$pdf->SetXY(95,$content+$off);
				$pdf->Cell(190,4,'iii.   Home Science',0,0,'L',0);
				$pdf->SetXY($valAlign,$content+$off);
				if(!empty($row['hs']))
				{
					$pdf->Cell(190,4,$row['hs'],0,0,'L',0);
				}
				else
				{
					$pdf->Cell(190,4,'______',0,0,'L',0);
				}
				$off=$off+$inc;
				$pdf->SetXY(95,$content+$off);
				$pdf->Cell(190,4,'iv.   BK & Accountancy',0,0,'L',0);
				$pdf->SetXY($valAlign,$content+$off);
				if(!empty($row['bk']))
				{
					$pdf->Cell(190,4,$row['bk'],0,0,'L',0);
				}
				else
				{
					$pdf->Cell(190,4,'______',0,0,'L',0);
				}
				$off=$off+$inc;
				$pdf->SetXY(95,$content+$off);
				$pdf->Cell(190,4,'v.    Environmental Education',0,0,'L',0);
				$pdf->SetXY($valAlign,$content+$off);
				if(!empty($row['ee']))
				{
					$pdf->Cell(190,4,$row['ee'],0,0,'L',0);
				}
				else
				{
					$pdf->Cell(190,4,'______',0,0,'L',0);
				}
				$off=$off+$inc;
				$pdf->SetXY(95,$content+$off);
				$pdf->Cell(190,4,'vi.   IT/TT(Vocational)',0,0,'L',0);
				/*
				if(!empty($row['iv']) && !empty($row['tt']))
				{
					$pdf->Cell(190,4,'vi.   IT/TT(Vocational)',0,0,'L',0);
				}
				else if(!empty($row['iv']) && empty($row['tt']))
				{
					 $pdf->Cell(190,4,'vi.   IT/TT(Vocational)',0,0,'L',0);
				}
				else if(empty($row['iv']) && !empty($row['tt']))
				{
					 $pdf->Cell(190,4,'vi.   IT/TT(Vocational)',0,0,'L',0);
				}
				else
				{
					$pdf->Cell(190,4,'vi.   IT/TT(Vocational)',0,0,'L',0);
				}
				*/
				
				$pdf->SetXY($valAlign,$content+$off);
				if(empty($row['iv']) && empty($row['tt']))
				{
					$pdf->Cell(190,4,'__/__',0,0,'L',0);
				}
				else if(!empty($row['iv']) && empty($row['tt']))
				{
					 $pdf->Cell(190,4,$row['iv'].'/__',0,0,'L',0);
				}
				else if(empty($row['iv']) && !empty($row['tt']))
				{
					 $pdf->Cell(190,4,'__/'.$row['tt'],0,0,'L',0);
				}
				else
				{
					$pdf->Cell(190,4,$row['iv'].'/'.$row['tt'],0,0,'L',0);
				}
				$off=$off+$inc;
				$pdf->SetXY(95,$content+$off);
				$pdf->Cell(190,4,'vii.  Retail/Health Care(Vocational)',0,0,'L',0);
				/*
				if(!empty($row['rt']) && !empty($row['hc']))
				{
					$pdf->Cell(190,4,'vii.  Retail/Health Care(Vocational)',0,0,'L',0);
				}
				else if(!empty($row['rt']) && empty($row['hc']))
				{
					 $pdf->Cell(190,4,'vii.  Retail/Health Care(Vocational)',0,0,'L',0);
				}
				else if(empty($row['rt']) && !empty($row['hc']))
				{
					 $pdf->Cell(190,4,'vii.  Retail/Health Care(Vocational)',0,0,'L',0);
				}
				else
				{
					$pdf->Cell(190,4,'vii.  Retail/Health Care(Vocational)',0,0,'L',0);
				}
				*/
		 
				$pdf->SetXY($valAlign,$content+$off);
				if(!empty($row['rt']) && !empty($row['hc']))
				{
					$pdf->Cell(190,4,$row['rt'].'/'.$row['hc'],0,0,'L',0);
				}
				else if(!empty($row['rt']) && empty($row['hc']))
				{
					 $pdf->Cell(190,4,$rr['rt'].'/__',0,0,'L',0);
				}
				else if(empty($row['rt']) && !empty($row['hc']))
				{
					 $pdf->Cell(190,4,'__/'.$row['hc'],0,0,'L',0);
				}
				else
				{
					$pdf->Cell(190,4,'__/__',0,0,'L',0);
				}
				$off=$off+$inc;
				$pdf->SetXY(95,$content+$off);
				$pdf->Cell(190,4,'viii. Elec.Tech/B&W(Vocational)',0,0,'L',0);
				/*
				if(!empty($row['et']) && !empty($row['bw']))
				{
					$pdf->Cell(190,4,'viii. Elec.Tech/B&W(Vocational)',0,0,'L',0);
				}
				else if(!empty($row['et']) && empty($row['bw']))
				{
					$pdf->Cell(190,4,'viii.  Elec.Tech/B&W(Vocational)',0,0,'L',0);
				}
				else if(empty($row['et']) && !empty($row['bw']))
				{
					 $pdf->Cell(190,4,'viii.  Elec.Tech/B&W(Vocational)',0,0,'L',0);
				}
				else
				{
					$pdf->Cell(190,4,'viii. Elec.Tech/B&W(Vocational)',0,0,'L',0);
				}
				*/
				 
				$pdf->SetXY($valAlign,$content+$off);
				if(!empty($row['et']) && !empty($row['bw']))
				{
				$pdf->Cell(190,4,$row['et'].'/'.$row['bw'],0,0,'L',0);
				}
				else if(!empty($row['et']) && empty($row['bw']))
				{
					 $pdf->Cell(190,4,$row['et'].'/__',0,0,'L',0);
				}
				else if(empty($row['et']) && !empty($row['bw']))
				{
					 $pdf->Cell(190,4,'__/'.$row['bw'],0,0,'L',0);
				}
				else
				{
					$pdf->Cell(190,4,'__/__',0,0,'L',0);
				}
				$off=$off+$inc;
				$pdf->SetXY(95,$content+$off);
				$pdf->Cell(190,4,'ix.   Multi Skill/Agriculture(Vocational)',0,0,'L',0);
				/*
				if(!empty($row['mc']) && !empty($row['av']))
				{
					$pdf->Cell(190,4,'ix.   Multi Skill/Agriculture(Vocational)',0,0,'L',0);
				}
				else if(!empty($row['mc']) && empty($row['av']))
				{
					$pdf->Cell(190,4,'ix.   Multi Skill/Agriculture(Vocational)',0,0,'L',0);
				}
				else if(empty($row['mc']) && !empty($row['av']))
				{
					 $pdf->Cell(190,4,'ix.   Multi Skill/Agriculture(Vocational)',0,0,'L',0);
				}
				else
				{
					$pdf->Cell(190,4,'ix.   Multi Skill/Agriculture(Vocational)',0,0,'L',0);
				}
				*/
				$pdf->SetXY($valAlign,$content+$off);
				if(!empty($row['mc']) && !empty($row['av']))
				{
					$pdf->Cell(190,4,$row['mc'].'/'.$row['av'],0,0,'L',0);
				}
				else if(!empty($row['mc']) && empty($row['av']))
				{
					 $pdf->Cell(190,4,$row['mc'].'/__',0,0,'L',0);
				}
				else if(empty($row['mc']) && !empty($row['av']))
				{
					 $pdf->Cell(190,4,'__/'.$row['av'],0,0,'L',0);
				}
				else
				{
					$pdf->Cell(190,4,'__/__',0,0,'L',0);
				}
					$off=$off+$inc;
			} 
			else
			{
				$pdf->SetXY($left,$content+$off);
				$pdf->Cell(190,4,$rr['e_date'],0,0,'L',0);
				$pdf->SetXY(60,$content+$off);
				$pdf->Cell(190,4,$rr['day'],0,0,'L',0);
				$pdf->SetXY(90,$content+$off);
				$pdf->Cell(190,4,$rr['subject'],0,0,'L',0);
				$pdf->SetXY($valAlign,$content+$off);
				$pdf->Cell(190,4,$row['main'],0,0,'L',0);
				$off=$off+$inc;
			}
			$sl++;
		} 
		$off=0;
		$sign =16; $bottom = 6;
		$pdf->SetFont('Times','',11);
		$pdf->SetXY($left,250+$sign);
		$pdf->Cell(190,4,'Note :- i. The duration of the examination for the Vocational subjects  is 2 hours ('.$Vtime.').',0,0,'L',0);
		$sign = $sign+$bottom;
		$pdf->SetFont('Times','',11);
		$pdf->SetXY($left+10,250+$sign);
		$pdf->Cell(190,4,' ii.',0,0,'L',0);
		$pdf->SetFont('Times','',11);
		$pdf->SetXY(30,250+$sign);
		$pdf->Cell(190,4,'		   The Centre Superintendent/Head of Institution must be present in the school/centre during the',0,0,'L',0);
		$sign = $sign+$bottom;
		$pdf->SetXY(28,250+$sign);
		$pdf->Cell(190,4,'       conduct of the examination and he/she cannot delegate the duties to a subordinate.',0,0,'L',0);
		$pdf->SetFont('Times','',11);
		$sign = $sign+$bottom;
		$sign = $sign+$bottom;
		$pdf->SetXY(20,250+$sign);
		$pdf->Cell(190,4,'Received __________ nos.',0,0,'L',0);
		$sign = $sign+$bottom;
		$sign = $sign+$bottom;
		$pdf->SetXY(20,250+$sign);
		$pdf->Cell(190,4,'1. Signature with date _______________________.',0,0,'L',0);
		$sign = $sign+$bottom;
		$pdf->SetXY(20,250+$sign);
		$pdf->Cell(190,4,'2. Name _______________________.',0,0,'L',0);
		$sign = $sign+$bottom;
		$pdf->SetXY(20,250+$sign);
		$pdf->Cell(190,4,'3. Designation________________________',0,0,'L',0);
		$sign = $sign+$bottom;
		$pdf->SetXY(10,250+$sign);
		//$schoolName = iconv('UTF-8','windows-1252',$row['school']);
		$pdf->Cell(190,4,iconv('UTF-8','windows-1252','( Keneilenyü Nagi )'),0,0,'R',0);
		$sign = $sign+$bottom;
		$pdf->SetXY(160,250+$sign);
		$pdf->Cell(190,4,'Controller of Examinations',0,0,'L',0);
	}
}
// END OF CLASS NINE FORWARDING

//  FORWARDING FOR CLASS TEN
if($exam=="compart" && $class=='10')
{
	if($class==10 && $dist=="KOHIMA")
	{
		$content = 110;

		$sql=mysql_query("select * from c10_pkChrt_16 where district='$dist'");
		while($row=mysql_fetch_array($sql,MYSQL_ASSOC))
		{
			$pdf->AddPage();
			$inc = 6;
			//*************************************
			//   SECOND LANGAUGE
			//*************************************

			if(!empty($row['aon'])){ $tot1=1;} else {$tot1=0;}
			if(!empty($row['smi'])){ $tot2=1;} else {$tot2=0;}
			if(!empty($row['lta'])){ $tot3=1;} else {$tot3=0;}
			if(!empty($row['hnd'])){ $tot4=1;} else {$tot4=0;}
			if(!empty($row['bng'])){ $tot5=1;} else {$tot5=0;}
			if(!empty($row['alt'])){ $tot6=1;} else {$tot6=0;}
			if(!empty($row['tny'])){ $tot14=1;} else {$tot14=0;}
		
			//*************************************
			//   6th subject
			//*************************************
			if(!empty($row['fit'])){ $tot7=1;} else {$tot7=0;}
			if(!empty($row['ms'])){ $tot8=1;} else {$tot8=0;}
			if(!empty($row['hs'])){ $tot9=1;} else {$tot9=0;}
			if(!empty($row['bk'])){ $tot10=1;} else {$tot10=0;}
			if(!empty($row['ee'])){ $tot11=1;} else {$tot11=0;}
			if(!empty($row['iv'])){ $tot12=1;} else {$tot12=0;}

			if(!empty($row['tt'])){ $tot13=1;} else {$tot13=0;}
			if(!empty($row['hv'])){ $tot16=1;} else {$tot16=0;}
			if(!empty($row['rv'])){ $tot15=1;} else {$tot15=0;}
			if(!empty($row['ev'])){ $tot17=1;} else {$tot17=0;}
			if(!empty($row['bv'])){ $tot18=1;} else {$tot18=0;}
			if(!empty($row['mv'])){ $tot19=1;} else {$tot19=0;}
			if(!empty($row['av'])){ $tot22=1;} else {$tot22=0;}
			if(!empty($row['at'])){ $tot23=1;} else {$tot23=0;}


			$tot=$tot1+$tot2+$tot3+$tot4+$tot5+$tot6+$tot7+$tot8+$tot9+$tot10+$tot11+$tot12+$tot13+$tot14+$tot16+$tot15+$tot17+$tot18+$tot19+$tot22+$tot23+4;
			$not = mysql_query("select * from notification_tbl where class='10'");
			$get = mysql_fetch_array($not);
			$pdf->SetFont('Times','B',8);
			$pdf->SetXY(10,10);
			$pdf->Cell(190,4,'Confidential(HSLC)',0,0,'R',0);
			$pdf->SetFont('Times','B',13);
			$pdf->SetXY(10,15);
			$pdf->Cell(190,4,'Nagaland Board of School Education',0,0,'C',0);
			$pdf->SetXY(10,20);
			$pdf->Cell(190,4,'Kohima',0,0,'C',0);
			$pdf->SetFont('Times','',11);
			$pdf->SetXY($left,30);
			$pdf->Cell(190,4,$get['noti_detail'],0,0,'L',0);
			$pdf->SetXY(134,30);
			$pdf->Cell(150,4,'Dated Kohima, the      ',0,0,'L',0);
			$pdf->SetXY(171,28);
			$pdf->Cell(190,4,$get['sup_script'],0,0,'L',0);
			$pdf->SetXY(175,30);
			$pdf->Cell(190,4,$get['noti_month_year'],0,0,'L',0);
			$pdf->SetFont('Times','',12);
			$pdf->SetXY($left,40);
			$pdf->Cell(190,4,'To,',0,0,'L',0);
			$pdf->SetXY(30,45);
			$pdf->Cell(190,4,'Mr/Ms.___________________________________________________________',0,0,'L',0);
			$pdf->SetXY(30,50);
			$pdf->Cell(190,4,'Centre Superintendent,',0,0,'L',0);
			$pdf->SetXY(30,55);
			$pdf->Cell(190,4,'Centre : ',0,0,'L',0);
			$pdf->SetFont('Times','B',11);
			$pdf->SetXY(50,55);
			$pdf->Cell(190,4,$row['school'],0,0,'L',0);
			$pdf->SetFont('Times','',11);
			$pdf->SetXY($left,60);
			$pdf->Cell(190,4,'Subject:-',0,0,'L',0);
			$pdf->SetFont('Times','B',12);
			$pdf->SetXY(37,60);
			$pdf->Cell(190,4,'Confidential papers of the HSLC Compartment & Improvement Examination',0,0,'L',0);
			$pdf->SetXY(180,60);
			$pdf->Cell(190,4,$year,0,0,'L',0);
			$pdf->SetFont('Times','',12);
			$pdf->SetXY($left,65);
			$pdf->Cell(190,4,'Sir/Madam,',0,0,'L',0);
			$pdf->SetXY(30,70);
			$pdf->Cell(190,4,'Kindly collect the packets on the specific dates for the HSLC Compartment & Improvement ',0,0,'L',0);
			$pdf->SetXY($left,75);
			$pdf->Cell(190,4,'Examination '.$year.', to be held from                               at your centre. The numbers of question papers  ',0,0,'L',0);
			$firstExam = mysql_query('select * from c10_timetbl where sl=1');
			$firstExam = mysql_fetch_array($firstExam);
			$pdf->SetFont('Times','B',12);
			$pdf->SetXY($left+61,75);
			$pdf->Cell(190,4,$firstExam['e_date'],0,0,'L',0);
			$pdf->SetFont('Times','',12);
			$pdf->SetXY($left,80);
			$pdf->Cell(190,4,'supplied are given below and you are requested to confirm the numbers from the statement of candidates    ',0,0,'L',0);
			$pdf->SetXY($left,85);
			$pdf->Cell(190,4,'supplied to ensure that all the subjects and the required numbers issued to your centre are sufficient.   ',0,0,'L',0);
			$pdf->SetXY($left,90);
			$pdf->Cell(190,4,'You are also requested to read the necessary rules/instructions for the conduct of examinations.',0,0,'L',0);
			$pdf->SetFont('Times','B',12);
			$pdf->SetXY(80,95);
			$pdf->Cell(190,4,'Time: '.$Etime,0,0,'L',0);
			$pdf->SetXY($left,100);
			$pdf->Cell(184,8,'Date',1,0,'L',0);
			$pdf->SetXY(60,100);
			$pdf->Cell(190,8,'Day',0,0,'L',0);
			$pdf->SetXY(90,100);
			$pdf->Cell(190,8,'Subject',0,0,'L',0);
			$pdf->SetXY(145,100);
			$pdf->Cell(190,8,'Number of question papers',0,0,'L',0);
			$sl=1;
			$ss=mysql_query("select * from c10_timetbl order by sl asc");
			while($rr=mysql_fetch_array($ss,MYSQL_ASSOC))
			{
				if($rr['subject']=='Mils')
				{
					$pdf->SetXY($left,$content+$off);
					$pdf->Cell(190,4,$rr['e_date'],0,0,'L',0);
					$pdf->SetXY(60,$content+$off);
					$pdf->Cell(190,4,$rr['day'],0,0,'L',0);
					$pdf->SetXY(90,$content+$off);
					$pdf->Cell(190,4,'Second Language:',0,0,'L',0);
					$off=$off+$inc;      
					$pdf->SetXY(95,$content+$off);
					$pdf->Cell(190,4,'i.    Tenyidie',0,0,'L',0);
					$pdf->SetXY($valAlign,$content+$off);
					if(!empty($row['tny']))
					{
						$pdf->Cell(190,4,$row['tny'],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'______',0,0,'L',0);
					}
					$off=$off+$inc;
					$pdf->SetXY(95,$content+$off);
					$pdf->Cell(190,4,'ii.   Ao',0,0,'L',0);
					 $pdf->SetXY($valAlign,$content+$off);
					if(!empty($row['aon']))
					{
						$pdf->Cell(190,4,$row['aon'],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'______',0,0,'L',0);
					}
					$off=$off+$inc;
					$pdf->SetXY(95,$content+$off);
					$sumi = iconv('UTF-8','windows-1252','iii.  Sumi(Sütsah)');
					$pdf->Cell(190,4,$sumi,0,0,'L',0);
					//$pdf->Cell(190,4,'iii.  Sumi(Sütsah)',0,0,'L',0);
					$pdf->SetXY($valAlign,$content+$off);
					if(!empty($row['smi']))
					{
						$pdf->Cell(190,4,$row['smi'],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'______',0,0,'L',0);
					}
					$off=$off+$inc;
					$pdf->SetXY(95,$content+$off);
					$pdf->Cell(190,4,'iv.  Lotha',0,0,'L',0);
					$pdf->SetXY($valAlign,$content+$off);
					if(!empty($row['lta']))
					{
						$pdf->Cell(190,4,$row['lta'],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'______',0,0,'L',0);
					}
					$off=$off+$inc;
					$pdf->SetXY(95,$content+$off);
					$pdf->Cell(190,4,'v.   Hindi',0,0,'L',0);
					$pdf->SetXY($valAlign,$content+$off);
					if(!empty($row['hnd']))
					{
						$pdf->Cell(190,4,$row['hnd'],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'______',0,0,'L',0);
					}
					$off=$off+$inc;
					$pdf->SetXY(95,$content+$off);
					$pdf->Cell(190,4,'vi.  Bengali',0,0,'L',0);
					$pdf->SetXY($valAlign,$content+$off);
					if(!empty($row['bng']))
					{
						$pdf->Cell(190,4,$row['bng'],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'______',0,0,'L',0);
					}
					$off=$off+$inc;
					$pdf->SetXY(95,$content+$off);
					$pdf->Cell(190,4,'vii. Alternative English',0,0,'L',0);
					$pdf->SetXY($valAlign,$content+$off);
					if(!empty($row['alt']))
					{
						$pdf->Cell(190,4,$row['alt'],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'______',0,0,'L',0);
					}
					$off=$off+$inc;
				}

				else if($rr['subject']=='6th') 
				{
					$pdf->SetXY($left,$content+$off);
					$pdf->Cell(190,4,$rr['e_date'],0,0,'L',0);
					$pdf->SetXY(60,$content+$off);
					$pdf->Cell(190,4,$rr['day'],0,0,'L',0);
					$pdf->SetXY(90,$content+$off);
					$pdf->Cell(190,4,'Sixth/Vocational Subjects(Time:1:00 pm to 4.00 pm)',0,0,'L',0);
					$off=$off+$inc;
					$pdf->SetXY(95,$content+$off);
					$pdf->Cell(190,4,'i.     FIT',0,0,'L',0);
					$pdf->SetXY($valAlign,$content+$off);
					if(!empty($row['fit']))
					{
						$pdf->Cell(190,4,$row['fit'],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'______',0,0,'L',0);
					}
					$off=$off+$inc;
					$pdf->SetXY(95,$content+$off);
					$pdf->Cell(190,4,'ii.    Music',0,0,'L',0);
					$pdf->SetXY($valAlign,$content+$off);
					if(!empty($row['ms']))
					{
						$pdf->Cell(190,4,$row['ms'],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'______',0,0,'L',0);
					}
					$off=$off+$inc;
					$pdf->SetXY(95,$content+$off);
					$pdf->Cell(190,4,'iii.   Home Science',0,0,'L',0);
					$pdf->SetXY($valAlign,$content+$off);
					if(!empty($row['hs']))
					{
						$pdf->Cell(190,4,$row['hs'],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'______',0,0,'L',0);
					}
					$off=$off+$inc;
					$pdf->SetXY(95,$content+$off);
					$pdf->Cell(190,4,'iv.   BK & Accountancy',0,0,'L',0);
					$pdf->SetXY($valAlign,$content+$off);
					if(!empty($row['bk']))
					{
						$pdf->Cell(190,4,$row['bk'],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'______',0,0,'L',0);
					}
					$off=$off+$inc;
					$pdf->SetXY(95,$content+$off);
					$pdf->Cell(190,4,'v.    Environmental Education',0,0,'L',0);
					$pdf->SetXY($valAlign,$content+$off);
					if(!empty($row['ee']))
					{
						$pdf->Cell(190,4,$row['ee'],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'______',0,0,'L',0);
					}
					$off=$off+$inc;
					$pdf->SetXY(95,$content+$off);
					$pdf->Cell(190,4,'vi.   ITeS',0,0,'L',0);
					
					$pdf->SetXY($valAlign,$content+$off);
					if(!empty($row['iv']))
					{
						$pdf->Cell(190,4,$row['iv'],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'______',0,0,'L',0);
					}
					$off=$off+$inc;
					$pdf->SetXY(95,$content+$off);
					$pdf->Cell(190,4,'vii.  Tourism & Hospitality',0,0,'L',0);
					
					$pdf->SetXY($valAlign,$content+$off);
					if(!empty($row['tt']))
					{
						$pdf->Cell(190,4,$row['tt'],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'______',0,0,'L',0);
					}
					$off=$off+$inc;
					$pdf->SetXY(95,$content+$off);
					$pdf->Cell(190,4,'viii. Retail',0,0,'L',0);
					
					$pdf->SetXY($valAlign,$content+$off);
					if(!empty($row['rv']))
					{
						$pdf->Cell(190,4,$row['rv'],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'______',0,0,'L',0);
					}
					$off=$off+$inc;
					$pdf->SetXY(95,$content+$off);
					$pdf->Cell(190,4,'ix.   Healthcare',0,0,'L',0);
					$pdf->SetXY($valAlign,$content+$off);
					if(empty($row['hv']))
					{
						$pdf->Cell(190,4,'______',0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,$row['hv'],0,0,'L',0);
					}
					$off=$off+$inc;
					$pdf->SetXY(95,$content+$off);
					$pdf->Cell(190,4,'x.    Beauty & Wellness',0,0,'L',0);
					$pdf->SetXY($valAlign,$content+$off);
					if(!empty($row['bv']))
					{
						$pdf->Cell(190,4,$row['bv'],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'______',0,0,'L',0);
					}
					$off=$off+$inc;
					$pdf->SetXY(95,$content+$off);
					$pdf->Cell(190,4,'xi.   Electronics & Hardware',0,0,'L',0);
					$pdf->SetXY($valAlign,$content+$off);
					if(!empty($row['ev']))
					{
						$pdf->Cell(190,4,$row['ev'],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'______',0,0,'L',0);
					}
					$off=$off+$inc;
					$pdf->SetXY(95,$content+$off);
					$pdf->Cell(190,4,'xii.  Multi Skill',0,0,'L',0);
					$pdf->SetXY($valAlign,$content+$off);
					if(!empty($row['mv']))
					{
						$pdf->Cell(190,4,$row['mv'],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'______',0,0,'L',0);
					}
					$off=$off+$inc;
					$pdf->SetXY(95,$content+$off);
					$pdf->Cell(190,4,'xiii.  Agriculture',0,0,'L',0);
					$pdf->SetXY($valAlign,$content+$off);
					if(!empty($row['av']))
					{
						$pdf->Cell(190,4,$row['av'],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'______',0,0,'L',0);
					}
					$off=$off+$inc;
					$pdf->SetXY(95,$content+$off);
					$pdf->Cell(190,4,'xiv.  Automotive',0,0,'L',0);
					$pdf->SetXY($valAlign,$content+$off);
					if(!empty($row['at']))
					{
						$pdf->Cell(190,4,$row['at'],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'______',0,0,'L',0);
					}


					$off=$off+$inc;


				} 
				else //if($rr['subject'])
				{
					$pdf->SetXY($left,$content+$off);
					$pdf->Cell(190,4,$rr['e_date'],0,0,'L',0);
					$pdf->SetXY(60,$content+$off);
					$pdf->Cell(190,4,$rr['day'],0,0,'L',0);
					$pdf->SetXY(90,$content+$off);
					if($rr['subject']=='Science')
					{
						$pdf->Cell(190,4,$rr['subject'],0,0,'L',0);
						$pdf->SetXY($valAlign,$content+$off);
						$pdf->Cell(190,4,$row['sc'],0,0,'L',0);
					}
					else if($rr['subject']=='English')
					{
						$pdf->Cell(190,4,$rr['subject'],0,0,'L',0);
						$pdf->SetXY($valAlign,$content+$off);
						$pdf->Cell(190,4,$row['eng'],0,0,'L',0);
					}
					else if($rr['subject']=='Mathematics')
					{
						$pdf->Cell(190,4,$rr['subject'],0,0,'L',0);
						$pdf->SetXY($valAlign,$content+$off);
						$pdf->Cell(190,4,$row['mat'],0,0,'L',0);
					}
					else if($rr['subject']=='Social Sciences')
					{
						$pdf->Cell(190,4,$rr['subject'],0,0,'L',0);
						$pdf->SetXY($valAlign,$content+$off);
						$pdf->Cell(190,4,$row['ss'],0,0,'L',0);
					}
					$off=$off+$inc;
				}
				$sl++;
			} 
			$off=0;
			$sign =16; $bottom = 6;
			$pdf->SetFont('Times','',11);
			$pdf->SetXY(10,271+$sign);
			$pdf->Cell(190,4,'( Mrs. Asano Sekhose )',0,0,'R',0);
			$sign = $sign+$bottom;
			$pdf->SetXY(175,269+$sign);
			$pdf->Cell(190,4,'Chairman',0,0,'L',0);
			$sign = $sign+$bottom;
			$pdf->SetXY($left,269+$sign);
			$pdf->Cell(190,4,$get['noti_detail'],0,0,'L',0);
			$pdf->SetXY(134,269+$sign);
			$pdf->Cell(147,4,'Dated Kohima, the      ',0,0,'L',0);
			$pdf->SetXY(171,269+$sign-2);
			$pdf->Cell(190,4,$get['sup_script'],0,0,'L',0);
			$pdf->SetXY(175,269+$sign);
			$pdf->Cell(190,4,$get['noti_month_year'],0,0,'L',0);


			$sign = $sign+$bottom;
			$pdf->SetXY($left,270+$sign);
			$pdf->Cell(190,4,'Copy for information and necessary action :-',0,0,'L',0);
			$sign = $sign+$bottom;
			$pdf->SetXY(20,270+$sign);
			$pdf->Cell(190,4,'1.      Mr/Ms._________________________________________________',0,0,'L',0);
			$sign = $sign+$bottom;
			$pdf->SetXY(20,270+$sign);
			$pdf->Cell(190,4,'2.      Mr/Ms._________________________________________________',0,0,'L',0);
			$sign = $sign+$bottom;
			$pdf->SetXY(10,270+$sign);
			$pdf->Cell(190,4,'( Mrs. Asano Sekhose )',0,0,'R',0);
			$sign = $sign+$bottom;
			$pdf->SetXY(175,270+$sign);
			$pdf->Cell(190,4,'Chairman',0,0,'L',0);
		}
	} 
	if($class==10 && $dist!="KOHIMA")
	{
		$content=95;
		$sql=mysql_query("select * from c10_pkChrt_16 where district='$dist'");
		while($row=mysql_fetch_array($sql,MYSQL_ASSOC))
		{
			$pdf->AddPage();
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
		
			//*************************************
			//   6th subject
			//*************************************
			if(!empty($row['fit'])){ $tot7=1;} else {$tot7=0;}
			if(!empty($row['ms'])){ $tot8=1;} else {$tot8=0;}
			if(!empty($row['hs'])){ $tot9=1;} else {$tot9=0;}
			if(!empty($row['bk'])){ $tot10=1;} else {$tot10=0;}
			if(!empty($row['ee'])){ $tot11=1;} else {$tot11=0;}
			if(!empty($row['iv'])){ $tot12=1;} else {$tot12=0;}

			if(!empty($row['tt'])){ $tot13=1;} else {$tot13=0;}
			if(!empty($row['hv'])){ $tot16=1;} else {$tot16=0;}
			if(!empty($row['rv'])){ $tot15=1;} else {$tot15=0;}
			if(!empty($row['ev'])){ $tot17=1;} else {$tot17=0;}
			if(!empty($row['bv'])){ $tot18=1;} else {$tot18=0;}
			if(!empty($row['mv'])){ $tot19=1;} else {$tot19=0;}
			if(!empty($row['av'])){ $tot22=1;} else {$tot22=0;}
			if(!empty($row['at'])){ $tot23=1;} else {$tot23=0;}



			$tot=$tot1+$tot2+$tot3+$tot4+$tot5+$tot6+$tot7+$tot8+$tot9+$tot10+$tot11+$tot12+$tot13+$tot14+$tot16+$tot15+$tot17+$tot18+$tot19+$tot22+$tot23+4;


			
			$not = mysql_query("select * from notification_tbl where class='10'");
			$get = mysql_fetch_array($not);
			$pdf->SetFont('Times','B',8);
			$pdf->SetXY(10,10);
			$pdf->Cell(190,4,'Confidential(HSLC)',0,0,'R',0);
			$pdf->SetFont('Times','B',13);
			$pdf->SetXY(10,15);
			$pdf->Cell(190,4,'Nagaland Board of School Education',0,0,'C',0);
			$pdf->SetXY(10,20);
			$pdf->Cell(190,4,'Kohima',0,0,'C',0);
			$pdf->SetFont('Times','',11);
			$pdf->SetXY($left,30);
			$pdf->Cell(190,4,$get['noti_detail'],0,0,'L',0);
			$pdf->SetXY(134,30);
			$pdf->Cell(150,4,'Dated Kohima, the      ',0,0,'L',0);
			$pdf->SetXY(171,28);
			$pdf->Cell(190,4,$get['sup_script'],0,0,'L',0);
			$pdf->SetXY(175,30);
			$pdf->Cell(190,4,$get['noti_month_year'],0,0,'L',0);
			$pdf->SetFont('Times','',12);
			$pdf->SetXY($left,35);
			$pdf->Cell(190,4,'To,',0,0,'L',0);
			$pdf->SetXY(30,40);
			$pdf->Cell(190,4,'The Sr. Treasury Officer/Treasury Officer/Sub-Treasury Officer/',0,0,'L',0);
			$pdf->SetXY(30,45);
			$pdf->Cell(190,4,'Branch Manager,______________________________________________.',0,0,'L',0);
			$pdf->SetXY($left,50);
			$pdf->Cell(190,4,'Subject:-',0,0,'L',0);
			$pdf->SetFont('Times','B',12);
			$pdf->SetXY(38,50);
			$pdf->Cell(190,4,'Confidential papers of the HSLC Compartment & Improvement Examination',0,0,'L',0);
			$pdf->SetXY(180,50);
			$pdf->Cell(190,4,$year,0,0,'L',0);
			$pdf->SetFont('Times','',12);
			$pdf->SetXY($left,55);
			$pdf->Cell(190,4,'Sir/Madam,',0,0,'L',0);
			$pdf->SetXY(30,60);
			$pdf->Cell(190,4,'Please find herewith      sealed packets of Confidential Papers to be kept under your custody',0,0,'L',0);
			$pdf->SetXY(66,60);
			$pdf->SetFont('Times','B',12);
			$pdf->Cell(190,4,$tot,0,0,'L',0);
			$pdf->SetFont('Times','',12);
			$pdf->SetXY($left,65);
			$pdf->Cell(190,4,'for the                                            								                                to be held from                               as per ',0,0,'L',0);
			$pdf->SetFont('Times','I',12);
			$pdf->SetXY($left+13,65);
			$pdf->Cell(190,4,'HSLC Compartment & Improvement Examination ',0,0,'L',0);
			$pdf->SetXY($left+53,65);
			//$pdf->Cell(190,4,''.$year,0,0,'L',0);
			$pdf->SetFont('Times','B',12);
			$firstExam = mysql_query('select * from c10_timetbl where sl=1');
			$firstExam = mysql_fetch_array($firstExam);
			$pdf->SetXY($left+128,65);
			$pdf->Cell(190,4,$firstExam['e_date'],0,0,'L',0);
			$pdf->SetFont('Times','',12);
			$pdf->SetXY($left,70);
			$pdf->Cell(190,4,'routine enclosed. Kindly issue the confidential packets to the concerned Centre Superintendent on  ',0,0,'L',0);
			$pdf->SetXY($left,75);
			$pdf->Cell(190,4,'the dates shown below at the appointed time against each subject:',0,0,'L',0);
			$pdf->SetFont('Times','B',12);
			$pdf->SetXY(80,80);
			$pdf->Cell(190,4,'Time: '.$Etime,0,0,'L',0);
			$pdf->SetXY($left,85);
			$pdf->Cell(184,8,'Date',1,0,'L',0);
			$pdf->SetXY(60,85);
			$pdf->Cell(190,8,'Day',0,0,'L',0);
			$pdf->SetXY(90,85);
			$pdf->Cell(190,8,'Subject',0,0,'L',0);
			$pdf->SetXY(145,85);
			$pdf->Cell(190,8,'Number of question papers',0,0,'L',0);
			$sl=1;
			$ss=mysql_query("select * from c10_timetbl order by sl asc");
			while($rr=mysql_fetch_array($ss,MYSQL_ASSOC))
			{
				$inc = 6;
				if($rr['subject']=='Mils')
				{
					$pdf->SetXY($left,$content+$off);
					$pdf->Cell(190,4,$rr['e_date'],0,0,'L',0);
					$pdf->SetXY(60,$content+$off);
					$pdf->Cell(190,4,$rr['day'],0,0,'L',0);
					$pdf->SetXY(90,$content+$off);
					$pdf->Cell(190,4,'Second Language:',0,0,'L',0);
					$off=$off+$inc;      
					$pdf->SetXY(95,$content+$off);
					$pdf->Cell(190,4,'i.    Tenyidie',0,0,'L',0);
					$pdf->SetXY($valAlign,$content+$off);
					if(!empty($row['tny']))
					{
						$pdf->Cell(190,4,$row['tny'],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'______',0,0,'L',0);
					}
					$off=$off+$inc;
					$pdf->SetXY(95,$content+$off);
					$pdf->Cell(190,4,'ii.   Ao',0,0,'L',0);
					$pdf->SetXY($valAlign,$content+$off);
					if(!empty($row['aon']))
					{
						$pdf->Cell(190,4,$row['aon'],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'______',0,0,'L',0);
					}
					$off=$off+$inc;
					$pdf->SetXY(95,$content+$off);
					$sumi = iconv('UTF-8','windows-1252','iii.  Sumi(Sütsah)');
					$pdf->Cell(190,4,$sumi,0,0,'L',0);
					//$pdf->Cell(190,4,'iii.  Sumi(Sütsah)',0,0,'L',0);
					$pdf->SetXY($valAlign,$content+$off);
					if(!empty($row['smi']))
					{
						$pdf->Cell(190,4,$row['smi'],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'______',0,0,'L',0);
					}
					$off=$off+$inc;
					$pdf->SetXY(95,$content+$off);
					$pdf->Cell(190,4,'iv.  Lotha',0,0,'L',0);
					$pdf->SetXY($valAlign,$content+$off);
					if(!empty($row['lta']))
					{
						$pdf->Cell(190,4,$row['lta'],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'______',0,0,'L',0);
					}
					$off=$off+$inc;
					$pdf->SetXY(95,$content+$off);
					$pdf->Cell(190,4,'v.   Hindi',0,0,'L',0);
					$pdf->SetXY($valAlign,$content+$off);
					if(!empty($row['hnd']))
					{
						$pdf->Cell(190,4,$row['hnd'],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'______',0,0,'L',0);
					}
					$off=$off+$inc;
					$pdf->SetXY(95,$content+$off);
					$pdf->Cell(190,4,'vi.  Bengali',0,0,'L',0);
					$pdf->SetXY($valAlign,$content+$off);
					if(!empty($row['bng']))
					{
						$pdf->Cell(190,4,$row['bng'],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'______',0,0,'L',0);
					}
					$off=$off+$inc;
					$pdf->SetXY(95,$content+$off);
					$pdf->Cell(190,4,'vii. Alternative English',0,0,'L',0);
					$pdf->SetXY($valAlign,$content+$off);
					if(!empty($row['alt']))
					{
						$pdf->Cell(190,4,$row['alt'],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'______',0,0,'L',0);
					}
					$off=$off+$inc;
				}
				else if($rr['subject']=='6th') 
				{
					$pdf->SetXY($left,$content+$off);
					$pdf->Cell(190,4,$rr['e_date'],0,0,'L',0);
					$pdf->SetXY(60,$content+$off);
					$pdf->Cell(190,4,$rr['day'],0,0,'L',0);
					$pdf->SetXY(90,$content+$off);
					$pdf->Cell(190,4,'Sixth/Vocational Subjects(Time:1:00 pm to 4.00 pm)',0,0,'L',0);
					$off=$off+$inc;
					$pdf->SetXY(95,$content+$off);
					$pdf->Cell(190,4,'i.     FIT',0,0,'L',0);
					$pdf->SetXY($valAlign,$content+$off);
					if(!empty($row['fit']))
					{
						$pdf->Cell(190,4,$row['fit'],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'______',0,0,'L',0);
					}
					$off=$off+$inc;
					$pdf->SetXY(95,$content+$off);
					$pdf->Cell(190,4,'ii.    Music',0,0,'L',0);
					$pdf->SetXY($valAlign,$content+$off);
					if(!empty($row['ms']))
					{
						$pdf->Cell(190,4,$row['ms'],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'______',0,0,'L',0);
					}
					$off=$off+$inc;
					$pdf->SetXY(95,$content+$off);
					$pdf->Cell(190,4,'iii.   Home Science',0,0,'L',0);
					$pdf->SetXY($valAlign,$content+$off);
					if(!empty($row['hs']))
					{
						$pdf->Cell(190,4,$row['hs'],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'______',0,0,'L',0);
					}
					$off=$off+$inc;
					$pdf->SetXY(95,$content+$off);
					$pdf->Cell(190,4,'iv.   BK & Accountancy',0,0,'L',0);
					$pdf->SetXY($valAlign,$content+$off);
					if(!empty($row['bk']))
					{
						$pdf->Cell(190,4,$row['bk'],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'______',0,0,'L',0);
					}
					$off=$off+$inc;
					$pdf->SetXY(95,$content+$off);
					$pdf->Cell(190,4,'v.    Environmental Education',0,0,'L',0);
					$pdf->SetXY($valAlign,$content+$off);
					if(!empty($row['ee']))
					{
						$pdf->Cell(190,4,$row['ee'],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'______',0,0,'L',0);
					}
					$off=$off+$inc;
					$pdf->SetXY(95,$content+$off);
					$pdf->Cell(190,4,'vi.   ITeS',0,0,'L',0);
					
					$pdf->SetXY($valAlign,$content+$off);
					if(!empty($row['iv']))
					{
						$pdf->Cell(190,4,$row['iv'],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'______',0,0,'L',0);
					}
					$off=$off+$inc;
					$pdf->SetXY(95,$content+$off);
					$pdf->Cell(190,4,'vii.  Tourism & Hospitality',0,0,'L',0);
					
					$pdf->SetXY($valAlign,$content+$off);
					if(!empty($row['tt']))
					{
						$pdf->Cell(190,4,$row['tt'],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'______',0,0,'L',0);
					}
					$off=$off+$inc;
					$pdf->SetXY(95,$content+$off);
					$pdf->Cell(190,4,'viii. Retail',0,0,'L',0);
					
					$pdf->SetXY($valAlign,$content+$off);
					if(!empty($row['rv']))
					{
						$pdf->Cell(190,4,$row['rv'],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'______',0,0,'L',0);
					}
					$off=$off+$inc;
					$pdf->SetXY(95,$content+$off);
					$pdf->Cell(190,4,'ix.   Healthcare',0,0,'L',0);
					$pdf->SetXY($valAlign,$content+$off);
					if(empty($row['hv']))
					{
						$pdf->Cell(190,4,'______',0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,$row['hv'],0,0,'L',0);
					}
					$off=$off+$inc;
					$pdf->SetXY(95,$content+$off);
					$pdf->Cell(190,4,'x.    Beauty & Wellness',0,0,'L',0);
					$pdf->SetXY($valAlign,$content+$off);
					if(!empty($row['bv']))
					{
						$pdf->Cell(190,4,$row['bv'],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'______',0,0,'L',0);
					}
					$off=$off+$inc;
					$pdf->SetXY(95,$content+$off);
					$pdf->Cell(190,4,'xi.   Electronics & Hardware',0,0,'L',0);
					$pdf->SetXY($valAlign,$content+$off);
					if(!empty($row['ev']))
					{
						$pdf->Cell(190,4,$row['ev'],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'______',0,0,'L',0);
					}
					$off=$off+$inc;
					$pdf->SetXY(95,$content+$off);
					$pdf->Cell(190,4,'xii.  Multi Skill',0,0,'L',0);
					$pdf->SetXY($valAlign,$content+$off);
					if(!empty($row['mv']))
					{
						$pdf->Cell(190,4,$row['mv'],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'______',0,0,'L',0);
					}
					$off=$off+$inc;
					$pdf->SetXY(95,$content+$off);
					$pdf->Cell(190,4,'xiii.  Agriculture',0,0,'L',0);
					$pdf->SetXY($valAlign,$content+$off);
					if(!empty($row['av']))
					{
						$pdf->Cell(190,4,$row['av'],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'______',0,0,'L',0);
					}
					$off=$off+$inc;


					$pdf->SetXY(95,$content+$off);
					$pdf->Cell(190,4,'xiv.  Automotive',0,0,'L',0);
					$pdf->SetXY($valAlign,$content+$off);
					if(!empty($row['at']))
					{
						$pdf->Cell(190,4,$row['at'],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'______',0,0,'L',0);
					}
					$off=$off+$inc;
				} 
				else //if($rr['subject'])
				{
					$pdf->SetXY($left,$content+$off);
					$pdf->Cell(190,4,$rr['e_date'],0,0,'L',0);
					$pdf->SetXY(60,$content+$off);
					$pdf->Cell(190,4,$rr['day'],0,0,'L',0);
					$pdf->SetXY(90,$content+$off);
					if($rr['subject']=='Science')
					{
						$pdf->Cell(190,4,$rr['subject'],0,0,'L',0);
						$pdf->SetXY($valAlign,$content+$off);
						$pdf->Cell(190,4,$row['sc'],0,0,'L',0);
					}
					else if($rr['subject']=='English')
					{
						$pdf->Cell(190,4,$rr['subject'],0,0,'L',0);
						$pdf->SetXY($valAlign,$content+$off);
						$pdf->Cell(190,4,$row['eng'],0,0,'L',0);
					}
					else if($rr['subject']=='Mathematics')
					{
						$pdf->Cell(190,4,$rr['subject'],0,0,'L',0);
						$pdf->SetXY($valAlign,$content+$off);
						$pdf->Cell(190,4,$row['mat'],0,0,'L',0);
					}
					else if($rr['subject']=='Social Sciences')
					{
						$pdf->Cell(190,4,$rr['subject'],0,0,'L',0);
						$pdf->SetXY($valAlign,$content+$off);
						$pdf->Cell(190,4,$row['ss'],0,0,'L',0);
					}
					$off=$off+$inc;
				}
				$sl++;
			} 
			$off=0; 
			$sign =0; 
			$bottom = 6; 
			$pdf->SetFont('Times','',11);
			$pdf->SetXY(10,270+$sign);
			$pdf->Cell(190,4,'( Mrs. Asano Sekhose )',0,0,'R',0);
			$sign = $sign + $bottom;
			$pdf->SetXY(172,270+$sign);
			$pdf->Cell(190,4,'Chairman',0,0,'L',0);
			$sign = $sign + $bottom;
			$bottom = 5;
			$pdf->SetXY($left,270+$sign);
			$pdf->Cell(190,4,$get['noti_detail'],0,0,'L',0);
			$pdf->SetXY(134,270+$sign);
			$pdf->Cell(147,4,'Dated Kohima, the      ',0,0,'L',0);
			$pdf->SetXY(171,270+$sign-2);
			$pdf->Cell(190,4,$get['sup_script'],0,0,'L',0);
			$pdf->SetXY(175,270+$sign);
			$pdf->Cell(190,4,$get['noti_month_year'],0,0,'L',0);
			$sign = $sign + $bottom;
			$pdf->SetXY($left,270+$sign);
			$pdf->Cell(190,4,'Copy to :-',0,0,'L',0);
			$sign = $sign + $bottom;
			$pdf->SetXY(20,270+$sign);
			$pdf->Cell(190,4,'1.      The Deputy Commissioner/Additional Deputy Commissioner/S.D.O(Civil),',0,0,'L',0);
			$sign = $sign + $bottom;
			$pdf->SetXY(20,270+$sign);
			$pdf->Cell(190,4,'        __________________________________________ for information and necessary action.',0,0,'L',0);
			$sign = $sign + $bottom;
			$pdf->SetXY(20,270+$sign);
			$pdf->Cell(190,4,'2.      Mr/Ms_____________________________________, Centre Superintendent of',0,0,'L',0);
			$sign = $sign + $bottom;
			$pdf->SetXY(20,270+$sign);
			$pdf->SetFont('Times','B',12);
			$pdf->Cell(190,4,'        '.$row['school'].'.',0,0,'L',0);
			$sign = $sign + $bottom;
			$pdf->SetXY(20,270+$sign);
			$pdf->SetFont('Times','',12);
			//$pdf->Cell(190,4,'        Refer point 5 (ii) & (iii) in page 5 of Rules for Conduct of Examinations.',0,0,'L',0);
			$sign = $sign + $bottom;
			$pdf->SetFont('Times','',12);
			$pdf->SetXY(20,270+$sign);
			$pdf->Cell(190,4,'3.     Office Copy',0,0,'L',0);
			$sign = $sign + $bottom;
			$pdf->SetFont('Times','',12);
			$pdf->SetXY(10,270+$sign);
			$pdf->Cell(190,4,'( Mrs. Asano Sekhose )',0,0,'R',0);
			$sign = $sign + $bottom;
			$pdf->SetXY(172,270+$sign);
			$pdf->Cell(190,4,'Chairman',0,0,'L',0);
		}
	}
}
if($exam=="main" && $class=='10')
{
	if($class==10 && $dist=="KOHIMA")
	{
		$content = 110;

		$sql=mysql_query("select * from c10_pkChrt_16 where district='$dist'");
		while($row=mysql_fetch_array($sql,MYSQL_ASSOC))
		{
			$pdf->AddPage();
			$inc = 6;
			//*************************************
			//   SECOND LANGAUGE
			//*************************************

			if(!empty($row['aon'])){ $tot1=1;} else {$tot1=0;}
			if(!empty($row['smi'])){ $tot2=1;} else {$tot2=0;}
			if(!empty($row['lta'])){ $tot3=1;} else {$tot3=0;}
			if(!empty($row['hnd'])){ $tot4=1;} else {$tot4=0;}
			if(!empty($row['bng'])){ $tot5=1;} else {$tot5=0;}
			if(!empty($row['alt'])){ $tot6=1;} else {$tot6=0;}
			if(!empty($row['tny'])){ $tot14=1;} else {$tot14=0;}
		
			//*************************************
			//   6th subject
			//*************************************
			if(!empty($row['fit'])){ $tot7=1;} else {$tot7=0;}
			if(!empty($row['ms'])){ $tot8=1;} else {$tot8=0;}
			if(!empty($row['hs'])){ $tot9=1;} else {$tot9=0;}
			if(!empty($row['bk'])){ $tot10=1;} else {$tot10=0;}
			if(!empty($row['ee'])){ $tot11=1;} else {$tot11=0;}
			if(!empty($row['iv'])){ $tot12=1;} else {$tot12=0;}

			if(!empty($row['tt'])){ $tot13=1;} else {$tot13=0;}
			if(!empty($row['hv'])){ $tot16=1;} else {$tot16=0;}
			if(!empty($row['rv'])){ $tot15=1;} else {$tot15=0;}
			if(!empty($row['ev'])){ $tot17=1;} else {$tot17=0;}
			if(!empty($row['bv'])){ $tot18=1;} else {$tot18=0;}
			if(!empty($row['mv'])){ $tot19=1;} else {$tot19=0;}
			if(!empty($row['av'])){ $tot22=1;} else {$tot22=0;}
			if(!empty($row['at'])){ $tot23=1;} else {$tot23=0;}


			$tot=$tot1+$tot2+$tot3+$tot4+$tot5+$tot6+$tot7+$tot8+$tot9+$tot10+$tot11+$tot12+$tot13+$tot14+$tot16+$tot15+$tot17+$tot18+$tot19+$tot22+$tot23+4;
			$not = mysql_query("select * from notification_tbl where class='10'");
			$get = mysql_fetch_array($not);
			$pdf->SetFont('Times','B',8);
			$pdf->SetXY(10,10);
			$pdf->Cell(190,4,'Confidential(HSLC)',0,0,'R',0);
			$pdf->SetFont('Times','B',13);
			$pdf->SetXY(10,15);
			$pdf->Cell(190,4,'Nagaland Board of School Education',0,0,'C',0);
			$pdf->SetXY(10,20);
			$pdf->Cell(190,4,'Kohima',0,0,'C',0);
			$pdf->SetFont('Times','',11);
			$pdf->SetXY($left,30);
			$pdf->Cell(190,4,$get['noti_detail'],0,0,'L',0);
			$pdf->SetXY(134,30);
			$pdf->Cell(150,4,'Dated Kohima, the      ',0,0,'L',0);
			$pdf->SetXY(171,28);
			$pdf->Cell(190,4,$get['sup_script'],0,0,'L',0);
			$pdf->SetXY(175,30);
			$pdf->Cell(190,4,$get['noti_month_year'],0,0,'L',0);
			$pdf->SetFont('Times','',12);
			$pdf->SetXY($left,40);
			$pdf->Cell(190,4,'To,',0,0,'L',0);
			$pdf->SetXY(30,45);
			$pdf->Cell(190,4,'Mr/Ms.___________________________________________________________',0,0,'L',0);
			$pdf->SetXY(30,50);
			$pdf->Cell(190,4,'Centre Superintendent,',0,0,'L',0);
			$pdf->SetXY(30,55);
			$pdf->Cell(190,4,'Centre : ',0,0,'L',0);
			$pdf->SetFont('Times','B',11);
			$pdf->SetXY(50,55);
			$pdf->Cell(190,4,$row['school'],0,0,'L',0);
			$pdf->SetFont('Times','',11);
			$pdf->SetXY($left,60);
			$pdf->Cell(190,4,'Subject:-',0,0,'L',0);
			$pdf->SetFont('Times','B',12);
			$pdf->SetXY(37,60);
			$pdf->Cell(190,4,'Confidential papers of the High School Leaving Certificate Examination',0,0,'L',0);
			$pdf->SetXY(168,60);
			$pdf->Cell(190,4,$year,0,0,'L',0);
			$pdf->SetFont('Times','',12);
			$pdf->SetXY($left,65);
			$pdf->Cell(190,4,'Sir/Madam,',0,0,'L',0);
			$pdf->SetXY(30,70);
			$pdf->Cell(190,4,'Kindly collect the packets on the specific dates for the HSLC Examination '.$year.', to be held from',0,0,'L',0);
			$pdf->SetXY($left,75);
			$pdf->Cell(190,4,'                               at your centre. The numbers of question papers supplied are given below and you ',0,0,'L',0);
			$firstExam = mysql_query('select * from c10_timetbl where sl=1');
			$firstExam = mysql_fetch_array($firstExam);
			$pdf->SetFont('Times','B',12);
			$pdf->SetXY($left+0,75);
			$pdf->Cell(190,4,$firstExam['e_date'],0,0,'L',0);
			$pdf->SetFont('Times','',12);
			$pdf->SetXY($left,80);
			$pdf->Cell(190,4,'are requested to confirm the numbers from the statement of candidates supplied to ensure that all the    ',0,0,'L',0);
			$pdf->SetXY($left,85);
			$pdf->Cell(190,4,'subjects and the required numbers issued to your centre are sufficient. You are also requested to read the  ',0,0,'L',0);
			$pdf->SetXY($left,90);
			$pdf->Cell(190,4,'necessary rules/instructions for the conduct of examinations.',0,0,'L',0);
			$pdf->SetFont('Times','B',12);
			$pdf->SetXY(60,95);
			$pdf->Cell(190,4,'Time: '.$Etime.'( Vocational: '.$Vtime.' )',0,0,'L',0);
			$pdf->SetXY($left,100);
			$pdf->Cell(184,8,'Date',1,0,'L',0);
			$pdf->SetXY(60,100);
			$pdf->Cell(190,8,'Day',0,0,'L',0);
			$pdf->SetXY(90,100);
			$pdf->Cell(190,8,'Subject',0,0,'L',0);
			$pdf->SetXY(145,100);
			$pdf->Cell(190,8,'Number of question papers',0,0,'L',0);
			$sl=1;
			$ss=mysql_query("select * from c10_timetbl order by sl asc");
			while($rr=mysql_fetch_array($ss,MYSQL_ASSOC))
			{
				if($rr['subject']=='Mils')
				{
					$pdf->SetXY($left,$content+$off);
					$pdf->Cell(190,4,$rr['e_date'],0,0,'L',0);
					$pdf->SetXY(60,$content+$off);
					$pdf->Cell(190,4,$rr['day'],0,0,'L',0);
					$pdf->SetXY(90,$content+$off);
					$pdf->Cell(190,4,'Second Language:',0,0,'L',0);
					$off=$off+$inc;      
					$pdf->SetXY(95,$content+$off);
					$pdf->Cell(190,4,'i.    Tenyidie',0,0,'L',0);
					$pdf->SetXY($valAlign,$content+$off);
					if(!empty($row['tny']))
					{
						$pdf->Cell(190,4,$row['tny'],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'______',0,0,'L',0);
					}
					$off=$off+$inc;
					$pdf->SetXY(95,$content+$off);
					$pdf->Cell(190,4,'ii.   Ao',0,0,'L',0);
					 $pdf->SetXY($valAlign,$content+$off);
					if(!empty($row['aon']))
					{
						$pdf->Cell(190,4,$row['aon'],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'______',0,0,'L',0);
					}
					$off=$off+$inc;
					$pdf->SetXY(95,$content+$off);
					$sumi = iconv('UTF-8','windows-1252','iii.  Sumi(Sütsah)');
					$pdf->Cell(190,4,$sumi,0,0,'L',0);
					//$pdf->Cell(190,4,'iii.  Sumi(Sütsah)',0,0,'L',0);
					$pdf->SetXY($valAlign,$content+$off);
					if(!empty($row['smi']))
					{
						$pdf->Cell(190,4,$row['smi'],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'______',0,0,'L',0);
					}
					$off=$off+$inc;
					$pdf->SetXY(95,$content+$off);
					$pdf->Cell(190,4,'iv.  Lotha',0,0,'L',0);
					$pdf->SetXY($valAlign,$content+$off);
					if(!empty($row['lta']))
					{
						$pdf->Cell(190,4,$row['lta'],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'______',0,0,'L',0);
					}
					$off=$off+$inc;
					$pdf->SetXY(95,$content+$off);
					$pdf->Cell(190,4,'v.   Hindi',0,0,'L',0);
					$pdf->SetXY($valAlign,$content+$off);
					if(!empty($row['hnd']))
					{
						$pdf->Cell(190,4,$row['hnd'],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'______',0,0,'L',0);
					}
					$off=$off+$inc;
					$pdf->SetXY(95,$content+$off);
					$pdf->Cell(190,4,'vi.  Bengali',0,0,'L',0);
					$pdf->SetXY($valAlign,$content+$off);
					if(!empty($row['bng']))
					{
						$pdf->Cell(190,4,$row['bng'],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'______',0,0,'L',0);
					}
					$off=$off+$inc;
					$pdf->SetXY(95,$content+$off);
					$pdf->Cell(190,4,'vii. Alternative English',0,0,'L',0);
					$pdf->SetXY($valAlign,$content+$off);
					if(!empty($row['alt']))
					{
						$pdf->Cell(190,4,$row['alt'],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'______',0,0,'L',0);
					}
					$off=$off+$inc;
				}

				else if($rr['subject']=='6th') 
				{
					$pdf->SetXY($left,$content+$off);
					$pdf->Cell(190,4,$rr['e_date'],0,0,'L',0);
					$pdf->SetXY(60,$content+$off);
					$pdf->Cell(190,4,$rr['day'],0,0,'L',0);
					$pdf->SetXY(90,$content+$off);
					$pdf->Cell(190,4,'Sixth/Vocational Subjects:',0,0,'L',0);
					$off=$off+$inc;
					$pdf->SetXY(95,$content+$off);
					$pdf->Cell(190,4,'i.     FIT',0,0,'L',0);
					$pdf->SetXY($valAlign,$content+$off);
					if(!empty($row['fit']))
					{
						$pdf->Cell(190,4,$row['fit'],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'______',0,0,'L',0);
					}
					$off=$off+$inc;
					$pdf->SetXY(95,$content+$off);
					$pdf->Cell(190,4,'ii.    Music',0,0,'L',0);
					$pdf->SetXY($valAlign,$content+$off);
					if(!empty($row['ms']))
					{
						$pdf->Cell(190,4,$row['ms'],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'______',0,0,'L',0);
					}
					$off=$off+$inc;
					$pdf->SetXY(95,$content+$off);
					$pdf->Cell(190,4,'iii.   Home Science',0,0,'L',0);
					$pdf->SetXY($valAlign,$content+$off);
					if(!empty($row['hs']))
					{
						$pdf->Cell(190,4,$row['hs'],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'______',0,0,'L',0);
					}
					$off=$off+$inc;
					$pdf->SetXY(95,$content+$off);
					$pdf->Cell(190,4,'iv.   BK & Accountancy',0,0,'L',0);
					$pdf->SetXY($valAlign,$content+$off);
					if(!empty($row['bk']))
					{
						$pdf->Cell(190,4,$row['bk'],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'______',0,0,'L',0);
					}
					$off=$off+$inc;
					$pdf->SetXY(95,$content+$off);
					$pdf->Cell(190,4,'v.    Environmental Education',0,0,'L',0);
					$pdf->SetXY($valAlign,$content+$off);
					if(!empty($row['ee']))
					{
						$pdf->Cell(190,4,$row['ee'],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'______',0,0,'L',0);
					}
					$off=$off+$inc;
					$pdf->SetXY(95,$content+$off);
					$pdf->Cell(190,4,'vi.   ITeS',0,0,'L',0);
					
					$pdf->SetXY($valAlign,$content+$off);
					if(!empty($row['iv']))
					{
						$pdf->Cell(190,4,$row['iv'],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'______',0,0,'L',0);
					}
					$off=$off+$inc;
					$pdf->SetXY(95,$content+$off);
					$pdf->Cell(190,4,'vii.  Tourism & Hospitality',0,0,'L',0);
					
					$pdf->SetXY($valAlign,$content+$off);
					if(!empty($row['tt']))
					{
						$pdf->Cell(190,4,$row['tt'],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'______',0,0,'L',0);
					}
					$off=$off+$inc;
					$pdf->SetXY(95,$content+$off);
					$pdf->Cell(190,4,'viii. Retail',0,0,'L',0);
					
					$pdf->SetXY($valAlign,$content+$off);
					if(!empty($row['rv']))
					{
						$pdf->Cell(190,4,$row['rv'],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'______',0,0,'L',0);
					}
					$off=$off+$inc;
					$pdf->SetXY(95,$content+$off);
					$pdf->Cell(190,4,'ix.   Healthcare',0,0,'L',0);
					$pdf->SetXY($valAlign,$content+$off);
					if(empty($row['hv']))
					{
						$pdf->Cell(190,4,'______',0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,$row['hv'],0,0,'L',0);
					}
					$off=$off+$inc;
					$pdf->SetXY(95,$content+$off);
					$pdf->Cell(190,4,'x.    Beauty & Wellness',0,0,'L',0);
					$pdf->SetXY($valAlign,$content+$off);
					if(!empty($row['bv']))
					{
						$pdf->Cell(190,4,$row['bv'],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'______',0,0,'L',0);
					}
					$off=$off+$inc;
					$pdf->SetXY(95,$content+$off);
					$pdf->Cell(190,4,'xi.   Electronics & Hardware',0,0,'L',0);
					$pdf->SetXY($valAlign,$content+$off);
					if(!empty($row['ev']))
					{
						$pdf->Cell(190,4,$row['ev'],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'______',0,0,'L',0);
					}
					$off=$off+$inc;
					$pdf->SetXY(95,$content+$off);
					$pdf->Cell(190,4,'xii.  Multi Skill',0,0,'L',0);
					$pdf->SetXY($valAlign,$content+$off);
					if(!empty($row['mv']))
					{
						$pdf->Cell(190,4,$row['mv'],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'______',0,0,'L',0);
					}
					$off=$off+$inc;
					$pdf->SetXY(95,$content+$off);
					$pdf->Cell(190,4,'xiii.  Agriculture',0,0,'L',0);
					$pdf->SetXY($valAlign,$content+$off);
					if(!empty($row['av']))
					{
						$pdf->Cell(190,4,$row['av'],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'______',0,0,'L',0);
					}
					$off=$off+$inc;
					$pdf->SetXY(95,$content+$off);
					$pdf->Cell(190,4,'xiv.  Automotive',0,0,'L',0);
					$pdf->SetXY($valAlign,$content+$off);
					if(!empty($row['at']))
					{
						$pdf->Cell(190,4,$row['at'],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'______',0,0,'L',0);
					}


					$off=$off+$inc;


				} 
				else //if($rr['subject'])
				{
					$pdf->SetXY($left,$content+$off);
					$pdf->Cell(190,4,$rr['e_date'],0,0,'L',0);
					$pdf->SetXY(60,$content+$off);
					$pdf->Cell(190,4,$rr['day'],0,0,'L',0);
					$pdf->SetXY(90,$content+$off);
					if($rr['subject']=='Science')
					{
						$pdf->Cell(190,4,$rr['subject'],0,0,'L',0);
						$pdf->SetXY($valAlign,$content+$off);
						$pdf->Cell(190,4,$row['sc'],0,0,'L',0);
					}
					else if($rr['subject']=='English')
					{
						$pdf->Cell(190,4,$rr['subject'],0,0,'L',0);
						$pdf->SetXY($valAlign,$content+$off);
						$pdf->Cell(190,4,$row['eng'],0,0,'L',0);
					}
					else if($rr['subject']=='Mathematics')
					{
						$pdf->Cell(190,4,$rr['subject'],0,0,'L',0);
						$pdf->SetXY($valAlign,$content+$off);
						$pdf->Cell(190,4,$row['mat'],0,0,'L',0);
					}
					else if($rr['subject']=='Social Sciences')
					{
						$pdf->Cell(190,4,$rr['subject'],0,0,'L',0);
						$pdf->SetXY($valAlign,$content+$off);
						$pdf->Cell(190,4,$row['ss'],0,0,'L',0);
					}
					$off=$off+$inc;
				}
				$sl++;
			} 
			$off=0;
			$sign =16; $bottom = 6;
			$pdf->SetFont('Times','',11);
			$pdf->SetXY(10,271+$sign);
			$pdf->Cell(190,4,'( Mrs. Asano Sekhose )',0,0,'R',0);
			$sign = $sign+$bottom;
			$pdf->SetXY(175,269+$sign);
			$pdf->Cell(190,4,'Chairman',0,0,'L',0);
			$sign = $sign+$bottom;
			$pdf->SetXY($left,269+$sign);
			$pdf->Cell(190,4,$get['noti_detail'],0,0,'L',0);
			$pdf->SetXY(134,269+$sign);
			$pdf->Cell(147,4,'Dated Kohima, the      ',0,0,'L',0);
			$pdf->SetXY(171,269+$sign-2);
			$pdf->Cell(190,4,$get['sup_script'],0,0,'L',0);
			$pdf->SetXY(175,269+$sign);
			$pdf->Cell(190,4,$get['noti_month_year'],0,0,'L',0);


			$sign = $sign+$bottom;
			$pdf->SetXY($left,270+$sign);
			$pdf->Cell(190,4,'Copy for information and necessary action :-',0,0,'L',0);
			$sign = $sign+$bottom;
			$pdf->SetXY(20,270+$sign);
			$pdf->Cell(190,4,'1.      Mr/Ms._________________________________________________',0,0,'L',0);
			$sign = $sign+$bottom;
			$pdf->SetXY(20,270+$sign);
			$pdf->Cell(190,4,'2.      Mr/Ms._________________________________________________',0,0,'L',0);
			$sign = $sign+$bottom;
			$pdf->SetXY(10,270+$sign);
			$pdf->Cell(190,4,'( Mrs. Asano Sekhose )',0,0,'R',0);
			$sign = $sign+$bottom;
			$pdf->SetXY(175,270+$sign);
			$pdf->Cell(190,4,'Chairman',0,0,'L',0);
		}
	} 
	if($class==10 && $dist!="KOHIMA")
	{
		$content=95;
		$sql=mysql_query("select * from c10_pkChrt_16 where district='$dist'");
		while($row=mysql_fetch_array($sql,MYSQL_ASSOC))
		{
			$pdf->AddPage();
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
		
			//*************************************
			//   6th subject
			//*************************************
			if(!empty($row['fit'])){ $tot7=1;} else {$tot7=0;}
			if(!empty($row['ms'])){ $tot8=1;} else {$tot8=0;}
			if(!empty($row['hs'])){ $tot9=1;} else {$tot9=0;}
			if(!empty($row['bk'])){ $tot10=1;} else {$tot10=0;}
			if(!empty($row['ee'])){ $tot11=1;} else {$tot11=0;}
			if(!empty($row['iv'])){ $tot12=1;} else {$tot12=0;}

			if(!empty($row['tt'])){ $tot13=1;} else {$tot13=0;}
			if(!empty($row['hv'])){ $tot16=1;} else {$tot16=0;}
			if(!empty($row['rv'])){ $tot15=1;} else {$tot15=0;}
			if(!empty($row['ev'])){ $tot17=1;} else {$tot17=0;}
			if(!empty($row['bv'])){ $tot18=1;} else {$tot18=0;}
			if(!empty($row['mv'])){ $tot19=1;} else {$tot19=0;}
			if(!empty($row['av'])){ $tot22=1;} else {$tot22=0;}
			if(!empty($row['at'])){ $tot23=1;} else {$tot23=0;}



			$tot=$tot1+$tot2+$tot3+$tot4+$tot5+$tot6+$tot7+$tot8+$tot9+$tot10+$tot11+$tot12+$tot13+$tot14+$tot16+$tot15+$tot17+$tot18+$tot19+$tot22+$tot23+4;


			
			$not = mysql_query("select * from notification_tbl where class='10'");
			$get = mysql_fetch_array($not);
			$pdf->SetFont('Times','B',8);
			$pdf->SetXY(10,10);
			$pdf->Cell(190,4,'Confidential(HSLC)',0,0,'R',0);
			$pdf->SetFont('Times','B',13);
			$pdf->SetXY(10,15);
			$pdf->Cell(190,4,'Nagaland Board of School Education',0,0,'C',0);
			$pdf->SetXY(10,20);
			$pdf->Cell(190,4,'Kohima',0,0,'C',0);
			$pdf->SetFont('Times','',11);
			$pdf->SetXY($left,30);
			$pdf->Cell(190,4,$get['noti_detail'],0,0,'L',0);
			$pdf->SetXY(134,30);
			$pdf->Cell(150,4,'Dated Kohima, the      ',0,0,'L',0);
			$pdf->SetXY(171,28);
			$pdf->Cell(190,4,$get['sup_script'],0,0,'L',0);
			$pdf->SetXY(175,30);
			$pdf->Cell(190,4,$get['noti_month_year'],0,0,'L',0);
			$pdf->SetFont('Times','',12);
			$pdf->SetXY($left,35);
			$pdf->Cell(190,4,'To,',0,0,'L',0);
			$pdf->SetXY(30,40);
			$pdf->Cell(190,4,'The Sr. Treasury Officer/Treasury Officer/Sub-Treasury Officer/',0,0,'L',0);
			$pdf->SetXY(30,45);
			$pdf->Cell(190,4,'Branch Manager,______________________________________________.',0,0,'L',0);
			$pdf->SetXY($left,50);
			$pdf->Cell(190,4,'Subject:-',0,0,'L',0);
			$pdf->SetFont('Times','B',12);
			$pdf->SetXY(38,50);
			$pdf->Cell(190,4,'Confidential papers of the High School Leaving Certificate Examination',0,0,'L',0);
			$pdf->SetXY(169,50);
			$pdf->Cell(190,4,$year,0,0,'L',0);
			$pdf->SetFont('Times','',12);
			$pdf->SetXY($left,55);
			$pdf->Cell(190,4,'Sir/Madam,',0,0,'L',0);
			$pdf->SetXY(30,60);
			$pdf->Cell(190,4,'Please find herewith      sealed packets of Confidential Papers to be kept under your custody',0,0,'L',0);
			$pdf->SetXY(66,60);
			$pdf->SetFont('Times','B',12);
			$pdf->Cell(190,4,$tot,0,0,'L',0);
			$pdf->SetFont('Times','',12);
			$pdf->SetXY($left,65);
			$pdf->Cell(190,4,'for the                                            to be held from                               as per routine enclosed.',0,0,'L',0);
			$pdf->SetFont('Times','I',12);
			$pdf->SetXY($left+13,65);
			$pdf->Cell(190,4,'HSLC Examination '.$year,0,0,'L',0);
			$pdf->SetFont('Times','B',12);
			$firstExam = mysql_query('select * from c10_timetbl where sl=1');
			$firstExam = mysql_fetch_array($firstExam);
			$pdf->SetXY($left+85,65);
			$pdf->Cell(190,4,$firstExam['e_date'],0,0,'L',0);
			$pdf->SetFont('Times','',12);
			$pdf->SetXY($left,70);
			$pdf->Cell(190,4,'Kindly issue the confidential packets to the concerned Centre Superintendent on the dates shown below at ',0,0,'L',0);
			$pdf->SetXY($left,75);
			$pdf->Cell(190,4,'the appointed time against each subject:',0,0,'L',0);
			$pdf->SetFont('Times','B',12);
			$pdf->SetXY(60,80);
			$pdf->Cell(190,4,'Time: '.$Etime.' (Vocational: '.$Vtime.')',0,0,'L',0);
			$pdf->SetXY($left,85);
			$pdf->Cell(184,8,'Date',1,0,'L',0);
			$pdf->SetXY(60,85);
			$pdf->Cell(190,8,'Day',0,0,'L',0);
			$pdf->SetXY(90,85);
			$pdf->Cell(190,8,'Subject',0,0,'L',0);
			$pdf->SetXY(145,85);
			$pdf->Cell(190,8,'Number of question papers',0,0,'L',0);
			$sl=1;
			$ss=mysql_query("select * from c10_timetbl order by sl asc");
			while($rr=mysql_fetch_array($ss,MYSQL_ASSOC))
			{
				$inc = 6;
				if($rr['subject']=='Mils')
				{
					$pdf->SetXY($left,$content+$off);
					$pdf->Cell(190,4,$rr['e_date'],0,0,'L',0);
					$pdf->SetXY(60,$content+$off);
					$pdf->Cell(190,4,$rr['day'],0,0,'L',0);
					$pdf->SetXY(90,$content+$off);
					$pdf->Cell(190,4,'Second Language:',0,0,'L',0);
					$off=$off+$inc;      
					$pdf->SetXY(95,$content+$off);
					$pdf->Cell(190,4,'i.    Tenyidie',0,0,'L',0);
					$pdf->SetXY($valAlign,$content+$off);
					if(!empty($row['tny']))
					{
						$pdf->Cell(190,4,$row['tny'],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'______',0,0,'L',0);
					}
					$off=$off+$inc;
					$pdf->SetXY(95,$content+$off);
					$pdf->Cell(190,4,'ii.   Ao',0,0,'L',0);
					$pdf->SetXY($valAlign,$content+$off);
					if(!empty($row['aon']))
					{
						$pdf->Cell(190,4,$row['aon'],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'______',0,0,'L',0);
					}
					$off=$off+$inc;
					$pdf->SetXY(95,$content+$off);
					$sumi = iconv('UTF-8','windows-1252','iii.  Sumi(Sütsah)');
					$pdf->Cell(190,4,$sumi,0,0,'L',0);
					//$pdf->Cell(190,4,'iii.  Sumi(Sütsah)',0,0,'L',0);
					$pdf->SetXY($valAlign,$content+$off);
					if(!empty($row['smi']))
					{
						$pdf->Cell(190,4,$row['smi'],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'______',0,0,'L',0);
					}
					$off=$off+$inc;
					$pdf->SetXY(95,$content+$off);
					$pdf->Cell(190,4,'iv.  Lotha',0,0,'L',0);
					$pdf->SetXY($valAlign,$content+$off);
					if(!empty($row['lta']))
					{
						$pdf->Cell(190,4,$row['lta'],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'______',0,0,'L',0);
					}
					$off=$off+$inc;
					$pdf->SetXY(95,$content+$off);
					$pdf->Cell(190,4,'v.   Hindi',0,0,'L',0);
					$pdf->SetXY($valAlign,$content+$off);
					if(!empty($row['hnd']))
					{
						$pdf->Cell(190,4,$row['hnd'],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'______',0,0,'L',0);
					}
					$off=$off+$inc;
					$pdf->SetXY(95,$content+$off);
					$pdf->Cell(190,4,'vi.  Bengali',0,0,'L',0);
					$pdf->SetXY($valAlign,$content+$off);
					if(!empty($row['bng']))
					{
						$pdf->Cell(190,4,$row['bng'],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'______',0,0,'L',0);
					}
					$off=$off+$inc;
					$pdf->SetXY(95,$content+$off);
					$pdf->Cell(190,4,'vii. Alternative English',0,0,'L',0);
					$pdf->SetXY($valAlign,$content+$off);
					if(!empty($row['alt']))
					{
						$pdf->Cell(190,4,$row['alt'],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'______',0,0,'L',0);
					}
					$off=$off+$inc;
				}
				else if($rr['subject']=='6th') 
				{
					$pdf->SetXY($left,$content+$off);
					$pdf->Cell(190,4,$rr['e_date'],0,0,'L',0);
					$pdf->SetXY(60,$content+$off);
					$pdf->Cell(190,4,$rr['day'],0,0,'L',0);
					$pdf->SetXY(90,$content+$off);
					$pdf->Cell(190,4,'Sixth/Vocational Subjects:',0,0,'L',0);
					$off=$off+$inc;
					$pdf->SetXY(95,$content+$off);
					$pdf->Cell(190,4,'i.     FIT',0,0,'L',0);
					$pdf->SetXY($valAlign,$content+$off);
					if(!empty($row['fit']))
					{
						$pdf->Cell(190,4,$row['fit'],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'______',0,0,'L',0);
					}
					$off=$off+$inc;
					$pdf->SetXY(95,$content+$off);
					$pdf->Cell(190,4,'ii.    Music',0,0,'L',0);
					$pdf->SetXY($valAlign,$content+$off);
					if(!empty($row['ms']))
					{
						$pdf->Cell(190,4,$row['ms'],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'______',0,0,'L',0);
					}
					$off=$off+$inc;
					$pdf->SetXY(95,$content+$off);
					$pdf->Cell(190,4,'iii.   Home Science',0,0,'L',0);
					$pdf->SetXY($valAlign,$content+$off);
					if(!empty($row['hs']))
					{
						$pdf->Cell(190,4,$row['hs'],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'______',0,0,'L',0);
					}
					$off=$off+$inc;
					$pdf->SetXY(95,$content+$off);
					$pdf->Cell(190,4,'iv.   BK & Accountancy',0,0,'L',0);
					$pdf->SetXY($valAlign,$content+$off);
					if(!empty($row['bk']))
					{
						$pdf->Cell(190,4,$row['bk'],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'______',0,0,'L',0);
					}
					$off=$off+$inc;
					$pdf->SetXY(95,$content+$off);
					$pdf->Cell(190,4,'v.    Environmental Education',0,0,'L',0);
					$pdf->SetXY($valAlign,$content+$off);
					if(!empty($row['ee']))
					{
						$pdf->Cell(190,4,$row['ee'],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'______',0,0,'L',0);
					}
					$off=$off+$inc;
					$pdf->SetXY(95,$content+$off);
					$pdf->Cell(190,4,'vi.   ITeS',0,0,'L',0);
					
					$pdf->SetXY($valAlign,$content+$off);
					if(!empty($row['iv']))
					{
						$pdf->Cell(190,4,$row['iv'],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'______',0,0,'L',0);
					}
					$off=$off+$inc;
					$pdf->SetXY(95,$content+$off);
					$pdf->Cell(190,4,'vii.  Tourism & Hospitality',0,0,'L',0);
					
					$pdf->SetXY($valAlign,$content+$off);
					if(!empty($row['tt']))
					{
						$pdf->Cell(190,4,$row['tt'],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'______',0,0,'L',0);
					}
					$off=$off+$inc;
					$pdf->SetXY(95,$content+$off);
					$pdf->Cell(190,4,'viii. Retail',0,0,'L',0);
					
					$pdf->SetXY($valAlign,$content+$off);
					if(!empty($row['rv']))
					{
						$pdf->Cell(190,4,$row['rv'],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'______',0,0,'L',0);
					}
					$off=$off+$inc;
					$pdf->SetXY(95,$content+$off);
					$pdf->Cell(190,4,'ix.   Healthcare',0,0,'L',0);
					$pdf->SetXY($valAlign,$content+$off);
					if(empty($row['hv']))
					{
						$pdf->Cell(190,4,'______',0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,$row['hv'],0,0,'L',0);
					}
					$off=$off+$inc;
					$pdf->SetXY(95,$content+$off);
					$pdf->Cell(190,4,'x.    Beauty & Wellness',0,0,'L',0);
					$pdf->SetXY($valAlign,$content+$off);
					if(!empty($row['bv']))
					{
						$pdf->Cell(190,4,$row['bv'],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'______',0,0,'L',0);
					}
					$off=$off+$inc;
					$pdf->SetXY(95,$content+$off);
					$pdf->Cell(190,4,'xi.   Electronics & Hardware',0,0,'L',0);
					$pdf->SetXY($valAlign,$content+$off);
					if(!empty($row['ev']))
					{
						$pdf->Cell(190,4,$row['ev'],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'______',0,0,'L',0);
					}
					$off=$off+$inc;
					$pdf->SetXY(95,$content+$off);
					$pdf->Cell(190,4,'xii.  Multi Skill',0,0,'L',0);
					$pdf->SetXY($valAlign,$content+$off);
					if(!empty($row['mv']))
					{
						$pdf->Cell(190,4,$row['mv'],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'______',0,0,'L',0);
					}
					$off=$off+$inc;
					$pdf->SetXY(95,$content+$off);
					$pdf->Cell(190,4,'xiii.  Agriculture',0,0,'L',0);
					$pdf->SetXY($valAlign,$content+$off);
					if(!empty($row['av']))
					{
						$pdf->Cell(190,4,$row['av'],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'______',0,0,'L',0);
					}
					$off=$off+$inc;


					$pdf->SetXY(95,$content+$off);
					$pdf->Cell(190,4,'xiv.  Automotive',0,0,'L',0);
					$pdf->SetXY($valAlign,$content+$off);
					if(!empty($row['at']))
					{
						$pdf->Cell(190,4,$row['at'],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'______',0,0,'L',0);
					}
					$off=$off+$inc;
				} 
				else //if($rr['subject'])
				{
					$pdf->SetXY($left,$content+$off);
					$pdf->Cell(190,4,$rr['e_date'],0,0,'L',0);
					$pdf->SetXY(60,$content+$off);
					$pdf->Cell(190,4,$rr['day'],0,0,'L',0);
					$pdf->SetXY(90,$content+$off);
					if($rr['subject']=='Science')
					{
						$pdf->Cell(190,4,$rr['subject'],0,0,'L',0);
						$pdf->SetXY($valAlign,$content+$off);
						$pdf->Cell(190,4,$row['sc'],0,0,'L',0);
					}
					else if($rr['subject']=='English')
					{
						$pdf->Cell(190,4,$rr['subject'],0,0,'L',0);
						$pdf->SetXY($valAlign,$content+$off);
						$pdf->Cell(190,4,$row['eng'],0,0,'L',0);
					}
					else if($rr['subject']=='Mathematics')
					{
						$pdf->Cell(190,4,$rr['subject'],0,0,'L',0);
						$pdf->SetXY($valAlign,$content+$off);
						$pdf->Cell(190,4,$row['mat'],0,0,'L',0);
					}
					else if($rr['subject']=='Social Sciences')
					{
						$pdf->Cell(190,4,$rr['subject'],0,0,'L',0);
						$pdf->SetXY($valAlign,$content+$off);
						$pdf->Cell(190,4,$row['ss'],0,0,'L',0);
					}
					$off=$off+$inc;
				}
				$sl++;
			} 
			$off=0; 
			$sign =0; 
			$bottom = 6; 
			$pdf->SetFont('Times','',11);
			$pdf->SetXY(10,270+$sign);
			$pdf->Cell(190,4,'( Mrs. Asano Sekhose )',0,0,'R',0);
			$sign = $sign + $bottom;
			$pdf->SetXY(172,270+$sign);
			$pdf->Cell(190,4,'Chairman',0,0,'L',0);
			$sign = $sign + $bottom;
			$bottom = 5;
			$pdf->SetXY($left,270+$sign);
			$pdf->Cell(190,4,$get['noti_detail'],0,0,'L',0);
			$pdf->SetXY(134,270+$sign);
			$pdf->Cell(147,4,'Dated Kohima, the      ',0,0,'L',0);
			$pdf->SetXY(171,270+$sign-2);
			$pdf->Cell(190,4,$get['sup_script'],0,0,'L',0);
			$pdf->SetXY(175,270+$sign);
			$pdf->Cell(190,4,$get['noti_month_year'],0,0,'L',0);
			$sign = $sign + $bottom;
			$pdf->SetXY($left,270+$sign);
			$pdf->Cell(190,4,'Copy to :-',0,0,'L',0);
			$sign = $sign + $bottom;
			$pdf->SetXY(20,270+$sign);
			$pdf->Cell(190,4,'1.      The Deputy Commissioner/Additional Deputy Commissioner/S.D.O(Civil),',0,0,'L',0);
			$sign = $sign + $bottom;
			$pdf->SetXY(20,270+$sign);
			$pdf->Cell(190,4,'        __________________________________________ for information and necessary action.',0,0,'L',0);
			$sign = $sign + $bottom;
			$pdf->SetXY(20,270+$sign);
			$pdf->Cell(190,4,'2.      Mr/Ms_____________________________________, Centre Superintendent of',0,0,'L',0);
			$sign = $sign + $bottom;
			$pdf->SetXY(20,270+$sign);
			$pdf->SetFont('Times','B',12);
			$pdf->Cell(190,4,'        '.$row['school'].'.',0,0,'L',0);
			$sign = $sign + $bottom;
			$pdf->SetXY(20,270+$sign);
			$pdf->SetFont('Times','',12);
			//$pdf->Cell(190,4,'        Refer point 5 (ii) & (iii) in page 5 of Rules for Conduct of Examinations.',0,0,'L',0);
			$sign = $sign + $bottom;
			$pdf->SetFont('Times','',12);
			$pdf->SetXY(20,270+$sign);
			$pdf->Cell(190,4,'3.     Office Copy',0,0,'L',0);
			$sign = $sign + $bottom;
			$pdf->SetFont('Times','',12);
			$pdf->SetXY(10,270+$sign);
			$pdf->Cell(190,4,'( Mrs. Asano Sekhose )',0,0,'R',0);
			$sign = $sign + $bottom;
			$pdf->SetXY(172,270+$sign);
			$pdf->Cell(190,4,'Chairman',0,0,'L',0);
		}
	}
}
if($class=='11a')
{
	$contents11 = 113;
	$sql=mysql_query("select * from c11a_pkChrt where district='$dist'");
	while($row=mysql_fetch_array($sql,MYSQL_ASSOC))
	{
		$pdf->AddPage();
		//*************************************//
		//   SECOND LANGAUGE
		//*************************************//

		if(!empty($row['aon'])){ $tot1=1;} else {$tot1=0;}
		if(!empty($row['smi'])){ $tot2=1;} else {$tot2=0;}
		if(!empty($row['lta'])){ $tot3=1;} else {$tot3=0;}
		if(!empty($row['hnd'])){ $tot4=1;} else {$tot4=0;}
		if(!empty($row['bng'])){ $tot5=1;} else {$tot5=0;}
		if(!empty($row['alt'])){ $tot6=1;} else {$tot6=0;}
		if(!empty($row['tny'])){ $tot7=1;} else {$tot7=0;}
	
		//*************************************//
		//   6th subject
		//*************************************//
		if(!empty($row['eng'])){ $tot8=1;} else {$tot8=0;}
		if(!empty($row['edn'])){ $tot9=1;} else {$tot9=0;}
		if(!empty($row['psy'])){ $tot10=1;} else {$tot10=0;}
		if(!empty($row['geo'])){ $tot11=1;} else {$tot11=0;}
		if(!empty($row['msc'])){ $tot12=1;} else {$tot12=0;}
		if(!empty($row['his'])){ $tot13=1;} else {$tot13=0;}
		if(!empty($row['psc'])){ $tot14=1;} else {$tot14=0;}
		if(!empty($row['evs'])){ $tot15=1;} else {$tot15=0;}
		if(!empty($row['sgy'])){ $tot16=1;} else {$tot16=0;}
		if(!empty($row['eco'])){ $tot17=1;} else {$tot17=0;}
		if(!empty($row['phi'])){ $tot18=1;} else {$tot18=0;}
		if(!empty($row['csc'])){ $tot19=1;} else {$tot19=0;}
		if(!empty($row['inf'])){ $tot20=1;} else {$tot20=0;}
		if(!empty($row['itv'])){ $tot21=1;} else {$tot21=0;}
		if(!empty($row['ttv'])){ $tot22=1;} else {$tot22=0;}
		if(!empty($row['ffm'])){ $tot23=1;} else {$tot23=0;}
		if(!empty($row['rtv'])){ $tot24=1;} else {$tot24=0;}
		if(!empty($row['hcv'])){ $tot25=1;} else {$tot25=0;}
		if(!empty($row['ehv'])){ $tot26=1;} else {$tot26=0;}
		if(!empty($row['btv'])){ $tot27=1;} else {$tot27=0;}
		if(!empty($row['msv'])){ $tot28=1;} else {$tot28=0;}
		$tot=$tot1+$tot2+$tot3+$tot4+$tot5+$tot6+$tot7+$tot8+$tot9+$tot10+$tot11+$tot12+$tot13+$tot14+$tot16+$tot15+$tot17+$tot18+$tot19+$tot20+$tot21+$tot22+$tot23+$tot24+$tot25+$tot26+$tot27+$tot28;
		$not = mysql_query("select * from notification_tbl where class='11'");
		$get = mysql_fetch_array($not);
		$pdf->SetFont('Times','B',11);
		$pdf->SetXY(10,10);
		$pdf->Cell(190,4,'Class-XI ( Arts Stream )',0,0,'R',0);
		$pdf->SetFont('Times','B',13);
		$pdf->SetXY(10,20);
		$pdf->Cell(190,4,'Nagaland Board of School Education',0,0,'C',0);
		$pdf->SetXY(10,25);
		$pdf->Cell(190,4,'Kohima',0,0,'C',0);
		$pdf->SetFont('Times','',12);
		$pdf->SetXY($left,30);
		$pdf->Cell(190,4,$get['noti_detail'],0,0,'L',0);
		$pdf->SetXY(132,30);
		$pdf->Cell(190,4,'Dated Kohima, the     ',0,0,'L',0);
		$pdf->SetFont('Times','',10);
		$pdf->SetXY(171,28);
		$pdf->Cell(190,4,$get['sup_script'],0,0,'L',0);
		$pdf->SetFont('Times','',12);
		$pdf->SetXY(175,30);
		$pdf->Cell(190,4,$get['noti_month_year'],0,0,'L',0);
		$pdf->SetXY($left,40);
		$pdf->Cell(190,4,'To,',0,0,'L',0);
		$pdf->SetXY(36,45);
		$pdf->Cell(190,4,'The Principal,',0,0,'L',0);
		$pdf->SetXY(36,50);
		$pdf->Cell(190,4,$row['centre'],0,0,'L',0);
		$pdf->SetXY($left,60);
		$pdf->Cell(190,4,'Subject:-',0,0,'L',0);
		$pdf->SetFont('Times','B',11);
		$pdf->SetXY(36,60);
		$pdf->Cell(190,4,'Confidential papers for Class-XI Promotion Examination '.$year,0,0,'L',0);
		$pdf->SetFont('Times','',12);
		$pdf->SetXY($left,70);
		$pdf->Cell(190,4,'Sir/Madam,',0,0,'L',0);
		$pdf->SetXY(36,75);
		$pdf->Cell(190,4,'Please find herewith a packet which contains       sealed packets of confidential papers for',0,0,'L',0);
		$pdf->SetFont('Times','B',12);
		$pdf->SetXY(114,75);
		$pdf->Cell(190,4,$tot,0,0,'L',0);
		$pdf->SetFont('Times','',12);
		$pdf->SetXY($left,80);
		$pdf->Cell(190,4,'                                                                to be held in your institution from the                             ',0,0,'L',0);
		$pdf->SetFont('Times','I',12);
		$pdf->SetXY($left,80);
		$pdf->Cell(190,4,'Class XI Promotion Examination '.$year,0,0,'L',0);
		$firstExam = mysql_query('select * from c11a_timetbl where sl=1');
		$firstExam = mysql_fetch_array($firstExam);
		$pdf->SetFont('Times','B',12);
		$pdf->SetXY($left+133,80);
		$pdf->Cell(190,4,$firstExam['e_date'],0,0,'L',0);
		$pdf->SetFont('Times','',12);
		$pdf->SetXY($left,85);
		$pdf->Cell(190,4,'as per the routine given below:',0,0,'L',0);
		$pdf->SetFont('Times','B',12);
		$pdf->SetXY(40,95);
		$pdf->Cell(190,4,'Time: '.$Etime.' (Vocational Subjects: '.$Vtime.')',0,0,'L',0);
		$pdf->SetXY($left,100);
		$pdf->Cell(186,8,'Date',1,0,'L',0);
		$pdf->SetXY(60,100);
		$pdf->Cell(190,8,'Day',0,0,'L',0);
		$pdf->SetXY(90,100);
		$pdf->Cell(190,8,'Subject',0,0,'L',0);
		$pdf->SetXY(145,100);
		$pdf->Cell(190,8,'Number of question papers',0,0,'L',0);
		$sl=1;
		$ss=mysql_query("select * from c11a_timetbl where subcode!='' order by sl asc");
		while($rr=mysql_fetch_array($ss,MYSQL_ASSOC))
		{
			if($rr['subject']=='Mils')
			{
				$pdf->SetXY($left,$contents11+$off11);
				$pdf->Cell(190,4,$rr['e_date'],0,0,'L',0);
				$pdf->SetXY(60,$contents11+$off11);
				$pdf->Cell(190,4,$rr['day'],0,0,'L',0);
				$pdf->SetXY(95,$contents11+$off11);
				$pdf->Cell(190,4,'i.   Alternative English',0,0,'L',0);
				$pdf->SetXY($valAlign,$contents11+$off11);
				if(!empty($row['alt']))
				{
					$pdf->Cell(190,4,$row['alt'],0,0,'L',0);
				}
				else
				{
					$pdf->Cell(190,4,'____',0,0,'L',0);
				}
				$off11=$off11+$inc11;
				$pdf->SetXY(95,$contents11+$off11);
				$pdf->Cell(190,4,'ii.  Ao',0,0,'L',0);
				$pdf->SetXY($valAlign,$contents11+$off11);
				if(!empty($row['aon']))
				{
					$pdf->Cell(190,4,$row['aon'],0,0,'L',0);
				}
				else
				{
					$pdf->Cell(190,4,'____',0,0,'L',0);
				}
				$off11=$off11+$inc11;
				$pdf->SetXY(95,$contents11+$off11);
				//$sumi = iconv('UTF-8','windows-1252','iii.  Sumi(Sütsah)');
				//$pdf->Cell(190,4,$bng,0,0,'L',0);
				$pdf->Cell(190,4,'iii. Bengali',0,0,'L',0);
				//$pdf->Cell(190,4,'iii. Sumi',0,0,'L',0);
				$pdf->SetXY($valAlign,$contents11+$off11);
				if(!empty($row['bng']))
				{
					$pdf->Cell(190,4,$row['bng'],0,0,'L',0);
				}
				else
				{
					$pdf->Cell(190,4,'____',0,0,'L',0);
				}
				$off11=$off11+$inc11;
				$pdf->SetXY(95,$contents11+$off11);
				$pdf->Cell(190,4,'iv. Hindi',0,0,'L',0);
				$pdf->SetXY($valAlign,$contents11+$off11);
				if(!empty($row['hnd']))
				{
					$pdf->Cell(190,4,$row['hnd'],0,0,'L',0);
				}
				else
				{
					$pdf->Cell(190,4,'____',0,0,'L',0);
				}
				$off11=$off11+$inc11;
				$pdf->SetXY(95,$contents11+$off11);
				$pdf->Cell(190,4,'v.  Lotha',0,0,'L',0);
				$pdf->SetXY($valAlign,$contents11+$off11);
				if(!empty($row['lta']))
				{
					$pdf->Cell(190,4,$row['lta'],0,0,'L',0);
				}
				else
				{
					$pdf->Cell(190,4,'____',0,0,'L',0);
				}
				$off11=$off11+$inc11;
				$pdf->SetXY(95,$contents11+$off11);
				$sumi = iconv('UTF-8','windows-1252','vi. Sumi(Sütsah)');
				$pdf->Cell(190,4,$sumi,0,0,'L',0);
				$pdf->SetXY($valAlign,$contents11+$off11);
				if(!empty($row['smi']))
				{
					$pdf->Cell(190,4,$row['smi'],0,0,'L',0);
				}
				else
				{
					$pdf->Cell(190,4,'____',0,0,'L',0);
				}
				$off11=$off11+$inc11;
				$pdf->SetXY(95,$contents11+$off11);
				$pdf->Cell(190,4,'vii.Tenyidie',0,0,'L',0);
				$pdf->SetXY($valAlign,$contents11+$off11);
				if(!empty($row['tny']))
				{
					$pdf->Cell(190,4,$row['tny'],0,0,'L',0);
				}
				else
				{
					$pdf->Cell(190,4,'____',0,0,'L',0);
				}
				$off11=$off11+$inc11;
			}
			else if($rr['subject']!='' && $rr['e_date']!='')
			{
				$pdf->SetXY($left,$contents11+$off11);
				$val = $rr['e_date'];
				$pdf->Cell(190,4,$rr['e_date'],0,0,'L',0);
				$pdf->SetXY(60,$contents11+$off11);
				$pdf->Cell(190,4,$rr['day'],0,0,'L',0);
				$pdf->SetXY(90,$contents11+$off11);
				$pdf->Cell(190,4,$rr['subject'],0,0,'L',0);
				$pdf->SetXY($valAlign,$contents11+$off11);
				/*
				if($rr['subcode']=='eng'){$main='eng';}
				if($rr['subcode']=='edn'){$main='edn';}
				if($rr['subcode']=='psy'){$main='psy';}
				if($rr['subcode']=='geo'){$main='geo';}
				if($rr['subcode']=='msc'){$main='msc';}
				if($rr['subcode']=='his'){$main='his';}
				if($rr['subcode']=='sgy'){$main='sgy';}
				if($rr['subcode']=='psc'){$main='psc';}
				if($rr['subcode']=='eco'){$main='eco';}
				if($rr['subcode']=='evs'){$main='evs';}
				if($rr['subcode']=='phi'){$main='phi';}
				if($rr['subcode']=='csc'){$main='csc';}
				if($rr['subcode']=='inf'){$main='inf';}
				if($rr['subcode']=='itv'){$main='itv';}
				if($rr['subcode']=='ttv'){$main='ttv';}
				if($rr['subcode']=='ffm'){$main='ffm';}
				if($rr['subcode']=='rtv'){$main='rtv';}
				if($rr['subcode']=='hcv'){$main='hcv';}
				if($rr['subcode']=='ehv'){$main='ehv';}
				if($rr['subcode']=='btv'){$main='btv';}
				if($rr['subcode']=='msv'){$main='msv';}
				*/
				if(!empty($row[$rr['subcode']]))
				{
					$pdf->Cell(190,4,$row[$rr['subcode']],0,0,'L',0);
				}
				else
				{
					$pdf->Cell(190,4,'____',0,0,'L',0);
				}
				$off11=$off11+$inc11;
			}
			else
			{
				$pdf->SetXY(90,$contents11+$off11);
				$pdf->Cell(190,4,$rr['subject'],0,0,'L',0);
				$pdf->SetXY($valAlign,$contents11+$off11);
				/*
				if($rr['subcode']=='eng'){$main='eng';}
				if($rr['subcode']=='edn'){$main='edn';}
				if($rr['subcode']=='psy'){$main='psy';}
				if($rr['subcode']=='geo'){$main='geo';}
				if($rr['subcode']=='msc'){$main='msc';}
				if($rr['subcode']=='his'){$main='his';}
				if($rr['subcode']=='sgy'){$main='sgy';}
				if($rr['subcode']=='evs'){$main='evs';}
				if($rr['subcode']=='psc'){$main='psc';}
				if($rr['subcode']=='eco'){$main='eco';}
				if($rr['subcode']=='phi'){$main='phi';}
				if($rr['subcode']=='csc'){$main='csc';}
				if($rr['subcode']=='inf'){$main='inf';}
				if($rr['subcode']=='itv'){$main='itv';}
				if($rr['subcode']=='ttv'){$main='ttv';}
				if($rr['subcode']=='ffm'){$main='ffm';}
				if($rr['subcode']=='rtv'){$main='rtv';}
				if($rr['subcode']=='hcv'){$main='hcv';}
				if($rr['subcode']=='ehv'){$main='ehv';}
				if($rr['subcode']=='btv'){$main='btv';}
				if($rr['subcode']=='msv'){$main='msv';}
				*/
				if(!empty($row[$rr['subcode']]))
				{
					$pdf->Cell(190,4,$row[$rr['subcode']],0,0,'L',0);
				}
				else
				{
					$pdf->Cell(190,4,'____',0,0,'L',0);
				}
				$off11=$off11+$inc11;
			}
		}
		$sl++;$off11=0;
		$pdf->SetFont('Times','',12);
		$pdf->SetXY($left,310);
		$pdf->Cell(190,4,'Signature with date..........................................',0,0,'L',0);
		$pdf->SetXY($left,320);
		$pdf->Cell(190,4,'Name : ............................................................',0,0,'L',0);
		$pdf->SetXY($left,330);
		$pdf->Cell(190,4,'Designation : ..................................................',0,0,'L',0);
		$pdf->SetXY($left+140,325);
		$pdf->Cell(190,4,iconv('UTF-8','windows-1252','( Keneilenyü Nagi )'),0,0,'L',0);
		$pdf->SetXY($left+135,330);
		$pdf->Cell(190,4,'Controller of Examinations',0,0,'L',0);
	}
}

// forwarding for class eleven-commerce

if($class=='11c')
{
	$contents = 115;
	$sql=mysql_query("select * from c11c_pkChrt where district='$dist'");
	while($row=mysql_fetch_array($sql,MYSQL_ASSOC))
	{
		$pdf->AddPage();
		//*************************************//
		//   SECOND LANGAUGE
		//*************************************//
		if(!empty($row['aon'])){ $tot1=1;} else {$tot1=0;}
		if(!empty($row['smi'])){ $tot2=1;} else {$tot2=0;}
		if(!empty($row['lta'])){ $tot3=1;} else {$tot3=0;}
		if(!empty($row['hnd'])){ $tot4=1;} else {$tot4=0;}
		if(!empty($row['bng'])){ $tot5=1;} else {$tot5=0;}
		if(!empty($row['alt'])){ $tot6=1;} else {$tot6=0;}
		if(!empty($row['tny'])){ $tot7=1;} else {$tot7=0;}
	
		//*************************************//
		//   6th subject
		//*************************************//
		if(!empty($row['eng'])){ $tot8=1;} else {$tot8=0;}
		if(!empty($row['ffm'])){ $tot9=1;} else {$tot9=0;}
		if(!empty($row['ent'])){ $tot10=1;} else {$tot10=0;}
		if(!empty($row['bus'])){ $tot11=1;} else {$tot11=0;}
		if(!empty($row['fbm'])){ $tot12=1;} else {$tot12=0;}
		if(!empty($row['evs'])){ $tot13=1;} else {$tot13=0;}
		if(!empty($row['acc'])){ $tot14=1;} else {$tot14=0;}
		if(!empty($row['eco'])){ $tot15=1;} else {$tot15=0;}
		if(!empty($row['muf'])){ $tot16=1;} else {$tot16=0;}
		if(!empty($row['csc'])){ $tot17=1;} else {$tot17=0;}
		if(!empty($row['inf'])){ $tot18=1;} else {$tot18=0;}
		if(!empty($row['itv'])){ $tot19=1;} else {$tot19=0;}
		if(!empty($row['ttv'])){ $tot20=1;} else {$tot20=0;}
		if(!empty($row['rtv'])){ $tot21=1;} else {$tot21=0;}
		if(!empty($row['hcv'])){ $tot22=1;} else {$tot22=0;}
		$tot=$tot1+$tot2+$tot3+$tot4+$tot5+$tot6+$tot7+$tot8+$tot9+$tot10+$tot11+$tot12+$tot13+$tot14+$tot16+$tot15+$tot17+$tot18+$tot19+$tot20+$tot21+$tot22;
		$not = mysql_query("select * from notification_tbl where class='11'");
		$get = mysql_fetch_array($not);
		$pdf->SetFont('Times','B',11);
		$pdf->SetXY(10,10);
		$pdf->Cell(190,4,'Class-XI ( Commerce Stream )',0,0,'R',0);
		$pdf->SetFont('Times','B',13);
		$pdf->SetXY(10,20);
		$pdf->Cell(190,4,'Nagaland Board of School Education',0,0,'C',0);
		$pdf->SetXY(10,25);
		$pdf->Cell(190,4,'Kohima',0,0,'C',0);
		$pdf->SetFont('Times','',12);
		$pdf->SetXY($left,30);
		$pdf->Cell(190,4,$get['noti_detail'],0,0,'L',0);
		$pdf->SetXY(132,30);
		$pdf->Cell(190,4,'Dated Kohima, the     ',0,0,'L',0);
		$pdf->SetFont('Times','',10);
		$pdf->SetXY(171,28);
		$pdf->Cell(190,4,$get['sup_script'],0,0,'L',0);
		$pdf->SetFont('Times','',12);
		$pdf->SetXY(175,30);
		$pdf->Cell(190,4,$get['noti_month_year'],0,0,'L',0);
		$pdf->SetXY($left,40);
		$pdf->Cell(190,4,'To,',0,0,'L',0);
		$pdf->SetXY(36,45);
		$pdf->Cell(190,4,'The Principal,',0,0,'L',0);
		$pdf->SetXY(36,50);
		$pdf->Cell(190,4,$row['centre'],0,0,'L',0);
		$pdf->SetXY($left,60);
		$pdf->Cell(190,4,'Subject:-',0,0,'L',0);
		$pdf->SetFont('Times','B',11);
		$pdf->SetXY(36,60);
		$pdf->Cell(190,4,'Confidential papers for Class-XI Promotion Examination '.$year,0,0,'L',0);
		$pdf->SetFont('Times','',12);
		$pdf->SetXY($left,70);
		$pdf->Cell(190,4,'Sir/Madam,',0,0,'L',0);
		$pdf->SetXY(30,75);
		$pdf->SetXY(36,75);
		$pdf->Cell(190,4,'Please find herewith a packet which contains       sealed packets of confidential papers for',0,0,'L',0);
		$pdf->SetFont('Times','B',12);
		$pdf->SetXY(114,75);
		$pdf->Cell(190,4,$tot,0,0,'L',0);
		$pdf->SetFont('Times','',12);
		$pdf->SetXY($left,80);
		$pdf->Cell(190,4,'                                                                to be held in your institution from the                             ',0,0,'L',0);
		$pdf->SetFont('Times','I',12);
		$pdf->SetXY($left,80);
		$pdf->Cell(190,4,'Class XI Promotion Examination '.$year,0,0,'L',0);
		$firstExam = mysql_query('select * from c11c_timetbl where sl=1');
		$firstExam = mysql_fetch_array($firstExam);
		$pdf->SetFont('Times','B',12);
		$pdf->SetXY($left+133,80);
		$pdf->Cell(190,4,$firstExam['e_date'],0,0,'L',0);
		$pdf->SetFont('Times','',12);
		$pdf->SetXY($left,85);
		$pdf->Cell(190,4,'as per the routine given below:',0,0,'L',0);
		$pdf->SetFont('Times','B',12);
		$pdf->SetXY(40,95);
		$pdf->Cell(190,4,'Time: '.$Etime.'(Vocational Subjects: '.$Vtime.')',0,0,'L',0);
		$pdf->SetXY($left,100);
		$pdf->Cell(186,8,'Date',1,0,'L',0);
		$pdf->SetXY(60,100);
		$pdf->Cell(190,8,'Day',0,0,'L',0);
		$pdf->SetXY(90,100);
		$pdf->Cell(190,8,'Subject',0,0,'L',0);
		$pdf->SetXY(145,100);
		$pdf->Cell(190,8,'Number of question papers',0,0,'L',0);
		$sl=1;
		$ss=mysql_query("select * from c11c_timetbl where subcode!='' order by sl asc");
		while($rr=mysql_fetch_array($ss,MYSQL_ASSOC))
		{
			if($rr['subject']=='Mils')
			{
				$pdf->SetXY($left,$contents+$off);
				$pdf->Cell(190,4,$rr['e_date'],0,0,'L',0);
				$pdf->SetXY(60,$contents+$off);
				$pdf->Cell(190,4,$rr['day'],0,0,'L',0);
				$pdf->SetXY(95,$contents+$off);
				$pdf->Cell(190,4,'i.   Alternative English',0,0,'L',0);
				$pdf->SetXY($valAlign,$contents+$off);
				if(!empty($row['alt']))
				{
					$pdf->Cell(190,4,$row['alt'],0,0,'L',0);
				}
				else
				{
					$pdf->Cell(190,4,'____',0,0,'L',0);
				}
				$off=$off+$inc;
				$pdf->SetXY(95,$contents+$off);
				$pdf->Cell(190,4,'ii.  Ao',0,0,'L',0);
				$pdf->SetXY($valAlign,$contents+$off);
				if(!empty($row['aon']))
				{
					$pdf->Cell(190,4,$row['aon'],0,0,'L',0);
				}
				else
				{
					$pdf->Cell(190,4,'____',0,0,'L',0);
				}
				$off=$off+$inc;
				$pdf->SetXY(95,$contents+$off);
				$pdf->Cell(190,4,'iii. Bengali',0,0,'L',0);
				$pdf->SetXY($valAlign,$contents+$off);
				if(!empty($row['bng']))
				{
					$pdf->Cell(190,4,$row['bng'],0,0,'L',0);
				}
				else
				{
					$pdf->Cell(190,4,'____',0,0,'L',0);
				}
				$off=$off+$inc;
				$pdf->SetXY(95,$contents+$off);
				$pdf->Cell(190,4,'iv. Hindi',0,0,'L',0);
				$pdf->SetXY($valAlign,$contents+$off);
				if(!empty($row['hnd']))
				{
					$pdf->Cell(190,4,$row['hnd'],0,0,'L',0);
				}
				else
				{
					$pdf->Cell(190,4,'____',0,0,'L',0);
				}
				$off=$off+$inc;
				$pdf->SetXY(95,$contents+$off);
				$pdf->Cell(190,4,'v.  Lotha',0,0,'L',0);
				$pdf->SetXY($valAlign,$contents+$off);
				if(!empty($row['lta']))
				{
					$pdf->Cell(190,4,$row['lta'],0,0,'L',0);
				}
				else
				{
					$pdf->Cell(190,4,'____',0,0,'L',0);
				}
				$off=$off+$inc;
				$pdf->SetXY(95,$contents+$off);
				$sumi = iconv('UTF-8','windows-1252','vi. Sumi(Sütsah)');
				$pdf->Cell(190,4,$sumi,0,0,'L',0);
				$pdf->SetXY($valAlign,$contents+$off);
				if(!empty($row['smi']))
				{
					$pdf->Cell(190,4,$row['smi'],0,0,'L',0);
				}
				else
				{
					$pdf->Cell(190,4,'____',0,0,'L',0);
				}
				$off=$off+$inc;
				$pdf->SetXY(95,$contents+$off);
				$pdf->Cell(190,4,'vii.Tenyidie',0,0,'L',0);
				$pdf->SetXY($valAlign,$contents+$off);
				if(!empty($row['tny']))
				{
					$pdf->Cell(190,4,$row['tny'],0,0,'L',0);
				}
				else
				{
					$pdf->Cell(190,4,'____',0,0,'L',0);
				}
				$off=$off+$inc;
			}

			else if($rr['subject']!='' && $rr['e_date']!='')
			{
				$pdf->SetXY($left, $contents+$off);
			 	$val = $rr['e_date'];
				$pdf->Cell(190,4,$rr['e_date'],0,0,'L',0);
			 	$pdf->SetXY(60, $contents+$off);
				$pdf->Cell(190,4,$rr['day'],0,0,'L',0);
				$pdf->SetXY(90, $contents+$off);
				$pdf->Cell(190,4,$rr['subject'],0,0,'L',0);
				$pdf->SetXY($valAlign, $contents+$off);
				/*if($rr['subcode']=='eng'){$main='eng';}
				if($rr['subcode']=='ffm'){$main='ffm';}
				if($rr['subcode']=='ent'){$main='ent';}
				if($rr['subcode']=='bus'){$main='bus';}
				if($rr['subcode']=='fbm'){$main='fbm';}
				if($rr['subcode']=='evs'){$main='evs';}
				if($rr['subcode']=='acc'){$main='acc';}
				if($rr['subcode']=='eco'){$main='eco';}
				if($rr['subcode']=='muf'){$main='muf';}
				if($rr['subcode']=='csc'){$main='csc';}
				if($rr['subcode']=='inf'){$main='inf';}
				if($rr['subcode']=='itv'){$main='itv';}
				if($rr['subcode']=='ttv'){$main='ttv';}
				if($rr['subcode']=='rtv'){$main='rtv';}
				if($rr['subcode']=='hcv'){$main='hcv';}	
				*/
				if(!empty($row[$rr['subcode']]))
				{
					$pdf->Cell(190,4,$row[$rr['subcode']],0,0,'L',0);
				}	
				else
				{
					$pdf->Cell(190,4,'____',0,0,'L',0);
				}
				$off=$off+$inc;
			}
			else
			{
				$pdf->SetXY(90, $contents+$off);
				$pdf->Cell(190,4,$rr['subject'],0,0,'L',0);
				$pdf->SetXY($valAlign, $contents+$off);
				/*
				if($rr['subcode']=='eng'){$main='eng';}
				if($rr['subcode']=='ffm'){$main='ffm';}
				if($rr['subcode']=='ent'){$main='ent';}
				if($rr['subcode']=='bus'){$main='bus';}
				if($rr['subcode']=='fbm'){$main='fbm';}
				if($rr['subcode']=='evs'){$main='evs';}
				if($rr['subcode']=='acc'){$main='acc';}
				if($rr['subcode']=='eco'){$main='eco';}
				if($rr['subcode']=='muf'){$main='muf';}
				if($rr['subcode']=='csc'){$main='csc';}
				if($rr['subcode']=='inf'){$main='inf';}
				if($rr['subcode']=='itv'){$main='itv';}
				if($rr['subcode']=='ttv'){$main='ttv';}
				if($rr['subcode']=='rtv'){$main='rtv';}
				if($rr['subcode']=='hcv'){$main='hcv';}
				*/
				if(!empty($row[$rr['subcode']]))
				{
					$pdf->Cell(190,4,$row[$rr['subcode']],0,0,'L',0);
				}
				else
				{
					$pdf->Cell(190,4,'____',0,0,'L',0);
				}
				$off=$off+$inc;
			}
		}
		$sl++; $off=0;
		$pdf->SetFont('Times','',12);
		$pdf->SetXY($left,310);
		$pdf->Cell(190,4,'Signature with date..........................................',0,0,'L',0);
		$pdf->SetXY($left,320);
		$pdf->Cell(190,4,'Name : .......................................................',0,0,'L',0);
		$pdf->SetXY($left,330);
		$pdf->Cell(190,4,'Designation : ................................................',0,0,'L',0);
		$pdf->SetXY($left+140,325);
		$pdf->Cell(190,4,iconv('UTF-8','windows-1252','( Keneilenyü Nagi )'),0,0,'L',0);
		$pdf->SetXY($left+135,330);
		$pdf->Cell(190,4,'Controller of Examinations',0,0,'L',0);
	}
}

// forwarding for class eleven-science

if($class=='11s')
{
	$contents = 130;
	$sql=mysql_query("select * from c11s_pkChrt where district='$dist'");
	while($row=mysql_fetch_array($sql,MYSQL_ASSOC))
	{
		$pdf->AddPage();
		//*************************************//
		//   SECOND LANGAUGE
		//*************************************//

		if(!empty($row['aon'])){ $tot1=1;} else {$tot1=0;}
		if(!empty($row['smi'])){ $tot2=1;} else {$tot2=0;}
		if(!empty($row['lta'])){ $tot3=1;} else {$tot3=0;}
		if(!empty($row['hnd'])){ $tot4=1;} else {$tot4=0;}
		if(!empty($row['bng'])){ $tot5=1;} else {$tot5=0;}
		if(!empty($row['alt'])){ $tot6=1;} else {$tot6=0;}
		if(!empty($row['tny'])){ $tot7=1;} else {$tot7=0;}
	
		//*************************************//
		//   6th subject
		//*************************************//
		if(!empty($row['eng'])){ $tot8=1;} else {$tot8=0;}
		if(!empty($row['phy'])){ $tot9=1;} else {$tot9=0;}
		if(!empty($row['bio'])){ $tot10=1;} else {$tot10=0;}
		if(!empty($row['evs'])){ $tot11=1;} else {$tot11=0;}
		if(!empty($row['che'])){ $tot12=1;} else {$tot12=0;}
		if(!empty($row['mat'])){ $tot13=1;} else {$tot13=0;}
		if(!empty($row['csc'])){ $tot14=1;} else {$tot14=0;}
		if(!empty($row['inf'])){ $tot15=1;} else {$tot15=0;}
		if(!empty($row['itv'])){ $tot16=1;} else {$tot16=0;}
		if(!empty($row['ttv'])){ $tot17=1;} else {$tot17=0;}
		if(!empty($row['rtv'])){ $tot18=1;} else {$tot18=0;}
		if(!empty($row['hcv'])){ $tot19=1;} else {$tot19=0;}
		
		$tot=$tot1+$tot2+$tot3+$tot4+$tot5+$tot6+$tot7+$tot8+$tot9+$tot10+$tot11+$tot12+$tot13+$tot14+$tot16+$tot15+$tot17+$tot18+$tot19;
		$not = mysql_query("select * from notification_tbl where class='11'");
		$get = mysql_fetch_array($not);
		$pdf->SetFont('Times','B',11);
		$pdf->SetXY(10,10);
		$pdf->Cell(190,4,'Class-XI ( Science Stream )',0,0,'R',0);
		$pdf->SetFont('Times','B',13);
		$pdf->SetXY(10,20);
		$pdf->Cell(190,4,'Nagaland Board of School Education',0,0,'C',0);
		$pdf->SetXY(10,25);
		$pdf->Cell(190,4,'Kohima',0,0,'C',0);
		$pdf->SetFont('Times','',11);
		$pdf->SetXY($left,30);
		$pdf->Cell(190,4,$get['noti_detail'],0,0,'L',0);
		$pdf->SetXY(132,30);
		$pdf->Cell(190,4,'Dated Kohima, the     ',0,0,'L',0);
		$pdf->SetFont('Times','',10);
		$pdf->SetXY(171,28);
		$pdf->Cell(190,4,$get['sup_script'],0,0,'L',0);
		$pdf->SetFont('Times','',12);
		$pdf->SetXY(175,30);
		$pdf->Cell(190,4,$get['noti_month_year'],0,0,'L',0);
		$pdf->SetFont('Times','',12);
		$pdf->SetXY($left,40);
		$pdf->Cell(190,4,'To,',0,0,'L',0);
		$pdf->SetXY(36,45);
		$pdf->Cell(190,4,'The Principal,',0,0,'L',0);
		$pdf->SetXY(36,50);
		$pdf->Cell(190,4,$row['centre'],0,0,'L',0);
		$pdf->SetXY($left,60);
		$pdf->Cell(190,4,'Subject:-',0,0,'L',0);
		$pdf->SetFont('Times','B',11);
		$pdf->SetXY(36,60);
		$pdf->Cell(190,4,'Confidential papers for Class-XI Promotion Examination '.$year,0,0,'L',0);
		$pdf->SetFont('Times','',12);
		$pdf->SetXY($left,70);
		$pdf->Cell(190,4,'Sir/Madam,',0,0,'L',0);
		$pdf->SetXY(30,75);
		$pdf->SetXY(36,75);
		$pdf->Cell(190,4,'Please find herewith a packet which contains       sealed packets of confidential papers for',0,0,'L',0);
		$pdf->SetFont('Times','B',12);
		$pdf->SetXY(114,75);
		$pdf->Cell(190,4,$tot,0,0,'L',0);
		$pdf->SetFont('Times','',12);
		$pdf->SetXY($left,80);
		$pdf->Cell(190,4,'                                                                to be held in your institution from the                             ',0,0,'L',0);
		$pdf->SetFont('Times','I',12);
		$pdf->SetXY($left,80);
		$pdf->Cell(190,4,'Class XI Promotion Examination '.$year,0,0,'L',0);
		$firstExam = mysql_query('select * from c11s_timetbl where sl=1');
		$firstExam = mysql_fetch_array($firstExam);
		$pdf->SetFont('Times','B',12);
		$pdf->SetXY($left+133,80);
		$pdf->Cell(190,4,$firstExam['e_date'],0,0,'L',0);
		$pdf->SetFont('Times','',12);
		$pdf->SetXY($left,85);
		$pdf->Cell(190,4,'as per the routine given below:',0,0,'L',0);
		$pdf->SetFont('Times','B',12);
		$pdf->SetXY(40,110);
		$pdf->Cell(190,4,'Time: '.$Etime.'(Vocational Subjects: '.$Vtime.')',0,0,'L',0);
		$pdf->SetXY($left,115);
		$pdf->Cell(184,8,'Date',1,0,'L',0);
		$pdf->SetXY(60,115);
		$pdf->Cell(190,8,'Day',0,0,'L',0);
		$pdf->SetXY(90,115);
		$pdf->Cell(190,8,'Subject',0,0,'L',0);
		$pdf->SetXY(145,115);
		$pdf->Cell(190,8,'Number of question papers',0,0,'L',0);
		$sl=1;
		$ss=mysql_query("select * from c11s_timetbl where subcode!='' order by sl asc");
		while($rr=mysql_fetch_array($ss,MYSQL_ASSOC))
		{
			if($rr['subject']=='Mils')
			{
				$pdf->SetXY($left,$contents+$off);
				$pdf->Cell(190,4,$rr['e_date'],0,0,'L',0);
				$pdf->SetXY(60,$contents+$off);
				$pdf->Cell(190,4,$rr['day'],0,0,'L',0);
				$pdf->SetXY(95,$contents+$off);
				$pdf->Cell(190,4,'i.   Alternative English',0,0,'L',0);
				$pdf->SetXY($valAlign,$contents+$off);
				if(!empty($row['alt']))
				{
					$pdf->Cell(190,4,$row['alt'],0,0,'L',0);
				}
				else
				{
					$pdf->Cell(190,4,'____',0,0,'L',0);
				}
				$off=$off+$inc;
				$pdf->SetXY(95,$contents+$off);
				$pdf->Cell(190,4,'ii.  Ao',0,0,'L',0);
				$pdf->SetXY($valAlign,$contents+$off);
				if(!empty($row['aon']))
				{
					$pdf->Cell(190,4,$row['aon'],0,0,'L',0);
				}
				else
				{
					$pdf->Cell(190,4,'____',0,0,'L',0);
				}
				$off=$off+$inc;
				$pdf->SetXY(95,$contents+$off);
				$pdf->Cell(190,4,'iii. Bengali',0,0,'L',0);
				$pdf->SetXY($valAlign,$contents+$off);
				if(!empty($row['bng']))
				{
					$pdf->Cell(190,4,$row['bng'],0,0,'L',0);
				}
				else
				{
					$pdf->Cell(190,4,'____',0,0,'L',0);
				}
				$off=$off+$inc;
				$pdf->SetXY(95,$contents+$off);
				$pdf->Cell(190,4,'iv. Hindi',0,0,'L',0);
				$pdf->SetXY($valAlign,$contents+$off);
				if(!empty($row['hnd']))
				{
					$pdf->Cell(190,4,$row['hnd'],0,0,'L',0);
				}
				else
				{
					$pdf->Cell(190,4,'____',0,0,'L',0);
				}
				$off=$off+$inc;
				$pdf->SetXY(95,$contents+$off);
				$pdf->Cell(190,4,'v.  Lotha',0,0,'L',0);
				$pdf->SetXY($valAlign,$contents+$off);
				if(!empty($row['lta']))
				{
					$pdf->Cell(190,4,$row['lta'],0,0,'L',0);
				}
				else
				{
					$pdf->Cell(190,4,'____',0,0,'L',0);
				}
				$off=$off+$inc;
				$pdf->SetXY(95,$contents+$off);
				$sumi = iconv('UTF-8','windows-1252','vi. Sumi(Sütsah)');
				$pdf->Cell(190,4,$sumi,0,0,'L',0);
				$pdf->SetXY($valAlign,$contents+$off);
				if(!empty($row['smi']))
				{
					$pdf->Cell(190,4,$row['smi'],0,0,'L',0);
				}
				else
				{
					$pdf->Cell(190,4,'____',0,0,'L',0);
				}
				$off=$off+$inc;
				$pdf->SetXY(95,$contents+$off);
				$pdf->Cell(190,4,'vii.Tenyidie',0,0,'L',0);
				$pdf->SetXY($valAlign,$contents+$off);
				if(!empty($row['tny']))
				{
					$pdf->Cell(190,4,$row['tny'],0,0,'L',0);
				}
				else
				{
					$pdf->Cell(190,4,'____',0,0,'L',0);
				}
				$off=$off+$inc;
			}
			else if($rr['subject']!='' && $rr['e_date']!='')
			{
			 	$pdf->SetXY($left,$contents+$off);
			 	$val = $rr['e_date'];
				$pdf->Cell(190,4,$rr['e_date'],0,0,'L',0);
			 	$pdf->SetXY(60,$contents+$off);
				$pdf->Cell(190,4,$rr['day'],0,0,'L',0);
			 	$pdf->SetXY(90,$contents+$off);
				$pdf->Cell(190,4,$rr['subject'],0,0,'L',0);
				$pdf->SetXY($valAlign,$contents+$off);
				/*	if($rr['subcode']=='eng'){$main='eng';}
				if($rr['subcode']=='phy'){$main='phy';}
				if($rr['subcode']=='bio'){$main='bio';}
				if($rr['subcode']=='evs'){$main='evs';}
				if($rr['subcode']=='che'){$main='che';}
				if($rr['subcode']=='mat'){$main='mat';}
				if($rr['subcode']=='csc'){$main='csc';}
				if($rr['subcode']=='inf'){$main='inf';}
				if($rr['subcode']=='itv'){$main='itv';}
				if($rr['subcode']=='ttv'){$main='ttv';}
				if($rr['subcode']=='rtv'){$main='rtv';}
				if($rr['subcode']=='hcv'){$main='hcv';}
				*/
				if(!empty($row[$rr['subcode']]))
				{
					$pdf->Cell(190,4,$row[$rr['subcode']],0,0,'L',0);
				}
				else
				{
					$pdf->Cell(190,4,'____',0,0,'L',0);
				}
				$off=$off+$inc;
			}
			else
			{
				$pdf->SetXY(90,$contents+$off);
				$pdf->Cell(190,4,$rr['subject'],0,0,'L',0);
				$pdf->SetXY($valAlign,$contents+$off);
				/*if($rr['subcode']=='eng'){$main='eng';}
				if($rr['subcode']=='phy'){$main='phy';}
				if($rr['subcode']=='bio'){$main='bio';}
				if($rr['subcode']=='evs'){$main='evs';}
				if($rr['subcode']=='che'){$main='che';}
				if($rr['subcode']=='mat'){$main='mat';}
				if($rr['subcode']=='csc'){$main='csc';}
				if($rr['subcode']=='inf'){$main='inf';}
				if($rr['subcode']=='itv'){$main='itv';}
				if($rr['subcode']=='ttv'){$main='ttv';}
				if($rr['subcode']=='rtv'){$main='rtv';}
				if($rr['subcode']=='hcv'){$main='hcv';}
				*/
				if(!empty($row[$rr['subcode']]))
				{
					$pdf->Cell(190,4,$row[$rr['subcode']],0,0,'L',0);
				}
				else
				{
					$pdf->Cell(190,4,'____',0,0,'L',0);
				}
				$off=$off+$inc;
			}
		}
		$sl++; $off=0;
		$pdf->SetFont('Times','',12);
		$pdf->SetXY($left,310);
		$pdf->Cell(190,4,'Signature with date..........................................',0,0,'L',0);
		$pdf->SetXY($left,320);
		$pdf->Cell(190,4,'Name : ............................................................',0,0,'L',0);
		$pdf->SetXY($left,330);
		$pdf->Cell(190,4,'Designation : ..................................................',0,0,'L',0);
		$pdf->SetXY($left+140,325);
		$pdf->Cell(190,4,iconv('UTF-8','windows-1252','( Keneilenyü Nagi )'),0,0,'L',0);
		$pdf->SetXY($left+135,330);
		$pdf->Cell(190,4,'Controller of Examinations',0,0,'L',0);
	}
}
//
if($exam=="compart" && $class=='12a')
{
	if($class=='12a' && $dist=="KOHIMA")
	{
		$contents = 125;
		$sql=mysql_query("select * from c12a_pkChrt where district='$dist'");
		while($row=mysql_fetch_array($sql,MYSQL_ASSOC))
		{
			$pdf->AddPage();
			$inc = 5;
			//*************************************//
			//   SECOND LANGAUGE
			//*************************************//

			if(!empty($row['aon'])){ $tot1=1;} else {$tot1=0;}
			if(!empty($row['smi'])){ $tot2=1;} else {$tot2=0;}
			if(!empty($row['lta'])){ $tot3=1;} else {$tot3=0;}
			if(!empty($row['hnd'])){ $tot4=1;} else {$tot4=0;}
			if(!empty($row['bng'])){ $tot5=1;} else {$tot5=0;}
			if(!empty($row['alt'])){ $tot6=1;} else {$tot6=0;}
			if(!empty($row['tny'])){ $tot7=1;} else {$tot7=0;}
		
			//*************************************//
			//   6th subject
			//*************************************//
			if(!empty($row['eng'])){ $tot8=1;} else {$tot8=0;}
			if(!empty($row['edn'])){ $tot9=1;} else {$tot9=0;}
			if(!empty($row['psy'])){ $tot10=1;} else {$tot10=0;}
			if(!empty($row['geo'])){ $tot11=1;} else {$tot11=0;}
			if(!empty($row['msc'])){ $tot12=1;} else {$tot12=0;}
			if(!empty($row['his'])){ $tot13=1;} else {$tot13=0;}
			if(!empty($row['psc'])){ $tot14=1;} else {$tot14=0;}
			if(!empty($row['evs'])){ $tot15=1;} else {$tot15=0;}
			if(!empty($row['sgy'])){ $tot16=1;} else {$tot16=0;}
			if(!empty($row['eco'])){ $tot17=1;} else {$tot17=0;}
			if(!empty($row['phi'])){ $tot18=1;} else {$tot18=0;}
			if(!empty($row['csc'])){ $tot19=1;} else {$tot19=0;}
			if(!empty($row['inf'])){ $tot20=1;} else {$tot20=0;}
			if(!empty($row['itv'])){ $tot21=1;} else {$tot21=0;}
			if(!empty($row['ttv'])){ $tot22=1;} else {$tot22=0;}
			if(!empty($row['fmm'])){ $tot23=1;} else {$tot23=0;}
			if(!empty($row['rtv'])){ $tot24=1;} else {$tot24=0;}
			if(!empty($row['hcv'])){ $tot25=1;} else {$tot25=0;}
			if(!empty($row['btv'])){ $tot26=1;} else {$tot26=0;}
			if(!empty($row['etv'])){ $tot27=1;} else {$tot27=0;}
			if(!empty($row['agv'])){ $tot28=1;} else {$tot28=0;}
			if(!empty($row['atv'])){ $tot29=1;} else {$tot29=0;}

			$tot=$tot1+$tot2+$tot3+$tot4+$tot5+$tot6+$tot7+$tot8+$tot9+$tot10+$tot11+$tot12+$tot13+$tot14+$tot16+$tot15+$tot17+$tot18+$tot19+$tot20+$tot21+$tot22+$tot23+$tot24+$tot25+$tot26+$tot27+$tot28+$tot29;
			$not = mysql_query("select * from notification_tbl where class='12'");
			$get = mysql_fetch_array($not);
			$pdf->SetFont('Times','B',8);
			$pdf->SetXY(10,10);
			$pdf->Cell(190,4,'Confidential',0,0,'R',0);
			$pdf->SetXY(10,15);
			$pdf->Cell(190,4,'HSSLC ( Arts Stream )',0,0,'R',0);
			$pdf->SetFont('Times','B',13);
			$pdf->SetXY(10,20);
			$pdf->Cell(190,4,'Nagaland Board of School Education',0,0,'C',0);
			$pdf->SetXY(10,25);
			$pdf->Cell(190,4,'Kohima',0,0,'C',0);
			$pdf->SetFont('Times','',12);
			$pdf->SetXY($left,30);
			$pdf->Cell(190,4,$get['noti_detail'],0,0,'L',0);
			$pdf->SetXY(132,30);
			$pdf->Cell(190,4,'Dated Kohima, the     ',0,0,'L',0);
			$pdf->SetFont('Times','',10);
			$pdf->SetXY(171,28);
			$pdf->Cell(190,4,$get['sup_script'],0,0,'L',0);
			$pdf->SetFont('Times','',12);
			$pdf->SetXY(175,30);
			$pdf->Cell(190,4,$get['noti_month_year'],0,0,'L',0);
			$pdf->SetXY($left,40);
			$pdf->Cell(190,4,'To,',0,0,'L',0);
			$pdf->SetXY(30,45);
			$pdf->Cell(190,4,'Dr/Mr/Ms_____________________________________________________',0,0,'L',0);
			$pdf->SetXY(30,50);
			$pdf->Cell(190,4,'Centre Superintendent,',0,0,'L',0);
			$pdf->SetXY(30,55);
			$pdf->Cell(190,4,'Centre :- ',0,0,'L',0);
			$pdf->SetFont('Times','B',12);
			$pdf->SetXY(47,55);
			$pdf->Cell(190,4,$row['centre'],0,0,'L',0);
			$pdf->SetFont('Times','',12);
			$pdf->SetXY($left,65);
			$pdf->Cell(190,4,'Subject:-',0,0,'L',0);
			$pdf->SetFont('Times','B',11);
			$pdf->SetXY(36,65);
			$pdf->Multicell(160,4,'Confidential papers of the HSSLC Compartment & Improvement Examination '.$year,0,'L',false);
			$pdf->SetFont('Times','',12);
			$pdf->SetXY($left,75);
			$pdf->Cell(190,4,'Sir/Madam,',0,0,'L',0);
			$pdf->SetXY(30,80);
			$pdf->Cell(190,4,'Kindly collect the packets on the specific dates for the HSSLC Compartment & Improvement ',0,0,'L',0);
			$pdf->SetXY($left,85);
			$pdf->Cell(190,4,'Examination '.$year.', to be held from                             at your centre. The numbers of question papers  ',0,0,'L',0);
			$firstExam = mysql_query('select * from c12a_timetbl where sl=1');
			$firstExam = mysql_fetch_array($firstExam);
			$pdf->SetFont('Times','B',12);
			$pdf->SetXY($left+60,85);
			$pdf->Cell(190,4,$firstExam['e_date'],0,0,'L',0);
			$pdf->SetFont('Times','',12);
			$pdf->SetXY($left,90);
			$pdf->Cell(190,4,'supplied are given below and you are requested to confirm the numbers from the statement of candidates     ',0,0,'L',0);
			$pdf->SetXY($left,95);
			$pdf->Cell(190,4,'supplied to ensure that all the subjects and the required numbers issued to your centre are sufficient.   ',0,0,'L',0);
			$pdf->SetXY($left,100);
			$pdf->Cell(190,4,'You are also requested to read the necessary rules/instructions for the conduct of examinations.',0,0,'L',0);
			$pdf->SetXY($left,105);
			$pdf->Cell(190,4,'',0,0,'L',0);
			$pdf->SetXY($left,110);
			$pdf->Cell(190,4,'',0,0,'L',0);
			$pdf->SetFont('Times','B',10);
			$pdf->SetXY(40,110);
			$pdf->Cell(190,4,'Timing: Morning('.$Etime.')		Afternoon('.$Vtime.')',0,0,'L',0);
			$pdf->SetXY($left,115);
			$pdf->Cell(186,8,'Date',1,0,'L',0);
			$pdf->SetXY(60,115);
			$pdf->Cell(190,8,'Day',0,0,'L',0);
			$pdf->SetXY(90,115);
			$pdf->Cell(190,8,'Subject',0,0,'L',0);
			$pdf->SetXY(145,115);
			$pdf->Cell(190,8,'Number of question papers',0,0,'L',0);
			$sl=1;
			$ss=mysql_query("select * from c12a_timetbl where subcode!='' order by sl asc");
			while($rr=mysql_fetch_array($ss,MYSQL_ASSOC))
			{
				if($rr['subcode']=='mils')
				{
					$pdf->SetXY($left,$contents+$off);
					$pdf->Cell(190,4,$rr['e_date'],0,0,'L',0);
					$pdf->SetXY(60,$contents+$off);
					$pdf->Cell(190,4,$rr['day'],0,0,'L',0);
					$pdf->SetXY(90,$contents+$off);
					$pdf->Cell(190,4,'ii.   Alternative English(Afternoon)',0,0,'L',0);
					$pdf->SetXY($valAlign,$contents+$off);
					if(!empty($row['alt']))
					{
						$pdf->Cell(190,4,$row['alt'],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'____',0,0,'L',0);
					}
					$off=$off+$inc;
					$pdf->SetXY(90,$contents+$off);
					$pdf->Cell(190,4,'iii.  Ao(Afternoon)',0,0,'L',0);
					$pdf->SetXY($valAlign,$contents+$off);
					if(!empty($row['aon']))
					{
						$pdf->Cell(190,4,$row['aon'],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'____',0,0,'L',0);
					}
					$off=$off+$inc;
					$pdf->SetXY(90,$contents+$off);
					$pdf->Cell(190,4,'iv. Bengali(Afternoon)',0,0,'L',0);
					$pdf->SetXY($valAlign,$contents+$off);
					if(!empty($row['bng']))
					{
						$pdf->Cell(190,4,$row['bng'],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'____',0,0,'L',0);
					}
					$off=$off+$inc;
					$pdf->SetXY(90,$contents+$off);
					$pdf->Cell(190,4,'v. Hindi(Afternoon)',0,0,'L',0);
					$pdf->SetXY($valAlign,$contents+$off);
					if(!empty($row['hnd']))
					{
						$pdf->Cell(190,4,$row['hnd'],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'____',0,0,'L',0);
					}
					$off=$off+$inc;
					$pdf->SetXY(90,$contents+$off);
					$pdf->Cell(190,4,'vi.  Lotha(Afternoon)',0,0,'L',0);
					$pdf->SetXY($valAlign,$contents+$off);
					if(!empty($row['lta']))
					{
						$pdf->Cell(190,4,$row['lta'],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'____',0,0,'L',0);
					}
					$off=$off+$inc;
					$pdf->SetXY(90,$contents+$off);
					$sumi = iconv('UTF-8','windows-1252','vii. Sumi(Sütsah)(Afternoon)');
					$pdf->Cell(190,4,$sumi,0,0,'L',0);
					$pdf->SetXY($valAlign,$contents+$off);
					if(!empty($row['smi']))
					{
						$pdf->Cell(190,4,$row['smi'],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'____',0,0,'L',0);
					}
					$off=$off+$inc;
					$pdf->SetXY(90,$contents+$off);
					$pdf->Cell(190,4,'viii.Tenyidie(Afternoon)',0,0,'L',0);
					$pdf->SetXY($valAlign,$contents+$off);
					if(!empty($row['tny']))
					{
						$pdf->Cell(190,4,$row['tny'],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'____',0,0,'L',0);
					}
					$off=$off+$inc;
				}
				else if($rr['subject']!='' && $rr['e_date']!='')
				{
				 	$pdf->SetXY($left,$contents+$off);
				 	$val = $rr['e_date'];
					$pdf->Cell(190,4,$rr['e_date'],0,0,'L',0);
				 	$pdf->SetXY(60,$contents+$off);
					$pdf->Cell(190,4,$rr['day'],0,0,'L',0);
					$pdf->SetXY(90,$contents+$off);
					$pdf->Cell(190,4,$rr['subject'],0,0,'L',0);
					$pdf->SetXY($valAlign,$contents+$off);
					/*
					if($rr['subcode']=='eng'){$main='eng';}
					if($rr['subcode']=='edn'){$main='edn';}
					if($rr['subcode']=='psy'){$main='psy';}
					if($rr['subcode']=='geo'){$main='geo';}
					if($rr['subcode']=='msc'){$main='msc';}
					if($rr['subcode']=='his'){$main='his';}
					if($rr['subcode']=='sgy'){$main='sgy';}
					if($rr['subcode']=='psc'){$main='psc';}
					if($rr['subcode']=='eco'){$main='eco';}
					if($rr['subcode']=='phi'){$main='phi';}
					if($rr['subcode']=='csc'){$main='csc';}
					if($rr['subcode']=='inf'){$main='inf';}
					if($rr['subcode']=='itv'){$main='itv';}
					if($rr['subcode']=='ttv'){$main='ttv';}
					if($rr['subcode']=='ffm'){$main='ffm';}
					*/
					if(!empty($row[$rr['subcode']]))
					{
						$pdf->Cell(190,4,$row[$rr['subcode']],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'____',0,0,'L',0);
					}
					$off=$off+$inc;
				}
				else
				{
					$pdf->SetXY(90,$contents+$off);
					$pdf->Cell(190,4,$rr['subject'],0,0,'L',0);
					$pdf->SetXY($valAlign,$contents+$off);
					/*
					if($rr['subcode']=='eng'){$main='eng';}
					if($rr['subcode']=='edn'){$main='edn';}
					if($rr['subcode']=='psy'){$main='psy';}
					if($rr['subcode']=='geo'){$main='geo';}
					if($rr['subcode']=='msc'){$main='msc';}
					if($rr['subcode']=='his'){$main='his';}
					if($rr['subcode']=='sgy'){$main='sgy';}
					if($rr['subcode']=='psc'){$main='psc';}
					if($rr['subcode']=='eco'){$main='eco';}
					if($rr['subcode']=='phi'){$main='phi';}
					if($rr['subcode']=='csc'){$main='csc';}
					if($rr['subcode']=='inf'){$main='inf';}
					if($rr['subcode']=='itv'){$main='itv';}
					if($rr['subcode']=='ttv'){$main='ttv';}
					if($rr['subcode']=='ffm'){$main='ffm';}
					*/
					if(!empty($row[$rr['subcode']]))
					{
						$pdf->Cell(190,4,$row[$rr['subcode']],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'____',0,0,'L',0);
					}
					$off=$off+$inc;
				}
			}
			$sl++;$off=0;
			$sign =18; $bottom = 6;
			$pdf->SetFont('Times','',11);
			$pdf->SetXY(10,265+$sign);
			$pdf->Cell(190,4,'( Mrs. Asano Sekhose )',0,0,'R',0);
			$sign = $sign+$bottom;
			$pdf->SetXY(175,265+$sign);
			$pdf->Cell(190,4,'Chairman',0,0,'L',0);
			$sign = $sign+$bottom;
			$pdf->SetXY($left,265+$sign);
			$pdf->Cell(190,4,$get['noti_detail'],0,0,'L',0);
			$pdf->SetXY(132,265+$sign);
			$pdf->Cell(190,4,'Dated Kohima, the     ',0,0,'L',0);
			$pdf->SetFont('Times','',10);
			$pdf->SetXY(171,265+$sign-2);
			$pdf->Cell(190,4,$get['sup_script'],0,0,'L',0);
			$pdf->SetFont('Times','',12);
			$pdf->SetXY(175,265+$sign);
			$pdf->Cell(190,4,$get['noti_month_year'],0,0,'L',0);


			$sign = $sign+$bottom;
			$pdf->SetXY($left,270+$sign);
			$pdf->Cell(190,4,'Copy for information and necessary action :-',0,0,'L',0);
			$sign = $sign+$bottom;
			$pdf->SetXY(20,270+$sign);
			$pdf->Cell(190,4,'1.      Mr/Ms._________________________________________________',0,0,'L',0);
			$sign = $sign+$bottom;
			$pdf->SetXY(20,270+$sign);
			$pdf->Cell(190,4,'2.      Mr/Ms._________________________________________________',0,0,'L',0);
			$sign = $sign+$bottom;
			$pdf->SetXY(10,270+$sign);
			$pdf->Cell(190,4,'( Mrs. Asano Sekhose )',0,0,'R',0);
			$sign = $sign+$bottom;
			$pdf->SetXY(175,270+$sign);
			$pdf->Cell(190,4,'Chairman',0,0,'L',0);
		}
	}


	if($class=="12a" && $dist!="KOHIMA")
	{
		$contents = 105;
		$inc = 5;
		$sql=mysql_query("select * from c12a_pkChrt where district='$dist'");
		while($row=mysql_fetch_array($sql,MYSQL_ASSOC))
		{
			$pdf->AddPage();
			//*************************************//
			//   SECOND LANGAUGE
			//*************************************//

			if(!empty($row['aon'])){ $tot1=1;} else {$tot1=0;}
			if(!empty($row['smi'])){ $tot2=1;} else {$tot2=0;}
			if(!empty($row['lta'])){ $tot3=1;} else {$tot3=0;}
			if(!empty($row['hnd'])){ $tot4=1;} else {$tot4=0;}
			if(!empty($row['bng'])){ $tot5=1;} else {$tot5=0;}
			if(!empty($row['alt'])){ $tot6=1;} else {$tot6=0;}
			if(!empty($row['tny'])){ $tot7=1;} else {$tot7=0;}
		
			//*************************************//
			//   6th subject
			//*************************************//
			if(!empty($row['eng'])){ $tot8=1;} else {$tot8=0;}
			if(!empty($row['edn'])){ $tot9=1;} else {$tot9=0;}
			if(!empty($row['psy'])){ $tot10=1;} else {$tot10=0;}
			if(!empty($row['geo'])){ $tot11=1;} else {$tot11=0;}
			if(!empty($row['msc'])){ $tot12=1;} else {$tot12=0;}
			if(!empty($row['his'])){ $tot13=1;} else {$tot13=0;}
			if(!empty($row['psc'])){ $tot14=1;} else {$tot14=0;}
			if(!empty($row['evs'])){ $tot15=1;} else {$tot15=0;}
			if(!empty($row['sgy'])){ $tot16=1;} else {$tot16=0;}
			if(!empty($row['eco'])){ $tot17=1;} else {$tot17=0;}
			if(!empty($row['phi'])){ $tot18=1;} else {$tot18=0;}
			if(!empty($row['csc'])){ $tot19=1;} else {$tot19=0;}
			if(!empty($row['inf'])){ $tot20=1;} else {$tot20=0;}
			if(!empty($row['itv'])){ $tot21=1;} else {$tot21=0;}
			if(!empty($row['ttv'])){ $tot22=1;} else {$tot22=0;}
			if(!empty($row['fmm'])){ $tot23=1;} else {$tot23=0;}
			if(!empty($row['rtv'])){ $tot24=1;} else {$tot24=0;}
			if(!empty($row['hcv'])){ $tot25=1;} else {$tot25=0;}
			if(!empty($row['btv'])){ $tot26=1;} else {$tot26=0;}
			if(!empty($row['ehv'])){ $tot27=1;} else {$tot27=0;}
			if(!empty($row['atv'])){ $tot28=1;} else {$tot28=0;}
			if(!empty($row['agv'])){ $tot29=1;} else {$tot29=0;}

			$tot=$tot1+$tot2+$tot3+$tot4+$tot5+$tot6+$tot7+$tot8+$tot9+$tot10+$tot11+$tot12+$tot13+$tot14+$tot16+$tot15+$tot17+$tot18+$tot19+$tot20+$tot21+$tot22+$tot23+$tot24+$tot25+$tot26+$tot27+$tot28+$tot29;
			$not = mysql_query("select * from notification_tbl where class='12'");
			$get = mysql_fetch_array($not);
			$pdf->SetFont('Times','B',11);
			$pdf->SetXY(10,10);
			$pdf->Cell(190,4,'Confidential',0,0,'R',0);
			$pdf->SetXY(10,15);
			$pdf->Cell(190,4,'HSSLC ( Arts Stream )',0,0,'R',0);
			$pdf->SetFont('Times','B',13);
			$pdf->SetXY(10,20);
			$pdf->Cell(190,4,'Nagaland Board of School Education',0,0,'C',0);
			$pdf->SetXY(10,25);
			$pdf->Cell(190,4,'Kohima',0,0,'C',0);
			$pdf->SetFont('Times','',12);
			$pdf->SetXY($left,30);
			$pdf->Cell(190,4,$get['noti_detail'],0,0,'L',0);
			$pdf->SetXY(132,30);
			$pdf->Cell(190,4,'Dated Kohima, the     ',0,0,'L',0);
			$pdf->SetFont('Times','',10);
			$pdf->SetXY(171,28);
			$pdf->Cell(190,4,$get['sup_script'],0,0,'L',0);
			$pdf->SetFont('Times','',12);
			$pdf->SetXY(175,30);
			$pdf->Cell(190,4,$get['noti_month_year'],0,0,'L',0);
			$pdf->SetXY($left,40);
			$pdf->Cell(190,4,'To,',0,0,'L',0);
			$pdf->SetXY(30,45);
			$pdf->Cell(190,4,'The Sr. Treasury Officer/Treasury Officer/Sub-Treasury Officer/',0,0,'L',0);
			$pdf->SetXY(30,50);
			$pdf->Cell(190,4,'Branch Manager,',0,0,'L',0);
			$pdf->SetXY(30,55);
			$pdf->Cell(190,4,'_________________________________________________________',0,0,'L',0);
			$pdf->SetXY($left,60);
			$pdf->Cell(190,4,'Subject:-',0,0,'L',0);
			$pdf->SetFont('Times','B',11);
			$pdf->SetXY(36,60);
			$pdf->Multicell(160,4,'Confidential papers of the HSSLC Compartment and Improvement Examination '.$year,0,'L',false);
			$pdf->SetFont('Times','',12);
			$pdf->SetXY($left,65);
			$pdf->Cell(190,4,'Sir/Madam,',0,0,'L',0);
			$pdf->SetXY(30,70);
			$pdf->Cell(190,4,'Please find herewith a packet which contains       sealed packets of confidential papers to be kept',0,0,'L',0);
			$pdf->SetXY($left,75);
			$pdf->Cell(190,4,'under your custody for the HSSLC Compartment and Improvement Examination '.$year.' to be held from the                              as per the',0,0,'L',0);
			$pdf->SetFont('Times','B',12);
			$pdf->SetXY(108,70);
			$pdf->Cell(190,4,$tot,0,0,'L',0);
			$pdf->SetFont('Times','',12);
			$firstExam = mysql_query('select * from c12a_timetbl where sl=1');
			$firstExam = mysql_fetch_array($firstExam);
			$pdf->SetFont('Times','B',12);
			$pdf->SetXY($left+125,75);
			$pdf->Cell(190,4,$firstExam['e_date'],0,0,'L',0);
			$pdf->SetFont('Times','',12);
			$pdf->SetXY($left,80);
			$pdf->Cell(190,4,'routine given enclosed. Kindly issue the confidential packets to the concerned Centre Superintendent on the ',0,0,'L',0);
			$pdf->SetXY($left,85);
			$pdf->Cell(190,4,'date shown below at the appointed time against each subject:',0,0,'L',0);
			$pdf->SetFont('Times','B',10);
			$pdf->SetXY(40,90);
			$pdf->Cell(190,4,'Time: '.$Etime.'(Vocational Subjects: '.$Vtime.')',0,0,'L',0);
			$pdf->SetXY($left,95);
			$pdf->Cell(184,8,'Date',1,0,'L',0);
			$pdf->SetXY(60,95);
			$pdf->Cell(190,8,'Day',0,0,'L',0);
			$pdf->SetXY(90,95);
			$pdf->Cell(190,8,'Subject',0,0,'L',0);
			$pdf->SetXY(145,95);
			$pdf->Cell(190,8,'Number of question papers',0,0,'L',0);
			$sl=1;
			$ss=mysql_query("select * from c12a_timetbl where subcode!='' order by sl asc");
			while($rr=mysql_fetch_array($ss,MYSQL_ASSOC))
			{
				if($rr['subject']=='Mils')
				{
					$pdf->SetXY($left,$contents+$off);
					$pdf->Cell(190,4,$rr['e_date'],0,0,'L',0);
					$pdf->SetXY(60,$contents+$off);
					$pdf->Cell(190,4,$rr['day'],0,0,'L',0);
					$pdf->SetXY(90,$contents+$off);
					$pdf->Cell(190,4,'i.   Alternative English',0,0,'L',0);
					$pdf->SetXY($valAlign,$contents+$off);
					if(!empty($row['alt']))
					{
						$pdf->Cell(190,4,$row['alt'],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'____',0,0,'L',0);
					}
					$off=$off+$inc;
					$pdf->SetXY(90,$contents+$off);
					$pdf->Cell(190,4,'ii.  Ao',0,0,'L',0);
					$pdf->SetXY($valAlign,$contents+$off);
					if(!empty($row['aon']))
					{
						$pdf->Cell(190,4,$row['aon'],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'____',0,0,'L',0);
					}
					$off=$off+$inc;
					$pdf->SetXY(90,$contents+$off);
					$pdf->Cell(190,4,'iii. Bengali',0,0,'L',0);
					$pdf->SetXY($valAlign,$contents+$off);
					if(!empty($row['bng']))
					{
						$pdf->Cell(190,4,$row['bng'],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'____',0,0,'L',0);
					}
					$off=$off+$inc;
					$pdf->SetXY(90,$contents+$off);
					$pdf->Cell(190,4,'iv. Hindi',0,0,'L',0);
					$pdf->SetXY($valAlign,$contents+$off);
					if(!empty($row['hnd']))
					{
						$pdf->Cell(190,4,$row['hnd'],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'____',0,0,'L',0);
					}
					$off=$off+$inc;
					$pdf->SetXY(90,$contents+$off);
					$pdf->Cell(190,4,'v.  Lotha',0,0,'L',0);
					$pdf->SetXY($valAlign,$contents+$off);
					if(!empty($row['lta']))
					{
						$pdf->Cell(190,4,$row['lta'],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'____',0,0,'L',0);
					}
					$off=$off+$inc;
					$pdf->SetXY(90,$contents+$off);
					$sumi = iconv('UTF-8','windows-1252','vi. Sumi(Sütsah)');
					$pdf->Cell(190,4,$sumi,0,0,'L',0);
					$pdf->SetXY($valAlign,$contents+$off);
					if(!empty($row['smi']))
					{
						$pdf->Cell(190,4,$row['smi'],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'____',0,0,'L',0);
					}
					$off=$off+$inc;
					$pdf->SetXY(90,$contents+$off);
					$pdf->Cell(190,4,'vii.Tenyidie',0,0,'L',0);
					$pdf->SetXY($valAlign,$contents+$off);
					if(!empty($row['tny']))
					{
						$pdf->Cell(190,4,$row['tny'],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'____',0,0,'L',0);
					}
					$off=$off+$inc;
				}
				else if($rr['subject']!='' && $rr['e_date']!='')
				{
					$pdf->SetXY($left,$contents+$off);
					$val = $rr['e_date'];
					$pdf->Cell(190,4,$rr['e_date'],0,0,'L',0);
					$pdf->SetXY(60,$contents+$off);
					$pdf->Cell(190,4,$rr['day'],0,0,'L',0);
					$pdf->SetXY(90,$contents+$off);
					$pdf->Cell(190,4,$rr['subject'],0,0,'L',0);
					$pdf->SetXY($valAlign,$contents+$off);
					/*
					if($rr['subcode']=='eng'){$main='eng';}
					if($rr['subcode']=='edn'){$main='edn';}
					if($rr['subcode']=='psy'){$main='psy';}
					if($rr['subcode']=='geo'){$main='geo';}
					if($rr['subcode']=='msc'){$main='msc';}
					if($rr['subcode']=='his'){$main='his';}
					if($rr['subcode']=='sgy'){$main='sgy';}
					if($rr['subcode']=='psc'){$main='psc';}
					if($rr['subcode']=='eco'){$main='eco';}
					if($rr['subcode']=='phi'){$main='phi';}
					if($rr['subcode']=='csc'){$main='csc';}
					if($rr['subcode']=='inf'){$main='inf';}
					if($rr['subcode']=='itv'){$main='itv';}
					if($rr['subcode']=='ttv'){$main='ttv';}
					if($rr['subcode']=='ffm'){$main='ffm';}
					*/
					if(!empty($row[$rr['subcode']]))
					{
						$pdf->Cell(190,4,$row[$rr['subcode']],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'____',0,0,'L',0);
					}
					$off=$off+$inc;
				}
				else
				{
					$pdf->SetXY(90,$contents+$off);
					$pdf->Cell(190,4,$rr['subject'],0,0,'L',0);
					$pdf->SetXY($valAlign,$contents+$off);
					/*
					if($rr['subcode']=='eng'){$main='eng';}
					if($rr['subcode']=='edn'){$main='edn';}
					if($rr['subcode']=='psy'){$main='psy';}
					if($rr['subcode']=='geo'){$main='geo';}
					if($rr['subcode']=='msc'){$main='msc';}
					if($rr['subcode']=='his'){$main='his';}
					if($rr['subcode']=='sgy'){$main='sgy';}
					if($rr['subcode']=='psc'){$main='psc';}
					if($rr['subcode']=='eco'){$main='eco';}
					if($rr['subcode']=='phi'){$main='phi';}
					if($rr['subcode']=='csc'){$main='csc';}
					if($rr['subcode']=='inf'){$main='inf';}
					if($rr['subcode']=='itv'){$main='itv';}
					if($rr['subcode']=='ttv'){$main='ttv';}
					if($rr['subcode']=='ffm'){$main='ffm';}
					*/
					if(!empty($row[$rr['subcode']]))
					{
						$pdf->Cell(190,4,$row[$rr['subcode']],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'____',0,0,'L',0);
					}
					$off=$off+$inc;
				}
			}
			$sl++;$off=0;$sign =15; $bottom = 6; $add = 247;
			$pdf->SetFont('Times','',11);
			$pdf->SetXY(10,$add+$sign);
			$pdf->Cell(190,4,'( Mrs. Asano Sekhose )',0,0,'R',0);
			$sign = $sign + 4;
			$pdf->SetXY(175,$add+$sign);
			$pdf->Cell(190,4,'Chairman',0,0,'L',0);
			$sign = $sign + $bottom;
			$pdf->SetXY($left,$add+$sign);
			$pdf->Cell(190,4,$get['noti_detail'],0,0,'L',0);
			$pdf->SetXY(132,$add+$sign);
			$pdf->Cell(190,4,'Dated Kohima, the     ',0,0,'L',0);
			$pdf->SetFont('Times','',10);
			$pdf->SetXY(171,$add+$sign-2);
			$pdf->Cell(190,4,$get['sup_script'],0,0,'L',0);
			$pdf->SetFont('Times','',12);
			$pdf->SetXY(175,$add+$sign);
			$pdf->Cell(190,4,$get['noti_month_year'],0,0,'L',0);
			$sign = $sign + $bottom;
			$pdf->SetXY($left,$add+$sign-2);
			$pdf->Cell(190,4,'Copy to :-',0,0,'L',0);
			$sign = $sign + $bottom;
			$pdf->SetXY(20,$add+$sign-2);
			$pdf->Cell(190,4,'1.      The Deputy Commissioner/Additional Deputy Commissioner/S.D.O(Civil),',0,0,'L',0);
			$sign = $sign + $bottom;
			$pdf->SetXY(20,$add+$sign-2);
			$pdf->Cell(190,4,'        __________________________________________ for information and necessary action.',0,0,'L',0);
			$sign = $sign + $bottom;
			$pdf->SetXY(20,$add+$sign-2);
			$pdf->Cell(190,4,'2.      Dr/Mr/Ms ____________________________________________ Centre Superintendent of',0,0,'L',0);
			$sign = $sign + $bottom;
			$pdf->SetXY(20,$add+$sign-2);
			$pdf->SetFont('Times','B',12);
			$pdf->Cell(190,4,'        '.$row['centre'].'.',0,0,'L',0);
			$sign = $sign + $bottom;
			$pdf->SetFont('Times','',12);
			$pdf->SetXY(20,$add+$sign-2);
			$pdf->Cell(190,2,'        You are requested to confirm that the number of question papers of the different subjects supplied',0,0,'L',0);
			$sign = $sign + 4;
			$pdf->SetXY(20,$add+$sign-2);
			$pdf->Cell(190,2,'        for your centre is sufficient, read and follow the rules/instructions for the conduct  of examination.',0,0,'L',0);
			$sign = $sign + $bottom;
			$pdf->SetXY(20,$add+$sign-2);
			$pdf->Cell(190,4,'3.      Office copy.',0,0,'L',0);
			$sign = $sign + $bottom;
			$sign = $sign + $bottom;
			$pdf->SetXY(10,$add+$sign-5);
			$pdf->Cell(190,4,'( Mrs. Asano Sekhose )',0,0,'R',0);
			$sign = $sign + $bottom;
			$pdf->SetXY(175,$add+$sign-5);
			$pdf->Cell(190,4,'Chairman',0,0,'L',0);
		}
	}
}
if($exam=="main" && $class=='12a')
{
	if($class=='12a' && $dist=="KOHIMA")
	{
		$contents = 125;
		$sql=mysql_query("select * from c12a_pkChrt where district='$dist'");
		while($row=mysql_fetch_array($sql,MYSQL_ASSOC))
		{
			$pdf->AddPage();
			$inc = 5;
			//*************************************//
			//   SECOND LANGAUGE
			//*************************************//

			if(!empty($row['aon'])){ $tot1=1;} else {$tot1=0;}
			if(!empty($row['smi'])){ $tot2=1;} else {$tot2=0;}
			if(!empty($row['lta'])){ $tot3=1;} else {$tot3=0;}
			if(!empty($row['hnd'])){ $tot4=1;} else {$tot4=0;}
			if(!empty($row['bng'])){ $tot5=1;} else {$tot5=0;}
			if(!empty($row['alt'])){ $tot6=1;} else {$tot6=0;}
			if(!empty($row['tny'])){ $tot7=1;} else {$tot7=0;}
		
			//*************************************//
			//   6th subject
			//*************************************//
			if(!empty($row['eng'])){ $tot8=1;} else {$tot8=0;}
			if(!empty($row['edn'])){ $tot9=1;} else {$tot9=0;}
			if(!empty($row['psy'])){ $tot10=1;} else {$tot10=0;}
			if(!empty($row['geo'])){ $tot11=1;} else {$tot11=0;}
			if(!empty($row['msc'])){ $tot12=1;} else {$tot12=0;}
			if(!empty($row['his'])){ $tot13=1;} else {$tot13=0;}
			if(!empty($row['psc'])){ $tot14=1;} else {$tot14=0;}
			if(!empty($row['evs'])){ $tot15=1;} else {$tot15=0;}
			if(!empty($row['sgy'])){ $tot16=1;} else {$tot16=0;}
			if(!empty($row['eco'])){ $tot17=1;} else {$tot17=0;}
			if(!empty($row['phi'])){ $tot18=1;} else {$tot18=0;}
			if(!empty($row['csc'])){ $tot19=1;} else {$tot19=0;}
			if(!empty($row['inf'])){ $tot20=1;} else {$tot20=0;}
			if(!empty($row['itv'])){ $tot21=1;} else {$tot21=0;}
			if(!empty($row['ttv'])){ $tot22=1;} else {$tot22=0;}
			if(!empty($row['fmm'])){ $tot23=1;} else {$tot23=0;}
			if(!empty($row['rtv'])){ $tot24=1;} else {$tot24=0;}
			if(!empty($row['hcv'])){ $tot25=1;} else {$tot25=0;}
			if(!empty($row['btv'])){ $tot26=1;} else {$tot26=0;}
			if(!empty($row['etv'])){ $tot27=1;} else {$tot27=0;}
			if(!empty($row['agv'])){ $tot28=1;} else {$tot28=0;}
			if(!empty($row['atv'])){ $tot29=1;} else {$tot29=0;}

			$tot=$tot1+$tot2+$tot3+$tot4+$tot5+$tot6+$tot7+$tot8+$tot9+$tot10+$tot11+$tot12+$tot13+$tot14+$tot16+$tot15+$tot17+$tot18+$tot19+$tot20+$tot21+$tot22+$tot23+$tot24+$tot25+$tot26+$tot27+$tot28+$tot29;
			$not = mysql_query("select * from notification_tbl where class='12'");
			$get = mysql_fetch_array($not);
			$pdf->SetFont('Times','B',8);
			$pdf->SetXY(10,10);
			$pdf->Cell(190,4,'Confidential',0,0,'R',0);
			$pdf->SetXY(10,15);
			$pdf->Cell(190,4,'HSSLC ( Arts Stream )',0,0,'R',0);
			$pdf->SetFont('Times','B',13);
			$pdf->SetXY(10,20);
			$pdf->Cell(190,4,'Nagaland Board of School Education',0,0,'C',0);
			$pdf->SetXY(10,25);
			$pdf->Cell(190,4,'Kohima',0,0,'C',0);
			$pdf->SetFont('Times','',12);
			$pdf->SetXY($left,30);
			$pdf->Cell(190,4,$get['noti_detail'],0,0,'L',0);
			$pdf->SetXY(132,30);
			$pdf->Cell(190,4,'Dated Kohima, the     ',0,0,'L',0);
			$pdf->SetFont('Times','',10);
			$pdf->SetXY(171,28);
			$pdf->Cell(190,4,$get['sup_script'],0,0,'L',0);
			$pdf->SetFont('Times','',12);
			$pdf->SetXY(175,30);
			$pdf->Cell(190,4,$get['noti_month_year'],0,0,'L',0);
			$pdf->SetXY($left,40);
			$pdf->Cell(190,4,'To,',0,0,'L',0);
			$pdf->SetXY(30,45);
			$pdf->Cell(190,4,'Dr/Mr/Ms_____________________________________________________',0,0,'L',0);
			$pdf->SetXY(30,50);
			$pdf->Cell(190,4,'Centre Superintendent,',0,0,'L',0);
			$pdf->SetXY(30,55);
			$pdf->Cell(190,4,'Centre :- ',0,0,'L',0);
			$pdf->SetFont('Times','B',12);
			$pdf->SetXY(47,55);
			$pdf->Cell(190,4,$row['centre'],0,0,'L',0);
			$pdf->SetFont('Times','',12);
			$pdf->SetXY($left,65);
			$pdf->Cell(190,4,'Subject:-',0,0,'L',0);
			$pdf->SetFont('Times','B',11);
			$pdf->SetXY(36,65);
			$pdf->Multicell(160,4,'Confidential papers of the Higher Secondary School Leaving Certificate Examination '.$year,0,'L',false);
			$pdf->SetFont('Times','',12);
			$pdf->SetXY($left,75);
			$pdf->Cell(190,4,'Sir/Madam,',0,0,'L',0);
			$pdf->SetXY(30,80);
			$pdf->Cell(190,4,'Kindly collect the packets on the specific dates for the HSSLC Examination '.$year.', to be held from',0,0,'L',0);
			$pdf->SetXY($left,85);
			$pdf->Cell(190,4,'                             at your centre. The numbers of question papers supplied are given below and you ',0,0,'L',0);
			$firstExam = mysql_query('select * from c12a_timetbl where sl=1');
			$firstExam = mysql_fetch_array($firstExam);
			$pdf->SetFont('Times','B',12);
			$pdf->SetXY($left+0,85);
			$pdf->Cell(190,4,$firstExam['e_date'],0,0,'L',0);
			$pdf->SetFont('Times','',12);
			$pdf->SetXY($left,90);
			$pdf->Cell(190,4,'are requested to confirm the numbers from the statement of candidates supplied to ensure that all the    ',0,0,'L',0);
			$pdf->SetXY($left,95);
			$pdf->Cell(190,4,'subjects and the required numbers issued to your centre are sufficient. You are also requested to read the  ',0,0,'L',0);
			$pdf->SetXY($left,100);
			$pdf->Cell(190,4,'necessary rules/instructions for the conduct of examinations.',0,0,'L',0);
			$pdf->SetXY($left,105);
			$pdf->Cell(190,4,'',0,0,'L',0);
			$pdf->SetXY($left,110);
			$pdf->Cell(190,4,'',0,0,'L',0);
			$pdf->SetFont('Times','B',10);
			$pdf->SetXY(40,110);
			$pdf->Cell(190,4,'Time: '.$Etime.'(Vocational Subjects: '.$Vtime.')',0,0,'L',0);
			$pdf->SetXY($left,115);
			$pdf->Cell(186,8,'Date',1,0,'L',0);
			$pdf->SetXY(60,115);
			$pdf->Cell(190,8,'Day',0,0,'L',0);
			$pdf->SetXY(90,115);
			$pdf->Cell(190,8,'Subject',0,0,'L',0);
			$pdf->SetXY(145,115);
			$pdf->Cell(190,8,'Number of question papers',0,0,'L',0);
			$sl=1;
			$ss=mysql_query("select * from c12a_timetbl where subcode!='' order by sl asc");
			while($rr=mysql_fetch_array($ss,MYSQL_ASSOC))
			{
				if($rr['subject']=='Mils')
				{
					$pdf->SetXY($left,$contents+$off);
					$pdf->Cell(190,4,$rr['e_date'],0,0,'L',0);
					$pdf->SetXY(60,$contents+$off);
					$pdf->Cell(190,4,$rr['day'],0,0,'L',0);
					$pdf->SetXY(90,$contents+$off);
					$pdf->Cell(190,4,'i.   Alternative English',0,0,'L',0);
					$pdf->SetXY($valAlign,$contents+$off);
					if(!empty($row['alt']))
					{
						$pdf->Cell(190,4,$row['alt'],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'____',0,0,'L',0);
					}
					$off=$off+$inc;
					$pdf->SetXY(90,$contents+$off);
					$pdf->Cell(190,4,'ii.  Ao',0,0,'L',0);
					$pdf->SetXY($valAlign,$contents+$off);
					if(!empty($row['aon']))
					{
						$pdf->Cell(190,4,$row['aon'],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'____',0,0,'L',0);
					}
					$off=$off+$inc;
					$pdf->SetXY(90,$contents+$off);
					$pdf->Cell(190,4,'iii. Bengali',0,0,'L',0);
					$pdf->SetXY($valAlign,$contents+$off);
					if(!empty($row['bng']))
					{
						$pdf->Cell(190,4,$row['bng'],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'____',0,0,'L',0);
					}
					$off=$off+$inc;
					$pdf->SetXY(90,$contents+$off);
					$pdf->Cell(190,4,'iv. Hindi',0,0,'L',0);
					$pdf->SetXY($valAlign,$contents+$off);
					if(!empty($row['hnd']))
					{
						$pdf->Cell(190,4,$row['hnd'],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'____',0,0,'L',0);
					}
					$off=$off+$inc;
					$pdf->SetXY(90,$contents+$off);
					$pdf->Cell(190,4,'v.  Lotha',0,0,'L',0);
					$pdf->SetXY($valAlign,$contents+$off);
					if(!empty($row['lta']))
					{
						$pdf->Cell(190,4,$row['lta'],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'____',0,0,'L',0);
					}
					$off=$off+$inc;
					$pdf->SetXY(90,$contents+$off);
					$sumi = iconv('UTF-8','windows-1252','vi. Sumi(Sütsah)');
					$pdf->Cell(190,4,$sumi,0,0,'L',0);
					$pdf->SetXY($valAlign,$contents+$off);
					if(!empty($row['smi']))
					{
						$pdf->Cell(190,4,$row['smi'],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'____',0,0,'L',0);
					}
					$off=$off+$inc;
					$pdf->SetXY(90,$contents+$off);
					$pdf->Cell(190,4,'vii.Tenyidie',0,0,'L',0);
					$pdf->SetXY($valAlign,$contents+$off);
					if(!empty($row['tny']))
					{
						$pdf->Cell(190,4,$row['tny'],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'____',0,0,'L',0);
					}
					$off=$off+$inc;
				}
				else if($rr['subject']!='' && $rr['e_date']!='')
				{
				 	$pdf->SetXY($left,$contents+$off);
				 	$val = $rr['e_date'];
					$pdf->Cell(190,4,$rr['e_date'],0,0,'L',0);
				 	$pdf->SetXY(60,$contents+$off);
					$pdf->Cell(190,4,$rr['day'],0,0,'L',0);
					$pdf->SetXY(90,$contents+$off);
					$pdf->Cell(190,4,$rr['subject'],0,0,'L',0);
					$pdf->SetXY($valAlign,$contents+$off);
					/*
					if($rr['subcode']=='eng'){$main='eng';}
					if($rr['subcode']=='edn'){$main='edn';}
					if($rr['subcode']=='psy'){$main='psy';}
					if($rr['subcode']=='geo'){$main='geo';}
					if($rr['subcode']=='msc'){$main='msc';}
					if($rr['subcode']=='his'){$main='his';}
					if($rr['subcode']=='sgy'){$main='sgy';}
					if($rr['subcode']=='psc'){$main='psc';}
					if($rr['subcode']=='eco'){$main='eco';}
					if($rr['subcode']=='phi'){$main='phi';}
					if($rr['subcode']=='csc'){$main='csc';}
					if($rr['subcode']=='inf'){$main='inf';}
					if($rr['subcode']=='itv'){$main='itv';}
					if($rr['subcode']=='ttv'){$main='ttv';}
					if($rr['subcode']=='ffm'){$main='ffm';}
					*/
					if(!empty($row[$rr['subcode']]))
					{
						$pdf->Cell(190,4,$row[$rr['subcode']],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'____',0,0,'L',0);
					}
					$off=$off+$inc;
				}
				else
				{
					$pdf->SetXY(90,$contents+$off);
					$pdf->Cell(190,4,$rr['subject'],0,0,'L',0);
					$pdf->SetXY($valAlign,$contents+$off);
					/*
					if($rr['subcode']=='eng'){$main='eng';}
					if($rr['subcode']=='edn'){$main='edn';}
					if($rr['subcode']=='psy'){$main='psy';}
					if($rr['subcode']=='geo'){$main='geo';}
					if($rr['subcode']=='msc'){$main='msc';}
					if($rr['subcode']=='his'){$main='his';}
					if($rr['subcode']=='sgy'){$main='sgy';}
					if($rr['subcode']=='psc'){$main='psc';}
					if($rr['subcode']=='eco'){$main='eco';}
					if($rr['subcode']=='phi'){$main='phi';}
					if($rr['subcode']=='csc'){$main='csc';}
					if($rr['subcode']=='inf'){$main='inf';}
					if($rr['subcode']=='itv'){$main='itv';}
					if($rr['subcode']=='ttv'){$main='ttv';}
					if($rr['subcode']=='ffm'){$main='ffm';}
					*/
					if(!empty($row[$rr['subcode']]))
					{
						$pdf->Cell(190,4,$row[$rr['subcode']],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'____',0,0,'L',0);
					}
					$off=$off+$inc;
				}
			}
			$sl++;$off=0;
			$sign =18; $bottom = 6;
			$pdf->SetFont('Times','',11);
			$pdf->SetXY(10,265+$sign);
			$pdf->Cell(190,4,'( Mrs. Asano Sekhose )',0,0,'R',0);
			$sign = $sign+$bottom;
			$pdf->SetXY(175,265+$sign);
			$pdf->Cell(190,4,'Chairman',0,0,'L',0);
			$sign = $sign+$bottom;
			$pdf->SetXY($left,265+$sign);
			$pdf->Cell(190,4,$get['noti_detail'],0,0,'L',0);
			$pdf->SetXY(132,265+$sign);
			$pdf->Cell(190,4,'Dated Kohima, the     ',0,0,'L',0);
			$pdf->SetFont('Times','',10);
			$pdf->SetXY(171,265+$sign-2);
			$pdf->Cell(190,4,$get['sup_script'],0,0,'L',0);
			$pdf->SetFont('Times','',12);
			$pdf->SetXY(175,265+$sign);
			$pdf->Cell(190,4,$get['noti_month_year'],0,0,'L',0);


			$sign = $sign+$bottom;
			$pdf->SetXY($left,270+$sign);
			$pdf->Cell(190,4,'Copy for information and necessary action :-',0,0,'L',0);
			$sign = $sign+$bottom;
			$pdf->SetXY(20,270+$sign);
			$pdf->Cell(190,4,'1.      Mr/Ms._________________________________________________',0,0,'L',0);
			$sign = $sign+$bottom;
			$pdf->SetXY(20,270+$sign);
			$pdf->Cell(190,4,'2.      Mr/Ms._________________________________________________',0,0,'L',0);
			$sign = $sign+$bottom;
			$pdf->SetXY(10,270+$sign);
			$pdf->Cell(190,4,'( Mrs. Asano Sekhose )',0,0,'R',0);
			$sign = $sign+$bottom;
			$pdf->SetXY(175,270+$sign);
			$pdf->Cell(190,4,'Chairman',0,0,'L',0);
		}
	}


	if($class=="12a" && $dist!="KOHIMA")
	{
		$contents = 105;
		$inc = 5;
		$sql=mysql_query("select * from c12a_pkChrt where district='$dist'");
		while($row=mysql_fetch_array($sql,MYSQL_ASSOC))
		{
			$pdf->AddPage();
			//*************************************//
			//   SECOND LANGAUGE
			//*************************************//

			if(!empty($row['aon'])){ $tot1=1;} else {$tot1=0;}
			if(!empty($row['smi'])){ $tot2=1;} else {$tot2=0;}
			if(!empty($row['lta'])){ $tot3=1;} else {$tot3=0;}
			if(!empty($row['hnd'])){ $tot4=1;} else {$tot4=0;}
			if(!empty($row['bng'])){ $tot5=1;} else {$tot5=0;}
			if(!empty($row['alt'])){ $tot6=1;} else {$tot6=0;}
			if(!empty($row['tny'])){ $tot7=1;} else {$tot7=0;}
		
			//*************************************//
			//   6th subject
			//*************************************//
			if(!empty($row['eng'])){ $tot8=1;} else {$tot8=0;}
			if(!empty($row['edn'])){ $tot9=1;} else {$tot9=0;}
			if(!empty($row['psy'])){ $tot10=1;} else {$tot10=0;}
			if(!empty($row['geo'])){ $tot11=1;} else {$tot11=0;}
			if(!empty($row['msc'])){ $tot12=1;} else {$tot12=0;}
			if(!empty($row['his'])){ $tot13=1;} else {$tot13=0;}
			if(!empty($row['psc'])){ $tot14=1;} else {$tot14=0;}
			if(!empty($row['evs'])){ $tot15=1;} else {$tot15=0;}
			if(!empty($row['sgy'])){ $tot16=1;} else {$tot16=0;}
			if(!empty($row['eco'])){ $tot17=1;} else {$tot17=0;}
			if(!empty($row['phi'])){ $tot18=1;} else {$tot18=0;}
			if(!empty($row['csc'])){ $tot19=1;} else {$tot19=0;}
			if(!empty($row['inf'])){ $tot20=1;} else {$tot20=0;}
			if(!empty($row['itv'])){ $tot21=1;} else {$tot21=0;}
			if(!empty($row['ttv'])){ $tot22=1;} else {$tot22=0;}
			if(!empty($row['fmm'])){ $tot23=1;} else {$tot23=0;}
			if(!empty($row['rtv'])){ $tot24=1;} else {$tot24=0;}
			if(!empty($row['hcv'])){ $tot25=1;} else {$tot25=0;}
			if(!empty($row['btv'])){ $tot26=1;} else {$tot26=0;}
			if(!empty($row['ehv'])){ $tot27=1;} else {$tot27=0;}
			if(!empty($row['atv'])){ $tot28=1;} else {$tot28=0;}
			if(!empty($row['agv'])){ $tot29=1;} else {$tot29=0;}

			$tot=$tot1+$tot2+$tot3+$tot4+$tot5+$tot6+$tot7+$tot8+$tot9+$tot10+$tot11+$tot12+$tot13+$tot14+$tot16+$tot15+$tot17+$tot18+$tot19+$tot20+$tot21+$tot22+$tot23+$tot24+$tot25+$tot26+$tot27+$tot28+$tot29;
			$not = mysql_query("select * from notification_tbl where class='12'");
			$get = mysql_fetch_array($not);
			$pdf->SetFont('Times','B',11);
			$pdf->SetXY(10,10);
			$pdf->Cell(190,4,'Confidential',0,0,'R',0);
			$pdf->SetXY(10,15);
			$pdf->Cell(190,4,'HSSLC ( Arts Stream )',0,0,'R',0);
			$pdf->SetFont('Times','B',13);
			$pdf->SetXY(10,20);
			$pdf->Cell(190,4,'Nagaland Board of School Education',0,0,'C',0);
			$pdf->SetXY(10,25);
			$pdf->Cell(190,4,'Kohima',0,0,'C',0);
			$pdf->SetFont('Times','',12);
			$pdf->SetXY($left,30);
			$pdf->Cell(190,4,$get['noti_detail'],0,0,'L',0);
			$pdf->SetXY(132,30);
			$pdf->Cell(190,4,'Dated Kohima, the     ',0,0,'L',0);
			$pdf->SetFont('Times','',10);
			$pdf->SetXY(171,28);
			$pdf->Cell(190,4,$get['sup_script'],0,0,'L',0);
			$pdf->SetFont('Times','',12);
			$pdf->SetXY(175,30);
			$pdf->Cell(190,4,$get['noti_month_year'],0,0,'L',0);
			$pdf->SetXY($left,40);
			$pdf->Cell(190,4,'To,',0,0,'L',0);
			$pdf->SetXY(30,45);
			$pdf->Cell(190,4,'The Sr. Treasury Officer/Treasury Officer/Sub-Treasury Officer/',0,0,'L',0);
			$pdf->SetXY(30,50);
			$pdf->Cell(190,4,'Branch Manager,',0,0,'L',0);
			$pdf->SetXY(30,55);
			$pdf->Cell(190,4,'_________________________________________________________',0,0,'L',0);
			$pdf->SetXY($left,60);
			$pdf->Cell(190,4,'Subject:-',0,0,'L',0);
			$pdf->SetFont('Times','B',11);
			$pdf->SetXY(36,60);
			$pdf->Multicell(160,4,'Confidential papers of the Higher Secondary School Leaving Certificate Examination '.$year,0,'L',false);
			$pdf->SetFont('Times','',12);
			$pdf->SetXY($left,65);
			$pdf->Cell(190,4,'Sir/Madam,',0,0,'L',0);
			$pdf->SetXY(30,70);
			$pdf->Cell(190,4,'Please find herewith a packet which contains       sealed packets of confidential papers to be kept',0,0,'L',0);
			$pdf->SetXY($left,75);
			$pdf->Cell(190,4,'under your custody for the HSSLC Examination '.$year.' to be held from the                              as per the',0,0,'L',0);
			$pdf->SetFont('Times','B',12);
			$pdf->SetXY(108,70);
			$pdf->Cell(190,4,$tot,0,0,'L',0);
			$pdf->SetFont('Times','',12);
			$firstExam = mysql_query('select * from c12a_timetbl where sl=1');
			$firstExam = mysql_fetch_array($firstExam);
			$pdf->SetFont('Times','B',12);
			$pdf->SetXY($left+125,75);
			$pdf->Cell(190,4,$firstExam['e_date'],0,0,'L',0);
			$pdf->SetFont('Times','',12);
			$pdf->SetXY($left,80);
			$pdf->Cell(190,4,'routine given enclosed. Kindly issue the confidential packets to the concerned Centre Superintendent on the ',0,0,'L',0);
			$pdf->SetXY($left,85);
			$pdf->Cell(190,4,'date shown below at the appointed time against each subject:',0,0,'L',0);
			$pdf->SetFont('Times','B',10);
			$pdf->SetXY(40,90);
			$pdf->Cell(190,4,'Time: '.$Etime.'(Vocational Subjects: '.$Vtime.')',0,0,'L',0);
			$pdf->SetXY($left,95);
			$pdf->Cell(184,8,'Date',1,0,'L',0);
			$pdf->SetXY(60,95);
			$pdf->Cell(190,8,'Day',0,0,'L',0);
			$pdf->SetXY(90,95);
			$pdf->Cell(190,8,'Subject',0,0,'L',0);
			$pdf->SetXY(145,95);
			$pdf->Cell(190,8,'Number of question papers',0,0,'L',0);
			$sl=1;
			$ss=mysql_query("select * from c12a_timetbl where subcode!='' order by sl asc");
			while($rr=mysql_fetch_array($ss,MYSQL_ASSOC))
			{
				if($rr['subject']=='Mils')
				{
					$pdf->SetXY($left,$contents+$off);
					$pdf->Cell(190,4,$rr['e_date'],0,0,'L',0);
					$pdf->SetXY(60,$contents+$off);
					$pdf->Cell(190,4,$rr['day'],0,0,'L',0);
					$pdf->SetXY(90,$contents+$off);
					$pdf->Cell(190,4,'i.   Alternative English',0,0,'L',0);
					$pdf->SetXY($valAlign,$contents+$off);
					if(!empty($row['alt']))
					{
						$pdf->Cell(190,4,$row['alt'],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'____',0,0,'L',0);
					}
					$off=$off+$inc;
					$pdf->SetXY(90,$contents+$off);
					$pdf->Cell(190,4,'ii.  Ao',0,0,'L',0);
					$pdf->SetXY($valAlign,$contents+$off);
					if(!empty($row['aon']))
					{
						$pdf->Cell(190,4,$row['aon'],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'____',0,0,'L',0);
					}
					$off=$off+$inc;
					$pdf->SetXY(90,$contents+$off);
					$pdf->Cell(190,4,'iii. Bengali',0,0,'L',0);
					$pdf->SetXY($valAlign,$contents+$off);
					if(!empty($row['bng']))
					{
						$pdf->Cell(190,4,$row['bng'],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'____',0,0,'L',0);
					}
					$off=$off+$inc;
					$pdf->SetXY(90,$contents+$off);
					$pdf->Cell(190,4,'iv. Hindi',0,0,'L',0);
					$pdf->SetXY($valAlign,$contents+$off);
					if(!empty($row['hnd']))
					{
						$pdf->Cell(190,4,$row['hnd'],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'____',0,0,'L',0);
					}
					$off=$off+$inc;
					$pdf->SetXY(90,$contents+$off);
					$pdf->Cell(190,4,'v.  Lotha',0,0,'L',0);
					$pdf->SetXY($valAlign,$contents+$off);
					if(!empty($row['lta']))
					{
						$pdf->Cell(190,4,$row['lta'],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'____',0,0,'L',0);
					}
					$off=$off+$inc;
					$pdf->SetXY(90,$contents+$off);
					$sumi = iconv('UTF-8','windows-1252','vi. Sumi(Sütsah)');
					$pdf->Cell(190,4,$sumi,0,0,'L',0);
					$pdf->SetXY($valAlign,$contents+$off);
					if(!empty($row['smi']))
					{
						$pdf->Cell(190,4,$row['smi'],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'____',0,0,'L',0);
					}
					$off=$off+$inc;
					$pdf->SetXY(90,$contents+$off);
					$pdf->Cell(190,4,'vii.Tenyidie',0,0,'L',0);
					$pdf->SetXY($valAlign,$contents+$off);
					if(!empty($row['tny']))
					{
						$pdf->Cell(190,4,$row['tny'],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'____',0,0,'L',0);
					}
					$off=$off+$inc;
				}
				else if($rr['subject']!='' && $rr['e_date']!='')
				{
					$pdf->SetXY($left,$contents+$off);
					$val = $rr['e_date'];
					$pdf->Cell(190,4,$rr['e_date'],0,0,'L',0);
					$pdf->SetXY(60,$contents+$off);
					$pdf->Cell(190,4,$rr['day'],0,0,'L',0);
					$pdf->SetXY(90,$contents+$off);
					$pdf->Cell(190,4,$rr['subject'],0,0,'L',0);
					$pdf->SetXY($valAlign,$contents+$off);
					/*
					if($rr['subcode']=='eng'){$main='eng';}
					if($rr['subcode']=='edn'){$main='edn';}
					if($rr['subcode']=='psy'){$main='psy';}
					if($rr['subcode']=='geo'){$main='geo';}
					if($rr['subcode']=='msc'){$main='msc';}
					if($rr['subcode']=='his'){$main='his';}
					if($rr['subcode']=='sgy'){$main='sgy';}
					if($rr['subcode']=='psc'){$main='psc';}
					if($rr['subcode']=='eco'){$main='eco';}
					if($rr['subcode']=='phi'){$main='phi';}
					if($rr['subcode']=='csc'){$main='csc';}
					if($rr['subcode']=='inf'){$main='inf';}
					if($rr['subcode']=='itv'){$main='itv';}
					if($rr['subcode']=='ttv'){$main='ttv';}
					if($rr['subcode']=='ffm'){$main='ffm';}
					*/
					if(!empty($row[$rr['subcode']]))
					{
						$pdf->Cell(190,4,$row[$rr['subcode']],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'____',0,0,'L',0);
					}
					$off=$off+$inc;
				}
				else
				{
					$pdf->SetXY(90,$contents+$off);
					$pdf->Cell(190,4,$rr['subject'],0,0,'L',0);
					$pdf->SetXY($valAlign,$contents+$off);
					/*
					if($rr['subcode']=='eng'){$main='eng';}
					if($rr['subcode']=='edn'){$main='edn';}
					if($rr['subcode']=='psy'){$main='psy';}
					if($rr['subcode']=='geo'){$main='geo';}
					if($rr['subcode']=='msc'){$main='msc';}
					if($rr['subcode']=='his'){$main='his';}
					if($rr['subcode']=='sgy'){$main='sgy';}
					if($rr['subcode']=='psc'){$main='psc';}
					if($rr['subcode']=='eco'){$main='eco';}
					if($rr['subcode']=='phi'){$main='phi';}
					if($rr['subcode']=='csc'){$main='csc';}
					if($rr['subcode']=='inf'){$main='inf';}
					if($rr['subcode']=='itv'){$main='itv';}
					if($rr['subcode']=='ttv'){$main='ttv';}
					if($rr['subcode']=='ffm'){$main='ffm';}
					*/
					if(!empty($row[$rr['subcode']]))
					{
						$pdf->Cell(190,4,$row[$rr['subcode']],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'____',0,0,'L',0);
					}
					$off=$off+$inc;
				}
			}
			$sl++;$off=0;$sign =15; $bottom = 6; $add = 247;
			$pdf->SetFont('Times','',11);
			$pdf->SetXY(10,$add+$sign);
			$pdf->Cell(190,4,'( Mrs. Asano Sekhose )',0,0,'R',0);
			$sign = $sign + 4;
			$pdf->SetXY(175,$add+$sign);
			$pdf->Cell(190,4,'Chairman',0,0,'L',0);
			$sign = $sign + $bottom;
			$pdf->SetXY($left,$add+$sign);
			$pdf->Cell(190,4,$get['noti_detail'],0,0,'L',0);
			$pdf->SetXY(132,$add+$sign);
			$pdf->Cell(190,4,'Dated Kohima, the     ',0,0,'L',0);
			$pdf->SetFont('Times','',10);
			$pdf->SetXY(171,$add+$sign-2);
			$pdf->Cell(190,4,$get['sup_script'],0,0,'L',0);
			$pdf->SetFont('Times','',12);
			$pdf->SetXY(175,$add+$sign);
			$pdf->Cell(190,4,$get['noti_month_year'],0,0,'L',0);
			$sign = $sign + $bottom;
			$pdf->SetXY($left,$add+$sign-2);
			$pdf->Cell(190,4,'Copy to :-',0,0,'L',0);
			$sign = $sign + $bottom;
			$pdf->SetXY(20,$add+$sign-2);
			$pdf->Cell(190,4,'1.      The Deputy Commissioner/Additional Deputy Commissioner/S.D.O(Civil),',0,0,'L',0);
			$sign = $sign + $bottom;
			$pdf->SetXY(20,$add+$sign-2);
			$pdf->Cell(190,4,'        __________________________________________ for information and necessary action.',0,0,'L',0);
			$sign = $sign + $bottom;
			$pdf->SetXY(20,$add+$sign-2);
			$pdf->Cell(190,4,'2.      Dr/Mr/Ms ____________________________________________ Centre Superintendent of',0,0,'L',0);
			$sign = $sign + $bottom;
			$pdf->SetXY(20,$add+$sign-2);
			$pdf->SetFont('Times','B',12);
			$pdf->Cell(190,4,'        '.$row['centre'].'.',0,0,'L',0);
			$sign = $sign + $bottom;
			$pdf->SetFont('Times','',12);
			$pdf->SetXY(20,$add+$sign-2);
			$pdf->Cell(190,2,'        You are requested to confirm that the number of question papers of the different subjects supplied',0,0,'L',0);
			$sign = $sign + 4;
			$pdf->SetXY(20,$add+$sign-2);
			$pdf->Cell(190,2,'        for your centre is sufficient, read and follow the rules/instructions for the conduct  of examination.',0,0,'L',0);
			$sign = $sign + $bottom;
			$pdf->SetXY(20,$add+$sign-2);
			$pdf->Cell(190,4,'3.      Office copy.',0,0,'L',0);
			$sign = $sign + $bottom;
			$sign = $sign + $bottom;
			$pdf->SetXY(10,$add+$sign-5);
			$pdf->Cell(190,4,'( Mrs. Asano Sekhose )',0,0,'R',0);
			$sign = $sign + $bottom;
			$pdf->SetXY(175,$add+$sign-5);
			$pdf->Cell(190,4,'Chairman',0,0,'L',0);
		}
	}
}
// FORWARDING FOR HSSLC(COMMERCE)

if($class=='12c' && $dist=="KOHIMA")
{
	$contents = 125;
	$sql=mysql_query("select * from c12c_pkChrt where district='$dist'");
	while($row=mysql_fetch_array($sql,MYSQL_ASSOC))
	{
		$pdf->AddPage();
		$inc = 7;
		//*************************************//
		//   SECOND LANGAUGE
		//*************************************//

		if(!empty($row['aon'])){ $tot1=1;} else {$tot1=0;}
		if(!empty($row['smi'])){ $tot2=1;} else {$tot2=0;}
		if(!empty($row['lta'])){ $tot3=1;} else {$tot3=0;}
		if(!empty($row['hnd'])){ $tot4=1;} else {$tot4=0;}
		if(!empty($row['bng'])){ $tot5=1;} else {$tot5=0;}
		if(!empty($row['alt'])){ $tot6=1;} else {$tot6=0;}
		if(!empty($row['tny'])){ $tot7=1;} else {$tot7=0;}
	
		//*************************************//
		//   6th subject
		//*************************************//
		if(!empty($row['eng'])){ $tot8=1;} else {$tot8=0;}
		if(!empty($row['cmo'])){ $tot9=1;} else {$tot9=0;}
		if(!empty($row['ent'])){ $tot10=1;} else {$tot10=0;}
		if(!empty($row['bus'])){ $tot11=1;} else {$tot11=0;}
		if(!empty($row['fbm'])){ $tot12=1;} else {$tot12=0;}
		if(!empty($row['evs'])){ $tot13=1;} else {$tot13=0;}
		if(!empty($row['acc'])){ $tot14=1;} else {$tot14=0;}
		if(!empty($row['eco'])){ $tot15=1;} else {$tot15=0;}
		if(!empty($row['dmo'])){ $tot16=1;} else {$tot16=0;}
		if(!empty($row['csc'])){ $tot17=1;} else {$tot17=0;}
		if(!empty($row['inf'])){ $tot18=1;} else {$tot18=0;}
		if(!empty($row['itv'])){ $tot19=1;} else {$tot19=0;}
		if(!empty($row['ttv'])){ $tot20=1;} else {$tot20=0;}
		if(!empty($row['ffm'])){ $tot21=1;} else {$tot21=0;}

		$tot=$tot1+$tot2+$tot3+$tot4+$tot5+$tot6+$tot7+$tot8+$tot9+$tot10+$tot11+$tot12+$tot13+$tot14+$tot16+$tot15+$tot17+$tot18+$tot19+$tot20+$tot21;
		$not = mysql_query("select * from notification_tbl where class='12'");
		$get = mysql_fetch_array($not);
		$pdf->SetFont('Times','B',11);
		$pdf->SetXY(10,10);
		$pdf->Cell(190,4,'Confidential',0,0,'R',0);
		$pdf->SetXY(10,15);
		$pdf->Cell(190,4,'HSSLC ( Commerce Stream )',0,0,'R',0);
		$pdf->SetFont('Times','B',13);
		$pdf->SetXY(10,20);
		$pdf->Cell(190,4,'Nagaland Board of School Education',0,0,'C',0);
		$pdf->SetXY(10,25);
		$pdf->Cell(190,4,'Kohima',0,0,'C',0);
		$pdf->SetFont('Times','',12);
		$pdf->SetXY($left,30);
		$pdf->Cell(190,4,$get['noti_detail'],0,0,'L',0);
		$pdf->SetXY(132,30);
		$pdf->Cell(190,4,'Dated Kohima, the     ',0,0,'L',0);
		$pdf->SetFont('Times','',10);
		$pdf->SetXY(171,28);
		$pdf->Cell(190,4,$get['sup_script'],0,0,'L',0);
		$pdf->SetFont('Times','',12);
		$pdf->SetXY(175,30);
		$pdf->Cell(190,4,$get['noti_month_year'],0,0,'L',0);
		$pdf->SetXY($left,40);
		$pdf->Cell(190,4,'To,',0,0,'L',0);
		$pdf->SetXY(30,45);
		$pdf->Cell(190,4,'Dr/Mr/Ms_____________________________________________________',0,0,'L',0);
		$pdf->SetXY(30,50);
		$pdf->Cell(190,4,'Centre Superintendent,',0,0,'L',0);
		$pdf->SetXY(30,55);
		$pdf->Cell(190,4,'Centre :- ',0,0,'L',0);
		$pdf->SetFont('Times','B',12);
		$pdf->SetXY(47,55);
		$pdf->Cell(190,4,$row['centre'],0,0,'L',0);
		$pdf->SetFont('Times','',12);
		$pdf->SetXY($left,65);
		$pdf->Cell(190,4,'Subject:-',0,0,'L',0);
		$pdf->SetFont('Times','B',11);
		$pdf->SetXY(36,65);
		$pdf->Multicell(160,4,'Confidential papers of the Higher Secondary School Leaving Certificate Examination '.$year,0,'L',false);
		$pdf->SetFont('Times','',12);
		$pdf->SetXY($left,75);
		$pdf->Cell(190,4,'Sir/Madam,',0,0,'L',0);
		$pdf->SetXY(30,80);
		$pdf->Cell(190,4,'Kindly collect the packets on the specific dates for the HSSLC Examination '.$year.', to be held from',0,0,'L',0);
		$pdf->SetXY($left,85);
		$pdf->Cell(190,4,'                             at your centre. The numbers of question papers supplied are given below and you ',0,0,'L',0);
		$firstExam = mysql_query('select * from c12c_timetbl where sl=1');
		$firstExam = mysql_fetch_array($firstExam);
		$pdf->SetFont('Times','B',12);
		$pdf->SetXY($left+0,85);
		$pdf->Cell(190,4,$firstExam['e_date'],0,0,'L',0);
		$pdf->SetFont('Times','',12);
		$pdf->SetXY($left,90);
		$pdf->Cell(190,4,'are requested to confirm the numbers from the statement of candidates supplied to ensure that all the    ',0,0,'L',0);
		$pdf->SetXY($left,95);
		$pdf->Cell(190,4,'subjects and the required numbers issued to your centre are sufficient. You are also requested to read the  ',0,0,'L',0);
		$pdf->SetXY($left,100);
		$pdf->Cell(190,4,'necessary rules/instructions for the conduct of examinations.',0,0,'L',0);
		$pdf->SetFont('Times','B',12);
		$pdf->SetXY(40,110);
		$pdf->Cell(190,4,'Time: '.$Etime.'(Vocational Subjects: '.$Vtime.')',0,0,'L',0);
		$pdf->SetXY($left,115);
		$pdf->Cell(184,8,'Date',1,0,'L',0);
		$pdf->SetXY(60,115);
		$pdf->Cell(190,8,'Day',0,0,'L',0);
		$pdf->SetXY(90,115);
		$pdf->Cell(190,8,'Subject',0,0,'L',0);
		$pdf->SetXY(145,115);
		$pdf->Cell(190,8,'Number of question papers',0,0,'L',0);
		$ss=mysql_query("select * from c12c_timetbl where subcode!='' order by sl asc");
		while($rr=mysql_fetch_array($ss,MYSQL_ASSOC))
		{
			if($rr['subject']=='Mils')
			{
				$pdf->SetXY($left,$contents+$off);
				$pdf->Cell(190,4,$rr['e_date'],0,0,'L',0);
				$pdf->SetXY(60,$contents+$off);
				$pdf->Cell(190,4,$rr['day'],0,0,'L',0);
				$pdf->SetXY(95,$contents+$off);
				$pdf->Cell(190,4,'i.   Alternative English',0,0,'L',0);
				$pdf->SetXY($valAlign,$contents+$off);
				if(!empty($row['alt']))
				{
					$pdf->Cell(190,4,$row['alt'],0,0,'L',0);
				}
				else
				{
					$pdf->Cell(190,4,'____',0,0,'L',0);
				}
				$off=$off+$inc;
				$pdf->SetXY(95,$contents+$off);
				$pdf->Cell(190,4,'ii.  Ao',0,0,'L',0);
				$pdf->SetXY($valAlign,$contents+$off);
				if(!empty($row['aon']))
				{
					$pdf->Cell(190,4,$row['aon'],0,0,'L',0);
				}
				else
				{
					$pdf->Cell(190,4,'____',0,0,'L',0);
				}
				$off=$off+$inc;
				$pdf->SetXY(95,$contents+$off);
				$pdf->Cell(190,4,'iii. Bengali',0,0,'L',0);
				$pdf->SetXY($valAlign,$contents+$off);
				if(!empty($row['bng']))
				{
					$pdf->Cell(190,4,$row['bng'],0,0,'L',0);
				}
				else
				{
					$pdf->Cell(190,4,'____',0,0,'L',0);
				}
				$off=$off+$inc;
				$pdf->SetXY(95,$contents+$off);
				$pdf->Cell(190,4,'iv. Hindi',0,0,'L',0);
				$pdf->SetXY($valAlign,$contents+$off);
				if(!empty($row['hnd']))
				{
					$pdf->Cell(190,4,$row['hnd'],0,0,'L',0);
				}
				else
				{
					$pdf->Cell(190,4,'____',0,0,'L',0);
				}
				$off=$off+$inc;
				$pdf->SetXY(95,$contents+$off);
				$pdf->Cell(190,4,'v.  Lotha',0,0,'L',0);
				$pdf->SetXY($valAlign,$contents+$off);
				if(!empty($row['lta']))
				{
					$pdf->Cell(190,4,$row['lta'],0,0,'L',0);
				}
				else
				{
					$pdf->Cell(190,4,'____',0,0,'L',0);
				}
				$off=$off+$inc;
				$pdf->SetXY(95,$contents+$off);
				$sumi = iconv('UTF-8','windows-1252','vi. Sumi(Sütsah)');
				$pdf->Cell(190,4,$sumi,0,0,'L',0);
				$pdf->SetXY($valAlign,$contents+$off);
				if(!empty($row['smi']))
				{
					$pdf->Cell(190,4,$row['smi'],0,0,'L',0);
				}
				else
				{
					$pdf->Cell(190,4,'____',0,0,'L',0);
				}
				$off=$off+$inc;
				$pdf->SetXY(95,$contents+$off);
				$pdf->Cell(190,4,'vii.Tenyidie',0,0,'L',0);
				$pdf->SetXY($valAlign,$contents+$off);
				if(!empty($row['tny']))
				{
					$pdf->Cell(190,4,$row['tny'],0,0,'L',0);
				}
				else
				{
					$pdf->Cell(190,4,'____',0,0,'L',0);
				}
				$off=$off+$inc;
			}
			else if($rr['subject']!='' && $rr['e_date']!='')
			{
				$pdf->SetXY($left,$contents+$off);
				$val = $rr['e_date'];
				$pdf->Cell(190,4,$rr['e_date'],0,0,'L',0);
				$pdf->SetXY(60,$contents+$off);
				$pdf->Cell(190,4,$rr['day'],0,0,'L',0);
				$pdf->SetXY(90,$contents+$off);
				/*if($rr['subcode']== 'ent'|| $rr['subcode']=='bus'||$rr['subcode']=='acc')
				{
					$accept1= $rr['subcode'];
					$accept2= $rr['subcode'].'_oc';
					$pdf->Cell(190,4,$rr['subject'].' (NC/OC)',0,0,'L',0);
					$pdf->SetXY($valAlign,$contents+$off);
					if($row[$accept1]!='')
					{
						$disp1 = $row[$accept1];
					}
					else
					{
						$disp1 = '____';
					}
					if($row[$accept2]!='')
					{
						$disp2 = $row[$accept2];
					}
					else
					{
						$disp2 = '____';
					}
					$pdf->Cell(190,4,$disp1.'/'.$disp2,0,0,'L',0);
				}*/
				//else 
				//{
					$pdf->Cell(190,4,$rr['subject'],0,0,'L',0);
					$pdf->SetXY($valAlign,$contents+$off);
					/*
					if($rr['subcode']=='eng'){$main='eng';}
					if($rr['subcode']=='cmo'){$main='cmo';}
					if($rr['subcode']=='fbm'){$main='fbm';}
					if($rr['subcode']=='evs'){$main='evs';}
					if($rr['subcode']=='eco'){$main='eco';}
					if($rr['subcode']=='dmo'){$main='dmo';}
					if($rr['subcode']=='csc'){$main='csc';}
					if($rr['subcode']=='inf'){$main='inf';}
					if($rr['subcode']=='itv'){$main='itv';}
					if($rr['subcode']=='ttv'){$main='ttv';}
					if($rr['subcode']=='ffm'){$main='ffm';}
					*/
					if(!empty($row[$rr['subcode']]))
					{
						$pdf->Cell(190,4,$row[$rr['subcode']],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'____',0,0,'L',0);
					}
				//}
				$off=$off+$inc;
			}
			else
			{
				$pdf->SetXY(90,$contents+$off);
				$pdf->Cell(190,4,$rr['subject'],0,0,'L',0);
				$pdf->SetXY($valAlign,$contents+$off);
				/*
				if($rr['subcode']=='eng'){$main='eng';}
				if($rr['subcode']=='ffm'){$main='ffm';}
				if($rr['subcode']=='fbm'){$main='fbm';}
				if($rr['subcode']=='evs'){$main='evs';}
				if($rr['subcode']=='eco'){$main='eco';}
				if($rr['subcode']=='muf'){$main='muf';}
				if($rr['subcode']=='csc'){$main='csc';}
				if($rr['subcode']=='inf'){$main='inf';}
				if($rr['subcode']=='itv'){$main='itv';}
				if($rr['subcode']=='ttv'){$main='ttv';}
				*/
				if(!empty($row[$rr['subcode']]))
				{
					$pdf->Cell(190,4,$row[$rr['subcode']],0,0,'L',0);
				}
				else
				{
					$pdf->Cell(190,4,'____',0,0,'L',0);
				}
				$off=$off+$inc;
			}
		}
		$off=0;
		$sign =16; $bottom = 6;
		$pdf->SetFont('Times','',11);
		$pdf->SetXY(10,260+$sign);
		$pdf->Cell(190,4,'( Mrs. Asano Sekhose )',0,0,'R',0);
		$sign = $sign+$bottom;
		$pdf->SetXY(175,260+$sign);
		$pdf->Cell(190,4,'Chairman',0,0,'L',0);
		$sign = $sign+$bottom;
		$pdf->SetXY($left,260+$sign);
		$pdf->Cell(190,4,$get['noti_detail'],0,0,'L',0);
		$pdf->SetXY(132,260+$sign);
		$pdf->Cell(190,4,'Dated Kohima, the     ',0,0,'L',0);
		$pdf->SetFont('Times','',10);
		$pdf->SetXY(171,260+$sign-2);
		$pdf->Cell(190,4,$get['sup_script'],0,0,'L',0);
		$pdf->SetFont('Times','',12);
		$pdf->SetXY(175,260+$sign);
		$pdf->Cell(190,4,$get['noti_month_year'],0,0,'L',0);



		$sign = $sign+$bottom;
		$pdf->SetXY($left,270+$sign);
		$pdf->Cell(190,4,'Copy for information and necessary action :-',0,0,'L',0);
		$sign = $sign+$bottom;
		$pdf->SetXY(20,270+$sign);
		$pdf->Cell(190,4,'1.      Mr/Ms._________________________________________________',0,0,'L',0);
		$sign = $sign+$bottom;
		$pdf->SetXY(20,270+$sign);
		$pdf->Cell(190,4,'2.      Mr/Ms._________________________________________________',0,0,'L',0);
		$sign = $sign+$bottom;
		$pdf->SetXY(10,270+$sign);
		$pdf->Cell(190,4,'( Mrs. Asano Sekhose )',0,0,'R',0);
		$sign = $sign+$bottom;
		$pdf->SetXY(175,270+$sign);
		$pdf->Cell(190,4,'Chairman',0,0,'L',0);
	}
}

if($class=="12c" && $dist!="KOHIMA")
{
	$contents = 110;
	$inc = 6.0;
	$sql=mysql_query("select * from c12c_pkChrt where district='$dist'");
	while($row=mysql_fetch_array($sql,MYSQL_ASSOC))
	{
		$pdf->AddPage();
		//*************************************//
		//   SECOND LANGAUGE
		//*************************************//

		if(!empty($row['aon'])){ $tot1=1;} else {$tot1=0;}
		if(!empty($row['smi'])){ $tot2=1;} else {$tot2=0;}
		if(!empty($row['lta'])){ $tot3=1;} else {$tot3=0;}
		if(!empty($row['hnd'])){ $tot4=1;} else {$tot4=0;}
		if(!empty($row['bng'])){ $tot5=1;} else {$tot5=0;}
		if(!empty($row['alt'])){ $tot6=1;} else {$tot6=0;}
		if(!empty($row['tny'])){ $tot7=1;} else {$tot7=0;}
	
		//*************************************//
		//   6th subject
		//*************************************//
		if(!empty($row['eng'])){ $tot8=1;} else {$tot8=0;}
		if(!empty($row['cmo'])){ $tot9=1;} else {$tot9=0;}
		if(!empty($row['ent'])){ $tot10=1;} else {$tot10=0;}
		if(!empty($row['bus'])){ $tot11=1;} else {$tot11=0;}
		if(!empty($row['fbm'])){ $tot12=1;} else {$tot12=0;}
		if(!empty($row['rtv'])){ $tot13=1;} else {$tot13=0;}
		if(!empty($row['acc'])){ $tot14=1;} else {$tot14=0;}
		if(!empty($row['eco'])){ $tot15=1;} else {$tot15=0;}
		if(!empty($row['dmo'])){ $tot16=1;} else {$tot16=0;}
		if(!empty($row['csc'])){ $tot17=1;} else {$tot17=0;}
		if(!empty($row['inf'])){ $tot18=1;} else {$tot18=0;}
		if(!empty($row['itv'])){ $tot19=1;} else {$tot19=0;}
		if(!empty($row['ttv'])){ $tot20=1;} else {$tot20=0;}
		
		if(!empty($row['ffm'])){ $tot21=1;} else {$tot21=0;}

		$tot=$tot1+$tot2+$tot3+$tot4+$tot5+$tot6+$tot7+$tot8+$tot9+$tot10+$tot11+$tot12+$tot13+$tot14+$tot16+$tot15+$tot17+$tot18+$tot19+$tot20+$tot21;
		$not = mysql_query("select * from notification_tbl where class='12'");
		$get = mysql_fetch_array($not);
		$pdf->SetFont('Times','B',11);
		$pdf->SetXY(10,10);
		$pdf->Cell(190,4,'Confidential',0,0,'R',0);
		$pdf->SetXY(10,15);
		$pdf->Cell(190,4,'HSSLC ( Commerce Stream )',0,0,'R',0);
		$pdf->SetFont('Times','B',13);
		$pdf->SetXY(10,20);
		$pdf->Cell(190,4,'Nagaland Board of School Education',0,0,'C',0);
		$pdf->SetXY(10,25);
		$pdf->Cell(190,4,'Kohima',0,0,'C',0);
		$pdf->SetFont('Times','',12);
		$pdf->SetXY($left,30);
		$pdf->Cell(190,4,$get['noti_detail'],0,0,'L',0);
		$pdf->SetXY(132,30);
		$pdf->Cell(190,4,'Dated Kohima, the     ',0,0,'L',0);
		$pdf->SetFont('Times','',10);
		$pdf->SetXY(171,28);
		$pdf->Cell(190,4,$get['sup_script'],0,0,'L',0);
		$pdf->SetFont('Times','',12);
		$pdf->SetXY(175,30);
		$pdf->Cell(190,4,$get['noti_month_year'],0,0,'L',0);
		$pdf->SetXY($left,40);
		$pdf->Cell(190,4,'To,',0,0,'L',0);
		$pdf->SetXY(30,45);
		$pdf->Cell(190,4,'The Sr. Treasury Officer/Treasury Officer/Sub-Treasury Officer/',0,0,'L',0);
		$pdf->SetXY(30,50);
		$pdf->Cell(190,4,'Branch Manager,',0,0,'L',0);
		$pdf->SetXY(30,55);
		$pdf->Cell(190,4,'_________________________________________________________',0,0,'L',0);
		$pdf->SetXY($left,60);
		$pdf->Cell(190,4,'Subject:-',0,0,'L',0);
		$pdf->SetFont('Times','B',11);
		$pdf->SetXY(36,60);
		$pdf->Multicell(160,4,'Confidential papers of the Higher Secondary School Leaving Certificate Examination '.$year,0,'L',false);
		$pdf->SetFont('Times','',12);
		$pdf->SetXY($left,70);
		$pdf->Cell(190,4,'Sir/Madam,',0,0,'L',0);
		$pdf->SetXY(30,75);
		$pdf->Cell(190,4,'Please find herewith a packet which contains       sealed packets of confidential papers to be kept',0,0,'L',0);
		$pdf->SetXY($left,80);
		$pdf->Cell(190,4,'under your custody for the HSSLC Examination '.$year.' to be held from the                             as per the',0,0,'L',0);
		$pdf->SetFont('Times','B',12);
		$pdf->SetXY(108,75);
		$pdf->Cell(190,4,$tot,0,0,'L',0);
		$pdf->SetFont('Times','',12);
		$firstExam = mysql_query('select * from c12a_timetbl where sl=1');
		$firstExam = mysql_fetch_array($firstExam);
		$pdf->SetFont('Times','B',12);
		$pdf->SetXY($left+125,80);
		$pdf->Cell(190,4,$firstExam['e_date'],0,0,'L',0);
		$pdf->SetFont('Times','',12);
		$pdf->SetXY($left,85);
		$pdf->Cell(190,4,'routine given enclosed. Kindly issue the confidential packets to the concerned Centre Superintendent on the ',0,0,'L',0);
		$pdf->SetXY($left,90);
		$pdf->Cell(190,4,'date shown below at the appointed time against each subject:',0,0,'L',0);
		$pdf->SetFont('Times','B',12);
		$pdf->SetXY(40,95);
		$pdf->Cell(190,4,'Time: '.$Etime.'(Vocational Subjects: '.$Vtime.')',0,0,'L',0);
		$pdf->SetXY($left,100);
		$pdf->Cell(184,8,'Date',1,0,'L',0);
		$pdf->SetXY(60,100);
		$pdf->Cell(190,8,'Day',0,0,'L',0);
		$pdf->SetXY(90,100);
		$pdf->Cell(190,8,'Subject',0,0,'L',0);
		$pdf->SetXY(145,100);
		$pdf->Cell(190,8,'Number of question papers',0,0,'L',0);
		$sl=1;
		$ss=mysql_query("select * from c12c_timetbl where subcode!='' order by sl asc");
		while($rr=mysql_fetch_array($ss,MYSQL_ASSOC))
		{
			if($rr['subject']=='Mils')
			{
				$pdf->SetXY($left,$contents+$off);
				$pdf->Cell(190,4,$rr['e_date'],0,0,'L',0);
				$pdf->SetXY(60,$contents+$off);
				$pdf->Cell(190,4,$rr['day'],0,0,'L',0);
				$pdf->SetXY(95,$contents+$off);
				$pdf->Cell(190,4,'i.   Alternative English',0,0,'L',0);
				$pdf->SetXY($valAlign,$contents+$off);
				if(!empty($row['alt']))
				{
					$pdf->Cell(190,4,$row['alt'],0,0,'L',0);
				}
				else
				{
					$pdf->Cell(190,4,'____',0,0,'L',0);
				}
				$off=$off+$inc;
				$pdf->SetXY(95,$contents+$off);
				$pdf->Cell(190,4,'ii.  Ao',0,0,'L',0);
				$pdf->SetXY($valAlign,$contents+$off);
				if(!empty($row['aon']))
				{
					$pdf->Cell(190,4,$row['aon'],0,0,'L',0);
				}
				else
				{
					$pdf->Cell(190,4,'____',0,0,'L',0);
				}
				$off=$off+$inc;
				$pdf->SetXY(95,$contents+$off);
				$pdf->Cell(190,4,'iii. Bengali',0,0,'L',0);
				$pdf->SetXY($valAlign,$contents+$off);
				if(!empty($row['bng']))
				{
					$pdf->Cell(190,4,$row['bng'],0,0,'L',0);
				}
				else
				{
					$pdf->Cell(190,4,'____',0,0,'L',0);
				}
				$off=$off+$inc;
				$pdf->SetXY(95,$contents+$off);
				$pdf->Cell(190,4,'iv. Hindi',0,0,'L',0);
				$pdf->SetXY($valAlign,$contents+$off);
				if(!empty($row['hnd']))
				{
					$pdf->Cell(190,4,$row['hnd'],0,0,'L',0);
				}
				else
				{
					$pdf->Cell(190,4,'____',0,0,'L',0);
				}
				$off=$off+$inc;
				$pdf->SetXY(95,$contents+$off);
				$pdf->Cell(190,4,'v.  Lotha',0,0,'L',0);
				$pdf->SetXY($valAlign,$contents+$off);
				if(!empty($row['lta']))
				{
					$pdf->Cell(190,4,$row['lta'],0,0,'L',0);
				}
				else
				{
					$pdf->Cell(190,4,'____',0,0,'L',0);
				}
				$off=$off+$inc;
				$pdf->SetXY(95,$contents+$off);
				$sumi = iconv('UTF-8','windows-1252','vi. Sumi(Sütsah)');
				$pdf->Cell(190,4,$sumi,0,0,'L',0);
				$pdf->SetXY($valAlign,$contents+$off);
				if(!empty($row['smi']))
				{
					$pdf->Cell(190,4,$row['smi'],0,0,'L',0);
				}
				else
				{
					$pdf->Cell(190,4,'____',0,0,'L',0);
				}
				$off=$off+$inc;
				$pdf->SetXY(95,$contents+$off);
				$pdf->Cell(190,4,'vii.Tenyidie',0,0,'L',0);
				$pdf->SetXY($valAlign,$contents+$off);
				if(!empty($row['tny']))
				{
					$pdf->Cell(190,4,$row['tny'],0,0,'L',0);
				}
				else
				{
					$pdf->Cell(190,4,'____',0,0,'L',0);
				}
				$off=$off+$inc;
			}
			else if($rr['subject']!='' && $rr['e_date']!='')
			{
				$pdf->SetXY($left,$contents+$off);
				$val = $rr['e_date'];
				$pdf->Cell(190,4,$rr['e_date'],0,0,'L',0);
				$pdf->SetXY(60,$contents+$off);
				$pdf->Cell(190,4,$rr['day'],0,0,'L',0);
				$pdf->SetXY(90,$contents+$off);
				/*if($rr['subcode']== 'ent'|| $rr['subcode']=='bus'||$rr['subcode']=='acc')
				{
					$accept1= $rr['subcode'];
					$accept2= $rr['subcode'].'_oc';
					$pdf->Cell(190,4,$rr['subject'].' (NC/OC)',0,0,'L',0);
					$pdf->SetXY($valAlign,$contents+$off);
					if($row[$accept1]!='')
					{
						$disp1 = $row[$accept1];
					}
					else
					{
						$disp1 = '____';
					}
					if($row[$accept2]!='')
					{
						$disp2 = $row[$accept2];
					}
					else
					{
						$disp2 = '____';
					}
					$pdf->Cell(190,4,$disp1.'/'.$disp2,0,0,'L',0);
				}
				else */
				//{
					$pdf->Cell(190,4,$rr['subject'],0,0,'L',0);
					$pdf->SetXY($valAlign,$contents+$off);
					/*
					if($rr['subcode']=='eng'){$main='eng';}
					if($rr['subcode']=='cmo'){$main='cmo';}
					if($rr['subcode']=='fbm'){$main='fbm';}
					if($rr['subcode']=='evs'){$main='evs';}
					if($rr['subcode']=='eco'){$main='eco';}
					if($rr['subcode']=='dmo'){$main='dmo';}
					if($rr['subcode']=='csc'){$main='csc';}
					if($rr['subcode']=='inf'){$main='inf';}
					if($rr['subcode']=='itv'){$main='itv';}
					if($rr['subcode']=='ttv'){$main='ttv';}
					if($rr['subcode']=='ffm'){$main='ffm';}
					*/
					if(!empty($row[$rr['subcode']]))
					{
						$pdf->Cell(190,4,$row[$rr['subcode']],0,0,'L',0);
					}
					else
					{
						$pdf->Cell(190,4,'____',0,0,'L',0);
					}
				//}
				$off=$off+$inc;
			}
			else
			{
				$pdf->SetXY(90,$contents+$off);
				$pdf->Cell(190,4,$rr['subject'],0,0,'L',0);
				$pdf->SetXY($valAlign,$contents+$off);
				/*
				if($rr['subcode']=='eng'){$main='eng';}
				if($rr['subcode']=='fbm'){$main='fbm';}
				if($rr['subcode']=='evs'){$main='evs';}
				if($rr['subcode']=='eco'){$main='eco';}
				if($rr['subcode']=='muf'){$main='muf';}
				if($rr['subcode']=='csc'){$main='csc';}
				if($rr['subcode']=='inf'){$main='inf';}
				if($rr['subcode']=='itv'){$main='itv';}
				if($rr['subcode']=='ttv'){$main='ttv';}
				if($rr['subcode']=='ffm'){$main='ffm';}
				*/
				if(!empty($row[$rr['subcode']]))
				{
					$pdf->Cell(190,4,$row[$rr['subcode']],0,0,'L',0);
				}
				else
				{
					$pdf->Cell(190,4,'____',0,0,'L',0);
				}
				$off=$off+$inc;
			}
		}
		$sl++;$off=0;$sign =16; $bottom = 6; $add = 240;
		$pdf->SetFont('Times','',11);
		$pdf->SetXY(10,230+$sign);
		$pdf->Cell(190,4,'( Mrs. Asano Sekhose )',0,0,'R',0);
		$sign = $sign + 4;
		$pdf->SetXY(175,230+$sign);
		$pdf->Cell(190,4,'Chairman',0,0,'L',0);
		$sign = $sign + $bottom;
		$pdf->SetXY($left,230+$sign);
		$pdf->Cell(190,4,$get['noti_detail'],0,0,'L',0);
		$pdf->SetXY(132,230+$sign);
		$pdf->Cell(190,4,'Dated Kohima, the     ',0,0,'L',0);
		$pdf->SetFont('Times','',10);
		$pdf->SetXY(171,230+$sign-2);
		$pdf->Cell(190,4,$get['sup_script'],0,0,'L',0);
		$pdf->SetFont('Times','',12);
		$pdf->SetXY(175,230+$sign);
		$pdf->Cell(190,4,$get['noti_month_year'],0,0,'L',0);



		$sign = $sign + $bottom;
		$pdf->SetXY($left,$add+$sign);
		$pdf->Cell(190,4,'Copy to :-',0,0,'L',0);
		$sign = $sign + $bottom;
		$pdf->SetXY(20,$add+$sign);
		$pdf->Cell(190,4,'1.      The Deputy Commissioner/Additional Deputy Commissioner/S.D.O(Civil),',0,0,'L',0);
		$sign = $sign + $bottom;
		$pdf->SetXY(20,$add+$sign);
		$pdf->Cell(190,4,'        __________________________________________ for information and necessary action.',0,0,'L',0);
		$sign = $sign + $bottom;
		$pdf->SetXY(20,$add+$sign);
		$pdf->Cell(190,4,'2.      Dr/Mr/Ms ____________________________________________ Centre Superintendent of',0,0,'L',0);
		$sign = $sign + $bottom;
		$pdf->SetXY(20,$add+$sign);
		$pdf->SetFont('Times','B',12);
		$pdf->Cell(190,4,'        '.$row['centre'],0,0,'L',0);
		$pdf->SetFont('Times','',12);
		$sign = $sign + $bottom;
		$pdf->SetXY(20,$add+$sign);
		$pdf->Cell(190,2,'        You are requested to confirm that the number of question papers of the different subjects supplied',0,0,'L',0);
		$sign = $sign + 4;
		$pdf->SetXY(20,$add+$sign);
		$pdf->Cell(190,2,'        for your centre is sufficient and also read and follow the instructions for the conduct  of examination.',0,0,'L',0);
		$sign = $sign + $bottom;
		$pdf->SetXY(20,$add+$sign);
		$pdf->Cell(190,4,'3.      Office copy.',0,0,'L',0);
		$sign = $sign + $bottom;
		$sign = $sign + $bottom;
		$pdf->SetXY(10,$add+$sign);
		$pdf->Cell(190,4,'( Mrs. Asano Sekhose )',0,0,'R',0);
		$sign = $sign + $bottom;
		$pdf->SetXY(175,$add+$sign);
		$pdf->Cell(190,4,'Chairman',0,0,'L',0);
 	}
}

// FORWARDING FOR HSSLC(SCIENCE)
if($class=='12s' && $dist=="KOHIMA")
{
	$contents = 135;
	$sql=mysql_query("select * from c12s_pkChrt where district='$dist'");
	while($row=mysql_fetch_array($sql,MYSQL_ASSOC))
	{
		$pdf->AddPage();
		$inc = 7;
		//*************************************//
		//   SECOND LANGAUGE
		//*************************************//

		if(!empty($row['aon'])){ $tot1=1;} else {$tot1=0;}
		if(!empty($row['smi'])){ $tot2=1;} else {$tot2=0;}
		if(!empty($row['lta'])){ $tot3=1;} else {$tot3=0;}
		if(!empty($row['hnd'])){ $tot4=1;} else {$tot4=0;}
		if(!empty($row['bng'])){ $tot5=1;} else {$tot5=0;}
		if(!empty($row['alt'])){ $tot6=1;} else {$tot6=0;}
		if(!empty($row['tny'])){ $tot7=1;} else {$tot7=0;}
	
		//*************************************//
		//   6th subject
		//*************************************//
		if(!empty($row['eng'])){ $tot8=1;} else {$tot8=0;}
		if(!empty($row['phy'])){ $tot9=1;} else {$tot9=0;}
		if(!empty($row['bio'])){ $tot10=1;} else {$tot10=0;}
		if(!empty($row['evs'])){ $tot11=1;} else {$tot11=0;}
		if(!empty($row['che'])){ $tot12=1;} else {$tot12=0;}
		if(!empty($row['mat'])){ $tot13=1;} else {$tot13=0;}
		if(!empty($row['csc'])){ $tot14=1;} else {$tot14=0;}
		if(!empty($row['inf'])){ $tot15=1;} else {$tot15=0;}
		if(!empty($row['itv'])){ $tot16=1;} else {$tot16=0;}


		$tot=$tot1+$tot2+$tot3+$tot4+$tot5+$tot6+$tot7+$tot8+$tot9+$tot10+$tot11+$tot12+$tot13+$tot14+$tot15+$tot16;
		$not = mysql_query("select * from notification_tbl where class='12'");
		$get = mysql_fetch_array($not);
		$pdf->SetFont('Times','B',11);
		$pdf->SetXY(10,10);
		$pdf->Cell(190,4,'Confidential',0,0,'R',0);
		$pdf->SetXY(10,15);
		$pdf->Cell(190,4,'HSSLC ( Science Stream )',0,0,'R',0);
		$pdf->SetFont('Times','B',13);
		$pdf->SetXY(10,20);
		$pdf->Cell(190,4,'Nagaland Board of School Education',0,0,'C',0);
		$pdf->SetXY(10,25);
		$pdf->Cell(190,4,'Kohima',0,0,'C',0);
		$pdf->SetFont('Times','',12);
		$pdf->SetXY($left,30);
		$pdf->Cell(190,4,$get['noti_detail'],0,0,'L',0);
		$pdf->SetXY(132,30);
		$pdf->Cell(190,4,'Dated Kohima, the     ',0,0,'L',0);
		$pdf->SetFont('Times','',10);
		$pdf->SetXY(171,28);
		$pdf->Cell(190,4,$get['sup_script'],0,0,'L',0);
		$pdf->SetFont('Times','',12);
		$pdf->SetXY(175,30);
		$pdf->Cell(190,4,$get['noti_month_year'],0,0,'L',0);
		$pdf->SetXY($left,40);
		$pdf->Cell(190,4,'To,',0,0,'L',0);
		$pdf->SetXY(30,45);
		$pdf->Cell(190,4,'Dr/Mr/Ms_____________________________________________________',0,0,'L',0);
		$pdf->SetXY(30,50);
		$pdf->Cell(190,4,'Centre Superintendent,',0,0,'L',0);
		$pdf->SetXY(30,55);
		$pdf->Cell(190,4,'Centre :- ',0,0,'L',0);
		$pdf->SetFont('Times','B',12);
		$pdf->SetXY(47,55);
		$pdf->Cell(190,4,$row['centre'],0,0,'L',0);
		$pdf->SetFont('Times','',12);
		$pdf->SetXY($left,65);
		$pdf->Cell(190,4,'Subject:-',0,0,'L',0);
		$pdf->SetFont('Times','B',11);
		$pdf->SetXY(36,65);
		$pdf->Multicell(160,4,'Confidential papers of the Higher Secondary School Leaving Certificate Examination '.$year,0,'L',false);
		$pdf->SetFont('Times','',12);
		$pdf->SetXY($left,75);
		$pdf->Cell(190,4,'Sir/Madam,',0,0,'L',0);
		$pdf->SetXY(30,80);
		$pdf->Cell(190,4,'Kindly collect the packets on the specific dates for the HSSLC Examination '.$year.', to be held from',0,0,'L',0);
		$pdf->SetXY($left,85);
		$pdf->Cell(190,4,'                             at your centre. The numbers of question papers supplied are given below and you ',0,0,'L',0);
		$firstExam = mysql_query('select * from c12s_timetbl where sl=1');
		$firstExam = mysql_fetch_array($firstExam);
		$pdf->SetFont('Times','B',12);
		$pdf->SetXY($left+0,85);
		$pdf->Cell(190,4,$firstExam['e_date'],0,0,'L',0);
		$pdf->SetFont('Times','',12);
		$pdf->SetXY($left,90);
		$pdf->Cell(190,4,'are requested to confirm the numbers from the statement of candidates supplied to ensure that all the    ',0,0,'L',0);
		$pdf->SetXY($left,95);
		$pdf->Cell(190,4,'subjects and the required numbers issued to your centre are sufficient. You are also requested to read the  ',0,0,'L',0);
		$pdf->SetXY($left,100);
		$pdf->Cell(190,4,'necessary rules/instructions for the conduct of examinations.',0,0,'L',0);
		$pdf->SetFont('Times','B',12);
		$pdf->SetXY(40,120);
		$pdf->Cell(190,4,'Time: '.$Etime.'(Vocational Subjects: '.$Vtime.')',0,0,'L',0);
		$pdf->SetXY($left,125);
		$pdf->Cell(184,8,'Date',1,0,'L',0);
		$pdf->SetXY(60,125);
		$pdf->Cell(190,8,'Day',0,0,'L',0);
		$pdf->SetXY(90,125);
		$pdf->Cell(190,8,'Subject',0,0,'L',0);
		$pdf->SetXY(145,125);
		$pdf->Cell(190,8,'Number of question papers',0,0,'L',0);
		$sl=1;
		$ss=mysql_query("select * from c12s_timetbl where subcode!='' order by sl asc");
		while($rr=mysql_fetch_array($ss,MYSQL_ASSOC))
		{
			if($rr['subject']=='Mils')
			{
				$pdf->SetXY($left,$contents+$off);
				$pdf->Cell(190,4,$rr['e_date'],0,0,'L',0);
				$pdf->SetXY(60,$contents+$off);
				$pdf->Cell(190,4,$rr['day'],0,0,'L',0);
				$pdf->SetXY(95,$contents+$off);
				$pdf->Cell(190,4,'i.   Alternative English',0,0,'L',0);
				$pdf->SetXY($valAlign,$contents+$off);
				if(!empty($row['alt']))
				{
					$pdf->Cell(190,4,$row['alt'],0,0,'L',0);
				}
				else
				{
					$pdf->Cell(190,4,'____',0,0,'L',0);
				}
				$off=$off+$inc;
				$pdf->SetXY(95,$contents+$off);
				$pdf->Cell(190,4,'ii.  Ao',0,0,'L',0);
				$pdf->SetXY($valAlign,$contents+$off);
				if(!empty($row['aon']))
				{
					$pdf->Cell(190,4,$row['aon'],0,0,'L',0);
				}
				else
				{
					$pdf->Cell(190,4,'____',0,0,'L',0);
				}
				$off=$off+$inc;
				$pdf->SetXY(95,$contents+$off);
				$pdf->Cell(190,4,'iii. Bengali',0,0,'L',0);
				$pdf->SetXY($valAlign,$contents+$off);
				if(!empty($row['bng']))
				{
					$pdf->Cell(190,4,$row['bng'],0,0,'L',0);
				}
				else
				{
					$pdf->Cell(190,4,'____',0,0,'L',0);
				}
				$off=$off+$inc;
				$pdf->SetXY(95,$contents+$off);
				$pdf->Cell(190,4,'iv. Hindi',0,0,'L',0);
				$pdf->SetXY($valAlign,$contents+$off);
				if(!empty($row['hnd']))
				{
					$pdf->Cell(190,4,$row['hnd'],0,0,'L',0);
				}
				else
				{
					$pdf->Cell(190,4,'____',0,0,'L',0);
				}
				$off=$off+$inc;
				$pdf->SetXY(95,$contents+$off);
				$pdf->Cell(190,4,'v.  Lotha',0,0,'L',0);
				$pdf->SetXY($valAlign,$contents+$off);
				if(!empty($row['lta']))
				{
					$pdf->Cell(190,4,$row['lta'],0,0,'L',0);
				}
				else
				{
					$pdf->Cell(190,4,'____',0,0,'L',0);
				}
				$off=$off+$inc;
				$pdf->SetXY(95,$contents+$off);
				$sumi = iconv('UTF-8','windows-1252','vi. Sumi(Sütsah)');
				$pdf->Cell(190,4,$sumi,0,0,'L',0);
				$pdf->SetXY($valAlign,$contents+$off);
				if(!empty($row['smi']))
				{
					$pdf->Cell(190,4,$row['smi'],0,0,'L',0);
				}
				else
				{
					$pdf->Cell(190,4,'____',0,0,'L',0);
				}
				$off=$off+$inc;
				$pdf->SetXY(95,$contents+$off);
				$pdf->Cell(190,4,'vii.Tenyidie',0,0,'L',0);
				$pdf->SetXY($valAlign,$contents+$off);
				if(!empty($row['tny']))
				{
					$pdf->Cell(190,4,$row['tny'],0,0,'L',0);
				}
				else
				{
					$pdf->Cell(190,4,'____',0,0,'L',0);
				}
				$off=$off+$inc;
			}
			else if($rr['subject']!='' && $rr['e_date']!='')
			{
				$pdf->SetXY($left,$contents+$off);
				$val = $rr['e_date'];
				$pdf->Cell(190,4,$rr['e_date'],0,0,'L',0);
				$pdf->SetXY(60,$contents+$off);
				$pdf->Cell(190,4,$rr['day'],0,0,'L',0);
				$pdf->SetXY(90,$contents+$off);
				$pdf->Cell(190,4,$rr['subject'],0,0,'L',0);
				$pdf->SetXY($valAlign,$contents+$off);
				/*
				if($rr['subcode']=='eng'){$main='eng';}
				if($rr['subcode']=='phy'){$main='phy';}
				if($rr['subcode']=='bio'){$main='bio';}
				if($rr['subcode']=='evs'){$main='evs';}
				if($rr['subcode']=='che'){$main='che';}
				if($rr['subcode']=='mat'){$main='mat';}
				if($rr['subcode']=='csc'){$main='csc';}
				if($rr['subcode']=='inf'){$main='inf';}
				if($rr['subcode']=='itv'){$main='itv';}
				*/
				if(!empty($row[$rr['subcode']]))
				{
					$pdf->Cell(190,4,$row[$rr['subcode']],0,0,'L',0);
				}
				else
				{
					$pdf->Cell(190,4,'____',0,0,'L',0);
				}
				$off=$off+$inc;
			}
			else
			{
				$pdf->SetXY(90,$contents+$off);
				$pdf->Cell(190,4,$rr['subject'],0,0,'L',0);
				$pdf->SetXY($valAlign,$contents+$off);
				/*
				if($rr['subcode']=='eng'){$main='eng';}
				if($rr['subcode']=='phy'){$main='phy';}
				if($rr['subcode']=='bio'){$main='bio';}
				if($rr['subcode']=='evs'){$main='evs';}
				if($rr['subcode']=='che'){$main='che';}
				if($rr['subcode']=='mat'){$main='mat';}
				if($rr['subcode']=='csc'){$main='csc';}
				if($rr['subcode']=='inf'){$main='inf';}
				if($rr['subcode']=='itv'){$main='itv';}
				*/
				if(!empty($row[$rr['subcode']]))
				{
					$pdf->Cell(190,4,$row[$rr['subcode']],0,0,'L',0);
				}
				else
				{
					$pdf->Cell(190,4,'____',0,0,'L',0);
				}
				$off=$off+$inc;
			}
		}
		$sl++;$off=0;
		$sign =16; $bottom = 6;
		$pdf->SetFont('Times','',11);
		$pdf->SetXY(10,260+$sign);
		$pdf->Cell(190,4,'( Mrs. Asano Sekhose )',0,0,'R',0);
		$sign = $sign+$bottom;
		$pdf->SetXY(175,260+$sign);
		$pdf->Cell(190,4,'Chairman',0,0,'L',0);
		$sign = $sign+$bottom;
		$pdf->SetXY($left,260+$sign);
		$pdf->Cell(190,4,$get['noti_detail'],0,0,'L',0);
		$pdf->SetXY(132,260+$sign);
		$pdf->Cell(190,4,'Dated Kohima, the     ',0,0,'L',0);
		$pdf->SetFont('Times','',10);
		$pdf->SetXY(171,260+$sign-2);
		$pdf->Cell(190,4,$get['sup_script'],0,0,'L',0);
		$pdf->SetFont('Times','',12);
		$pdf->SetXY(175,260+$sign);
		$pdf->Cell(190,4,$get['noti_month_year'],0,0,'L',0);
		

		$sign = $sign+$bottom;
		$pdf->SetXY($left,270+$sign);
		$pdf->Cell(190,4,'Copy for information and necessary action :-',0,0,'L',0);
		$sign = $sign+$bottom;
		$pdf->SetXY(20,270+$sign);
		$pdf->Cell(190,4,'1.      Mr/Ms._________________________________________________',0,0,'L',0);
		$sign = $sign+$bottom;
		$pdf->SetXY(20,270+$sign);
		$pdf->Cell(190,4,'2.      Mr/Ms._________________________________________________',0,0,'L',0);
		$sign = $sign+$bottom;
		$pdf->SetXY(10,270+$sign);
		$pdf->Cell(190,4,'( Mrs. Asano Sekhose )',0,0,'R',0);
		$sign = $sign+$bottom;
		$pdf->SetXY(175,270+$sign);
		$pdf->Cell(190,4,'Chairman',0,0,'L',0);
	}
}

if($class=="12s" && $dist!="KOHIMA")
{
	$contents = 120;
	$inc = 7;
	$sql=mysql_query("select * from c12s_pkChrt where district='$dist'");
	while($row=mysql_fetch_array($sql,MYSQL_ASSOC))
	{
		$pdf->AddPage();
		//*************************************//
		//   SECOND LANGAUGE
		//*************************************//

		if(!empty($row['aon'])){ $tot1=1;} else {$tot1=0;}
		if(!empty($row['smi'])){ $tot2=1;} else {$tot2=0;}
		if(!empty($row['lta'])){ $tot3=1;} else {$tot3=0;}
		if(!empty($row['hnd'])){ $tot4=1;} else {$tot4=0;}
		if(!empty($row['bng'])){ $tot5=1;} else {$tot5=0;}
		if(!empty($row['alt'])){ $tot6=1;} else {$tot6=0;}
		if(!empty($row['tny'])){ $tot7=1;} else {$tot7=0;}
	
		//*************************************//
		//   6th subject
		//*************************************//
		if(!empty($row['eng'])){ $tot8=1;} else {$tot8=0;}
		if(!empty($row['phy'])){ $tot9=1;} else {$tot9=0;}
		if(!empty($row['bio'])){ $tot10=1;} else {$tot10=0;}
		if(!empty($row['evs'])){ $tot11=1;} else {$tot11=0;}
		if(!empty($row['che'])){ $tot12=1;} else {$tot12=0;}
		if(!empty($row['mat'])){ $tot13=1;} else {$tot13=0;}
		if(!empty($row['csc'])){ $tot14=1;} else {$tot14=0;}
		if(!empty($row['inf'])){ $tot15=1;} else {$tot15=0;}
		if(!empty($row['itv'])){ $tot16=1;} else {$tot16=0;}
		if(!empty($row['ttv'])){ $tot17=1;} else {$tot17=0;}
		$tot=$tot1+$tot2+$tot3+$tot4+$tot5+$tot6+$tot7+$tot8+$tot9+$tot10+$tot11+$tot12+$tot13+$tot14+$tot15+$tot16+$tot17;
		$not = mysql_query("select * from notification_tbl where class='12'");
		$get = mysql_fetch_array($not);
		$pdf->SetFont('Times','B',11);
		$pdf->SetXY(10,10);
		$pdf->Cell(190,4,'Confidential',0,0,'R',0);
		$pdf->SetXY(10,15);
		$pdf->Cell(190,4,'HSSLC ( Science Stream )',0,0,'R',0);
		$pdf->SetFont('Times','B',13);
		$pdf->SetXY(10,20);
		$pdf->Cell(190,4,'Nagaland Board of School Education',0,0,'C',0);
		$pdf->SetXY(10,25);
		$pdf->Cell(190,4,'Kohima',0,0,'C',0);
		$pdf->SetFont('Times','',12);
		$pdf->SetXY($left,30);
		$pdf->Cell(190,4,$get['noti_detail'],0,0,'L',0);
		$pdf->SetXY(132,30);
		$pdf->Cell(190,4,'Dated Kohima, the     ',0,0,'L',0);
		$pdf->SetFont('Times','',10);
		$pdf->SetXY(171,28);
		$pdf->Cell(190,4,$get['sup_script'],0,0,'L',0);
		$pdf->SetFont('Times','',12);
		$pdf->SetXY(175,30);
		$pdf->Cell(190,4,$get['noti_month_year'],0,0,'L',0);
		$pdf->SetXY($left,40);
		$pdf->Cell(190,4,'To,',0,0,'L',0);
		$pdf->SetXY(30,45);
		$pdf->Cell(190,4,'The Sr. Treasury Officer/Treasury Officer/Sub-Treasury Officer/',0,0,'L',0);
		$pdf->SetXY(30,50);
		$pdf->Cell(190,4,'Branch Manager,',0,0,'L',0);
		$pdf->SetXY(30,55);
		$pdf->Cell(190,4,'_________________________________________________________',0,0,'L',0);
		$pdf->SetXY($left,65);
		$pdf->Cell(190,4,'Subject:-',0,0,'L',0);
		$pdf->SetFont('Times','B',11);
		$pdf->SetXY(36,65);
		$pdf->Multicell(160,4,'Confidential papers of the Higher Secondary School Leaving Certificate Examination '.$year,0,'L',false);
		$pdf->SetFont('Times','',12);
		$pdf->SetXY($left,75);
		$pdf->Cell(190,4,'Sir/Madam,',0,0,'L',0);
		$pdf->SetXY(30,80);
		$pdf->Cell(190,4,'Please find herewith a packet which contains       sealed packets of confidential papers to be kept',0,0,'L',0);
		$pdf->SetXY($left,85);
		$pdf->Cell(190,4,'under your custody for the HSSLC Examination '.$year.' to be held from the                               as per the',0,0,'L',0);
		$pdf->SetFont('Times','B',12);
		$pdf->SetXY(108,80);
		$pdf->Cell(190,4,$tot,0,0,'L',0);
		$pdf->SetFont('Times','',12);
		$firstExam = mysql_query('select * from c12s_timetbl where sl=1');
		$firstExam = mysql_fetch_array($firstExam);
		$pdf->SetFont('Times','B',12);
		$pdf->SetXY($left+125,85);
		$pdf->Cell(190,4,$firstExam['e_date'],0,0,'L',0);
		$pdf->SetFont('Times','',12);
		$pdf->SetXY($left,90);
		$pdf->Cell(190,4,'routine given enclosed. Kindly issue the confidential packets to the concerned Centre Superintendent on the ',0,0,'L',0);
		$pdf->SetXY($left,95);
		$pdf->Cell(190,4,'date shown below at the appointed time against each subject:',0,0,'L',0);
		$pdf->SetFont('Times','B',12);
		$pdf->SetXY(40,105);
		$pdf->Cell(190,4,'Time: '.$Etime.'(Vocational Subjects: '.$Vtime.')',0,0,'L',0);
		$pdf->SetXY($left,110);
		$pdf->Cell(184,8,'Date',1,0,'L',0);
		$pdf->SetXY(60,110);
		$pdf->Cell(190,8,'Day',0,0,'L',0);
		$pdf->SetXY(90,110);
		$pdf->Cell(190,8,'Subject',0,0,'L',0);
		$pdf->SetXY(145,110);
		$pdf->Cell(190,8,'Number of question papers',0,0,'L',0);
		$sl=1;
		$ss=mysql_query("select * from c12s_timetbl where subcode!='' order by sl asc");
		while($rr=mysql_fetch_array($ss,MYSQL_ASSOC))
		{
			if($rr['subject']=='Mils')
			{
				$pdf->SetXY($left,$contents+$off);
				$pdf->Cell(190,4,$rr['e_date'],0,0,'L',0);
				$pdf->SetXY(60,$contents+$off);
				$pdf->Cell(190,4,$rr['day'],0,0,'L',0);
				$pdf->SetXY(95,$contents+$off);
				$pdf->Cell(190,4,'i.   Alternative English',0,0,'L',0);
				$pdf->SetXY($valAlign,$contents+$off);
				if(!empty($row['alt']))
				{
					$pdf->Cell(190,4,$row['alt'],0,0,'L',0);
				}
				else
				{
					$pdf->Cell(190,4,'____',0,0,'L',0);
				}
				$off=$off+$inc;
				$pdf->SetXY(95,$contents+$off);
				$pdf->Cell(190,4,'ii.  Ao',0,0,'L',0);
				$pdf->SetXY($valAlign,$contents+$off);
				if(!empty($row['aon']))
				{
					$pdf->Cell(190,4,$row['aon'],0,0,'L',0);
				}
				else
				{
					$pdf->Cell(190,4,'____',0,0,'L',0);
				}
				$off=$off+$inc;
				$pdf->SetXY(95,$contents+$off);
				$pdf->Cell(190,4,'iii. Bengali',0,0,'L',0);
				$pdf->SetXY($valAlign,$contents+$off);
				if(!empty($row['bng']))
				{
					$pdf->Cell(190,4,$row['bng'],0,0,'L',0);
				}
				else
				{
					$pdf->Cell(190,4,'____',0,0,'L',0);
				}
				$off=$off+$inc;
				$pdf->SetXY(95,$contents+$off);
				$pdf->Cell(190,4,'iv. Hindi',0,0,'L',0);
				$pdf->SetXY($valAlign,$contents+$off);
				if(!empty($row['hnd']))
				{
					$pdf->Cell(190,4,$row['hnd'],0,0,'L',0);
				}
				else
				{
					$pdf->Cell(190,4,'____',0,0,'L',0);
				}
				$off=$off+$inc;
				$pdf->SetXY(95,$contents+$off);
				$pdf->Cell(190,4,'v.  Lotha',0,0,'L',0);
				$pdf->SetXY($valAlign,$contents+$off);
				if(!empty($row['lta']))
				{
					$pdf->Cell(190,4,$row['lta'],0,0,'L',0);
				}
				else
				{
					$pdf->Cell(190,4,'____',0,0,'L',0);
				}
				$off=$off+$inc;
				$pdf->SetXY(95,$contents+$off);
				$sumi = iconv('UTF-8','windows-1252','vi. Sumi(Sütsah)');
				$pdf->Cell(190,4,$sumi,0,0,'L',0);
				$pdf->SetXY($valAlign,$contents+$off);
				if(!empty($row['smi']))
				{
					$pdf->Cell(190,4,$row['smi'],0,0,'L',0);
				}
				else
				{
					$pdf->Cell(190,4,'____',0,0,'L',0);
				}
				$off=$off+$inc;
				$pdf->SetXY(95,$contents+$off);
				$pdf->Cell(190,4,'vii.Tenyidie',0,0,'L',0);
				$pdf->SetXY($valAlign,$contents+$off);
				if(!empty($row['tny']))
				{
					$pdf->Cell(190,4,$row['tny'],0,0,'L',0);
				}
				else
				{
					$pdf->Cell(190,4,'____',0,0,'L',0);
				}
				$off=$off+$inc;
			}
			else if($rr['subject']!='' && $rr['e_date']!='')
			{
				$pdf->SetXY($left,$contents+$off);
				$val = $rr['e_date'];
				$pdf->Cell(190,4,$rr['e_date'],0,0,'L',0);
				$pdf->SetXY(60,$contents+$off);
				$pdf->Cell(190,4,$rr['day'],0,0,'L',0);
				$pdf->SetXY(90,$contents+$off);
				$pdf->Cell(190,4,$rr['subject'],0,0,'L',0);
				$pdf->SetXY($valAlign,$contents+$off);
				/*
				if($rr['subcode']=='eng'){$main='eng';}
				if($rr['subcode']=='phy'){$main='phy';}
				if($rr['subcode']=='bio'){$main='bio';}
				if($rr['subcode']=='evs'){$main='evs';}
				if($rr['subcode']=='che'){$main='che';}
				if($rr['subcode']=='mat'){$main='mat';}
				if($rr['subcode']=='csc'){$main='csc';}
				if($rr['subcode']=='inf'){$main='inf';}
				if($rr['subcode']=='itv'){$main='itv';}
				*/
				if(!empty($row[$rr['subcode']]))
				{
					$pdf->Cell(190,4,$row[$rr['subcode']],0,0,'L',0);
				}
				else
				{
					$pdf->Cell(190,4,'____',0,0,'L',0);
				}
				$off=$off+$inc;
			}
			else
			{
				$pdf->SetXY(90,$contents+$off);
				$pdf->Cell(190,4,$rr['subject'],0,0,'L',0);
				$pdf->SetXY($valAlign,$contents+$off);
				/*
				if($rr['subcode']=='eng'){$main='eng';}
				if($rr['subcode']=='phy'){$main='phy';}
				if($rr['subcode']=='bio'){$main='bio';}
				if($rr['subcode']=='evs'){$main='evs';}
				if($rr['subcode']=='che'){$main='che';}
				if($rr['subcode']=='mat'){$main='mat';}
				if($rr['subcode']=='csc'){$main='csc';}
				if($rr['subcode']=='inf'){$main='inf';}
				if($rr['subcode']=='itv'){$main='itv';}
				*/
				if(!empty($row[$rr['subcode']]))
				{
					$pdf->Cell(190,4,$row[$rr['subcode']],0,0,'L',0);
				}
				else
				{
					$pdf->Cell(190,4,'____',0,0,'L',0);
				}
				$off=$off+$inc;
			}
		}
		$sl++;$off=0;$sign =16; $bottom = 6; $add = 240;
		$pdf->SetFont('Times','',11);
		$pdf->SetXY(10,235+$sign);
		$pdf->Cell(190,4,'( Mrs. Asano Sekhose )',0,0,'R',0);
		$sign = $sign + 4;
		$pdf->SetXY(175,235+$sign);
		$pdf->Cell(190,4,'Chairman',0,0,'L',0);
		$sign = $sign + $bottom;
		$pdf->SetXY($left,235+$sign);
		$pdf->Cell(190,4,$get['noti_detail'],0,0,'L',0);
		$pdf->SetXY(132,235+$sign);
		$pdf->Cell(190,4,'Dated Kohima, the     ',0,0,'L',0);
		$pdf->SetFont('Times','',10);
		$pdf->SetXY(171,235+$sign-2);
		$pdf->Cell(190,4,$get['sup_script'],0,0,'L',0);
		$pdf->SetFont('Times','',12);
		$pdf->SetXY(175,235+$sign);
		$pdf->Cell(190,4,$get['noti_month_year'],0,0,'L',0);


		$sign = $sign + $bottom;
		$pdf->SetXY($left,$add+$sign);
		$pdf->Cell(190,4,'Copy to :-',0,0,'L',0);
		$sign = $sign + $bottom;
		$pdf->SetXY(20,$add+$sign);
		$pdf->Cell(190,4,'1.      The Deputy Commissioner/Additional Deputy Commissioner/S.D.O(Civil),',0,0,'L',0);
		$sign = $sign + $bottom;
		$pdf->SetXY(20,$add+$sign);
		$pdf->Cell(190,4,'        __________________________________________ for information and necessary action.',0,0,'L',0);
		$sign = $sign + $bottom;
		$pdf->SetXY(20,$add+$sign);
		$pdf->Cell(190,4,'2.      Dr/Mr/Ms ____________________________________________ Centre Superintendent of',0,0,'L',0);
		$sign = $sign + $bottom;
		$pdf->SetXY(20,$add+$sign);
		$pdf->SetFont('Times','B',12);
		$pdf->Cell(190,4,'        '.$row['centre'],0,0,'L',0);
		$pdf->SetFont('Times','',12);
		$sign = $sign + $bottom;
		$pdf->SetXY(20,$add+$sign);
		$pdf->Cell(190,2,'        You are requested to confirm that the number of question papers of the different subjects supplied',0,0,'L',0);
		$sign = $sign + 4;
		$pdf->SetXY(20,$add+$sign);
		$pdf->Cell(190,2,'        for your centre is sufficient,read and follow the rules/instructions for the conduct  of examination.',0,0,'L',0);
		$sign = $sign + $bottom;
		$pdf->SetXY(20,$add+$sign);
		$pdf->Cell(190,4,'3.      Office copy.',0,0,'L',0);
		$sign = $sign + $bottom;
		$sign = $sign + $bottom;
		$pdf->SetXY(10,$add+$sign);
		$pdf->Cell(190,4,'( Mrs. Asano Sekhose )',0,0,'R',0);
		$sign = $sign + $bottom;
		$pdf->SetXY(175,$add+$sign);
		$pdf->Cell(190,4,'Chairman',0,0,'L',0);
	}
}

$pdf->Output();
?>