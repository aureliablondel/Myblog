<?php
namespace Project\Controllers\Front;

class FrontController{

    /*==============GESTION DES ARTICLES===============*/
    // affichage des articles dans la page accueil
    function accueil(){
        $article = new \Project\Models\ArticleManager();
        $allArticles = $article->showArticles();
        require 'app/views/front/accueil.php'; // méthode qui retourne la page accueil
    }    
    // recherche article
    function search($search){
        $resSearch = new \Project\Models\ArticleManager();
        $selectSearchs = $resSearch->search($search);
        require 'app/views/front/resultSearch.php';
    }
    // affichage articles dans le blog
    function blog(){
        $article = new \Project\Models\ArticleManager();
        $blogArticles = $article->getBlogArticles();

        require 'app/views/front/blog.php';
    }
    // affichage de l'article sélectionné
    function display($id){
        $article = new \Project\Models\ArticleManager();
        $selectArticle = $article->displayArticle($id);
        $displayArticle = $selectArticle->fetch();
        
        require 'app/views/front/selectedArticle.php';
    }
    /*==============GESTION DES UTILISATEURS==============*/
    // envoi sur formulaire d'inscription
    function signUp(){
        require 'app/views/front/inscription.php';
    }
    // enregistrement de l'utilisateur
    function registerUser($pseudo, $mail, $password){
        $user = new \Project\Models\UserManager();
        $newUser = $user->registerUser($pseudo, $mail, $password);        
        header('Location: index.php?action=confirmRegister');
    }
    // affichage confirmation inscription
    function confirmRegister(){
        require 'app/views/front/confirmRegister.php';
    }
    // envoi sur formulaire de connexion
    function logIn(){
        require 'app/views/front/connexion.php';
    }
    // connexion utilisateur
    function connectUser($pseudo,$password){
        $user = new \Project\Models\UserManager();
        $userRegistered = $user->recupPassword($pseudo, $password);
        $result = $userRegistered->fetch(); // stocke cette ligne dans la variable result 
        $isPasswordCorrect = password_verify($password, $result['password']); // compare le mdp de la table avec celui saisi    
        $_SESSION['user_id'] = $result['user_id'];
        $_SESSION['pseudo'] = $result['pseudo'];
        $_SESSION['mail'] = $result['mail'];
        $_SESSION['password'] = $result['password'];
        
        if($isPasswordCorrect){
            require 'app/views/front/dashboardUser.php';
        }else{
            echo 'Vos identifiants sont incorrects';
        }            
        
    }
    // envoi sur le tableau de bord de l'utilisateur
    function dashboardUser(){
        require 'app/views/front/dashboardUser.php';
    }
    // changer le mot de passe
    function changePassword($id, $newPassword){
        $user = new \Project\Models\UserManager();
        $userPass = $user->changePassword($id, $newPassword);
        header('Location: index.php?action=po');
    }
    /*============== GESTION DES COMMENTAIRES ================*/
    // poster un commentaires
    function postComment($contentComment, $id){
        $comment = new \Project\Models\CommentManager();
        $postComment = $comment->postComment($contentComment, $id);
        
    }
    // afficher les commentaires liés à l'article
    function getComments($id){
        $comment = new \Project\Models\CommentManager();
        $getComment = $comment->getComments($id);
        require 'app/views/front/selectedArticle.php';
    }

}