<?php
namespace GOA\Controllers;

use GOA\Controllers\BaseController;



class ControllerAccueil extends BaseController{
    public function __construct()
    {
        
    }
    public function accueil()
    {
        $this->addParam('titlePage','Accueil');
        $this->template('viewAccueil.twig');
    }
}