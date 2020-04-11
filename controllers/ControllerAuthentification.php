<?php 
namespace GOA\controllers;

use GOA\controllers\BaseController;
use GOA\models\exceptions\UserExistException;
use GOA\models\managers\UserManager;

class ControllerAuthentification extends BaseController
{
    private $_userManager;
    public function __construct()
    {
        $this->_userManager = new UserManager();
    }
    /**
     * Action Controller - Ajout d'un utilisateur |
     * Vérification pwd / pwd confirmation |
     * Vérification login - email => existe |
     */
    public function newUser($login,$email,$password,$passwordVerif)
    {   
        if($this->_userManager->verifPwd($password,$passwordVerif)){
            if($this->_userManager->searchUserByEMail($email) == false || $this->_userManager->searchUserByLogin($login) == false){
                $this->_userManager->bddAddUser($login,$email,$password);
                echo "compte créé";
            }else{
                throw new UserExistException("Error Processing Request");
            }
        }
    }
    public function loginUser($login,$password)
    {
        $this->_userManager->checkLoginPassword($login,$password);
    }
    public function logout()
    {
        session_destroy();
    }
    public function forgetPassword($email)
    {
        $p = bin2hex(random_bytes(32));
    }
    public function resetPassword($token)
    {
        # code...
    }
}