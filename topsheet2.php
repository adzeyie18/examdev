<?php
require("dbconn.php");
$dist=$_POST['nbseDistrictName'];
$sub=$_POST['sub'];
require('fpdf/fpdf.php');
$offset=0;
if($sub=="MATHEMATICS" || $sub=="ENGLISH" || $sub=="SOCIAL SCIENCES" || $sub=="SCIENCE")
{
	$pdf = new FPDF('p','mm','a4');	
	$flag=1;
	if($sub=='ENGLISH') $date= "9th December 2015";
	if($sub=='SCIENCE') $date= "8th December 2015";
	if($sub=='MATHEMATICS') $date= "14th December 2015";
	if($sub=='SOCIAL SCIENCES') $date= "11th December 2015";
	$r=mysql_query("select * from c9_pkChrt_16 where district='$dist' and main>0 ") or die(mysql_error());
	$pdf->AddPage();
		$cnt=1;
	
 while($row=mysql_fetch_array($r,MYSQL_ASSOC))
{
		
//$pdf->SetXY('50','5');//offset=260
$pdf->SetFont('Arial','B',18);
$pdf->Cell(0,10,'Nagaland Board of School Education',0,0,'C');//spacebar 25clicks		
//$pdf->SetXY('90','15');
$pdf->Ln('10');
$pdf->Cell(0,10,'Kohima',0,0,'C');//spacebar 50clicks
$pdf->Ln('10');
//$pdf->SetXY('50','20');
$pdf->Cell(0,10,'Class - IX Final Examination '.date('Y'),0,0,'C');//spacebar 28clicks
//$pdf->SetXY('30','25');
$pdf->Ln('15');
$pdf->SetFont('Arial','',14);
$pdf->Cell(0,10,'Date of examination : '.$date,0,0,'L');
$pdf->SetFont('Arial','',14);
$pdf->Cell(0,10,"Time: 9:00 a.m. to 12:00 noon",0,0,'R');
$pdf->SetFont('Arial','B',14);
$pdf->Ln('10');
//$pdf->SetXY('30','35');
$pdf->SetFont('Arial','',14);
$pdf->Cell(0,10,'Subject : '.$sub,0,0,'L');
//$pdf->SetXY('30','40');
$pdf->SetFont('Arial','',14);
$pdf->Cell(0,10,'copies of question papers enclosed : '.$row['main'],0,0,'R');//.$row['main']
$pdf->Ln('15');
//$pdf->SetXY('30','45');
$pdf->SetFont('Arial','',14);
$pdf->Cell(0,10,'........................................                                                    ........................................');
//$pdf->SetXY('30','50');
$pdf->Ln('5');//$pdf->SetXY('30','55');
$pdf->Cell(0,10,'           counted by                                                                 verified and packed by');
//$pdf->SetXY('30','60');
$pdf->Ln('10');
//$pdf->Cell(10,10,'verified and packed by');
//$pdf->SetXY('30','65');
$pdf->Cell(0,10,'Name of the School/Centre: ');
//$pdf->SetXY('30','70');
$pdf->SetFont('Arial','B',15);
$pdf->Write(3.5,"                                           ".$row['school']);
$pdf->Ln('5');
if($cnt==1)
{
	$pdf->Image('aaa.gif',90,90,20,15);
} else if($cnt==2)
{
	$pdf->Image('aaa.gif',130,90,20,15);
	}
$pdf->Ln('5');
$pdf->Cell(10,10,'Controller of Examinations');
//$pdf->SetXY('30','75');
$pdf->Ln('20');

$cnt++;
}
}
$pdf->Output();
?>