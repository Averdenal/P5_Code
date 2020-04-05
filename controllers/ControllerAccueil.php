<?php
namespace GOA\Controllers;

use GOA\Controllers\BaseController;
use GOA\Models\Managers\UserManager;

class ControllerAccueil extends BaseController{
    private $_userManager;
    public function __construct()
    {
        $this->_userManager = new UserManager();
    }
    public function accueil()
    {
        $this->addParam('titlePage','Accueil');
        $this->addParam('user',$this->_userManager->getConnecte());
        $this->template('viewAccueil.twig');
    }
}