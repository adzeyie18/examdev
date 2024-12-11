<link rel="stylesheet" href="css/bootstrap.min.css">
<?php
	require("dbconn.php");
	?>

	<form action="saveTime12s.php" method="post" enctype="multipart/form-data">
	<?php 

		$sql =	mysql_query("select * from c12s_timetbl where sl=1");
		$row = mysql_fetch_array($sql);
		
	?>
	<div class="container">
	<div class="panel panel-default">
	<div class="panel-heading">
	<p><B></B></p>
	
	</div></div>
	<div class="panel-body">
	<div style="font-size: 30px;font-weight: bold;font-style: italic;color: blue">HSSLC(Science)</div>
	<input style="text-align: center;" type="text" name="" value="SLNO" size="1" disabled="disabled"><input type="text" name="" value="EXAM_DATE" disabled="disabled"><input type="text" name="" value="DAY" disabled="disabled"><input type="text" name="" value="SUBJECT"  disabled="disabled"><input type="text" name="" value="SCOD" size="2" disabled="disabled"><BR />
	<input style="text-align: center;" type="text" name="sl1" value="<?php echo $row['sl'];?>" size="1" disabled="disabled"><input type="text" name="e_date1" value="<?php echo $row['e_date'];?>"><input type="text" name="day1" value="<?php echo $row['day']; ?>" ><input type="text" name="subject1" value="<?php echo $row['subject'];?>"><input type="text" name="sub1" value="<?php echo $row['subcode'];?>" size="2"><BR />
	

	<?php 

		$sql =	mysql_query("select * from c12s_timetbl where sl=2");
		$row = mysql_fetch_array($sql);
		
	?>
	
	<input style="text-align: center;" type="text" name="sl2" value="<?php echo $row['sl'];?>" size="1" disabled="disabled"><input type="text" name="e_date2" value="<?php echo $row['e_date'];?>"><input type="text" name="day2" value="<?php echo $row['day']; ?>" ><input type="text" name="subject2" value="<?php echo $row['subject'];?>"><input type="text" name="sub2" value="<?php echo $row['subcode'];?>" size="2"><BR />
	<?php 

		$sql =	mysql_query("select * from c12s_timetbl where sl=3");
		$row = mysql_fetch_array($sql);
		
	?>
	
	<input style="text-align: center;" type="text" name="sl3" value="<?php echo $row['sl'];?>" size="1" disabled="disabled"><input type="text" name="e_date3" value="<?php echo $row['e_date'];?>"><input type="text" name="day3" value="<?php echo $row['day']; ?>" ><input type="text" name="subject3" value="<?php echo $row['subject'];?>"><input type="text" name="sub3" value="<?php echo $row['subcode'];?>" size="2"><BR />

	<?php 

		$sql =	mysql_query("select * from c12s_timetbl where sl=4");
		$row = mysql_fetch_array($sql);
		
	?>
	
	<input style="text-align: center;" type="text" name="sl4" value="<?php echo $row['sl'];?>" size="1" disabled="disabled"><input type="text" name="e_date4" value="<?php echo $row['e_date'];?>"><input type="text" name="day4" value="<?php echo $row['day']; ?>" ><input type="text" name="subject4" value="<?php echo $row['subject'];?>"><input type="text" name="sub4" value="<?php echo $row['subcode'];?>" size="2"><BR />

	<?php 

		$sql =	mysql_query("select * from c12s_timetbl where sl=5");
		$row = mysql_fetch_array($sql);
		
	?>
	
	<input style="text-align: center;" type="text" name="sl5" value="<?php echo $row['sl'];?>" size="1" disabled="disabled"><input type="text" name="e_date5" value="<?php echo $row['e_date'];?>"><input type="text" name="day5" value="<?php echo $row['day']; ?>" ><input type="text" name="subject5" value="<?php echo $row['subject'];?>"><input type="text" name="sub5" value="<?php echo $row['subcode'];?>" size="2"><BR />

	<?php 

		$sql =	mysql_query("select * from c12s_timetbl where sl=6");
		$row = mysql_fetch_array($sql);
		
	?>
	
	<input style="text-align: center;" type="text" name="sl6" value="<?php echo $row['sl'];?>" size="1" disabled="disabled"><input type="text" name="e_date6" value="<?php echo $row['e_date'];?>"><input type="text" name="day6" value="<?php echo $row['day']; ?>" ><input type="text" name="subject6" value="<?php echo $row['subject'];?>"><input type="text" name="sub6" value="<?php echo $row['subcode'];?>" size="2"><BR />

	<?php 

		$sql =	mysql_query("select * from c12s_timetbl where sl=7");
		$row = mysql_fetch_array($sql);
		
	?>
	
	<input style="text-align: center;" type="text" name="sl7" value="<?php echo $row['sl'];?>" size="1" disabled="disabled"><input type="text" name="e_date7" value="<?php echo $row['e_date'];?>"><input type="text" name="day7" value="<?php echo $row['day']; ?>" ><input type="text" name="subject7" value="<?php echo $row['subject'];?>"><input type="text" name="sub7" value="<?php echo $row['subcode'];?>" size="2"><BR />

	<?php 

		$sql =	mysql_query("select * from c12s_timetbl where sl=8");
		$row = mysql_fetch_array($sql);
		
	?>
	
	<input style="text-align: center;" type="text" name="sl8" value="<?php echo $row['sl'];?>" size="1" disabled="disabled"><input type="text" name="e_date8" value="<?php echo $row['e_date'];?>"><input type="text" name="day8" value="<?php echo $row['day']; ?>" ><input type="text" name="subject8" value="<?php echo $row['subject'];?>"><input type="text" name="sub8" value="<?php echo $row['subcode'];?>" size="2"><BR />

	<?php 

		$sql =	mysql_query("select * from c12s_timetbl where sl=9");
		$row = mysql_fetch_array($sql);
		
	?>
	
	<input style="text-align: center;" type="text" name="sl9" value="<?php echo $row['sl'];?>" size="1" disabled="disabled"><input type="text" name="e_date9" value="<?php echo $row['e_date'];?>"><input type="text" name="day9" value="<?php echo $row['day']; ?>" ><input type="text" name="subject9" value="<?php echo $row['subject'];?>"><input type="text" name="sub9" value="<?php echo $row['subcode'];?>" size="2"><BR />

	<?php 

		$sql =	mysql_query("select * from c12s_timetbl where sl=10");
		$row = mysql_fetch_array($sql);
		
	?>
	
	<input style="text-align: center;" type="text" name="sl10" value="<?php echo $row['sl'];?>" size="1" disabled="disabled"><input type="text" name="e_date10" value="<?php echo $row['e_date'];?>"><input type="text" name="day10" value="<?php echo $row['day']; ?>" ><input type="text" name="subject10" value="<?php echo $row['subject'];?>"><input type="text" name="sub10" value="<?php echo $row['subcode'];?>" size="2"><BR />

	<?php 

		$sql =	mysql_query("select * from c12s_timetbl where sl=11");
		$row = mysql_fetch_array($sql);
		
	?>
	
	<input style="text-align: center;" type="text" name="sl11" value="<?php echo $row['sl'];?>" size="1" disabled="disabled"><input type="text" name="e_date11" value="<?php echo $row['e_date'];?>"><input type="text" name="day11" value="<?php echo $row['day']; ?>" ><input type="text" name="subject11" value="<?php echo $row['subject'];?>"><input type="text" name="sub11" value="<?php echo $row['subcode'];?>" size="2"><BR />

<?php 

		$sql =	mysql_query("select * from c12s_timetbl where sl=12");
		$row = mysql_fetch_array($sql);
		
	?>
	
	<input style="text-align: center;" type="text" name="sl12" value="<?php echo $row['sl'];?>" size="1" disabled="disabled"><input type="text" name="e_date12" value="<?php echo $row['e_date'];?>"><input type="text" name="day12" value="<?php echo $row['day']; ?>" ><input type="text" name="subject12" value="<?php echo $row['subject'];?>"><input type="text" name="sub12" value="<?php echo $row['subcode'];?>" size="2"><BR />

<?php 

		$sql =	mysql_query("select * from c12s_timetbl where sl=13");
		$row = mysql_fetch_array($sql);
		
	?>
	
	<input style="text-align: center;" type="text" name="sl13" value="<?php echo $row['sl'];?>" size="1" disabled="disabled"><input type="text" name="e_date13" value="<?php echo $row['e_date'];?>"><input type="text" name="day13" value="<?php echo $row['day']; ?>" ><input type="text" name="subject13" value="<?php echo $row['subject'];?>"><input type="text" name="sub13" value="<?php echo $row['subcode'];?>" size="2"><BR />

<?php 

		$sql =	mysql_query("select * from c12s_timetbl where sl=14");
		$row = mysql_fetch_array($sql);
		
	?>
	
	<input style="text-align: center;" type="text" name="sl14" value="<?php echo $row['sl'];?>" size="1" disabled="disabled"><input type="text" name="e_date14" value="<?php echo $row['e_date'];?>"><input type="text" name="day14" value="<?php echo $row['day']; ?>" ><input type="text" name="subject14" value="<?php echo $row['subject'];?>"><input type="text" name="sub14" value="<?php echo $row['subcode'];?>" size="2"><BR />

	<input type="submit" class="btn btn-primary" name="submit" value="Save">
	</div></div>

	</form>
