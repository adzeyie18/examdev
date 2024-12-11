 <meta charset="utf-8">
<?php
 header('Content-Type: text/html; charset=ISO-8859-1');
require("dbconn.php");
$selDistrict = $_POST['theOption'];
$a="select * from c12a_pkchrt where district='$selDistrict'";
$b=mysql_query($a);
if(is_null($b)){echo "cant access";}

	?> 
    SCHOOL:<select class="form-control" name="centre" id="centre">
                <option value="">--Select School--</option>
            <?php while($row=mysql_fetch_array($b,MYSQL_ASSOC))
            //$sumi = iconv('UTF-8','windows-1252',$row['centre']);
     // $pdf->Cell(190,4,$sumi,0,0,'L',0);
          // $sumi = htmlspecialchars($row['centre']);
	{?>
			<option value="<?php echo $row['sl']; ?>"><?php echo $row['centre']; ?></option>
           
<?php    
}?>
</select>


