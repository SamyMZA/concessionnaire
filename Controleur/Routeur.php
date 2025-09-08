<?php

require_once 'Controleur/ControleurVoiture.php';


class Routeur {
    private $ctrlVoiture;

    public function __construct(){
        $this->ctrlVoiture = new ControleurVoiture;
    }

    public function routerRequest(){
        try{
            if (isset($_GET['action'])){
                
            }else{
                $this->ctrlVoiture->voitures();
            }
                
        } catch (Exception $e){
            $this->erreur($e->getMessage());
        }
    }

        private function erreur($msgErreur) {
        $vue = new Vue("Erreur");
        $vue->generer(array('msgErreur' => $msgErreur));
    }

}