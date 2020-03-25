<?php
global $env;

define('TITLESITE','Book');
define('ROOT',$env->basepath);
define('ROUTER','controllers/Router.php');
define('HTTP',$_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].ROOT);
define('CSS',HTTP.'/public/css/');
define('IMAGES',HTTP.'/public/imgs/');
define('JS',HTTP.'/public/js/');