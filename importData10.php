<?php
//load the database configuration file
include 'dbconn.php';

if(isset($_POST['importSubmit']))
{
    
    //validate whether uploaded file is a csv file
    $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
    if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'],$csvMimes))
    {
        if(is_uploaded_file($_FILES['file']['tmp_name']))
        {
            
            //open uploaded csv file with read only mode
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
            
            //skip first line
            fgetcsv($csvFile);
            
            //parse data from csv file line by line
            while(($line = fgetcsv($csvFile)) !== FALSE)
            {
                //check whether member already exists in database with same email
                //$prevQuery = "SELECT id FROM members WHERE email = '".$line[1]."'";
               // $prevResult = $db->query($prevQuery);
              
                    //insert member data into database
                //$school = htmlspecialchars($line[2]);
                //$school = htmlspecialchars_decode($school);
                //**
                // THIS CODE IS USED TO ACCEPT ANY STRING HAVING ANY SPECIAL CHARACTERS 
                //**
                $school = mysql_escape_string($line[2]);
                //$school = htmlentities($school);
                $success=   mysql_query("INSERT INTO c10_pkchrt_16 (sl, district, school, eng, mata, matb, ss, sc, tny, smi, bng, alt, aon, lta, hnd, fit, hs, bk, ms, ee, iv, tt, hv, rv, ev, bv, mv, av, at, pv, mm, graph) VALUES 
                    (
                    '".$line[0]."',
                    '".$line[1]."',
                    '".$school."',
                    '".$line[3]."',
                    '".$line[4]."',
                    '".$line[5]."',
                    '".$line[6]."',
                    '".$line[7]."',
                    '".$line[8]."',
                    '".$line[9]."',
                    '".$line[10]."',
                    '".$line[11]."',
                    '".$line[12]."',
                    '".$line[13]."',
                    '".$line[14]."',
                    '".$line[15]."',
                    '".$line[16]."',
                    '".$line[17]."',
                    '".$line[18]."',
                    '".$line[19]."',
                    '".$line[20]."',
                    '".$line[21]."',
                    '".$line[22]."',
                    '".$line[23]."',
                    '".$line[24]."',
                    '".$line[25]."',
                    '".$line[26]."',
                    '".$line[27]."',
                    '".$line[28]."',
                    '".$line[29]."', 
                    '".$line[30]."',
                    '".$line[31]."' 
                    )");
             }
            
            //close opened csv file
            fclose($csvFile);
            //if($success){echo 'asdhj';} else {echo 'failed';}
            if($success)
            {$qstring = '?status=succ';} else mysql_error();
        }
        else
        {
            $qstring = '?status=err';
        }
    }
    else
    {
        $qstring = '?status=invalid_file';
    }
}

//redirect to the listing page
header("Location: importc10data.php".$qstring);