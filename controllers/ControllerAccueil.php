<?php
namespace GOA\Controllers;

use GOA\Controllers\BaseController;



class ControllerAccueil extends BaseController{
    public function accueil()
    {
        $titlePage = "Accueil";
        $this->template('viewProfile.php',$titlePage);
    }
}