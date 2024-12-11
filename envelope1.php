<?php
require("dbconn.php");
$dist=$_POST['nbseDistrict'];
//$sub=$_POST['sub'];
include('fpdf/fpdf.php');
$font='26';
$flag=0;
$offset=80;
$offset1=155;
$offset2=225;

$pdf= new FPDF('P','mm','a4');
$pdf->SetFont('Times','',12);


$r=mysql_query("select * from c9_pkChrt_16 where district='$dist' ") or die(mysql_error());
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
	//$pdf->Ln();
	$pdf->SetFont('Times','B',$font);
	$pdf->SetXY(1,15);
	$pdf->Cell(190,12,'Set II',0,0,'R',0);
		//$pdf->SetXY(20,30);
	//$pdf->Cell(190,8,$row['sl'],0,0,'L',0);
	//$pdf->Cell(190,8,'Kohima',0,0,'C',0);
	//$pdf->Ln();
	//$pdf->Ln();
	$pdf->SetXY(58,30);
	$pdf->SetFont('Times','B',17);
	$pdf->Cell(190,8,'Class - IX Final Examination'.date('Y'),0,0,'L',0);
	$pdf->SetFont('Times','B',$font);
	$pdf->SetXY(20,20);
	$pdf->Cell(190,12,$row['sl'],0,0,'L',0);
	//$pdf->Ln();
	//$pdf->Ln();
	$pdf->SetXY(20,43);
	$pdf->SetFont('Times','',12);
	$pdf->Cell(30,8,'Name of the School/Centre: ',0,0,'L',0);
$pdf->SetFont('Times','B',16);
$pdf->SetXY(67,43);
$pdf->Cell(10,8,$row['school'],0,0,'L',0);


$flag=1;
	
	}
else if($flag==1)
{
	$pdf->SetFont('Times','B',14);
	$pdf->SetXY(63,20+$offset);
	$pdf->Cell(190,4,'Nagaland Board of School Education',0,0,'L',0);
	$pdf->Ln();
	$pdf->Cell(190,8,'Kohima',0,0,'C',0);
	//$pdf->Ln();
	$pdf->SetFont('Times','B',$font);
	$pdf->SetXY(1,15+$offset);
	$pdf->Cell(190,12,'Set II',0,0,'R',0);
		//$pdf->SetXY(20,30);
	//$pdf->Cell(190,8,$row['sl'],0,0,'L',0);
	//$pdf->Cell(190,8,'Kohima',0,0,'C',0);
	//$pdf->Ln();
	//$pdf->Ln();
	$pdf->SetXY(58,30+$offset);
	$pdf->SetFont('Times','B',17);
	$pdf->Cell(190,8,'Class - IX Final Examination'.date('Y'),0,0,'L',0);
	$pdf->SetFont('Times','B',$font);
	$pdf->SetXY(20,20+$offset);
	$pdf->Cell(190,12,$row['sl'],0,0,'L',0);
	//$pdf->Ln();
	//$pdf->Ln();
	$pdf->SetXY(20,43+$offset);
	$pdf->SetFont('Times','',12);
	$pdf->Cell(30,8,'Name of the School/Centre: ',0,0,'L',0);
$pdf->SetFont('Times','B',16);
$pdf->SetXY(67,43+$offset);
$pdf->Cell(10,8,$row['school'],0,0,'L',0);


$flag=2;
	
	}
	else if($flag==2)
	{
			$pdf->SetFont('Times','B',14);
	$pdf->SetXY(63,20+$offset1);
	$pdf->Cell(190,4,'Nagaland Board of School Education',0,0,'L',0);
	$pdf->Ln();
	$pdf->Cell(190,8,'Kohima',0,0,'C',0);
	//$pdf->Ln();
	$pdf->SetFont('Times','B',$font);
	$pdf->SetXY(1,15+$offset1);
	$pdf->Cell(190,12,'Set II',0,0,'R',0);
		//$pdf->SetXY(20,30);
	//$pdf->Cell(190,8,$row['sl'],0,0,'L',0);
	//$pdf->Cell(190,8,'Kohima',0,0,'C',0);
	//$pdf->Ln();
	//$pdf->Ln();
	$pdf->SetXY(58,30+$offset1);
	$pdf->SetFont('Times','B',17);
	$pdf->Cell(190,8,'Class - IX Final Examination'.date('Y'),0,0,'L',0);
	$pdf->SetFont('Times','B',$font);
	$pdf->SetXY(20,20+$offset1);
	$pdf->Cell(190,12,$row['sl'],0,0,'L',0);
	//$pdf->Ln();
	//$pdf->Ln();
	$pdf->SetXY(20,43+$offset1);
	$pdf->SetFont('Times','',12);
	$pdf->Cell(30,8,'Name of the School/Centre: ',0,0,'L',0);
$pdf->SetFont('Times','B',16);
$pdf->SetXY(67,43+$offset1);
$pdf->Cell(10,8,$row['school'],0,0,'L',0);


$flag=3;
		
		}
else if($flag==3)
	{
			$pdf->SetFont('Times','B',14);
	$pdf->SetXY(63,20+$offset2);
	$pdf->Cell(190,4,'Nagaland Board of School Education',0,0,'L',0);
	$pdf->Ln();
	$pdf->Cell(190,8,'Kohima',0,0,'C',0);
	//$pdf->Ln();
	$pdf->SetFont('Times','B',$font);
	$pdf->SetXY(1,15+$offset2);
	$pdf->Cell(190,12,'Set II',0,0,'R',0);
		//$pdf->SetXY(20,30);
	//$pdf->Cell(190,8,$row['sl'],0,0,'L',0);
	//$pdf->Cell(190,8,'Kohima',0,0,'C',0);
	//$pdf->Ln();
	//$pdf->Ln();
	$pdf->SetXY(58,30+$offset2);
	$pdf->SetFont('Times','B',17);
	$pdf->Cell(190,8,'Class - IX Final Examination'.date('Y'),0,0,'L',0);
	$pdf->SetFont('Times','B',$font);
	$pdf->SetXY(20,20+$offset2);
	$pdf->Cell(190,12,$row['sl'],0,0,'L',0);
	//$pdf->Ln();
	//$pdf->Ln();
	$pdf->SetXY(20,43+$offset2);
	$pdf->SetFont('Times','',12);
	$pdf->Cell(30,8,'Name of the School/Centre: ',0,0,'L',0);
$pdf->SetFont('Times','B',16);
$pdf->SetXY(67,43+$offset2);
$pdf->Cell(10,8,$row['school'],0,0,'L',0);


$flag=0;
		
		}


} 

$pdf->Output();
?>

