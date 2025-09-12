<?php

require_once 'Configuration.php';

abstract class Modele{
    private static $bdd;


    protected function executerRequete($sql, $params = null){
        if ($params == null) {
            $resultat = $this::getBdd()->query($sql);
        }else{
            $resultat = $this::getBdd()->prepare($sql);
            $resultat->execute($params);
        }
        return $resultat;
    }


    private function getBdd(){
        if (self::$bdd === null) {
            // Récupération des paramètres de configuration BD
            $dsn = Configuration::get("dsn");
            $login = Configuration::get("login");
            $mdp = Configuration::get("mdp");
            // Création de la connexion
            self::$bdd = new PDO($dsn, $login, $mdp, 
                    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        return self::$bdd;
    }
}






