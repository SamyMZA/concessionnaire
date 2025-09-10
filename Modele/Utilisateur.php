<?php

require_once 'Framework/Modele.php'

class Utilisateur extends Modele{

    public function connecter($login, $mdp){
        $sql = "select id from nomUtilisateur where id =? and mdp = ?";
        $utilisateur = $this->extecuterRequete($sql, array($login, $mdp));
        return ($utilisateur->rowCount() == 1)
    }


    public function getUtilisateur($login,$mdp){
        $sql = "select id, nom, nomUtilisateur, mdp from nomUtilisateur where id =? and mdp = ?";
        $utilisateur = $this->extecuterRequete($sql, array($login, $mdp));
        if ($utilisateur->rowCount() == 1){
            return $utilisateur->fetch();
        }else{
            throw new Execption("Aucun utilisateir correspond au identifiants")
        }
    }


}