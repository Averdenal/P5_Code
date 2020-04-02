<?php
namespace GOA;

use GOA\HttpRequest;
use GOA\Models\Route;

class Router
{
    public $listRoute =[];
    public $_matches;
    private $_userManager;

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
        $controllers = "GOA\Controllers\\".$httpResquest->route->controller;
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