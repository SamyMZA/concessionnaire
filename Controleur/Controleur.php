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
    require 'Vue/vueVoiture.php';
}

// Ajoute un commentaire à un article
function ajouter($voiture) {
    
        // Ajouter le commentaire à l'aide du modèle
        setVoiture($voiture);
        //Recharger la page pour mettre à jour la liste des commentaires associés
        header('Location: index.php?action=voiture&id=' . $voiture['id']);
    
}

// Confirmer la suppression d'un commentaire
function confirmer($id) {
    // Lire le commentaire à l'aide du modèle
    $voiture = getVoiture($id);
    require 'Vue/vueConfirmer.php';
}

// Supprimer un commentaire
function supprimer($id) {
    // Lire le commentaire afin d'obtenir le id de l'article associé
    $voiture = getVoiture($id);
    // Supprimer le commentaire à l'aide du modèle
    deleteVoiture($id);
    //Recharger la page pour mettre à jour la liste des commentaires associés
    header('Location: index.php?action=voiture&id=' . $voiture['id']);
}

// Affiche une erreur
function erreur($msgErreur) {
    require 'Vue/vueErreur.php';
}