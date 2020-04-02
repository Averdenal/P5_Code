<?php

use GOA\Router;
use GOA\Models\Environement;

session_start();
global $env;
require_once('models/Environement.php');
$env = Environement::get();
require 'vendor/autoload.php';

require_once('_config.php');

$router = new Router();
$router->findRoute($_SERVER['REQUEST_URI']);
