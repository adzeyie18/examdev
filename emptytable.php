<script src="js/jquery.min.js"></script>


<?php 
//---- NAVIGATION VARIABLES------//
?>
<!--echo "<script>alert('Do you really want to delete the data?',yes,no);</script>";
 //redirect('admin/ahm/panel');
 -->
 <?php
 	include 'dbconn.php';
 	$class = $_POST['theOption'];
 	if($class=='9')
 	{
    mysql_query("Truncate c9_pkchrt_16");
    return("/importc9data.php");
	}
	if($class=='10')
 	{
    mysql_query("Truncate c10_pkchrt_16");
    return("/importc9data.php");
	}
	if($class=='11a')
 	{
    mysql_query("Truncate c11_pkchrt");
    
	}
	
	
   
?>