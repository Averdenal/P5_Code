<?php 
namespace GOA\Models\exceptions;

use Exception;

class NoRouteFoundException extends Exception
{
    public function __construct(Exception $previous = null)
    {
        //parent::__construct('La route n\'existe pas','0010',$previous);
        header('HTTP/1.0 404 Not Found');
    }

}