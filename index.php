<?php

require_once 'Config/config.php';
require_once 'Autoloader.php';

use App\Autoloader;
use App\Controller\HomeController;
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

    //HOME
    $router->get('/', function () {
        echo (new HomeController())->invoke();
    });

    // ABONNE
    $router->get('/abonnes', function () {
        echo (new AbonneController())->listAllAbonnes();
    });

    $router->get('/abonne/:id', function ($id) {
        echo (new AbonneController())->showAbonneById($id);
    });

    $router->get('/abonne/del/:id', function ($id) {
        echo (new AbonneController())->deleteAbonneById($id);
    });

    $router->post('/abonne/add', function () {
        echo (new AbonneController())->addAbonne();
    });

    $router->get('/abonnes/create', function () {
        echo (new AbonneController())->addAbonne();
    });

    $router->post('/abonne/update/:id', function ($id) {
        echo (new AbonneController())->updateAbonneById($id);
    });


    // OUVRAGE
    $router->get('/ouvrages', function () {
        echo (new \App\Controller\OuvrageController())->listAllOuvrages();
    });

    $router->get('/ouvrage/:id', function ($id) {
        echo (new \App\Controller\OuvrageController())->showOuvrageById($id);
    });

    $router->get('/ouvrage/del/:id', function ($id) {
        echo (new \App\Controller\OuvrageController())->deleteOuvrageById($id);
    });


    // LOCATION
    $router->get('/locations', function () {
        echo (new \App\Controller\LocationController())->listAllLocation();
    });

    $router->get('/location/del/:id', function ($id) {
        echo (new \App\Controller\LocationController())->deleteLocationById($id);
    });

    $router->run();
} catch (Exception $e) {
    die('Error: ' . $e);
}