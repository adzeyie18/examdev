<?php
include('../fpdf/fpdf.php');
//require("dbconn.php");
	
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

if($class=='9'){$class1=9;}
if($class=='10'){$class1=10;}
if($class=='11a'||$class=='11c'||$class=='11s'){$class1=11;}
if($class=='12a'||$class=='12c'||$class=='12s'){$class1=12;}




if($exam=="main" && $class=='10')
{
	if($class==10 && $dist=="KOHIMA")
	{
		$content = 110;
		$fetchData = new fetchdata($dist);
		//$sql=mysql_query("select * from c10_pkChrt_16 where district='$dist'");
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
			$pdf->Cell(190,4,'                                     at your centre. The numbers of question papers supplied are given below and you ',0,0,'L',0);
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
					$pdf->Cell(190,4,'xi.   Electronics',0,0,'L',0);
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
						$pdf->Cell(190,4,$rr['subject'].' A/B',0,0,'L',0);
						$pdf->SetXY($valAlign,$content+$off);
						//$pdf->Cell(190,4,$row['mata'],0,0,'L',0);
						if(!empty($row['mata']) && (!empty($row['matb'])))
						{
							$pdf->Cell(190,4,$row['mata'].'/'.$row['matb'],0,0,'L',0);
						}
						else if(!empty($row['mata']) && (empty($row['matb'])))
						{
							$pdf->Cell(190,4,$row['mata'].'/______',0,0,'L',0);
						}
						else if(empty($row['mata']) && (!empty($row['matb'])))
						{
							$pdf->Cell(190,4,'______/'.$row['matb'],0,0,'L',0);
						}
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
			$pdf->Cell(190,4,'Chairperson',0,0,'L',0);
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
			$pdf->Cell(190,4,'Chairperson',0,0,'L',0);
		}
	} 
	
}


// forwarding for class eleven-commerce



// forwarding for class eleven-science








$pdf->Output();
?>