<?php

require 'Modele/modele.php';

// Affiche la liste de tous les articles du blog
function accueil() {
    $voitures = getVoitures();
   
    require 'Vue/vueAccueil.php';
}

// Affiche les détails sur un article
function voiture($id, $erreur) {
    $voiture = getVoiture($id);
     $achats = getAchats();
    require 'Vue/vueVoiture.php';
}

// Ajoute un commentaire à un article
function achat($achat) {
    
        // Ajouter le commentaire à l'aide du modèle
        setAchat($achat);
        //Recharger la page pour mettre à jour la liste des commentaires associés
        header('Location: index.php?action=voiture&id=' . $achat['id_voiture']);
    
}

// Confirmer la suppression d'un commentaire
function confirmer($id) {
    // Lire le commentaire à l'aide du modèle
    $achat = getAchat($id);
    require 'Vue/vueConfirmer.php';
}

// Supprimer un commentaire
function supprimer($id) {
    // Lire le commentaire afin d'obtenir le id de l'article associé
    $achat = getAchat($id);
    // Supprimer le commentaire à l'aide du modèle
    deleteAchat($id);
    //Recharger la page pour mettre à jour la liste des commentaires associés
    header('Location: index.php?action=voiture&id=' . $achat['id_voiture']);
}

// Affiche une erreur
function erreur($msgErreur) {
    require 'Vue/vueErreur.php';
}