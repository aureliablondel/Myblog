<?php

namespace Project\Models;

class ImageManager extends Manager{

    // requête pour afficher tous les articles de la table en ordre inverse de création
    public function getImages(){
        $bdd = $this->dbConnect();
        $req = $bdd->query('SELECT * FROM images ORDER BY img_id DESC');
        return $req;
    }

    // requête pour charger une nouvelle image
    public function uploadImg($title, $target_file){
        $bdd = $this->dbConnect();        
        $req = $bdd->prepare('INSERT INTO images(titleImg, img) VALUE(?,?)');
        $req->execute(array($title, $target_file));
        return $req;
    }  

    // requête pour supprimer une image dans la table images
    public function deletImg($id){
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('DELETE FROM images WHERE img_id = ?');
        $req->execute([$id]);
        return $req;
    }

    


}