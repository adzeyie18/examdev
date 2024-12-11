<?php
require_once('model/Database.php');

class ForwardingController {
    private $db;

    public function __construct() {
        $this->db = new DatabaseInteracter();
    }

    public function displayForm() {
        $districts = $this->db->getDistricts();
        include('view/forwardingForm.php');
    }
}
?>
