<?php

class ControllerAccueil extends BaseController{
    public function accueil()
    {
        $titlePage = "Accueil";
        $this->template('viewProfile.php',$titlePage);
    }
}