<?php 
namespace GOA\models\exceptions;

use Exception;

class NoAuthorizedException extends Exception
{
    public $param;
    public function __construct($param,Exception $previous = null)
    {
        parent::__construct("Autorisation manquante",'1503',$previous);
        $this->param = $param;
    }

}