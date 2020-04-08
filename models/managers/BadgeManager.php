<?php
namespace GOA\models\managers;

use PDO;
use GOA\Models\Model;

class BadgeManager extends Model{
    public function getBadgesByUser($user,$limit)      
    {
        $bdd = $this->getBdd();
        $req = $bdd->prepare('SELECT badges.id, badges.name,( SELECT pictures.url FROM pictures WHERE badges.picture = pictures.idpictures)as picture,(badges.exp)as expBadge, (badgeaffect.exp) as expUser FROM badges 
        JOIN pictures
        join badgeaffect
        ON badgeaffect.user = :id
        WHERE badgeaffect.exp = badges.exp
        GROUP by badges.id
        LIMIT :limit;');
        $req->bindParam(':id',$user,PDO::PARAM_INT);
        $req->bindParam(':limit',$limit,PDO::PARAM_INT);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_CLASS,'GOA\models\Badge');
    }
}