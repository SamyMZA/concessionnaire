<?php

require 'Controleur/controleur.php';

try {
    accueil();
}catch (Exception $e) {
    erreur($e->getMessage());
}
