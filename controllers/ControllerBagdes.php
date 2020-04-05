<?php
namespace GOA\Controllers;

use GOA\Controllers\BaseController;
use GOA\Models\Managers\UserManager;

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