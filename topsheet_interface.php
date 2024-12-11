<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="js/jquery.min.js"></script>

<title>Untitled Document</title>
<link rel="stylesheet" href="css/bootstrap.min.css">

</head>

<body>
<script type="text/javascript">
    function getSubjects()
{
            $(document).ready(function() {
//alert('Document is ready');
                $('#dst').change(function() {
                    var sel = $(this).val();
//alert('You picked: ' + sel);
                    $.ajax({
                        type: "POST",
                        url: "subjectsArray.php", // "another_php_file.php",
                        data: 'theOption=' + sel,
                        success: function(data) {
//alert('Server-side response: ' + data);
                            $('#ss').html(data);
                            
                        }
                    });
                });
            });
}
</script>
<?php require("dbconn.php");?>
<div align="center"><strong>TOPSHEET(SET 1)</strong><BR />
<form action="topsheet.php" method="post"  enctype="application/x-www-form-urlencoded" target="_blank" >
<div class="container">
  <div class="panel panel-default">
  <div class="panel-heading">
<div align="center">
<b>Select Exam:</b>
  <select class="form-control" name="exam" >
  <option></option>
<option value="Main" style="background-color:#9CF">Main</option>
<option value="Compart" style="background-color:#9CF">Compart</option>
</select>
<br />
<b>Select Class:</b>
  <select class="form-control" name="class" id="dst" onfocus="getSubjects()">
  <option></option>
<option value="9" style="background-color:#9CF">Class-9</option>
<option value="10" style="background-color:#9CF">Class-10</option>
<option value="11a" style="background-color:#9CF">Class-11a</option>
<option value="11c" style="background-color:#9CF">Class-11c</option>
<option value="11s" style="background-color:#9CF">Class-11s</option>
<option value="12a" style="background-color:#9CF">Class-12a</option>
<option value="12c" style="background-color:#9CF">Class-12c</option>
<option value="12s" style="background-color:#9CF">Class-12s</option>
  </select><br />
   <b>District:</b>
    <SELECT class="form-control" NAME ="nbseDistrict" id="dtSelect" >
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
<BR />
    
 </div>
<div id="ss"><b>Subject:</b><select class="form-control"><option>Subjects</option></select></div><br />
<input type="submit" />
</form>
</div>
</body>
</html>