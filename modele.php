<?php

function getBdd(){
    $bdd = new PDO('mysql:host=localhost;dbname=concessionaire;charset=utf8', 'root', 'mysql', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    return $bdd;
}

function getVoitures(){
    $bdd = getBdd();
    $voitures = $bdd->query('select * from voitures'
            . ' order by ID desc');
    return $voitures;
}

function getVoiture($idVoiture){
    $bdd = getBdd();
    $voiture = $bdd-> prepare('select * from Voitures'
            . ' where ID=?');
    $voiture->execute(array($idVoiture));
    if($voiture->rowCount() == 1 )
        return $voiture->fetch();
    else
        throw new Exception("Aucun voiture ne correspond à l'identifiant '$idVoiture'");
}

