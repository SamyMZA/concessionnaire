<?php

require_once 'Framework/Modele.php';

class Utilisateur extends Modele{

    public function connecter($login, $mdp){
        $sql = "select id from utilisateurs where nom =? and mdp = ?";
        $utilisateur = $this->executerRequete($sql, array($login, $mdp));
        return ($utilisateur->rowCount() == 1);
    }


    public function getUtilisateur($login,$mdp){
        $sql = "select id, nom, mdp from utilisateurs where nom =? and mdp = ?";
        $utilisateur = $this->executerRequete($sql, array($login, $mdp));
        if ($utilisateur->rowCount() == 1){
            return $utilisateur->fetch();
        }else{
            throw new Exception("Aucun utilisateur correspond au identifiants");
        }
    }

    public function getUtilisateurById($id){
        $sql = "select nom from utilisateurs where id =? ";
        $utilisateur = $this->executerRequete($sql, array($id));
        if ($utilisateur->rowCount() == 1){
            return $utilisateur->fetch();
        }else{
            throw new Exception("Aucun utilisateur correspond au id");
        }
    }


}