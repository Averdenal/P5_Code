<?php
namespace GOA\controllers;

use GOA\controllers\BaseController;
use GOA\models\managers\UserManager;

class ControllerUser extends BaseController{
    private $_userManager;
    public function __construct()
    {
        $this->_userManager = new UserManager();
    }
    public function getProfil($id)
    {
        $user = $this->_userManager->getConnecte();
        $this->addParam('titlePage','Profil - '.$user->getLogin());
        $this->addParam('user',$user);
        $this->template('viewAccueil.twig');
    }
}