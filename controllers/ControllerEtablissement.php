<?php
namespace GOA\Controllers;

use GOA\Controllers\BaseController;
use GOA\Models\EtablissementManager;

class ControllerEtablissement extends BaseController{
    private $_etabManager;
    public function __construct()
    {
        $this->_etabManager = new EtablissementManager();   
    }
    public function getAllEtablissements()
    {
        $titlePage = 'Les Etablissements';
        $this->addParam('etablissements',$this->_etabManager->getAllEtablissements());
        $this->template('views/viewEtab.php',$titlePage);
    }
}