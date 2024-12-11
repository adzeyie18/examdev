<?php
header('Content-Type: text/html; charset=ISO-8859-1');
require("dbconn.php");
$selDistrict = $_POST['dist'];
$school = $_POST['scho'];
$a="select * from c11s_pkChrt where district='$selDistrict' and sl='$school'";
$b=mysql_query($a);
?>
<table>
<?php while($row=mysql_fetch_array($b,MYSQL_ASSOC))
{?>

	<tr>
	<td>ENG</td>
	<td>PHY</td>
	<td>CHE</td>
	<td>BIO</td>
	<td>MAT</td>
	<td>EVS</td>
	<td>CSC</td>
	<td>INF</td>
	<td>ITV</td>
	<td>TTV</td>
	<td>RTV</td>
	<td>HCV</td>
	<td>EHV</td>
	<td>BTV</td>
	<td>MSV</td>
	<td>ALT</td>
	<td>HND</td>
	<td>BNG</td>
	<td>TNY</td>
	<td>SMI</td>
	<td>AON</td>
	<td>LTA</td>
	</tr>
	<tr>
	<td> <input type="text" name="eng" value="<?php echo $row['eng'];?>" size='2'></td>
	<td> <input type="text" name="phy" value="<?php echo $row['phy'];?>" size='2'></td>
	<td> <input type="text" name="che" value="<?php echo $row['che'];?>" size='2'></td>
	<td> <input type="text" name="bio" value="<?php echo $row['bio'];?>" size='2'></td>
	<td> <input type="text" name="mat" value="<?php echo $row['mat'];?>" size='2'></td>
	<td> <input type="text" name="evs" value="<?php echo $row['evs'];?>" size='2'></td>
	<td> <input type="text" name="csc" value="<?php echo $row['csc'];?>" size='2'></td>
	<td> <input type="text" name="inf" value="<?php echo $row['inf'];?>" size='2'></td>
	<td> <input type="text" name="itv" value="<?php echo $row['itv'];?>" size='2'></td>
	<td> <input type="text" name="ttv" value="<?php echo $row['ttv'];?>" size='2'></td>
	<td> <input type="text" name="rtv" value="<?php echo $row['rtv'];?>" size='2'></td>
	<td> <input type="text" name="hcv" value="<?php echo $row['hcv'];?>" size='2'></td>
	<td> <input type="text" name="ehv" value="<?php echo $row['ehv'];?>" size='2'></td>
	<td> <input type="text" name="btv" value="<?php echo $row['btv'];?>" size='2'></td>
	<td> <input type="text" name="msv" value="<?php echo $row['msv'];?>" size='2'></td>
	<td> <input type="text" name="alt" value="<?php echo $row['alt'];?>" size='2'></td>
	<td> <input type="text" name="hnd" value="<?php echo $row['hnd'];?>" size='2'></td>
	<td> <input type="text" name="bng" value="<?php echo $row['bng'];?>" size='2'></td>
	<td> <input type="text" name="tny" value="<?php echo $row['tny'];?>" size='2'></td>
	<td> <input type="text" name="smi" value="<?php echo $row['smi'];?>" size='2'></td>
	<td> <input type="text" name="aon" value="<?php echo $row['aon'];?>" size='2'></td>
	<td> <input type="text" name="lta" value="<?php echo $row['lta'];?>" size='2'></td>
	</tr>
	<tr>
	<td colspan="10"> <input type="text" name="centre" value="<?php echo $row['centre'];?>" size='50'></td>
	</tr>
	<tr><td><input type="hidden" name="sl" value="<?php echo $row['sl'];?>"></td></tr>
<?php
}
?>
</table>
<input type="submit" class="btn btn-primary" name="Update">
