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

        if($_GET['action'] == 'readNext'){
            $id = $_GET['id'];            
            $frontController->nextArticle($id);
        }
        /*
        
            ============== GESTION DES UTILISATEURS =================
            
        */
        // envoi sur le formulaire d'inscription
        if($_GET['action'] == 'signUp'){
            $frontController->signUp();
        }
        // enregistrement du nouvel utilisateur
        if($_GET['action'] == 'registerUser'){
            $id = $_GET['id'];
            $pseudo = htmlspecialchars($_POST['pseudo']);
            $mail = htmlspecialchars($_POST['mail']);
            // $mail = filter_var($mail, FILTER_SANITIZE_EMAIL);
            
           
        $password = htmlspecialchars($_POST['password']);
        $confirmPassword = htmlspecialchars($_POST['confirm-password']);
        $registeredPass = password_hash(htmlspecialchars($_POST['password']), PASSWORD_DEFAULT);
        $frontController->registerUser($id, $pseudo, $mail, $password, $confirmPassword, $registeredPass);
        }
        // confirmation inscription
        if($_GET['action'] == 'confirmRegister'){
            $frontController->confirmRegister();
        }

        // ----------------------------------------
        // envoi sur le formulaire de connexion
        // ----------------------------------------
        
        if($_GET['action'] == 'logIn'){
            $frontController->logIn();
        }

        // -------------------------
        // connexion utilisateur
        // -------------------------

        if($_GET['action'] == 'connectUser'){            
            $pseudo = htmlspecialchars($_POST['pseudo']);
            $password = htmlspecialchars($_POST['password']);
            if(!empty($pseudo && $password)){          
                $frontController->connectUser($pseudo, $password);
            }else{                
                $frontController->errorConnect();
            }
        }

        // -----------------------
        // changer mot de passe
        // -----------------------

        if($_GET['action'] == 'changePassword'){
            $idUser = $_GET['id'];            
            $password = $_SESSION['password'];
            $pseudo = $_SESSION['pseudo'];
            $oldPassword = htmlspecialchars($_POST['oldpassword']);
            $newPassword = password_hash(htmlspecialchars($_POST['newpassword']), PASSWORD_DEFAULT);        
            $confirmPassword = htmlspecialchars($_POST['confirmpassword']);           
                        
            if(!empty($oldPassword && $newPassword && $confirmPassword)){          
                $frontController->changePassword($idUser, $pseudo, $password, $oldPassword, $newPassword, $confirmPassword);
            }else{                
                $frontController->errorChangePass();
            }          
        }
        
        /*================ POST COMMENTAIRES ================*/
        // accéder au formulaire de connexion de l'espace membre
        if($_GET['action'] == 'goSpaceMember'){
            $frontController->goSpaceMember();
        }
        
        // poster un commentaire
        if($_GET['action'] == 'postComment'){
            $idArticle = $_GET['id'];
            $idUser = $_SESSION['user_id'];
            $contentComment = htmlspecialchars($_POST['comment']);            
            $frontController->postComment($contentComment, $idUser, $idArticle);
        }

        // -----------------------------------------------
        // afficher le commentaire à modifier
        // -----------------------------------------------
        
        if($_GET['action'] == 'updateComment'){
            $commentId = $_GET['id'];
            $frontController->editComment($commentId);          
        }

        // ---------------------------
        // modifier le commentaire
        // ---------------------------

        if($_GET['action'] == 'submitComment'){
            $commentId = $_GET['id'];            
            $updateComment = htmlspecialchars($_POST['contentComment']);
            $date = $_POST['date'];
            $frontController->updateComment($commentId, $updateComment, $date);
        }

        // --------------------------
        // supprimer le commentaire
        // --------------------------

        if($_GET['action'] == 'deleteComment'){
            $commentId = $_GET['id'];
            $frontController->deleteComment($commentId);
        }

        // connexion pour poster commentaire
        if($_GET['action'] == 'connectForPost'){
            $id = $_GET['id'];
            $pseudo = htmlspecialchars($_POST['pseudo']);
            $password = htmlspecialchars($_POST['password']);
            if(!empty($pseudo && $password)){          
                $frontController->connectForPost($id, $pseudo, $password);
            }else{                
                $frontController->errorConnect();
            }
        }
        /*if($_GET['action'] == 'connectUserComment'){
            $id = $_GET['id'];
            $idUser = $_SESSION['user_id'];
            $pseudo = htmlspecialchars($_POST['pseudo']);
            $password = htmlspecialchars($_POST['password']);
            if(!empty($pseudo && $password)){          
                $frontController->connectUserComment($id, $idUser, $pseudo, $password);
            }else{                
                $frontController->errorConnect();
            }
        }*/

        // --------------
        // Déconnexion
        // --------------

        if($_GET['action'] == 'disconnection'){
            // session_unset();
            session_destroy(); // on ferme la session
            header('Location: index.php');
        }





    }else{       
        $frontController->accueil(); // si pas d'action on appelle la variable et on applique la méthode accueil définie ds fichier FrontController
    }

} catch(Exception $e){ 
    die('Erreur: ' . $e->getMessage());
}
