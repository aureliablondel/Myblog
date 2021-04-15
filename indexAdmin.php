<?php

session_start();
// Démarre une nouvelle session

require_once __DIR__ . '/vendor/autoload.php';

try{
    $backController = new \Project\Controllers\Back\BackController();

    if(isset($_GET['action'])){

        // retour au tableau de bord
        if($_GET['action'] == 'tbAdmin'){
            $backController->tbAdmin();
        }
        /*======================GESTION DES ARTICLES===============*/
        // affiche tous les articles
        elseif($_GET['action'] == 'articles'){            
            $backController->getArticles();
        }
        // envoie sur la page de création d'article
        elseif($_GET['action'] == 'createArticle'){
            $backController->goPageNewArticle();
        }
        // enregistre un nouvel article
        elseif($_GET['action'] == 'logArticle'){
            $idImg = htmlspecialchars($_POST['selectImg']);           
            $newTitle = htmlspecialchars($_POST['title']);
            $newContent = htmlspecialchars($_POST['content']);
            $backController->createArticle($newTitle, $newContent, $idImg);            
        }
        // affiche l'article sélectionné
        elseif($_GET['action'] == 'editArticle'){
            $id = htmlspecialchars($_GET['id']);
            $backController->editArticle($id);
        }
        // modifie l'article    
        elseif($_GET['action'] == 'updateArticle'){
            $id = htmlspecialchars($_GET['id']);
            $updateTitle = htmlspecialchars($_POST['title']);
            $updateContent = htmlspecialchars($_POST['content']);
            $backController->updateArticle($id, $updateTitle, $updateContent);
        }
        // supprime l'article
        elseif($_GET['action'] == 'deleteArticle'){
            $id = htmlspecialchars($_GET['id']);
            $backController->deleteArticle($id);
        }
        /*====================GESTION DES IMAGES=================*/
        // affiche toutes les images
        elseif($_GET['action'] == 'images'){            
            $backController->getImages();
        }
        // charge la page de création d'image
        elseif($_GET['action'] == 'image'){
            $backController->goPageNewImg();
        }
        // crée une nouvelle image dans la BDD
        elseif($_GET['action'] == 'uploadImg'){
            $title = htmlspecialchars($_POST['title']);            
            if(!empty($title)){
                $backController->uploadImg($title);
                }         
        } 
        // supprime une image
        elseif($_GET['action'] == 'deletImg'){
            $id = htmlspecialchars($_GET['id']);
            $backController->deletImg($id);
        }       
      
    }else{
        $backController->tbAdmin(); // si pas d'action on appelle le tableau
    }

} catch(Exception $e){ 
    die('Erreur: ' . $e->getMessage());
}
