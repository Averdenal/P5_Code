<?php

class ControllerBagdes extends BaseController{

    public function __construct()
    {

    }
    public function getAllBadges()
    {
        $titlePage = 'Les Bages';
        $this->template('views/viewBadges.php',$titlePage);
    }
}