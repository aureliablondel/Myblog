<?php
session_start();
require_once __DIR__ . '/vendor/autoload.php';

try{
    $frontController = new \Project\Controllers\Front\FrontController();

    if(isset($_GET['action'])){

        // recherche des articles
        if($_GET['action'] == 'searchArticle'){            
            $search = htmlspecialchars($_POST['q']); //pour sécuriser le formulaire contre les failles html
            $search = trim($search); //pour supprimer les espaces dans la requête de l'internaute
            // $search = strip_tags($search);            //pour supprimer les balises html dans la requête
            $frontController->search($search);
        }
        // envoi sur blog
        if($_GET['action'] == 'blog'){
            $frontController->blog();
        }
        // sélection d'un article
        if($_GET['action'] == 'readArticle'){
            $id = $_GET['id'];
            $frontController->display($id);
        }
        /*============== GESTION DES UTILISATEURS =================*/
        // envoi sur le formulaire d'inscription
        if($_GET['action'] == 'signUp'){
            $frontController->signUp();
        }
        // enregistrement du nouvel utilisateur
        if($_GET['action'] == 'registerUser'){
            $pseudo = htmlspecialchars($_POST['pseudo']);
            $mail = htmlspecialchars($_POST['mail']);
            $password = htmlspecialchars($_POST['password']);
            $password = password_hash($password, PASSWORD_DEFAULT);
            $frontController->registerUser($pseudo, $mail, $password);
        }
        // confirmation inscription
        if($_GET['action'] == 'confirmRegister'){
            $frontController->confirmRegister();
        }
        // envoi sur le formulaire de connexion
        if($_GET['action'] == 'logIn'){
            $frontController->logIn();
        }
        // connexion utilisateur
        if($_GET['action'] == 'connectUser'){
            $pseudo = htmlspecialchars($_POST['pseudo']);
            $password = htmlspecialchars($_POST['password']);
            if(!empty($pseudo && !empty($password))){          
                $frontController->connectUser($pseudo, $password);
            }else{
                throw new Exception('Renseigner vos identifiants');
            }
        }
        // envoi sur le tableau de bord de l'utilisateur
        if($_GET['action'] == 'dashboardUser'){
            if(!empty($_SESSION['pseudo'])){
            $frontController->dashboardUser();
        }}
        // changer mot de passe
        if($_GET['action'] == 'changePassword'){
            $id = $_GET['id'];
            //$password = htmlspecialchars($_POST['password']);           
            $newPassword = htmlspecialchars($_POST['newPassword']);
            //$newPassword = password_hash($password, PASSWORD_DEFAULT);
            // $confirmPassword = htmlspecialchars($_POST['confirmPassword']);
            $frontController->changePassword($id, $newPassword);
        }
        /*================ POST COMMENTAIRES ================*/
        // poster un commentaire
        if($_GET['action'] == 'postComment'){
            $id = $_GET['id'];
            $contentComment = htmlspecialchars($_POST['comment']);            
            $frontController->postComment($contentComment, $id);
        }
        // afficher tous les commentaires liés à l'article
        // if($_GET['action'] == 'readArticle'){
            // $id = $_GET['id'];
           // $frontController->getComments($id);
        




    }else{       
        $frontController->accueil(); // si pas d'action on appelle la variable et on applique la méthode accueil définie ds fichier FrontController
    }

} catch(Exception $e){ 
    die('Erreur: ' . $e->getMessage());
}
