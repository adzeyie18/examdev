<?php
require("dbconn.php");
$dist=$_POST['nbseDistrict'];
include('fpdf/fpdf.php');
$font='26';
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


		$tot=$tot1+$tot2+$tot3+$tot4+$tot5+$tot6+$tot7+$tot8+$tot9+$tot10+$tot11+$tot12+$tot13+$tot14+4;
		$pdf= new FPDF('P','mm','a4');
		$pdf->SetFont('Times','',12);
		$pdf->AddPage();
	$pdf->SetFont('Times','B',14);
	$pdf->SetXY(63,20);
	$pdf->Cell(190,4,'Nagaland Board of School Education',0,0,'L',0);
	$pdf->Ln();
	$pdf->Ln();

	$pdf->Cell(190,4,'Kohima',0,0,'C',0);


}
$pdf->Output();
?>