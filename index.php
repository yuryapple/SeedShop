<?php
    session_start();
    // FRONT CONTROLLER
    
    // Set general envoromental
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
        
    // Attach files
    define('ROOT', dirname(__FILE__));
    require_once (ROOT . '/components/Router.php');
    require_once (ROOT . '/components/Db.php');
    
    // Run router
    $router = new Router();
    $router->run();
    

    