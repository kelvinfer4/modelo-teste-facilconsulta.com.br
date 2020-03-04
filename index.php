<?php

define('ROOT_PATH', dirname(__FILE__));

require_once 'controller/MedicosController.php';

$controller = new MedicosController();

$controller->handleRequest();

?>
