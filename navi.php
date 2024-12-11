<?php
	include "model/var.php";
?>
<html>
	<head>
		<meta name="author" content="Kai Oswald Seidler, Kay Vogelgesang, Carsten Wiedmann">
		<link href="css/xampp.css" rel="stylesheet" type="text/css">
		<script language="JavaScript" type="text/javascript" src="js/xampp.js"></script>
		<title></title>
	</head>

	<body class="n">
		<table border="0" cellpadding="0" cellspacing="0">
			<tr valign="top">
				<td align="right" class="navi">
					<img src="img/blank.gif" alt="" width="145" height="15"><br>
					<span class="nh">&nbsp;NBSE:v1.2
          </span><br>
          <br> <br>
				</td>
			</tr>
			<tr>
				<td height="1" bgcolor="#fb7922" colspan="1" style="background-image:../xampp/url(img/strichel.gif)" class="white"></td>
			</tr>
			<tr valign="top">
				<td height="75" align="right" class="navi">
					<a name="start" id="start" class="nh" target="content" onclick="h(this);" href="main.php"><?php echo $TEXT[0]; ?></a><br>
					<a class="n" target="content" onclick="h(this);" href="topsheet_interface.php"><?php print $TEXT[1]; ?></a><br>
                  <!--  <a class="n" target="content" onclick="h(this);" href="stat1.php"><?php print $TEXT['navi-topsheet1']; ?></a><br> -->
					<a class="n" target="content" onclick="h(this);" href="forwarding_interface.php"><?php echo $TEXT['2']; ?></a><br>
				<!--	<a class="n" target="content" onclick="h(this);" href="sub91.php"><?php echo $TEXT['navi-subject1']; ?></a><br> -->
					<a class="n" target="content" onclick="h(this);" href="envelope2con.php"><?php echo $TEXT['3']; ?></a><br>
					<a class="n" target="content" onclick="h(this);" href="envelope.php"><?php echo $TEXT['4']; ?></a><br>
					
					
					  </td>
			</tr>
			<tr>
				<td height="75" align="right" class="navi">
				<a class="n"   href="#"><?php echo "******************"; ?></a><br>
					<a class="n" target="content" onclick="h(this);" href="timetable.php"><?php echo "Time Table(9)"; ?></a><br>
					<a class="n" target="content" onclick="h(this);" href="editPkChrt.php"><?php echo "Edit Chart_table"; ?></a><br>
					<a class="n" target="content" onclick="h(this);" href="importc9data.php"><?php echo "Import data(9)"; ?></a><br>
					<a class="n"   href="#"><?php echo "******************"; ?></a>
				</td>
			</tr>
			<tr>
				<td height="75" align="right" class="navi">
				<a class="n" target="content" onclick="h(this);" href="timetable10.php"><?php echo "Time Table(10)"; ?></a><br>
				<a class="n" target="content" onclick="h(this);" href="editPkChrt10.php"><?php echo "Edit Chart_table(10)"; ?></a><br>
				<a class="n" target="content" onclick="h(this);" href="importc10data.php"><?php echo "Import_data(10)"; ?></a><br>
				<a class="n"   href="#"><?php echo "******************"; ?></a><br>
				<a class="n" target="content" onclick="h(this);" href="timetable11a.php"><?php echo "Time Table(11A)"; ?></a><br>
				<a class="n" target="content" onclick="h(this);" href="editPkChrt11a.php"><?php echo "Edit Chart_table(11A)"; ?></a><br>
				<a class="n" target="content" onclick="h(this);" href="importc11adata.php"><?php echo "Import_data(11A)"; ?></a><br>
				</td>
			</tr>
			<tr>
				<td height="75" align="right" class="navi">
				<a class="n" target="content" onclick="h(this);" href="timetable11c.php"><?php echo "Time Table(11C)"; ?></a><br>
				<a class="n" target="content" onclick="h(this);" href="editPkChrt11c.php"><?php echo "Edit Chart_table(11C)"; ?></a><br>
				<a class="n" target="content" onclick="h(this);" href="importc11cdata.php"><?php echo "Import_data(11C)"; ?></a><br>
				</td>
			</tr>
			<tr>
				<td height="75" align="right" class="navi">
				<a class="n" target="content" onclick="h(this);" href="timetable11s.php"><?php echo "Time Table(11S)"; ?></a><br>
				<a class="n" target="content" onclick="h(this);" href="editPkChrt11s.php"><?php echo "Edit Chart_table(11S)"; ?></a><br>
				<a class="n" target="content" onclick="h(this);" href="importc11sdata.php"><?php echo "Import_data(11S)"; ?></a><br>
				<a class="n"   href="#"><?php echo "******************"; ?></a>
				</td>
			</tr>
			<tr>
				<td height="75" align="right" class="navi">
				<a class="n"   href="#"><?php echo "******************"; ?></a><br>
				<a class="n" target="content" onclick="h(this);" href="timetable12a.php"><?php echo "Time Table(12A)"; ?></a><br>
				<a class="n" target="content" onclick="h(this);" href="editPkChrt12a.php"><?php echo "Edit Chart_table(12A)"; ?></a><br>
				<a class="n" target="content" onclick="h(this);" href="importc12adata.php"><?php echo "Import_data(12A)"; ?></a><br>
				</td>
			</tr>


			<tr>
				<td height="75" align="right" class="navi">
				<a class="n" target="content" onclick="h(this);" href="timetable12c.php"><?php echo "Time Table(12C)"; ?></a><br>
				<a class="n" target="content" onclick="h(this);" href="editPkChrt12c.php"><?php echo "Edit Chart_table(12C)"; ?></a><br>
				<a class="n" target="content" onclick="h(this);" href="importc12cdata.php"><?php echo "Import_data(12C)"; ?></a><br>
				</td>
			</tr>

			<tr>
				<td height="75" align="right" class="navi">
				<a class="n" target="content" onclick="h(this);" href="timetable12s.php"><?php echo "Time Table(12S)"; ?></a><br>
				<a class="n" target="content" onclick="h(this);" href="editPkChrt12s.php"><?php echo "Edit Chart_table(12S)"; ?></a><br>
				<a class="n" target="content" onclick="h(this);" href="importc12sdata.php"><?php echo "Import_data(12S)"; ?></a><br>
				<a class="n"   href="#"><?php echo "******************"; ?></a>
				</td>
			</tr>

			
			<tr>
				<td height="75" align="right" class="navi">
					<a class="n"   href="#"><?php echo "******************"; ?></a>
				<a class="n" target="content" onclick="h(this);" href="notification.php"><?php echo "Notification Numbers"; ?></a>
				<a class="n" target="content" onclick="h(this);" href="exam_timing.php"><?php echo "Exam Timings"; ?></a>
				<a class="n"   href="#"><?php echo "******************"; ?></a><br>
				</td>
				
			</tr>

			<tr>
				<td height="75" align="right" class="navi">
					<a class="n"   href="#"><?php echo "******************"; ?></a>
				<a class="n" target="content" onclick="h(this);" href="testforwarding.php"><?php echo "testing"; ?></a>
				
				<a class="n"   href="#"><?php echo "******************"; ?></a><br>
				</td>
			</tr>
				  			
			<tr valign="top">
				<td align="right" class="navi"><br>
<p class=navi>&copy;2015-<?php echo date("Y"); ?><br>


			  </td>
			</tr>
		</table>
	</body>
</html>
