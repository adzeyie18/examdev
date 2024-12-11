<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../css/main.css" rel="stylesheet" type="text/css" media="print" />

<title>Untitled Document</title>
</head>

<body style="size:landscape">
<?php require("../dbconn.php");
$zz=0;$yy=0;$xx=0;$ww=0;$vv=0;$uu=0;$tt=0;$ss=0;$rrr=0;$qqq=0;$pr=0;$ps=0;$pt=0;$pu=0;$pv=0;$py=0;$pz=0;$pc=0;
$dist=$_POST['nbseDistrict'];
$sch1=mysql_query("select * from nbse_schools where nbseDistCode='$dist' and nbseSchoolCode!='' ORDER BY nbseSchoolName ASC");
				  while($rw=mysql_fetch_array($sch1,MYSQL_ASSOC))
{
	$school=$rw['nbseSchoolCode'];$sname=$rw['nbseSchoolName'];
	
$query=mysql_query("select * from nbse_student9 where nbseSchoolCode='$school'");
$row=mysql_fetch_array($query,MYSQL_ASSOC);
	$a=mysql_query("select * from nbse_student9 where nbseL1='1' and nbseSchoolCode='$school'");$aa=mysql_num_rows($a);
    $b=mysql_query("select * from nbse_student9 where ELE1='2' and nbseSchoolCode='$school'");$bb=mysql_num_rows($b);
    $c=mysql_query("select * from nbse_student9 where ELE2='3' and nbseSchoolCode='$school'");$cc=mysql_num_rows($c); 
     $d=mysql_query("select * from nbse_student9 where ELE3='4' and nbseSchoolCode='$school'");$dd=mysql_num_rows($d); 
     $e=mysql_query("select * from nbse_student9 where nbseL2='T' and nbseSchoolCode='$school'");$ee=mysql_num_rows($e);
     $f=mysql_query("select * from nbse_student9 where nbseL2='A' and nbseSchoolCode='$school'");$ff=mysql_num_rows($f); 
     $g=mysql_query("select * from nbse_student9 where nbseL2='S' and nbseSchoolCode='$school'");$gg=mysql_num_rows($g); 
     $h=mysql_query("select * from nbse_student9 where nbseL2='L' and nbseSchoolCode='$school'");$hh=mysql_num_rows($h); 
     $i=mysql_query("select * from nbse_student9 where nbseL2='H' and nbseSchoolCode='$school'");$ii=mysql_num_rows($i);
     $j=mysql_query("select * from nbse_student9 where nbseL2='B' and nbseSchoolCode='$school'");$jj=mysql_num_rows($j);
     $k=mysql_query("select * from nbse_student9 where nbseL2='E' and nbseSchoolCode='$school'");$kk=mysql_num_rows($k); 
     $l=mysql_query("select * from nbse_student9 where nbseS6='IT' and nbseSchoolCode='$school'");$ll=mysql_num_rows($l); 
     $m=mysql_query("select * from nbse_student9 where nbseS6='MS' and nbseSchoolCode='$school'");$mm=mysql_num_rows($m); 
     $n=mysql_query("select * from nbse_student9 where nbseS6='HS' and nbseSchoolCode='$school'");$nn=mysql_num_rows($n); 
     $o=mysql_query("select * from nbse_student9 where nbseS6='BK' and nbseSchoolCode='$school'");$oo=mysql_num_rows($o); 
     $p=mysql_query("select * from nbse_student9 where nbseS6='IV' and nbseSchoolCode='$school'");$pp=mysql_num_rows($p); 
     $q=mysql_query("select * from nbse_student9 where nbseS6='EE' and nbseSchoolCode='$school'");$qq=mysql_num_rows($q); 
	 $r=mysql_query("select * from nbse_student9 where nbseS6='TT' and nbseSchoolCode='$school'");$rr=mysql_num_rows($r); 

if($aa==0){}
else{

?>



<div class="single_record">
<table width="100%" border="0" rules="all">
  <tr>
    <td colspan="17"><strong><?php echo $sname;?></strong></td>
  </tr>
  <tr>
    <td>ENG</td>
    <td>MATH</td>
    <td>SCI</td>
    <td>SSC</td>
    <td>TNY</td>
    <td>AO</td>
    <td>SMI</td>
    <td>LTA</td>
    <td>HND</td>
    <td>BNG</td>
    <td>ALT</td>
    <td>FIT</td>
    <td>MSC</td>
    <td>HS</td>
    <td>BK</td>
    <td>IT(V)</td>
    <td>EE</td>
    <td>TT</td>
  </tr>
  <tr>
    <td><?php echo $aa; $zz+=$aa;?></td>
    <td><?php echo $bb; $yy+=$bb;?></td>
    <td><?php echo $cc; $xx+=$cc;?></td>
    <td><?php echo $dd; $ww+=$dd;?></td>
    <td><?php echo $ee; $vv+=$ee;?></td>
    <td><?php echo $ff; $uu+=$ff;?></td>
    <td><?php echo $gg; $tt+=$gg;?></td>
    <td><?php echo $hh; $ss+=$hh;?></td>
    <td><?php echo $ii; $rrr+=$ii;?></td>
    <td><?php echo $jj; $qqq+=$jj;?></td>
    <td><?php echo $kk; $pr+=$kk;?></td>
    <td><?php echo $ll; $ps+=$ll;?></td>
    <td><?php echo $mm; $pt+=$mm;?></td>
    <td><?php echo $nn; $pu+=$nn;?></td>
    <td><?php echo $oo; $pv+=$oo;?></td>
    <td><?php echo $pp; $py+=$pp;?></td>
    <td><?php echo $qq; $pz+=$qq;?></td>
     <td><?php echo $rr; $pc+=$rr;?></td>
  </tr>
</table></div>
<?php }}?>
<br />
<table width="100%" border="0" rules="all">
  <tr>
    <td><strong>ENG</strong></td>
    <td><strong>MATH</strong></td>
    <td><strong>SCI</strong></td>
    <td><strong>SSC</strong></td>
    <td><strong>TNY</strong></td>
    <td><strong>AO</strong></td>
    <td><strong>SMI</strong></td>
    <td><strong>LTA</strong></td>
    <td><strong>HND</strong></td>
    <td><strong>BNG</strong></td>
    <td><strong>ALT</strong></td>
    <td><strong>FIT</strong></td>
    <td><strong>MSC</strong></td>
    <td><strong>HS</strong></td>
    <td><strong>BK</strong></td>
    <td><strong>IT(V)</strong></td>
    <td><strong>EE</strong></td>
    <td><strong>TT</strong></td>
  </tr>
  <tr>
    <td><?php echo $zz;?></td>
    <td><?php echo $yy;?></td>
    <td><?php echo $xx;?></td>
    <td><?php echo $ww;?></td>
    <td><?php echo $vv;?></td>
    <td><?php echo $uu;?></td>
    <td><?php echo $tt;?></td>
    <td><?php echo $ss;?></td>
    <td><?php echo $rrr;?></td>
    <td><?php echo $qqq;?></td>
    <td><?php echo $pr;?></td>
    <td><?php echo $ps;?></td>
    <td><?php echo $pt;?></td>
    <td><?php echo $pu;?></td>
    <td><?php echo $pv;?></td>
    <td><?php echo $py;?></td>
    <td><?php echo $pz;?></td>
    <td><?php echo $pc;?></td>
  </tr>
</table>

</body>
</html>