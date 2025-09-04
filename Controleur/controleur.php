<?php

require 'Modele/Modele.php';

function accueil() {
    $voitures = getVoitures();
    require 'Vue/vueAccueil.php';
}

