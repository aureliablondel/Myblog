<?php

namespace Project\Models;

class CommentManager extends Manager{

    // requête pour poster un commentaire
    public function postComment($contentComment, $id){
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('INSERT INTO comments(contentComment, idArticle) VALUE (?,?)');
        $req->execute([$contentComment, $id]);
        return $req;
    }
    // requête pour récupérer les commentaires liés à un article
    public function getComments($id){
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT articles FROM comments WHERE idArticle = ?');
        $req->execute([$id]);
        return $req;
    }


}