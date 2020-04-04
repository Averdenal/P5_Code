<?php 
namespace GOA\Models;

use PDO;
use GOA\Models\Model;

class CategoryManager extends Model{

    public function getAllCat()
    {
        $bdd = $this->getBdd();
        $req = $bdd->prepare('SELECT * FROM cats');
        $req->execute();
        return $req->fetchAll(PDO::FETCH_CLASS,'GOA\Models\Category');
    }
}