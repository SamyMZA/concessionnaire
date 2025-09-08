<?php

require_once 'Modele/Achat.php';
require_once 'Vue/Vue.php';

class ControleurAchat{
    private $achat;

    public function __construct(){
        $this->achat = new achat();
    }

    public function achats(){

    }

}