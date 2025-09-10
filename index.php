<?php
require 'Controleur/Controleur.php';


try {
    if (isset($_GET['action'])) {

        // Afficher une voiture
        if ($_GET['action'] == 'voiture') {
            if (isset($_GET['id'])) {
                // intval renvoie la valeur numérique du paramètre ou 0 en cas d'échec
                $id = intval($_GET['id']);
                if ($id != 0) {
                    $erreur = isset($_GET['erreur']) ? $_GET['erreur'] : '';
                    voiture($id, $erreur);
                } else
                    throw new Exception("(Method get) Identifiant de la voiture incorrect");
            } else
                throw new Exception("(Method get) Aucun identifiant de la voiture");

            // Ajouter un commentaire
        } else if ($_GET['action'] == 'achat') {
            if (isset($_POST['id_voiture'])) {
                // intval renvoie la valeur numérique du paramètre ou 0 en cas d'échec
                $id = intval($_POST['id_voiture']);
                if ($id != 0) {
                    // vérifier si l'article existe;
                    $voiture = getVoiture($id);
                    // Récupérer les données du formulaire
                    $achat = $_POST;
                    //Réaliser l'action commentaire du contrôleur
                    achat($achat);
                } else
                    throw new Exception("(Methode Ajouter) Identifiant de la voiture incorrect");
            } else
                throw new Exception("(Methode Ajouter) Aucun identifiant de voiture");

            // Confirmer la suppression
        } else if ($_GET['action'] == 'confirmer') {
            if (isset($_GET['id'])) {
                // intval renvoie la valeur numérique du paramètre ou 0 en cas d'échec
                $id = intval($_GET['id']);
                if ($id != 0) {
                    confirmer($id);
                } else
                    throw new Exception("(Methode Confirmer) Identifiant de voiture incorrect");
            } else
                throw new Exception("(Methode Confirmer) Aucun identifiant de voiture");

            // Supprimer un commentaire
        } else if ($_GET['action'] == 'supprimer') {
            if (isset($_POST['id'])) {
                // intval renvoie la valeur numérique du paramètre ou 0 en cas d'échec
                $id = intval($_POST['id']);
                if ($id != 0) {
                    supprimer($id);
                } else
                    throw new Exception("(Methode Supprimer) Identifiant de voiture incorrect");
            } else
                throw new Exception("(Methode Supprimer) Aucun identifiant de voiture");
        } else {
            // Action mal définie
            throw new Exception("Action non valide");
        }

    // Action par défaut
    } else {
        accueil();  // action par défaut
    }
} catch (Exception $e) {
    erreur($e->getMessage());
}