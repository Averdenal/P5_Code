<?php 
namespace GOA\models\exceptions;

use Exception;

class UserExistException extends Exception
{
    public $param;
    public function __construct($param,Exception $previous = null)
    {
        parent::__construct("Utilisateur existe",'1504',$previous);
        $this->param = $param;
    }

}