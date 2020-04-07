<?php 
namespace GOA\models\Managers;

use PDO;
use GOA\models\Model;

class CategoryManager extends Model{

    public function getAllCat()
    {
        $bdd = $this->getBdd();
        $req = $bdd->prepare('SELECT * FROM cats');
        $req->execute();
        return $req->fetchAll(PDO::FETCH_CLASS,'GOA\models\Category');
    }
}