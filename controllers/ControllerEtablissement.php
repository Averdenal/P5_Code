<?php

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
        var_dump($this->_etabManager->getAllEtablissements());
        //$this->template('views/viewEtab.php',$titlePage);
    }
}