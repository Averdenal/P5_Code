<?php
namespace GOA\Controllers;

use GOA\Controllers\BaseController;

class AuthController extends BaseController{

    public function register($email,$login,$password)
    {
        
    }
    public function login($login,$password)
    {
        
    }
    public function logout()
    {
        session_destroy();
    }

}