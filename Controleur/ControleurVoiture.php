<?php

require_once 'Modele/Voiture.php';
require_once 'Modele/Achat.php';
require_once 'Vue/Vue.php';

class ControleurVoiture{
    private $voiture;
    private $achat;

    public function __construct(){
        $this->voiture = new Voiture();
        $this->achat = new Achat();
    }

    public function voitures(){
        $voitures = $this->voiture->getVoitures();
        $achats = $this->achat->getAchats();
        $vue = new Vue("Voitures");
        $vue->generer(['voitures' => $voitures, 'achats' => $achats]);
    }

}