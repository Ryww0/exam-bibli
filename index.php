<?php

require_once 'Config/config.php';
require_once 'Autoloader.php';

use App\Autoloader;
use App\Service\Router;
use App\Controller\AbonneController;

Autoloader::$folderList =
    [
        "App/Model/",
        "App/Controller/",
        "App/Repository/",
        "App/Service/",
        "App/Form/",
        "App/Validator/",
    ];
Autoloader::register();

session_start();

try {

    $router = new Router($_GET['url']);

    //
    $router->get('/abonnes', function () {
        echo (new AbonneController())->listAllAbonnes();
    });

    $router->run();
} catch (Exception $e) {
    die('Error: ' . $e);
}