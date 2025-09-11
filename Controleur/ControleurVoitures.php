<?php
require_once 'Framework/Controleur.php';
require_once 'Modele/Voiture.php';
require_once 'Modele/Achat.php';

class ControleurVoitures extends Controleur{
    private $voiture;
    private $achat;

    public function __construct(){
        $this->voiture = new Voiture();
        $this->achat = new Achat();
    }

    public function index(){
        $voitures = $this->voiture->getVoitures();
        $this->genererVue(['voitures' => $voitures]);
    }

    public function voiture() {
        $idVoiture = $this->requete->getParametreId("id");
        $voiture = $this->voiture->getVoiture($idVoiture);
        $erreur = $this->requete->getSession()->existeAttribut("erreur") ? $this->requete->getsession()->getAttribut("erreur") : '';
        $achats = $this->achat->getAchats($idVoiture);
        $this->genererVue(['voiture' => $voiture, 'achats' => $achats, 'erreur' => $erreur]);
    }

}