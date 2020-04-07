<?php


use GOA\Router;
use GOA\models\Environement;

session_start();
global $env;
global $twig;
require_once('models/Environement.php');
$env = Environement::get();
require 'vendor/autoload.php';
$loader = new \Twig\Loader\FilesystemLoader('./views');
$twig = new \Twig\Environment($loader, [
    'cache' => false,
]);
require_once('_config.php');
$router = new Router();
$router->findRoute($_SERVER['REQUEST_URI']);