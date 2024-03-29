<?php
namespace GOA;

use GOA\HttpRequest;
use GOA\models\Route;

class Router
{
    public $listRoute =[];
    public $_matches;

    public function __construct()
    {   
        $jsons = $this->selectDataRoute();
        foreach($jsons as $json){
            $this->listRoute[] = new Route($json); 
        }
    }

    public function findRoute($url)
    {
        $httpResquest = new HttpRequest($url,$this->listRoute);
        $controllers = "GOA\controllers\\".$httpResquest->route->controller;
        $controller = new $controllers($httpResquest);
        if($httpResquest->param != null){
            $controller->{$httpResquest->route->action}(...$httpResquest->param);//tab key int//
        }else{
            $controller->{$httpResquest->route->action}();
        }
    }
    private function selectDataRoute(){
        $routeInfo = 'routing.json';
        return json_decode(file_get_contents($routeInfo));
    }
}