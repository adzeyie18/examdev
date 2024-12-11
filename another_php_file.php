
<?php
header('Content-Type: text/html; charset=ISO-8859-1');
require("dbconn.php");
$selDistrict = $_POST['theOption'];
$a="select * from c9_pkChrt_16 where district='$selDistrict'";
$b=mysql_query($a);
if(is_null($b)){echo "cant access";}

	?> 
    SCHOOL:<select class="form-control" name="school" id="school">
                <option value="">--Select School--</option>
            <?php while($row=mysql_fetch_array($b,MYSQL_ASSOC))
	{?>
			<option value="<?php echo $row['sl'];?>"><?php echo $row['school']; ?></option>
           
<?php    
}?>
</select>


