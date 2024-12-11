<?php
require("dbconn.php");
$dist=$_POST['nbseDistrict'];
$sub=$_POST['sub'];
include('fpdf/fpdf.php');
$font='26';
if($sub=="MATHEMATICS" || $sub=="ENGLISH" || $sub=="SOCIAL SCIENCES" || $sub=="SCIENCE")
{
	
	if($sub=='ENGLISH') $date= "28th November 2016"; 
	if($sub=='SCIENCE') $date= "30th November 2016";
	if($sub=='MATHEMATICS') $date= "2nd December 2016";
	if($sub=='SOCIAL SCIENCES') $date= "5th December 2016";
	$time='9:00 a.m. to 12:00 noon';
	$flag=0;
$offset=149;
$pdf= new FPDF('P','mm','a4');
$pdf->SetFont('Times','',12);


$r=mysql_query("select * from c9_pkChrt_16 where district='$dist' and main>0 ") or die(mysql_error());
while($row=mysql_fetch_array($r,MYSQL_ASSOC))
{
if($flag==0)
{
	$pdf->AddPage();
	$pdf->SetFont('Times','B',14);
	$pdf->SetXY(63,20);
	$pdf->Cell(190,4,'Nagaland Board of School Education',0,0,'L',0);
	$pdf->Ln();
	$pdf->Cell(190,8,'Kohima',0,0,'C',0);
	$pdf->Ln();
	$pdf->SetFont('Times','B',$font);
	$pdf->SetXY(5,15);
	$pdf->Cell(190,12,'Set II',0,0,'R',0);
		//$pdf->SetXY(20,30);
	//$pdf->Cell(190,8,$row['sl'],0,0,'L',0);
	$pdf->Cell(190,8,'Kohima',0,0,'C',0);
	$pdf->Ln();
	$pdf->Ln();
	$pdf->SetFont('Times','B',17);
	$pdf->Cell(190,8,'Class - IX Final Examination'.date('Y'),0,0,'C',0);
	$pdf->SetFont('Times','B',$font);
	$pdf->SetXY(20,30);
	$pdf->Cell(190,12,$row['sl'],0,0,'L',0);
	$pdf->Ln();
	$pdf->Ln();
	$pdf->SetFont('Times','',12);
	$pdf->SetXY(10,47);
	$pdf->Cell(190,10,'    	
                                                                                                        Time : ',0,0,'L',0);
	$pdf->SetFont('Times','B',15);
	$pdf->SetXY(50,47);
	//$pdf->Cell(190,10,$date,0,0,'L',0);
	$pdf->SetXY(140,47);
	$pdf->Cell(190,10,$time,0,0,'L',0);

	$pdf->SetFont('Times','',12);

$pdf->SetXY(10,55);
$pdf->Cell(190,12,'Subject:                                                                                               Copies of question papers enclosed: ',0,0,'L',0);
		$pdf->SetFont('Times','B',16);
	$pdf->SetXY(31,55);
$pdf->Cell(190,12,$sub,0,0,'L',0);
	$pdf->SetXY(186,55);
$pdf->Cell(190,12,'5',0,0,'L',0);
	$pdf->SetFont('Times','',12);
	$pdf->Ln();
	
$pdf->Cell(10,8,'.......................................................                                                             .......................................................',0,0,'L',0);

$pdf->Ln();
$pdf->Cell(10,8,'                  counted by                                                                                                verified & packed by',0,0,'L',0);

$pdf->Ln();
$pdf->Cell(10,8,'Name of the School/Centre  ',0,0,'L',0);
$pdf->SetFont('Times','B',16);
$pdf->SetXY(60,82);
$pdf->Cell(10,8,$row['school'],0,0,'L',0);
$pdf->Ln();
$pdf->Ln();

$pdf->Image('aaa.gif',110,95,70,15);
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(10,8,'                                                                       Controller of Examinations',0,0,'L',0);
$pdf->SetXY(10,145);
$pdf->Cell(10,8,'-------------------------------------------------------------------------------------------------',0,0,'L',0);

$flag=1;
	
	}
else
{
	$pdf->SetFont('Times','B',14);
	$pdf->SetXY(63,20+$offset);
	$pdf->Cell(190,4,'Nagaland Board of School Education',0,0,'L',0);
	$pdf->Ln();
	$pdf->Cell(190,8,'Kohima',0,0,'C',0);
	$pdf->Ln();
	$pdf->SetFont('Times','B',$font);
	$pdf->SetXY(5,15+$offset);
	$pdf->Cell(190,12,'Set II',0,0,'R',0);
	$pdf->Cell(190,8,'Kohima',0,0,'C',0);
	$pdf->Ln();
	$pdf->Ln();
	$pdf->SetFont('Times','B',17);
	$pdf->Cell(190,8,'Class - IX Final Examination'.date('Y'),0,0,'C',0);
	$pdf->SetFont('Times','B',$font);
	$pdf->SetXY(20,30+$offset);
	$pdf->Cell(190,12,$row['sl'],0,0,'L',0);
	$pdf->Ln();
	$pdf->Ln();
	$pdf->SetFont('Times','',12);
	$pdf->SetXY(10,47+$offset);
	$pdf->Cell(190,10,'    	
                                                                                                        Time : ',0,0,'L',0);
	$pdf->SetFont('Times','B',15);
	//$pdf->SetXY(50,47+$offset);
	//$pdf->Cell(190,10,$date,0,0,'L',0);
	$pdf->SetXY(140,47+$offset);
	$pdf->Cell(190,10,$time,0,0,'L',0);

	$pdf->SetFont('Times','',12);

$pdf->SetXY(10,55+$offset);
$pdf->Cell(190,12,'Subject:                                                                                               Copies of question papers enclosed: ',0,0,'L',0);
		$pdf->SetFont('Times','B',16);
	$pdf->SetXY(31,55+$offset);
$pdf->Cell(190,12,$sub,0,0,'L',0);
	$pdf->SetXY(186,55+$offset);
$pdf->Cell(190,12,'5',0,0,'L',0);
	$pdf->SetFont('Times','',12);
	$pdf->Ln();
	
$pdf->Cell(10,8,'.......................................................                                                             .......................................................',0,0,'L',0);

$pdf->Ln();
$pdf->Cell(10,8,'                  counted by                                                                                                verified & packed by',0,0,'L',0);

$pdf->Ln();
$pdf->Cell(10,8,'Name of the School/Centre  ',0,0,'L',0);
$pdf->SetFont('Times','B',16);
$pdf->SetXY(60,82+$offset);
$pdf->Cell(10,8,$row['school'],0,0,'L',0);
$pdf->Ln();
$pdf->Ln();

$pdf->Image('aaa.gif',110,95+$offset,70,15);
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(10,8,'                                                                       Controller of Examinations',0,0,'L',0);

$flag=0;
	
	}

}} 
else if($sub=="tny" || $sub=="smi" || $sub=="aon" || $sub=="lta" || $sub=="bng" || $sub=="alt" || $sub=="hnd")
{
	$sub1="MILS";$date='3rd December 2016';
	
	$r=mysql_query("select * from c9_pkChrt_16 where district='$dist' and $sub>0 ") or die(mysql_error());
	if($sub=='tny'){ $sub="TENYIDIE";  $sub2='tny';}
	if($sub=='aon'){ $sub="AO";  $sub2='aon';}
	if($sub=='hnd'){ $sub="HINDI";  $sub2='hnd';}
	if($sub=='lta'){ $sub="LOTHA";  $sub2='lta';}
	if($sub=='bng'){ $sub="BENGALI";  $sub2='bng';}
	if($sub=='alt'){ $sub="Alternative English"; $sub2='alt'; }
	if($sub=='smi'){ $sub="SUMI";  $sub2='smi';}
	$time='9:00 a.m. to 12:00 noon';
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
	$pdf->SetXY(63,20);
	$pdf->Cell(190,4,'Nagaland Board of School Education',0,0,'L',0);
	$pdf->Ln();
	$pdf->Cell(190,8,'Kohima',0,0,'C',0);
	$pdf->Ln();
	$pdf->SetFont('Times','B',$font);
	$pdf->SetXY(5,15);
	$pdf->Cell(190,12,'Set II',0,0,'R',0);
	$pdf->Cell(190,8,'Kohima',0,0,'C',0);
	$pdf->Ln();
	$pdf->Ln();
	$pdf->SetFont('Times','B',17);
	$pdf->Cell(190,8,'Class - IX Final Examination'.date('Y'),0,0,'C',0);
	$pdf->SetFont('Times','B',$font);
	$pdf->SetFont('Times','B',$font);
	$pdf->SetXY(20,30);
	$pdf->Cell(190,12,$row['sl'],0,0,'L',0);
	$pdf->Ln();
	$pdf->Ln();
	$pdf->SetFont('Times','',12);
	$pdf->SetXY(10,47);
	$pdf->Cell(190,10,'    	
                                                                                                        Time : ',0,0,'L',0);
	$pdf->SetFont('Times','B',15);
	//$pdf->SetXY(50,47);
	//$pdf->Cell(190,10,$date,0,0,'L',0);
	$pdf->SetXY(140,47);
	$pdf->Cell(190,10,$time,0,0,'L',0);

	$pdf->SetFont('Times','',12);

$pdf->SetXY(10,55);
$pdf->Cell(190,12,'Subject:                                                                                               Copies of question papers enclosed: ',0,0,'L',0);
		$pdf->SetFont('Times','B',16);
	$pdf->SetXY(31,55);
$pdf->Cell(190,12,$sub,0,0,'L',0);
	$pdf->SetXY(186,55);
$pdf->Cell(190,12,'2',0,0,'L',0);
	$pdf->SetFont('Times','',12);
	$pdf->Ln();
	
$pdf->Cell(10,8,'.......................................................                                                             .......................................................',0,0,'L',0);

$pdf->Ln();
$pdf->Cell(10,8,'                  counted by                                                                                                verified & packed by',0,0,'L',0);

$pdf->Ln();
$pdf->Cell(10,8,'Name of the School/Centre  ',0,0,'L',0);
$pdf->SetFont('Times','B',16);
$pdf->SetXY(60,82);
$pdf->Cell(10,8,$row['school'],0,0,'L',0);
$pdf->Ln();
$pdf->Ln();

$pdf->Image('aaa.gif',110,95,70,15);
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(10,8,'                                                                       Controller of Examinations',0,0,'L',0);
$pdf->SetXY(10,145);
$pdf->Cell(10,8,'-------------------------------------------------------------------------------------------------',0,0,'L',0);

$flag=1;
	
	}
else
{
	$pdf->SetFont('Times','B',14);
	$pdf->SetXY(63,20+$offset);
	$pdf->Cell(190,4,'Nagaland Board of School Education',0,0,'L',0);
	$pdf->Ln();
	$pdf->Cell(190,8,'Kohima',0,0,'C',0);
	$pdf->SetFont('Times','B',$font);
	$pdf->SetXY(5,15+$offset);
	$pdf->Cell(190,12,'Set II',0,0,'R',0);
	$pdf->Cell(190,8,'Kohima',0,0,'C',0);
	$pdf->Ln();
	$pdf->Ln();
	$pdf->SetFont('Times','B',17);
	$pdf->Cell(190,8,'Class - IX Final Examination'.date('Y'),0,0,'C',0);
	$pdf->SetFont('Times','B',$font);
	$pdf->SetXY(20,30+$offset);
	$pdf->Cell(190,12,$row['sl'],0,0,'L',0);
	$pdf->Ln();
	$pdf->Ln();
	$pdf->SetFont('Times','',12);
	$pdf->SetXY(10,47+$offset);
	$pdf->Cell(190,10,'    	
                                                                                                        Time : ',0,0,'L',0);
	$pdf->SetFont('Times','B',15);
	//$pdf->SetXY(50,47+$offset);
	//$pdf->Cell(190,10,$date,0,0,'L',0);
	$pdf->SetXY(140,47+$offset);
	$pdf->Cell(190,10,$time,0,0,'L',0);

	$pdf->SetFont('Times','',12);

$pdf->SetXY(10,55+$offset);
$pdf->Cell(190,12,'Subject:                                                                                               Copies of question papers enclosed: ',0,0,'L',0);
		$pdf->SetFont('Times','B',16);
	$pdf->SetXY(31,55+$offset);
$pdf->Cell(190,12,$sub,0,0,'L',0);
	$pdf->SetXY(186,55+$offset);
$pdf->Cell(190,12,'2',0,0,'L',0);
	$pdf->SetFont('Times','',12);
	$pdf->Ln();
	
$pdf->Cell(10,8,'.......................................................                                                             .......................................................',0,0,'L',0);

$pdf->Ln();
$pdf->Cell(10,8,'                  counted by                                                                                                verified & packed by',0,0,'L',0);

$pdf->Ln();
$pdf->Cell(10,8,'Name of the School/Centre  ',0,0,'L',0);
$pdf->SetFont('Times','B',16);
$pdf->SetXY(60,82+$offset);
$pdf->Cell(10,8,$row['school'],0,0,'L',0);
$pdf->Ln();
$pdf->Ln();

$pdf->Image('aaa.gif',110,95+$offset,70,15);
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(10,8,'                                                                       Controller of Examinations',0,0,'L',0);

$flag=0;
	
	}

}
}
$pdf->Output();
?>

