<?php

/*
* É recomendado que todo o carregamente seja feito apartir desse arquivo.
*/

    define('ROOT_PATH', dirname(__FILE__));

    require_once 'controller/MedicosController.php';

    $controller = new MedicosController();
    $controller->handleRequest();

?>
