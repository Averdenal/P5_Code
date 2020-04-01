<?php

abstract class Model{
    private static $bdd;

    private static function setBdd(){
        self::$bdd = new PDO('mysql:host=localhost;dbname=mydb;charset=utf8', 'root', '');
    }
    
    protected function getBdd(){
        if(self::$bdd === null){
            self::setBdd();
        }
        return self::$bdd;
    }
}