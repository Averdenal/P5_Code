<?php
namespace GOA\Controllers;

use GOA\Controllers\BaseController;

class ControllerBagdes extends BaseController{

    public function __construct()
    {

    }
    public function getAllBadges()
    {
        $this->addParam('titlePage','Les Bages');
        $this->template('viewBadges.twig');
    }
}