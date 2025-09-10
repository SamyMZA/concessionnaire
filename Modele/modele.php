<?php

function getBdd(){
    $bdd = new PDO('mysql:host=localhost;dbname=concessionnaire;charset=utf8', 'root', 'mysql', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
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

// Renvoie la liste des commentaires associés à un article
function getAchats(){
    $bdd = getBdd();
    $achats = $bdd->query('select * from achats'
            . ' order by ID desc');
    return $achats;
}

// Renvoie un commentaire spécifique
function getAchat($id) {
    $bdd = getBdd();
    $achat = $bdd->prepare('select * from achats'
            . ' where id = ?');
    $achat->execute(array($id));
    if ($achat->rowCount() == 1)
        return $achat->fetch();  // Accès à la première ligne de résultat
    else
        throw new Exception("Aucun commentaire ne correspond à l'identifiant '$id'");
    return $achat;
}

function setAchat($achat) {
    $bdd = getBdd();
    $achats = $bdd->prepare('INSERT INTO achats (id_utilisateur, nom_utilisateur, id_voiture, marque_voiture, prix) VALUES(?,?,?,?,?)');
    $achats->execute(array($achat['id_utilisateur'], $achat['nom_utilisateur'], $achat['id_voiture'], $achat['marque_voiture'], $achat['prix']));
    return $achats;
}

// Supprime un commentaire
function deleteAchat($id) {
    $bdd = getBdd();
    $result = $bdd->prepare('DELETE FROM achats'
            . ' WHERE id = ?');
    $result->execute(array($id));
    return $result;
}
