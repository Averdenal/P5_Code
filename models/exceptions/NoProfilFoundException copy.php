<?php 
namespace GOA\models\exceptions;

use Exception;

class NoProfilFoundException extends Exception
{
    public $param;
    public function __construct($param,Exception $previous = null)
    {
        parent::__construct("Le profil n'existe pas",'1001',$previous);
        $this->param = $param;
    }

}