<?php 
namespace GOA\controllers;

use GOA\controllers\BaseController;
use GOA\models\managers\UserManager;

class ControllerAuthentification extends BaseController
{
    private $_userManager;
    public function __construct()
    {
        $this->_userManager = new UserManager();
    }
    public function newUser($login,$email,$password,$passwordVerif)
    {   
        $this->_userManager->bddAddUser($login,$email,$password);
        echo "compte créé";
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