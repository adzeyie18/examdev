<?php
// Include the Controller that handles the form request
require_once('controller/ForwardingController.php');

// Initialize the Controller
$controller = new ForwardingController();

// Call the appropriate method to display the form
$controller->displayForm();
?>
