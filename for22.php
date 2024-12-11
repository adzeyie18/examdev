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
  $inc = 8;

// FORWARDING FOR CLASS NINE

  if($class=='9')
{
  $contents = 105;
  $sql=mysql_query("select * from c9_pkChrt_16 where district='$dist'");
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
    if(!empty($row['geo'])){ $tot11=3;} else {$tot11=0;}
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


    $tot=$tot1+$tot2+$tot3+$tot4+$tot5+$tot6+$tot7+$tot8+$tot9+$tot10+$tot11+$tot12+$tot13+$tot14+$tot16+$tot15+$tot17+$tot18+$tot19+$tot20+$tot21+$tot22;
      $not = mysql_query("select * from notification_tbl where class='9'");
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
      $pdf->Cell(190,4,'Dated Kohima, the  15',0,0,'L',0);
      $pdf->SetFont('Times','',10);
      $pdf->SetXY(171,28);
      $pdf->Cell(190,4,$get['sup_script'],0,0,'L',0);
      $pdf->SetFont('Times','',12);
      $pdf->SetXY(175,30);
      $pdf->Cell(190,4,$get['noti_month_year'],0,0,'L',0);
      $pdf->SetXY($left,40);
      $pdf->Cell(190,4,'To,',0,0,'L',0);
      $pdf->SetXY(30,45);
      $pdf->Cell(190,4,'The Principal,',0,0,'L',0);
      $pdf->SetXY(30,50);
      $pdf->Cell(190,4,$row['school'],0,0,'L',0);
      //$pdf->SetXY(30,55);
      //$pdf->Cell(190,4,'Centre :- ____________',0,0,'L',0);
      $pdf->SetXY($left,60);
      $pdf->Cell(190,4,'Subject:-',0,0,'L',0);
      $pdf->SetFont('Times','B',11);
      $pdf->SetXY(30,60);
      $pdf->Cell(190,4,'Confidential papers for Class-IX Promotion Examination 2018',0,0,'L',0);
      $pdf->SetFont('Times','',12);
      $pdf->SetXY($left,70);
      $pdf->Cell(190,4,'Sir/Madam,',0,0,'L',0);
      $pdf->SetXY(30,75);
       $pdf->Cell(190,4,'Please find herewith a packet which contains       sealed packets of confidential papers for',0,0,'L',0);
        $pdf->SetFont('Times','B',12);
       $pdf->SetXY(108,75);
      $pdf->Cell(190,4,$tot,0,0,'L',0);
      $pdf->SetFont('Times','',12);
      $date = date('Y');
      $pdf->SetXY($left,80);
      $pdf->Cell(190,4,'                                                                to be held in your institution from the                             ',0,0,'L',0);
      $pdf->SetFont('Times','I',12);
      $pdf->SetXY($left,80);
      $pdf->Cell(190,4,'Class XI Promotion Examination '.$date,0,0,'L',0);
       
      $firstExam = mysql_query('select * from c9_timetbl where sl=1');
      $firstExam = mysql_fetch_array($firstExam);
      $pdf->SetFont('Times','B',12);
      $pdf->SetXY($left+133,80);
      $pdf->Cell(190,4,$firstExam['e_date'],0,0,'L',0);
      $pdf->SetFont('Times','',12);
      $pdf->SetXY($left,85);
      $pdf->Cell(190,4,'as per the routine given below:',0,0,'L',0);
  //    $pdf->SetXY(30,90);
   //   $pdf->Cell(190,4,'Kindly collect the packets on the specific dates. The numbers of question papers supplied',0,0,'L',0);
   //   $pdf->SetXY($left,95);
   //   $pdf->Cell(190,4,'are given below and you are requested to confirm the numbers to ensure that all the subjects and the',0,0,'L',0);
   //   $pdf->SetXY($left,100);
   //   $pdf->Cell(190,4,'required numbers issued to your centre are sufficient. You are also directed to read the necessary',0,0,'L',0);
  //    $pdf->SetXY($left,105);
  //    $pdf->Cell(190,4,'instructions for the conduct of examinations.',0,0,'L',0);
      $pdf->SetFont('Times','B',12);
     // $pdf->SetXY(80,95);
     // $pdf->Cell(190,4,'Time: 1 pm - 4 pm',0,0,'L',0);
      $pdf->SetXY($left,95);
      $pdf->Cell(192,8,'Date',1,0,'L',0);
      $pdf->SetXY(60,95);
      $pdf->Cell(190,8,'Day',0,0,'L',0);
      $pdf->SetXY(90,95);
      $pdf->Cell(190,8,'Subject (Time: 1 pm - 4 pm)',0,0,'L',0);
      $pdf->SetXY(145,95);
      $pdf->Cell(190,8,'Number of confidential papers',0,0,'L',0);
    
      $sl=1;
      $ss=mysql_query("select * from c9_timetbl order by sl asc");
      while($rr=mysql_fetch_array($ss,MYSQL_ASSOC))
      {
        
      if($rr['subject']=='Mils')
        {
          
      $pdf->SetXY($left,$contents+$off);
      $pdf->Cell(190,4,$rr['e_date'],0,0,'L',0);
      $pdf->SetXY(60,$contents+$off);
      $pdf->Cell(190,4,$rr['day'],0,0,'L',0);
     // $pdf->SetXY(90,120+$off);
    //  $pdf->Cell(190,4,'Second Language:',0,0,'L',0);
      $pdf->SetXY(95,$contents+$off);
      $pdf->Cell(190,4,'i.   Tenyidie',0,0,'L',0);
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
      $pdf->Cell(190,4,'iii. Sumi',0,0,'L',0);
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
      $pdf->Cell(190,4,'iv. Lotha',0,0,'L',0);
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
      $pdf->Cell(190,4,'v.  Hindi',0,0,'L',0);
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
      $pdf->Cell(190,4,'vi. Bengali',0,0,'L',0);
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
      $pdf->Cell(190,4,'vii.Alternative English',0,0,'L',0);
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
      }


       else if($rr['subject']!='' && $rr['e_date']!='')
       {
       $pdf->SetXY($left,$contents+$off);
       $val = $rr['e_date'];
        $pdf->Cell(190,4,$rr['e_date'],0,0,'L',0);
       $pdf->SetXY(60,$contents+$off);
        $pdf->Cell(190,4,$rr['day'],0,0,'L',0);
       
      //  $num=mysql_query("select * from c11a_timetbl where e_date='$val'");
      // $count = mysql_num_rows($num);
        
        
          $pdf->SetXY(90,$contents+$off);
          $pdf->Cell(190,4,$rr['subject'],0,0,'L',0);
          //if($rr['subcode']=='geo')
         // {
          //  $off=$off+$inc;
           // $pdf->SetXY(90,$contents+$off);
          //  $pdf->Cell(190,4,'a. World Map',0,0,'L',0);
          //   $off=$off+$inc;

        //  }else {}
          
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
          if($rr['subcode']=='evs'){$main='evs';}
          if($row[$main]!='')
          {
          $pdf->SetXY($valAlign,$contents+$off);
          $pdf->Cell(190,4,$row[$main],0,0,'L',0);
          $off=$off+$inc;
          if($rr['subcode']=='geo')
         {
        
         $pdf->SetXY(95,$contents+$off);
         $pdf->Cell(190,4,'a. World Map',0,0,'L',0);
         $pdf->SetXY($valAlign,$contents+$off);
         $pdf->Cell(190,4,$row[$main],0,0,'L',0);
        $off=$off+$inc;
        $pdf->SetXY(95,$contents+$off);
         $pdf->Cell(190,4,'b. Map of India',0,0,'L',0);
         $pdf->SetXY($valAlign,$contents+$off);
         $pdf->Cell(190,4,$row[$main],0,0,'L',0);
        $off=$off+$inc;

         }else {}}else {
           $pdf->SetXY($valAlign,$contents+$off);
          $pdf->Cell(190,4,'____',0,0,'L',0);
          $off=$off+$inc;
         }
        
          }
           else 
          {
            $pdf->SetXY(90,$contents+$off);
          $pdf->Cell(190,4,$rr['subject'],0,0,'L',0);
          $pdf->SetXY($valAlign,$contents+$off);
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
          if($rr['subcode']=='evs'){$main='evs';}
          if($row[$main]=='')
          {
           
            $pdf->Cell(190,4,"____",0,0,'L',0);
          $off=$off+$inc;
          
          }
          else
          {
           // $pdf->SetFont('Times','B',12);
          $pdf->Cell(190,4,$row[$main],0,0,'L',0);
          $off=$off+$inc;
        }
          }
        }
      $sl++;$off=0;
      $pdf->SetFont('Times','',12);
      $pdf->SetXY($left,295);
      $pdf->Cell(190,4,'Signature with date..........................................',0,0,'L',0);
      $pdf->SetXY($left,305);
      $pdf->Cell(190,4,'Name : ............................................................',0,0,'L',0);
      $pdf->SetXY($left,315);
      $pdf->Cell(190,4,'Designation : ..................................................',0,0,'L',0);
       $pdf->SetXY($left,325);
      $pdf->Cell(190,4,'( Keneilenyü Nagi )',0,0,'R',0);
       $pdf->SetFont('Times','B',12);
      $pdf->SetXY($left,330);
      $pdf->Cell(190,4,'Controller of Examinations',0,0,'R',0);
     
  
}
}

  
  //  FORWARDING FOR CLASS TEN

if($class==10 && $dist=="KOHIMA")
{
  $content = 128;

  $sql=mysql_query("select * from c10_pkChrt_16 where district='$dist'");
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


    $tot=$tot1+$tot2+$tot3+$tot4+$tot5+$tot6+$tot7+$tot8+$tot9+$tot10+$tot11+$tot12+$tot13+$tot14+$tot16+$tot15+4;
    $not = mysql_query("select * from notification_tbl where class='10'");
    $get = mysql_fetch_array($not);
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
      $pdf->Cell(190,4,'Mr,Mrs.___________________________________________________________',0,0,'L',0);
      $pdf->SetXY(30,50);
      $pdf->Cell(190,4,'Centre Superintendent,',0,0,'L',0);
      $pdf->SetXY(30,55);
      $pdf->Cell(190,4,'Centre :- '.$row['school'],0,0,'L',0);
      $pdf->SetXY($left,65);
      $pdf->Cell(190,4,'Subject:-',0,0,'L',0);
      $pdf->SetFont('Times','B',12);
      $pdf->SetXY(30,65);
      $pdf->Cell(190,4,'Confidential papers of the High School Leaving Certificate Examination 2018',0,0,'L',0);
      $pdf->SetFont('Times','',12);
      $pdf->SetXY($left,70);
      $pdf->Cell(190,4,'Sir/Madam,',0,0,'L',0);
      $pdf->SetXY(30,75);
      $pdf->Cell(190,4,'I am to inform you that the sealed packets containing the confidential papers for the HSLC',0,0,'L',0);
      $pdf->SetXY($left,80);
      $pdf->Cell(190,4,'Examination 2018, to be held from                              at your centre shall be kept in the custody of this',0,0,'L',0);
      $firstExam = mysql_query('select * from c10_timetbl where sl=1');
      $firstExam = mysql_fetch_array($firstExam);
      $pdf->SetFont('Times','B',12);
      $pdf->SetXY($left+60,80);
      $pdf->Cell(190,4,$firstExam['e_date'],0,0,'L',0);
      $pdf->SetFont('Times','',12);
      $pdf->SetXY($left,85);
      $pdf->Cell(190,4,'Office.',0,0,'L',0);
      $pdf->SetXY(30,90);
      $pdf->Cell(190,4,'Kindly collect the packets on the specific dates. The numbers of question papers supplied',0,0,'L',0);
      $pdf->SetXY($left,95);
      $pdf->Cell(190,4,'are given below and you are requested to confirm the numbers to ensure that all the subjects and the',0,0,'L',0);
      $pdf->SetXY($left,100);
      $pdf->Cell(190,4,'required numbers issued to your centre are sufficient. You are also directed to read the necessary',0,0,'L',0);
      $pdf->SetXY($left,105);
      $pdf->Cell(190,4,'instructions for the conduct of examinations.',0,0,'L',0);
      $pdf->SetFont('Times','B',12);
      $pdf->SetXY(80,110);
      $pdf->Cell(190,4,'Time: 9 am -12 noon',0,0,'L',0);
      $pdf->SetXY($left,115);
      $pdf->Cell(192,8,'Date',1,0,'L',0);
      $pdf->SetXY(60,115);
      $pdf->Cell(190,8,'Day',0,0,'L',0);
      $pdf->SetXY(90,115);
      $pdf->Cell(190,8,'Subject',0,0,'L',0);
      $pdf->SetXY(145,115);
      $pdf->Cell(190,8,'Number of confidential papers',0,0,'L',0);
    
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
      $pdf->Cell(190,4,'i.  Tenyidie',0,0,'L',0);
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
      $pdf->Cell(190,4,'ii.  Ao',0,0,'L',0);
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
      $pdf->Cell(190,4,'iii.  Sumi',0,0,'L',0);
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
      $pdf->Cell(190,4,'v.  Hindi',0,0,'L',0);
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
      $pdf->Cell(190,4,'Sixth Subjects/Vocationals:',0,0,'L',0);
      $off=$off+$inc;
      $pdf->SetXY(95,$content+$off);
      $pdf->Cell(190,4,'i.  FIT',0,0,'L',0);
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
      $pdf->Cell(190,4,'ii.  Music',0,0,'L',0);
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
      $pdf->Cell(190,4,'iii.  Home Science',0,0,'L',0);
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
      $pdf->Cell(190,4,'iv.  BK & Accountancy',0,0,'L',0);
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
      $pdf->Cell(190,4,'v.  Environmental Education',0,0,'L',0);
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
      
      $pdf->SetXY($valAlign,$content+$off);
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
       $off=$off+$inc;

      $pdf->SetXY(95,$content+$off);
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
         $pdf->Cell(190,4,'vii.  Health Care(Vocational)',0,0,'L',0);
      }
      else
      {
        $pdf->Cell(190,4,'vii.  Retail/Health Care(Vocational)',0,0,'L',0);
      }
       
      $pdf->SetXY($valAlign,$content+$off);
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
      $sl++;} $off=0;
      $sign =16; $bottom = 6;
      $pdf->SetFont('Times','',11);
      $pdf->SetXY(10,270+$sign);
      $pdf->Cell(190,4,'( Mrs. Asano Sekhose )',0,0,'R',0);
      $sign = $sign+$bottom;
      $pdf->SetXY(175,270+$sign);
      $pdf->Cell(190,4,'Chairman',0,0,'L',0);
      $sign = $sign+$bottom;
      $pdf->SetXY($left,270+$sign);
      $pdf->Cell(190,4,$get['noti_detail'],0,0,'L',0);
      $pdf->SetXY(134,270+$sign);
      $pdf->Cell(147,4,'Dated Kohima, the      ',0,0,'L',0);
      $pdf->SetXY(171,270+$sign-2);
      $pdf->Cell(190,4,$get['sup_script'],0,0,'L',0);
      $pdf->SetXY(175,270+$sign);
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
  $content=109;
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
      $not = mysql_query("select * from notification_tbl where class='10'");
      $get = mysql_fetch_array($not);
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
      $pdf->Cell(190,4,'The Sr. Treasury Officer/Treasury Officer/Sub-Treasury Officer/',0,0,'L',0);
      $pdf->SetXY(30,50);
      $pdf->Cell(190,4,'Branch Manager,',0,0,'L',0);
      $pdf->SetXY(30,55);
      $pdf->Cell(190,4,'_____________________________________________________________',0,0,'L',0);
     
      $pdf->SetXY($left,65);
      $pdf->Cell(190,4,'Subject:-',0,0,'L',0);
      $pdf->SetFont('Times','B',12);
      $pdf->SetXY(30,65);
      $pdf->Cell(190,4,'Confidential papers of the High School Leaving Certificate Examination 2018',0,0,'L',0);
      $pdf->SetFont('Times','',12);
      $pdf->SetXY($left,70);
      $pdf->Cell(190,4,'Sir/Madam,',0,0,'L',0);
      $pdf->SetXY(30,75);
      $pdf->Cell(190,4,'Please find herewith        sealed packets of Confidential Papers to be kept under your custody',0,0,'L',0);
      $pdf->SetXY(67,75);
      $pdf->SetFont('Times','B',12);
      $pdf->Cell(190,4,$tot,0,0,'L',0);
      $pdf->SetXY($left,80);
      $pdf->SetFont('Times','',12);
      $pdf->Cell(190,4,'for the                                            to be held from                               as per routine enclosed.',0,0,'L',0);
      $pdf->SetFont('Times','I',12);
      $pdf->SetXY($left+13,80);
      $pdf->Cell(190,4,'HSLC Examination 2018',0,0,'L',0);
      $pdf->SetFont('Times','B',12);
      $firstExam = mysql_query('select * from c10_timetbl where sl=1');
      $firstExam = mysql_fetch_array($firstExam);
      $pdf->SetXY($left+85,80);
      $pdf->Cell(190,4,$firstExam['e_date'],0,0,'L',0);
      $pdf->SetFont('Times','',12);
      $pdf->SetXY($left,85);
      $pdf->Cell(190,4,'Kindly issue the confidential packets to the concerned Centre Superintendent on the date shown below at the',0,0,'L',0);
      $pdf->SetXY($left,90);
      $pdf->Cell(190,4,'appointed time against each subject:',0,0,'L',0);
      $pdf->SetFont('Times','B',12);
      $pdf->SetXY(80,95);
      $pdf->Cell(190,4,'Time: 9 am -12 noon',0,0,'L',0);
      $pdf->SetXY($left,100);
      $pdf->Cell(192,6,'Date',1,0,'L',0);
      $pdf->SetXY(60,100);
      $pdf->Cell(190,6,'Day',0,0,'L',0);
      $pdf->SetXY(90,100);
      $pdf->Cell(190,6,'Subject',0,0,'L',0);
      $pdf->SetXY(145,100);
      $pdf->Cell(190,6,'Number of confidential papers',0,0,'L',0);
    
      $sl=1;
      $ss=mysql_query("select * from c10_timetbl order by sl asc");
      while($rr=mysql_fetch_array($ss,MYSQL_ASSOC))
      {
        $inc = 7;
        
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
      $pdf->Cell(190,4,'i.  Tenyidie',0,0,'L',0);
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
      $pdf->Cell(190,4,'ii.  Ao',0,0,'L',0);
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
      $pdf->Cell(190,4,'iii.  Sumi',0,0,'L',0);
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
      $pdf->Cell(190,4,'v.  Hindi',0,0,'L',0);
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
      $pdf->Cell(190,4,'Sixth Subjects/Vocational:',0,0,'L',0);
      $off=$off+$inc;
      $pdf->SetXY(95,$content+$off);
      $pdf->Cell(190,4,'i.  FIT',0,0,'L',0);
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
      $pdf->Cell(190,4,'ii.  Music',0,0,'L',0);
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
      $pdf->Cell(190,4,'iii.  Home Science',0,0,'L',0);
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
      $pdf->Cell(190,4,'iv.  BK & Accountancy',0,0,'L',0);
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
      $pdf->Cell(190,4,'v.  Environmental Education',0,0,'L',0);
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
      
      $pdf->SetXY($valAlign,$content+$off);
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
       $off=$off+$inc;

      $pdf->SetXY(95,$content+$off);
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
         $pdf->Cell(190,4,'vii.  Health Care(Vocational)',0,0,'L',0);
      }
      else
      {
        $pdf->Cell(190,4,'vii.  Retail/Health Care(Vocational)',0,0,'L',0);
      }
       
      $pdf->SetXY($valAlign,$content+$off);
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
      $sl++;} $off=0; $sign =16; $bottom = 5; 
      $pdf->SetFont('Times','',11);
      $pdf->SetXY(10,245+$sign);
      $pdf->Cell(190,4,'( Mrs. Asano Sekhose )',0,0,'R',0);
      $sign = $sign + $bottom;
      $pdf->SetXY(175,245+$sign);
      $pdf->Cell(190,4,'Chairman',0,0,'L',0);
       $sign = $sign + $bottom;
      $pdf->SetXY($left,245+$sign);
      $pdf->Cell(190,4,$get['noti_detail'],0,0,'L',0);
      $pdf->SetXY(134,245+$sign);
      $pdf->Cell(147,4,'Dated Kohima, the      ',0,0,'L',0);
      $pdf->SetXY(171,245+$sign-2);
      $pdf->Cell(190,4,$get['sup_script'],0,0,'L',0);
       $pdf->SetXY(175,245+$sign);
      $pdf->Cell(190,4,$get['noti_month_year'],0,0,'L',0);
      $sign = $sign + $bottom;
      $pdf->SetXY($left,245+$sign);
      $pdf->Cell(190,4,'Copy to :-',0,0,'L',0);
       $sign = $sign + $bottom;
      $pdf->SetXY(20,245+$sign);
      $pdf->Cell(190,4,'1.      The Deputy Commissioner/Additional Deputy Commissioner/S.D.O(Civil)/E.A.C.,',0,0,'L',0);
       $sign = $sign + $bottom;
      $pdf->SetXY(20,245+$sign);
      $pdf->Cell(190,4,'        __________________________________________ for information and necessary action.',0,0,'L',0);
       $sign = $sign + $bottom;
       $pdf->SetXY(20,245+$sign);
      $pdf->Cell(190,4,'2.      Mr/Mrs ______________________________________________, Centre Superintendent',0,0,'L',0);
      $sign = $sign + $bottom;
       $pdf->SetXY(20,245+$sign);
      $pdf->Cell(190,4,'        of ',0,0,'L',0);
      $pdf->SetXY(35,245+$sign);
      $pdf->SetFont('Times','B',11);
      $pdf->Cell(190,4,$row['school'],0,0,'L',0);
      $pdf->SetFont('Times','',11);
       $sign = $sign + $bottom;
       $pdf->SetXY(20,245+$sign);
      $pdf->Cell(190,4,'        On receipt of this letter, you are requested to confirm the numbers to ensure that all the subjects',0,0,'L',0);
      $sign = $sign + $bottom;
       $pdf->SetXY(20,245+$sign);
      $pdf->Cell(190,4,'        and the required numbers issued to your centre are sufficient. Further, you are directed to read and',0,0,'L',0);
      $sign = $sign + $bottom;
       $pdf->SetXY(20,245+$sign);
      $pdf->Cell(190,4,'        follow the instructions for the conduct of examination.',0,0,'L',0);
      $sign = $sign + $bottom;
       $pdf->SetXY(20,245+$sign);
      $pdf->Cell(190,4,'3.      Office copy.',0,0,'L',0);
      $sign = $sign + $bottom;
      $pdf->SetXY(10,250+$sign);
      $pdf->Cell(190,4,'( Mrs. Asano Sekhose )',0,0,'R',0);
       $sign = $sign + $bottom;
      $pdf->SetXY(175,250+$sign);
      $pdf->Cell(190,4,'Chairman',0,0,'L',0);
  

}
}
if($class=='11a')
{
  $contents = 105;
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
    if(!empty($row['geo'])){ $tot11=3;} else {$tot11=0;}
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


    $tot=$tot1+$tot2+$tot3+$tot4+$tot5+$tot6+$tot7+$tot8+$tot9+$tot10+$tot11+$tot12+$tot13+$tot14+$tot16+$tot15+$tot17+$tot18+$tot19+$tot20+$tot21+$tot22;
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
      $pdf->Cell(190,4,'Dated Kohima, the  15',0,0,'L',0);
      $pdf->SetFont('Times','',10);
      $pdf->SetXY(171,28);
      $pdf->Cell(190,4,$get['sup_script'],0,0,'L',0);
      $pdf->SetFont('Times','',12);
      $pdf->SetXY(175,30);
      $pdf->Cell(190,4,$get['noti_month_year'],0,0,'L',0);
      $pdf->SetXY($left,40);
      $pdf->Cell(190,4,'To,',0,0,'L',0);
      $pdf->SetXY(30,45);
      $pdf->Cell(190,4,'The Principal,',0,0,'L',0);
      $pdf->SetXY(30,50);
      $pdf->Cell(190,4,$row['centre'],0,0,'L',0);
      //$pdf->SetXY(30,55);
      //$pdf->Cell(190,4,'Centre :- ____________',0,0,'L',0);
      $pdf->SetXY($left,60);
      $pdf->Cell(190,4,'Subject:-',0,0,'L',0);
      $pdf->SetFont('Times','B',11);
      $pdf->SetXY(30,60);
      $pdf->Cell(190,4,'Confidential papers for Class-XI Promotion Examination 2018',0,0,'L',0);
      $pdf->SetFont('Times','',12);
      $pdf->SetXY($left,70);
      $pdf->Cell(190,4,'Sir/Madam,',0,0,'L',0);
      $pdf->SetXY(30,75);
       $pdf->Cell(190,4,'Please find herewith a packet which contains       sealed packets of confidential papers for',0,0,'L',0);
        $pdf->SetFont('Times','B',12);
       $pdf->SetXY(108,75);
      $pdf->Cell(190,4,$tot,0,0,'L',0);
      $pdf->SetFont('Times','',12);
      $date = date('Y');
      $pdf->SetXY($left,80);
      $pdf->Cell(190,4,'                                                                to be held in your institution from the                             ',0,0,'L',0);
      $pdf->SetFont('Times','I',12);
      $pdf->SetXY($left,80);
      $pdf->Cell(190,4,'Class XI Promotion Examination '.$date,0,0,'L',0);
       
      $firstExam = mysql_query('select * from c11a_timetbl where sl=1');
      $firstExam = mysql_fetch_array($firstExam);
      $pdf->SetFont('Times','B',12);
      $pdf->SetXY($left+133,80);
      $pdf->Cell(190,4,$firstExam['e_date'],0,0,'L',0);
      $pdf->SetFont('Times','',12);
      $pdf->SetXY($left,85);
      $pdf->Cell(190,4,'as per the routine given below:',0,0,'L',0);
  //    $pdf->SetXY(30,90);
   //   $pdf->Cell(190,4,'Kindly collect the packets on the specific dates. The numbers of question papers supplied',0,0,'L',0);
   //   $pdf->SetXY($left,95);
   //   $pdf->Cell(190,4,'are given below and you are requested to confirm the numbers to ensure that all the subjects and the',0,0,'L',0);
   //   $pdf->SetXY($left,100);
   //   $pdf->Cell(190,4,'required numbers issued to your centre are sufficient. You are also directed to read the necessary',0,0,'L',0);
  //    $pdf->SetXY($left,105);
  //    $pdf->Cell(190,4,'instructions for the conduct of examinations.',0,0,'L',0);
      $pdf->SetFont('Times','B',12);
     // $pdf->SetXY(80,95);
     // $pdf->Cell(190,4,'Time: 1 pm - 4 pm',0,0,'L',0);
      $pdf->SetXY($left,95);
      $pdf->Cell(192,8,'Date',1,0,'L',0);
      $pdf->SetXY(60,95);
      $pdf->Cell(190,8,'Day',0,0,'L',0);
      $pdf->SetXY(90,95);
      $pdf->Cell(190,8,'Subject (Time: 1 pm - 4 pm)',0,0,'L',0);
      $pdf->SetXY(145,95);
      $pdf->Cell(190,8,'Number of confidential papers',0,0,'L',0);
    
      $sl=1;
      $ss=mysql_query("select * from c11a_timetbl order by sl asc");
      while($rr=mysql_fetch_array($ss,MYSQL_ASSOC))
      {
        
      if($rr['subject']=='Mils')
        {
          
      $pdf->SetXY($left,$contents+$off);
      $pdf->Cell(190,4,$rr['e_date'],0,0,'L',0);
      $pdf->SetXY(60,$contents+$off);
      $pdf->Cell(190,4,$rr['day'],0,0,'L',0);
     // $pdf->SetXY(90,120+$off);
    //  $pdf->Cell(190,4,'Second Language:',0,0,'L',0);
      $pdf->SetXY(95,$contents+$off);
      $pdf->Cell(190,4,'i.   Tenyidie',0,0,'L',0);
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
      $pdf->Cell(190,4,'iii. Sumi',0,0,'L',0);
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
      $pdf->Cell(190,4,'iv. Lotha',0,0,'L',0);
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
      $pdf->Cell(190,4,'v.  Hindi',0,0,'L',0);
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
      $pdf->Cell(190,4,'vi. Bengali',0,0,'L',0);
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
      $pdf->Cell(190,4,'vii.Alternative English',0,0,'L',0);
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
      }


       else if($rr['subject']!='' && $rr['e_date']!='')
       {
       $pdf->SetXY($left,$contents+$off);
       $val = $rr['e_date'];
        $pdf->Cell(190,4,$rr['e_date'],0,0,'L',0);
       $pdf->SetXY(60,$contents+$off);
        $pdf->Cell(190,4,$rr['day'],0,0,'L',0);
       
      //  $num=mysql_query("select * from c11a_timetbl where e_date='$val'");
      // $count = mysql_num_rows($num);
        
        
          $pdf->SetXY(90,$contents+$off);
          $pdf->Cell(190,4,$rr['subject'],0,0,'L',0);
          //if($rr['subcode']=='geo')
         // {
          //  $off=$off+$inc;
           // $pdf->SetXY(90,$contents+$off);
          //  $pdf->Cell(190,4,'a. World Map',0,0,'L',0);
          //   $off=$off+$inc;

        //  }else {}
          
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
          if($rr['subcode']=='evs'){$main='evs';}
          if($row[$main]!='')
          {
          $pdf->SetXY($valAlign,$contents+$off);
          $pdf->Cell(190,4,$row[$main],0,0,'L',0);
          $off=$off+$inc;
          if($rr['subcode']=='geo')
         {
        
         $pdf->SetXY(95,$contents+$off);
         $pdf->Cell(190,4,'a. World Map',0,0,'L',0);
         $pdf->SetXY($valAlign,$contents+$off);
         $pdf->Cell(190,4,$row[$main],0,0,'L',0);
        $off=$off+$inc;
        $pdf->SetXY(95,$contents+$off);
         $pdf->Cell(190,4,'b. Map of India',0,0,'L',0);
         $pdf->SetXY($valAlign,$contents+$off);
         $pdf->Cell(190,4,$row[$main],0,0,'L',0);
        $off=$off+$inc;

         }else {}}else {
           $pdf->SetXY($valAlign,$contents+$off);
          $pdf->Cell(190,4,'____',0,0,'L',0);
          $off=$off+$inc;
         }
        
          }
           else 
          {
            $pdf->SetXY(90,$contents+$off);
          $pdf->Cell(190,4,$rr['subject'],0,0,'L',0);
          $pdf->SetXY($valAlign,$contents+$off);
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
          if($rr['subcode']=='evs'){$main='evs';}
          if($row[$main]=='')
          {
           
            $pdf->Cell(190,4,"____",0,0,'L',0);
          $off=$off+$inc;
          
          }
          else
          {
           // $pdf->SetFont('Times','B',12);
          $pdf->Cell(190,4,$row[$main],0,0,'L',0);
          $off=$off+$inc;
        }
          }
        }
      $sl++;$off=0;
      $pdf->SetFont('Times','',12);
      $pdf->SetXY($left,295);
      $pdf->Cell(190,4,'Signature with date..........................................',0,0,'L',0);
      $pdf->SetXY($left,305);
      $pdf->Cell(190,4,'Name : ............................................................',0,0,'L',0);
      $pdf->SetXY($left,315);
      $pdf->Cell(190,4,'Designation : ..................................................',0,0,'L',0);
       $pdf->SetXY($left,325);
      $pdf->Cell(190,4,'( Rangumbuing Nsarangbe )',0,0,'R',0);
       $pdf->SetFont('Times','B',12);
      $pdf->SetXY($left,330);
      $pdf->Cell(190,4,'Controller of Examinations',0,0,'R',0);
     
  
}
}

// forwarding for class eleven-commerce

if($class=='11c')
{
  $contents = 105;
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
        


    $tot=$tot1+$tot2+$tot3+$tot4+$tot5+$tot6+$tot7+$tot8+$tot9+$tot10+$tot11+$tot12+$tot13+$tot14+$tot16+$tot15+$tot17+$tot18+$tot19+$tot20;
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
      $pdf->Cell(190,4,'Dated Kohima, the  15',0,0,'L',0);
      $pdf->SetFont('Times','',10);
      $pdf->SetXY(171,28);
      $pdf->Cell(190,4,$get['sup_script'],0,0,'L',0);
      $pdf->SetFont('Times','',12);
      $pdf->SetXY(175,30);
      $pdf->Cell(190,4,$get['noti_month_year'],0,0,'L',0);
      $pdf->SetXY($left,40);
      $pdf->Cell(190,4,'To,',0,0,'L',0);
      $pdf->SetXY(30,45);
      $pdf->Cell(190,4,'The Principal,',0,0,'L',0);
      $pdf->SetXY(30,50);
      $pdf->Cell(190,4,$row['centre'],0,0,'L',0);
      //$pdf->SetXY(30,55);
      //$pdf->Cell(190,4,'Centre :- ____________',0,0,'L',0);
      $pdf->SetXY($left,60);
      $pdf->Cell(190,4,'Subject:-',0,0,'L',0);
      $pdf->SetFont('Times','B',11);
      $pdf->SetXY(30,60);
      $pdf->Cell(190,4,'Confidential papers for Class-XI Promotion Examination 2018',0,0,'L',0);
      $pdf->SetFont('Times','',12);
      $pdf->SetXY($left,70);
      $pdf->Cell(190,4,'Sir/Madam,',0,0,'L',0);
      $pdf->SetXY(30,75);

      $pdf->SetXY(30,75);
       $pdf->Cell(190,4,'Please find herewith a packet which contains       sealed packets of confidential papers for',0,0,'L',0);
        $pdf->SetFont('Times','B',12);
       $pdf->SetXY(108,75);
      $pdf->Cell(190,4,$tot,0,0,'L',0);
      $pdf->SetFont('Times','',12);
      $date = date('Y');
      $pdf->SetXY($left,80);
      $pdf->Cell(190,4,'                                                                to be held in your institution from the                             ',0,0,'L',0);
      $pdf->SetFont('Times','I',12);
      $pdf->SetXY($left,80);
      $pdf->Cell(190,4,'Class XI Promotion Examination '.$date,0,0,'L',0);
       
      $firstExam = mysql_query('select * from c11c_timetbl where sl=1');
      $firstExam = mysql_fetch_array($firstExam);
      $pdf->SetFont('Times','B',12);
      $pdf->SetXY($left+133,80);
      $pdf->Cell(190,4,$firstExam['e_date'],0,0,'L',0);
      $pdf->SetFont('Times','',12);
      $pdf->SetXY($left,85);
      $pdf->Cell(190,4,'as per the routine given below:',0,0,'L',0);


      $pdf->SetFont('Times','B',12);
      //$pdf->SetXY(80,95);
      //$pdf->Cell(190,4,'Time: 1 pm - 4 pm',0,0,'L',0);
      $pdf->SetXY($left,95);
      $pdf->Cell(192,8,'Date',1,0,'L',0);
      $pdf->SetXY(60,95);
      $pdf->Cell(190,8,'Day',0,0,'L',0);
      $pdf->SetXY(90,95);
      $pdf->Cell(190,8,'Subject (Time: 1 pm - 4 pm)',0,0,'L',0);
      $pdf->SetXY(145,95);
      $pdf->Cell(190,8,'Number of confidential papers',0,0,'L',0);
    
      $sl=1;
      $ss=mysql_query("select * from c11c_timetbl order by sl asc");
      while($rr=mysql_fetch_array($ss,MYSQL_ASSOC))
      {
        
      if($rr['subject']=='Mils')
        {
          
      $pdf->SetXY($left, $contents+$off);
      $pdf->Cell(190,4,$rr['e_date'],0,0,'L',0);
      $pdf->SetXY(60, $contents+$off);
      $pdf->Cell(190,4,$rr['day'],0,0,'L',0);
     // $pdf->SetXY(90,120+$off);
    //  $pdf->Cell(190,4,'Second Language:',0,0,'L',0);
      $pdf->SetXY(95, $contents+$off);
      $pdf->Cell(190,4,'i.   Tenyidie',0,0,'L',0);
      $pdf->SetXY($valAlign, $contents+$off);
      if(!empty($row['tny']))
      {
      $pdf->Cell(190,4,$row['tny'],0,0,'L',0);
      }
      else
      {
      $pdf->Cell(190,4,'____',0,0,'L',0);
      }
      $off=$off+$inc;
      $pdf->SetXY(95, $contents+$off);
      $pdf->Cell(190,4,'ii.  Ao',0,0,'L',0);
       $pdf->SetXY($valAlign, $contents+$off);
      if(!empty($row['aon']))
      {
      $pdf->Cell(190,4,$row['aon'],0,0,'L',0);
      }
      else
      {
      $pdf->Cell(190,4,'____',0,0,'L',0);
      }
       $off=$off+$inc;
      $pdf->SetXY(95, $contents+$off);
      $pdf->Cell(190,4,'iii. Sumi',0,0,'L',0);
      $pdf->SetXY($valAlign, $contents+$off);
       if(!empty($row['smi']))
      {
      $pdf->Cell(190,4,$row['smi'],0,0,'L',0);
      }
      else
      {
      $pdf->Cell(190,4,'____',0,0,'L',0);
      }
       $off=$off+$inc;
      $pdf->SetXY(95, $contents+$off);
      $pdf->Cell(190,4,'iv. Lotha',0,0,'L',0);
      $pdf->SetXY($valAlign, $contents+$off);
       if(!empty($row['lta']))
      {
      $pdf->Cell(190,4,$row['lta'],0,0,'L',0);
      }
      else
      {
      $pdf->Cell(190,4,'____',0,0,'L',0);
      }
       $off=$off+$inc;
      $pdf->SetXY(95, $contents+$off);
      $pdf->Cell(190,4,'v.  Hindi',0,0,'L',0);
      $pdf->SetXY($valAlign, $contents+$off);
       if(!empty($row['hnd']))
      {
      $pdf->Cell(190,4,$row['hnd'],0,0,'L',0);
      }
      else
      {
      $pdf->Cell(190,4,'____',0,0,'L',0);
      }
       $off=$off+$inc;
      $pdf->SetXY(95, $contents+$off);
      $pdf->Cell(190,4,'vi. Bengali',0,0,'L',0);
      $pdf->SetXY($valAlign, $contents+$off);
       if(!empty($row['bng']))
      {
      $pdf->Cell(190,4,$row['bng'],0,0,'L',0);
      }
      else
      {
      $pdf->Cell(190,4,'____',0,0,'L',0);
      }
       $off=$off+$inc;
      $pdf->SetXY(95, $contents+$off);
      $pdf->Cell(190,4,'vii.Alternative English',0,0,'L',0);
      $pdf->SetXY($valAlign, $contents+$off);
       if(!empty($row['alt']))
      {
      $pdf->Cell(190,4,$row['alt'],0,0,'L',0);
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
           if($row[$main]=='')
          {
           
            $pdf->Cell(190,4,"____",0,0,'L',0);
          $off=$off+$inc;
          
          }
          else
          {
           // $pdf->SetFont('Times','B',12);
          $pdf->Cell(190,4,$row[$main],0,0,'L',0);
          $off=$off+$inc;
        }
         // $pdf->Cell(190,4,$row[$main],0,0,'L',0);
         // $off=$off+$inc;
        
          }
          else
          {
            $pdf->SetXY(90, $contents+$off);
          $pdf->Cell(190,4,$rr['subject'],0,0,'L',0);
          $pdf->SetXY($valAlign, $contents+$off);
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
           if($row[$main]=='')
          {
           
            $pdf->Cell(190,4,"____",0,0,'L',0);
          $off=$off+$inc;
          
          }
          else
          {
           // $pdf->SetFont('Times','B',12);
          $pdf->Cell(190,4,$row[$main],0,0,'L',0);
          $off=$off+$inc;
        }
          }
        }
      $sl++; $off=0;
      $pdf->SetFont('Times','',12);
     
      $pdf->SetXY($left,290);
      $pdf->Cell(190,4,'Signature with date..........................................',0,0,'L',0);
     
      $pdf->SetXY($left,300);
      $pdf->Cell(190,4,'Name : .......................................................',0,0,'L',0);
      $pdf->SetXY($left,310);
      $pdf->Cell(190,4,'Designation : ................................................',0,0,'L',0);
      $pdf->SetXY($left,325);
      $pdf->Cell(190,4,'( Rangumbuing Nsarangbe )',0,0,'R',0);
       $pdf->SetFont('Times','B',12);
      $pdf->SetXY($left,330);
      $pdf->Cell(190,4,'Controller of Examinations',0,0,'R',0);
     
  
}
}


// forwarding for class eleven-science

if($class=='11s')
{
  $contents = 105;
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
    
    


    $tot=$tot1+$tot2+$tot3+$tot4+$tot5+$tot6+$tot7+$tot8+$tot9+$tot10+$tot11+$tot12+$tot13+$tot14+$tot16+$tot15+$tot17;
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
      $pdf->Cell(190,4,'   Dated Kohima, the  15',0,0,'L',0);
      $pdf->SetFont('Times','',10);
      $pdf->SetXY(171,28);
      $pdf->Cell(190,4,$get['sup_script'],0,0,'L',0);
      $pdf->SetFont('Times','',12);
      $pdf->SetXY(175,30);
      $pdf->Cell(190,4,$get['noti_month_year'],0,0,'L',0);
      $pdf->SetFont('Times','',12);
      $pdf->SetXY($left,40);
      $pdf->Cell(190,4,'To,',0,0,'L',0);
      $pdf->SetXY(30,45);
      $pdf->Cell(190,4,'The Principal,',0,0,'L',0);
      $pdf->SetXY(30,50);
      $pdf->Cell(190,4,$row['centre'],0,0,'L',0);
      //$pdf->SetXY(30,55);
      //$pdf->Cell(190,4,'Centre :- ____________',0,0,'L',0);
      $pdf->SetXY($left,60);
      $pdf->Cell(190,4,'Subject:-',0,0,'L',0);
      $pdf->SetFont('Times','B',11);
      $pdf->SetXY(30,60);
      $pdf->Cell(190,4,'Confidential papers for Class-XI Promotion Examination 2018',0,0,'L',0);
      $pdf->SetFont('Times','',12);
      $pdf->SetXY($left,70);
      $pdf->Cell(190,4,'Sir/Madam,',0,0,'L',0);
      $pdf->SetXY(30,75);
     $pdf->SetXY(30,75);
       $pdf->Cell(190,4,'Please find herewith a packet which contains       sealed packets of confidential papers for',0,0,'L',0);
        $pdf->SetFont('Times','B',12);
       $pdf->SetXY(108,75);
      $pdf->Cell(190,4,$tot,0,0,'L',0);
      $pdf->SetFont('Times','',12);
      $date = date('Y');
      $pdf->SetXY($left,80);
      $pdf->Cell(190,4,'                                                                to be held in your institution from the                             ',0,0,'L',0);
      $pdf->SetFont('Times','I',12);
      $pdf->SetXY($left,80);
      $pdf->Cell(190,4,'Class XI Promotion Examination '.$date,0,0,'L',0);
       
      $firstExam = mysql_query('select * from c11s_timetbl where sl=1');
      $firstExam = mysql_fetch_array($firstExam);
      $pdf->SetFont('Times','B',12);
      $pdf->SetXY($left+133,80);
      $pdf->Cell(190,4,$firstExam['e_date'],0,0,'L',0);
      $pdf->SetFont('Times','',12);
      $pdf->SetXY($left,85);
      $pdf->Cell(190,4,'as per the routine given below:',0,0,'L',0);
  //    $pdf->SetXY(30,90);
   //   $pdf->Cell(190,4,'Kindly collect the packets on the specific dates. The numbers of question papers supplied',0,0,'L',0);
   //   $pdf->SetXY($left,95);
   //   $pdf->Cell(190,4,'are given below and you are requested to confirm the numbers to ensure that all the subjects and the',0,0,'L',0);
   //   $pdf->SetXY($left,100);
   //   $pdf->Cell(190,4,'required numbers issued to your centre are sufficient. You are also directed to read the necessary',0,0,'L',0);
  //    $pdf->SetXY($left,105);
  //    $pdf->Cell(190,4,'instructions for the conduct of examinations.',0,0,'L',0);
      $pdf->SetFont('Times','B',12);
     // $pdf->SetXY(80,110);
      //$pdf->Cell(190,4,'Time: 1 pm - 4 pm',0,0,'L',0);
      $pdf->SetXY($left,95);
      $pdf->Cell(192,8,'Date',1,0,'L',0);
      $pdf->SetXY(60,95);
      $pdf->Cell(190,8,'Day',0,0,'L',0);
      $pdf->SetXY(90,95);
      $pdf->Cell(190,8,'Subject(Time: 1 pm - 4 pm)',0,0,'L',0);
      $pdf->SetXY(145,95);
      $pdf->Cell(190,8,'Number of confidential papers',0,0,'L',0);
    
      $sl=1;
      $ss=mysql_query("select * from c11s_timetbl order by sl asc");
      while($rr=mysql_fetch_array($ss,MYSQL_ASSOC))
      {
        
      if($rr['subject']=='Mils')
        {
          
      $pdf->SetXY($left,$contents+$off);
      $pdf->Cell(190,4,$rr['e_date'],0,0,'L',0);
      $pdf->SetXY(60,$contents+$off);
      $pdf->Cell(190,4,$rr['day'],0,0,'L',0);
     // $pdf->SetXY(90,120+$off);
    //  $pdf->Cell(190,4,'Second Language:',0,0,'L',0);
      $pdf->SetXY(95,$contents+$off);
      $pdf->Cell(190,4,'i.   Tenyidie',0,0,'L',0);
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
      $pdf->Cell(190,4,'iii. Sumi',0,0,'L',0);
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
      $pdf->Cell(190,4,'iv. Lotha',0,0,'L',0);
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
      $pdf->Cell(190,4,'v.  Hindi',0,0,'L',0);
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
      $pdf->Cell(190,4,'vi. Bengali',0,0,'L',0);
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
      $pdf->Cell(190,4,'vii.Alternative English',0,0,'L',0);
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
          if($rr['subcode']=='eng'){$main='eng';}
          if($rr['subcode']=='phy'){$main='phy';}
          if($rr['subcode']=='bio'){$main='bio';}
          if($rr['subcode']=='evs'){$main='evs';}
          if($rr['subcode']=='che'){$main='che';}
          if($rr['subcode']=='mat'){$main='mat';}
          if($rr['subcode']=='csc'){$main='csc';}
          if($rr['subcode']=='inf'){$main='inf';}
          if($rr['subcode']=='itv'){$main='itv';}
          if($rr['subcode']=='ttv'){$main='ttv';}
            if($row[$main]=='')
          {
           
            $pdf->Cell(190,4,"____",0,0,'L',0);
          $off=$off+$inc;
          
          }
          else
          {
           // $pdf->SetFont('Times','B',12);
          $pdf->Cell(190,4,$row[$main],0,0,'L',0);
          $off=$off+$inc;
        } 
         // $pdf->Cell(190,4,$row[$main],0,0,'L',0);
         // $off=$off+$inc;
        
          }
          else
          {
            $pdf->SetXY(90,$contents+$off);
          $pdf->Cell(190,4,$rr['subject'],0,0,'L',0);
          $pdf->SetXY($valAlign,$contents+$off);
          if($rr['subcode']=='eng'){$main='eng';}
          if($rr['subcode']=='phy'){$main='phy';}
          if($rr['subcode']=='bio'){$main='bio';}
          if($rr['subcode']=='evs'){$main='evs';}
          if($rr['subcode']=='che'){$main='che';}
          if($rr['subcode']=='mat'){$main='mat';}
          if($rr['subcode']=='csc'){$main='csc';}
          if($rr['subcode']=='inf'){$main='inf';}
          if($rr['subcode']=='itv'){$main='itv';}
          if($rr['subcode']=='ttv'){$main='ttv';}
           if($row[$main]=='')
          {
           
            $pdf->Cell(190,4,"____",0,0,'L',0);
          $off=$off+$inc;
          
          }
          else
          {
           // $pdf->SetFont('Times','B',12);
          $pdf->Cell(190,4,$row[$main],0,0,'L',0);
          $off=$off+$inc;
        }
          }
        }
      $sl++; $off=0;
      $pdf->SetFont('Times','',12);
     
      $pdf->SetXY($left,280);
      $pdf->Cell(190,4,'Signature with date..........................................',0,0,'L',0);
     
       $pdf->SetXY($left,290);
      $pdf->Cell(190,4,'Name : ............................................................',0,0,'L',0);
      $pdf->SetXY($left,300);
      $pdf->Cell(190,4,'Designation : ..................................................',0,0,'L',0);
      $pdf->SetXY($left,325);
      $pdf->Cell(190,4,'( Rangumbuing Nsarangbe )',0,0,'R',0);
       $pdf->SetFont('Times','B',12);
      $pdf->SetXY($left,330);
      $pdf->Cell(190,4,'Controller of Examinations',0,0,'R',0);
     
  
}
}
//

if($class=='12a' && $dist=="KOHIMA")
{
  $contents = 135;
  $sql=mysql_query("select * from c12a_pkChrt where district='$dist'");
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


    $tot=$tot1+$tot2+$tot3+$tot4+$tot5+$tot6+$tot7+$tot8+$tot9+$tot10+$tot11+$tot12+$tot13+$tot14+$tot16+$tot15+$tot17+$tot18+$tot19+$tot20;
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
      $pdf->Cell(190,4,'Dr/Mr/Mrs/Ms_____________________________________________________',0,0,'L',0);
      $pdf->SetXY(30,50);
      $pdf->Cell(190,4,'Centre Superintendent,',0,0,'L',0);
      $pdf->SetXY(30,55);
       $pdf->Cell(190,4,'Centre :- '.$row['centre'],0,0,'L',0);
      //$pdf->SetXY(30,55);
      //$pdf->Cell(190,4,'Centre :- ____________',0,0,'L',0);
      $pdf->SetXY($left,65);
      $pdf->Cell(190,4,'Subject:-',0,0,'L',0);
      $pdf->SetFont('Times','B',11);
      $pdf->SetXY(30,65);
      $pdf->Multicell(140,4,'Confidential papers of the Higher Secondary School Leaving Certificate Examination 2018',0,'L',false);
      $pdf->SetFont('Times','',12);
      $pdf->SetXY($left,75);

      $pdf->Cell(190,4,'Sir/Madam,',0,0,'L',0);
      $pdf->SetXY(30,80);
      $pdf->Cell(190,4,'I am to inform you that the sealed packets containing the confidential papers for the HSSLC',0,0,'L',0);
      $pdf->SetXY($left,85);
      $pdf->Cell(190,4,'Examination 2018, to be held from                              at your centre shall be kept in the custody of this',0,0,'L',0);
      $firstExam = mysql_query('select * from c12a_timetbl where sl=1');
      $firstExam = mysql_fetch_array($firstExam);
      $pdf->SetFont('Times','B',12);
      $pdf->SetXY($left+60,85);
      $pdf->Cell(190,4,$firstExam['e_date'],0,0,'L',0);
      $pdf->SetFont('Times','',12);
      $pdf->SetXY($left,90);
      $pdf->Cell(190,4,'Office.',0,0,'L',0);
      $pdf->SetXY(30,95);
      $pdf->Cell(190,4,'Kindly collect the packets on the specific dates. The numbers of question papers supplied',0,0,'L',0);
      $pdf->SetXY($left,100);
      $pdf->Cell(190,4,'are given below and you are requested to confirm the numbers to ensure that all the subjects and the',0,0,'L',0);
      $pdf->SetXY($left,105);
      $pdf->Cell(190,4,'required numbers issued to your centre are sufficient. You are also directed to read the necessary',0,0,'L',0);
      $pdf->SetXY($left,110);
      $pdf->Cell(190,4,'instructions for the conduct of examinations.',0,0,'L',0);

 
      $pdf->SetFont('Times','B',12);
      $pdf->SetXY(80,120);
      $pdf->Cell(190,4,'Time: 9 am - 12 noon',0,0,'L',0);
      $pdf->SetXY($left,125);
      $pdf->Cell(192,8,'Date',1,0,'L',0);
      $pdf->SetXY(60,125);
      $pdf->Cell(190,8,'Day',0,0,'L',0);
      $pdf->SetXY(90,125);
      $pdf->Cell(190,8,'Subject',0,0,'L',0);
      $pdf->SetXY(145,125);
      $pdf->Cell(190,8,'Number of confidential papers',0,0,'L',0);
    
      $sl=1;
      $ss=mysql_query("select * from c12a_timetbl order by sl asc");
      while($rr=mysql_fetch_array($ss,MYSQL_ASSOC))
      {
        
      if($rr['subject']=='Mils')
        {
          
      $pdf->SetXY($left,$contents+$off);
      $pdf->Cell(190,4,$rr['e_date'],0,0,'L',0);
      $pdf->SetXY(60,$contents+$off);
      $pdf->Cell(190,4,$rr['day'],0,0,'L',0);
      $pdf->SetXY(95,$contents+$off);
      $pdf->Cell(190,4,'i.   Tenyidie',0,0,'L',0);
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
      $pdf->Cell(190,4,'iii. Sumi',0,0,'L',0);
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
      $pdf->Cell(190,4,'iv. Lotha',0,0,'L',0);
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
      $pdf->Cell(190,4,'v.  Hindi',0,0,'L',0);
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
      $pdf->Cell(190,4,'vi. Bengali',0,0,'L',0);
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
      $pdf->Cell(190,4,'vii.Alternative English',0,0,'L',0);
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
          
          if($row[$main]=='')
          {
           
            $pdf->Cell(190,4,"____",0,0,'L',0);
          $off=$off+$inc;
          
          }
          else
          {
           // $pdf->SetFont('Times','B',12);
          $pdf->Cell(190,4,$row[$main],0,0,'L',0);
          $off=$off+$inc;
        }
          //$pdf->Cell(190,4,$row[$main],0,0,'L',0);
         // $off=$off+$inc;
        
          }


          else
          {
            $pdf->SetXY(90,$contents+$off);
          $pdf->Cell(190,4,$rr['subject'],0,0,'L',0);
          $pdf->SetXY($valAlign,$contents+$off);
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
           if($row[$main]=='')
          {
           
            $pdf->Cell(190,4,"____",0,0,'L',0);
          $off=$off+$inc;
          
          }
          else
          {
           // $pdf->SetFont('Times','B',12);
          $pdf->Cell(190,4,$row[$main],0,0,'L',0);
          $off=$off+$inc;
        }
          }
        }
      $sl++;$off=0;
      $sign =16; $bottom = 6;
      $pdf->SetFont('Times','',11);
      $pdf->SetXY(10,270+$sign);
      $pdf->Cell(190,4,'( Mrs. Asano Sekhose )',0,0,'R',0);
      $sign = $sign+$bottom;
      $pdf->SetXY(175,270+$sign);
      $pdf->Cell(190,4,'Chairman',0,0,'L',0);
      $sign = $sign+$bottom;
      $pdf->SetXY($left,270+$sign);
      $pdf->Cell(190,4,$get['noti_detail'],0,0,'L',0);

      $pdf->SetXY(132,270+$sign);
      $pdf->Cell(190,4,'Dated Kohima, the     ',0,0,'L',0);
      $pdf->SetFont('Times','',10);
      $pdf->SetXY(171,270+$sign-2);
      $pdf->Cell(190,4,$get['sup_script'],0,0,'L',0);
      $pdf->SetFont('Times','',12);
      $pdf->SetXY(175,270+$sign);
      $pdf->Cell(190,4,$get['noti_month_year'],0,0,'L',0);

      
      $sign = $sign+$bottom;
      $pdf->SetXY($left,270+$sign);
      $pdf->Cell(190,4,'Copy for information and necessary action :-',0,0,'L',0);
      $sign = $sign+$bottom;
      $pdf->SetXY(20,270+$sign);
      $pdf->Cell(190,4,'1.      Mr/Ms._________________________________________',0,0,'L',0);
      $sign = $sign+$bottom;
      $pdf->SetXY(20,270+$sign);
      $pdf->Cell(190,4,'2.      Mr/Ms._________________________________________',0,0,'L',0);
      $sign = $sign+$bottom;
      $pdf->SetXY(10,273+$sign);
      $pdf->Cell(190,4,'( Mrs. Asano Sekhose )',0,0,'R',0);
      $sign = $sign+$bottom;
      $pdf->SetXY(175,273+$sign);
      $pdf->Cell(190,4,'Chairman',0,0,'L',0);
}
}


      if($class=="12a" && $dist!="KOHIMA")
      {
          $contents = 110;
          $inc = 6.5;
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
 


    $tot=$tot1+$tot2+$tot3+$tot4+$tot5+$tot6+$tot7+$tot8+$tot9+$tot10+$tot11+$tot12+$tot13+$tot14+$tot16+$tot15+$tot17+$tot18+$tot19+$tot20;
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
      $pdf->SetXY(30,60);
      $pdf->Multicell(140,4,'Confidential papers of the Higher Secondary School Leaving Certificate Examination 2018',0,'L',false);
      $pdf->SetFont('Times','',12);
      $pdf->SetXY($left,70);
      $pdf->Cell(190,4,'Sir/Madam,',0,0,'L',0);
      $pdf->SetXY(30,75);
       $pdf->Cell(190,4,'Please find herewith a packet which contains       sealed packets of confidential papers to be kept',0,0,'L',0);
       $pdf->SetXY(10,80);
       $date = date('Y')+1;
        $pdf->Cell(190,4,'under your custody for the HSSLC Examination '.$date.'to be held from the                                as per the',0,0,'L',0);
        $pdf->SetFont('Times','B',12);
       $pdf->SetXY(108,75);
      $pdf->Cell(190,4,$tot,0,0,'L',0);
      $pdf->SetFont('Times','',12);
      $date = date('Y')+1;
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
      $pdf->SetXY(80,95);
      $pdf->Cell(190,4,'Time: 9 am - 12 noon',0,0,'L',0);
      $pdf->SetXY($left,100);
      $pdf->Cell(192,8,'Date',1,0,'L',0);
      $pdf->SetXY(60,100);
      $pdf->Cell(190,8,'Day',0,0,'L',0);
      $pdf->SetXY(90,100);
      $pdf->Cell(190,8,'Subject',0,0,'L',0);
      $pdf->SetXY(145,100);
      $pdf->Cell(190,8,'Number of confidential papers',0,0,'L',0);
    
      $sl=1;
      $ss=mysql_query("select * from c12a_timetbl order by sl asc");
      while($rr=mysql_fetch_array($ss,MYSQL_ASSOC))
      {
        
      if($rr['subject']=='Mils')
        {
          
      $pdf->SetXY($left,$contents+$off);
      $pdf->Cell(190,4,$rr['e_date'],0,0,'L',0);
      $pdf->SetXY(60,$contents+$off);
      $pdf->Cell(190,4,$rr['day'],0,0,'L',0);
      $pdf->SetXY(95,$contents+$off);
      $pdf->Cell(190,4,'i.   Tenyidie',0,0,'L',0);
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
      $pdf->Cell(190,4,'iii. Sumi',0,0,'L',0);
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
      $pdf->Cell(190,4,'iv. Lotha',0,0,'L',0);
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
      $pdf->Cell(190,4,'v.  Hindi',0,0,'L',0);
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
      $pdf->Cell(190,4,'vi. Bengali',0,0,'L',0);
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
      $pdf->Cell(190,4,'vii.Alternative English',0,0,'L',0);
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
          if($row[$main]=='')
          {
           
            $pdf->Cell(190,4,"____",0,0,'L',0);
          $off=$off+$inc;
          
          }
          else
          {
           // $pdf->SetFont('Times','B',12);
          $pdf->Cell(190,4,$row[$main],0,0,'L',0);
          $off=$off+$inc;
        }
          //$pdf->Cell(190,4,$row[$main],0,0,'L',0);
         // $off=$off+$inc;
        
          }
          else
          {
            $pdf->SetXY(90,$contents+$off);
          $pdf->Cell(190,4,$rr['subject'],0,0,'L',0);
          $pdf->SetXY($valAlign,$contents+$off);
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
         if($row[$main]=='')
          {
           
            $pdf->Cell(190,4,"____",0,0,'L',0);
          $off=$off+$inc;
          
          }
          else
          {
           // $pdf->SetFont('Times','B',12);
          $pdf->Cell(190,4,$row[$main],0,0,'L',0);
          $off=$off+$inc;
        }
          }
        }
      $sl++;$off=0;$sign =16; $bottom = 6; $add = 240;
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
      $pdf->SetXY($left,$add+$sign);
      $pdf->Cell(190,4,'Copy to :-',0,0,'L',0);
       $sign = $sign + $bottom;
      $pdf->SetXY(20,$add+$sign);
      $pdf->Cell(190,4,'1.      The Deputy Commissioner/Additional Deputy Commissioner/S.D.O(Civil)/E.A.C.,',0,0,'L',0);
       $sign = $sign + $bottom;
      $pdf->SetXY(20,$add+$sign);
      $pdf->Cell(190,4,'        __________________________________________ for information and necessary action.',0,0,'L',0);
       $sign = $sign + $bottom;
       $pdf->SetXY(20,$add+$sign);
      $pdf->Cell(190,4,'2.      Dr/Mr/Mrs/Ms ____________________________________________ Centre Superintendent of',0,0,'L',0);
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
      $pdf->Cell(190,2,'        for your center is sufficient. Further,you are directed to read and follow the instructions for the',0,0,'L',0);
       $sign = $sign + 4;
       $pdf->SetXY(20,$add+$sign);
      $pdf->Cell(190,2,'        conduct of examination.',0,0,'L',0);
       $sign = $sign + $bottom;
       $pdf->SetXY(20,$add+$sign);
      $pdf->Cell(190,4,'3.      Office copy.',0,0,'L',0);
       $sign = $sign + $bottom+2;
      $pdf->SetXY(10,$add+$sign);
      $pdf->Cell(190,4,'( Mrs. Asano Sekhose )',0,0,'R',0);
       $sign = $sign + $bottom+1;
      $pdf->SetXY(175,$add+$sign);
      $pdf->Cell(190,4,'Chairman',0,0,'L',0);
  

}
}
// FORWARDING FOR HSSLC(COMMERCE)

if($class=='12c' && $dist=="KOHIMA")
{
  $contents = 135;
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


    $tot=$tot1+$tot2+$tot3+$tot4+$tot5+$tot6+$tot7+$tot8+$tot9+$tot10+$tot11+$tot12+$tot13+$tot14+$tot16+$tot15+$tot17+$tot18;
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
      $pdf->Cell(190,4,'Dr/Mr/Mrs/Ms_____________________________________________________',0,0,'L',0);
      $pdf->SetXY(30,50);
      $pdf->Cell(190,4,'Centre Superintendent,',0,0,'L',0);
      $pdf->SetXY(30,55);
      $pdf->Cell(190,4,'Centre :- '.$row['centre'],0,0,'L',0);
      $pdf->SetXY($left,65);
      $pdf->Cell(190,4,'Subject:-',0,0,'L',0);
      $pdf->SetFont('Times','B',11);
      $pdf->SetXY(30,65);
      $pdf->Multicell(140,4,'Confidential papers of the Higher Secondary School Leaving Certificate Examination 2018',0,'L',false);
      $pdf->SetFont('Times','',12);
      $pdf->SetXY($left,75);
      $pdf->Cell(190,4,'Sir/Madam,',0,0,'L',0);
      $pdf->SetXY(30,80);
      $pdf->Cell(190,4,'I am to inform you that the sealed packets containing the confidential papers for the HSSLC',0,0,'L',0);
      $pdf->SetXY($left,85);
      $pdf->Cell(190,4,'Examination 2018, to be held from                              at your centre shall be kept in the custody of this',0,0,'L',0);
      $firstExam = mysql_query('select * from c12c_timetbl where sl=1');
      $firstExam = mysql_fetch_array($firstExam);
      $pdf->SetFont('Times','B',12);
      $pdf->SetXY($left+60,85);
      $pdf->Cell(190,4,$firstExam['e_date'],0,0,'L',0);
      $pdf->SetFont('Times','',12);
      $pdf->SetXY($left,90);
      $pdf->Cell(190,4,'Office.',0,0,'L',0);
      $pdf->SetXY(30,95);
      $pdf->Cell(190,4,'Kindly collect the packets on the specific dates. The numbers of question papers supplied',0,0,'L',0);
      $pdf->SetXY($left,100);
      $pdf->Cell(190,4,'are given below and you are requested to confirm the numbers to ensure that all the subjects and the',0,0,'L',0);
      $pdf->SetXY($left,105);
      $pdf->Cell(190,4,'required numbers issued to your centre are sufficient. You are also directed to read the necessary',0,0,'L',0);
      $pdf->SetXY($left,110);
      $pdf->Cell(190,4,'instructions for the conduct of examinations.',0,0,'L',0);
      $pdf->SetFont('Times','B',12);
      $pdf->SetXY(80,120);
      $pdf->Cell(190,4,'Time: 9 am - 12 noon',0,0,'L',0);
      $pdf->SetXY($left,125);
      $pdf->Cell(192,8,'Date',1,0,'L',0);
      $pdf->SetXY(60,125);
      $pdf->Cell(190,8,'Day',0,0,'L',0);
      $pdf->SetXY(90,125);
      $pdf->Cell(190,8,'Subject',0,0,'L',0);
      $pdf->SetXY(145,125);
      $pdf->Cell(190,8,'Number of confidential papers',0,0,'L',0);
      $ss=mysql_query("select * from c12c_timetbl order by sl asc");
      while($rr=mysql_fetch_array($ss,MYSQL_ASSOC))
      {
        
      if($rr['subject']=='Mils')
        {
          
      $pdf->SetXY($left,$contents+$off);
      $pdf->Cell(190,4,$rr['e_date'],0,0,'L',0);
      $pdf->SetXY(60,$contents+$off);
      $pdf->Cell(190,4,$rr['day'],0,0,'L',0);
      $pdf->SetXY(95,$contents+$off);
      $pdf->Cell(190,4,'i.   Tenyidie',0,0,'L',0);
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
      $pdf->Cell(190,4,'iii. Sumi',0,0,'L',0);
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
      $pdf->Cell(190,4,'iv. Lotha',0,0,'L',0);
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
      $pdf->Cell(190,4,'v.  Hindi',0,0,'L',0);
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
      $pdf->Cell(190,4,'vi. Bengali',0,0,'L',0);
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
      $pdf->Cell(190,4,'vii.Alternative English',0,0,'L',0);
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
           if($rr['subcode']=='eng'){$main='eng';}
          if($rr['subcode']=='cmo'){$main='cmo';}
          if($rr['subcode']=='ent'){$main='ent';}
          if($rr['subcode']=='bus'){$main='bus';}
          if($rr['subcode']=='fbm'){$main='fbm';}
          if($rr['subcode']=='evs'){$main='evs';}
          if($rr['subcode']=='acc'){$main='acc';}
          if($rr['subcode']=='eco'){$main='eco';}
          if($rr['subcode']=='dmo'){$main='dmo';}
          if($rr['subcode']=='csc'){$main='csc';}
          if($rr['subcode']=='inf'){$main='inf';}
         if($row[$main]=='')
          {
           
            $pdf->Cell(190,4,"____",0,0,'L',0);
          $off=$off+$inc;
          
          }
          else
          {
           // $pdf->SetFont('Times','B',12);
          $pdf->Cell(190,4,$row[$main],0,0,'L',0);
          $off=$off+$inc;
        }
        
          }
          else
          {
            $pdf->SetXY(90,$contents+$off);
          $pdf->Cell(190,4,$rr['subject'],0,0,'L',0);
          $pdf->SetXY($valAlign,$contents+$off);
           if($rr['subcode']=='eng'){$main='eng';}
          if($rr['subcode']=='cmo'){$main='cmo';}
          if($rr['subcode']=='ent'){$main='ent';}
          if($rr['subcode']=='bus'){$main='bus';}
          if($rr['subcode']=='fbm'){$main='fbm';}
          if($rr['subcode']=='evs'){$main='evs';}
          if($rr['subcode']=='acc'){$main='acc';}
          if($rr['subcode']=='eco'){$main='eco';}
          if($rr['subcode']=='dmo'){$main='dmo';}
          if($rr['subcode']=='csc'){$main='csc';}
          if($rr['subcode']=='inf'){$main='inf';}
          if($row[$main]=='')
          {
           
            $pdf->Cell(190,4,"____",0,0,'L',0);
          $off=$off+$inc;
          
          }
          else
          {
           // $pdf->SetFont('Times','B',12);
          $pdf->Cell(190,4,$row[$main],0,0,'L',0);
          $off=$off+$inc;
        }
          }
        }
      $off=0;
      $sign =16; $bottom = 6;
      $pdf->SetFont('Times','',11);
      $pdf->SetXY(10,270+$sign);
      $pdf->Cell(190,4,'( Mrs. Asano Sekhose )',0,0,'R',0);
      $sign = $sign+$bottom;
      $pdf->SetXY(175,270+$sign);
      $pdf->Cell(190,4,'Chairman',0,0,'L',0);
      $sign = $sign+$bottom;
      $pdf->SetXY($left,270+$sign);
      $pdf->Cell(190,4,$get['noti_detail'],0,0,'L',0);
      $pdf->SetXY(132,270+$sign);
      $pdf->Cell(190,4,'Dated Kohima, the     ',0,0,'L',0);
      $pdf->SetFont('Times','',10);
      $pdf->SetXY(171,270+$sign-2);
      $pdf->Cell(190,4,$get['sup_script'],0,0,'L',0);
      $pdf->SetFont('Times','',12);
      $pdf->SetXY(175,270+$sign);
      $pdf->Cell(190,4,$get['noti_month_year'],0,0,'L',0);
      $sign = $sign+$bottom;
      $pdf->SetXY($left,270+$sign);
      $pdf->Cell(190,4,'Copy for information and necessary action :-',0,0,'L',0);
      $sign = $sign+$bottom;
      $pdf->SetXY(20,270+$sign);
      $pdf->Cell(190,4,'1.      Mr/Ms._________________________________________',0,0,'L',0);
      $sign = $sign+$bottom;
      $pdf->SetXY(20,270+$sign);
      $pdf->Cell(190,4,'2.      Mr/Ms._________________________________________',0,0,'L',0);
      $sign = $sign+$bottom;
      $pdf->SetXY(10,273+$sign);
      $pdf->Cell(190,4,'( Mrs. Asano Sekhose )',0,0,'R',0);
      $sign = $sign+$bottom;
      $pdf->SetXY(175,273+$sign);
      $pdf->Cell(190,4,'Chairman',0,0,'L',0);
      }
    }


      if($class=="12c" && $dist!="KOHIMA")
      {
          $contents = 110;
          $inc = 6.5;
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
    if(!empty($row['evs'])){ $tot13=1;} else {$tot13=0;}
    if(!empty($row['acc'])){ $tot14=1;} else {$tot14=0;}
    if(!empty($row['eco'])){ $tot15=1;} else {$tot15=0;}
    if(!empty($row['dmo'])){ $tot16=1;} else {$tot16=0;}
    if(!empty($row['csc'])){ $tot17=1;} else {$tot17=0;}
    if(!empty($row['inf'])){ $tot18=1;} else {$tot18=0;}
 


    $tot=$tot1+$tot2+$tot3+$tot4+$tot5+$tot6+$tot7+$tot8+$tot9+$tot10+$tot11+$tot12+$tot13+$tot14+$tot16+$tot15+$tot17+$tot18;
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
      $pdf->SetXY(30,60);
      $pdf->Multicell(140,4,'Confidential papers of the Higher Secondary School Leaving Certificate Examination 2018',0,'L',false);
      $pdf->SetFont('Times','',12);
      $pdf->SetXY($left,70);
      $pdf->Cell(190,4,'Sir/Madam,',0,0,'L',0);
      $pdf->SetXY(30,75);
       $pdf->Cell(190,4,'Please find herewith a packet which contains       sealed packets of confidential papers to be kept',0,0,'L',0);
       $pdf->SetXY(10,80);
       $date = date('Y')+1;
        $pdf->Cell(190,4,'under your custody for the HSSLC Examination '.$date.'to be held from the                                as per the',0,0,'L',0);
        $pdf->SetFont('Times','B',12);
       $pdf->SetXY(108,75);
      $pdf->Cell(190,4,$tot,0,0,'L',0);
      $pdf->SetFont('Times','',12);
      $date = date('Y')+1;
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
      $pdf->SetXY(80,95);
      $pdf->Cell(190,4,'Time: 9 am - 12 noon',0,0,'L',0);
      $pdf->SetXY($left,100);
      $pdf->Cell(192,8,'Date',1,0,'L',0);
      $pdf->SetXY(60,100);
      $pdf->Cell(190,8,'Day',0,0,'L',0);
      $pdf->SetXY(90,100);
      $pdf->Cell(190,8,'Subject',0,0,'L',0);
      $pdf->SetXY(145,100);
      $pdf->Cell(190,8,'Number of confidential papers',0,0,'L',0);
    
      $sl=1;
      $ss=mysql_query("select * from c12c_timetbl order by sl asc");
      while($rr=mysql_fetch_array($ss,MYSQL_ASSOC))
      {
        
      if($rr['subject']=='Mils')
        {
          
      $pdf->SetXY($left,$contents+$off);
      $pdf->Cell(190,4,$rr['e_date'],0,0,'L',0);
      $pdf->SetXY(60,$contents+$off);
      $pdf->Cell(190,4,$rr['day'],0,0,'L',0);
      $pdf->SetXY(95,$contents+$off);
      $pdf->Cell(190,4,'i.   Tenyidie',0,0,'L',0);
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
      $pdf->Cell(190,4,'iii. Sumi',0,0,'L',0);
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
      $pdf->Cell(190,4,'iv. Lotha',0,0,'L',0);
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
      $pdf->Cell(190,4,'v.  Hindi',0,0,'L',0);
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
      $pdf->Cell(190,4,'vi. Bengali',0,0,'L',0);
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
      $pdf->Cell(190,4,'vii.Alternative English',0,0,'L',0);
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
          if($rr['subcode']=='eng'){$main='eng';}
          if($rr['subcode']=='cmo'){$main='cmo';}
          if($rr['subcode']=='ent'){$main='ent';}
          if($rr['subcode']=='bus'){$main='bus';}
          if($rr['subcode']=='fbm'){$main='fbm';}
          if($rr['subcode']=='acc'){$main='acc';}
          if($rr['subcode']=='eco'){$main='eco';}
          if($rr['subcode']=='dmo'){$main='dmo';}
          if($rr['subcode']=='csc'){$main='csc';}
          if($rr['subcode']=='inf'){$main='inf';}
          if($row[$main]=='')
          {
           
            $pdf->Cell(190,4,"____",0,0,'L',0);
          $off=$off+$inc;
          
          }
          else
          {
           // $pdf->SetFont('Times','B',12);
          $pdf->Cell(190,4,$row[$main],0,0,'L',0);
          $off=$off+$inc;
        }
        
          }
          else
          {
            $pdf->SetXY(90,$contents+$off);
          $pdf->Cell(190,4,$rr['subject'],0,0,'L',0);
          $pdf->SetXY($valAlign,$contents+$off);
          if($rr['subcode']=='eng'){$main='eng';}
          if($rr['subcode']=='cmo'){$main='cmo';}
          if($rr['subcode']=='ent'){$main='ent';}
          if($rr['subcode']=='bus'){$main='bus';}
          if($rr['subcode']=='fbm'){$main='fbm';}
          if($rr['subcode']=='acc'){$main='acc';}
          if($rr['subcode']=='eco'){$main='eco';}
          if($rr['subcode']=='dmo'){$main='dmo';}
          if($rr['subcode']=='csc'){$main='csc';}
          if($rr['subcode']=='inf'){$main='inf';}
         if($row[$main]=='')
          {
           
            $pdf->Cell(190,4,"____",0,0,'L',0);
          $off=$off+$inc;
          
          }
          else
          {
           // $pdf->SetFont('Times','B',12);
          $pdf->Cell(190,4,$row[$main],0,0,'L',0);
          $off=$off+$inc;
        }
          }
        }
      $sl++;$off=0;$sign =16; $bottom = 6; $add = 240;
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
      $pdf->SetXY($left,$add+$sign);
      $pdf->Cell(190,4,'Copy to :-',0,0,'L',0);
       $sign = $sign + $bottom;
      $pdf->SetXY(20,$add+$sign);
      $pdf->Cell(190,4,'1.      The Deputy Commissioner/Additional Deputy Commissioner/S.D.O(Civil)/E.A.C.,',0,0,'L',0);
       $sign = $sign + $bottom;
      $pdf->SetXY(20,$add+$sign);
      $pdf->Cell(190,4,'        __________________________________________ for information and necessary action.',0,0,'L',0);
       $sign = $sign + $bottom;
       $pdf->SetXY(20,$add+$sign);
      $pdf->Cell(190,4,'2.      Dr/Mr/Mrs/Ms ____________________________________________ Centre Superintendent of',0,0,'L',0);
       $sign = $sign + $bottom;
       $pdf->SetXY(20,$add+$sign);
      $pdf->Cell(190,4,'        '.$row['centre'],0,0,'L',0);
       $sign = $sign + $bottom;
        $pdf->SetXY(20,$add+$sign);
      $pdf->Cell(190,2,'        You are requested to confirm that the number of question papers of the different subjects supplied',0,0,'L',0);
       $sign = $sign + 4;
       $pdf->SetXY(20,$add+$sign);
      $pdf->Cell(190,2,'        for your center is sufficient. Further,you are directed to read and follow the instructions for the',0,0,'L',0);
       $sign = $sign + 4;
       $pdf->SetXY(20,$add+$sign);
      $pdf->Cell(190,2,'        conduct of examination.',0,0,'L',0);
       $sign = $sign + $bottom;
       $pdf->SetXY(20,$add+$sign);
      $pdf->Cell(190,4,'3.      Office copy.',0,0,'L',0);
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


    $tot=$tot1+$tot2+$tot3+$tot4+$tot5+$tot6+$tot7+$tot8+$tot9+$tot10+$tot11+$tot12+$tot13+$tot14+$tot15;
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
      $pdf->Cell(190,4,'Dr/Mr/Mrs/Ms_____________________________________________________',0,0,'L',0);
      $pdf->SetXY(30,50);
      $pdf->Cell(190,4,'Centre Superintendent,',0,0,'L',0);
      $pdf->SetXY(30,55);
       $pdf->Cell(190,4,'Centre :- '.$row['centre'],0,0,'L',0);
      $pdf->SetXY($left,65);
      $pdf->Cell(190,4,'Subject:-',0,0,'L',0);
      $pdf->SetFont('Times','B',11);
      $pdf->SetXY(30,65);
      $pdf->Multicell(140,4,'Confidential papers of the Higher Secondary School Leaving Certificate Examination 2018',0,'L',false);
      $pdf->SetFont('Times','',12);
      $pdf->SetXY($left,75);

      $pdf->Cell(190,4,'Sir/Madam,',0,0,'L',0);
      $pdf->SetXY(30,80);
      $pdf->Cell(190,4,'I am to inform you that the sealed packets containing the confidential papers for the HSSLC',0,0,'L',0);
      $pdf->SetXY($left,85);
      $pdf->Cell(190,4,'Examination 2018, to be held from                              at your centre shall be kept in the custody of this',0,0,'L',0);
      $firstExam = mysql_query('select * from c12s_timetbl where sl=1');
      $firstExam = mysql_fetch_array($firstExam);
      $pdf->SetFont('Times','B',12);
      $pdf->SetXY($left+60,85);
      $pdf->Cell(190,4,$firstExam['e_date'],0,0,'L',0);
      $pdf->SetFont('Times','',12);
      $pdf->SetXY($left,90);
      $pdf->Cell(190,4,'Office.',0,0,'L',0);
      $pdf->SetXY(30,95);
      $pdf->Cell(190,4,'Kindly collect the packets on the specific dates. The numbers of question papers supplied',0,0,'L',0);
      $pdf->SetXY($left,100);
      $pdf->Cell(190,4,'are given below and you are requested to confirm the numbers to ensure that all the subjects and the',0,0,'L',0);
      $pdf->SetXY($left,105);
      $pdf->Cell(190,4,'required numbers issued to your centre are sufficient. You are also directed to read the necessary',0,0,'L',0);
      $pdf->SetXY($left,110);
      $pdf->Cell(190,4,'instructions for the conduct of examinations.',0,0,'L',0);

 
      $pdf->SetFont('Times','B',12);
      $pdf->SetXY(80,120);
      $pdf->Cell(190,4,'Time: 9 am - 12 noon',0,0,'L',0);
      $pdf->SetXY($left,125);
      $pdf->Cell(192,8,'Date',1,0,'L',0);
      $pdf->SetXY(60,125);
      $pdf->Cell(190,8,'Day',0,0,'L',0);
      $pdf->SetXY(90,125);
      $pdf->Cell(190,8,'Subject',0,0,'L',0);
      $pdf->SetXY(145,125);
      $pdf->Cell(190,8,'Number of confidential papers',0,0,'L',0);
    
      $sl=1;
      $ss=mysql_query("select * from c12s_timetbl order by sl asc");
      while($rr=mysql_fetch_array($ss,MYSQL_ASSOC))
      {
        
      if($rr['subject']=='Mils')
        {
          
      $pdf->SetXY($left,$contents+$off);
      $pdf->Cell(190,4,$rr['e_date'],0,0,'L',0);
      $pdf->SetXY(60,$contents+$off);
      $pdf->Cell(190,4,$rr['day'],0,0,'L',0);
      $pdf->SetXY(95,$contents+$off);
      $pdf->Cell(190,4,'i.   Tenyidie',0,0,'L',0);
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
      $pdf->Cell(190,4,'iii. Sumi',0,0,'L',0);
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
      $pdf->Cell(190,4,'iv. Lotha',0,0,'L',0);
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
      $pdf->Cell(190,4,'v.  Hindi',0,0,'L',0);
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
      $pdf->Cell(190,4,'vi. Bengali',0,0,'L',0);
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
      $pdf->Cell(190,4,'vii.Alternative English',0,0,'L',0);
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
          if($rr['subcode']=='eng'){$main='eng';}
          if($rr['subcode']=='phy'){$main='phy';}
          if($rr['subcode']=='bio'){$main='bio';}
          if($rr['subcode']=='evs'){$main='evs';}
          if($rr['subcode']=='che'){$main='che';}
          if($rr['subcode']=='mat'){$main='mat';}
          if($rr['subcode']=='csc'){$main='csc';}
          if($rr['subcode']=='inf'){$main='inf';}
          if($row[$main]=='')
          {
           
            $pdf->Cell(190,4,"____",0,0,'L',0);
          $off=$off+$inc;
          
          }
          else
          {
           // $pdf->SetFont('Times','B',12);
          $pdf->Cell(190,4,$row[$main],0,0,'L',0);
          $off=$off+$inc;
        }
        
          }
          else
          {
            $pdf->SetXY(90,$contents+$off);
          $pdf->Cell(190,4,$rr['subject'],0,0,'L',0);
          $pdf->SetXY($valAlign,$contents+$off);
          if($rr['subcode']=='eng'){$main='eng';}
          if($rr['subcode']=='phy'){$main='phy';}
          if($rr['subcode']=='bio'){$main='bio';}
          if($rr['subcode']=='evs'){$main='evs';}
          if($rr['subcode']=='che'){$main='che';}
          if($rr['subcode']=='mat'){$main='mat';}
          if($rr['subcode']=='csc'){$main='csc';}
          if($rr['subcode']=='inf'){$main='inf';}
          if($row[$main]=='')
          {
           
            $pdf->Cell(190,4,"____",0,0,'L',0);
          $off=$off+$inc;
          
          }
          else
          {
           // $pdf->SetFont('Times','B',12);
          $pdf->Cell(190,4,$row[$main],0,0,'L',0);
          $off=$off+$inc;
        }
          }
        }
      $sl++;$off=0;
      $sign =16; $bottom = 6;
      $pdf->SetFont('Times','',11);
      $pdf->SetXY(10,270+$sign);
      $pdf->Cell(190,4,'( Mrs. Asano Sekhose )',0,0,'R',0);
      $sign = $sign+$bottom;
      $pdf->SetXY(175,270+$sign);
      $pdf->Cell(190,4,'Chairman',0,0,'L',0);
      $sign = $sign+$bottom;
      $pdf->SetXY($left,270+$sign);
      $pdf->Cell(190,4,$get['noti_detail'],0,0,'L',0);
      $pdf->SetXY(132,270+$sign);
      $pdf->Cell(190,4,'Dated Kohima, the     ',0,0,'L',0);
      $pdf->SetFont('Times','',10);
      $pdf->SetXY(171,270+$sign-2);
      $pdf->Cell(190,4,$get['sup_script'],0,0,'L',0);
      $pdf->SetFont('Times','',12);
      $pdf->SetXY(175,270+$sign);
      $pdf->Cell(190,4,$get['noti_month_year'],0,0,'L',0);
      $sign = $sign+$bottom;
      $pdf->SetXY($left,270+$sign);
      $pdf->Cell(190,4,'Copy for information and necessary action :-',0,0,'L',0);
      $sign = $sign+$bottom;
      $pdf->SetXY(20,270+$sign);
      $pdf->Cell(190,4,'1.      Mr/Ms._________________________________________',0,0,'L',0);
      $sign = $sign+$bottom;
      $pdf->SetXY(20,270+$sign);
      $pdf->Cell(190,4,'2.      Mr/Ms._________________________________________',0,0,'L',0);
      $sign = $sign+$bottom;
      $pdf->SetXY(10,273+$sign);
      $pdf->Cell(190,4,'( Mrs. Asano Sekhose )',0,0,'R',0);
      $sign = $sign+$bottom;
      $pdf->SetXY(175,273+$sign);
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
    $tot=$tot1+$tot2+$tot3+$tot4+$tot5+$tot6+$tot7+$tot8+$tot9+$tot10+$tot11+$tot12+$tot13+$tot14+$tot15;
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
      $pdf->SetXY(30,65);
      $pdf->Multicell(140,4,'Confidential papers of the Higher Secondary School Leaving Certificate Examination 2018',0,'L',false);
      $pdf->SetFont('Times','',12);
      $pdf->SetXY($left,75);
      $pdf->Cell(190,4,'Sir/Madam,',0,0,'L',0);
      $pdf->SetXY(30,80);
       $pdf->Cell(190,4,'Please find herewith a packet which contains       sealed packets of confidential papers to be kept',0,0,'L',0);
       $pdf->SetXY(10,85);
       $date = date('Y')+1;
        $pdf->Cell(190,4,'under your custody for the HSSLC Examination '.$date.'to be held from the                                as per the',0,0,'L',0);
        $pdf->SetFont('Times','B',12);
       $pdf->SetXY(108,80);
      $pdf->Cell(190,4,$tot,0,0,'L',0);
      $pdf->SetFont('Times','',12);
      $date = date('Y')+1;
       
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
      $pdf->SetXY(80,105);
      $pdf->Cell(190,4,'Time: 9 am - 12 noon',0,0,'L',0);
      $pdf->SetXY($left,110);
      $pdf->Cell(192,8,'Date',1,0,'L',0);
      $pdf->SetXY(60,110);
      $pdf->Cell(190,8,'Day',0,0,'L',0);
      $pdf->SetXY(90,110);
      $pdf->Cell(190,8,'Subject',0,0,'L',0);
      $pdf->SetXY(145,110);
      $pdf->Cell(190,8,'Number of confidential papers',0,0,'L',0);
    
      $sl=1;
      $ss=mysql_query("select * from c12s_timetbl order by sl asc");
      while($rr=mysql_fetch_array($ss,MYSQL_ASSOC))
      {
        
      if($rr['subject']=='Mils')
        {
          
      $pdf->SetXY($left,$contents+$off);
      $pdf->Cell(190,4,$rr['e_date'],0,0,'L',0);
      $pdf->SetXY(60,$contents+$off);
      $pdf->Cell(190,4,$rr['day'],0,0,'L',0);
      $pdf->SetXY(95,$contents+$off);
      $pdf->Cell(190,4,'i.   Tenyidie',0,0,'L',0);
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
      $pdf->Cell(190,4,'iii. Sumi',0,0,'L',0);
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
      $pdf->Cell(190,4,'iv. Lotha',0,0,'L',0);
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
      $pdf->Cell(190,4,'v.  Hindi',0,0,'L',0);
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
      $pdf->Cell(190,4,'vi. Bengali',0,0,'L',0);
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
      $pdf->Cell(190,4,'vii.Alternative English',0,0,'L',0);
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
          if($rr['subcode']=='eng'){$main='eng';}
          if($rr['subcode']=='phy'){$main='phy';}
          if($rr['subcode']=='bio'){$main='bio';}
          if($rr['subcode']=='che'){$main='che';}
          if($rr['subcode']=='mat'){$main='mat';}
          if($rr['subcode']=='csc'){$main='csc';}
          if($rr['subcode']=='inf'){$main='inf';}
          if($row[$main]=='')
          {
           
            $pdf->Cell(190,4,"____",0,0,'L',0);
          $off=$off+$inc;
          
          }
          else
          {
           // $pdf->SetFont('Times','B',12);
          $pdf->Cell(190,4,$row[$main],0,0,'L',0);
          $off=$off+$inc;
        }
        
          }
          else
          {
            $pdf->SetXY(90,$contents+$off);
          $pdf->Cell(190,4,$rr['subject'],0,0,'L',0);
          $pdf->SetXY($valAlign,$contents+$off);
         if($rr['subcode']=='eng'){$main='eng';}
          if($rr['subcode']=='phy'){$main='phy';}
          if($rr['subcode']=='bio'){$main='bio';}
          if($rr['subcode']=='che'){$main='che';}
          if($rr['subcode']=='mat'){$main='mat';}
          if($rr['subcode']=='csc'){$main='csc';}
          if($rr['subcode']=='inf'){$main='inf';}
          if($row[$main]=='')
          {
           
            $pdf->Cell(190,4,"____",0,0,'L',0);
          $off=$off+$inc;
          
          }
          else
          {
           // $pdf->SetFont('Times','B',12);
          $pdf->Cell(190,4,$row[$main],0,0,'L',0);
          $off=$off+$inc;
        }
          }
        }
      $sl++;$off=0;$sign =16; $bottom = 6; $add = 240;
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
      $pdf->SetXY($left,$add+$sign);
      $pdf->Cell(190,4,'Copy to :-',0,0,'L',0);
       $sign = $sign + $bottom;
      $pdf->SetXY(20,$add+$sign);
      $pdf->Cell(190,4,'1.      The Deputy Commissioner/Additional Deputy Commissioner/S.D.O(Civil)/E.A.C.,',0,0,'L',0);
       $sign = $sign + $bottom;
      $pdf->SetXY(20,$add+$sign);
      $pdf->Cell(190,4,'        __________________________________________ for information and necessary action.',0,0,'L',0);
       $sign = $sign + $bottom;
       $pdf->SetXY(20,$add+$sign);
      $pdf->Cell(190,4,'2.      Dr/Mr/Mrs/Ms ____________________________________________ Centre Superintendent of',0,0,'L',0);
       $sign = $sign + $bottom;
       $pdf->SetXY(20,$add+$sign);
      $pdf->Cell(190,4,'        '.$row['centre'],0,0,'L',0);
       $sign = $sign + $bottom;
        $pdf->SetXY(20,$add+$sign);
      $pdf->Cell(190,2,'        You are requested to confirm that the number of question papers of the different subjects supplied',0,0,'L',0);
       $sign = $sign + 4;
       $pdf->SetXY(20,$add+$sign);
      $pdf->Cell(190,2,'        for your center is sufficient. Further,you are directed to read and follow the instructions for the',0,0,'L',0);
       $sign = $sign + 4;
       $pdf->SetXY(20,$add+$sign);
      $pdf->Cell(190,2,'        conduct of examination.',0,0,'L',0);
       $sign = $sign + $bottom;
       $pdf->SetXY(20,$add+$sign);
      $pdf->Cell(190,4,'3.      Office copy.',0,0,'L',0);
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