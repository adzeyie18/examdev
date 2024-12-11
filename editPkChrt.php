<script src="js/jquery.min.js"></script>
<script src="dst.js"></script>
<link rel="stylesheet" href="css/bootstrap.min.css">

<?php

require("dbconn.php");
$query = mysql_query("select distinct district from c9_pkChrt_16 ");

?>
<form action="updatePckChrt.php" method="POST" enctype="multipart/form-data">
<div class="container">
	<div class="panel panel-default">
	<div class="panel-heading">
DISTRICT:<SELECT class="form-control" NAME ="nbseDistrict" id="dstSelect" onfocus="changeSchool()"><option>select district</option>
<?php while($fetch = mysql_fetch_array($query,MYSQL_ASSOC))
{?>
<option value="<?php echo $fetch['district']; ?>"><?php echo $fetch['district'];?></option>
<?php }?>
</SELECT>
<div id="dd2DIV">
SCHOOL:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <SELECT class="form-control" name= "nbseSchool" >
    <OPTION value="">----</OPTION></SELECT>
</div>
<button type="button" id="clik_me" class="btn btn-primary" onfocus="fetch_data()">Edit</button>
<br />


</div></div>

</div>
<div class="container">
	<div class="panel panel-default">
	<div class="panel-heading">
<div id="paste_here"></div>
</div></div></div>
</form>
