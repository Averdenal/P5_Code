<?php
namespace GOA\Controllers;

use GOA\Controllers\BaseController;
use GOA\Models\EtablissementManager;
use GOA\Models\CategoryManager;

class ControllerEtablissement extends BaseController{
    private $_etabManager;
    private $_catManager;
    public function __construct()
    {
        $this->_etabManager = new EtablissementManager();   
        $this->_catManager = new CategoryManager();
    }
    public function getAllEtablissements()
    {
        $this->addParam('titlePage','Les Etablissements');
        $this->addParam('etablissements',$this->_etabManager->getAllEtablissements());
        $this->addParam('cats',$this->_catManager->getAllCat());
        $this->addParam('online',true);
        $this->template('viewEtab.twig');
    }
}