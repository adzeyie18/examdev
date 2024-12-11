<link rel="stylesheet" href="css/bootstrap.min.css">
<?php
	require("dbconn.php");
	?>

	<form action="saveTime10.php" method="post" enctype="multipart/form-data">
	<?php 

		$sql =	mysql_query("select * from c10_timetbl where sl=1");
		$row = mysql_fetch_array($sql);
		
	?>
	<div class="container">
	<div class="panel panel-default">
	<div class="panel-heading">
	<p><B>REMEMBER:</B></p>
	<p>*SUBJECT NAME SHOULD BE ENTERED EXACTLY AS BELOW:<BR>
	*English,Mathematics,Science,Social Sciences,Mils,6th<BR>
	*EXAM dates should be entered in ascending order</p>
	</div></div>
	<div class="panel-body">
	<div style="font-size: 30px;font-weight: bold;font-style: italic;color: blue">CLASS-X</div>
<input style="text-align: center;" type="text" name="" value="SLNO" size="1"  disabled="disabled"><input type="text" name="" value="EXAM_DATE" disabled="disabled"><input type="text" name="" value="DAY" disabled="disabled"><input type="text" name="" value="SUBJECT" disabled="disabled"><BR />

	<input style="text-align: center;" type="text" name="sl1" value="<?php echo $row['sl'];?>" size="1" disabled="disabled"><input type="text" name="e_date1" value="<?php echo $row['e_date'];?>"><input type="text" name="day1" value="<?php echo $row['day'];?>"><input type="text" name="subject1" value="<?php echo $row['subject'];?>"><BR />
	

	<?php 

		$sql =	mysql_query("select * from c10_timetbl where sl=2");
		$row = mysql_fetch_array($sql);
		
	?>
	
	<input style="text-align: center;" type="text" name="sl2" value="<?php echo $row['sl'];?>" size="1" disabled="disabled"><input type="text" name="e_date2" value="<?php echo $row['e_date'];?>"><input type="text" name="day2" value="<?php echo $row['day'];?>"><input type="text" name="subject2" value="<?php echo $row['subject'];?>"><BR />
	<?php 

		$sql =	mysql_query("select * from c10_timetbl where sl=3");
		$row = mysql_fetch_array($sql);
		
	?>
	
	<input style="text-align: center;" type="text" name="sl3" value="<?php echo $row['sl'];?>" size="1" disabled="disabled"><input type="text" name="e_date3" value="<?php echo $row['e_date'];?>"><input type="text" name="day3" value="<?php echo $row['day'];?>"><input type="text" name="subject3" value="<?php echo $row['subject'];?>"><BR />

	<?php 

		$sql =	mysql_query("select * from c10_timetbl where sl=4");
		$row = mysql_fetch_array($sql);
		
	?>
	
	<input style="text-align: center;" type="text" name="sl4" value="<?php echo $row['sl'];?>" size="1" disabled="disabled"><input type="text" name="e_date4" value="<?php echo $row['e_date'];?>"><input type="text" name="day4" value="<?php echo $row['day'];?>"><input type="text" name="subject4" value="<?php echo $row['subject'];?>"><BR />

	<?php 

		$sql =	mysql_query("select * from c10_timetbl where sl=5");
		$row = mysql_fetch_array($sql);
		
	?>
	
	<input style="text-align: center;" type="text" name="sl5" value="<?php echo $row['sl'];?>" size="1" disabled="disabled"><input type="text" name="e_date5" value="<?php echo $row['e_date'];?>"><input type="text" name="day5" value="<?php echo $row['day'];?>"><input type="text" name="subject5" value="<?php echo $row['subject'];?>"><BR />

	<?php 

		$sql =	mysql_query("select * from c10_timetbl where sl=6");
		$row = mysql_fetch_array($sql);
		
	?>
	
	<input style="text-align: center;" type="text" name="sl6" value="<?php echo $row['sl'];?>" size="1" disabled="disabled"><input type="text" name="e_date6" value="<?php echo $row['e_date'];?>"><input type="text" name="day6" value="<?php echo $row['day'];?>"><input type="text" name="subject6" value="<?php echo $row['subject'];?>"><BR />

	

	<input type="submit" class="btn btn-primary" name="submit" value="Save">
	</div></div>

	</form>
