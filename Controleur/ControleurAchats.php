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
        $achat['id_utilisateur'] = $this->requete->getParametreId("id_voiture");
        $achat['nom_utilisateur'] = $this->requete->getParametre('id_utilisateur');
        $achat['id_voiture'] = $this->requete->getParametreId("id_voiture");
        $achat['marque_voiture'] = $this->requete->getParametre('id_utilisateur');
        $achat['prix'] = $this->requete->getParametre('id_utilisateur');
        $this->achat->setAchat($achat);

        header('Location: index.php?action=voiture&id=' . $achat['id_voiture']);
    }

}