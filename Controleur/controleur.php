<?php

require 'Modele/Modele.php';

function accueil() {
    $voitures = getVoitures();
    $achats = getAchats();
    require 'Vue/vueAccueil.php';
}

