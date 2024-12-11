<link rel="stylesheet" href="css/bootstrap.min.css">
<?php
	require("dbconn.php");
	?>

	<form action="saveTime11a.php" method="post" enctype="multipart/form-data">
	<?php 

		$sql =	mysql_query("select * from c11a_timetbl where sl=1");
		$row = mysql_fetch_array($sql);
		
	?>
	<div class="container">
	<div class="panel panel-default">
	<div class="panel-heading">
	<p><B>REMEMBER:</B></p>
	<p>*SUBJECT NAME SHOULD BE ENTERED EXACTLY AS BELOW:<BR>
	*English,Education,Psychology,Geography,Mils,Environmental Education,Music,History,Economics,Sociology,Political Science,Philosophy,Computer Science, Informatics Practices, Information Technology, Travel & Tourism<BR>
	*EXAM dates should be entered in ascending order</p>
	</div></div>
	<div class="panel-body">
	<div style="font-size: 30px;font-weight: bold;font-style: italic;color: blue">CLASS-XI(Arts)</div>
<input style="text-align: center;" type="text" name="" value="SLNO" size="1" disabled="disabled"><input type="text" name="" value="EXAM_DATE" disabled="disabled"><input type="text" name="" value="DAY" disabled="disabled"><input type="text" name="" value="SUBJECT" size="50" disabled="disabled"><input type="text" name="" value="SCOD" size="2" disabled="disabled"><BR />

	<input style="text-align: center;" type="text" name="sl1" value="<?php echo $row['sl'];?>" size="1" disabled="disabled"><input type="text" name="e_date1" value="<?php echo $row['e_date'];?>"><input type="text" name="day1" value="<?php echo $row['day']; ?>" ><input type="text" name="subject1" value="<?php echo $row['subject'];?>" size="50"><input type="text" name="sub1" value="<?php echo $row['subcode'];?>" size="2"><BR />
	

	<?php 

		$sql =	mysql_query("select * from c11a_timetbl where sl=2");
		$row = mysql_fetch_array($sql);
		
	?>
	
	<input style="text-align: center;" type="text" name="sl2" value="<?php echo $row['sl'];?>" size="1" disabled="disabled"><input type="text" name="e_date2" value="<?php echo $row['e_date'];?>"><input type="text" name="day2" value="<?php echo $row['day']; ?>" ><input type="text" name="subject2" value="<?php echo $row['subject'];?>" size="50"><input type="text" name="sub2" value="<?php echo $row['subcode'];?>" size="2"><BR />
	<?php 

		$sql =	mysql_query("select * from c11a_timetbl where sl=3");
		$row = mysql_fetch_array($sql);
		
	?>
	
	<input style="text-align: center;" type="text" name="sl3" value="<?php echo $row['sl'];?>" size="1" disabled="disabled"><input type="text" name="e_date3" value="<?php echo $row['e_date'];?>"><input type="text" name="day3" value="<?php echo $row['day']; ?>" ><input type="text" name="subject3" value="<?php echo $row['subject'];?>" size="50"><input type="text" name="sub3" value="<?php echo $row['subcode'];?>" size="2"><BR />

	<?php 

		$sql =	mysql_query("select * from c11a_timetbl where sl=4");
		$row = mysql_fetch_array($sql);
		
	?>
	
	<input style="text-align: center;" type="text" name="sl4" value="<?php echo $row['sl'];?>" size="1" disabled="disabled"><input type="text" name="e_date4" value="<?php echo $row['e_date'];?>"><input type="text" name="day4" value="<?php echo $row['day']; ?>" ><input type="text" name="subject4" value="<?php echo $row['subject'];?>" size="50"><input type="text" name="sub4" value="<?php echo $row['subcode'];?>" size="2"><BR />

	<?php 

		$sql =	mysql_query("select * from c11a_timetbl where sl=5");
		$row = mysql_fetch_array($sql);
		
	?>
	
	<input style="text-align: center;" type="text" name="sl5" value="<?php echo $row['sl'];?>" size="1" disabled="disabled"><input type="text" name="e_date5" value="<?php echo $row['e_date'];?>"><input type="text" name="day5" value="<?php echo $row['day']; ?>" ><input type="text" name="subject5" value="<?php echo $row['subject'];?>" size="50"><input type="text" name="sub5" value="<?php echo $row['subcode'];?>" size="2"><BR />

	<?php 

		$sql =	mysql_query("select * from c11a_timetbl where sl=6");
		$row = mysql_fetch_array($sql);
		
	?>
	
	<input style="text-align: center;" type="text" name="sl6" value="<?php echo $row['sl'];?>" size="1" disabled="disabled"><input type="text" name="e_date6" value="<?php echo $row['e_date'];?>"><input type="text" name="day6" value="<?php echo $row['day']; ?>" ><input type="text" name="subject6" value="<?php echo $row['subject'];?>" size="50"><input type="text" name="sub6" value="<?php echo $row['subcode'];?>" size="2"><BR />

	<?php 

		$sql =	mysql_query("select * from c11a_timetbl where sl=7");
		$row = mysql_fetch_array($sql);
		
	?>
	
	<input style="text-align: center;" type="text" name="sl7" value="<?php echo $row['sl'];?>" size="1" disabled="disabled"><input type="text" name="e_date7" value="<?php echo $row['e_date'];?>"><input type="text" name="day7" value="<?php echo $row['day']; ?>" ><input type="text" name="subject7" value="<?php echo $row['subject'];?>" size="50"><input type="text" name="sub7" value="<?php echo $row['subcode'];?>" size="2"><BR />

	<?php 

		$sql =	mysql_query("select * from c11a_timetbl where sl=8");
		$row = mysql_fetch_array($sql);
		
	?>
	
	<input style="text-align: center;" type="text" name="sl8" value="<?php echo $row['sl'];?>" size="1" disabled="disabled"><input type="text" name="e_date8" value="<?php echo $row['e_date'];?>"><input type="text" name="day8" value="<?php echo $row['day']; ?>" ><input type="text" name="subject8" value="<?php echo $row['subject'];?>" size="50"><input type="text" name="sub8" value="<?php echo $row['subcode'];?>" size="2"><BR />

	<?php 

		$sql =	mysql_query("select * from c11a_timetbl where sl=9");
		$row = mysql_fetch_array($sql);
		
	?>
	
	<input style="text-align: center;" type="text" name="sl9" value="<?php echo $row['sl'];?>" size="1" disabled="disabled"><input type="text" name="e_date9" value="<?php echo $row['e_date'];?>"><input type="text" name="day9" value="<?php echo $row['day']; ?>" ><input type="text" name="subject9" value="<?php echo $row['subject'];?>" size="50"><input type="text" name="sub9" value="<?php echo $row['subcode'];?>" size="2"><BR />

	<?php 

		$sql =	mysql_query("select * from c11a_timetbl where sl=10");
		$row = mysql_fetch_array($sql);
		
	?>
	
	<input style="text-align: center;" type="text" name="sl10" value="<?php echo $row['sl'];?>" size="1" disabled="disabled"><input type="text" name="e_date10" value="<?php echo $row['e_date'];?>"><input type="text" name="day10" value="<?php echo $row['day']; ?>" ><input type="text" name="subject10" value="<?php echo $row['subject'];?>" size="50"><input type="text" name="sub10" value="<?php echo $row['subcode'];?>" size="2"><BR />

	<?php 

		$sql =	mysql_query("select * from c11a_timetbl where sl=11");
		$row = mysql_fetch_array($sql);
		
	?>
	
	<input style="text-align: center;" type="text" name="sl11" value="<?php echo $row['sl'];?>" size="1" disabled="disabled"><input type="text" name="e_date11" value="<?php echo $row['e_date'];?>"><input type="text" name="day11" value="<?php echo $row['day']; ?>" ><input type="text" name="subject11" value="<?php echo $row['subject'];?>" size="50"><input type="text" name="sub11" value="<?php echo $row['subcode'];?>" size="2"><BR />

	<?php 

		$sql =	mysql_query("select * from c11a_timetbl where sl=12");
		$row = mysql_fetch_array($sql);
		
	?>
	
	<input style="text-align: center;" type="text" name="sl12" value="<?php echo $row['sl'];?>" size="1" disabled="disabled"><input type="text" name="e_date12" value="<?php echo $row['e_date'];?>"><input type="text" name="day12" value="<?php echo $row['day']; ?>" ><input type="text" name="subject12" value="<?php echo $row['subject'];?>" size="50"><input type="text" name="sub12" value="<?php echo $row['subcode'];?>" size="2"><BR />

	<?php 

		$sql =	mysql_query("select * from c11a_timetbl where sl=13");
		$row = mysql_fetch_array($sql);
		
	?>
	
	<input style="text-align: center;" type="text" name="sl13" value="<?php echo $row['sl'];?>" size="1" disabled="disabled"><input type="text" name="e_date13" value="<?php echo $row['e_date'];?>"><input type="text" name="day13" value="<?php echo $row['day']; ?>" ><input type="text" name="subject13" value="<?php echo $row['subject'];?>" size="50"><input type="text" name="sub13" value="<?php echo $row['subcode'];?>" size="2"><BR />

	<?php 

		$sql =	mysql_query("select * from c11a_timetbl where sl=14");
		$row = mysql_fetch_array($sql);
		
	?>
	
	<input style="text-align: center;" type="text" name="sl14" value="<?php echo $row['sl'];?>" size="1" disabled="disabled"><input type="text" name="e_date14" value="<?php echo $row['e_date'];?>"><input type="text" name="day14" value="<?php echo $row['day']; ?>" ><input type="text" name="subject14" value="<?php echo $row['subject'];?>"  size="50"><input type="text" name="sub14" value="<?php echo $row['subcode'];?>" size="2"><BR />

	<?php 

		$sql =	mysql_query("select * from c11a_timetbl where sl=15");
		$row = mysql_fetch_array($sql);
		
	?>
	
	<input style="text-align: center;" type="text" name="sl15" value="<?php echo $row['sl'];?>" size="1" disabled="disabled"><input type="text" name="e_date15" value="<?php echo $row['e_date'];?>"><input type="text" name="day15" value="<?php echo $row['day']; ?>" ><input type="text" name="subject15" value="<?php echo $row['subject'];?>"  size="50"><input type="text" name="sub15" value="<?php echo $row['subcode'];?>" size="2"><BR />

	<?php 

		$sql =	mysql_query("select * from c11a_timetbl where sl=16");
		$row = mysql_fetch_array($sql);
		
	?>
	
	<input style="text-align: center;" type="text" name="sl16" value="<?php echo $row['sl'];?>" size="1" disabled="disabled"><input type="text" name="e_date16" value="<?php echo $row['e_date'];?>"><input type="text" name="day16" value="<?php echo $row['day']; ?>" ><input type="text" name="subject16" value="<?php echo $row['subject'];?>"  size="50"><input type="text" name="sub16" value="<?php echo $row['subcode'];?>" size="2"><BR />

	<?php 

		$sql =	mysql_query("select * from c11a_timetbl where sl=17");
		$row = mysql_fetch_array($sql);
		
	?>
	
	<input style="text-align: center;" type="text" name="sl17" value="<?php echo $row['sl'];?>" size="1" disabled="disabled"><input type="text" name="e_date17" value="<?php echo $row['e_date'];?>"><input type="text" name="day17" value="<?php echo $row['day']; ?>" ><input type="text" name="subject17" value="<?php echo $row['subject'];?>"  size="50"><input type="text" name="sub17" value="<?php echo $row['subcode'];?>" size="2"><BR />
	<?php 

		$sql =	mysql_query("select * from c11a_timetbl where sl=18");
		$row = mysql_fetch_array($sql);
		
	?>
	
	<input style="text-align: center;" type="text" name="sl18" value="<?php echo $row['sl'];?>" size="1" disabled="disabled"><input type="text" name="e_date18" value="<?php echo $row['e_date'];?>"><input type="text" name="day18" value="<?php echo $row['day']; ?>" ><input type="text" name="subject18" value="<?php echo $row['subject'];?>"  size="50"><input type="text" name="sub18" value="<?php echo $row['subcode'];?>" size="2"><BR />
	<?php 

		$sql =	mysql_query("select * from c11a_timetbl where sl=19");
		$row = mysql_fetch_array($sql);
		
	?>
	
	<input style="text-align: center;" type="text" name="sl19" value="<?php echo $row['sl'];?>" size="1" disabled="disabled"><input type="text" name="e_date19" value="<?php echo $row['e_date'];?>"><input type="text" name="day19" value="<?php echo $row['day']; ?>" ><input type="text" name="subject19" value="<?php echo $row['subject'];?>"  size="50"><input type="text" name="sub19" value="<?php echo $row['subcode'];?>" size="2"><BR />
	<?php 

		$sql =	mysql_query("select * from c11a_timetbl where sl=20");
		$row = mysql_fetch_array($sql);
		
	?>
	
	<input style="text-align: center;" type="text" name="sl20" value="<?php echo $row['sl'];?>" size="1" disabled="disabled"><input type="text" name="e_date20" value="<?php echo $row['e_date'];?>"><input type="text" name="day20" value="<?php echo $row['day']; ?>" ><input type="text" name="subject20" value="<?php echo $row['subject'];?>"  size="50"><input type="text" name="sub20" value="<?php echo $row['subcode'];?>" size="2"><BR />
	<?php 

		$sql =	mysql_query("select * from c11a_timetbl where sl=21");
		$row = mysql_fetch_array($sql);
		
	?>
	
	<input style="text-align: center;" type="text" name="sl21" value="<?php echo $row['sl'];?>" size="1" disabled="disabled"><input type="text" name="e_date21" value="<?php echo $row['e_date'];?>"><input type="text" name="day21" value="<?php echo $row['day']; ?>" ><input type="text" name="subject21" value="<?php echo $row['subject'];?>"  size="50"><input type="text" name="sub21" value="<?php echo $row['subcode'];?>" size="2"><BR />
	<?php 

		$sql =	mysql_query("select * from c11a_timetbl where sl=22");
		$row = mysql_fetch_array($sql);
		
	?>
	
	<input style="text-align: center;" type="text" name="sl22" value="<?php echo $row['sl'];?>" size="1" disabled="disabled"><input type="text" name="e_date22" value="<?php echo $row['e_date'];?>"><input type="text" name="day22" value="<?php echo $row['day']; ?>" ><input type="text" name="subject22" value="<?php echo $row['subject'];?>"  size="50"><input type="text" name="sub22" value="<?php echo $row['subcode'];?>" size="2"><BR />
	

	<input type="submit" class="btn btn-primary" name="submit" value="Save">
	</div></div>

	</form>
