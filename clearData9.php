<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript">
<?php
require("dbconn.php");
$data = $_POST['theOption'];
//echo $data;

mysql_query("Truncate c9_pkchrt_16");


?>