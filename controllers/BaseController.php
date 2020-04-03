<?php
namespace GOA\Controllers;
class BaseController
{
    private $_param;
    public function __construct()
    {
        $this->_param = array();
    }
    public function addParam($key,$value)
    {
        $this->_param[$key] = $value;
    }

    public function template($view)
    {
        global $twig;
        echo $twig->render($view, $this->_param);     
        
    }

}