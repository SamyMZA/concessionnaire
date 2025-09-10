<?php

require_once 'Modele/Voiture.php';

class ControleurVoiture extends Controleur{
    private $voiture;

    public function __construct(){
        $this->voiture = new Voiture();
    }

    public function index(){
        $voitures = $this->voiture->getVoitures();
        $this->genererVue(['voitures' => $voitures]);
    }

}