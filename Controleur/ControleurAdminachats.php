<?php
require_once 'Framework/Controleur.php';
require_once 'Modele/Achat.php';

class ControleurAchats extends Controleur{
    private $achat;

    public function __construct(){
        $this->achat = new Achat();
    }

    public function index(){
        $achats = $this->achat->getAchats();
        $this->genererVue(['achats' => $achats]);
    }

    public function achats() {
        $achat['id_utilisateur'] = $this->requete->getParametreId("id_utilisateur");
        $achat['id_voiture'] = $this->requete->getParametreId("id_voiture");
        $this->achat->setAchat($achat);


        header('Location: /concessionnaire/AdminVoitures/voiture/' . $achat['id_voiture']);
    }

}