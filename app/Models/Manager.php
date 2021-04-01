<?php

namespace Project\Models;

use Exception;

class Manager{

    private static $bdd = null;

    protected function dbConnect()
    {
        // si PDO a déjà été instancié, il retourne $bdd sinon il crée une nouvelle instance
        if(isset(self::$bdd)){
            return self::$bdd;
        }else{
        try{            
            self::$bdd  = new \PDO('mysql:host=localhost;dbname=myblog;charset=utf8', 'root', ''); // connexion à la bdd
            return self::$bdd;
        }catch(Exception $e){
            die('Erreur: ' . $e->getMessage());
        }
        }
    }
}
