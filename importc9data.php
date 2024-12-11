<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript">
  header('Content-Type: text/html; charset=ISO-8859-1');
  function clearData()
  {
   // var val = prompt("Enter Y to delete:","");
   // if(val=='Y'||'y')
   
    
    $(document).ready(function() {
//alert('Document is ready');
                $('#cls').click(function() {
                    var sel = $(this).val();
                    if (confirm("Are You Sure to DELETE?"))
                    {
//alert('You picked: ' + sel);
                    $.ajax({
                        type: "POST",
                        url: "clearData9.php", // "another_php_file.php",
                        data: 'theOption=' + sel,
                       success: function(data) {
//alert('Server-side response: ' + data);
                            $('#ss').html(data);
                            
                        }
                    });
                  }
                });
            });
  
  
}
</script>

<?php
//load the database configuration file
include 'dbconn.php';
header('Content-Type: text/html; charset=ISO-8859-1');

if(!empty($_GET['status'])){
    switch($_GET['status']){
        case 'succ':
            $statusMsgClass = 'alert-success';
            $statusMsg = 'Members data has been inserted successfully.';
            break;
        case 'err':
            $statusMsgClass = 'alert-danger';
            $statusMsg = 'Some problem occurred, please try again.';
            break;
        case 'invalid_file':
            $statusMsgClass = 'alert-danger';
            $statusMsg = 'Please upload a valid CSV file.';
            break;
        default:
            $statusMsgClass = '';
            $statusMsg = '';
    }
}
?>
<div >
    <?php if(!empty($statusMsg)){
        echo '<div class="alert '.$statusMsgClass.'">'.$statusMsg.'</div>';
    } ?>
    <div class="panel">
        <div class="panel-heading">
            
            <a href="javascript:void(0);" onclick="$('#importFrm').slideToggle();"></a>
            
            <input type="button" class="btn btn-primary" name="val" value="Clear Data" id="cls" onfocus="clearData()" >
            
        </div>
        
        
        <div class="panel-body">
            <form action="importData.php" method="post" enctype="multipart/form-data" id="importFrm">
                <input type="file" class="btn btn-primary" name="file" />
                <input type="submit" class="btn btn-primary" name="importSubmit" value="IMPORT">

            </form>
            <table class="table table-bordered">
                <thead>
                    <tr>
                    <th>SLNO</th>
                      <th>DISTRICT</th>
                      <th>SCHOOL</th>
                      <th>MAIN</th>
                      <th>TNY</th>
                      <th>SMI</th>
                      <th>BNG</th>
                      <th>ALT</th>
                      <th>AON</th>
                      <th>LTA</th>
                      <th>HND</th>
                      <th>FIT</th>
                      <th>HS</th>
                      <th>BK</th>
                      <th>MS</th>
                      <th>EE</th>
                      <th>IV</th>
                      <th>TT</th>
                      <th>HV</th>
                      <th>RV</th>
                      <th>EV</th>
                      <th>BV</th>
                      <th>MV</th>
                      <th>AV</th>
                    </tr>
                </thead>
                <tbody id="ss">
                <?php
                    //get records from database
                    $query =mysql_query("SELECT * FROM c9_pkChrt_16");
                    while($row = mysql_fetch_array($query)){ ?>
                    <tr>
                    <td><?php echo $row['sl']; ?></td>
                      <td><?php echo $row['district']; ?></td>
                      <td><?php echo $row['school']; ?></td>
                      <td><?php echo $row['main']; ?></td>
                      <td><?php echo $row['tny']; ?></td>
                      <td><?php echo $row['smi']; ?></td>
                      <td><?php echo $row['bng']; ?></td>
                      <td><?php echo $row['alt']; ?></td>
                      <td><?php echo $row['aon']; ?></td>
                      <td><?php echo $row['lta']; ?></td>
                      <td><?php echo $row['hnd']; ?></td>
                      <td><?php echo $row['fit']; ?></td>
                      <td><?php echo $row['hs']; ?></td>
                      <td><?php echo $row['bk']; ?></td>
                      <td><?php echo $row['ms']; ?></td>
                      <td><?php echo $row['ee']; ?></td>
                      <td><?php echo $row['iv']; ?></td>
                      <td><?php echo $row['tt']; ?></td>
                      <td><?php echo $row['hc']; ?></td>
                      <td><?php echo $row['rt']; ?></td>
                      <td><?php echo $row['et']; ?></td>
                      <td><?php echo $row['bw']; ?></td>
                      <td><?php echo $row['mc']; ?></td>
                      <td><?php echo $row['av']; ?></td>
                    </tr>
                    <?php }?>
                  
                </tbody>
            </table>
        </div>
    </div>
</div>