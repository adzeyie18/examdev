<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" href="css/bootstrap.min.css">

</head>

<body>
<?php require("dbconn.php");?>
<div align="center"><strong>Envelope(SET 1)</strong></div>
<BR /><BR />
<form action="envelope2.php" method="post"  enctype="application/x-www-form-urlencoded" target="_parent" >
<div class="container">
  <div class="panel panel-default">
  <div class="panel-heading">
<div align="center">
<table width="31%" border="0" >
  <tr>
    <td>District:</td>
    <td><SELECT class="form-control" NAME ="nbseDistrict" id="dtSelect" >
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
  
     <td></td>
     <td><input type="submit" /></td>
   </tr>
</table>


</div>
</form>

</body>
</html>