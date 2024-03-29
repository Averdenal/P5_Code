<?php
namespace GOA\models\Managers;

use PDO;
use GOA\models\Model;


class UserManager extends Model{
    private $_pictureManager;
    public function __construct()
    {
        $this->_pictureManager = new PictureManager();
    }

    public function verifPwd($password, $verifpassword)
    {
        return $password === $verifpassword;
    }
    function getUsersBylogin($login)
    {
        $bdd = $this->getBdd();
        $req = $bdd->prepare("SELECT users.about,users.password, users.id,users.firstname,users.lastname,users.login,users.datenaissance,users.email,users.exp,users.statut, (SELECT url FROM pictures WHERE pictures.id = users.pictureprofil) as pictureprofil,
        (SELECT url FROM pictures WHERE pictures.id = users.picturebanner) as picturebanner
        FROM users
        JOIN pictures
        WHERE login = :login
        GROUP BY users.id");
        $req->bindParam(':login', $login, PDO::PARAM_STR);
        $req->execute();
        return $req->fetchObject('GOA\models\User');
    }
    function searchUserByLogin($login)
    {
        $bdd = $this->getBdd();
        $req = $bdd->prepare("SELECT * FROM users WHERE login = :login");
        $req->bindParam(':login',$login,PDO::PARAM_STR);
        $req->execute();
        return $req->fetchObject('GOA\models\User');
    }

    function searchUserByEMail($email)
    {
        $bdd = $this->getBdd();
        $req = $bdd->prepare("SELECT * FROM users WHERE email = :email");
        $req->bindParam(':email',$email,PDO::PARAM_STR);
        $req->execute();
        return $req->fetchObject('GOA\models\User');
    }

    function bddAddUser($login,$email,$pwd){
        $pwd = $this->convPwd($pwd);
        $bdd = $this->getBdd();
        $req = $bdd->prepare("INSERT INTO `users` (id, firstname, lastname, login, password, email,statut,pictureprofil,picturebanner,exp,token) 
        VALUES (NULL, null, null, :login, :password, :email,1,2,1,0,null)");
        $req->bindParam(':login',$login,PDO::PARAM_STR);
        $req->bindParam(':password',$pwd,PDO::PARAM_STR);
        $req->bindParam(':email',$email,PDO::PARAM_STR);
        $req->execute();
    }
    
    function checkLoginPassword($login,$password)
    {
        $user = $this->getUsersBylogin($login);
        if(!$user){
            return ['error login'];
        }else {
            if(password_verify($password,$user->getPassword())){
                $_SESSION['auth'] = $user->getId();
                return [true,$user];
            }else{
                return [false];
            }
        }
    }

    function getRang($id){
            $bdd = $this->getBdd();
            $req = $bdd->prepare('SELECT id, name FROM rangs WHERE id = :id');
            $req->bindParam(':id',$id,PDO::PARAM_INT);
            $req->execute();
            return $req->fetchObject('rang');
        
    }

    function getConnecte(){
        if(isset($_SESSION['auth'])){
            $auth = $_SESSION['auth'];
            return $this->getUsersById($auth);
        }else{
            return null;
        }
    }


    function pwdOK($pwd,$confirme){
        return ($pwd === $confirme) ? true : false;
    }

    function getAllUsers()
    {
        $bdd = $this->getBdd();
        $req = $bdd->prepare('SELECT users.id, users.lastname, users.firstname, users.login, users.email, users.rang,
        (SELECT name FROM rangs WHERE users.rang = rangs.id) as rangName
        FROM users
        JOIN rangs
        ON users.rang = rangs.id');
        $req->execute();
        return $req->fetchAll(PDO::FETCH_CLASS,'GOA\models\User');
    }
    function getUsersById($id)
    {
        $bdd = $this->getBdd();
        $req = $bdd->prepare('SELECT users.about,users.password, users.id,users.firstname,users.lastname,users.login,users.datenaissance,users.email,users.exp,users.statut, (SELECT url FROM pictures WHERE pictures.id = users.pictureprofil) as pictureprofil,
        (SELECT url FROM pictures WHERE pictures.id = users.picturebanner) as picturebanner
        FROM users
        JOIN pictures
        WHERE users.id = :id
        GROUP BY users.id');
        $req->bindParam(':id', $id, PDO::PARAM_INT);
        $req->execute();
        return $req->fetchObject('GOA\models\User');
    }

    public function deleteUser($id)
    {
        $bdd = $this->getBdd();
        $req = $bdd->prepare('DELETE FROM users WHERE id = :id');
        $req->bindParam(':id',$id,PDO::PARAM_INT);
        $req->execute();
    }
    public function convPwd($pwd){
        return password_hash($pwd,PASSWORD_BCRYPT);
    }
    public function setPicture($id,$userModif)
    {
        $bdd = $this->getBdd();
        $req = $bdd->prepare('UPDATE `users` SET `pictureprofil` = :id WHERE id = :user');
        $req->bindParam(':id',$id,PDO::PARAM_INT);
        $req->bindParam(':user',$userModif,PDO::PARAM_INT);
        $req->execute();
        ; 
    }
    public function setBanner($id,$userModif)
    {
        $bdd = $this->getBdd();
        $req = $bdd->prepare('UPDATE `users` SET `picturebanner` = :id WHERE id = :user');
        $req->bindParam(':id',$id,PDO::PARAM_INT);
        $req->bindParam(':user',$userModif,PDO::PARAM_INT);
        $req->execute();
        ; 
    }
}