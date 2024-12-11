<?php
header('Content-Type: text/html; charset=ISO-8859-1');
require("dbconn.php");
$selDistrict = $_POST['dist'];
$school = $_POST['scho'];
$a="select * from c9_pkChrt_16 where district='$selDistrict' and sl='$school'";
$b=mysql_query($a);
?>
<table>
<?php while($row=mysql_fetch_array($b,MYSQL_ASSOC))
{?>

	<tr>
	<td>MAIN</td>
	<td>TNY</td>
	<td>SMI</td>
	<td>BNG</td>
	<td>ALT</td>
	<td>AON</td>
	<td>LTA</td>
	<td>HND</td>
	<td>FIT</td>
	<td>HS</td>
	<td>BK</td>
	<td>MS</td>
	<td>EE</td>
	<td>IV</td>
	<td>TT</td>
	<td>HC</td>
	<td>RT</td>
	<td>ET</td>
	<td>BW</td>
	<td>MC</td>
	</tr>
	<tr>
	<td> <input type="text" name="main" value="<?php echo $row['main'];?>" size='2'></td>
	<td> <input type="text" name="tny" value="<?php echo $row['tny'];?>" size='2'></td>
	<td> <input type="text" name="smi" value="<?php echo $row['smi'];?>" size='2'></td>
	<td> <input type="text" name="bng" value="<?php echo $row['bng'];?>" size='2'></td>
	<td> <input type="text" name="alt" value="<?php echo $row['alt'];?>" size='2'></td>
	<td> <input type="text" name="aon" value="<?php echo $row['aon'];?>" size='2'></td>
	<td> <input type="text" name="lta" value="<?php echo $row['lta'];?>" size='2'></td>
	<td> <input type="text" name="hnd" value="<?php echo $row['hnd'];?>" size='2'></td>
	<td> <input type="text" name="fit" value="<?php echo $row['fit'];?>" size='2'></td>
	<td> <input type="text" name="hs" value="<?php echo $row['hs'];?>" size='2'></td>
	<td> <input type="text" name="bk" value="<?php echo $row['bk'];?>" size='2'></td>
	<td> <input type="text" name="ms" value="<?php echo $row['ms'];?>" size='2'></td>
	<td> <input type="text" name="ee" value="<?php echo $row['ee'];?>" size='2'></td>
	<td> <input type="text" name="iv" value="<?php echo $row['iv'];?>" size='2'></td>
	<td> <input type="text" name="tt" value="<?php echo $row['tt'];?>" size='2'></td>
	<td> <input type="text" name="hc" value="<?php echo $row['hc'];?>" size='2'></td>
	<td> <input type="text" name="rt" value="<?php echo $row['rt'];?>" size='2'></td>
	<td> <input type="text" name="et" value="<?php echo $row['et'];?>" size='2'></td>
	<td> <input type="text" name="bw" value="<?php echo $row['bw'];?>" size='2'></td>
	<td> <input type="text" name="mc" value="<?php echo $row['mc'];?>" size='2'></td>	
	</tr>
	<tr>
	<td colspan="10"> <input type="text" name="centre" value="<?php echo $row['school'];?>" size='50'></td>
	</tr>
	<tr><td><input type="hidden" name="sl" value="<?php echo $row['sl'];?>"></td></tr>
<?php
}
?>
</table>
<input type="submit" class="btn btn-primary" name="Update">
