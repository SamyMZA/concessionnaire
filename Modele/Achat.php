<?php

require_once 'Framework/Modele.php';

class Achat extends Modele{


    function getAchats($idVoiture = null){
        if ($idVoiture == null) {
            $sql = "select * from achats";
            $achats = $this->executerRequete($sql);
        }else {
            $sql = "select * from achats"
                    . " where id_voiture = ?";
            $achats = $this->executerRequete($sql, [$idVoiture]);
        }
    return $achats;
}

   function getAchat($id) {
        $sql = 'select * from achats'
                . ' where id=?';
        $achat = $this->executerRequete($sql, [$id]);
        if ($achat->rowCount() == 1) {
            return $achat->fetch();  // Accès à la première ligne de résultat
        } else {
            throw new Exception("Aucun Achat ne correspond à l'identifiant $id");
        }
    }

    function setAchat($achat) {
        $sql = 'INSERT INTO achats (id_utilisateur, id_voiture)
                VALUES (?, ?)';
        $this->executerRequete($sql, [$achat['id_utilisateur'], $achat['id_voiture']]);
    }

    public function deleteAchat($id) {
        $sql = 'UPDATE achats'
                . ' SET efface = 1'
                . ' WHERE id = ?';
        $result = $this->executerRequete($sql, [$id]);
        return $result;
    }

    public function restoreAchat($id) {
        $sql = 'UPDATE achats'
                . ' SET efface = 0'
                . ' WHERE id = ?';
        $result = $this->executerRequete($sql, [$id]);
        return $result;
    }

}
