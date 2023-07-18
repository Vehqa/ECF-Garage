<?php
use App\Controllers;
use App\Libraries\Main;

//Constante contenant le dossier racine du projet.
define('ROOT', dirname(__DIR__));
session_start();
//Importation de l'autoloader.
require_once ROOT . '/vendor/autoload.php';
// init model then Vardump ici avec un die !
//On instancie Main (Le ROUTEUR)
$router = new Main();
//Démmarage de l'application :
$router->start();