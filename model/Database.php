<?php
class DatabaseInteracter {
    private $dbconn;

    public function __construct() {
        $this->dbconn = new mysqli('localhost', 'root', '', 'nbse');
    }

    public function getDistricts() {
        $result = $this->dbconn->query("SELECT * FROM nbse_districts");
        $districts = [];
        while ($row = $result->fetch_assoc()) {
            $districts[] = $row['nbseDistrictName'];
        }
        return $districts;
    }

    public function getYear()
    {
        $yr=$this->query("select * from year");
        $yr=mysql_fetch_array($yr);
        return $year = $yr['year'];
    }
    public function timing()
    {
        $findEtime = mysql_query("select * from timing_tbl where class=$class1");
        $findEtime = mysql_fetch_array($findEtime);
        $Etime = $findEtime['exam_time'];
        $Vtime = $findEtime['voc_time'];
    }

    public function fetchdata($data)
    {
        $sql=mysql_query("select * from c10_pkChrt_16 where district='$dist'");
    }

}
?>
