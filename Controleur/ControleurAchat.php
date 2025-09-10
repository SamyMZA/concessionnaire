<?php

require_once 'Modele/Achat.php';

class ControleurAchat{
    private $achat;

    public function __construct(){
        $this->achat = new achat();
    }

    public function achats(){
        $achats = $this->achat->getVoitures();
        $this->genererVue(['achats' => $achats]);
    }

}