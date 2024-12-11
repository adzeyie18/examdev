<script src="js/jquery.min.js"></script>
<link rel="stylesheet" href="css/bootstrap.min.css">
<script type="text/javascript">
	function changeSchool()
{
            $(document).ready(function() {
//alert('Document is ready');
                $('#dstSelect').change(function() {
                    var sel = $(this).val();
//alert('You picked: ' + sel);
                    $.ajax({
                        type: "POST",
                        url: "centreChange11s.php", // "another_php_file.php",
                        data: 'theOption=' + sel,
                        success: function(data) {
//alert('Server-side response: ' + data);
                            $('#dd2DIV').html(data);
                            
                        }
                    });
                });
            });
}

function fetch_data()
{
      $(document).ready(function() {
//alert('Document is ready');
                $('#clik_me').click(function() {
                    var sel = $('#dstSelect').val();
                    var sel1 = $('#centre').val();
//alert('You picked: ' + sel);
                    $.ajax({
                        type: "POST",
                        url: "another_php_file11s.php", // "another_php_file.php",
                        data: {
                            'dist' : sel,
                            'scho' : sel1,
                            
                        },
                        success: function(data) {
//alert('Server-side response: ' + data);
                            $('#paste_here').html(data);
                            
                        }
                    });
                });
            });
}

</script>
<?php
header('Content-Type: text/html; charset=ISO-8859-1');
require("dbconn.php");
$query = mysql_query("select distinct district from c11s_pkChrt ");

?>
<form action="updatePckChrt11s.php" method="POST" enctype="multipart/form-data">
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
