<?php 
namespace GOA\models\Managers;

use PDO;
use GOA\models\Model;

class PictureManager extends Model{

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
        //génération d'un nom
        $file = $filename;
        $fileName = explode('.',$file);
        $fileName[0] = '245';
        return $fileName[0].'.'.$fileName[1];
    }
    public function uploadPicture($file)
    {
        $target_dir = "public/imgs/upload/";
        $file["name"] = $this->change_Name($file["name"]);
        $target_file = $target_dir . basename($file["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        var_dump($imageFileType);
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
                echo "The file ". basename( $file["name"]). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
}