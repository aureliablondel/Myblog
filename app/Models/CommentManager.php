<?php

namespace Project\Models;

class CommentManager extends Manager{

    // requête pour poster un commentaire
    public function postComment($contentComment, $idUser, $idArticle){
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('INSERT INTO comments(contentComment, idUser, idArticle) VALUE (?,?,?)');
        $req->execute([$contentComment, $idUser, $idArticle]);
        return $req;
    }
    // requête pour récupérer les commentaires liés à un article
    public function getComments($id){
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT contentComment, dateComment FROM comments WHERE idArticle = ?');
        $req->execute([$id]);
        return $req;
    }
    // requête pour récupérer les commentaires d'un utilisateur
    public function getUserComments($idUser){
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT contentComment, comment_id, dateComment FROM comments WHERE idUser = ?');
        $req->execute([$idUser]);
        return $req;
    }

    // ---------------------------------------
    // requete pour adfficher un commentaire
    // ---------------------------------------

    public function getComment($commentId){
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT  comment_id, contentComment, dateComment FROM comments WHERE comment_id = ?');
        $req->execute([$commentId]);
        return $req;
    }

    // --------------------------------------
    // requête pour modifier un commentaire
    // --------------------------------------

    public function updateComment($commentId, $updateComment, $date){
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('UPDATE comments SET contentComment = :contentComment, dateComment = :dateComment WHERE comment_id = :comment_id');
        $req->execute([
            'comment_id' => $commentId,           
            'contentComment' => $updateComment,
            'dateComment' => $date
            ]);
        return $req;
    }

    // --------------------------------------
    // requête pour supprimer un commentaire
    // ---------------------------------------

    public function deleteComment($commentId){
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('DELETE FROM comments WHERE comment_id=?');
        $req->execute([$commentId]);
        return $req;
    }
}



