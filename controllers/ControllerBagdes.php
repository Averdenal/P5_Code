<?php
namespace GOA\controllers;

use GOA\controllers\BaseController;
use GOA\models\managers\UserManager;

class ControllerBagdes extends BaseController{

    private $_userManager;
    public function __construct()
    {
        $this->_userManager = new UserManager();
    }
    public function getAllBadges()
    {
        $this->addParam('titlePage','Les Bages');
        $this->addParam('user',$this->_userManager->getConnecte());
        $this->template('viewBadges.twig');
    }
}