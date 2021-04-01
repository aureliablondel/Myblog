<?php

namespace Project\Models;

class ArticleManager extends Manager{

    /*============== REQUETES EN BACK ===================*/

    // requête pour créer un article dans la table articles
    public function createArticle($newTitle, $newContent, $idImg){
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('INSERT INTO articles(title, content, idImg) VALUE (?,?,?)');
        $req->execute([$newTitle, $newContent, $idImg]);
        return $req;
    }
    // requête pour afficher tous les articles de la table en ordre inverse de création
    public function getArticles(){
        $bdd = $this->dbConnect();
        $req = $bdd->query('SELECT * FROM articles INNER JOIN images ON articles.idImg = images.img_id ORDER BY art_id DESC');
        return $req;
    }
    // requête pour afficher l'article sélectionné dans la liste
    public function editArticle($id){
        $bdd = $this->dbConnect();       
        $req = $bdd->prepare('SELECT * FROM articles INNER JOIN images ON articles.idImg = images.img_id WHERE art_id = ?');
        $req->execute(array($id));       
        return $req;
    }
    //requête pour modifier un article
    public function updateArticle($id, $updateTitle, $updateContent){
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('UPDATE articles SET title = :title, content = :content WHERE art_id = :art_id');
        $req->execute([
            'art_id' => $id,
            'title' => $updateTitle,
            'content' => $updateContent
            ]);
        return $req;
    }
    // requête pour supprimer un article
    public function deleteArticle($id){
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('DELETE FROM articles WHERE art_id=?');
        $req->execute([$id]);
        return $req;
    }
    /*================= REQUETES EN FRONT ===============*/

    // requête pour afficher articles sur page d'accueil
    public function showArticles(){
        $bdd = $this->dbConnect();
        $req = $bdd->query('SELECT title,content,img,titleImg  FROM  articles LEFT JOIN images ON articles.idImg = images.img_id WHERE category = "accueil" ORDER BY dateEdit DESC LIMIT 4');
        return $req;
    }
    //requête pour recherche
    public function search($search){
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT title, content FROM articles WHERE title LIKE ? OR content LIKE ?');
        $req->execute(['%'.$search.'%', '%'.$search.'%']);       
        return $req;       
    }
    // requête pour afficher articles dans blog
    public function getBlogArticles(){
        $bdd = $this->dbConnect();
        $req = $bdd->query('SELECT art_id, title, content, img, titleImg FROM articles LEFT JOIN images ON articles.idImg = images.img_id WHERE category = "blog" ORDER BY dateEdit DESC');
        return $req;
    }
    // requête pour afficher article sélectionné avec les commentaires associés
    public function displayArticle($id){
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT art_id, title, content, dateEdit, img, titleImg, contentComment FROM articles LEFT JOIN images ON articles.idImg = images.img_id LEFT JOIN comments ON articles.art_id = comments.idArticle WHERE art_id = ?');
        $req->execute([$id]);
        return $req;
    }




    

}