<?php
namespace GOA\models\Managers;

use PDO;
use GOA\models\Model;

class EtablissementManager extends Model{

    public function getAllEtablissements()
    {
        $bdd = $this->getBdd();
        $req = $bdd->prepare('SELECT etablissements.id,
        etablissements.name, etablissements.phone, etablissements.adresse, etablissements.description, (pictures.url)as banner, etablissements.latitude,
        etablissements.longitude,
        etablissements.gradeTarif, 
        (cats.name) as cat, 
        (city.name) as city , 
        (city.code) as code ,
        etablissements.name,
        etablissements.phone,
        etablissements.adresse,
        etablissements.description,
        (pictures.url)as banner,
        etablissements.latitude,
        etablissements.longitude,
        etablissements.gradeTarif, 
        (cats.name) as cat, 
        (city.name) as city , 
        (city.code) as code ,
        (SELECT ROUND(AVG(vote),1) FROM voteetab WHERE voteetab.etablissment=etablissements.id)as moyenne ,
        (SELECT COUNT(*) FROM voteetab WHERE voteetab.etablissment=etablissements.id)as nbVote
        FROM etablissements
                JOIN voteetab 
                ON voteetab.etablissment = etablissements.id
                JOIN cats
                ON etablissements.cat = cats.id
                JOIN pictures
                ON etablissements.banner = pictures.idpictures
                JOIN city
                ON etablissements.city = city.idcity
                GROUP BY etablissements.id');
        $req->execute();
        return $req->fetchAll(PDO::FETCH_CLASS,'GOA\models\Etablissement');
    }
    public function getEtablissementsById($id)
    {
        $bdd = $this->getBdd();
        $req = $bdd->prepare('SET @idEtab = :id; CALL `Etablissements_By_Id`(@idEtab);');
        $req->bindParam(':id', $id , PDO::PARAM_INT);
        $req->execute();
        return $req->fetchObject('GOA\models\Etablissement');
    }
}