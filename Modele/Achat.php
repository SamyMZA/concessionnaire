<?php

require_once 'Framework/Modele.php';

class Achat extends Modele{


    function getAchats(){
    $sql = "select * from achats order by ID desc";
    $achats = $this->executerRequete($sql);
    return $achats;
}
}
