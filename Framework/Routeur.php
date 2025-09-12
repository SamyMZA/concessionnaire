<?php

require_once 'Configuration.php';
require_once 'Controleur.php';
require_once 'Requete.php';
require_once 'Vue.php';


class Routeur {

    public function routerRequest(){
        try{
            $requete = new Requete(array_merge($_GET, $_POST));

            $controleur = $this->creerControleur($requete);
            $action = $this->creerAction($requete);

            $controleur->executerAction($action);
                
        } catch (Exception $e){
            $this->gererErreur($e);
        }
    }


    public function creerControleur(Requete $requete){
        $ctrlAccueil = Configuration::get("defaut");
        if ($requete->getSession()->existeAttribut("utilisateur")) {
            $ctrlAccueil = 'Admin' . $ctrlAccueil;
        }
        $controleur = $ctrlAccueil;  // Contrôleur par défaut
        if ($requete->existeParametre('controleur')) {
            $controleur = $requete->getParametre('controleur');
            // Première lettre en majuscules
            $controleur = ucfirst(strtolower($controleur));
        }
        // Création du nom du fichier du contrôleur
        // La convention de nommage des fichiers controleurs est : Controleur/Controleur<$controleur>.php
        $classeControleur = "Controleur" . $controleur;
        $fichierControleur = "Controleur/" . $classeControleur . ".php";
        if (file_exists($fichierControleur)) {
            // Instanciation du contrôleur adapté à la requête
            require($fichierControleur);
            $controleur = new $classeControleur();
            $controleur->setRequete($requete);
            return $controleur;
        } else {
            throw new Exception("Fichier '$fichierControleur' introuvable");
        }
    }

    private function creerAction(Requete $requete) {
        $action = "index";  // Action par défaut
        if ($requete->existeParametre('action')) {
            $action = $requete->getParametre('action');
        }
        return $action;
    }


    private function gererErreur(Exception $exception) {
        $vue = new Vue('erreur');
        $erreur = $exception->getMessage();
        $vue->generer(array('msgErreur' => $erreur));
    }
}