<?php

class EtablissementManager extends Model{

    public function getAllEtablissements()
    {
        $bdd = $this->getBdd();
        $req = $bdd->prepare('CALL `AllEtablissements`(); ');
        $req->execute();
        return $req->fetchAll(PDO::FETCH_CLASS,'Etablissement');
    }
    public function getEtablissementsById($id)
    {
        $bdd = $this->getBdd();
        $req = $bdd->prepare('SET @idEtab = :id; CALL `Etablissements_By_Id`(@idEtab);');
        $req->bindParam(':id', $id , PDO::PARAM_INT);
        $req->execute();
        return $req->fetchObject('Etablissement');
    }
}