<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php require("dbconn.php");?>
<div align="center"><strong>TOPSHEET(SET 2)</strong></div><BR /><BR />
<form action="top.php" method="post"  enctype="application/x-www-form-urlencoded" target="_parent" >
<div align="center">
<table width="31%" border="0" >
  <tr>
    <td>District:</td>
    <td><SELECT NAME ="nbseDistrict" id="dtSelect" >
<option></option>
<?php 
$a="select * from nbse_districts";
$b=mysql_query($a);
while($row= mysql_fetch_array($b,MYSQL_ASSOC))
{
?>

<OPTION value="<?php echo $row['nbseDistrictName']; ?>"><?php echo $row['nbseDistrictName']; ?></OPTION>
<?php }?>
</SELECT>
<BR /></td>
  </tr>
  <tr>
    <td>Subject:</td>
    <td><select name="sub">
        <optgroup style="background-color:#30C" label="-----Compulsory-----"></optgroup>
    <option value="ENGLISH" style="background-color:#9CF">ENGLISH</option>
    <option value="MATHEMATICS" style="background-color:#9CF">MATHEMATICS</option>
    <option value="SCIENCE" style="background-color:#9CF">SCIENCE</option>
    <option value="SOCIAL SCIENCES" style="background-color:#9CF">SOCIAL SCIENCES</option>
    <optgroup style="background-color:#30C" label="-----Second Language-----"></optgroup>
    <option value="tny" style="background-color:#F9F">TENYIDIE</option>
    <option value="aon" style="background-color:#F9F">AO</option>
    <option value="smi" style="background-color:#F9F">SUMI</option>
    <option value="lta" style="background-color:#F9F">LOTHA</option>
    <option value="hnd" style="background-color:#F9F">HINDI</option>
    <option value="bng" style="background-color:#F9F">BENGALI</option>
    <option value="alt" style="background-color:#F9F">ALTERNATIVE ENGLISH</option>
<optgroup style="background-color:#30C" label="-----Sixth Subject-----"></optgroup>
    <option value="fit" style="background-color:#999">FIT</option>
    <option value="ms" style="background-color:#999">MUSIC</option>
     <option value="hs" style="background-color:#999">HOME SCIENCE</option>
     <option value="bk" style="background-color:#999">BK & ACCOUNTANCY</option>
     <option value="iv" style="background-color:#999">IT(VOCATIONAL)</option>
     <option value="ee" style="background-color:#999">ENVIRONMENTAL EDUCATION</option>
      <option value="tt" style="background-color:#999">TRAVEL & TOURISM</option>
     </select>
    </td>
  </tr>
   <tr>
     <td></td>
     <td><input type="submit" /></td>
   </tr>
</table>


</div>
</form>

</body>
</html>