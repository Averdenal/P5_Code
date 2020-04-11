<?php 
namespace GOA\models\Managers;

use PDO;
use GOA\models\Model;

class PictureManager extends Model{

    private $target_dir;

    public function __construct()
    {
        $this->target_dir = "public/imgs/upload/";
    }
    public function countPicture()
    {
        $bdd = $this->getBdd();
        $req = $bdd->prepare('SELECT COUNT(*) FROM pictures');
        $req->execute();
        return $req->fetch();
    }
    public function picture_Verif_Extends($imageFileType)
    {
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            return false;
        }else{
            return true;
        }
    }
    public function change_Name($filename)
    {
        $name = $this->countPicture()[0];
        $file = $filename;
        $fileName = explode('.',$file);
        $fileName[0] = $name +1;
        return $fileName[0].'.'.$fileName[1];
    }
    public function uploadPicture($file,$author,$description,$album = null)
    {
        $file["name"] = $this->change_Name($file["name"]);
        $target_file = $this->target_dir . basename($file["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($file["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }
        if ($file["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if(!$this->picture_Verif_Extends($imageFileType)) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($file["tmp_name"], $target_file)) {
                $this->setPicture($author,$this->target_dir.$file['name'],$description);
                return $this->getPictureByUrl($this->target_dir.$file['name']);
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }

    public function setPicture($author,$url,$description)
    {
        $url = '/'.$url;
        $bdd = $this->getBdd();
        $req = $bdd->prepare("INSERT INTO pictures (id, url, author, description) 
        VALUES (NULL, :url, :author, :description)");
        $req->bindParam(':url',$url,PDO::PARAM_STR);
        $req->bindParam(':author',$author,PDO::PARAM_STR);
        $req->bindParam(':description',$description,PDO::PARAM_STR);
        $req->execute();
    }
    public function getPictureByUrl($url)
    {
        $url = '/'.$url;
        $bdd = $this->getBdd();
        $req = $bdd->prepare("SELECT id,url,description,author FROM pictures WHERE url = :url");
        $req->bindParam(':url',$url,PDO::PARAM_STR);
        $req->execute();
        return $req->fetchObject('GOA\models\Picture');
    }
}