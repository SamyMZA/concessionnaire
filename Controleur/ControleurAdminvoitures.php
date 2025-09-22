<?php
require_once 'Framework/Controleur.php';
require_once 'Modele/Voiture.php';
require_once 'Modele/Achat.php';
require_once 'Modele/Utilisateur.php';
require_once 'ControleurAdmin.php';

class ControleurAdminvoitures extends ControleurAdmin{
    private $voiture;
    private $achat;
    private $utilisateur;

    public function __construct(){
        $this->voiture = new Voiture();
        $this->achat = new Achat();
        $this->utilisateur = new Utilisateur();
    }

    public function index(){
        $voitures = $this->voiture->getVoitures();
        $this->genererVue(['voitures' => $voitures]);
    }

    public function voiture() {
        $idVoiture = $this->requete->getParametreId("id");
        $voiture = $this->voiture->getVoiture($idVoiture);
        
        $erreur = $this->requete->getSession()->existeAttribut("erreur") ? $this->requete->getsession()->getAttribut("erreur") : '';
        
        $achatsObj = $this->achat->getAchats($idVoiture);
        $achats = $achatsObj->fetchAll(PDO::FETCH_ASSOC);

        foreach ($achats as $index => $achat) {
            $utilisateur = $this->utilisateur->getUtilisateurById($achat['id_utilisateur']);
            $achats[$index]['nom_utilisateur'] = $utilisateur['nom']; 
        }


        $this->genererVue(['voiture' => $voiture, 'achats' => $achats, 'erreur' => $erreur , 'utilisateur' => $utilisateur]);
    }

    public function achats() {
        $achat['id_utilisateur'] = $this->requete->getParametreId("id_utilisateur");
        $achat['id_voiture'] = $this->requete->getParametreId("id_voiture");
        $this->achat->setAchat($achat);

        header('Location: index.php?action=voiture&id=' . $achat['id_voiture']);
    }

    public function nouveau() {
        $voiture['marque'] = $this->requete->getParametre('marque');
        $voiture['modele'] = $this->requete->getParametre('modele');
        $voiture['prix'] = $this->requete->getParametre('prix');
        $voiture['img'] = $this->requete->getParametre('img');
        $this->voiture->setVoiture($voiture);
        $this->executerAction('index');
    }

    public function ajouter() {
        $vue = new Vue("ajouter");
        $this->genererVue();
    }

    public function modifier() {
        $id = $this->requete->getParametreId('id');
        $voiture = $this->voiture->getVoiture($id);
        $this->genererVue(['voiture' => $voiture]);
    }

    public function miseAJour() {
        $voiture['id'] = $this->requete->getParametreId('id');
        $voiture['marque'] = $this->requete->getParametre('marque');
        $voiture['modele'] = $this->requete->getParametre('modele');
        $voiture['prix'] = $this->requete->getParametre('prix');
        $voiture['img'] = $this->requete->getParametre('img');
        $this->voiture->updateVoiture($voiture);
        $this->executerAction('index');
    }



}