<?php
namespace GOA\controllers;

use GOA\controllers\BaseController;
use GOA\models\managers\UserManager;
use GOA\models\managers\BadgeManager;

class ControllerUser extends BaseController{
    private $_userManager;
    private $_badgeManager;
    public function __construct()
    {
        $this->_userManager = new UserManager();
        $this->_badgeManager = new BadgeManager();
    }
    public function getProfil($login)
    {
        $user = $this->_userManager->getConnecte();
        $this->addParam('titlePage','Accueil');
        $this->addParam('user',$user);
        if($user != null){
            $badges = $this->_badgeManager->getBadgesByUser($user->getId(),5);
            $this->addParam('badges',$badges);
        }
        $this->template('viewProfil.twig');
    }
}