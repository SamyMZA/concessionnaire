<?php

function getBdd(){
    $bdd = new PDO('mysql:host=localhost;dbname=concessionaire;charset=utf8', 'root', 'mysql', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    return $bdd;
}

// Renvoie la liste de tous les articles, triés par identifiant décroissant
function getVoitures() {
    $bdd = getBdd();
    $voitures = $bdd->query('select * from Voitures'
            . ' order by ID desc');
    return $voitures;
}

// Renvoie les informations sur un article
function getVoiture($idVoiture) {
    $bdd = getBdd();
    $voiture = $bdd->prepare('select * from Voitures'
            . ' where ID=?');
    $voiture->execute(array($idVoiture));
    if ($voiture->rowCount() == 1)
        return $voiture->fetch();  // Accès à la première ligne de résultat
    else
        throw new Exception("Aucune voiture ne correspond à l'identifiant '$idVoiture'");
}

function setVoiture($voiture) {
    $bdd = getBdd();
    $voitures = $bdd->prepare('INSERT INTO voitures (marque, modele, prix, lienimg) VALUES(?,?,?,?)');
    $voitures->execute(array($voiture['marque'], $voiture['modele'], $voiture['prix'], $voiture['lienimg']));
    return $voitures;
}

// Supprime un commentaire
function deleteVoiture($id) {
    $bdd = getBdd();
    $result = $bdd->prepare('DELETE FROM Voitures'
            . ' WHERE id = ?');
    $result->execute(array($id));
    return $result;
}
