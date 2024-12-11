<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>forwarding</title>
<link rel="stylesheet" href="css/bootstrap.min.css">

</head>

<body>
<?php require("dbconn.php");?>
<div align="center"><strong>FORWARDING</strong></div><BR /><BR />
<form action="forwarding.php" method="post" enctype="multipart/form-data" target="_blank">
  <div class="container">
  <div class="panel panel-default">
  <div class="panel-heading">
<div align="center">
<table width="31%" border="0" >
 <tr>
<td>Select Class: </td>
  <td><select class="form-control" name="exam" id="class">
  <option value="main">Main</option>
<option value="compart" style="background-color:#9CF">Compart</option>


  </select></td>
</tr>
  <tr>
<td>Select Class: </td>
  <td><select class="form-control" name="class" id="class"><option value="9">Class-9</option>
<option value="10" style="background-color:#9CF">Class-10</option>
<option value="11a" style="background-color:#9CF">Class-11-arts</option>
<option value="11c" style="background-color:#9CF">Class-11-commerce</option>
<option value="11s" style="background-color:#9CF">Class-11-science</option>
<option value="12a" style="background-color:#9CF">Class-12-arts</option>
<option value="12c" style="background-color:#9CF">Class-12-commerce</option>
<option value="12s" style="background-color:#9CF">Class-12-science</option>

  </select></td>
</tr>
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

<OPTION value="<?php echo $row['nbseDistrictName']; ?>" style="background-color:#F9F"><?php echo $row['nbseDistrictName']; ?></OPTION>
<?php }?>
</SELECT>
<BR /></td>
  </tr>
   <tr>
     <td></td>
     <td><input class="form-control" type="submit" /></td>
   </tr>
</table>


</div>
</form>

</body>
</html>