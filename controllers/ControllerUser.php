<?php
namespace GOA\controllers;

use GOA\controllers\BaseController;
use GOA\models\managers\UserManager;
use GOA\models\managers\BadgeManager;
use GOA\models\exceptions\NoAuthorizedException;
use GOA\models\exceptions\NoProfilFoundException;
use GOA\models\Managers\PictureManager;

class ControllerUser extends BaseController{
    private $_userManager;
    private $_badgeManager;
    private $_pictureManager;
    public function __construct()
    {
        $this->_userManager = new UserManager();
        $this->_badgeManager = new BadgeManager();
        $this->_pictureManager = new PictureManager();
    }
    public function getProfil($login)
    {
        $user =$this->_userManager->getConnecte();
        $userPage = $this->_userManager->getUsersBylogin($login);
        if($userPage != null){
            $this->addParam('titlePage','Profil - '.$login);
            $this->addParam('userPage',$userPage);            
            $this->addParam('user',$user);
            $badgesPage = $this->_badgeManager->getBadgesByUser($userPage->getId(),5);
            $badges = $this->_badgeManager->getBadgesByUser($user->getId(),5);
            $this->addParam('badgesPage',$badgesPage);
            $this->addParam('badges',$badges);
            $this->template('viewProfil.twig');
        }else{
            throw new NoProfilFoundException($login);
        }
    }
    public function getEditProfil($login)
    {
        $user =$this->_userManager->getConnecte();
        $userEdit = $this->_userManager->getUsersBylogin($login);
        if($userEdit->getId() == $user->getId()){
            $this->addParam('titlePage','Profil - '.$login);    
            $this->addParam('user',$user);
            $badges = $this->_badgeManager->getBadgesByUser($user->getId(),5);
            $this->addParam('badges',$badges);
            $this->template('viewEditProfil.twig');
        }else{
            throw new NoAuthorizedException($login);
        }
    }

    public function changePicture($picture)
    {
        echo $picture;
        $fileName = $_FILES['file']['name'];
        $fileType = $_FILES['file']['type'];
        $fileError = $_FILES['file']['error'];
        $fileContent = file_get_contents($_FILES['file']['tmp_name']);
    }
    public function changeBanner()
    {
        $this->_pictureManager->uploadPicture($_FILES["file"]);
    }
}