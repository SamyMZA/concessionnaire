<?php

require_once 'Framework/Modele.php';

class Voiture extends Modele{


    function getVoitures(){

        $sql = 'select * from voitures order by ID desc';
        $voitures = $this->executerRequete($sql);
        return $voitures;
    }

   function getVoiture($idVoiture) {
        $sql = 'select * from voitures'
                . ' where ID=?';
        $voiture = $this->executerRequete($sql, [$idVoiture]);
        if ($voiture->rowCount() == 1) {
            return $voiture->fetch();  // Accès à la première ligne de résultat
        } else {
            throw new Exception("Aucune Voiture ne correspond à l'identifiant '$idVoiture'");
        }
    }

    function setVoiture($voiture) {
        $sql = 'INSERT INTO voitures (marque, modele, prix, img ) VALUES(?, ?, ?, ?)';
        $result = $this->executerRequete($sql, [$voiture['marque'], $voiture['modele'], $voiture['prix'], $voiture['img']]);
        return $result;
    }
}