
<?php
//load the database configuration file
include 'dbconn.php';
header('Content-Type: text/html; charset=ISO-8859-1');


$query =mysql_query("SELECT
    nbse_ten_results.nbse_app_id as app,
    nbse_form16.nbse_hslc_roll as roll,
    nbse_ten_results.nbse_eng_ext as eng,
    nbse_ten_results.nbse_maths_ext as mat,
    nbse_ten_results.nbse_science_ext as sci,
    nbse_ten_results.nbse_ss_ext as ss,
    nbse_form16.nbse_secondLanguage as sec_sub,
    nbse_ten_results.nbse_second_ext as sec,
    nbse_form16.nbse_sixSubject as six_sub,
    nbse_ten_results.nbse_sixth_ext as six,
    nbse_ten_results.nbse_percentage as per
FROM
    nbse_form16
JOIN nbse_ten_results ON nbse_form16.nbse_app_id = nbse_ten_results.nbse_app_id
WHERE
    nbse_ten_results.nbse_percentage >= 50 AND nbse_ten_results.nbse_results = 'N' and nbse_ten_results.nbse_app_id='2001083066437674'
ORDER BY
    nbse_form16.nbse_hslc_roll");
$EN=0;
$MA=0;
$SC=0;
$S=0;
while($row = mysql_fetch_array($query))
{
$app[]=$row['app'];
$roll[]=$row['roll'];
$eng[]=$row['eng'];
$mat[]=$row['mat'];
$sci[]=$row['sci'];
$ss[]=$row['ss'];
$sec_sub[]=$row['sec_sub'];
$sec[]=$row['sec'];
$six_sub[]=$row['six_sub'];
$six[]=$row['six'];

if($row['eng']<32 ){$EN=1;}
if($row['mat']<32 ){$MA=1;}
if($row['sci']<32 ){$SC=1;}
if($row['ss']<32 ){$S=1;}
$check=$EN+$MA+$SC+$S;
if($check==1)
{
  
  if($row['eng']<32)
  {

    mysql_query("update nbse_ten_results set nbse_eng_ext=32,nbse_results='Q' where nbse_app_id=$row['app']");

  }
}



}




//$arr=count($roll);
//echo $arr.'<br>';
//for ($i=0; $i < $arr; $i++) { 
  # code...
 // echo $roll[$i].' '.$eng[$i].'<br>';


