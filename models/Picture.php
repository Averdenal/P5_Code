<?php
namespace GOA\models;

class Picture{
    public $id;
    public $url;
    public $description;
    public $author;

    public function getURL()
    {
        return $this->url;
    }
    public function getId()
    {
        return $this->id;
    }
    public function getAuthor()
    {
        return $this->author;
    }
}