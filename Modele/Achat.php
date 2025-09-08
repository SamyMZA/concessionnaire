<?php

require_once 'Modele/Modele.php';

class Achat extends Modele{


    function getAchats(){
    $sql = "select * from achats order by ID desc";
    $achats = $this->executerRequete($sql);
    return $achats;
}
}
