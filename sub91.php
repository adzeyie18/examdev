<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php require("dbconn.php");?>
<div align="center"><strong>FORWARDING(set 2)</strong></div><BR /><BR />
<form action="forwardingset22.php" method="post" enctype="multipart/form-data" target="_parent">
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
     <td></td>
     <td><input type="submit" /></td>
   </tr>
</table>


</div>
</form>

</body>
</html>