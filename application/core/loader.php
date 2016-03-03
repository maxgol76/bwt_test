<?php
require_once 'model.php';
require_once 'view.php';
require_once 'controller.php';
require_once 'configclass.php';
require_once 'dbclass.php';
require_once 'config/config.php';
require_once 'route.php';

try {
    Router::execute(); 
} catch (Exception $e) {
    echo 'Thrown exception: ',  $e->getMessage(), "\n";
}

