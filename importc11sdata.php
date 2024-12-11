<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript">
  function clearData()
  {
    $(document).ready(function() {
//alert('Document is ready');
                $('#cls').click(function() {
                    var sel = $(this).val();
                    if (confirm("Are You Sure to DELETE?"))
                    {
//alert('You picked: ' + sel);
                    $.ajax({
                        type: "POST",
                        url: "clearData11s.php", // "another_php_file.php",
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
 <input type="button" class="btn btn-primary" name="val" value="Clear Data" id="cls" onfocus="clearData()"> 
  </div>
        <div class="panel-body">
            <form action="importData11s.php" method="post" enctype="multipart/form-data" id="importFrm">
                <input type="file" class="btn btn-primary" name="file" />
                <input type="submit" class="btn btn-primary" name="importSubmit" value="IMPORT">
            </form>
            <table class="table table-bordered">
                <thead>
                    <tr>
                    <th>SLNO</th>
                      <th>DISTRICT</th>
                      <th>Centre</th>
                      <th>ENG</th>
                      <th>PHY</th>
                      <th>CHE</th>
                      <th>BIO</th>
                      <th>MAT</th>
                      <th>EVS</th>
                      <th>CSC</th>
                      <th>INF</th>
                      <th>ITV</th>
                      <th>TTV</th>
                      <th>ALT</th>
                      <th>HND</th>
                      <th>BNG</th>
                      <th>TNY</th>
                      <th>SMI</th>
                      <th>AON</th>
                      <th>LTA</th>
                      <th>RTV</th>
                      <th>HCV</th>
                      <th>EHV</th>
                      <th>BTV</th>
                      <th>MSV</th>
                      </tr>
                </thead>
                <tbody id="ss">
                <?php
                    //get records from database
                    $query =mysql_query("SELECT * FROM c11s_pkChrt");
                    while($row = mysql_fetch_array($query)){ ?>
                    <tr>
                    <td><?php echo $row['sl']; ?></td>
                      <td><?php echo $row['district']; ?></td>
                      <td><?php echo $row['centre']; ?></td>
                      <td><?php echo $row['eng']; ?></td>
                      <td><?php echo $row['phy']; ?></td>
                      <td><?php echo $row['che']; ?></td>
                      <td><?php echo $row['bio']; ?></td>
                      <td><?php echo $row['mat']; ?></td>
                      <td><?php echo $row['evs']; ?></td>
                      <td><?php echo $row['csc']; ?></td>
                      <td><?php echo $row['inf']; ?></td>
                      <td><?php echo $row['itv']; ?></td>
                      <td><?php echo $row['ttv']; ?></td>
                      <td><?php echo $row['alt']; ?></td>
                      <td><?php echo $row['hnd']; ?></td>
                      <td><?php echo $row['bng']; ?></td>
                      <td><?php echo $row['tny']; ?></td>
                      <td><?php echo $row['smi']; ?></td>
                      <td><?php echo $row['aon']; ?></td>
                      <td><?php echo $row['lta']; ?></td>
                      <td><?php echo $row['rtv']; ?></td>
                      <td><?php echo $row['hcv']; ?></td>
                      <td><?php echo $row['ehv']; ?></td>
                      <td><?php echo $row['btv']; ?></td>
                      <td><?php echo $row['msv']; ?></td>
                      
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</div>