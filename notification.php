<link rel="stylesheet" href="css/bootstrap.min.css">
<?php
	require("dbconn.php");
	?>

	<form action="saveNotification.php" method="post" enctype="multipart/form-data">
	<?php 

		$sql =	mysql_query("select * from notification_tbl where sl=1");
		$row = mysql_fetch_array($sql);
		
	?>
	<div class="container">
	<div class="panel panel-default">
	<div class="panel-heading">
	<p><B>REMEMBER:</B></p>
	<p>*CLASS-WISE NOTIFICATION NO. SHOULD BE ENTERED CAREFULLY<BR>
	*THIS NOTIFICATION NO. WILL BE REFLECTED IN THE RESPECTIVE FORWARDINGS<BR>
	</p>
	</div></div>
	<div class="panel-body">
	<?php
		$yr =	mysql_query("select * from YEAR");
		$yr = mysql_fetch_array($yr);
	?>
	EXAM YEAR: <input type="yr" name="yr" value="<?php echo $yr['year'];?>" SIZE='5'><br>
	<input style="text-align: center;" type="text" name="" value="SLNO" size="1" disabled="disabled"><input type="text" name="class" value="CLASS" disabled="disabled"><input type="text" name="noti1" value="NOTIFICATION NUMBER" size='30' disabled="disabled"><input type="text" name="year1" value="MONTH_YEAR" disabled="disabled"><input type="text" name="sup1" value="SUPERSCRIPT" disabled="disabled"><BR />
	
	<input style="text-align: center;" type="text" name="sl1" value="<?php echo $row['sl'];?>" size="1" disabled="disabled"><input type="text" name="class" value="Class-10" disabled="disabled"><input type="text" name="noti1" value="<?php echo $row['noti_detail'];?>" size='30'><input type="text" name="year1" value="<?php echo $row['noti_month_year'];?>"><input type="text" name="sup1" value="<?php echo $row['sup_script'];?>"><BR />
	

	<?php 

		$sql =	mysql_query("select * from notification_tbl where sl=2");
		$row = mysql_fetch_array($sql);
		
	?>
	
	<input style="text-align: center;" type="text" name="sl2" value="<?php echo $row['sl'];?>" size="1" disabled="disabled"><input type="text" name="class" value="Class-11" disabled="disabled"><input type="text" name="noti2" value="<?php echo $row['noti_detail'];?>" size='30'><input type="text" name="year2" value="<?php echo $row['noti_month_year'];?>"><input type="text" name="sup2" value="<?php echo $row['sup_script'];?>"><BR />
	<?php 

		$sql =	mysql_query("select * from notification_tbl where sl=3");
		$row = mysql_fetch_array($sql);
		
	?>
	
	<input style="text-align: center;" type="text" name="sl3" value="<?php echo $row['sl'];?>" size="1" disabled="disabled"><input type="text" name="class" value="Class-12" disabled="disabled"><input type="text" name="noti3" value="<?php echo $row['noti_detail'];?>" size='30'><input type="text" name="year3" value="<?php echo $row['noti_month_year'];?>"><input type="text" name="sup3" value="<?php echo $row['sup_script'];?>"><BR />

<?php 

		$sql =	mysql_query("select * from notification_tbl where sl=4");
		$row = mysql_fetch_array($sql);
		
	?>
	
	<input style="text-align: center;" type="text" name="sl4" value="<?php echo $row['sl'];?>" size="1" disabled="disabled"><input type="text" name="class" value="Class-9" disabled="disabled"><input type="text" name="noti4" value="<?php echo $row['noti_detail'];?>" size='30'><input type="text" name="year4" value="<?php echo $row['noti_month_year'];?>"><input type="text" name="sup4" value="<?php echo $row['sup_script'];?>"><BR />
	

	

	<input type="submit" class="btn btn-primary" name="submit" value="Save">
	</div></div>

	</form>
