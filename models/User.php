<?php
namespace GOA\models;

class User{
    public $id;
    public $firstname;
    public $lastname;
    public $login;
    public $datenaissance;
    public $email;
    private $password;
    public $pictureprofil;
    public $picturebanner;
    public $rang;
    public $exp;
    public $about;

    public function getPassword()
    {
        return $this->password;
    }
    public function getId()
    {
        return $this->id;
    }
}