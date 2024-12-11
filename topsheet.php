<?php
require("dbconn.php");
$dist=$_POST['nbseDistrict'];
$sub=$_POST['sub'];
$class = $_POST['class'];
$exam = $_POST['exam'];

include('fpdf/fpdf.php');
//$display_date = date('Y');

$yr=mysql_query("select * from year");
$yr=mysql_fetch_array($yr);
$display_date = $yr['year'];
$font='26';
//if($class=='9')
//{

if($class=='9'){$class1=9;}
if($class=='10'){$class1=10;}
if($class=='11a'||$class=='11c'||$class=='11s'){$class1=11;}
if($class=='12a'||$class=='12c'||$class=='12s'){$class1=12;}
$findEtime = mysql_query("select * from timing_tbl where class=$class1");
$findEtime = mysql_fetch_array($findEtime);
$Etime = $findEtime['exam_time'];
$Vtime = $findEtime['voc_time'];
if($exam=='Main')
{
	$subjectHSLC = "High School Leaving Certificate Examination ";
	$subjectHSSLC = "HSSLC Examination ";
}
else
{
	$subjectHSLC = "HSLC Compartmental & Improvement Examination ";
	$subjectHSSLC = "HSSLC Compartmental & Improvement Examination ";
}
//}
// CLASS 9
if($class=='9')
{
	$tableName	=	"c9_pkChrt_16";$timetbl = "c9_timetbl";
	if($sub=="MATHEMATICS" || $sub=="ENGLISH" || $sub=="SOCIAL SCIENCES" )
	{
		$query1 = mysql_query("select * from $timetbl where subject = '$sub'");
		$find = mysql_fetch_array($query1);$date=$find['e_date'];
		//$time='10:00 a.m. to 1:00 p.m.';
		$flag=0;
		$offset=149;
		$pdf= new FPDF('P','mm','a4');
		$pdf->SetFont('Times','',12);
		$r=mysql_query("select * from $tableName where district='$dist' and main>0 ") or die(mysql_error());
	while($row=mysql_fetch_array($r,MYSQL_ASSOC))
	{
		if($flag==0)
		{
			$pdf->AddPage();
			$pdf->SetFont('Times','B',14);
			$pdf->SetXY(10,20);
			$pdf->Cell(190,4,$row['district'],0,0,'L',0);
			$pdf->SetXY(170,20);
			$pdf->Cell(190,4,"Confidential",0,0,'L',0);
			$pdf->SetFont('Times','B',14);
			$pdf->SetXY(63,30);
			$pdf->Cell(190,4,'Nagaland Board of School Education',0,0,'L',0);
			$pdf->Ln();
			$pdf->Cell(190,8,'Kohima',0,0,'C',0);
			$pdf->Ln();
			$pdf->SetFont('Times','B',17);
			$pdf->Cell(190,8,'Class - IX Final Examination'.$display_date,0,0,'C',0);
			$pdf->SetFont('Times','B',$font);
			$pdf->SetXY(20,40);
			//$pdf->Cell(190,12,$row['sl'],0,0,'L',0);
			$pdf->Ln();
			$pdf->Ln();
			$pdf->SetFont('Times','',12);
			$pdf->SetXY(10,57);
			$pdf->Cell(190,10,'Date of examination :    	
                                                                  Time : ',0,0,'L',0);
			$pdf->SetFont('Times','B',15);
			$pdf->SetXY(50,57);
			$pdf->Cell(190,10,$date,0,0,'L',0);
			$pdf->SetXY(140,57);
			$pdf->Cell(190,10,$Etime,0,0,'L',0);
			$pdf->SetFont('Times','',12);
			$pdf->SetXY(10,65);
			$pdf->Cell(190,12,'Subject:                                                                                               Copies of question papers enclosed: ',0,0,'L',0);
			$pdf->SetFont('Times','B',16);
			$pdf->SetXY(25,65);
			$pdf->Cell(190,12,$sub,0,0,'L',0);
			$pdf->SetXY(186,65);
			$pdf->Cell(190,12,$row['main'],0,0,'L',0);
			$pdf->SetFont('Times','',12);
			$pdf->Ln();
	
			$pdf->Cell(10,8,'.......................................................                                                             .......................................................',0,0,'L',0);

			$pdf->Ln();
			$pdf->Cell(10,8,'                  counted by                                                                                                verified & packed by',0,0,'L',0);

			$pdf->Ln();
			$pdf->Cell(10,8,'Name of the School/Centre  ',0,0,'L',0);
			$pdf->SetFont('Times','B',16);
			$pdf->SetXY(60,92);
			//$schoolName = iconv('UTF-8','windows-1252',$row['school']);
			$pdf->Cell(10,8,$row['school'],0,0,'L',0);
			$pdf->Ln();
			$pdf->Ln();
			$pdf->Image('aaa.gif',115,105,70,15);
			$pdf->Ln();

			$pdf->Cell(10,8,'                                                                           Controller of Examinations',0,0,'L',0);
			$pdf->SetXY(10,145);
			$pdf->Cell(10,8,'-------------------------------------------------------------------------------------------------',0,0,'L',0);
			$flag=1;
	
		}
		else
		{
			$pdf->SetFont('Times','B',14);
			$pdf->SetXY(10,20+$offset);
			$pdf->Cell(190,4,$row['district'],0,0,'L',0);
			$pdf->SetXY(170,20+$offset);
			$pdf->Cell(190,4,"Confidential",0,0,'L',0);
			$pdf->SetFont('Times','B',14);
			$pdf->SetXY(63,30+$offset);
			$pdf->Cell(190,4,'Nagaland Board of School Education',0,0,'L',0);
			$pdf->Ln();
			$pdf->Cell(190,8,'Kohima',0,0,'C',0);
			$pdf->Ln();
			$pdf->SetFont('Times','B',17);
			$pdf->Cell(190,8,'Class - IX Final Examination'.$display_date,0,0,'C',0);
			$pdf->SetFont('Times','B',$font);
			$pdf->SetXY(20,40+$offset);
			//$pdf->Cell(190,12,$row['sl'],0,0,'L',0);
			$pdf->Ln();
			$pdf->Ln();
			$pdf->SetFont('Times','',12);
			$pdf->SetXY(10,57+$offset);
			$pdf->Cell(190,10,'Date of examination :    	
                                                                  Time : ',0,0,'L',0);
			$pdf->SetFont('Times','B',15);
			$pdf->SetXY(50,57+$offset);
			$pdf->Cell(190,10,$date,0,0,'L',0);
			$pdf->SetXY(140,57+$offset);
			$pdf->Cell(190,10,$Etime,0,0,'L',0);
			$pdf->SetFont('Times','',12);
			$pdf->SetXY(10,65+$offset);
			$pdf->Cell(190,12,'Subject:                                                                                               Copies of question papers enclosed: ',0,0,'L',0);
			$pdf->SetFont('Times','B',16);
			$pdf->SetXY(25,65+$offset);
			$pdf->Cell(190,12,$sub,0,0,'L',0);
			$pdf->SetXY(186,65+$offset);
			$pdf->Cell(190,12,$row["main"],0,0,'L',0);
			$pdf->SetFont('Times','',12);
			$pdf->Ln();
			$pdf->Cell(10,8,'.......................................................                                                             .......................................................',0,0,'L',0);

			$pdf->Ln();
			$pdf->Cell(10,8,'                  counted by                                                                                                verified & packed by',0,0,'L',0);
			$pdf->Ln();
			$pdf->Cell(10,8,'Name of the School/Centre  ',0,0,'L',0);
			$pdf->SetFont('Times','B',16);
			$pdf->SetXY(60,92+$offset);
			$pdf->Cell(10,8,$row['school'],0,0,'L',0);
			$pdf->Ln();
			$pdf->Ln();
			$pdf->Image('aaa.gif',115,105+$offset,70,15);
			$pdf->Ln();
			$pdf->Cell(10,8,'                                                                           Controller of Examinations',0,0,'L',0);
			$flag=0;
	
		}
	}
	} 
	else if($sub=="tny" || $sub=="smi" || $sub=="aon" || $sub=="lta" || $sub=="bng" || $sub=="alt" || $sub=="hnd")
	{
		$sub1="MILS";//$date='3rd December 2016';
		$query1 = mysql_query("select * from $timetbl where subject like '%$sub1%'");
		$find = mysql_fetch_array($query1);$date=$find['e_date'];
	
		$r=mysql_query("select * from $tableName where district='$dist' and $sub>0 ") or die(mysql_error());
		if($sub=='tny'){ $sub="TENYIDIE";  $sub2='tny';}
		if($sub=='aon'){ $sub="AO";  $sub2='aon';}
		if($sub=='hnd'){ $sub="HINDI";  $sub2='hnd';}
		if($sub=='lta'){ $sub="LOTHA";  $sub2='lta';}
		if($sub=='bng'){ $sub="BENGALI";  $sub2='bng';}
		if($sub=='alt'){ $sub="Alternative English"; $sub2='alt'; }
		if($sub=='smi'){ $sub="SUMI(Sütsah)";  $sub2='smi';}
		//$time='10:00 a.m. to 1:00 p.m.';
		$flag=0;
		$offset=149;
		$pdf= new FPDF('P','mm','a4');
		$pdf->SetFont('Times','',12);
		while($row=mysql_fetch_array($r,MYSQL_ASSOC))
		{
			if($flag==0)
			{
				$pdf->AddPage();
				$pdf->SetFont('Times','B',14);
				$pdf->SetXY(10,20);
				$pdf->Cell(190,4,$row['district'],0,0,'L',0);
				$pdf->SetXY(170,20);
				$pdf->Cell(190,4,"Confidential",0,0,'L',0);
				$pdf->SetXY(63,30);
				$pdf->Cell(190,4,'Nagaland Board of School Education',0,0,'L',0);
				$pdf->Ln();
				$pdf->Cell(190,8,'Kohima',0,0,'C',0);
				$pdf->Ln();
				$pdf->SetFont('Times','B',17);
				$pdf->Cell(190,8,'Class - IX Final Examination'.$display_date,0,0,'C',0);
				$pdf->SetFont('Times','B',$font);
				$pdf->SetFont('Times','B',$font);
				$pdf->SetXY(20,40);
				//$pdf->Cell(190,12,$row['sl'],0,0,'L',0);
				$pdf->Ln();
				$pdf->Ln();
				$pdf->SetFont('Times','',12);
				$pdf->SetXY(10,57);
				$pdf->Cell(190,10,'Date of examination :    	
                                                                    Time : ',0,0,'L',0);
				$pdf->SetFont('Times','B',15);
				$pdf->SetXY(50,57);
				$pdf->Cell(190,10,$date,0,0,'L',0);
				$pdf->SetXY(140,57);
				$pdf->Cell(190,10,$Etime,0,0,'L',0);
				$pdf->SetFont('Times','',12);
				$pdf->SetXY(10,65);
				$pdf->Cell(190,12,'Subject:                                                                                               Copies of question papers enclosed: ',0,0,'L',0);
				$pdf->SetFont('Times','B',16);
				$pdf->SetXY(25,65);
				$pdf->Cell(190,12,iconv('UTF-8','windows-1252',$sub),0,0,'L',0);
				$pdf->SetXY(186,65);
				$pdf->Cell(190,12,$row[$sub2],0,0,'L',0);
				$pdf->SetFont('Times','',12);
				$pdf->Ln();
	
				$pdf->Cell(10,8,'.......................................................                                                             .......................................................',0,0,'L',0);

				$pdf->Ln();
				$pdf->Cell(10,8,'                  counted by                                                                                                verified & packed by',0,0,'L',0);

				$pdf->Ln();
				$pdf->Cell(10,8,'Name of the School/Centre  ',0,0,'L',0);
				$pdf->SetFont('Times','B',16);
				$pdf->SetXY(60,92);
				$pdf->Cell(10,8,$row['school'],0,0,'L',0);
				$pdf->Ln();
				$pdf->Ln();

				$pdf->Image('aaa.gif',115,105,70,15);
				$pdf->Ln();

				$pdf->Cell(10,8,'                                                                           Controller of Examinations',0,0,'L',0);
				$pdf->SetXY(10,145);
				$pdf->Cell(10,8,'-------------------------------------------------------------------------------------------------',0,0,'L',0);

				$flag=1;
	
			}
			else
			{
				$pdf->SetFont('Times','B',14);
				$pdf->SetXY(10,20+$offset);
				$pdf->Cell(190,4,$row['district'],0,0,'L',0);
				$pdf->SetXY(170,20+$offset);
				$pdf->Cell(190,4,"Confidential",0,0,'L',0);
				$pdf->SetXY(63,30+$offset);
				$pdf->Cell(190,4,'Nagaland Board of School Education',0,0,'L',0);
				$pdf->Ln();
				$pdf->Cell(190,8,'Kohima',0,0,'C',0);
				$pdf->Ln();
				$pdf->SetFont('Times','B',17);
				$pdf->Cell(190,8,'Class - IX Final Examination'.$display_date,0,0,'C',0);
				$pdf->SetFont('Times','B',$font);
				$pdf->SetXY(20,40+$offset);
				//$pdf->Cell(190,12,$row['sl'],0,0,'L',0);
				$pdf->Ln();
				$pdf->Ln();
				$pdf->SetFont('Times','',12);
				$pdf->SetXY(10,57+$offset);
				$pdf->Cell(190,10,'Date of examination :    	
			                                                                     Time : ',0,0,'L',0);
				$pdf->SetFont('Times','B',15);
				$pdf->SetXY(50,57+$offset);
				$pdf->Cell(190,10,$date,0,0,'L',0);
				$pdf->SetXY(140,57+$offset);
				$pdf->Cell(190,10,$Etime,0,0,'L',0);

				$pdf->SetFont('Times','',12);

				$pdf->SetXY(10,65+$offset);
				$pdf->Cell(190,12,'Subject:                                                                                               Copies of question papers enclosed: ',0,0,'L',0);
				$pdf->SetFont('Times','B',16);
				$pdf->SetXY(25,65+$offset);
				$pdf->Cell(190,12,iconv('UTF-8','windows-1252',$sub),0,0,'L',0);
				$pdf->SetXY(186,65+$offset);
				$pdf->Cell(190,12,$row[$sub2],0,0,'L',0);
				$pdf->SetFont('Times','',12);
				$pdf->Ln();
	
				$pdf->Cell(10,8,'.......................................................                                                             .......................................................',0,0,'L',0);

				$pdf->Ln();
				$pdf->Cell(10,8,'                  counted by                                                                                                verified & packed by',0,0,'L',0);

				$pdf->Ln();
				$pdf->Cell(10,8,'Name of the School/Centre  ',0,0,'L',0);
				$pdf->SetFont('Times','B',16);
				$pdf->SetXY(60,92+$offset);
				$pdf->Cell(10,8,$row['school'],0,0,'L',0);
				$pdf->Ln();
				$pdf->Ln();

				$pdf->Image('aaa.gif',115,105+$offset,70,15);
				$pdf->Ln();

				$pdf->Cell(10,8,'                                                                           Controller of Examinations',0,0,'L',0);


				$flag=0;
	
			}

		}
	}

	else if($sub=="fit" || $sub=="hs" || $sub=="bk" || $sub=="ms" || $sub=="ee" || $sub=="iv" || $sub=="tt" || $sub=="rt" || $sub=="hv" || $sub=="et" || $sub=="bw" || $sub=="mc" || $sub=="av" || $sub=="at")
	{
		$sub1="6th";//$date='6th December 2016';
		$query1 = mysql_query("select * from $timetbl where subject like '%$sub1%'");
		$find = mysql_fetch_array($query1);$date=$find['e_date'];
		
		$r=mysql_query("select * from $tableName where district='$dist' and $sub>0 ") or die(mysql_error());
		if($sub=='fit'){ $sub="Foundation of Information Technology"; $time=$Etime; $sub2='fit';}
		if($sub=='hs'){ $sub="Home Science";  $time=$Etime;$sub2='hs';}
		if($sub=='bk'){ $sub="BK & Accountancy";  $time=$Etime;$sub2='bk';}
		if($sub=='ms'){ $sub="Music";  $time=$Etime;$sub2='ms';}
		if($sub=='ee'){ $sub="Environmental Education"; $time=$Etime; $sub2='ee';}
		if($sub=='iv'){ $sub="ITeS"; $time=$Vtime; $sub2='iv';}
		if($sub=='tt'){ $sub="Travel & Tourism"; $time=$Vtime; $sub2='tt';}
		if($sub=='rt'){ $sub="Retail"; $time=$Vtime; $sub2='rt';}
		if($sub=='hv'){ $sub="Health Care"; $time=$Vtime; $sub2='hv';}
		if($sub=='et'){ $sub="Electrical Technology"; $time=$Vtime; $sub2='et';}
		if($sub=='bw'){ $sub="Beauty & Wellness"; $time=$Vtime; $sub2='bw';}
		if($sub=='mc'){ $sub="MultiSkill Foundation Course"; $time=$Vtime; $sub2='mc';}
		if($sub=='av'){ $sub="Agriculture"; $time=$Vtime; $sub2='av';}
		if($sub=='at'){ $sub="Automotive"; $time=$Vtime; $sub2='at';}

		$flag=0;
		$offset=149;
		$pdf= new FPDF('P','mm','a4');
		$pdf->SetFont('Times','',12);
			while($row=mysql_fetch_array($r,MYSQL_ASSOC))
			{
				if($flag==0)
				{
					$pdf->AddPage();
					$pdf->SetFont('Times','B',14);
					$pdf->SetXY(10,20);
					$pdf->Cell(190,4,$row['district'],0,0,'L',0);
					$pdf->SetXY(170,20);
					$pdf->Cell(190,4,"Confidential",0,0,'L',0);
					$pdf->SetXY(63,30);
					$pdf->Cell(190,4,'Nagaland Board of School Education',0,0,'L',0);
					$pdf->Ln();
					$pdf->Cell(190,8,'Kohima',0,0,'C',0);
					$pdf->Ln();
					$pdf->SetFont('Times','B',17);
					$pdf->Cell(190,8,'Class - IX Final Examination'.$display_date,0,0,'C',0);
					$pdf->SetFont('Times','B',$font);
					$pdf->SetFont('Times','B',$font);
					$pdf->SetXY(20,40);
					//$pdf->Cell(190,12,$row['sl'],0,0,'L',0);
					$pdf->Ln();
					$pdf->Ln();
					$pdf->SetFont('Times','',12);
					$pdf->SetXY(10,57);
					$pdf->Cell(190,10,'Date of examination :    	
				                                                                    Time : ',0,0,'L',0);
					$pdf->SetFont('Times','B',15);
					$pdf->SetXY(50,57);
					$pdf->Cell(190,10,$date,0,0,'L',0);
					$pdf->SetXY(140,57);
					$pdf->Cell(190,10,$time,0,0,'L',0);

					$pdf->SetFont('Times','',12);

					$pdf->SetXY(10,65);
					$pdf->Cell(190,12,'Subject:                                                                                               Copies of question papers enclosed: ',0,0,'L',0);
					$pdf->SetFont('Times','B',16);
					$pdf->SetXY(25,65);
					$pdf->Cell(190,12,$sub,0,0,'L',0);
					$pdf->SetXY(186,65);
					$pdf->Cell(190,12,$row[$sub2],0,0,'L',0);
					$pdf->SetFont('Times','',12);
					$pdf->Ln();
	
					$pdf->Cell(10,8,'.......................................................                                                             .......................................................',0,0,'L',0);

					$pdf->Ln();
					$pdf->Cell(10,8,'                  counted by                                                                                                verified & packed by',0,0,'L',0);

					$pdf->Ln();
					$pdf->Cell(10,8,'Name of the School/Centre  ',0,0,'L',0);
					$pdf->SetFont('Times','B',16);
					$pdf->SetXY(60,92);
					$pdf->Cell(10,8,$row['school'],0,0,'L',0);
					$pdf->Ln();
					$pdf->Ln();

					$pdf->Image('aaa.gif',115,105,70,15);
					$pdf->Ln();

					$pdf->Cell(10,8,'                                                                           Controller of Examinations',0,0,'L',0);
					$pdf->SetXY(10,145);
					$pdf->Cell(10,8,'-------------------------------------------------------------------------------------------------',0,0,'L',0);

					$flag=1;
	
				}
				else
				{
					$pdf->SetFont('Times','B',14);
					$pdf->SetXY(10,20+$offset);
					$pdf->Cell(190,4,$row['district'],0,0,'L',0);
					$pdf->SetXY(170,20+$offset);
					$pdf->Cell(190,4,"Confidential",0,0,'L',0);
					$pdf->SetXY(63,30+$offset);
					$pdf->Cell(190,4,'Nagaland Board of School Education',0,0,'L',0);
					$pdf->Ln();
					$pdf->Cell(190,8,'Kohima',0,0,'C',0);
					$pdf->Ln();
					$pdf->SetFont('Times','B',17);
					$pdf->Cell(190,8,'Class - IX Final Examination'.$display_date,0,0,'C',0);
					$pdf->SetFont('Times','B',$font);
					$pdf->SetXY(20,40+$offset);
					//$pdf->Cell(190,12,$row['sl'],0,0,'L',0);
					$pdf->Ln();
					$pdf->Ln();
					$pdf->SetFont('Times','',12);
					$pdf->SetXY(10,57+$offset);
					$pdf->Cell(190,10,'Date of examination :    	
				                                                                     Time : ',0,0,'L',0);
					$pdf->SetFont('Times','B',15);
					$pdf->SetXY(50,57+$offset);
					$pdf->Cell(190,10,$date,0,0,'L',0);
					$pdf->SetXY(140,57+$offset);
					$pdf->Cell(190,10,$time,0,0,'L',0);

					$pdf->SetFont('Times','',12);

					$pdf->SetXY(10,65+$offset);
					$pdf->Cell(190,12,'Subject:                                                                                               Copies of question papers enclosed: ',0,0,'L',0);
					$pdf->SetFont('Times','B',16);
					$pdf->SetXY(25,65+$offset);
					$pdf->Cell(190,12,$sub,0,0,'L',0);
					$pdf->SetXY(186,65+$offset);
					$pdf->Cell(190,12,$row[$sub2],0,0,'L',0);
					$pdf->SetFont('Times','',12);
					$pdf->Ln();
	
					$pdf->Cell(10,8,'.......................................................                                                             .......................................................',0,0,'L',0);

					$pdf->Ln();
					$pdf->Cell(10,8,'                  counted by                                                                                                verified & packed by',0,0,'L',0);

					$pdf->Ln();
					$pdf->Cell(10,8,'Name of the School/Centre  ',0,0,'L',0);
					$pdf->SetFont('Times','B',16);
					$pdf->SetXY(60,92+$offset);
					$pdf->Cell(10,8,$row['school'],0,0,'L',0);
					$pdf->Ln();
					$pdf->Ln();

					$pdf->Image('aaa.gif',115,105+$offset,70,15);
					$pdf->Ln();

					$pdf->Cell(10,8,'                                                                           Controller of Examinations',0,0,'L',0);

					$flag=0;
				}
			}
	}
}

// CLASS 10
if($class=='10')
{
	$subA='';
	$tableName	=	"c10_pkchrt_16";
	if($sub=="MATHEMATICS A" || $sub=="MATHEMATICS B" || $sub=="ENGLISH" || $sub=="SOCIAL SCIENCES" || $sub=="SCIENCE" )
	{
		if($sub=="MATHEMATICS A")
		{
			$sub="Mathematics";
			$main='mata';
		}
		if($sub=="MATHEMATICS B")
		{
			$sub="Mathematics";
			$main='matb';
		}
		if($sub=="ENGLISH")
		{
			//$subA=="English";
			$main='eng';
		}
		if($sub=="SOCIAL SCIENCES")
		{
			//$subA=="Social Sciences";
			$main='ss';
		}
		if($sub=="SCIENCE")
		{
			//$subA=="Science";
			$main='sc';
		}
	$query1 = mysql_query("select * from c10_timetbl where subject like '$sub%'");
	$find = mysql_fetch_array($query1);
	$date=$find['e_date'];
	
	//if($sub=='ENGLISH') $date= "30th November 2017"; 
	//if($sub=='SCIENCE') $date= "27th November 2017";
	//if($sub=='MATHEMATICS') $date= "29th November 2017";
	//if($sub=='SOCIAL SCIENCES') $date= "4th December 2017";
	//$time='9:00 a.m. to 12:00 noon';
	$flag=0;
	$offset=149;
	$pdf= new FPDF('P','mm','a4');
	$pdf->SetFont('Times','',12);

	$r=mysql_query("select * from $tableName where district='$dist' and $main>0 ") or die(mysql_error());
	while($row=mysql_fetch_array($r,MYSQL_ASSOC))
	{
		if($flag==0)
		{
			if($row['district']=='Vistse'){$var='Kohima';}else {$var=$row['district'];}
			$pdf->AddPage();
			$pdf->SetFont('Times','B',14);
			$pdf->SetXY(10,20);
			$pdf->Cell(190,4,$var,0,0,'L',0);
			$pdf->SetXY(170,20);
			$pdf->Cell(190,4,"Confidential",0,0,'L',0);
			$pdf->SetFont('Times','B',14);
			$pdf->SetXY(63,30);
			$pdf->Cell(190,4,'Nagaland Board of School Education',0,0,'L',0);
			$pdf->Ln();
			$pdf->Cell(190,8,'Kohima',0,0,'C',0);
			$pdf->Ln();
			$pdf->SetFont('Times','B',17);
			$pdf->Cell(190,8,$subjectHSLC.$display_date,0,0,'C',0);
			$pdf->SetFont('Times','B',$font);
			$pdf->SetXY(20,40);
			//$pdf->Cell(190,12,$row['sl'],0,0,'L',0);
			$pdf->Ln();
			$pdf->Ln();
			$pdf->SetFont('Times','',12);
			$pdf->SetXY(10,57);
			$pdf->Cell(190,10,'Date of examination :    	
		                                                                  Time : ',0,0,'L',0);
			$pdf->SetFont('Times','B',15);
			$pdf->SetXY(50,57);
			$pdf->Cell(190,10,$date,0,0,'L',0);
			$pdf->SetXY(140,57);
			$pdf->Cell(190,10,$Etime,0,0,'L',0);

			$pdf->SetFont('Times','',12);

			$pdf->SetXY(10,65);
			$pdf->Cell(190,12,'Subject:                                                                                               Copies of question papers enclosed: ',0,0,'L',0);
			$pdf->SetFont('Times','B',16);
			$pdf->SetXY(25,65);
			$pdf->Cell(190,12,$sub,0,0,'L',0);
			$pdf->SetXY(186,65);
			$pdf->Cell(190,12,$row[$main],0,0,'L',0);
			$pdf->SetFont('Times','',12);
			$pdf->Ln();
	
			$pdf->Cell(10,8,'.......................................................                                                             .......................................................',0,0,'L',0);

			$pdf->Ln();
			$pdf->Cell(10,8,'                  counted by                                                                                                verified & packed by',0,0,'L',0);

			$pdf->Ln();
			$pdf->Cell(10,8,'Name of the School/Centre  ',0,0,'L',0);
			$pdf->SetFont('Times','B',16);
			$pdf->SetXY(60,92);
			$pdf->Cell(10,8,$row['school'],0,0,'L',0);
			$pdf->Ln();
			$pdf->Ln();

			$pdf->Image('aaa.gif',115,105,70,15);
			$pdf->Ln();

			$pdf->Cell(10,8,'                                                                                  Additional Secretary',0,0,'L',0);
			$pdf->SetXY(10,145);
			$pdf->Cell(10,8,'-------------------------------------------------------------------------------------------------',0,0,'L',0);
			$flag=1;
	
		}
		else
		{
			$pdf->SetFont('Times','B',14);
			$pdf->SetXY(10,20+$offset);
			$pdf->Cell(190,4,$var,0,0,'L',0);
			$pdf->SetXY(170,20+$offset);
			$pdf->Cell(190,4,"Confidential",0,0,'L',0);
			$pdf->SetFont('Times','B',14);
			$pdf->SetXY(63,30+$offset);
			$pdf->Cell(190,4,'Nagaland Board of School Education',0,0,'L',0);
			$pdf->Ln();
			$pdf->Cell(190,8,'Kohima',0,0,'C',0);
			$pdf->Ln();
			$pdf->SetFont('Times','B',17);
			$pdf->Cell(190,8,$subjectHSLC.$display_date,0,0,'C',0);
			$pdf->SetFont('Times','B',$font);
			$pdf->SetXY(20,40+$offset);
			//$pdf->Cell(190,12,$row['sl'],0,0,'L',0);
			$pdf->Ln();
			$pdf->Ln();
			$pdf->SetFont('Times','',12);
			$pdf->SetXY(10,57+$offset);
			$pdf->Cell(190,10,'Date of examination :    	
		                                                                  Time : ',0,0,'L',0);
			$pdf->SetFont('Times','B',15);
			$pdf->SetXY(50,57+$offset);
			$pdf->Cell(190,10,$date,0,0,'L',0);
			$pdf->SetXY(140,57+$offset);
			$pdf->Cell(190,10,$Etime,0,0,'L',0);

			$pdf->SetFont('Times','',12);

			$pdf->SetXY(10,65+$offset);
			$pdf->Cell(190,12,'Subject:                                                                                               Copies of question papers enclosed: ',0,0,'L',0);
			$pdf->SetFont('Times','B',16);
			$pdf->SetXY(25,65+$offset);
			$pdf->Cell(190,12,$sub,0,0,'L',0);
			$pdf->SetXY(186,65+$offset);
			$pdf->Cell(190,12,$row[$main],0,0,'L',0);
			$pdf->SetFont('Times','',12);
			$pdf->Ln();
	
			$pdf->Cell(10,8,'.......................................................                                                             .......................................................',0,0,'L',0);

			$pdf->Ln();
			$pdf->Cell(10,8,'                  counted by                                                                                                verified & packed by',0,0,'L',0);

			$pdf->Ln();
			$pdf->Cell(10,8,'Name of the School/Centre  ',0,0,'L',0);
			$pdf->SetFont('Times','B',16);
			$pdf->SetXY(60,92+$offset);
			$pdf->Cell(10,8,$row['school'],0,0,'L',0);
			$pdf->Ln();
			$pdf->Ln();

			$pdf->Image('aaa.gif',115,105+$offset,70,15);
			$pdf->Ln();

			$pdf->Cell(10,8,'                                                                                  Additional Secretary',0,0,'L',0);

			$flag=0;
	
		}

	}
	} 
	else if($sub=="tny" || $sub=="smi" || $sub=="aon" || $sub=="lta" || $sub=="bng" || $sub=="alt" || $sub=="hnd")
	{
	$sub1="MILS";//$date='3rd December 2016';
	$query1 = mysql_query("select * from c10_timetbl where subject like '%$sub1%'");
	$find = mysql_fetch_array($query1);$date=$find['e_date'];
	
	$r=mysql_query("select * from $tableName where district='$dist' and $sub>0 ") or die(mysql_error());
	$s=mysql_query("select * from subjects_9_10 where subcode='$sub' ") or die(mysql_error());
	$subname=mysql_fetch_array($s,MYSQL_ASSOC);
	/*if($sub=='tny'){ $sub="TENYIDIE";  $sub2='tny';}
	if($sub=='aon'){ $sub="AO";  $sub2='aon';}
	if($sub=='hnd'){ $sub="HINDI";  $sub2='hnd';}
	if($sub=='lta'){ $sub="LOTHA";  $sub2='lta';}
	if($sub=='bng'){ $sub="BENGALI";  $sub2='bng';}
	if($sub=='alt'){ $sub="Alternative English"; $sub2='alt'; }
	if($sub=='smi'){ $sub="SUMI";  $sub2='smi';}*/
	//$time='9:00 a.m. to 12:00 noon';
	$flag=0;
	$offset=149;
	$pdf= new FPDF('P','mm','a4');
	$pdf->SetFont('Times','',12);
	while($row=mysql_fetch_array($r,MYSQL_ASSOC))
	{
		if($flag==0)
		{
			if($row['district']=='Vistse'){$var='Kohima';}else {$var=$row['district'];}
			$pdf->AddPage();
			$pdf->SetFont('Times','B',14);
			$pdf->SetXY(10,20);
			$pdf->Cell(190,4,$var,0,0,'L',0);
			$pdf->SetXY(170,20);
			$pdf->Cell(190,4,"Confidential",0,0,'L',0);
			$pdf->SetXY(63,30);
			$pdf->Cell(190,4,'Nagaland Board of School Education',0,0,'L',0);
			$pdf->Ln();
			$pdf->Cell(190,8,'Kohima',0,0,'C',0);
			$pdf->Ln();
			$pdf->SetFont('Times','B',17);
			$pdf->Cell(190,8,$subjectHSLC.$display_date,0,0,'C',0);
			$pdf->SetFont('Times','B',$font);
			$pdf->SetFont('Times','B',$font);
			$pdf->SetXY(20,40);
			//$pdf->Cell(190,12,$row['sl'],0,0,'L',0);
			$pdf->Ln();
			$pdf->Ln();
			$pdf->SetFont('Times','',12);
			$pdf->SetXY(10,57);
			$pdf->Cell(190,10,'Date of examination :    	
		                                                                    Time : ',0,0,'L',0);
			$pdf->SetFont('Times','B',15);
			$pdf->SetXY(50,57);
			$pdf->Cell(190,10,$date,0,0,'L',0);
			$pdf->SetXY(140,57);
			$pdf->Cell(190,10,$Etime,0,0,'L',0);

			$pdf->SetFont('Times','',12);

			$pdf->SetXY(10,65);
			$pdf->Cell(190,12,'Subject:                                                                                               Copies of question papers enclosed: ',0,0,'L',0);
			$pdf->SetFont('Times','B',16);
			$pdf->SetXY(25,65);
			$pdf->Cell(190,12,$subname['subname'],0,0,'L',0);
			$pdf->SetXY(186,65);
			$pdf->Cell(190,12,$row[$sub],0,0,'L',0);
			$pdf->SetFont('Times','',12);
			$pdf->Ln();
				
			$pdf->Cell(10,8,'.......................................................                                                             .......................................................',0,0,'L',0);

			$pdf->Ln();
			$pdf->Cell(10,8,'                  counted by                                                                                                verified & packed by',0,0,'L',0);

			$pdf->Ln();
			$pdf->Cell(10,8,'Name of the School/Centre  ',0,0,'L',0);
			$pdf->SetFont('Times','B',16);
			$pdf->SetXY(60,92);
			$pdf->Cell(10,8,$row['school'],0,0,'L',0);
			$pdf->Ln();
			$pdf->Ln();

			$pdf->Image('aaa.gif',115,105,70,15);
			$pdf->Ln();

			$pdf->Cell(10,8,'                                                                                  Additional Secretary',0,0,'L',0);
			$pdf->SetXY(10,145);
			$pdf->Cell(10,8,'-------------------------------------------------------------------------------------------------',0,0,'L',0);

			$flag=1;
	
		}
		else
		{
			$pdf->SetFont('Times','B',14);
			$pdf->SetXY(10,20+$offset);
			$pdf->Cell(190,4,$var,0,0,'L',0);
			$pdf->SetXY(170,20+$offset);
			$pdf->Cell(190,4,"Confidential",0,0,'L',0);
			$pdf->SetXY(63,30+$offset);
			$pdf->Cell(190,4,'Nagaland Board of School Education',0,0,'L',0);
			$pdf->Ln();
			$pdf->Cell(190,8,'Kohima',0,0,'C',0);
			$pdf->Ln();
			$pdf->SetFont('Times','B',17);
			$pdf->Cell(190,8,$subjectHSLC.$display_date,0,0,'C',0);
			$pdf->SetFont('Times','B',$font);
			$pdf->SetXY(20,40+$offset);
			//$pdf->Cell(190,12,$row['sl'],0,0,'L',0);
			$pdf->Ln();
			$pdf->Ln();
			$pdf->SetFont('Times','',12);
			$pdf->SetXY(10,57+$offset);
			$pdf->Cell(190,10,'Date of examination :    	
		                                                                     Time : ',0,0,'L',0);
			$pdf->SetFont('Times','B',15);
			$pdf->SetXY(50,57+$offset);
			$pdf->Cell(190,10,$date,0,0,'L',0);
			$pdf->SetXY(140,57+$offset);
			$pdf->Cell(190,10,$Etime,0,0,'L',0);

			$pdf->SetFont('Times','',12);

			$pdf->SetXY(10,65+$offset);
			$pdf->Cell(190,12,'Subject:                                                                                               Copies of question papers enclosed: ',0,0,'L',0);
			$pdf->SetFont('Times','B',16);
			$pdf->SetXY(25,65+$offset);
			$pdf->Cell(190,12,$subname['subname'],0,0,'L',0);
			$pdf->SetXY(186,65+$offset);
			$pdf->Cell(190,12,$row[$sub],0,0,'L',0);
			$pdf->SetFont('Times','',12);
			$pdf->Ln();
	
			$pdf->Cell(10,8,'.......................................................                                                             .......................................................',0,0,'L',0);

			$pdf->Ln();
			$pdf->Cell(10,8,'                  counted by                                                                                                verified & packed by',0,0,'L',0);

			$pdf->Ln();
			$pdf->Cell(10,8,'Name of the School/Centre  ',0,0,'L',0);
			$pdf->SetFont('Times','B',16);
			$pdf->SetXY(60,92+$offset);
			$pdf->Cell(10,8,$row['school'],0,0,'L',0);
			$pdf->Ln();
			$pdf->Ln();

			$pdf->Image('aaa.gif',115,105+$offset,70,15);
			$pdf->Ln();

			$pdf->Cell(10,8,'                                                                                  Additional Secretary',0,0,'L',0);


			$flag=0;
	
		}

	}
	}

	else if($sub=="fit" || $sub=="hs" || $sub=="bk" || $sub=="ms" || $sub=="ee" || $sub=="iv" || $sub=="tt" || $sub=="rv" || $sub=="hv" || $sub=="ev" || $sub=="bv" || $sub=="mv" || $sub=="mm" || $sub=="graph" || $sub=="av" || $sub=="at" || $sub=="pv")
	{
	if($sub=="mm")
 	{
 		$sub1="Music";
 	}
 	else if($sub=="graph")
 	{
 		$sub1="Mathematics";
 	}
 	
 	else
 	{
 		$sub1="6th";
 	}
	//$date='6th December 2016';
	$query1 = mysql_query("select * from c10_timetbl where subject like '%$sub1%'");
	$find = mysql_fetch_array($query1);
	
		$date=$find['e_date'];
	
	
	
	$r=mysql_query("select * from $tableName where district='$dist' and $sub>0 ") or die(mysql_error());
	$s=mysql_query("select * from subjects_9_10 where subcode='$sub' ") or die(mysql_error());
	$subname=mysql_fetch_array($s,MYSQL_ASSOC);

	
	if($sub=='fit'){  $time=$Vtime; }
	if($sub=='hs'){   $time=$Vtime; }
	if($sub=='bk'){   $time=$Vtime; }
	if($sub=='ms'){   $time=$Vtime; }
	if($sub=='ee'){   $time=$Vtime; }
	if($sub=='iv'){   $time=$Vtime; }
	if($sub=='tt'){   $time=$Vtime; }
	if($sub=='rv'){   $time=$Vtime; }
	if($sub=='hv'){   $time=$Vtime; }
	if($sub=='ev'){   $time=$Vtime; }
	if($sub=='bv'){   $time=$Vtime; }
	if($sub=='mv'){   $time=$Vtime; }
	if($sub=='av'){   $time=$Vtime; }
	if($sub=='at'){   $time=$Vtime; }
	if($sub=='pv'){   $time=$Vtime; }
	if($sub=='mm'){   $time=$Vtime; }
	if($sub=='graph'){   $time=$Etime; }
	
	
	$flag=0;
	$offset=149;
	$pdf= new FPDF('P','mm','a4');
	$pdf->SetFont('Times','',12);
	while($row=mysql_fetch_array($r,MYSQL_ASSOC))
	{
		if($flag==0)
		{
			if($row['district']=='Vistse'){$var='Kohima';}else {$var=$row['district'];}
			$pdf->AddPage();
			$pdf->SetFont('Times','B',14);
			$pdf->SetXY(10,20);
			$pdf->Cell(190,4,$var,0,0,'L',0);
			$pdf->SetXY(170,20);
			$pdf->Cell(190,4,"Confidential",0,0,'L',0);
			$pdf->SetXY(63,30);
			$pdf->Cell(190,4,'Nagaland Board of School Education',0,0,'L',0);
			$pdf->Ln();
			$pdf->Cell(190,8,'Kohima',0,0,'C',0);
			$pdf->Ln();
			$pdf->SetFont('Times','B',17);
			$pdf->Cell(190,8,$subjectHSLC.$display_date,0,0,'C',0);
			$pdf->SetFont('Times','B',$font);
			$pdf->SetFont('Times','B',$font);
			$pdf->SetXY(20,40);
			//$pdf->Cell(190,12,$row['sl'],0,0,'L',0);
			$pdf->Ln();
			$pdf->Ln();
			$pdf->SetFont('Times','',12);
			$pdf->SetXY(10,57);
			$pdf->Cell(190,10,'Date of examination :    	
		                                                                    Time : ',0,0,'L',0);
			$pdf->SetFont('Times','B',15);
			$pdf->SetXY(50,57);
			if($sub=='mm'){$date="17th February 2024";}
			//if($sub=='graph'){$date="20th March 2023";}
			$pdf->Cell(190,10,$date,0,0,'L',0);
			$pdf->SetXY(140,57);
			$pdf->Cell(190,10,$time,0,0,'L',0);

			$pdf->SetFont('Times','',12);

			$pdf->SetXY(10,65);
			$pdf->Cell(190,12,'Subject:                                                                                               Copies of question papers enclosed: ',0,0,'L',0);
			$pdf->SetFont('Times','B',16);
			$pdf->SetXY(25,65);
			$pdf->Cell(190,12,$subname['subname'],0,0,'L',0);
			$pdf->SetXY(186,65);
			$pdf->Cell(190,12,$row[$sub],0,0,'L',0);
			$pdf->SetFont('Times','',12);
			$pdf->Ln();
	
			$pdf->Cell(10,8,'.......................................................                                                             .......................................................',0,0,'L',0);

			$pdf->Ln();
			$pdf->Cell(10,8,'                  counted by                                                                                                verified & packed by',0,0,'L',0);

			$pdf->Ln();
			$pdf->Cell(10,8,'Name of the School/Centre  ',0,0,'L',0);
			$pdf->SetFont('Times','B',16);
			$pdf->SetXY(60,92);
			$pdf->Cell(10,8,$row['school'],0,0,'L',0);
			$pdf->Ln();
			$pdf->Ln();

			$pdf->Image('aaa.gif',115,105,70,15);
			$pdf->Ln();

			$pdf->Cell(10,8,'                                                                                  Additional Secretary',0,0,'L',0);
			$pdf->SetXY(10,145);
			$pdf->Cell(10,8,'-------------------------------------------------------------------------------------------------',0,0,'L',0);

			$flag=1;
	
		}
		else
		{
			$pdf->SetFont('Times','B',14);
			$pdf->SetXY(10,20+$offset);
			$pdf->Cell(190,4,$var,0,0,'L',0);
			$pdf->SetXY(170,20+$offset);
			$pdf->Cell(190,4,"Confidential",0,0,'L',0);
			$pdf->SetXY(63,30+$offset);
			$pdf->Cell(190,4,'Nagaland Board of School Education',0,0,'L',0);
			$pdf->Ln();
			$pdf->Cell(190,8,'Kohima',0,0,'C',0);
			$pdf->Ln();
			$pdf->SetFont('Times','B',17);
			$pdf->Cell(190,8,$subjectHSLC.$display_date,0,0,'C',0);
			$pdf->SetFont('Times','B',$font);
			$pdf->SetXY(20,40+$offset);
			//$pdf->Cell(190,12,$row['sl'],0,0,'L',0);
			$pdf->Ln();
			$pdf->Ln();
			$pdf->SetFont('Times','',12);
			$pdf->SetXY(10,57+$offset);
			$pdf->Cell(190,10,'Date of examination :    	
		                                                                     Time : ',0,0,'L',0);
			$pdf->SetFont('Times','B',15);
			$pdf->SetXY(50,57+$offset);
			$pdf->Cell(190,10,$date,0,0,'L',0);
			$pdf->SetXY(140,57+$offset);
			$pdf->Cell(190,10,$time,0,0,'L',0);

			$pdf->SetFont('Times','',12);

			$pdf->SetXY(10,65+$offset);
			$pdf->Cell(190,12,'Subject:                                                                                               Copies of question papers enclosed: ',0,0,'L',0);
			$pdf->SetFont('Times','B',16);
			$pdf->SetXY(25,65+$offset);
			$pdf->Cell(190,12,$subname['subname'],0,0,'L',0);
			$pdf->SetXY(186,65+$offset);
			$pdf->Cell(190,12,$row[$sub],0,0,'L',0);
			$pdf->SetFont('Times','',12);
			$pdf->Ln();
	
			$pdf->Cell(10,8,'.......................................................                                                             .......................................................',0,0,'L',0);

			$pdf->Ln();
			$pdf->Cell(10,8,'                  counted by                                                                                                verified & packed by',0,0,'L',0);

			$pdf->Ln();
			$pdf->Cell(10,8,'Name of the School/Centre  ',0,0,'L',0);
			$pdf->SetFont('Times','B',16);
			$pdf->SetXY(60,92+$offset);
			$pdf->Cell(10,8,$row['school'],0,0,'L',0);
			$pdf->Ln();
			$pdf->Ln();

			$pdf->Image('aaa.gif',115,105+$offset,70,15);
			$pdf->Ln();

			$pdf->Cell(10,8,'                                                                                  Additional Secretary',0,0,'L',0);

			$flag=0;
		}
	}
	}
	/*
	else if($sub=="sc_nc" || $sub=="sc_oc")
	{
	
	
		$timetbl_sub = 'Science';
		$query1 = mysql_query("select * from c10_timetbl where subject like '%$timetbl_sub%'");
		$find = mysql_fetch_array($query1,MYSQL_ASSOC);$date=$find['e_date'];
	
		$r=mysql_query("select * from $tableName where district='$dist' and $sub>0 ") or die(mysql_error());
		$s=mysql_query("select * from subjects_9_10 where subcode=$sub") or die(mysql_error());
		$subname=mysql_fetch_array($s,MYSQL_ASSOC);
		if($sub=="sc_nc"){   $time='9:00 a.m. to 12:00 noon'; }
		if($sub=="sc_oc"){   $time='9:00 a.m. to 12:00 noon'; }
	
 
    
		$flag=0;
		$offset=149;
		$pdf= new FPDF('P','mm','a4');
		$pdf->SetFont('Times','',12);
		while($row=mysql_fetch_array($r,MYSQL_ASSOC))
		{
			if($flag==0)
		{
			$pdf->AddPage();
			$pdf->SetFont('Times','B',14);
			$pdf->SetXY(10,20);
			$pdf->Cell(190,4,$row['district'],0,0,'L',0);
			$pdf->SetXY(170,20);
			$pdf->Cell(190,4,"Confidential",0,0,'L',0);
			$pdf->SetXY(63,30);
			$pdf->Cell(190,4,'Nagaland Board of School Education',0,0,'L',0);
			$pdf->Ln();
			$pdf->Cell(190,8,'Kohima',0,0,'C',0);
			$pdf->Ln();
			$pdf->SetFont('Times','B',17);
			$pdf->Cell(190,8,'High School Leaving Certificate Examination '.date('Y'),0,0,'C',0);
			$pdf->SetFont('Times','B',$font);
			$pdf->SetFont('Times','B',$font);
			$pdf->SetXY(20,40);
			//$pdf->Cell(190,12,$row['sl'],0,0,'L',0);
			$pdf->Ln();
			$pdf->Ln();
			$pdf->SetFont('Times','',12);
			$pdf->SetXY(10,57);
			$pdf->Cell(190,10,'Date of examination :    	
		                                                                    Time : ',0,0,'L',0);
			$pdf->SetFont('Times','B',15);
			$pdf->SetXY(50,57);
			$pdf->Cell(190,10,$date,0,0,'L',0);
			$pdf->SetXY(140,57);
			$pdf->Cell(190,10,$time,0,0,'L',0);

			$pdf->SetFont('Times','',12);

		$pdf->SetXY(10,65);
		$pdf->Cell(190,12,'Subject:                                                                                               Copies of question papers enclosed: ',0,0,'L',0);
				$pdf->SetFont('Times','B',16);
			$pdf->SetXY(25,65);
		$pdf->Cell(190,12,$subname['subname'],0,0,'L',0);
			$pdf->SetXY(186,65);
		$pdf->Cell(190,12,$row[$sub],0,0,'L',0);
			$pdf->SetFont('Times','',12);
			$pdf->Ln();
			
		$pdf->Cell(10,8,'.......................................................                                                             .......................................................',0,0,'L',0);

		$pdf->Ln();
		$pdf->Cell(10,8,'                  counted by                                                                                                verified & packed by',0,0,'L',0);

		$pdf->Ln();
		$pdf->Cell(10,8,'Name of the School/Centre  ',0,0,'L',0);
		$pdf->SetFont('Times','B',16);
		$pdf->SetXY(60,92);
		$pdf->Cell(10,8,$row['school'],0,0,'L',0);
		$pdf->Ln();
		$pdf->Ln();

		$pdf->Image('aaa.gif',115,105,70,15);
		$pdf->Ln();

		$pdf->Cell(10,8,'                                                                           Controller of Examinations',0,0,'L',0);
		$pdf->SetXY(10,145);
		$pdf->Cell(10,8,'-------------------------------------------------------------------------------------------------',0,0,'L',0);

		$flag=1;
			
			}
		else
		{
			$pdf->SetFont('Times','B',14);
			$pdf->SetXY(10,20+$offset);
			$pdf->Cell(190,4,$row['district'],0,0,'L',0);
			$pdf->SetXY(170,20+$offset);
			$pdf->Cell(190,4,"Confidential",0,0,'L',0);
			$pdf->SetXY(63,30+$offset);
			$pdf->Cell(190,4,'Nagaland Board of School Education',0,0,'L',0);
			$pdf->Ln();
			$pdf->Cell(190,8,'Kohima',0,0,'C',0);
			$pdf->Ln();
			$pdf->SetFont('Times','B',17);
			$pdf->Cell(190,8,'High School Leaving Certificate Examination'.date('Y'),0,0,'C',0);
			$pdf->SetFont('Times','B',$font);
			$pdf->SetXY(20,40+$offset);
			//$pdf->Cell(190,12,$row['sl'],0,0,'L',0);
			$pdf->Ln();
			$pdf->Ln();
			$pdf->SetFont('Times','',12);
			$pdf->SetXY(10,57+$offset);
			$pdf->Cell(190,10,'Date of examination :    	
		                                                                     Time : ',0,0,'L',0);
			$pdf->SetFont('Times','B',15);
			$pdf->SetXY(50,57+$offset);
			$pdf->Cell(190,10,$date,0,0,'L',0);
			$pdf->SetXY(140,57+$offset);
			$pdf->Cell(190,10,$time,0,0,'L',0);

			$pdf->SetFont('Times','',12);

		$pdf->SetXY(10,65+$offset);
		$pdf->Cell(190,12,'Subject:                                                                                               Copies of question papers enclosed: ',0,0,'L',0);
				$pdf->SetFont('Times','B',16);
			$pdf->SetXY(25,65+$offset);
		$pdf->Cell(190,12,$subname['subname'],0,0,'L',0);
			$pdf->SetXY(186,65+$offset);
		$pdf->Cell(190,12,$row[$sub],0,0,'L',0);
			$pdf->SetFont('Times','',12);
			$pdf->Ln();
			
		$pdf->Cell(10,8,'.......................................................                                                             .......................................................',0,0,'L',0);

		$pdf->Ln();
		$pdf->Cell(10,8,'                  counted by                                                                                                verified & packed by',0,0,'L',0);

		$pdf->Ln();
		$pdf->Cell(10,8,'Name of the School/Centre  ',0,0,'L',0);
		$pdf->SetFont('Times','B',16);
		$pdf->SetXY(60,92+$offset);
		$pdf->Cell(10,8,$row['school'],0,0,'L',0);
		$pdf->Ln();
		$pdf->Ln();

		$pdf->Image('aaa.gif',115,105+$offset,70,15);
		$pdf->Ln();

		$pdf->Cell(10,8,'                                                                           Controller of Examinations',0,0,'L',0);

		$flag=0;
		}}

		}*/
}

// TOPSHEET FOR CLASS ELEVEN
// CLASS XI(ARTS)

else if($class=='11a')
{
	$tableName	=	"c11a_pkChrt"; $timetbl='c11a_timetbl';
	if($sub=="eng" || $sub=="edn" || $sub=="psy" || $sub=="geo" || $sub=="evs" || $sub=="msc" || $sub=="his" || $sub=="eco" || $sub=="sgy" || $sub=="psc" || $sub=="ffm" || $sub=="phi" || $sub=="csc" || $sub=="inf" || $sub=="itv" || $sub=="ttv" || $sub=="rtv" || $sub=="hcv")
	{
		if($sub=="eng"){$subName='English';}
		if($sub=="edn"){$subName='Education';}
		if($sub=="psy"){$subName='Psychology';}
		if($sub=="geo"){$subName='Geography';}
		if($sub=="evs"){$subName='Environmental Education';}
		if($sub=="msc"){$subName='Music';}
		if($sub=="his"){$subName='History';}
		if($sub=="eco"){$subName='Economics';}
		if($sub=="sgy"){$subName='Sociology';}
		if($sub=="psc"){$subName='Political Science';}
		if($sub=="ffm"){$subName='Financial Market Management';}
		if($sub=="phi"){$subName='Philosophy';}
		if($sub=="csc"){$subName='Computer Science';}
		if($sub=="inf"){$subName='Informatics Practices';}
		if($sub=="itv"){$subName='Information Technology';}
		if($sub=="ttv"){$subName='Tourism & Hospitality';}
		if($sub=="rtv"){$subName='Retail';}
		if($sub=="hcv"){$subName='Healthcare';}
		function getExamDate($sl,$timetbl)
		{
			$query2 = mysql_query("select * from $timetbl where sl='$sl'");
			$find = mysql_fetch_array($query2);
			if($find['e_date']=='')
			{
				$sl = $sl-1;
				return getExamDate($sl,$timetbl);
			
			}
			else 
			{
				return $find['e_date'];
			}
		}


		$query1 = mysql_query("select * from $timetbl where subcode = '$sub'");
		$find = mysql_fetch_array($query1);$sl=$find['sl'];
		//if($find['e_date']=='')
		//{
		//	$sl=$sl-1;
		//$date =	getExamDate($sl,$timetbl);
			
		//}
		//else{
		//	$date=$find['e_date'];
		//}
		
		
		if($sub=='itv' || $sub=='ttv' || $sub=='rtv' || $sub=='hcv')
		{
			$time=$Vtime;
		}
		else
		{
			$time=$Etime;
		}
		$flag=0;
		$offset=149;
		$pdf= new FPDF('P','mm','a4');
		$pdf->SetFont('Times','',12);
		$r=mysql_query("select * from $tableName where district='$dist' and $sub>0 ") or die(mysql_error());
		while($row=mysql_fetch_array($r,MYSQL_ASSOC))
		{
			if($flag==0)
			{
				$pdf->AddPage();
				$pdf->SetFont('Times','B',18);
				$pdf->SetXY(10,20);
				$pdf->Cell(190,4,$row['sl'],0,0,'L',0);
				$pdf->SetXY(170,20);
				$pdf->SetFont('Times','B',14);
				$pdf->Cell(190,4,"Confidential",0,0,'L',0);
				$pdf->SetFont('Times','B',14);
				$pdf->SetXY(63,30);
				$pdf->Cell(190,4,'Nagaland Board of School Education',0,0,'L',0);
				$pdf->Ln();
				$pdf->Cell(190,8,'Kohima',0,0,'C',0);
				$pdf->Ln();
				$pdf->SetFont('Times','B',17);
				$pdf->Cell(190,8,'Class - XI Promotion Examination'.$display_date,0,0,'C',0);
				$pdf->SetFont('Times','B',$font);
				$pdf->SetXY(20,40);
				$pdf->Cell(190,12,'',0,0,'L',0);
				$pdf->Ln();
				$pdf->Ln();
				$pdf->SetFont('Times','',12);
				$pdf->SetXY(10,57);
				$pdf->Cell(190,10,'Date of examination :    	
	                                                                  Time : ',0,0,'L',0);
				$pdf->SetFont('Times','B',15);
				$pdf->SetXY(50,57);
				$pdf->Cell(190,10,getExamDate($sl,$timetbl),0,0,'L',0);
				$pdf->SetXY(140,57);
				$pdf->Cell(190,10,$time,0,0,'L',0);
				$pdf->SetFont('Times','',12);
				$pdf->SetXY(10,65);
				$pdf->Cell(190,12,'Subject:                                                                                               Copies of question papers enclosed: ',0,0,'L',0);
				$pdf->SetFont('Times','B',16);
				$pdf->SetXY(25,65);
				$pdf->Cell(190,12,$subName,0,0,'L',0);
				$pdf->SetXY(186,65);
				$pdf->Cell(190,12,$row[$sub],0,0,'L',0);
				$pdf->SetFont('Times','',12);
				$pdf->Ln();
		
				$pdf->Cell(10,8,'.......................................................                                                             .......................................................',0,0,'L',0);

				$pdf->Ln();
				$pdf->Cell(10,8,'                  counted by                                                                                                verified & packed by',0,0,'L',0);

				$pdf->Ln();
				$pdf->Cell(10,8,'Name of the School/Centre  ',0,0,'L',0);
				$pdf->SetFont('Times','B',16);
				$pdf->SetXY(60,92);
				$pdf->Cell(10,8,$row['centre'],0,0,'L',0);
				$pdf->Ln();
				$pdf->Ln();
				$pdf->Image('aaa.gif',115,105,70,15);
				$pdf->Ln();

				$pdf->Cell(10,8,'                                                                                  Additional Secretary',0,0,'L',0);
				$pdf->SetXY(10,145);
				$pdf->Cell(10,8,'-------------------------------------------------------------------------------------------------',0,0,'L',0);
				$flag=1;
	
			}
			else
			{
				$pdf->SetFont('Times','B',18);
				$pdf->SetXY(10,20+$offset);
				$pdf->Cell(190,4,$row['sl'],0,0,'L',0);
				$pdf->SetFont('Times','B',14);
				$pdf->SetXY(170,20+$offset);
				$pdf->Cell(190,4,"Confidential",0,0,'L',0);
				$pdf->SetFont('Times','B',14);
				$pdf->SetXY(63,30+$offset);
				$pdf->Cell(190,4,'Nagaland Board of School Education',0,0,'L',0);
				$pdf->Ln();
				$pdf->Cell(190,8,'Kohima',0,0,'C',0);
				$pdf->Ln();
				$pdf->SetFont('Times','B',17);
				$pdf->Cell(190,8,'Class - XI Promotion Examination'.$display_date,0,0,'C',0);
				$pdf->SetFont('Times','B',$font);
				$pdf->SetXY(20,40+$offset);
				//$pdf->Cell(190,12,$row['sl'],0,0,'L',0);
				$pdf->Ln();
				$pdf->Ln();
				$pdf->SetFont('Times','',12);
				$pdf->SetXY(10,57+$offset);
				$pdf->Cell(190,10,'Date of examination :    	
	                                                                  Time : ',0,0,'L',0);
				$pdf->SetFont('Times','B',15);
				$pdf->SetXY(50,57+$offset);
				$pdf->Cell(190,10,getExamDate($sl,$timetbl),0,0,'L',0);
				$pdf->SetXY(140,57+$offset);
				$pdf->Cell(190,10,$time,0,0,'L',0);
				$pdf->SetFont('Times','',12);
				$pdf->SetXY(10,65+$offset);
				$pdf->Cell(190,12,'Subject:                                                                                               Copies of question papers enclosed: ',0,0,'L',0);
				$pdf->SetFont('Times','B',16);
				$pdf->SetXY(25,65+$offset);
				$pdf->Cell(190,12,$subName,0,0,'L',0);
				$pdf->SetXY(186,65+$offset);
				$pdf->Cell(190,12,$row[$sub],0,0,'L',0);
				$pdf->SetFont('Times','',12);
				$pdf->Ln();
				$pdf->Cell(10,8,'.......................................................                                                             .......................................................',0,0,'L',0);

				$pdf->Ln();
				$pdf->Cell(10,8,'                  counted by                                                                                                verified & packed by',0,0,'L',0);
				$pdf->Ln();
				$pdf->Cell(10,8,'Name of the School/Centre  ',0,0,'L',0);
				$pdf->SetFont('Times','B',16);
				$pdf->SetXY(60,92+$offset);
				$pdf->Cell(10,8,$row['centre'],0,0,'L',0);
				$pdf->Ln();
				$pdf->Ln();
				$pdf->Image('aaa.gif',115,105+$offset,70,15);
				$pdf->Ln();
				$pdf->Cell(10,8,'                                                                                  Additional Secretary',0,0,'L',0);
				$flag=0;
		
			}

		}
	} 
	else if($sub=="tny" || $sub=="smi" || $sub=="aon" || $sub=="lta" || $sub=="bng" || $sub=="alt" || $sub=="hnd")
	{
		$sub1="Mils";//$date='3rd December 2016';
		$query1 = mysql_query("select * from $timetbl where subject like '%$sub1%'");
		$find = mysql_fetch_array($query1);$date=$find['e_date'];
		
		$r=mysql_query("select * from $tableName where district='$dist' and $sub>0 ") or die(mysql_error());
		if($sub=='tny'){ $sub="TENYIDIE";  $sub2='tny';}
		if($sub=='aon'){ $sub="AO";  $sub2='aon';}
		if($sub=='hnd'){ $sub="HINDI";  $sub2='hnd';}
		if($sub=='lta'){ $sub="LOTHA";  $sub2='lta';}
		if($sub=='bng'){ $sub="BENGALI";  $sub2='bng';}
		if($sub=='alt'){ $sub="Alternative English"; $sub2='alt'; }
		if($sub=='smi'){ $sub="SUMI(Sütsah)";  $sub2='smi';}
		$time=$Etime;
		$flag=0;
		$offset=149;
		$pdf= new FPDF('P','mm','a4');
		$pdf->SetFont('Times','',12);
		while($row=mysql_fetch_array($r,MYSQL_ASSOC))
		{
			if($flag==0)
			{
				$pdf->AddPage();
				$pdf->SetFont('Times','B',18);
				$pdf->SetXY(10,20);
				$pdf->Cell(190,4,$row['sl'],0,0,'L',0);
				$pdf->SetFont('Times','B',14);
				$pdf->SetXY(170,20);
				$pdf->Cell(190,4,"Confidential",0,0,'L',0);
				$pdf->SetXY(63,30);
				$pdf->Cell(190,4,'Nagaland Board of School Education',0,0,'L',0);
				$pdf->Ln();
				$pdf->Cell(190,8,'Kohima',0,0,'C',0);
				$pdf->Ln();
				$pdf->SetFont('Times','B',17);
				$pdf->Cell(190,8,'Class - XI Promotion Examination'.$display_date,0,0,'C',0);
				$pdf->SetFont('Times','B',$font);
				$pdf->SetFont('Times','B',$font);
				$pdf->SetXY(20,40);
				//$pdf->Cell(190,12,$row['sl'],0,0,'L',0);
				$pdf->Ln();
				$pdf->Ln();
				$pdf->SetFont('Times','',12);
				$pdf->SetXY(10,57);
				$pdf->Cell(190,10,'Date of examination :    	
			                                                                    Time : ',0,0,'L',0);
				$pdf->SetFont('Times','B',15);
				$pdf->SetXY(50,57);
				$pdf->Cell(190,10,$date,0,0,'L',0);
				$pdf->SetXY(140,57);
				$pdf->Cell(190,10,$time,0,0,'L',0);

				$pdf->SetFont('Times','',12);

				$pdf->SetXY(10,65);
				$pdf->Cell(190,12,'Subject:                                                                                               Copies of question papers enclosed: ',0,0,'L',0);
					$pdf->SetFont('Times','B',16);
				$pdf->SetXY(25,65);
				$pdf->Cell(190,12,iconv('UTF-8','windows-1252',$sub),0,0,'L',0);
				$pdf->SetXY(186,65);
				$pdf->Cell(190,12,$row[$sub2],0,0,'L',0);
				$pdf->SetFont('Times','',12);
				$pdf->Ln();
				
				$pdf->Cell(10,8,'.......................................................                                                             .......................................................',0,0,'L',0);

				$pdf->Ln();
				$pdf->Cell(10,8,'                  counted by                                                                                                verified & packed by',0,0,'L',0);

				$pdf->Ln();
				$pdf->Cell(10,8,'Name of the School/Centre  ',0,0,'L',0);
				$pdf->SetFont('Times','B',16);
				$pdf->SetXY(60,92);
				$pdf->Cell(10,8,$row['centre'],0,0,'L',0);
				$pdf->Ln();
				$pdf->Ln();

				$pdf->Image('aaa.gif',115,105,70,15);
				$pdf->Ln();

				$pdf->Cell(10,8,'                                                                                  Additional Secretary',0,0,'L',0);
				$pdf->SetXY(10,145);
				$pdf->Cell(10,8,'-------------------------------------------------------------------------------------------------',0,0,'L',0);

				$flag=1;
				
						}
						else
						{
				$pdf->SetFont('Times','B',18);
				$pdf->SetXY(10,20+$offset);
				$pdf->Cell(190,4,$row['sl'],0,0,'L',0);
				$pdf->SetFont('Times','B',14);
				$pdf->SetXY(170,20+$offset);
				$pdf->Cell(190,4,"Confidential",0,0,'L',0);
				$pdf->SetXY(63,30+$offset);
				$pdf->Cell(190,4,'Nagaland Board of School Education',0,0,'L',0);
				$pdf->Ln();
				$pdf->Cell(190,8,'Kohima',0,0,'C',0);
				$pdf->Ln();
				$pdf->SetFont('Times','B',17);
				$pdf->Cell(190,8,'Class - XI Promotion Examination'.$display_date,0,0,'C',0);
				$pdf->SetFont('Times','B',$font);
				$pdf->SetXY(20,40+$offset);
				//$pdf->Cell(190,12,$row['sl'],0,0,'L',0);
				$pdf->Ln();
				$pdf->Ln();
				$pdf->SetFont('Times','',12);
				$pdf->SetXY(10,57+$offset);
				$pdf->Cell(190,10,'Date of examination :    	
			                                                                     Time : ',0,0,'L',0);
				$pdf->SetFont('Times','B',15);
				$pdf->SetXY(50,57+$offset);
				$pdf->Cell(190,10,$date,0,0,'L',0);
				$pdf->SetXY(140,57+$offset);
				$pdf->Cell(190,10,$time,0,0,'L',0);

				$pdf->SetFont('Times','',12);

				$pdf->SetXY(10,65+$offset);
				$pdf->Cell(190,12,'Subject:                                                                                               Copies of question papers enclosed: ',0,0,'L',0);
					$pdf->SetFont('Times','B',16);
				$pdf->SetXY(25,65+$offset);
				$pdf->Cell(190,12,iconv('UTF-8','windows-1252',$sub),0,0,'L',0);
				$pdf->SetXY(186,65+$offset);
				$pdf->Cell(190,12,$row[$sub2],0,0,'L',0);
				$pdf->SetFont('Times','',12);
				$pdf->Ln();
				
				$pdf->Cell(10,8,'.......................................................                                                             .......................................................',0,0,'L',0);

				$pdf->Ln();
				$pdf->Cell(10,8,'                  counted by                                                                                                verified & packed by',0,0,'L',0);

				$pdf->Ln();
				$pdf->Cell(10,8,'Name of the School/Centre  ',0,0,'L',0);
				$pdf->SetFont('Times','B',16);
				$pdf->SetXY(60,92+$offset);
				$pdf->Cell(10,8,$row['centre'],0,0,'L',0);
				$pdf->Ln();
				$pdf->Ln();

				$pdf->Image('aaa.gif',115,105+$offset,70,15);
				$pdf->Ln();

				$pdf->Cell(10,8,'                                                                                  Additional Secretary',0,0,'L',0);


				$flag=0;
	
			}

		}
	}
}

// TOPSHEET FOR CLASS-12
// HSSLC(ARTS)

else if($class=='12a')
{
	$sub1='';
	$tableName	=	"c12a_pkChrt"; $timetbl='c12a_timetbl';
	if($sub=="eng" || $sub=="edn" || $sub=="psy" || $sub=="geo" || $sub=="msc" || $sub=="his" || $sub=="eco" || $sub=="sgy" || $sub=="psc" || $sub=="phi" || $sub=="csc" || $sub=="inf" || $sub=="itv" || $sub=="ttv" || $sub=="fmm" || $sub=="rtv" || $sub=="hcv" || $sub=="btv" || $sub=="ehv" || $sub=="agv" || $sub=="atv" || $sub=="mm" || $sub=="graph" || $sub=="mat")
	{
		if($sub=="eng"){$sub=="eng";$subName='English';}
		if($sub=="edn"){$sub=="edn";$subName='Education';}
		if($sub=="psy"){$sub=="psy";$subName='Psychology';}
		if($sub=="geo"){$sub=="geo";$subName='Geography';}
		if($sub=="msc"){$sub=="msc";$subName='Music';}
		if($sub=="his"){$sub=="his";$subName='History';}
		if($sub=="eco"){$sub=="eco";$subName='Economics';}
		if($sub=="sgy"){$sub=="sgy";$subName='Sociology';}
		if($sub=="psc"){$sub=="psc";$subName='Political Science';}
		if($sub=="phi"){$sub=="phi";$subName='Philosophy';}
		if($sub=="fmm"){$sub=="fmm";$subName='Financial Markets Management';}
		if($sub=="csc"){$sub=="csc";$subName='Computer Science';}
		if($sub=="inf"){$sub=="inf";$subName='Informatics Practices';}
		if($sub=="itv"){$sub=="itv";$subName='Information Technology';}
		if($sub=="ttv"){$sub=="ttv";$subName='Tourism & Hospitality';}
		if($sub=="rtv"){$sub=="rtv";$subName='Retail';}
		if($sub=="hcv"){$sub=="hcv";$subName='Healthcare';}
		if($sub=="btv"){$sub=="btv";$subName='Beauty & Wellness';}
		if($sub=="ehv"){$sub=="ehv";$subName='Electronics';}
		if($sub=="agv"){$sub=="agv";$subName='Agriculture';}
		if($sub=="mat"){$sub=="mat";$subName='Mathematics';}
		if($sub=="atv"){$sub=="atv";$subName='Automotive';}
		if($sub=="mm"){$sub='msc'; $subName='Music Manuscript';}
		if($sub=="graph"){$sub1='mat';$subName='Maths(Graph)';}
		$query1 = mysql_query("select * from $timetbl where subcode like '%$sub%'");
		$find = mysql_fetch_array($query1);$sl=$find['sl'];
		function getExamDate($sl,$timetbl)
		{
			$query2 = mysql_query("select * from $timetbl where sl='$sl'");
			$find = mysql_fetch_array($query2);

			if($find['e_date']=='')
			{
				$sl = $sl-1;
				return getExamDate($sl,$timetbl);
			
			}
			else
			{
				return $find['e_date'];
			}
		}

			
		if($sub=='itv' || $sub=='ttv' || $sub=='rtv' || $sub=='hcv' || $sub=='btv' || $sub=='ehv' || $sub=='agv' || $sub=='atv' || $sub=='geo' || $sub=='eng' || $sub=='ent' || $sub=='msc' || $sub=='csc' || $sub=='inf' || $sub=='phi' || $sub=='fmm')
		{
			$time=$Vtime;
		}
		else
		{
			$time=$Etime;
		}
		$flag=0;
		$offset=149;
		$pdf= new FPDF('P','mm','a4');
		$pdf->SetFont('Times','',12);
		$r=mysql_query("select * from $tableName where district='$dist' and $sub>0 ") or die(mysql_error());
		while($row=mysql_fetch_array($r,MYSQL_ASSOC))
		{
			if($flag==0)
			{
				if($row['district']=='Vistse'){$var='Kohima';}else {$var=$row['district'];}
			$pdf->AddPage();
			$pdf->SetFont('Times','B',14);
			$pdf->SetXY(10,20);
			$pdf->Cell(190,4,$var,0,0,'L',0);
			$pdf->SetXY(170,20);
			$pdf->Cell(190,4,"Confidential",0,0,'L',0);
			$pdf->SetFont('Times','B',14);
			$pdf->SetXY(63,30);
			$pdf->Cell(190,4,'Nagaland Board of School Education',0,0,'L',0);
			$pdf->Ln();
			$pdf->Cell(190,8,'Kohima',0,0,'C',0);
			$pdf->Ln();
			$pdf->SetFont('Times','B',17);
			$pdf->Cell(190,8,$subjectHSSLC.$display_date,0,0,'C',0);
			$pdf->SetFont('Times','B',$font);
			$pdf->SetXY(20,40);
			//$pdf->Cell(190,12,$row['sl'],0,0,'L',0);
			$pdf->Ln();
			$pdf->Ln();
			$pdf->SetFont('Times','',12);
			$pdf->SetXY(10,57);
			$pdf->Cell(190,10,'Date of examination :    	
                                                                  Time : ',0,0,'L',0);
			$pdf->SetFont('Times','B',15);
			$pdf->SetXY(50,57);
			$pdf->Cell(190,10,getExamDate($sl,$timetbl),0,0,'L',0);
			$pdf->SetXY(140,57);
			$pdf->Cell(190,10,$time,0,0,'L',0);
			$pdf->SetFont('Times','',12);
			$pdf->SetXY(10,65);
			$pdf->Cell(190,12,'Subject:                                                                                               Copies of question papers enclosed: ',0,0,'L',0);
			$pdf->SetFont('Times','B',16);
			$pdf->SetXY(25,65);
			$pdf->Cell(190,12,$subName,0,0,'L',0);
			$pdf->SetXY(186,65);
			$pdf->Cell(190,12,$row[$sub],0,0,'L',0);
			$pdf->SetFont('Times','',12);
			$pdf->Ln();
	
			$pdf->Cell(10,8,'.......................................................                                                             .......................................................',0,0,'L',0);

			$pdf->Ln();
			$pdf->Cell(10,8,'                  counted by                                                                                                verified & packed by',0,0,'L',0);

			$pdf->Ln();
			$pdf->Cell(10,8,'Name of the School/Centre  ',0,0,'L',0);
			$pdf->SetFont('Times','B',16);
			$pdf->SetXY(60,92);
			$pdf->Cell(10,8,$row['centre'],0,0,'L',0);
			$pdf->Ln();
			$pdf->Ln();
			$pdf->Image('aaa.gif',115,105,70,15);
			$pdf->Ln();

			$pdf->Cell(10,8,'                                                                                  Additional Secretary',0,0,'L',0);
			$pdf->SetXY(10,145);
			$pdf->Cell(10,8,'-------------------------------------------------------------------------------------------------',0,0,'L',0);
			$flag=1;
	
			}
			else
			{
			$pdf->SetFont('Times','B',14);
			$pdf->SetXY(10,20+$offset);
			$pdf->Cell(190,4,$var,0,0,'L',0);
			$pdf->SetXY(170,20+$offset);
			$pdf->Cell(190,4,"Confidential",0,0,'L',0);
			$pdf->SetFont('Times','B',14);
			$pdf->SetXY(63,30+$offset);
			$pdf->Cell(190,4,'Nagaland Board of School Education',0,0,'L',0);
			$pdf->Ln();
			$pdf->Cell(190,8,'Kohima',0,0,'C',0);
			$pdf->Ln();
			$pdf->SetFont('Times','B',17);
			$pdf->Cell(190,8,$subjectHSSLC.$display_date,0,0,'C',0);
			$pdf->SetFont('Times','B',$font);
			$pdf->SetXY(20,40+$offset);
			//$pdf->Cell(190,12,$row['sl'],0,0,'L',0);
			$pdf->Ln();
			$pdf->Ln();
			$pdf->SetFont('Times','',12);
			$pdf->SetXY(10,57+$offset);
			$pdf->Cell(190,10,'Date of examination :    	
                                                                  Time : ',0,0,'L',0);
			$pdf->SetFont('Times','B',15);
			$pdf->SetXY(50,57+$offset);
			$pdf->Cell(190,10,getExamDate($sl,$timetbl),0,0,'L',0);
			$pdf->SetXY(140,57+$offset);
			$pdf->Cell(190,10,$time,0,0,'L',0);
			$pdf->SetFont('Times','',12);
			$pdf->SetXY(10,65+$offset);
			$pdf->Cell(190,12,'Subject:                                                                                               Copies of question papers enclosed: ',0,0,'L',0);
			$pdf->SetFont('Times','B',16);
			$pdf->SetXY(25,65+$offset);
			$pdf->Cell(190,12,$subName,0,0,'L',0);
			$pdf->SetXY(186,65+$offset);
			$pdf->Cell(190,12,$row[$sub],0,0,'L',0);
			$pdf->SetFont('Times','',12);
			$pdf->Ln();
			$pdf->Cell(10,8,'.......................................................                                                             .......................................................',0,0,'L',0);

			$pdf->Ln();
			$pdf->Cell(10,8,'                  counted by                                                                                                verified & packed by',0,0,'L',0);
			$pdf->Ln();
			$pdf->Cell(10,8,'Name of the School/Centre  ',0,0,'L',0);
			$pdf->SetFont('Times','B',16);
			$pdf->SetXY(60,92+$offset);
			$pdf->Cell(10,8,$row['centre'],0,0,'L',0);
			$pdf->Ln();
			$pdf->Ln();
			$pdf->Image('aaa.gif',115,105+$offset,70,15);
			$pdf->Ln();
			$pdf->Cell(10,8,'                                                                                  Additional Secretary',0,0,'L',0);
			$flag=0;
	
			}

		} 
	}
	else if($sub=="tny" || $sub=="smi" || $sub=="aon" || $sub=="lta" || $sub=="bng" || $sub=="alt" || $sub=="hnd")
	{
			$sub1="Mils";//$date='3rd December 2016';
			$query1 = mysql_query("select * from $timetbl where subject like '%$sub1%'");
			$find = mysql_fetch_array($query1);$date=$find['e_date'];
			
			$r=mysql_query("select * from $tableName where district='$dist' and $sub>0 ") or die(mysql_error());
			if($sub=='tny'){ $sub="TENYIDIE";  $sub2='tny';}
			if($sub=='aon'){ $sub="AO";  $sub2='aon';}
			if($sub=='hnd'){ $sub="HINDI";  $sub2='hnd';}
			if($sub=='lta'){ $sub="LOTHA";  $sub2='lta';}
			if($sub=='bng'){ $sub="BENGALI";  $sub2='bng';}
			if($sub=='alt'){ $sub="Alternative English"; $sub2='alt'; }
			if($sub=='smi'){ $sub="SUMI(Sütsah)";  $sub2='smi';}
			$time=$Vtime;
			$flag=0;
			$offset=149;
			$pdf= new FPDF('P','mm','a4');
			$pdf->SetFont('Times','',12);
			while($row=mysql_fetch_array($r,MYSQL_ASSOC))
			{
				if($flag==0)
				{ 
					if($row['district']=='Vistse'){$var='Kohima';}else {$var=$row['district'];}
					$pdf->AddPage();
					$pdf->SetFont('Times','B',14);
					$pdf->SetXY(10,20);
					$pdf->Cell(190,4,$var,0,0,'L',0);
					$pdf->SetXY(170,20);
					$pdf->Cell(190,4,"Confidential",0,0,'L',0);
					$pdf->SetXY(63,30);
					$pdf->Cell(190,4,'Nagaland Board of School Education',0,0,'L',0);
					$pdf->Ln();
					$pdf->Cell(190,8,'Kohima',0,0,'C',0);
					$pdf->Ln();
					$pdf->SetFont('Times','B',17);
					$pdf->Cell(190,8,$subjectHSSLC.$display_date,0,0,'C',0);
					$pdf->SetFont('Times','B',$font);
					$pdf->SetFont('Times','B',$font);
					$pdf->SetXY(20,40);
					//$pdf->Cell(190,12,$row['sl'],0,0,'L',0);
					$pdf->Ln();
					$pdf->Ln();
					$pdf->SetFont('Times','',12);
					$pdf->SetXY(10,57);
					$pdf->Cell(190,10,'Date of examination :    	
				                                                                    Time : ',0,0,'L',0);
					$pdf->SetFont('Times','B',15);
					$pdf->SetXY(50,57);
					$pdf->Cell(190,10,$date,0,0,'L',0);
					$pdf->SetXY(140,57);
					$pdf->Cell(190,10,$time,0,0,'L',0);

					$pdf->SetFont('Times','',12);

					$pdf->SetXY(10,65);
					$pdf->Cell(190,12,'Subject:                                                                                               Copies of question papers enclosed: ',0,0,'L',0);
					$pdf->SetFont('Times','B',16);
					$pdf->SetXY(25,65);
			
					$pdf->Cell(190,12,iconv('UTF-8','windows-1252',$sub),0,0,'L',0);
					$pdf->SetXY(186,65);
					$pdf->Cell(190,12,$row[$sub2],0,0,'L',0);
					$pdf->SetFont('Times','',12);
					$pdf->Ln();
			
					$pdf->Cell(10,8,'.......................................................                                                             .......................................................',0,0,'L',0);

					$pdf->Ln();
					$pdf->Cell(10,8,'                  counted by                                                                                                verified & packed by',0,0,'L',0);

					$pdf->Ln();
					$pdf->Cell(10,8,'Name of the School/Centre  ',0,0,'L',0);
					$pdf->SetFont('Times','B',16);
					$pdf->SetXY(60,92);
					$pdf->Cell(10,8,$row['centre'],0,0,'L',0);
					$pdf->Ln();
					$pdf->Ln();

					$pdf->Image('aaa.gif',115,105,70,15);
					$pdf->Ln();

					$pdf->Cell(10,8,'                                                                                  Additional Secretary',0,0,'L',0);
					$pdf->SetXY(10,145);
					$pdf->Cell(10,8,'-------------------------------------------------------------------------------------------------',0,0,'L',0);

					$flag=1;
	
				}
				else
				{
					$pdf->SetFont('Times','B',14);
					$pdf->SetXY(10,20+$offset);
					$pdf->Cell(190,4,$var,0,0,'L',0);
					$pdf->SetXY(170,20+$offset);
					$pdf->Cell(190,4,"Confidential",0,0,'L',0);
					$pdf->SetXY(63,30+$offset);
					$pdf->Cell(190,4,'Nagaland Board of School Education',0,0,'L',0);
					$pdf->Ln();
					$pdf->Cell(190,8,'Kohima',0,0,'C',0);
					$pdf->Ln();
					$pdf->SetFont('Times','B',17);
					$pdf->Cell(190,8,$subjectHSSLC.$display_date,0,0,'C',0);
					$pdf->SetFont('Times','B',$font);
					$pdf->SetXY(20,40+$offset);
					//$pdf->Cell(190,12,$row['sl'],0,0,'L',0);
					$pdf->Ln();
					$pdf->Ln();
					$pdf->SetFont('Times','',12);
					$pdf->SetXY(10,57+$offset);
					$pdf->Cell(190,10,'Date of examination :    	
				                                                                     Time : ',0,0,'L',0);
					$pdf->SetFont('Times','B',15);
					$pdf->SetXY(50,57+$offset);
					$pdf->Cell(190,10,$date,0,0,'L',0);
					$pdf->SetXY(140,57+$offset);
					$pdf->Cell(190,10,$time,0,0,'L',0);

					$pdf->SetFont('Times','',12);

					$pdf->SetXY(10,65+$offset);
					$pdf->Cell(190,12,'Subject:                                                                                               Copies of question papers enclosed: ',0,0,'L',0);
					$pdf->SetFont('Times','B',16);
					$pdf->SetXY(25,65+$offset);
					$pdf->Cell(190,12,iconv('UTF-8','windows-1252',$sub),0,0,'L',0);
					$pdf->SetXY(186,65+$offset);
					$pdf->Cell(190,12,$row[$sub2],0,0,'L',0);
					$pdf->SetFont('Times','',12);
					$pdf->Ln();
			
					$pdf->Cell(10,8,'.......................................................                                                             .......................................................',0,0,'L',0);

					$pdf->Ln();
					$pdf->Cell(10,8,'                  counted by                                                                                                verified & packed by',0,0,'L',0);

					$pdf->Ln();
					$pdf->Cell(10,8,'Name of the School/Centre  ',0,0,'L',0);
					$pdf->SetFont('Times','B',16);
					$pdf->SetXY(60,92+$offset);
					$pdf->Cell(10,8,$row['centre'],0,0,'L',0);
					$pdf->Ln();
					$pdf->Ln();

					$pdf->Image('aaa.gif',115,105+$offset,70,15);
					$pdf->Ln();

					$pdf->Cell(10,8,'                                                                                  Additional Secretary',0,0,'L',0);


					$flag=0;
	
				}

			}
	}
}


// TOPSHEET FOR CLASS ELEVEN
// CLASS XI(COMMERCE)

else if($class=='11c')
{
	$tableName	=	"c11c_pkChrt"; $timetbl='c11c_timetbl';
	if($sub=="eng" || $sub=="ffm" || $sub=="ent" || $sub=="bus" || $sub=="fbm" || $sub=="evs" || $sub=="acc" || $sub=="eco" || $sub=="muf" || $sub=="csc" || $sub=="inf" || $sub=="itv" || $sub=="ttv" || $sub=="rtv" || $sub=="hcv")
	{
		if($sub=="eng"){$subName='English';}
		if($sub=="ffm"){$subName='Financial Market Management';}
		if($sub=="ent"){$subName='Entrepreneurship';}
		if($sub=="bus"){$subName='Business Studies';}
		if($sub=="evs"){$subName='Environmental Education';}
		if($sub=="fbm"){$subName='Fundamentals of Business Mathematics';}
		if($sub=="acc"){$subName='Accountancy';}
		if($sub=="eco"){$subName='Economics';}
		if($sub=="muf"){$subName='Mutual Funds';}
		if($sub=="csc"){$subName='Computer Science';}
		if($sub=="inf"){$subName='Informatics Practices';}
		if($sub=="itv"){$subName='Information Technology';}
		if($sub=="ttv"){$subName='Tourism & Hospitality';}
		if($sub=="rtv"){$subName='Retail';}
		if($sub=="hcv"){$subName='Healthcare';}


		$query1 = mysql_query("select * from $timetbl where subcode like '%$sub%'");
		$find = mysql_fetch_array($query1);$sl=$find['sl'];
		function getExamDate($sl,$timetbl)
		{
			$query1 = mysql_query("select * from $timetbl where sl='$sl'");
			$find = mysql_fetch_array($query1);
			if($find['e_date']!='')
			{
			return $find['e_date'];
			}
			else {
					$sl=$sl-1;

					 return getExamDate($sl,$timetbl);
				}
		}

		if($sub=='itv' || $sub=='ttv' || $sub=='rtv' || $sub=='hcv')
		{
			$time=$Vtime;
		}
		else
		{
			$time=$Etime;
		}
		$flag=0;
		$offset=149;
		$pdf= new FPDF('P','mm','a4');
		$pdf->SetFont('Times','',12);
		$r=mysql_query("select * from $tableName where district='$dist' and $sub>0 ") or die(mysql_error());
		while($row=mysql_fetch_array($r,MYSQL_ASSOC))
		{
			if($flag==0)
			{
				$pdf->AddPage();
				$pdf->SetFont('Times','B',18);
				$pdf->SetXY(10,20);
				$pdf->Cell(190,4,$row['sl'],0,0,'L',0);
				$pdf->SetFont('Times','B',14);
				$pdf->SetXY(170,20);
				$pdf->Cell(190,4,"Confidential",0,0,'L',0);
				$pdf->SetFont('Times','B',14);
				$pdf->SetXY(63,30);
				$pdf->Cell(190,4,'Nagaland Board of School Education',0,0,'L',0);
				$pdf->Ln();
				$pdf->Cell(190,8,'Kohima',0,0,'C',0);
				$pdf->Ln();
				$pdf->SetFont('Times','B',17);
				$pdf->Cell(190,8,'Class - XI Promotion Examination'.$display_date,0,0,'C',0);
				$pdf->SetFont('Times','B',$font);
				$pdf->SetXY(20,40);
				//$pdf->Cell(190,12,$row['sl'],0,0,'L',0);
				$pdf->Ln();
				$pdf->Ln();
				$pdf->SetFont('Times','',12);
				$pdf->SetXY(10,57);
				$pdf->Cell(190,10,'Date of examination :    	
	                                                                  Time : ',0,0,'L',0);
				$pdf->SetFont('Times','B',15);
				$pdf->SetXY(50,57);
				$pdf->Cell(190,10,getExamDate($sl,$timetbl),0,0,'L',0);
				$pdf->SetXY(140,57);
				$pdf->Cell(190,10,$time,0,0,'L',0);
				$pdf->SetFont('Times','',12);
				$pdf->SetXY(10,65);
				$pdf->Cell(190,12,'Subject:                                                                                               Copies of question papers enclosed: ',0,0,'L',0);
				$pdf->SetFont('Times','B',16);
				$pdf->SetXY(25,65);
				$pdf->Cell(190,12,$subName,0,0,'L',0);
				$pdf->SetXY(186,65);
				$pdf->Cell(190,12,$row[$sub],0,0,'L',0);
				$pdf->SetFont('Times','',12);
				$pdf->Ln();
		
				$pdf->Cell(10,8,'.......................................................                                                             .......................................................',0,0,'L',0);

				$pdf->Ln();
				$pdf->Cell(10,8,'                  counted by                                                                                                verified & packed by',0,0,'L',0);

				$pdf->Ln();
				$pdf->Cell(10,8,'Name of the School/Centre  ',0,0,'L',0);
				$pdf->SetFont('Times','B',16);
				$pdf->SetXY(60,92);
				$pdf->Cell(10,8,$row['centre'],0,0,'L',0);
				$pdf->Ln();
				$pdf->Ln();
				$pdf->Image('aaa.gif',115,105,70,15);
				$pdf->Ln();

				$pdf->Cell(10,8,'                                                                                  Additional Secretary',0,0,'L',0);
				$pdf->SetXY(10,145);
				$pdf->Cell(10,8,'-------------------------------------------------------------------------------------------------',0,0,'L',0);
				$flag=1;
		
			}
			else
			{
				$pdf->SetFont('Times','B',18);
				$pdf->SetXY(10,20+$offset);
				$pdf->Cell(190,4,$row['sl'],0,0,'L',0);
				$pdf->SetFont('Times','B',14);
				$pdf->SetXY(170,20+$offset);
				$pdf->Cell(190,4,"Confidential",0,0,'L',0);
				$pdf->SetFont('Times','B',14);
				$pdf->SetXY(63,30+$offset);
				$pdf->Cell(190,4,'Nagaland Board of School Education',0,0,'L',0);
				$pdf->Ln();
				$pdf->Cell(190,8,'Kohima',0,0,'C',0);
				$pdf->Ln();
				$pdf->SetFont('Times','B',17);
				$pdf->Cell(190,8,'Class - XI Promotion Examination'.$display_date,0,0,'C',0);
				$pdf->SetFont('Times','B',$font);
				$pdf->SetXY(20,40+$offset);
				//$pdf->Cell(190,12,$row['sl'],0,0,'L',0);
				$pdf->Ln();
				$pdf->Ln();
				$pdf->SetFont('Times','',12);
				$pdf->SetXY(10,57+$offset);
				$pdf->Cell(190,10,'Date of examination :    	
	                                                                  Time : ',0,0,'L',0);
				$pdf->SetFont('Times','B',15);
				$pdf->SetXY(50,57+$offset);
				$pdf->Cell(190,10,getExamDate($sl,$timetbl),0,0,'L',0);
				$pdf->SetXY(140,57+$offset);
				$pdf->Cell(190,10,$time,0,0,'L',0);
				$pdf->SetFont('Times','',12);
				$pdf->SetXY(10,65+$offset);
				$pdf->Cell(190,12,'Subject:                                                                                               Copies of question papers enclosed: ',0,0,'L',0);
				$pdf->SetFont('Times','B',16);
				$pdf->SetXY(25,65+$offset);
				$pdf->Cell(190,12,$subName,0,0,'L',0);
				$pdf->SetXY(186,65+$offset);
				$pdf->Cell(190,12,$row[$sub],0,0,'L',0);
				$pdf->SetFont('Times','',12);
				$pdf->Ln();
				$pdf->Cell(10,8,'.......................................................                                                             .......................................................',0,0,'L',0);

				$pdf->Ln();
				$pdf->Cell(10,8,'                  counted by                                                                                                verified & packed by',0,0,'L',0);
				$pdf->Ln();
				$pdf->Cell(10,8,'Name of the School/Centre  ',0,0,'L',0);
				$pdf->SetFont('Times','B',16);
				$pdf->SetXY(60,92+$offset);
				$pdf->Cell(10,8,$row['centre'],0,0,'L',0);
				$pdf->Ln();
				$pdf->Ln();
				$pdf->Image('aaa.gif',115,105+$offset,70,15);
				$pdf->Ln();
				$pdf->Cell(10,8,'                                                                                  Additional Secretary',0,0,'L',0);
				$flag=0;
	
			}

		}
	} 
	else if($sub=="tny" || $sub=="smi" || $sub=="aon" || $sub=="lta" || $sub=="bng" || $sub=="alt" || $sub=="hnd")
	{
		$sub1="Mils";//$date='3rd December 2016';
		$query1 = mysql_query("select * from $timetbl where subject like '%$sub1%'");
		$find = mysql_fetch_array($query1);$date=$find['e_date'];
		
		$r=mysql_query("select * from $tableName where district='$dist' and $sub>0 ") or die(mysql_error());
		if($sub=='tny'){ $sub="TENYIDIE";  $sub2='tny';}
		if($sub=='aon'){ $sub="AO";  $sub2='aon';}
		if($sub=='hnd'){ $sub="HINDI";  $sub2='hnd';}
		if($sub=='lta'){ $sub="LOTHA";  $sub2='lta';}
		if($sub=='bng'){ $sub="BENGALI";  $sub2='bng';}
		if($sub=='alt'){ $sub="Alternative English"; $sub2='alt'; }
		if($sub=='smi'){ $sub="SUMI(Sütsah)";  $sub2='smi';}
		$time=$Etime;
		$flag=0;
		$offset=149;
		$pdf= new FPDF('P','mm','a4');
		$pdf->SetFont('Times','',12);
		while($row=mysql_fetch_array($r,MYSQL_ASSOC))
		{
			if($flag==0)
			{
				$pdf->AddPage();
				$pdf->SetFont('Times','B',18);
				$pdf->SetXY(10,20);
				$pdf->Cell(190,4,$row['sl'],0,0,'L',0);
				$pdf->SetFont('Times','B',14);
				$pdf->SetXY(170,20);
				$pdf->Cell(190,4,"Confidential",0,0,'L',0);
				$pdf->SetXY(63,30);
				$pdf->Cell(190,4,'Nagaland Board of School Education',0,0,'L',0);
				$pdf->Ln();
				$pdf->Cell(190,8,'Kohima',0,0,'C',0);
				$pdf->Ln();
				$pdf->SetFont('Times','B',17);
				$pdf->Cell(190,8,'Class - XI Promotion Examination'.$display_date,0,0,'C',0);
				$pdf->SetFont('Times','B',$font);
				$pdf->SetFont('Times','B',$font);
				$pdf->SetXY(20,40);
				//$pdf->Cell(190,12,$row['sl'],0,0,'L',0);
				$pdf->Ln();
				$pdf->Ln();
				$pdf->SetFont('Times','',12);
				$pdf->SetXY(10,57);
				$pdf->Cell(190,10,'Date of examination :    	
			                                                                    Time : ',0,0,'L',0);
				$pdf->SetFont('Times','B',15);
				$pdf->SetXY(50,57);
				$pdf->Cell(190,10,$date,0,0,'L',0);
				$pdf->SetXY(140,57);
				$pdf->Cell(190,10,$time,0,0,'L',0);

				$pdf->SetFont('Times','',12);

				$pdf->SetXY(10,65);
				$pdf->Cell(190,12,'Subject:                                                                                               Copies of question papers enclosed: ',0,0,'L',0);
				$pdf->SetFont('Times','B',16);
				$pdf->SetXY(25,65);
				$pdf->Cell(190,12,iconv('UTF-8','windows-1252',$sub),0,0,'L',0);
				$pdf->SetXY(186,65);
				$pdf->Cell(190,12,$row[$sub2],0,0,'L',0);
				$pdf->SetFont('Times','',12);
				$pdf->Ln();
		
				$pdf->Cell(10,8,'.......................................................                                                             .......................................................',0,0,'L',0);

				$pdf->Ln();
				$pdf->Cell(10,8,'                  counted by                                                                                                verified & packed by',0,0,'L',0);

				$pdf->Ln();
				$pdf->Cell(10,8,'Name of the School/Centre  ',0,0,'L',0);
				$pdf->SetFont('Times','B',16);
				$pdf->SetXY(60,92);
				$pdf->Cell(10,8,$row['centre'],0,0,'L',0);
				$pdf->Ln();
				$pdf->Ln();

				$pdf->Image('aaa.gif',115,105,70,15);
				$pdf->Ln();

				$pdf->Cell(10,8,'                                                                                  Additional Secretary',0,0,'L',0);
				$pdf->SetXY(10,145);
				$pdf->Cell(10,8,'-------------------------------------------------------------------------------------------------',0,0,'L',0);

				$flag=1;
	
			}
			else
			{
				$pdf->SetFont('Times','B',18);
				$pdf->SetXY(10,20+$offset);
				$pdf->Cell(190,4,$row['sl'],0,0,'L',0);
				$pdf->SetFont('Times','B',14);
				$pdf->SetXY(170,20+$offset);
				$pdf->Cell(190,4,"Confidential",0,0,'L',0);
				$pdf->SetXY(63,30+$offset);
				$pdf->Cell(190,4,'Nagaland Board of School Education',0,0,'L',0);
				$pdf->Ln();
				$pdf->Cell(190,8,'Kohima',0,0,'C',0);
				$pdf->Ln();
				$pdf->SetFont('Times','B',17);
				$pdf->Cell(190,8,'Class - XI Promotion Examination'.$display_date,0,0,'C',0);
				$pdf->SetFont('Times','B',$font);
				$pdf->SetXY(20,40+$offset);
				//$pdf->Cell(190,12,$row['sl'],0,0,'L',0);
				$pdf->Ln();
				$pdf->Ln();
				$pdf->SetFont('Times','',12);
				$pdf->SetXY(10,57+$offset);
				$pdf->Cell(190,10,'Date of examination :    	
			                                                                     Time : ',0,0,'L',0);
				$pdf->SetFont('Times','B',15);
				$pdf->SetXY(50,57+$offset);
				$pdf->Cell(190,10,$date,0,0,'L',0);
				$pdf->SetXY(140,57+$offset);
				$pdf->Cell(190,10,$time,0,0,'L',0);

				$pdf->SetFont('Times','',12);

				$pdf->SetXY(10,65+$offset);
				$pdf->Cell(190,12,'Subject:                                                                                               Copies of question papers enclosed: ',0,0,'L',0);
				$pdf->SetFont('Times','B',16);
				$pdf->SetXY(25,65+$offset);
				$pdf->Cell(190,12,iconv('UTF-8','windows-1252',$sub),0,0,'L',0);
				$pdf->SetXY(186,65+$offset);
				$pdf->Cell(190,12,$row[$sub2],0,0,'L',0);
				$pdf->SetFont('Times','',12);
				$pdf->Ln();
		
				$pdf->Cell(10,8,'.......................................................                                                             .......................................................',0,0,'L',0);

				$pdf->Ln();
				$pdf->Cell(10,8,'                  counted by                                                                                                verified & packed by',0,0,'L',0);

				$pdf->Ln();
				$pdf->Cell(10,8,'Name of the School/Centre  ',0,0,'L',0);
				$pdf->SetFont('Times','B',16);
				$pdf->SetXY(60,92+$offset);
				$pdf->Cell(10,8,$row['centre'],0,0,'L',0);
				$pdf->Ln();
				$pdf->Ln();

				$pdf->Image('aaa.gif',115,105+$offset,70,15);
				$pdf->Ln();

				$pdf->Cell(10,8,'                                                                                  Additional Secretary',0,0,'L',0);


				$flag=0;
	
			}

		}
	}

}

// TOPSHEET FOR CLASS TWELVE
// HSSLC(COMMERCE)

else if($class=='12c')
{
	$tableName	=	"c12c_pkChrt"; $timetbl='c12c_timetbl';
	if($sub=="eng" || $sub=="cmo" || $sub=="ent" || $sub=="bus" || $sub=="fbm" || $sub=="acc" || $sub=="eco" || $sub=="dmo" || $sub=="csc" || $sub=="inf" || $sub=="itv" || $sub=="ttv" || $sub=="grp" || $sub=="fmm")
	{
		if($sub=="eng"){$subName='English';}
		if($sub=="cmo"){$subName='Capital Markets';}
		if($sub=="ent"){$subName='Entrepreneurship';}
		if($sub=="bus"){$subName='Business Studies';}
		if($sub=="fbm"){$subName='Fundamentals of Business Mathematics';}
		if($sub=="fmm"){$subName='Financial Markets Management';}
		if($sub=="grp"){$subName='FBM(Graph)';}
		if($sub=="acc"){$subName='Accountancy';}
		if($sub=="eco"){$subName='Economics';}
		if($sub=="dmo"){$subName='Derivative Markets';}
		if($sub=="csc"){$subName='Computer Science';}
		if($sub=="inf"){$subName='Informatics Practices';}
		if($sub=="itv"){$subName='Information Technology';}
		if($sub=="ttv"){$subName='Tourism & Hospitality';}

		if($sub=="grp")
		{
			$query1 = mysql_query("select * from $timetbl where subcode = 'fbm'");
		} 
		/*elseif ($sub=="acc_nc"||$sub=="acc_oc") 
		{
			$query1 = mysql_query("select * from $timetbl where subcode = 'acc'");
		}
		elseif ($sub=="bus_nc"||$sub=="bus_oc") 
		{
			$query1 = mysql_query("select * from $timetbl where subcode = 'bus'");
		}
		elseif ($sub=="ent_nc"||$sub=="ent_oc") 
		{
			$query1 = mysql_query("select * from $timetbl where subcode = 'ent'");
		}*/
		else 
		{
			$query1 = mysql_query("select * from $timetbl where subcode = '$sub'");
		}
		$find = mysql_fetch_array($query1);$sl=$find['sl'];
		function getExamDate($sl,$timetbl)
		{
			$query2 = mysql_query("select * from $timetbl where sl='$sl'");
			$find = mysql_fetch_array($query2);
			if($find['e_date']=='')
			{
				$sl = $sl-1;
				return getExamDate($sl,$timetbl);
			
			}
			else 
			{
				return $find['e_date'];
			}
		}
		
		
		if($sub=='itv' || $sub=='ttv' || $sub=='rtv' || $sub=='hcv' || $sub=='btv' || $sub=='ehv' || $sub=='agv' || $sub=='atv' || $sub=='ent' || $sub=='atv' || $sub=='fmm')
		{
			$time=$Vtime;
		}
		else
		{
			$time=$Etime;
		}
		$flag=0;
		$offset=149;
		$pdf= new FPDF('P','mm','a4');
		$pdf->SetFont('Times','',12);
		$r=mysql_query("select * from $tableName where district='$dist' and $sub>0 ") or die(mysql_error());
		while($row=mysql_fetch_array($r,MYSQL_ASSOC))
		{
			if($flag==0)
			{
				if($row['district']=='Vistse'){$var='Kohima';}else {$var=$row['district'];}
				$pdf->AddPage();
				$pdf->SetFont('Times','B',14);
				$pdf->SetXY(10,20);
				$pdf->Cell(190,4,$var,0,0,'L',0);
				$pdf->SetXY(170,20);
				$pdf->Cell(190,4,"Confidential",0,0,'L',0);
				$pdf->SetFont('Times','B',14);
				$pdf->SetXY(63,30);
				$pdf->Cell(190,4,'Nagaland Board of School Education',0,0,'L',0);
				$pdf->Ln();
				$pdf->Cell(190,8,'Kohima',0,0,'C',0);
				$pdf->Ln();
				$pdf->SetFont('Times','B',17);
				$pdf->Cell(190,8,$subjectHSSLC.$display_date,0,0,'C',0);
				$pdf->SetFont('Times','B',$font);
				$pdf->SetXY(20,40);
				//$pdf->Cell(190,12,$row['sl'],0,0,'L',0);
				$pdf->Ln();
				$pdf->Ln();
				$pdf->SetFont('Times','',12);
				$pdf->SetXY(10,57);
				$pdf->Cell(190,10,'Date of examination :    	
	                                                                  Time : ',0,0,'L',0);
				$pdf->SetFont('Times','B',15);
				$pdf->SetXY(50,57);
				$pdf->Cell(190,10,getExamDate($sl,$timetbl),0,0,'L',0);
				$pdf->SetXY(140,57);
				$pdf->Cell(190,10,$time,0,0,'L',0);
				$pdf->SetFont('Times','',12);
				$pdf->SetXY(10,65);
				$pdf->Cell(190,12,'Subject:                                                                                               Copies of question papers enclosed: ',0,0,'L',0);
				$pdf->SetFont('Times','B',16);
				$pdf->SetXY(25,65);
				$pdf->Cell(190,12,$subName,0,0,'L',0);
				$pdf->SetXY(186,65);
				$pdf->Cell(190,12,$row[$sub],0,0,'L',0);
				$pdf->SetFont('Times','',12);
				$pdf->Ln();
		
				$pdf->Cell(10,8,'.......................................................                                                             .......................................................',0,0,'L',0);

				$pdf->Ln();
				$pdf->Cell(10,8,'                  counted by                                                                                                verified & packed by',0,0,'L',0);

				$pdf->Ln();
				$pdf->Cell(10,8,'Name of the School/Centre  ',0,0,'L',0);
				$pdf->SetFont('Times','B',16);
				$pdf->SetXY(60,92);
				$pdf->Cell(10,8,$row['centre'],0,0,'L',0);
				$pdf->Ln();
				$pdf->Ln();
				$pdf->Image('aaa.gif',115,105,70,15);
				$pdf->Ln();

				$pdf->Cell(10,8,'                                                                                  Additional Secretary',0,0,'L',0);
				$pdf->SetXY(10,145);
				$pdf->Cell(10,8,'-------------------------------------------------------------------------------------------------',0,0,'L',0);
				$flag=1;
	
			}
			else
			{
				$pdf->SetFont('Times','B',14);
				$pdf->SetXY(10,20+$offset);
				$pdf->Cell(190,4,$var,0,0,'L',0);
				$pdf->SetXY(170,20+$offset);
				$pdf->Cell(190,4,"Confidential",0,0,'L',0);
				$pdf->SetFont('Times','B',14);
				$pdf->SetXY(63,30+$offset);
				$pdf->Cell(190,4,'Nagaland Board of School Education',0,0,'L',0);
				$pdf->Ln();
				$pdf->Cell(190,8,'Kohima',0,0,'C',0);
				$pdf->Ln();
				$pdf->SetFont('Times','B',17);
				$pdf->Cell(190,8,$subjectHSSLC.$display_date,0,0,'C',0);
				$pdf->SetFont('Times','B',$font);
				$pdf->SetXY(20,40+$offset);
				//$pdf->Cell(190,12,$row['sl'],0,0,'L',0);
				$pdf->Ln();
				$pdf->Ln();
				$pdf->SetFont('Times','',12);
				$pdf->SetXY(10,57+$offset);
				$pdf->Cell(190,10,'Date of examination :    	
	                                                                  Time : ',0,0,'L',0);
				$pdf->SetFont('Times','B',15);
				$pdf->SetXY(50,57+$offset);
				$pdf->Cell(190,10,getExamDate($sl,$timetbl),0,0,'L',0);
				$pdf->SetXY(140,57+$offset);
				$pdf->Cell(190,10,$time,0,0,'L',0);
				$pdf->SetFont('Times','',12);
				$pdf->SetXY(10,65+$offset);
				$pdf->Cell(190,12,'Subject:                                                                                               Copies of question papers enclosed: ',0,0,'L',0);
				$pdf->SetFont('Times','B',16);
				$pdf->SetXY(25,65+$offset);
				$pdf->Cell(190,12,$subName,0,0,'L',0);
				$pdf->SetXY(186,65+$offset);
				$pdf->Cell(190,12,$row[$sub],0,0,'L',0);
				$pdf->SetFont('Times','',12);
				$pdf->Ln();
				$pdf->Cell(10,8,'.......................................................                                                             .......................................................',0,0,'L',0);

				$pdf->Ln();
				$pdf->Cell(10,8,'                  counted by                                                                                                verified & packed by',0,0,'L',0);
				$pdf->Ln();
				$pdf->Cell(10,8,'Name of the School/Centre  ',0,0,'L',0);
				$pdf->SetFont('Times','B',16);
				$pdf->SetXY(60,92+$offset);
				$pdf->Cell(10,8,$row['centre'],0,0,'L',0);
				$pdf->Ln();
				$pdf->Ln();
				$pdf->Image('aaa.gif',115,105+$offset,70,15);
				$pdf->Ln();
				$pdf->Cell(10,8,'                                                                                  Additional Secretary',0,0,'L',0);
				$flag=0;
	
			}

		}
	}

	else if($sub=="tny" || $sub=="smi" || $sub=="aon" || $sub=="lta" || $sub=="bng" || $sub=="alt" || $sub=="hnd")
	{
		$sub1="Mils";//$date='3rd December 2016';
		$query1 = mysql_query("select * from $timetbl where subject like '%$sub1%'");
		$find = mysql_fetch_array($query1);$date=$find['e_date'];
		
		$r=mysql_query("select * from $tableName where district='$dist' and $sub>0 ") or die(mysql_error());
		if($sub=='tny'){ $sub="TENYIDIE";  $sub2='tny';}
		if($sub=='aon'){ $sub="AO";  $sub2='aon';}
		if($sub=='hnd'){ $sub="HINDI";  $sub2='hnd';}
		if($sub=='lta'){ $sub="LOTHA";  $sub2='lta';}
		if($sub=='bng'){ $sub="BENGALI";  $sub2='bng';}
		if($sub=='alt'){ $sub="Alternative English"; $sub2='alt'; }
		if($sub=='smi'){ $sub="SUMI(Sütsah)";  $sub2='smi';}
		$time=$Vtime;
		$flag=0;
		$offset=149;
		$pdf= new FPDF('P','mm','a4');
		$pdf->SetFont('Times','',12);
		while($row=mysql_fetch_array($r,MYSQL_ASSOC))
		{
			if($flag==0)
			{
				if($row['district']=='Vistse'){$var='Kohima';}else {$var=$row['district'];}
				$pdf->AddPage();
				$pdf->SetFont('Times','B',14);
				$pdf->SetXY(10,20);
				$pdf->Cell(190,4,$var,0,0,'L',0);
				$pdf->SetXY(170,20);
				$pdf->Cell(190,4,"Confidential",0,0,'L',0);
				$pdf->SetXY(63,30);
				$pdf->Cell(190,4,'Nagaland Board of School Education',0,0,'L',0);
				$pdf->Ln();
				$pdf->Cell(190,8,'Kohima',0,0,'C',0);
				$pdf->Ln();
				$pdf->SetFont('Times','B',17);
				$pdf->Cell(190,8,$subjectHSSLC.$display_date,0,0,'C',0);
				$pdf->SetFont('Times','B',$font);
				$pdf->SetFont('Times','B',$font);
				$pdf->SetXY(20,40);
				//$pdf->Cell(190,12,$row['sl'],0,0,'L',0);
				$pdf->Ln();
				$pdf->Ln();
				$pdf->SetFont('Times','',12);
				$pdf->SetXY(10,57);
				$pdf->Cell(190,10,'Date of examination :    	
			                                                                    Time : ',0,0,'L',0);
				$pdf->SetFont('Times','B',15);
				$pdf->SetXY(50,57);
				$pdf->Cell(190,10,$date,0,0,'L',0);
				$pdf->SetXY(140,57);
				$pdf->Cell(190,10,$time,0,0,'L',0);

				$pdf->SetFont('Times','',12);

				$pdf->SetXY(10,65);
				$pdf->Cell(190,12,'Subject:                                                                                               Copies of question papers enclosed: ',0,0,'L',0);
				$pdf->SetFont('Times','B',16);
				$pdf->SetXY(25,65);
				$pdf->Cell(190,12,iconv('UTF-8','windows-1252',$sub),0,0,'L',0);
				$pdf->SetXY(186,65);
				$pdf->Cell(190,12,$row[$sub2],0,0,'L',0);
				$pdf->SetFont('Times','',12);
				$pdf->Ln();
	
				$pdf->Cell(10,8,'.......................................................                                                             .......................................................',0,0,'L',0);

				$pdf->Ln();
				$pdf->Cell(10,8,'                  counted by                                                                                                verified & packed by',0,0,'L',0);

				$pdf->Ln();
				$pdf->Cell(10,8,'Name of the School/Centre  ',0,0,'L',0);
				$pdf->SetFont('Times','B',16);
				$pdf->SetXY(60,92);
				$pdf->Cell(10,8,$row['centre'],0,0,'L',0);
				$pdf->Ln();
				$pdf->Ln();

				$pdf->Image('aaa.gif',115,105,70,15);
				$pdf->Ln();

				$pdf->Cell(10,8,'                                                                                  Additional Secretary',0,0,'L',0);
				$pdf->SetXY(10,145);
				$pdf->Cell(10,8,'-------------------------------------------------------------------------------------------------',0,0,'L',0);

				$flag=1;
	
			}
			else
			{
				$pdf->SetFont('Times','B',14);
				$pdf->SetXY(10,20+$offset);
				$pdf->Cell(190,4,$var,0,0,'L',0);
				$pdf->SetXY(170,20+$offset);
				$pdf->Cell(190,4,"Confidential",0,0,'L',0);
				$pdf->SetXY(63,30+$offset);
				$pdf->Cell(190,4,'Nagaland Board of School Education',0,0,'L',0);
				$pdf->Ln();
				$pdf->Cell(190,8,'Kohima',0,0,'C',0);
				$pdf->Ln();
				$pdf->SetFont('Times','B',17);
				$pdf->Cell(190,8,$subjectHSSLC.$display_date,0,0,'C',0);
				$pdf->SetFont('Times','B',$font);
				$pdf->SetXY(20,40+$offset);
				//$pdf->Cell(190,12,$row['sl'],0,0,'L',0);
				$pdf->Ln();
				$pdf->Ln();
				$pdf->SetFont('Times','',12);
				$pdf->SetXY(10,57+$offset);
				$pdf->Cell(190,10,'Date of examination :    	
			                                                                     Time : ',0,0,'L',0);
				$pdf->SetFont('Times','B',15);
				$pdf->SetXY(50,57+$offset);
				$pdf->Cell(190,10,$date,0,0,'L',0);
				$pdf->SetXY(140,57+$offset);
				$pdf->Cell(190,10,$time,0,0,'L',0);

				$pdf->SetFont('Times','',12);

				$pdf->SetXY(10,65+$offset);
				$pdf->Cell(190,12,'Subject:                                                                                               Copies of question papers enclosed: ',0,0,'L',0);
				$pdf->SetFont('Times','B',16);
				$pdf->SetXY(25,65+$offset);
				$pdf->Cell(190,12,$sub,0,0,'L',0);
				$pdf->SetXY(186,65+$offset);
				$pdf->Cell(190,12,$row[$sub2],0,0,'L',0);
				$pdf->SetFont('Times','',12);
				$pdf->Ln();
	
				$pdf->Cell(10,8,'.......................................................                                                             .......................................................',0,0,'L',0);

				$pdf->Ln();
				$pdf->Cell(10,8,'                  counted by                                                                                                verified & packed by',0,0,'L',0);

				$pdf->Ln();
				$pdf->Cell(10,8,'Name of the School/Centre  ',0,0,'L',0);
				$pdf->SetFont('Times','B',16);
				$pdf->SetXY(60,92+$offset);
				$pdf->Cell(10,8,$row['centre'],0,0,'L',0);
				$pdf->Ln();
				$pdf->Ln();

				$pdf->Image('aaa.gif',115,105+$offset,70,15);
				$pdf->Ln();

				$pdf->Cell(10,8,'                                                                                  Additional Secretary',0,0,'L',0);


				$flag=0;
	
			}

		}
	}

}


// TOPSHEET FOR CLASS ELEVEN
// CLASS XI(SCIENCE)

else if($class=='11s')
{
	$tableName	=	"c11s_pkChrt"; $timetbl='c11s_timetbl';
	if($sub=="eng" || $sub=="phy" || $sub=="che" || $sub=="mat" || $sub=="bio" || $sub=="evs" || $sub=="csc" || $sub=="inf" || $sub=="itv" || $sub=="ttv")
	{
		if($sub=="eng"){$subName='English';}
		if($sub=="phy"){$subName='Physics';}
		if($sub=="che"){$subName='Chemistry';}
		if($sub=="mat"){$subName='Mathematics';}
		if($sub=="evs"){$subName='Environmental Education';}
		if($sub=="bio"){$subName='Biology';}
		if($sub=="csc"){$subName='Computer Science';}
		if($sub=="inf"){$subName='Informatics Practices';}
		if($sub=="itv"){$subName='Information Technology';}
		if($sub=="ttv"){$subName='Tourism & Hospitality';}


		$query1 = mysql_query("select * from $timetbl where subcode like '%$sub%'");
		$find = mysql_fetch_array($query1);$sl=$find['sl'];
		function getExamDate($sl,$timetbl)
		{
			$query1 = mysql_query("select * from $timetbl where sl='$sl'");
			$find = mysql_fetch_array($query1);
			if($find['e_date']!='')
			{
				return $find['e_date'];
			}
			else 
			{
				$sl=$sl-1;
				return getExamDate($sl,$timetbl);
			}
		}

		if($sub=='itv' || $sub=='ttv')
		{
			$time=$Vtime;
		}
		else
		{
			$time=$Etime;
		}
		$flag=0;
		$offset=149;
		$pdf= new FPDF('P','mm','a4');
		$pdf->SetFont('Times','',12);
		$r=mysql_query("select * from $tableName where district='$dist' and $sub>0 ") or die(mysql_error());
		while($row=mysql_fetch_array($r,MYSQL_ASSOC))
		{
			if($flag==0)
			{
				$pdf->AddPage();
				$pdf->SetFont('Times','B',18);
				$pdf->SetXY(10,20);
				$pdf->Cell(190,4,$row['sl'],0,0,'L',0);
				$pdf->SetFont('Times','B',14);
				$pdf->SetXY(170,20);
				$pdf->Cell(190,4,"Confidential",0,0,'L',0);
				$pdf->SetFont('Times','B',14);
				$pdf->SetXY(63,30);
				$pdf->Cell(190,4,'Nagaland Board of School Education',0,0,'L',0);
				$pdf->Ln();
				$pdf->Cell(190,8,'Kohima',0,0,'C',0);
				$pdf->Ln();
				$pdf->SetFont('Times','B',17);
				$pdf->Cell(190,8,'Class - XI Promotion Examination'.$display_date,0,0,'C',0);
				$pdf->SetFont('Times','B',$font);
				$pdf->SetXY(20,40);
				//$pdf->Cell(190,12,$row['sl'],0,0,'L',0);
				$pdf->Ln();
				$pdf->Ln();
				$pdf->SetFont('Times','',12);
				$pdf->SetXY(10,57);
				$pdf->Cell(190,10,'Date of examination :    	
	                                                                  Time : ',0,0,'L',0);
				$pdf->SetFont('Times','B',15);
				$pdf->SetXY(50,57);
				$pdf->Cell(190,10,getExamDate($sl,$timetbl),0,0,'L',0);
				$pdf->SetXY(140,57);
				$pdf->Cell(190,10,$time,0,0,'L',0);
				$pdf->SetFont('Times','',12);
				$pdf->SetXY(10,65);
				$pdf->Cell(190,12,'Subject:                                                                                               Copies of question papers enclosed: ',0,0,'L',0);
				$pdf->SetFont('Times','B',16);
				$pdf->SetXY(25,65);
				$pdf->Cell(190,12,$subName,0,0,'L',0);
				$pdf->SetXY(186,65);
				$pdf->Cell(190,12,$row[$sub],0,0,'L',0);
				$pdf->SetFont('Times','',12);
				$pdf->Ln();
		
				$pdf->Cell(10,8,'.......................................................                                                             .......................................................',0,0,'L',0);

				$pdf->Ln();
				$pdf->Cell(10,8,'                  counted by                                                                                                verified & packed by',0,0,'L',0);

				$pdf->Ln();
				$pdf->Cell(10,8,'Name of the School/Centre  ',0,0,'L',0);
				$pdf->SetFont('Times','B',16);
				$pdf->SetXY(60,92);
				$pdf->Cell(10,8,$row['centre'],0,0,'L',0);
				$pdf->Ln();
				$pdf->Ln();
				$pdf->Image('aaa.gif',115,105,70,15);
				$pdf->Ln();

				$pdf->Cell(10,8,'                                                                                  Additional Secretary',0,0,'L',0);
				$pdf->SetXY(10,145);
				$pdf->Cell(10,8,'-------------------------------------------------------------------------------------------------',0,0,'L',0);
				$flag=1;
	
			}
			else
			{
				$pdf->SetFont('Times','B',18);
				$pdf->SetXY(10,20+$offset);
				$pdf->Cell(190,4,$row['sl'],0,0,'L',0);
				$pdf->SetFont('Times','B',14);
				$pdf->SetXY(170,20+$offset);
				$pdf->Cell(190,4,"Confidential",0,0,'L',0);
				$pdf->SetFont('Times','B',14);
				$pdf->SetXY(63,30+$offset);
				$pdf->Cell(190,4,'Nagaland Board of School Education',0,0,'L',0);
				$pdf->Ln();
				$pdf->Cell(190,8,'Kohima',0,0,'C',0);
				$pdf->Ln();
				$pdf->SetFont('Times','B',17);
				$pdf->Cell(190,8,'Class - XI Promotion Examination'.$display_date,0,0,'C',0);
				$pdf->SetFont('Times','B',$font);
				$pdf->SetXY(20,40+$offset);
				$pdf->Cell(190,12,'',0,0,'L',0);
				$pdf->Ln();
				$pdf->Ln();
				$pdf->SetFont('Times','',12);
				$pdf->SetXY(10,57+$offset);
				$pdf->Cell(190,10,'Date of examination :    	
	                                                                  Time : ',0,0,'L',0);
				$pdf->SetFont('Times','B',15);
				$pdf->SetXY(50,57+$offset);
				$pdf->Cell(190,10,getExamDate($sl,$timetbl),0,0,'L',0);
				$pdf->SetXY(140,57+$offset);
				$pdf->Cell(190,10,$time,0,0,'L',0);
				$pdf->SetFont('Times','',12);
				$pdf->SetXY(10,65+$offset);
				$pdf->Cell(190,12,'Subject:                                                                                               Copies of question papers enclosed: ',0,0,'L',0);
				$pdf->SetFont('Times','B',16);
				$pdf->SetXY(25,65+$offset);
				$pdf->Cell(190,12,$subName,0,0,'L',0);
				$pdf->SetXY(186,65+$offset);
				$pdf->Cell(190,12,$row[$sub],0,0,'L',0);
				$pdf->SetFont('Times','',12);
				$pdf->Ln();
				$pdf->Cell(10,8,'.......................................................                                                             .......................................................',0,0,'L',0);

				$pdf->Ln();
				$pdf->Cell(10,8,'                  counted by                                                                                                verified & packed by',0,0,'L',0);
				$pdf->Ln();
				$pdf->Cell(10,8,'Name of the School/Centre  ',0,0,'L',0);
				$pdf->SetFont('Times','B',16);
				$pdf->SetXY(60,92+$offset);
				$pdf->Cell(10,8,$row['centre'],0,0,'L',0);
				$pdf->Ln();
				$pdf->Ln();
				$pdf->Image('aaa.gif',115,105+$offset,70,15);
				$pdf->Ln();
				$pdf->Cell(10,8,'                                                                                  Additional Secretary',0,0,'L',0);
				$flag=0;
	
			}

		}
	} 
	else if($sub=="tny" || $sub=="smi" || $sub=="aon" || $sub=="lta" || $sub=="bng" || $sub=="alt" || $sub=="hnd")
	{
		$sub1="Mils";//$date='3rd December 2016';
		$query1 = mysql_query("select * from $timetbl where subject like '%$sub1%'");
		$find = mysql_fetch_array($query1);$date=$find['e_date'];
		
		$r=mysql_query("select * from $tableName where district='$dist' and $sub>0 ") or die(mysql_error());
		if($sub=='tny'){ $sub="TENYIDIE";  $sub2='tny';}
		if($sub=='aon'){ $sub="AO";  $sub2='aon';}
		if($sub=='hnd'){ $sub="HINDI";  $sub2='hnd';}
		if($sub=='lta'){ $sub="LOTHA";  $sub2='lta';}
		if($sub=='bng'){ $sub="BENGALI";  $sub2='bng';}
		if($sub=='alt'){ $sub="Alternative English"; $sub2='alt'; }
		if($sub=='smi'){ $sub="SUMI(Sütsah)";  $sub2='smi';}
		$time=$Etime;
		$flag=0;
		$offset=149;
		$pdf= new FPDF('P','mm','a4');
		$pdf->SetFont('Times','',12);
		while($row=mysql_fetch_array($r,MYSQL_ASSOC))
		{
			if($flag==0)
			{
				$pdf->AddPage();
				$pdf->SetFont('Times','B',18);
				$pdf->SetXY(10,20);
				$pdf->Cell(190,4,$row['sl'],0,0,'L',0);
				$pdf->SetFont('Times','B',14);
				$pdf->SetXY(170,20);
				$pdf->Cell(190,4,"Confidential",0,0,'L',0);
				$pdf->SetXY(63,30);
				$pdf->Cell(190,4,'Nagaland Board of School Education',0,0,'L',0);
				$pdf->Ln();
				$pdf->Cell(190,8,'Kohima',0,0,'C',0);
				$pdf->Ln();
				$pdf->SetFont('Times','B',17);
				$pdf->Cell(190,8,'Class - XI Promotion Examination'.$display_date,0,0,'C',0);
				$pdf->SetFont('Times','B',$font);
				$pdf->SetFont('Times','B',$font);
				$pdf->SetXY(20,40);
				$pdf->Cell(190,12,'',0,0,'L',0);
				$pdf->Ln();
				$pdf->Ln();
				$pdf->SetFont('Times','',12);
				$pdf->SetXY(10,57);
				$pdf->Cell(190,10,'Date of examination :    	
			                                                                    Time : ',0,0,'L',0);
				$pdf->SetFont('Times','B',15);
				$pdf->SetXY(50,57);
				$pdf->Cell(190,10,$date,0,0,'L',0);
				$pdf->SetXY(140,57);
				$pdf->Cell(190,10,$time,0,0,'L',0);

				$pdf->SetFont('Times','',12);

				$pdf->SetXY(10,65);
				$pdf->Cell(190,12,'Subject:                                                                                               Copies of question papers enclosed: ',0,0,'L',0);
				$pdf->SetFont('Times','B',16);
				$pdf->SetXY(25,65);
				$pdf->Cell(190,12,iconv('UTF-8','windows-1252',$sub),0,0,'L',0);
				$pdf->SetXY(186,65);
				$pdf->Cell(190,12,$row[$sub2],0,0,'L',0);
				$pdf->SetFont('Times','',12);
				$pdf->Ln();
				
				$pdf->Cell(10,8,'.......................................................                                                             .......................................................',0,0,'L',0);

				$pdf->Ln();
				$pdf->Cell(10,8,'                  counted by                                                                                                verified & packed by',0,0,'L',0);

				$pdf->Ln();
				$pdf->Cell(10,8,'Name of the School/Centre  ',0,0,'L',0);
				$pdf->SetFont('Times','B',16);
				$pdf->SetXY(60,92);
				$pdf->Cell(10,8,$row['centre'],0,0,'L',0);
				$pdf->Ln();
				$pdf->Ln();

				$pdf->Image('aaa.gif',115,105,70,15);
				$pdf->Ln();

				$pdf->Cell(10,8,'                                                                                  Additional Secretary',0,0,'L',0);
				$pdf->SetXY(10,145);
				$pdf->Cell(10,8,'-------------------------------------------------------------------------------------------------',0,0,'L',0);

				$flag=1;
	
			}
			else
			{
				$pdf->SetFont('Times','B',18);
				$pdf->SetXY(10,20+$offset);
				$pdf->Cell(190,4,$row['sl'],0,0,'L',0);
				$pdf->SetFont('Times','B',14);
				$pdf->SetXY(170,20+$offset);
				$pdf->Cell(190,4,"Confidential",0,0,'L',0);
				$pdf->SetXY(63,30+$offset);
				$pdf->Cell(190,4,'Nagaland Board of School Education',0,0,'L',0);
				$pdf->Ln();
				$pdf->Cell(190,8,'Kohima',0,0,'C',0);
				$pdf->Ln();
				$pdf->SetFont('Times','B',17);
				$pdf->Cell(190,8,'Class - XI Promotion Examination'.$display_date,0,0,'C',0);
				$pdf->SetFont('Times','B',$font);
				$pdf->SetXY(20,40+$offset);
				$pdf->Cell(190,12,'',0,0,'L',0);
				$pdf->Ln();
				$pdf->Ln();
				$pdf->SetFont('Times','',12);
				$pdf->SetXY(10,57+$offset);
				$pdf->Cell(190,10,'Date of examination :    	
			                                                                     Time : ',0,0,'L',0);
				$pdf->SetFont('Times','B',15);
				$pdf->SetXY(50,57+$offset);
				$pdf->Cell(190,10,$date,0,0,'L',0);
				$pdf->SetXY(140,57+$offset);
				$pdf->Cell(190,10,$time,0,0,'L',0);

				$pdf->SetFont('Times','',12);

				$pdf->SetXY(10,65+$offset);
				$pdf->Cell(190,12,'Subject:                                                                                               Copies of question papers enclosed: ',0,0,'L',0);
				$pdf->SetFont('Times','B',16);
				$pdf->SetXY(25,65+$offset);
				$pdf->Cell(190,12,iconv('UTF-8','windows-1252',$sub),0,0,'L',0);
				$pdf->SetXY(186,65+$offset);
				$pdf->Cell(190,12,$row[$sub2],0,0,'L',0);
				$pdf->SetFont('Times','',12);
				$pdf->Ln();
	
				$pdf->Cell(10,8,'.......................................................                                                             .......................................................',0,0,'L',0);

				$pdf->Ln();
				$pdf->Cell(10,8,'                  counted by                                                                                                verified & packed by',0,0,'L',0);

				$pdf->Ln();
				$pdf->Cell(10,8,'Name of the School/Centre  ',0,0,'L',0);
				$pdf->SetFont('Times','B',16);
				$pdf->SetXY(60,92+$offset);
				$pdf->Cell(10,8,$row['centre'],0,0,'L',0);
				$pdf->Ln();
				$pdf->Ln();

				$pdf->Image('aaa.gif',115,105+$offset,70,15);
				$pdf->Ln();

				$pdf->Cell(10,8,'                                                                                  Additional Secretary',0,0,'L',0);


				$flag=0;
					
			}

		}
	}

}

// TOPSHEET FOR CLASS Twelve
// HSSLC(SCIENCE)

else if($class=='12s')
{
	$tableName	=	"c12s_pkChrt"; $timetbl='c12s_timetbl';
	if($sub=="eng" || $sub=="phy" || $sub=="che" || $sub=="mat" || $sub=="bio" || $sub=="csc" || $sub=="inf" || $sub=="itv" || $sub=="ttv" || $sub=="grp" || $sub=="hcv")
	{
		if($sub=="eng"){$subName='English';}
		if($sub=="phy"){$subName='Physics';}
		if($sub=="che"){$subName='Chemistry';}
		if($sub=="mat"){$subName='Mathematics';}
		if($sub=="grp"){$subName='Maths(Graph)';}
		if($sub=="bio"){$subName='Biology';}
		if($sub=="csc"){$subName='Computer Science';}
		if($sub=="inf"){$subName='Informatics Practices';}
		if($sub=="itv"){$subName='Information Technology';}
		if($sub=="ttv"){$subName='Tourism & Hospitality';}
		if($sub=="hcv"){$subName='Healthcare';}

		if($sub=="grp")
		{
		$query1 = mysql_query("select * from $timetbl where subcode ='mat'");
		}
		else
		{
			$query1 = mysql_query("select * from $timetbl where subcode ='$sub'");
		}
		$find = mysql_fetch_array($query1);$sl=$find['sl'];
		function getExamDate($sl,$timetbl)
		{
			$query1 = mysql_query("select * from $timetbl where sl='$sl'");
			$find = mysql_fetch_array($query1);
			if($find['e_date']!='')
			{
			return $find['e_date'];
			}
			else {
					$sl=$sl-1;

					return getExamDate($sl,$timetbl);
				}
		}

		
		if($sub=='itv' || $sub=='ttv' || $sub=='rtv' || $sub=='hcv' || $sub=='btv' || $sub=='ehv' || $sub=='agv' || $sub=='atv' || $sub=='hcv' || $sub=='csc' || $sub=='inf')
		{
			$time=$Vtime;
		}
		else
		{
			$time=$Etime;
		}
		
		$flag=0;
		$offset=149;
		$pdf= new FPDF('P','mm','a4');
		$pdf->SetFont('Times','',12);
		$r=mysql_query("select * from $tableName where district='$dist' and $sub>0 ") or die(mysql_error());
		while($row=mysql_fetch_array($r,MYSQL_ASSOC))
		{
			if($flag==0)
			{
				if($row['district']=='Vistse'){$var='Kohima';}else {$var=$row['district'];}
				$pdf->AddPage();
				$pdf->SetFont('Times','B',14);
				$pdf->SetXY(10,20);
				$pdf->Cell(190,4,$var,0,0,'L',0);
				$pdf->SetXY(170,20);
				$pdf->Cell(190,4,"Confidential",0,0,'L',0);
				$pdf->SetFont('Times','B',14);
				$pdf->SetXY(63,30);
				$pdf->Cell(190,4,'Nagaland Board of School Education',0,0,'L',0);
				$pdf->Ln();
				$pdf->Cell(190,8,'Kohima',0,0,'C',0);
				$pdf->Ln();
				$pdf->SetFont('Times','B',17);
				$pdf->Cell(190,8,$subjectHSSLC.$display_date,0,0,'C',0);
				$pdf->SetFont('Times','B',$font);
				$pdf->SetXY(20,40);
				//$pdf->Cell(190,12,$row['sl'],0,0,'L',0);
				$pdf->Ln();
				$pdf->Ln();
				$pdf->SetFont('Times','',12);
				$pdf->SetXY(10,57);
				$pdf->Cell(190,10,'Date of examination :    	
	                                                                  Time : ',0,0,'L',0);
				$pdf->SetFont('Times','B',15);
				$pdf->SetXY(50,57);
				$pdf->Cell(190,10,getExamDate($sl,$timetbl),0,0,'L',0);
				$pdf->SetXY(140,57);
				$pdf->Cell(190,10,$time,0,0,'L',0);
				$pdf->SetFont('Times','',12);
				$pdf->SetXY(10,65);
				$pdf->Cell(190,12,'Subject:                                                                                               Copies of question papers enclosed: ',0,0,'L',0);
				$pdf->SetFont('Times','B',16);
				$pdf->SetXY(25,65);
				$pdf->Cell(190,12,$subName,0,0,'L',0);
				$pdf->SetXY(186,65);
				$pdf->Cell(190,12,$row[$sub],0,0,'L',0);
				$pdf->SetFont('Times','',12);
				$pdf->Ln();
		
				$pdf->Cell(10,8,'.......................................................                                                             .......................................................',0,0,'L',0);

				$pdf->Ln();
				$pdf->Cell(10,8,'                  counted by                                                                                                verified & packed by',0,0,'L',0);

				$pdf->Ln();
				$pdf->Cell(10,8,'Name of the School/Centre  ',0,0,'L',0);
				$pdf->SetFont('Times','B',16);
				$pdf->SetXY(60,92);
				$pdf->Cell(10,8,$row['centre'],0,0,'L',0);
				$pdf->Ln();
				$pdf->Ln();
				$pdf->Image('aaa.gif',115,105,70,15);
				$pdf->Ln();

				$pdf->Cell(10,8,'                                                                                  Additional Secretary',0,0,'L',0);
				$pdf->SetXY(10,145);
				$pdf->Cell(10,8,'-------------------------------------------------------------------------------------------------',0,0,'L',0);
				$flag=1;
	
			}
			else
			{
				$pdf->SetFont('Times','B',14);
				$pdf->SetXY(10,20+$offset);
				$pdf->Cell(190,4,$var,0,0,'L',0);
				$pdf->SetXY(170,20+$offset);
				$pdf->Cell(190,4,"Confidential",0,0,'L',0);
				$pdf->SetFont('Times','B',14);
				$pdf->SetXY(63,30+$offset);
				$pdf->Cell(190,4,'Nagaland Board of School Education',0,0,'L',0);
				$pdf->Ln();
				$pdf->Cell(190,8,'Kohima',0,0,'C',0);
				$pdf->Ln();
				$pdf->SetFont('Times','B',17);
				$pdf->Cell(190,8,$subjectHSSLC.$display_date,0,0,'C',0);
				$pdf->SetFont('Times','B',$font);
				$pdf->SetXY(20,40+$offset);
				//$pdf->Cell(190,12,$row['sl'],0,0,'L',0);
				$pdf->Ln();
				$pdf->Ln();
				$pdf->SetFont('Times','',12);
				$pdf->SetXY(10,57+$offset);
				$pdf->Cell(190,10,'Date of examination :    	
	                                                                  Time : ',0,0,'L',0);
				$pdf->SetFont('Times','B',15);
				$pdf->SetXY(50,57+$offset);
				$pdf->Cell(190,10,getExamDate($sl,$timetbl),0,0,'L',0);
				$pdf->SetXY(140,57+$offset);
				$pdf->Cell(190,10,$time,0,0,'L',0);
				$pdf->SetFont('Times','',12);
				$pdf->SetXY(10,65+$offset);
				$pdf->Cell(190,12,'Subject:                                                                                               Copies of question papers enclosed: ',0,0,'L',0);
				$pdf->SetFont('Times','B',16);
				$pdf->SetXY(25,65+$offset);
				$pdf->Cell(190,12,$subName,0,0,'L',0);
				$pdf->SetXY(186,65+$offset);
				$pdf->Cell(190,12,$row[$sub],0,0,'L',0);
				$pdf->SetFont('Times','',12);
				$pdf->Ln();
				$pdf->Cell(10,8,'.......................................................                                                             .......................................................',0,0,'L',0);

				$pdf->Ln();
				$pdf->Cell(10,8,'                  counted by                                                                                                verified & packed by',0,0,'L',0);
				$pdf->Ln();
				$pdf->Cell(10,8,'Name of the School/Centre  ',0,0,'L',0);
				$pdf->SetFont('Times','B',16);
				$pdf->SetXY(60,92+$offset);
				$pdf->Cell(10,8,$row['centre'],0,0,'L',0);
				$pdf->Ln();
				$pdf->Ln();
				$pdf->Image('aaa.gif',115,105+$offset,70,15);
				$pdf->Ln();
				$pdf->Cell(10,8,'                                                                                  Additional Secretary',0,0,'L',0);
				$flag=0;
	
			}

		}
	} 
	else if($sub=="tny" || $sub=="smi" || $sub=="aon" || $sub=="lta" || $sub=="bng" || $sub=="alt" || $sub=="hnd")
	{
		$sub1="Mils";//$date='3rd December 2016';
		$query1 = mysql_query("select * from $timetbl where subject like '%$sub1%'");
		$find = mysql_fetch_array($query1);$date=$find['e_date'];
		
		$r=mysql_query("select * from $tableName where district='$dist' and $sub>0 ") or die(mysql_error());
		if($sub=='tny'){ $sub="TENYIDIE";  $sub2='tny';}
		if($sub=='aon'){ $sub="AO";  $sub2='aon';}
		if($sub=='hnd'){ $sub="HINDI";  $sub2='hnd';}
		if($sub=='lta'){ $sub="LOTHA";  $sub2='lta';}
		if($sub=='bng'){ $sub="BENGALI";  $sub2='bng';}
		if($sub=='alt'){ $sub="Alternative English"; $sub2='alt'; }
		if($sub=='smi'){ $sub="SUMI(Sütsah)";  $sub2='smi';}
		$time=$Vtime;
		$flag=0;
		$offset=149;
		$pdf= new FPDF('P','mm','a4');
		$pdf->SetFont('Times','',12);
		while($row=mysql_fetch_array($r,MYSQL_ASSOC))
		{
			if($flag==0)
			{
				if($row['district']=='Vistse'){$var='Kohima';}else {$var=$row['district'];}
				$pdf->AddPage();
				$pdf->SetFont('Times','B',14);
				$pdf->SetXY(10,20);
				$pdf->Cell(190,4,$var,0,0,'L',0);
				$pdf->SetXY(170,20);
				$pdf->Cell(190,4,"Confidential",0,0,'L',0);
				$pdf->SetXY(63,30);
				$pdf->Cell(190,4,'Nagaland Board of School Education',0,0,'L',0);
				$pdf->Ln();
				$pdf->Cell(190,8,'Kohima',0,0,'C',0);
				$pdf->Ln();
				$pdf->SetFont('Times','B',17);
				$pdf->Cell(190,8,$subjectHSSLC.$display_date,0,0,'C',0);
				$pdf->SetFont('Times','B',$font);
				$pdf->SetFont('Times','B',$font);
				$pdf->SetXY(20,40);
				//$pdf->Cell(190,12,$row['sl'],0,0,'L',0);
				$pdf->Ln();
				$pdf->Ln();
				$pdf->SetFont('Times','',12);
				$pdf->SetXY(10,57);
				$pdf->Cell(190,10,'Date of examination :    	
			                                                                    Time : ',0,0,'L',0);
				$pdf->SetFont('Times','B',15);
				$pdf->SetXY(50,57);
				$pdf->Cell(190,10,$date,0,0,'L',0);
				$pdf->SetXY(140,57);
				$pdf->Cell(190,10,$time,0,0,'L',0);

				$pdf->SetFont('Times','',12);

				$pdf->SetXY(10,65);
				$pdf->Cell(190,12,'Subject:                                                                                               Copies of question papers enclosed: ',0,0,'L',0);
				$pdf->SetFont('Times','B',16);
				$pdf->SetXY(25,65);
				$pdf->Cell(190,12,iconv('UTF-8','windows-1252',$sub),0,0,'L',0);
				$pdf->SetXY(186,65);
				$pdf->Cell(190,12,$row[$sub2],0,0,'L',0);
				$pdf->SetFont('Times','',12);
				$pdf->Ln();
		
				$pdf->Cell(10,8,'.......................................................                                                             .......................................................',0,0,'L',0);

				$pdf->Ln();
				$pdf->Cell(10,8,'                  counted by                                                                                                verified & packed by',0,0,'L',0);

				$pdf->Ln();
				$pdf->Cell(10,8,'Name of the School/Centre  ',0,0,'L',0);
				$pdf->SetFont('Times','B',16);
				$pdf->SetXY(60,92);
				$pdf->Cell(10,8,$row['centre'],0,0,'L',0);
				$pdf->Ln();
				$pdf->Ln();

				$pdf->Image('aaa.gif',115,105,70,15);
				$pdf->Ln();

				$pdf->Cell(10,8,'                                                                                  Additional Secretary',0,0,'L',0);
				$pdf->SetXY(10,145);
				$pdf->Cell(10,8,'-------------------------------------------------------------------------------------------------',0,0,'L',0);

				$flag=1;
	
			}
			else
			{
				$pdf->SetFont('Times','B',14);
				$pdf->SetXY(10,20+$offset);
				$pdf->Cell(190,4,$var,0,0,'L',0);
				$pdf->SetXY(170,20+$offset);
				$pdf->Cell(190,4,"Confidential",0,0,'L',0);
				$pdf->SetXY(63,30+$offset);
				$pdf->Cell(190,4,'Nagaland Board of School Education',0,0,'L',0);
				$pdf->Ln();
				$pdf->Cell(190,8,'Kohima',0,0,'C',0);
				$pdf->Ln();
				$pdf->SetFont('Times','B',17);
				$pdf->Cell(190,8,$subjectHSSLC.$display_date,0,0,'C',0);
				$pdf->SetFont('Times','B',$font);
				$pdf->SetXY(20,40+$offset);
				//$pdf->Cell(190,12,$row['sl'],0,0,'L',0);
				$pdf->Ln();
				$pdf->Ln();
				$pdf->SetFont('Times','',12);
				$pdf->SetXY(10,57+$offset);
				$pdf->Cell(190,10,'Date of examination :    	
			                                                                     Time : ',0,0,'L',0);
				$pdf->SetFont('Times','B',15);
				$pdf->SetXY(50,57+$offset);
				$pdf->Cell(190,10,$date,0,0,'L',0);
				$pdf->SetXY(140,57+$offset);
				$pdf->Cell(190,10,$time,0,0,'L',0);

				$pdf->SetFont('Times','',12);

				$pdf->SetXY(10,65+$offset);
				$pdf->Cell(190,12,'Subject:                                                                                               Copies of question papers enclosed: ',0,0,'L',0);
				$pdf->SetFont('Times','B',16);
				$pdf->SetXY(25,65+$offset);
				$pdf->Cell(190,12,iconv('UTF-8','windows-1252',$sub),0,0,'L',0);
				$pdf->SetXY(186,65+$offset);
				$pdf->Cell(190,12,$row[$sub2],0,0,'L',0);
				$pdf->SetFont('Times','',12);
				$pdf->Ln();
		
				$pdf->Cell(10,8,'.......................................................                                                             .......................................................',0,0,'L',0);

				$pdf->Ln();
				$pdf->Cell(10,8,'                  counted by                                                                                                verified & packed by',0,0,'L',0);

				$pdf->Ln();
				$pdf->Cell(10,8,'Name of the School/Centre  ',0,0,'L',0);
				$pdf->SetFont('Times','B',16);
				$pdf->SetXY(60,92+$offset);
				$pdf->Cell(10,8,$row['centre'],0,0,'L',0);
				$pdf->Ln();
				$pdf->Ln();

				$pdf->Image('aaa.gif',115,105+$offset,70,15);
				$pdf->Ln();

				$pdf->Cell(10,8,'                                                                                  Additional Secretary',0,0,'L',0);


				$flag=0;
	
			}

		}
	}
}


$pdf->Output();
?>

