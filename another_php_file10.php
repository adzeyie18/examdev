
<meta charset="UTF-8">
<!--<meta http-equiv="content-type" content="text/html;charset=utf-8"> -->

<?php
header('Content-Type: text/html; charset=ISO-8859-1');
require("dbconn.php");
include('fpdf/fpdf.php');
$selDistrict = $_POST['theOption'];
$a="select * from c10_pkChrt_16 where district='$selDistrict'";
$b=mysql_query($a);
$opt=0;
if(is_null($b)){echo "cant access";}

	?> 
    SCHOOL:<select class="form-control" name="school" id="school">
                <option value="">--Select School--</option>
            <?php while($row=mysql_fetch_array($b,MYSQL_ASSOC))
	{	
		//$opt = str_replace("ü", "�", trim($row['school']));

		//$opt=$row['school'];
		//$opt   = iconv('UTF-8','windows-1252',mb_strtoupper($opt));
		//$opt   = str_replace("�", "�", trim($opt));
			//$opt = iconv('UTF-8','windows-1252',$row['school']);
	
		
			//$opt = htmlentities($row['school'],ENT_QUOTES);
			//$opt = mysql_real_escape_string($row['school']);
			//$opt = iconv('UTF-8','windows-1252',$opt);

					?>

			<option value="<?php echo $row['sl'];?>"><?php
			 echo $row['school']; ?></option>
          
<?php    
}?>
</select>


