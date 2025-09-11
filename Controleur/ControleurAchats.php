<?php
require_once 'Framework/Controleur.php';
require_once 'Modele/Achat.php';

class ControleurAchats extends Controleur{
    private $achat;

    public function __construct(){
        $this->achat = new Achat();
    }

    public function achats(){
        $achats = $this->achat->getAchats();
        $this->genererVue(['achats' => $achats]);
    }

}