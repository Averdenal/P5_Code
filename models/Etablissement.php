<?php
namespace GOA\Models;
class Etablissement{
    public $id;
    public $name;
    public $phone;
    public $cat;
    public $city;
    public $code;
    public $adresse;
    public $description;
    public $banner;
    public $latitude;
    public $longitude;
    public $gradeTarif;
    public $moyenne;
    public $nbVote;

    public function getId()
    {
        return $this->id;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getPhone()
    {
        return $this->phone;
    }
    public function getCat()
    {
        return $this->cat;
    }
    public function getCity()
    {
        return $this->city;
    }
    public function getCode()
    {
        return $this->code;
    }
    public function getAdresse()
    {
        return $this->adresse;
    }
    public function getDescription()
    {
        return $this->description;
    }
    public function getBanner()
    {
        return $this->banner;
    }
    public function getLat()
    {
        return $this->latitude;
    }
    public function getLng()
    {
        return $this->longitude;
    }
    public function getMoyenne()
    {
        return $this->moyenne;
    }
    public function getNbVote()
    {
        return $this->nbVote;
    }
    public function getGradeTarif()
    {
        return $this->gradeTarif;
    }
}