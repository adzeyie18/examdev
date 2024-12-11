<?php
header('Content-Type: text/html; charset=ISO-8859-1');
require("dbconn.php");
$selDistrict = $_POST['dist'];
$school = $_POST['scho'];
$a="select * from c10_pkChrt_16 where district='$selDistrict' and sl='$school'";
$b=mysql_query($a);
?>
<table class="">
<?php while($row=mysql_fetch_array($b,MYSQL_ASSOC))
{?>

	<tr>
	<td>ENG</td>
	<td>MATA</td>
	<td>MATB</td>
	<td>SC</td>
	<td>SS</td>
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
	</tr>
	
	<tr>
	<td> <input type="text" name="eng" value="<?php echo $row['eng'];?>" size='2'></td>
	<td> <input type="text" name="mata" value="<?php echo $row['mata'];?>" size='2'></td>
	<td> <input type="text" name="matb" value="<?php echo $row['matb'];?>" size='2'></td>
	<td> <input type="text" name="sc" value="<?php echo $row['sc'];?>" size='2'></td>
	<td> <input type="text" name="ss" value="<?php echo $row['ss'];?>" size='2'></td>
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
	</tr>
	<tr><td><br></td></tr>
	<tr>
	<td>IV</td>
	<td>TT</td>
	<td>HV</td>
	<td>RV</td>
	<td>EV</td>
	<td>BV</td>
	<td>MV</td>
	<td>PV</td>
	<td>MM</td>
	<td>GRAPH</td>
	</tr>
	
	
	<tr>
	<td> <input type="text" name="iv" value="<?php echo $row['iv'];?>" size='2'></td>
	<td> <input type="text" name="tt" value="<?php echo $row['tt'];?>" size='2'></td>
	<td> <input type="text" name="hv" value="<?php echo $row['hv'];?>" size='2'></td>
	<td> <input type="text" name="rv" value="<?php echo $row['rv'];?>" size='2'></td>
	<td> <input type="text" name="ev" value="<?php echo $row['ev'];?>" size='2'></td>
	<td> <input type="text" name="bv" value="<?php echo $row['bv'];?>" size='2'></td>
	<td> <input type="text" name="mv" value="<?php echo $row['mv'];?>" size='2'></td>
	<td> <input type="text" name="pv" value="<?php echo $row['pv'];?>" size='2'></td>
	<td> <input type="text" name="mm" value="<?php echo $row['mm'];?>" size='2'></td>
	<td> <input type="text" name="graph" value="<?php echo $row['graph'];?>" size='2'></td>
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
