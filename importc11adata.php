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
                        url: "clearData11a.php", // "another_php_file.php",
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
            <form action="importData11a.php" method="post" enctype="multipart/form-data" id="importFrm">
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
                      <th>EDN</th>
                      <th>PSY</th>
                      <th>GEO</th>
                      <th>MSC</th>
                      <th>HIS</th>
                      <th>ALT</th>
                      <th>HND</th>
                      <th>BNG</th>
                      <th>TNY</th>
                      <th>SMI</th>
                      <th>AON</th>
                      <th>LTA</th>
                      <th>SGY</th>
                      <th>EVS</th>
                      <th>PSC</th>
                      <th>ECO</th>
                      <th>PHI</th>
                      <th>CSC</th>
                      <th>INF</th>
                      <th>ENT</th>
                      <th>FMM</th>
                      <th>ITV</th>
                      <th>TTV</th>
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
                    $query =mysql_query("SELECT * FROM c11a_pkChrt");
                    while($row = mysql_fetch_array($query)){ ?>
                    <tr>
                    <td><?php echo $row['sl']; ?></td>
                      <td><?php echo $row['district']; ?></td>
                      <td><?php echo $row['centre']; ?></td>
                      <td><?php echo $row['eng']; ?></td>
                      <td><?php echo $row['edn']; ?></td>
                      <td><?php echo $row['psy']; ?></td>
                      <td><?php echo $row['geo']; ?></td>
                      <td><?php echo $row['msc']; ?></td>
                      <td><?php echo $row['his']; ?></td>
                      <td><?php echo $row['alt']; ?></td>
                      <td><?php echo $row['hnd']; ?></td>
                      <td><?php echo $row['bng']; ?></td>
                      <td><?php echo $row['tny']; ?></td>
                      <td><?php echo $row['smi']; ?></td>
                      <td><?php echo $row['aon']; ?></td>
                      <td><?php echo $row['lta']; ?></td>
                      <td><?php echo $row['sgy']; ?></td>
                      <td><?php echo $row['evs']; ?></td>
                      <td><?php echo $row['psc']; ?></td>
                      <td><?php echo $row['eco']; ?></td>
                      <td><?php echo $row['phi']; ?></td>
                      <td><?php echo $row['csc']; ?></td>
                      <td><?php echo $row['inf']; ?></td>
                      <td><?php echo $row['ent']; ?></td>
                      <td><?php echo $row['fmm']; ?></td>
                      <td><?php echo $row['itv']; ?></td>
                      <td><?php echo $row['ttv']; ?></td>
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