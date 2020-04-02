<?php
namespace GOA\Models;
class vote{
    public $id;
    public $vote;
    public $etablissment;

    public function getid()
    {
        return $this->id;
    }
    public function getvote()
    {
        return $this->vote;
    }
    public function getetablissment()
    {
        return $this->etablissment;
    }
}