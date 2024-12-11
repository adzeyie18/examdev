<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript">
header('Content-Type: text/html; charset=ISO-8859-1');
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
                        url: "clearData10.php", // "another_php_file.php",
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
<div class="" align="">
    <?php if(!empty($statusMsg)){
        echo '<div class="alert '.$statusMsgClass.'">'.$statusMsg.'</div>';
    } ?>
    <div class="panel">
        <div class="panel-heading">
            
            <a href="javascript:void(0);" onclick="$('#importFrm').slideToggle();"></a>
            <input type="button" class="btn btn-primary" name="val" value="Clear Data" id="cls" onfocus="clearData()">
        </div>
        
        <div class="panel-body">
            <form action="importData10.php" method="post" enctype="multipart/form-data" id="importFrm">
                <input type="file" class="btn btn-primary" name="file" />
                <input type="submit" class="btn btn-primary" name="importSubmit" value="IMPORT">
        <div><H5><B>******<span style="background-color: yellow;">PLEASE ENSURE THE FILE TO BE UPLOADED IS A CSV FILE AND THE COLUMNS ARE EXACTLY AS SHOWN HERE******</span></B></H5></div>
            </form>
            <table class="table table-bordered">
                <thead>
                    <tr>
                    <th>SLNO</th>
                      <th>DISTRICT</th>
                      <th>SCHOOL</th>
                      <th>ENG</th>
                      <th>MATA</th>
                      <th>MATB</th>
                      <th>SS</th>
                      <th>SC</th>
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
		              <th>AT</th>
                      <th>PV</th>
                      <th>MM</th>
                      <th>GRAPH</th>
                      
                    </tr>
                </thead>
                <tbody id="ss">
                <?php
                    //get records from database
                    $query =mysql_query("SELECT * FROM c10_pkChrt_16");
                    while($row = mysql_fetch_array($query)){ ?>
                    <tr>
                    <td><?php echo $row['sl']; ?></td>
                      <td><?php echo $row['district']; ?></td>
                      <td><?php echo $row['school']; ?></td>
                      <td><?php echo $row['eng']; ?></td>
                      <td><?php echo $row['mata']; ?></td>
                      <td><?php echo $row['matb']; ?></td>
                      <td><?php echo $row['ss']; ?></td>
                      <td><?php echo $row['sc']; ?></td>
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
                      
                      <td><?php echo $row['hv']; ?></td>
                      <td><?php echo $row['rv']; ?></td>
                     
                      <td><?php echo $row['ev']; ?></td>
                      
                      <td><?php echo $row['bv']; ?></td>
                      
                      <td><?php echo $row['mv']; ?></td>
                      <td><?php echo $row['av']; ?></td>
		              <td><?php echo $row['at']; ?></td>
                      <td><?php echo $row['pv']; ?></td>
                      <td><?php echo $row['mm']; ?></td>
                      <td><?php echo $row['graph']; ?></td>
                      
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</div>