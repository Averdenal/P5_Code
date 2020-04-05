<?php
namespace GOA\Controllers;

use GOA\Controllers\BaseController;
use GOA\Models\Managers\CategoryManager;
use GOA\Models\Managers\EtablissementManager;
use GOA\Models\Managers\UserManager;

class ControllerEtablissement extends BaseController{
    private $_etabManager;
    private $_catManager;
    private $_userManager;

    public function __construct()
    {
        $this->_etabManager = new EtablissementManager();   
        $this->_catManager = new CategoryManager();
        $this->_userManager = new UserManager();
    }
    public function getAllEtablissements()
    {
        $this->addParam('titlePage','Les Etablissements');
        $this->addParam('etablissements',$this->_etabManager->getAllEtablissements());
        $this->addParam('cats',$this->_catManager->getAllCat());
        $this->addParam('user',$this->_userManager->getConnecte());
        $this->template('viewEtab.twig');
    }
}