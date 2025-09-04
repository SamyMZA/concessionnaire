<?php

function getBdd(){
    $bdd = new PDO('mysql:host=localhost;dbname=concessionnaire;charset=utf8', 'root', 'mysql', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    return $bdd;
}

function getVoitures(){
    $bdd = getBdd();
    $voitures = $bdd->query('select * from voitures'
            . ' order by ID desc');
    return $voitures;
}

function getAchats(){
    $bdd = getBdd();
    $achats = $bdd->query('select * from achats'
            . ' order by ID desc');
    return $achats;
}
