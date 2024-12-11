  <?php
  include('fpdf/fpdf.php');
  require("dbconn.php");
  $dist=$_POST['nbseDistrict'];
  $class = $_POST['class'];
  $pdf= new FPDF('P','mm','legal');
  $left = 10;
  $off=0;
  $valAlign = 180;
  $sign = 0;

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
    
      $pdf->SetFont('Times','B',11);
      $pdf->SetXY(10,10);
      $pdf->Cell(190,4,'Confidential(HSLC)',0,0,'R',0);
      $pdf->SetFont('Times','B',13);
      $pdf->SetXY(10,20);
      $pdf->Cell(190,4,'Nagaland Board of School Education',0,0,'C',0);
      $pdf->SetXY(10,25);
      $pdf->Cell(190,4,'Kohima',0,0,'C',0);
      $pdf->SetFont('Times','',11);
      $pdf->SetXY($left,30);
      $pdf->Cell(190,4,'NO.NBE-2/Ex-10/2016-17/',0,0,'L',0);
      $pdf->SetXY(10,30);
      $pdf->Cell(190,4,'Dated Kohima, the     th January,2017',0,0,'R',0);
      $pdf->SetXY($left,40);
      $pdf->Cell(190,4,'To,',0,0,'L',0);
      $pdf->SetXY(30,45);
      $pdf->Cell(190,4,'The Sr. Treasury Officer/Treasury Officer/Sub-Treasury Officer/',0,0,'L',0);
      $pdf->SetXY(30,50);
      $pdf->Cell(190,4,'Branch Manager,',0,0,'L',0);
     
      $pdf->SetXY($left,65);
      $pdf->Cell(190,4,'Subject:-',0,0,'L',0);
      $pdf->SetFont('Times','B',11);
      $pdf->SetXY(30,65);
      $pdf->Cell(190,4,'Confidential papers of the High School Leaving Certificate Examination 2017',0,0,'L',0);
      $pdf->SetFont('Times','',11);
      $pdf->SetXY($left,70);
      $pdf->Cell(190,4,'Sir/Madam,',0,0,'L',0);
      $pdf->SetXY(30,75);
      $pdf->Cell(190,4,'Please find herewith _____ sealed packets of confidential',0,0,'L',0);
      $pdf->SetXY($left,80);
      $pdf->Cell(190,4,'Papers to be kept under your custody for the HSLC Examination 2017 to be held from 15th February',0,0,'L',0);
      $pdf->SetXY($left,85);
      $pdf->Cell(190,4,'2017 as per routine enclosed. Kindly issue the confidential packets to the concerned Centre',0,0,'L',0);
      $pdf->SetXY(30,90);
      $pdf->Cell(190,4,'Superintendent on the date shown below at the appointed time against each subject:',0,0,'L',0);
      $pdf->SetFont('Times','B',11);
      $pdf->SetXY(80,110);
      $pdf->Cell(190,4,'Time: 9 am -12 noon',0,0,'L',0);
      $pdf->SetXY($left,115);
      $pdf->Cell(190,4,'Date',1,0,'L',0);
      $pdf->SetXY(60,115);
      $pdf->Cell(190,4,'Day',0,0,'L',0);
      $pdf->SetXY(90,115);
      $pdf->Cell(190,4,'Subject',0,0,'L',0);
      $pdf->SetXY(145,115);
      $pdf->Cell(190,4,'Number of confidential papers',0,0,'L',0);
    
      $sl=1;
      $ss=mysql_query("select * from c10_timetbl order by sl asc");
      while($rr=mysql_fetch_array($ss,MYSQL_ASSOC))
      {
        
      if($rr['subject']=='Mils')
        {
          
      $pdf->SetXY($left,120+$off);
      $pdf->Cell(190,4,$rr['e_date'],0,0,'L',0);
      $pdf->SetXY(60,120+$off);
      $pdf->Cell(190,4,$rr['day'],0,0,'L',0);
      $pdf->SetXY(90,120+$off);
      $pdf->Cell(190,4,'Second Language:',0,0,'L',0);
      $pdf->SetXY(95,126+$off);
      $pdf->Cell(190,4,'i.  Tenyidie',0,0,'L',0);
      $pdf->SetXY($valAlign,126+$off);
      if(!empty($row['tny']))
      {
      $pdf->Cell(190,4,$row['tny'],0,0,'L',0);
      }
      else
      {
      $pdf->Cell(190,4,'______',0,0,'L',0);
      }
      $pdf->SetXY(95,132+$off);
      $pdf->Cell(190,4,'ii.  Ao',0,0,'L',0);
       $pdf->SetXY($valAlign,132+$off);
      if(!empty($row['aon']))
      {
      $pdf->Cell(190,4,$row['aon'],0,0,'L',0);
      }
      else
      {
      $pdf->Cell(190,4,'______',0,0,'L',0);
      }
      $pdf->SetXY(95,138+$off);
      $pdf->Cell(190,4,'iii.  Sumi',0,0,'L',0);
      $pdf->SetXY($valAlign,138+$off);
       if(!empty($row['smi']))
      {
      $pdf->Cell(190,4,$row['smi'],0,0,'L',0);
      }
      else
      {
      $pdf->Cell(190,4,'______',0,0,'L',0);
      }
      $pdf->SetXY(95,144+$off);
      $pdf->Cell(190,4,'iv.  Lotha',0,0,'L',0);
      $pdf->SetXY($valAlign,144+$off);
       if(!empty($row['lta']))
      {
      $pdf->Cell(190,4,$row['lta'],0,0,'L',0);
      }
      else
      {
      $pdf->Cell(190,4,'______',0,0,'L',0);
      }
      $pdf->SetXY(95,150+$off);
      $pdf->Cell(190,4,'v.  Hindi',0,0,'L',0);
      $pdf->SetXY($valAlign,150+$off);
       if(!empty($row['aon']))
      {
      $pdf->Cell(190,4,$row['hnd'],0,0,'L',0);
      }
      else
      {
      $pdf->Cell(190,4,'______',0,0,'L',0);
      }
      $pdf->SetXY(95,156+$off);
      $pdf->Cell(190,4,'vi.  Bengali',0,0,'L',0);
      $pdf->SetXY($valAlign,156+$off);
       if(!empty($row['bng']))
      {
      $pdf->Cell(190,4,$row['bng'],0,0,'L',0);
      }
      else
      {
      $pdf->Cell(190,4,'______',0,0,'L',0);
      }
      $pdf->SetXY(95,162+$off);
      $pdf->Cell(190,4,'vii.  Alternative English',0,0,'L',0);
      $pdf->SetXY($valAlign,162+$off);
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
      $pdf->SetXY($left,172+$off);
      $pdf->Cell(190,4,$rr['e_date'],0,0,'L',0);
      $pdf->SetXY(60,172+$off);
      $pdf->Cell(190,4,$rr['day'],0,0,'L',0);
      $pdf->SetXY(90,172+$off);
      $pdf->Cell(190,4,'Sixth Subjects/Vocational:',0,0,'L',0);
      $pdf->SetXY(95,178+$off);
      $pdf->Cell(190,4,'i.  FIT',0,0,'L',0);
      $pdf->SetXY($valAlign,178+$off);
      if(!empty($row['fit']))
      {
      $pdf->Cell(190,4,$row['fit'],0,0,'L',0);
      }
      else
      {
      $pdf->Cell(190,4,'______',0,0,'L',0);
      }
      $pdf->SetXY(95,184+$off);
      $pdf->Cell(190,4,'ii.  Music',0,0,'L',0);
      $pdf->SetXY($valAlign,184+$off);
      if(!empty($row['msc']))
      {
      $pdf->Cell(190,4,$row['msc'],0,0,'L',0);
      }
      else
      {
      $pdf->Cell(190,4,'______',0,0,'L',0);
      }
      $pdf->SetXY(95,190+$off);
      $pdf->Cell(190,4,'iii.  Home Science',0,0,'L',0);
      $pdf->SetXY($valAlign,190+$off);
      if(!empty($row['hs']))
      {
      $pdf->Cell(190,4,$row['hs'],0,0,'L',0);
      }
      else
      {
      $pdf->Cell(190,4,'______',0,0,'L',0);
      }
      $pdf->SetXY(95,196+$off);
      $pdf->Cell(190,4,'iv.  BK & Accountancy',0,0,'L',0);
      $pdf->SetXY($valAlign,196+$off);
      if(!empty($row['bk']))
      {
      $pdf->Cell(190,4,$row['bk'],0,0,'L',0);
      }
      else
      {
      $pdf->Cell(190,4,'______',0,0,'L',0);
      }
      $pdf->SetXY(95,202+$off);
      $pdf->Cell(190,4,'v.  Environmental Education',0,0,'L',0);
      $pdf->SetXY($valAlign,202+$off);
      if(!empty($row['ee']))
      {
      $pdf->Cell(190,4,$row['ee'],0,0,'L',0);
      }
      else
      {
      $pdf->Cell(190,4,'______',0,0,'L',0);
      }
      $pdf->SetXY(95,208+$off);
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
      $pdf->SetXY($valAlign,208+$off);
      if(empty($row['iv']) && empty($row['tt']))
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

      $pdf->SetXY(95,214+$off);
      if(!empty($row['rt']) && !empty($row['hc']))
      {
      $pdf->Cell(190,4,'vii.  Retail/Health Care(Vocational)',0,0,'L',0);
      }
      else if(!empty($row['rt']) && empty($row['hc']))
      {
         $pdf->Cell(190,4,'vii.  Retail(Vocational)',0,0,'L',0);
      }
      else if(empty($row['rt']) && !empty($row['hc']))
      {
         $pdf->Cell(190,4,'vi.  Healt Care(Vocational)',0,0,'L',0);
      }
      else
      {
        $pdf->Cell(190,4,'vi.  Retail/Health Care(Vocational)',0,0,'L',0);
      }
      $pdf->SetXY($valAlign,214+$off);
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
       $pdf->SetXY($left,120+$off);
        $pdf->Cell(190,4,$rr['e_date'],0,0,'L',0);
       $pdf->SetXY(60,120+$off);
        $pdf->Cell(190,4,$rr['day'],0,0,'L',0);
       $pdf->SetXY(90,120+$off);
        $pdf->Cell(190,4,$rr['subject'],0,0,'L',0);
        $pdf->SetXY($valAlign,120+$off);
        $pdf->Cell(190,4,$row['main'],0,0,'L',0);
        $off=$off+6;

       }
      $sl++;} $off=0;
      $pdf->SetFont('Times','',11);
      $pdf->SetXY(10,270+$sign);
      $pdf->Cell(190,4,'( Mrs. Asano Sekhose )',0,0,'R',0);
      $pdf->SetXY(175,274+$sign);
      $pdf->Cell(190,4,'Chairman',0,0,'L',0);
      $pdf->SetXY($left,280);
      $pdf->Cell(190,4,'NO.NBE-2/Ex-10/2016-17/',0,0,'L',0);
      $pdf->SetXY(10,280);
      $pdf->Cell(190,4,'Dated Kohima, the     th January,2017',0,0,'R',0);
      $pdf->SetXY($left,286);
      $pdf->Cell(190,4,'Copy to :-',0,0,'L',0);
      $pdf->SetXY(20,292);
      $pdf->Cell(190,4,'1.      The Deputy Commissioner/Additional Deputy Commissioner/S.D.O(Civil)/E.A.C.,',0,0,'L',0);
      $pdf->SetXY(20,298);
      $pdf->Cell(190,4,'        __________________________________________ for information and necessary action.',0,0,'L',0);
      $pdf->SetXY(10,320);
      $pdf->Cell(190,4,'( Mrs. Asano Sekhose )',0,0,'R',0);
      $pdf->SetXY(175,326+$sign);
      $pdf->Cell(190,4,'Chairman',0,0,'L',0);
  

}

$pdf->Output();
?>