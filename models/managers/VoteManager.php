<?php
namespace GOA\models\Managers;

use PDO;
use GOA\models\Model;

class VoteManager extends Model{

    public function getVoteByEtablissement($etablissment)
    {
        $bdd = $this->getBdd();
        $req = $bdd->prepare('SELECT * FROM voteetab WHERE etablissment = :id');
        $req->bindParam(':id', $etablissment , PDO::PARAM_INT);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_CLASS,'GOA\models\Vote');
    }
}