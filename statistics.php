<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script src="../jquery.min.js"></script>
<link rel="stylesheet" href="../css/nav.css" />

<link rel="stylesheet" href="../css/nav1.css" />

</head>

<body bgcolor="#CCCCCC">
<?php require("../dbconn.php");
?>
<div class="center" align="center"><nav> 
	<ul>
		<li><a href="statistics.php">ReLoad</a></li>
		<li><a href="stat.php">Print Topsheet</a>
			
		</li>
        <li><a href="sub9.php">Subject Statistics</a>
			
		</li>
		<li><a href="stat_mils.php">Topsheet/Mils/Sixth</a>
            </li>
        <li><a>Class-X</a>
           </li>
        <li><a>Class-XI</a></li>
       <li><a>Class-XI</a>        
                </li>
                
			</ul>
        </li>
       
	</ul>
</nav></div>
<div class="table1">
</div>
<div id="ff" class="table2"></div>

<script type="text/javascript">
function changestat()
{
	 $(document).ready(function() {
//alert('Document is ready');
                $('#datt').change(function() {
                    var sel = $(this).val();
//alert('You picked: ' + sel);
                    $.ajax({
                        type: "POST",
                        url: "alter.php", // "another_php_file.php",
                        data: 'theOption=' + sel,
                        success: function(data) {
//alert('Server-side response: ' + data);
                            $('#ff').html(data);
                            
                        }
                    });
                });
            });
	}
	
	

</script>
</body>
</html>