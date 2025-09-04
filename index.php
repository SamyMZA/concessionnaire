<?php
require 'modele.php';
try {
    $voitures = getVoitures();
    require 'vueAccueil.php';
} catch (Exception $e) {
    $msgErreur = $e->getMessage();
    require 'vueErreur.php';
}
