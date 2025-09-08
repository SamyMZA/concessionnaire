<?php

require_once 'Modele/Modele.php';

class Voiture extends Modele{


    function getVoitures(){

        $sql = 'select * from voitures order by ID desc';
        $voitures = $this->executerRequete($sql);
        return $voitures;

    return $voitures;
}
}